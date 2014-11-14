<?php
// Ensure that the user is logged in, if not, redirect to the login page.
session_start();
if (!$_SESSION['current_user']) {
  $host = $_SERVER['HTTP_HOST'];
  $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'login.php';
  header("location: http://$host$uri/$extra");
}

// Get the config file.
require_once(dirname(__FILE__) . '/../../config.php');
// Inject javascript variables.
require_once 'helpers/javascript_variable_injection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $_TITLE_; ?></title>
  <meta name="description" content="<?php echo $_DESCRIPTION_; ?>">

  <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] . $_IWP_DIR_;?>/assets/css/skeleton.css">
  <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] . $_IWP_DIR_;?>/assets/css/layout.css">
  <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] . $_IWP_DIR_;?>/assets/css/sweet-alert.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:800,600,400' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="container">

  <div class="row sixteen columns">
    <div id="header">
      <div id="logo">
        <image src="http://<?PHP echo ($_SERVER['HTTP_HOST'] . $_IWP_DIR_); ?>/assets/images/HCI-Clippr-logo_pink.png" />
      </div>
      <div id="logout">
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </div>
