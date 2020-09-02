
<?php get_header();?>

<main>

<div class="section" id="livefeed-featured-section">

  <div id="livefeed-featured">




<div class="live-player-container">

<div class="section-header container" id="header-live">
  <figure id="live-dot"></figure>
  <h5>NOW PLAYING:</h5>
</div>

<iframe id="twitch-iframe" src="https://player.twitch.tv/?channel=whatonearth93&parent=" frameborder="0" allowfullscreen="true" scrolling="no" ></iframe>

  <div class="live-title container">
    <a href="#">Now Playing:  What On Earth Is Happening</a>
  </div>

</div>




<div class="featured-container container">

<div class="section-header" id="header-featured">
  <h5>FEATURED</h5>
</div>

  <div class="featured-posts">
    <ul>

  <?php $catquery = new WP_Query( 'cat=9&posts_per_page=9' ); ?>
  <?php while($catquery->have_posts()) : $catquery->the_post(); ?>

  <li class="featured-post">

    <div class="featured-category">
            <div class="category-border"></div>
      <?php the_category(); ?>
    </div>

  <a href="<?php the_permalink() ?>" rel="bookmark" class="featured-post-thumb-a"><?php the_post_thumbnail(); ?></a>

  <div class="featured-post-info-flex">

    <a class="featured-post-avatar" href="<?php get_the_author_link() ?>"> <?php echo get_avatar( get_the_author_email(), '60' );?></a>

    <div class="featured-post-info">

    <a href="<?php the_permalink() ?>" rel="bookmark" class="featured-post-title-link"><span class="featured-post-title" title="<?php echo get_the_title(); ?>"><?php echo get_the_title();?></span></a>
    <a class="featured-post-author-name" href="<?php get_the_author_link()?>"> <?php the_author() ?></a>

    </div>
  </div>
  </li>

<?php endwhile;wp_reset_postdata();?>

    </ul>
  </div>



</div>


  </div>

  </div>


<div class="section" id="content-creators-section">
  <div class="container">

<div class="section-header">
  <h5>CONTENT CREATORS</h5>
</div>

<?php echo do_shortcode( '[authoravatars avatar_size=300 link_to_authorpage=true show_name=true show_biography=false]' ); ?>

</div>
  </div>

</main>

<?php get_footer();?>
