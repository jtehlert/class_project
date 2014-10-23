<div id="main-page-content">

  <!-- Upload file modal -->
  <div>
    <div id="overlay-background"></div>
    <div id="overlay">
      <div id="overlay-box">
        <div id="overlay-close-button" onclick="hideOverlay()">X</div>
        <h2 id="overlay-title">Upload Your Document</h2>
        <div id="overlay-content">
          <form id="file-form" action="" enctype="multipart/form-data" method="POST">
            <div class="row">
              <input type="file" id="file-select" name="file" accept="text/plain" required />
            </div>
            <div class="row" style="margin-top: 20px;">
              At this time you may only upload .txt files
            </div>
            <div class="row">
              <button type="submit" id="upload-button">Upload</button>
            </div>
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

	<div id="content-header">
		<div id="info-button">
			
		</div>
		<div id="clipping-title">
			
		</div>
		<div id="share-button">
			
		</div>
		<div id="comment-button">
			
		</div>
		<div id="organize-button">
			
		</div>
	</div>

  	<textarea id="clipping-content">
  	</textarea>
</div>

<script>

document.querySelector('#info-button').onclick = function(){
	swal("Feature not implemented", "We'll get that working right away!")
};

document.querySelector('#share-button').onclick = function(){
	swal("Feature not implemented", "We'll get that working right away!")
};

document.querySelector('#comment-button').onclick = function(){
	swal("Feature not implemented", "We'll get that working right away!")
};

document.querySelector('#organize-button').onclick = function(){
	swal("Feature not implemented", "We'll get that working right away!")
};

</script>

