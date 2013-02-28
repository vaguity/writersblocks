<?php
/**
 * Footer
 */
?>

  <footer id="footer">
    <div class="row">
    <div class="col_12 omega">
      <p>&copy; <?php echo date("Y"); ?> <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>.
        <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
      </p>
    </div><!-- .col_12 -->
    </div><!-- .row -->
  </footer>
</div><!-- #container -->

  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>js/vendor/jquery-1.8.0.min.js"><\/script>')</script>


  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/plugins.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/main.js") ?>
	   
  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <?php /* <script>
    var _gaq=[['_setAccount','UA-11602810-1'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
  */ ?>
			   
  <?php wp_footer(); ?>

</body>
</html>
