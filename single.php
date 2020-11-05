<?php
/**
 * The post template for displaying single posts.
 *
 * This file determines the default post template design and structure.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
?>

<?php get_header(); // Loads header template. ?>


  <!-- Main Section
  ============================================= -->
  <main class="site-main">


    <!-- Post Section (Container)
    ============================================= -->
    <section class="section background-gray">
      <div class="reading-container-shadow">


        <!-- The Loop
        ============================================= -->
        <?php
        // The Loop - while any posts are available, display them.
        while( have_posts() ) :
          the_post();

        // Retrieves the ID of the author of the current post.
        $author_id = get_the_author_meta('ID'); ?>

        <section class="article-header">

          <!-- Post Title -->
          <h2 class="title"><?php the_title(); // Displays the title of the post. ?></h2>


          <!-- Author Info
          ============================================= -->
          <div class="article-header-author">

            <!-- Author Avatar -->
            <a href="<?php echo get_author_posts_url($author_id); // Retrieves the URL to the author page with the ID provided. ?>">
              <?php echo get_avatar($author_id); // Retrieve the avatar <img> tag with the ID provided. ?>
            </a>

            <!-- Author Text -->
            <div class="article-header-info">
              <h3>
                <a href="<?php echo get_author_posts_url($author_id); // Retrieves the URL to the author page with the ID provided. ?>">
                  <?php the_author(); // Displays the name of the author of the current post. ?>
                </a>
              </h3>
              <span class="article-date"><?php the_date(); // Displays the date of the current post. ?></span>
            </div>

          </div><!-- .article-header-author -->

        </section><!-- .article-header -->


        <!-- Post Content
        ============================================= -->
        <article class="article-content">
          <?php the_content(); // Displays the post content. ?>
        </article>


        <?php endwhile; // End of the loop. ?>


      </div><!-- .reading-container-shadow -->
    </section><!-- .section -->


  </main><!-- .site-main -->

<?php get_footer(); // Loads footer template. ?>
