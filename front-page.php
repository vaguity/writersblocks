<?php
/**
 * Index
 */

get_header(); ?>

<div id="content" role="main">
  <div id="front-page-clips">
    <div class="row">
  
    <?php
      $i = 0;
      $zone_posts = z_get_posts_in_zone( 'front-page-clips' );
      foreach ( $zone_posts as $zone_post ) :
        // increment a variable, then split at 3
        ++$i;
        // set up the markup for each box on the homepage
        if ($i %3 == 0) {
          echo '<div class="col_4 omega">' . get_the_title( $zone_post->ID ) . '</div><!-- .col_4 --></div><!-- .row --><div class="row">';
        }
        else {
          echo '<div class="col_4">' . get_the_title( $zone_post->ID ) . '</div><!-- .col_4 -->';
        }
      endforeach;

      // echo get_post_meta($post->ID, 'key', true);

    ?>
    </div><!-- .row -->
  </div><!-- #front-page-clips -->
</div><!-- #content -->

<?php get_sidebar('global-sidebar'); ?>

<?php get_footer(); ?>