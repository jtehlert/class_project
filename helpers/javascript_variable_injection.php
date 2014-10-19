<?php
session_start();

// Ensure the user is logged in.
if (!$_SESSION['current_user']) {
  $host = $_SERVER['HTTP_HOST'];
  $extra = 'login.php';
  header("location: http://$host/$extra");
}

// Save the user's UID.
$uid = $_SESSION['current_user'];
?>

<!-- Javascript variable injection -->
<script>
  var uid = <?php print($uid) ?>;
</script>