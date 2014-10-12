<?php
/*
Template Name: login
*/
?>

<?php
  // Check if we were redirected back to this page because of an authentication error.
  session_start();
  if (isset($_SESSION['login_error'])) {
    print('invalid login');
  }
?>

<?php //get_header(); ?>
<?php wp_head(); ?>
<div id="content" class="clearfix row">
  <div id="main" class="col col-lg-12 clearfix" role="main">
    <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
        <section class="post_content">
          <?php the_content(); ?>
        </section> <!-- end article section -->
      </article> <!-- end article -->
    <?php endwhile; ?>
  </div> <!-- end #main -->
</div> <!-- end #content -->
