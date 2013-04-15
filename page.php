<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="content" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="page" id="page-<?php the_ID(); ?>">
    <header class="row padding_bottom_30">
      <div class="col_10 suf_2 omega headline">
      <h2><?php the_title(); ?></h2>
    </div>
    </header>
    <div class="row">
      <div class="col_8 suf_4 omega">
        <div class="copy">
    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
        </div>
      </div>
    </div>
  
  </article>
  <?php endwhile; endif; ?>

</div>

<?php /* get_sidebar(); */ ?>

<?php get_footer(); ?>
