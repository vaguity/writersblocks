<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="content" role="main">
  <div id="clip">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <?php
    global $post;
    
    $clip_pullquote = get_post_meta( $post->ID, '_clip_pullquote', true );
    
    $clip_link = get_post_meta( $post->ID, '_clip_link', true );
    if ($clip_link == false) {
      $clip_link = '';
    }
    
    $clip_rawpubdate = get_post_meta( $post->ID, '_clip_pubdate', true );
    if ($clip_rawpubdate) {
      $clip_pubdate = date('M. d, Y', $clip_rawpubdate);
    }
    else {
      $clip_pubdate = '';
    }
    
    $clip_image = get_post_meta( $post->ID, '_clip_image', true );
    
    $clip_origpub = wp_get_post_terms( $post->ID, 'clip_pub', array('fields' => 'names') );
    if ($clip_origpub == false) {
      $clip_origpub = array();
    }
  ?>

  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">

    <header class="row padding_bottom_30">
      <div class="col_10 suf_2 omega headline">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </header><!-- .row -->
    
    <div class="row">
      <div class="col_8">
        <div class="copy">
          <?php the_content('Read the rest of this clip &raquo;'); ?>
        </div>
      </div><!-- .col_8 -->

      <div class="col_4 omega">
      <footer>
        <div class="clip-meta">
        <section class="author">by <strong><?php the_author(); ?></strong></section>

        
        <?php if (isset($clip_origpub[0])) {
        echo'<section class="originally-published">from <a href="' . $clip_link . '">' . $clip_origpub[0] . '</a> &ndash; <time datetime="' . $clip_pubdate . '">' . $clip_pubdate . '</time></section>';
        } ?>
        </div><!-- .clip-meta -->

        <?php if (!empty($clip_pullquote)) {
        echo '<aside class="pullquote">' . $clip_pullquote . '</aside>';
        }
        else {
          echo '<div class="pullquote"><hr /></div>';
        } ?>

        <nav class="prev-next">
          <div><?php echo previous_post_link('Previous clip:<br />%link'); ?></div>
          <hr />
          <div><?php echo next_post_link('Next clip:<br />%link'); ?></div>
        </nav>
      </footer>


      </div><!-- .col_4 omega -->

    </div><!-- .row -->

  </article>

<?php endwhile; else: ?>

  <p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

</div><!-- #clip -->

<?php
  $more_clips = get_posts( array (
    'post_type' => 'clip',
    'posts_per_page' => '2',
    'orderby' => 'rand' )
  );

  if ( !empty ( $more_clips ) ) { 
      $i = 0; ?>

<div id="more-clips">
  
  <div class="row">
    <div class="col_8 suf_4 omega">
      <h2>More clips</h2>
    </div>
  </div>

  <?php
    foreach ( $more_clips as $more_clip ) :

      // get all the fields
      $mc_title = get_the_title( $more_clip->ID );
      $mc_permalink = get_permalink( $more_clip->ID );
      $mc_cardtype = get_post_meta( $more_clip->ID, '_clip_display', true );
      $mc_image = get_post_meta( $more_clip->ID, '_clip_image', true );
      $mc_quote = get_post_meta( $more_clip->ID, '_clip_pullquote', true );

      // get the cardtype, if it's display_image
      if ($mc_cardtype == 'display_image') {
        $mc_card = '<div class="image-card card"><h3><a href="' . $mc_permalink . '">' . $mc_title . '</a></h3><a href="' . $mc_permalink . '"><div class="image" style="background-image: url(\'' . $mc_image . '\');"></div></a></div>';
      }
      // for eventual hovertitle: <h3>' . $mc_title . '</h3>\n
      elseif ($mc_cardtype == 'display_pullquote') {
        $mc_card = '<div class="quote-card card"><h3><a href="' . $mc_permalink . '">' . $mc_title . '</a></h3><a href="' . $mc_permalink . '"><p>' . $mc_quote . '</p></a></div>';
      }
      else {
        $mc_card = '<div class="title-card card"><a href="' . $mc_permalink . '"><h3>' . $mc_title . '</h3></a></div>';
      }

      // increment a variable
      ++$i;
      // set up the markup for each box
      if ($i == 1) {
        echo '<div class="row"><div class="col_4">' . $mc_card . '</div><!-- .col_4 -->';
      }
      elseif ($i == 2) {
        echo '<div class="col_4 suf_4 omega">' . $mc_card . '</div><!-- .col_4 --></div><!-- .row -->';
      }
      else { }

  ?>

<?php
    endforeach;
  }
  else { }
?>

</div><!-- #more-posts -->
</div><!-- #content -->

<?php get_footer(); ?>
