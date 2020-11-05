<?php
/**
 * The page template for displaying all pages.
 *
 * This file determines the default page template design and structure.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 */
?>

<?php get_header(); // Loads header template. ?>


  <!-- Main Section
  ============================================= -->
  <main class="site-main">


    <!-- Page Section (Container)
    ============================================= -->
    <section class="section background-gray">
      <div class="reading-container-shadow">

        <!-- Page Title -->
        <h5 class="section-header"><?php the_title(); // Displays the title of the page. ?></h5>


        <!-- The Loop
        ============================================= -->
        <?php
        // The Loop - while any pages are available, display them.
        while ( have_posts() ) :
          the_post(); ?>


        <!-- Page Content
        ============================================= -->
        <article class="article-content">
          <?php the_content(); // Displays the page content. ?>
        </article>


        <?php endwhile; // End of the loop. ?>


      </div><!-- .reading-container-shadow -->
    </section><!-- .section -->


  </main><!-- .site-main -->

<?php get_footer(); // Loads footer template. ?>
