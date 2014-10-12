<?php
/*
Template Name: upload_file
*/
?>
<?php
// Start the session.
session_start();

// If the user is not logged in, send them to the login.
if (empty($_SESSION['current_user'])) {
  $host = $_SERVER['HTTP_HOST'];
  $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = '';
  header("location: http://$host$uri/$extra");
}
?>

<?php
// Include worpressy and theme stuff.
wp_head();
?>
<!-- Grab our header font -->
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

<!-- Sexyness starts here -->
<h1 align="center" style="font-size: 1000%; font-family: 'Lobster', cursive;">Class Notebook</h1>

<form action="logic-upload_file" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
  <div class="form-group">
    <div class="col-sm-4 col-sm-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Upload File</h2>
        </div>
        <div class="panel-body">
          <input type="file" name="file" class="form-control" id="file" required><br />
          <button type="submit" class="btn btn-default col-sm-8 col-sm-offset-2" name="upload">Upload File</button>
        </div>
      </div>
    </div>
  </div>
</form>
<?php if (isset($_SESSION['login_error'])): ?>
  <div class="alert alert-danger col-sm-4 col-sm-offset-4" >
    <p><?php print($_SESSION['login_error']['message']); ?></p>
  </div>
<?php endif; ?>
