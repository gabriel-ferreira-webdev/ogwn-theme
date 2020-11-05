<?php 
/**
 * The main template file. It is required in all themes.
 *
 * This file will display all the posts in descending order (newest first).
 *
 * This is essentially the default blog listing page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
?>

<?php get_header(); // Loads header template. ?>


  <!-- Main Section
  ============================================= -->
  <main class="site-main">


    <!-- Post (Container)
    ============================================= -->
    <section id="post-container" class="container container--narrow">

      <!-- Page Title -->
      <h1 id="page-title" class="title"><?php wp_title(''); // Displays the page title. ?></h1>


        <!-- The Loop
        ============================================= -->
        <?php
        // The Loop - while any posts are available, display them.
        while ( have_posts() ) :
          the_post(); ?>


          <!-- Post Item (Container)
          ============================================= -->
          <section id="post-item-index" class="post-item-container-index">

            <!-- Post Title -->
            <h2 id="post-title" class="title"><a href="<?php the_permalink(); // Links to the post. ?>"><?php the_title(); // Displays the title of the post. ?></a></h2>


            <!-- Post Metabox
            ============================================= -->
            <div class="post-metabox">

              <p>Posted by <?php the_author_posts_link(); ?> on <?php the_date('F j, Y'); ?> at <?php the_time('g:i a');; ?> in <?php echo get_the_category_list(', '); // Displays the author, date, time and category. ?></p>

            </div><!-- .post-metabox -->


            <!-- Post Content (Excerpt)
            ============================================= -->
            <blockquote class="post-content">

              <?php the_excerpt(); // Displays the post excerpt. ?>
              <p><a href="<?php the_permalink(); // Links to the post. ?>">Continue reading &raquo;</a></p>

            </blockquote><!-- .post-content -->


          </section><!-- #post-item-index -->


        <?php endwhile; // End of The Loop. ?>

      <?php echo paginate_links(); // Displays paginated links for post pages. ?>

      <?php the_widget( 'WP_Widget_Archives', 'dropdown=1' ); // Displays the Archive widget. ?>

    </section><!-- #post-container -->


  </main><!-- .site-main -->


<?php get_footer(); // Loads footer template. ?>