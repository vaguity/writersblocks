<?php
/**
 * Index
 */

get_header(); ?>

<div id="content" role="main">
  <div class="row">
  
  <?php /*
    $i = 0;
    $zone_posts = z_get_posts_in_zone( 'clips' );
    foreach ( $zone_posts as $zone_post ) :
      // increment a variable, then split at 3
      ++$i;
      // set up the markup for each box on the homepage
      echo '<li>' . get_the_title( $zone_post->ID ) . '</li>';
    endforeach;

    // echo get_post_meta($post->ID, 'key', true);

  */ ?>

  </div><!-- .row -->
</div><!-- #content -->

<?php get_sidebar('global-sidebar'); ?>

<?php get_footer(); ?>