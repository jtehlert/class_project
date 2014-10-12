<?php
/*
Template Name: logic-logout
*/
?>
<?php
  session_start();
  session_unset();
  session_destroy();
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = '';
  header("Location: http://$host$uri/$extra");
?>
