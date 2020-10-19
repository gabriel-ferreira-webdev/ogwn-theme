<?php get_header();?>

<main  role=”main”>

  <div class="section section-gray" id="livefeed-featured-section">
    <div id="livefeed-featured" class="container">
      <!-- Twitch player -->
      <div class="live-player-container">
        <!-- <div class="section-header" id="header-live">
        <figure id="live-dot"></figure>
        <h5>NOW PLAYING:</h5>
      </div> -->
      <div class="iframe-container">
        <iframe id="twitch-iframe" src="https://player.twitch.tv/?channel=onegreatworknetwork&parent=ogwn.net&parent=ogwn.net" frameborder="0" allowfullscreen="true" scrolling="no" width="100%" height="300px"></iframe>
      </div>
      <!-- <div class="live-title">
      <a href="#">Now Playing:  What On Earth Is Happening</a>
    </div> -->
  </div>
    <!-- Featured Content -->
  <div class="feed-container container" id="featured-container">

    <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
    	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
    		<?php dynamic_sidebar( 'home_right_1' ); ?>
    	</div><!-- #primary-sidebar -->
    <?php endif; ?>

</div>  <!-- feed-container -->


</div>  <!-- livefeed-featured container -->
</div>  <!-- livefeed-featured section -->

    <!-- Content Creators -->
<div class="section" id="content-creators-section">
  <div class="container">

    <div class="section-header">
      <h5>CONTENT CREATORS</h5>
    </div>

    <?php
// The Query
$user_query = new WP_User_Query( array( 'role' => 'content_creator' ) );

// User Loop
if ( ! empty( $user_query->get_results() ) ) {
	foreach ( $user_query->get_results() as $user ) {
    echo get_avatar($user->ID);
    the_author_meta('display_name',$user->ID);
	}
} else {
	echo 'No users found.';
}
?>

  </div>
</div>

</main>

<?php get_footer();?>
