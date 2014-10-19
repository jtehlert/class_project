<?php
session_start();
if (!$_SESSION['current_user']) {
  $host = $_SERVER['HTTP_HOST'];
  $extra = 'login.php';
  header("location: http://$host/$extra");
}
$title = "Class Notebook";

require 'assets/layout/header.php';
require 'helpers/javascript_variable_injection.php';
?>

<div class="five columns">
	<?php require 'assets/layout/sidebar.php' ?>
</div>

<div class="eleven columns">
	<?php require 'assets/layout/main-page/content.php' ?>
</div>

<div>
  <div id="overlay-background"></div>
  <div id="overlay">
  	<div>
  		<a href="#" onclick="hideOverlay()">Close Modal</a>
      <div id="overlay-content">
        <form id="file-form" action="" enctype="multipart/form-data" method="POST">
          <input type="file" id="file-select" name="file" accept="text/plain" required />
          <button type="submit" id="upload-button">Upload</button>
        </form>
        <form id="clipping-form" action="" enctype="multipart/form-data" method="POST" style="display: none">
          <input type="hidden" id="fid" value=""/>
          <p>Clipping Name</p><br />
          <input type="text" id="clipping-name" name="clipping-name" required /><br />
          <p>Clipping Subtitle</p><br/>
          <input type="text" id="clipping-subtitle" name="clipping-subtitle" required/><br />
          <p>Highlight the text you would like to create a clipping from.</p><br />
          <textarea id="uploaded-file-text" name="uploaded-file-text" onmouseup="copyText()" readonly></textarea><br />
          <textarea id="clipping-text" name="clipping-text" ></textarea><br />
          <button type="submit" id="save-clipping">Save Clipping</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  // Modal controls.
  function showOverlay() {
    el = document.getElementById("overlay");
    el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";

    bg = document.getElementById("overlay-background");
    bg.style.display = (bg.style.display == "block") ? "none" : "block";
  }

  function hideOverlay() {
    el = document.getElementById("overlay");
    el.style.visibility = "hidden";

    bg = document.getElementById("overlay-background");
    bg.style.display = "none";
  }

  function copyText() {
    if (window.getSelection) {
      text = window.getSelection().toString();
    }
    document.getElementById("clipping-text").value = text;
  }

  function clickClipping(id) {
    // Get the id of the clipping.
    id = id.substring(id.indexOf('-') + 1);

    // Get the clippings content from the API.
    var xhr = new XMLHttpRequest();
    xhr.open('GET', window.location.origin + "/api/rest/clipping.php?id=" + id, false);
    xhr.send();
    var contents = JSON.parse(xhr.responseText);

    // Populate the content area with the clipping contents.
    document.getElementById('clipping-content').value = contents.CONTENT;

    document.getElementById('clipping-title').innerHTML = contents.NAME;
  }

  (function() {

    // Handle file uploads.
    var fileUploadForm = document.getElementById('file-form');
    var clippingForm = document.getElementById('clipping-form');
    var fileSelect = document.getElementById('file-select');
    var uploadButton = document.getElementById('upload-button');

    fileUploadForm.onsubmit = function(event) {

      // Cancel the form submit from going through.
      event.preventDefault();

      // Update button text.
      uploadButton.innerHTML = 'Uploading...';

      // Get the selected files from the input.
      var files = fileSelect.files;
      var file = files[0];

      // Create a new FormData object.
      var formData = new FormData();

      // Add the file to the request.
      formData.append('file[]', file, file.name);

      // Set up the request.
      var xhr = new XMLHttpRequest();

      // Open the connection.
      xhr.open('POST', window.location.origin + "/helpers/file_upload.php", false);

      // Send the Data.
      xhr.send(formData);

      // Get the name of the file.
      var response = xhr.responseText;
      response = JSON.parse(response);
      var fname = response.fname;
      var fid = response.fid;
      document.getElementById('fid').value = fid;

      // Set up the request to get the contents of the file.
      var xhr = new XMLHttpRequest();

      // Open the connection.
      xhr.open('GET', window.location.origin + "/uploads/" + fname, false);

      // Send the request.
      xhr.send();

      var fileContents = xhr.responseText;

      document.getElementById("uploaded-file-text").value = fileContents;

      fileUploadForm.style.display = 'none';
      clippingForm.style.display = 'block';
    }

    // Handle clipping submit.
    clippingForm.onsubmit = function(event) {
      event.preventDefault();

      // Get the content.
      var name = document.getElementById('clipping-name').value;
      var subtitle = document.getElementById('clipping-subtitle').value;
      var content = document.getElementById('clipping-text').value;
      var file = document.getElementById('fid').value;

      // Set up the request to get the contents of the file.
      var xhr = new XMLHttpRequest();

      // Open the connection.
      xhr.open('GET', window.location.origin + "/api/rest/clipping.php?userId=" + uid + "&file=" + file + "&content=" + content + "&name=" + name + "&subtitle=" + subtitle, false);
      xhr.send();
      hideOverlay();

      var paras = document.getElementsByClassName('sidebar-list-link');

      while(paras[0]) {
        paras[0].parentNode.removeChild(paras[0]);
      }

      loadClippings();
      location.reload(true);
    }

  })();
</script>

<?php

require 'assets/layout/footer.php'

?>