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
        // get all the fields
        $zp_title = get_the_title( $zone_post->ID );
        $zp_permalink = get_permalink( $zone_post->ID );
        $zp_cardtype = get_post_meta( $zone_post->ID, '_clip_display', true );
        $zp_image = get_post_meta( $zone_post->ID, '_clip_image', true );
        $zp_quote = get_post_meta( $zone_post->ID, '_clip_pullquote', true );

        // get the cardtype, if it's display_image
        // why is it stripping all the slashes out of $zp_image?
        if ($zp_cardtype == 'display_image') {
          $zp_card = '<div class="image-card card"><a href="' . $zp_permalink . '"><div class="image" style="background-image: url(\'' . $zp_image . '\');"></div>

          <img src="' . $zp_image . '" /></a><h3><a href="' . $zp_permalink . '">' . $zp_title . '</a></div>';
        }
        // for eventual hovertitle: <h3>' . $zp_title . '</h3>\n
        elseif ($zp_cardtype == 'display_pullquote') {
          $zp_card = '<div class="quote-card card"><a href="' . $zp_permalink . '"><p>' . $zp_quote . '</p></a></div>';
        }
        else {
          $zp_card = '<div class="title-card card"><a href="' . $zp_permalink . '"><h3>' . $zp_title . '</h3></a></div>';
        }

        // increment a variable, then split at 3
        ++$i;
        // set up the markup for each box on the homepage
        if ($i %3 == 0) {
          echo '<div class="col_4 omega">' . $zp_card . '</div><!-- .col_4 --></div><!-- .row -->';
        }
        elseif ($i %4 == 0) {
          echo '<div class="row"><div class="col_4">' . $zp_card . '</div><!-- .col_4 -->';
        }
        else {
          echo '<div class="col_4">' . $zp_card . '</div><!-- .col_4 -->';
        }
      endforeach;

    ?>
    </div><!-- .row -->
  </div><!-- #front-page-clips -->
</div><!-- #content -->

<?php // get_sidebar('global-sidebar'); ?>

<?php get_footer(); ?>