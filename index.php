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

    <div class="section-header" id="header-featured">
      <h5>FEATURED</h5>
    </div>
    <!-- Featured Posts feed -->
    <div class="feed-posts featured-posts">
      <ul>
        <?php $catquery = new WP_Query( 'category_name=featured&posts_per_page=6' ); ?>
        <?php while($catquery->have_posts()) : $catquery->the_post(); ?>

        <?php $author_id = get_the_author_meta('ID'); ?>

          <li class="feed-post featured-post">
            <!-- post categories -->
            <div class="feed-category">
              <?php
              $categories = get_the_category();
              $cat = $categories[0];
              ?>
              <a href="<?php echo get_category_link($cat->term_id);?>"><?php echo $cat->name;?></a>
            </div>
            <!-- post thumbnail -->
            <div class="feed-post-thumb featured-post-thumb">
              <a href="<?php the_permalink() ?>" rel="bookmark" class="feed-post-thumb-a" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></a>
            </div>

            <!-- post info -->
            <div class="feed-post-info-flex featured-post-info-flex">

              <a class="feed-post-avatar featured-post-avatar" href="<?php echo get_author_posts_url($author_id); ?>"> <?php echo get_avatar( get_the_author_email(), '60' );?></a>

              <div class="feed-post-info featured-post-info">
                <a href="<?php the_permalink(); ?>" rel="bookmark" class="feed-post-title-link"><span class="feed-post-title" title="<?php echo get_the_title(); ?>"><?php echo get_the_title();?></span></a>
                <a class="feed-post-author-name" href="<?php echo get_author_posts_url($author_id); ?>"><?php the_author();?></a>
              </div>

            </div>

          </li>

        <?php endwhile;wp_reset_postdata();?>
      </ul>
    </div>

</div>  <!-- feed-container -->


</div>  <!-- livefeed-featured container -->
</div>  <!-- livefeed-featured section -->

    <!-- Content Creators -->
<div class="section" id="content-creators-section">
  <div class="container">

    <div class="section-header">
      <h5>CONTENT CREATORS</h5>
    </div>

    <?php echo do_shortcode( '[authoravatars avatar_size=300 link_to_authorpage=true show_name=true show_biography=false ]' ); ?>

  </div>
</div>

</main>

<?php get_footer();?>
