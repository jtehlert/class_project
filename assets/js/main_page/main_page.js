$(document).ready(function() {
    loadClippings();
    fileUploadFormHandler();
})

// Loads clipping links into the sidebar.
function loadClippings() {
    $.ajax({
        url: window.location.origin + '/api/rest/clipping.php?uid=' + JSIuid
    }).done(function(response) {
        var responseObject = JSON.parse(response);
        for (var i in responseObject) {
            $.ajax({
                url: window.location.origin + '/api/markup/markup-clipping_sidebar_row.php?id=' + responseObject[i].ID + '&name=' + responseObject[i].NAME + '&subtitle=' + responseObject[i].SUBTITLE
            }).done(function(markup) {
                $('#sidebar-list').prepend(markup);
            });
        }
    });
}

// Modal controls.
function showClippingOverlay() {
    el = document.getElementById("add-clipping-overlay");
    el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";

    showOverlayBackground();
}

function hideClippingOverlay() {
    el = document.getElementById("add-clipping-overlay");
    el.style.visibility = "hidden";

    hideOverlayBackground();
}

// Share Modal controls.
function showShareOverlay() {
    el = document.getElementById("share-overlay");
    el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";

    showOverlayBackground();
}

function hideShareOverlay() {
    el = document.getElementById("share-overlay");
    el.style.visibility = "hidden";

    hideOverlayBackground();
}

function showOverlayBackground() {
    bg = document.getElementById("overlay-background");
    bg.style.display = (bg.style.display == "block") ? "none" : "block";
}

function hideOverlayBackground() {
    bg = document.getElementById("overlay-background");
    bg.style.display = "none";
}

// Onmouseup handler to copy text from clipping source to clipping result.
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

    if(contents.NAME.length > 0)
    {
        document.getElementById('info-button').innerHTML = 'Info';
        document.getElementById('share-button').innerHTML = 'Share';
        document.getElementById('comment-button').innerHTML = 'Comment';
        document.getElementById('organize-button').innerHTML = 'Organize';
    }
}

function fileUploadFormHandler() {
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

        // Change which form is showing.
        fileUploadForm.style.display = 'none';
        clippingForm.style.display = 'block';

        // Reset the upload button.
        uploadButton.innerHTML = 'Upload';
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
        xhr.open('GET', window.location.origin + "/api/rest/clipping.php?userId=" + JSIuid + "&file=" + file + "&content=" + content + "&name=" + name + "&subtitle=" + subtitle, false);
        xhr.send();
        hideOverlay();

        var paras = document.getElementsByClassName('sidebar-list-link');

        while(paras[0]) {
            paras[0].parentNode.removeChild(paras[0]);
        }

        loadClippings();

        // Reset the form
        clippingForm.style.display = 'none';
        fileUploadForm.style.display = 'block';

        clippingForm.reset();
        fileUploadForm.reset();
    }
}
