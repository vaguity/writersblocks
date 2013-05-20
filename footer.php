<?php
/**
 * Footer
 */
?>

  <footer id="footer">
    <div class="row">
    <div class="col_4">
        <div id="footer-left">
        <?php 
        if ( dynamic_sidebar('footer-widget-1') ) : 
        else : 
        ?>
        <?php endif; ?>
        </div><!-- #footer-left -->
    </div>
    <div class="col_4">
        <div id="footer-center">
        <?php 
        if ( dynamic_sidebar('footer-widget-2') ) : 
        else : 
        ?>
        <?php endif; ?>
        </div><!-- #footer-center -->
    </div>
    <div class="col_4 omega">
        <div id="footer-right">
        <h3>Sitemap</h3>
        <nav id="footer-navigation">
        <?php wp_nav_menu(
          array(
            'theme_location' => 'primary-navigation',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'before' => '',
            'after' => ''
          )
        ); ?>
        </nav><!-- #footer-navigation -->

        <p>&copy; <?php echo date("Y"); ?> <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>.
            <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
        </p>
        </div><!-- #footer-right -->
    </div><!-- .col_4 -->
    </div><!-- .row -->
  </footer>
</div><!-- #container -->

  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/moment.min.js"></script>
  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/twitter-ck.js"></script>

  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/plugins.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/main.js") ?>
	   
  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
			   
  <?php wp_footer(); ?>

</body>
</html>
