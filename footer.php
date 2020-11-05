<?php
/**
 * The footer template for our theme.
 *
 * This is the file that displays the <footer> section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>

  <!-- Footer Section
  ============================================= -->
  <footer class="site-footer">

    <div class="container">
      <?php
        // Displays the Footer Navigation Menu.
        wp_nav_menu( 
          array(
            'theme_location' => 'footer-menu'
          )
        );
      ?>

      <a class="footer-logo" href="#"></a>

    </div>

  </footer><!-- .site-footer -->


<?php wp_footer(); // Prints scripts or data before the closing body tag on the front end. ?>

</body>
</html>
