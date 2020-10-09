<?php get_header();?>

<main>

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

    <?php echo do_shortcode( '[authoravatars avatar_size=300 link_to_authorpage=true show_name=true show_biography=false roles=content_creator]' ); ?>

  </div>
</div>

</main>

<?php get_footer();?>
