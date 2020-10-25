<?php
/*
Template Name: Hosts
Template Post Type: page
*/
// Page code here..
get_header();?>

<main>
  <div class="section section-gray">
    <div class="container">
      <div class="section-header">
        <h5><?php the_title();?></h5>
      </div>

      <div class="author-list">

          <?php
      // The Query
      $user_query = new WP_User_Query( array( 'role' => 'content-creator' ) );

      // User Loop
      if ( ! empty( $user_query->get_results() ) ) {
      	foreach ( $user_query->get_results() as $user ) {
          echo "<div class='user'>";
          echo '<a href="/author/';
          echo the_author_meta('nickname',$user->ID);
          echo '">';
          echo get_avatar($user->ID, 300);
          echo "</a>";

          echo '<a class="name" href="/author/';
          echo the_author_meta('nickname',$user->ID);
          echo '">';
          the_author_meta('display_name',$user->ID);
          echo "</a>";
          echo "</div>";
      	}
      } else {
      	echo 'No users found.';
      }
      ?>

      </div>

    </div>
  </div>
</main>

<?php get_footer();?>
