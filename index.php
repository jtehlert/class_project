<?php
session_start();
if (!$_SESSION['current_user']) {
  $host = $_SERVER['HTTP_HOST'];
  $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'login.php';
  header("location: http://$host$uri/$extra");
}
$title = "Class Notebook";

require 'assets/layout/header.php'

?>

<div class="five columns">
	<?php require 'assets/layout/sidebar.php' ?>
</div>

<div class="eleven columns">
	<?php require 'assets/layout/main-page/content.php' ?>
</div>

<div id="overlay">
	<div>
		<a href="#" onclick="hideOverlay()">Close Modal</a>
        <p>Content you want the user to see goes here.</p>
    </div>
</div>

<script>

function showOverlay() {
	el = document.getElementById("overlay");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}

function hideOverlay() {
	el = document.getElementById("overlay");
	el.style.visibility = "hidden";
}

</script>

<?php

require 'assets/layout/footer.php'

?>