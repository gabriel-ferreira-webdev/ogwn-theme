<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */
?>

<?php get_header(); // Loads header template. ?>


  <!-- Main Section
  ============================================= -->
  <main class="site-main">


    <!-- Error 404 Section
    ============================================= -->
    <section id="error-404-container" class="container container--narrow">

      <!-- Error 404 Title -->
      <h1 id="error-404-title" class="title"><?php esc_html_e( 'Location Not Found Page. (404.php)', 'ogwn' ); // Sanitizes & makes the text translatable. ?></h1>


      <!-- Error 404 Page Content
      ============================================= -->
      <div class="error-404-page-content">

        <p class="title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found. Maybe try a search?', 'boilerplate' ); // Sanitizes & makes the text translatable. ?></p>

          <?php get_search_form(); // Displays a search form. ?>

      </div><!-- .error-404-page-content -->


    </section><!-- #error-404-container -->


  </main><!-- #main -->


<?php get_footer(); // Loads footer template. ?>
