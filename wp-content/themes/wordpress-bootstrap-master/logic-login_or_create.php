<?php
/*
Template Name: logic-login_or_create
*/
?>
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['sign_in'])) {

  if (empty($_POST['email']) || empty($_POST['password'])) {
    print("error");
    $error = "Username or Password is invalid";
  }
  else
  {
// Define $username and $password
    $email=$_POST['email'];
    $password=$_POST['password'];

    $pass = get_option($email, NULL);
    if (isset($pass) && $password == $pass) {
      $_SESSION['login_user'] = $email; // Initializing Session
      $host  = $_SERVER['HTTP_HOST'];
      $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = 'home';
      header("Location: http://$host$uri/$extra");
    } else {
      $_SESSION['login_error'] = 1;
      $host  = $_SERVER['HTTP_HOST'];
      $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = '';
      header("Location: http://$host$uri/$extra");
    }
  }
}
elseif (isset($_POST['create'])) {
  if (empty($_POST['email']) || empty($_POST['password'])) {
    print("error");
    $error = "Username or Password is invalid";
  } else {
    add_option($_POST['email'], $_POST['password']);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'home';
    header("Location: http://$host$uri/$extra");
  }
}
?>
