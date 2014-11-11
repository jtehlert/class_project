<div id="main-page-content">

  <?php 
    require 'overlays/add-clipping.php';
    require 'overlays/share.php';
    require 'overlays/add-notebook.php';
    require 'overlays/add-comment.php';
  ?>

	<div id="content-header">
		<div id="info-button">
			
		</div>
		<div id="clipping-title">
			
		</div>
		<div id="share-button" onclick="showShareOverlay()">
			
		</div>
		<div id="comment-button">
			
		</div>
		<div id="organize-button">
			
		</div>
	</div>

  <textarea id="clipping-content">
  </textarea>

  <div id="comments-area">
    <div id="comments-header">
      <h3 id="comments-header-text">Comments</h3>
      <div id="comments-header-horizontal-line"></div>
    </div>
    <div id="new-comment-row" onclick="showCommentOverlay()">
      <h4>Add a new comment</h4>
    </div>
    <div id="comments-content">

    </div>
  </div>
</div>

<script>

document.querySelector('#info-button').onclick = function(){
	swal("Feature not implemented", "We'll get that working right away!")
};

document.querySelector('#comment-button').onclick = function(){
	swal("Feature not implemented", "We'll get that working right away!")
};

document.querySelector('#organize-button').onclick = function(){
	swal("Feature not implemented", "We'll get that working right away!")
};

</script>

