<?php
/**
 * Template Name: page-user_login
 */

get_header();
?>



<form action="logic_user_login.php">
  <input type="email" placeholder="email" pattern="jmdarling@me.com" required/>
  <input type="password" placeholder="password" required/>
  <input type="submit" value="Login" />
</form>

<?php
get_sidebar();
get_footer();