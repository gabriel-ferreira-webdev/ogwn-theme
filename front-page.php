<?php 
/**
 * The front-page template for our theme.
 * 
 * This file acts as the "Homepage" for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 */
?>

<?php get_header(); // Loads header template. ?>


  <!-- Main Section
  ============================================= -->
  <main class="site-main" role="main">


    <!-- Livefeed & Featured (Container)
    ============================================= -->
    <section id="livefeed-featured-section" class="section background-gray">


      <!-- Livefeed (Container)
      ============================================= -->
      <div id="livefeed-featured-flex-wrap" class="container">

        <!-- Live Player -->
        <div class="live-player-container">

          <div class="iframe-container">
            <iframe class="iframe" src="https://player.twitch.tv/?channel=onegreatworknetwork&parent=onegreatworknetwork.com&parent=onegreatworknetwork.com" frameborder="0" allowfullscreen="true" scrolling="no" width="100%" height="300px"></iframe>
          </div><!-- .iframe-container -->

          <div class="live-title"></div>

        </div><!-- .live-player-container -->


        <!-- Featured Content (Container)
        ============================================= -->
        <div id="featured-container" class="featured-content container">

          <!-- Featured Content -->
          <?php if ( is_active_sidebar( 'home_right_1' ) ) : // Determines whether a sidebar contains widgets. ?>

            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
              <?php dynamic_sidebar( 'home_right_1' ); // Displays the default sidebar. ?>
            </div><!-- #primary-sidebar -->

          <?php endif; ?>

        </div><!-- #featured-container -->

      </div><!-- #livefeed-featured-flex-wrap -->


    </section><!-- #livefeed-featured-section -->


    <!-- Content Creators Section
    ============================================= -->
    <section id="content-creators-section" class="section">

      <div class="container">

        <div class="section-header">
          <h5>CONTENT CREATORS</h5>
        </div><!-- .section-header -->

        <div class="author-list">

          <?php
            /*=============================================
              Author List Options
            =============================================*/

            $display_admins = True;
            $order_by = 'nicename'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
            $order = 'DESC'; // ASC or DESC
            $role = ''; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all' (custom role: 'content-creator')
            $avatar_size = 246;
            $hide_empty = false; // hides authors with zero posts

            /*===========================================*/

            // display_admins logic
            if( ! empty( $display_admins ) ) {
              $blogusers = get_users( 'orderby=' . $order_by . '&role=' . $role );

            } else {
              $admins = get_users( 'role=administrator' );
              $exclude = array();

              foreach( $admins as $admin ) {
                $exclude[] = $admin->ID;
              }
              
              $exclude = implode( ',', $exclude );
              $blogusers = get_users( 'exclude=' . $exclude . '&orderby=' . $order_by . '&order=' . $order . '&role=' . $role );
            }

            // user storage array
            $authors = array();

            // user info loop 1
            foreach( $blogusers as $bloguser ) {
              $user = get_userdata( $bloguser->ID );

              // hide_empty logic
              if( ! empty( $hide_empty ) ) {
                $numposts = count_user_posts( $user->ID );

                if( $numposts < 1 ) continue;
              }
                
              $authors[] = (array) $user;
            }

            // user info loop 2
            foreach( $authors as $author ) {
              $display_name = $author['data']->display_name;
              $avatar = get_avatar( $author['ID'], $avatar_size );
              $author_profile_url = get_author_posts_url( $author['ID'] );
              
              // start of user div
              echo "<div class='user'>";

              // author-gravatar div
              echo '<div class="author-gravatar"><a href="', $author_profile_url, '">', $avatar , '</a></div>';

              // author-name div
              echo '<div class="author-name"><a href="', $author_profile_url, '" class="contributor-link">', $display_name, '</a></div>';

              // end of user div
              echo "</div>";
            }

            // no users logic
            if ( empty( $authors ) ) {
              echo 'No applicable users found.';
            }

          ?>

        </div><!-- .author-list -->

      </div><!-- .container -->

    </section><!-- #content-creators-section -->


  </main><!-- .site-main -->

<?php get_footer(); // Loads footer template. ?>
