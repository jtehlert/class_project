<?php
/*
Template Name: logic-login_or_create
*/
?>
<?php
  // Start the session.
  session_start();

  // Unset any previous session errors.
  unset($_SESSION['login_error']);

  // If the user is already logged in, send them to the home page.
  if (isset($_SESSION['current_user'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'home';
    header("location: http://$host$uri/$extra");
  }

  // Make sure we actually were brought here from the login page, if not,
  // redirect back.
  if (empty($_POST['sign_in']) && empty($_POST['create'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'home';
    header("location: http://$host$uri/$extra");
  }

  // Running error detection.
  $error = '';

  // Check if we are trying to sign-in.
  if (isset($_POST['sign_in'])) {

    // Ensure that we have both an email and a password.
    if (empty($_POST['email']) && empty($_POST['password'])) {
      $error = "Looks like you forgot to enter an email and password.";
    } elseif (empty($_POST['email'])) {
      $error = "Looks like you forgot to enter an email.";
    } elseif (empty($_POST['password'])) {
      $error = "Looks like you forgot to enter a password.";
    } else {

      // Define $username and $password
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Get any password associated with the entered email.
      $pass = get_option($email, NULL);

      if (isset($pass) && $password == $pass) {

        // Save the user in the session.
        $_SESSION['current_user'] = $email;
      } else {

        // Save the error.
        $error = 'Looks like you entered an incorrect password.';
      }
    }

    // Check to see if we have any errors. If we do, redirect back to the login
    // page, if not, redirect home.
    if (empty($error)) {
      $host = $_SERVER['HTTP_HOST'];
      $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = 'home';
      header("location: http://$host$uri/$extra");
    } else {
      $_SESSION['login_error']['message'] = $error;
      $host = $_SERVER['HTTP_HOST'];
      $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = '';
      header("location: http://$host$uri/$extra");
    }
  }
  elseif (isset($_POST['create'])) {

    // Ensure that we have both an email and a password.
    if (empty($_POST['email']) && empty($_POST['password'])) {
      $error = "Looks like you forgot to enter an email and password.";
    } elseif (empty($_POST['email'])) {
      $error = "Looks like you forgot to enter an email.";
    } elseif (empty($_POST['password'])) {
      $error = "Looks like you forgot to enter a password.";
    } else {

      // Save the profile info.
      add_option($_POST['email'], $_POST['password']);

      // Save the user in the session.
      $_SESSION['current_user'] = $email;
    }

    // Check to see if we have any errors. If we do, redirect back to the login
    // page, if not, redirect home.
    if (empty($error)) {
      $host = $_SERVER['HTTP_HOST'];
      $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = 'home';
      header("location: http://$host$uri/$extra");
    } else {
      $_SESSION['login_error']['message'] = $error;
      $host = $_SERVER['HTTP_HOST'];
      $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = '';
      header("location: http://$host$uri/$extra");
    }
  }
?>
