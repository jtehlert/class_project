<div>
  <div id="overlay-background"></div>
  <div id="add-comment-overlay" class="overlay">
    <div id="overlay-box">
      <div id="overlay-close-button" onclick="hideClippingOverlay()">X</div>
      <h2 id="overlay-title">Comment</h2>
      <div id="overlay-content">
        <form id="comment-form" action="" enctype="multipart/form-data" method="POST">
          <textarea type="text" id="comment-content" name="comment-content" placeholder="Enter your comment..." required></textarea>
          <button type="submit" id="comment-submit">Comment</button>
        </form>
      </div>
    </div>
  </div>
</div>
