<?php get_header();?>

<main>

<div class="section" id="livefeed-featured-section">

  <div id="livefeed-featured" class="container">




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
<div class="feed-container container" id="featured-container">

<div class="section-header" id="header-featured">
 <h5>FEATURED</h5>
</div>

 <div class="feed-posts featured-posts">
   <ul>
     <?php $featured_id = 9; ?>
 <?php $catquery = new WP_Query( 'cat='.$featured_id.'&posts_per_page=6' ); ?>
 <?php while($catquery->have_posts()) : $catquery->the_post(); ?>

 <li class="feed-post featured-post">

   <div class="feed-category">
     <?php
     $categories = get_the_category();
     if ($categories[0]->term_id == $featured_id) {
   $cat = $categories[1];
 }else{
   $cat = $categories[0];
 }
     ?>
<a href="<?php echo get_category_link($cat->term_id);?>"> <?php echo $cat->name;  ?> </a>
   </div>
<div class="feed-post-thumb featured-post-thumb">
 <a href="<?php the_permalink() ?>" rel="bookmark" class="feed-post-thumb-a" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></a>
</div>
 <div class="feed-post-info-flex featured-post-info-flex">

   <a class="feed-post-avatar featured-post-avatar" href="<?php get_the_author_link() ?>"> <?php echo get_avatar( get_the_author_email(), '60' );?></a>

   <div class="feed-post-info featured-post-info">

   <a href="<?php the_permalink(); ?>" rel="bookmark" class="feed-post-title-link featured-post-title-link"><span class="feed-post-title featured-post-title" title="<?php echo get_the_title(); ?>"><?php echo get_the_title();?></span></a>
   <a class="feed-post-author-name featured-post-author-name" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a>

   </div>
 </div>
 </li>

<?php endwhile;wp_reset_postdata();?>

   </ul>
 </div>



</div>

  </div>





  <div class="feed-container container">

<div class="section-header">
  <h5>RECENT</h5>
</div>

  <div class="feed-posts">
    <ul>

  <?php $catquery = new WP_Query( 'post_type=post&posts_per_page=12' ); ?>
  <?php while($catquery->have_posts()) : $catquery->the_post(); ?>

  <li class="feed-post">

    <div class="feed-category">
      <?php
      $categories = get_the_category();
      if ($categories[0]->term_id == $featured_id) {
    $cat = $categories[1];
  }else{
    $cat = $categories[0];
  }
      ?>
<a href="<?php echo get_category_link($cat->term_id);?>"> <?php echo $cat->name;  ?> </a>
    </div>
<div class="feed-post-thumb">
  <a href="<?php the_permalink() ?>" rel="bookmark" class="feed-post-thumb-a" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></a>
  </div>
  <div class="feed-post-info-flex">

    <a class="feed-post-avatar" href="<?php get_the_author_link() ?>"> <?php echo get_avatar( get_the_author_email(), '60' );?></a>

    <div class="feed-post-info">

    <a href="<?php the_permalink() ?>" rel="bookmark" class="feed-post-title-link"><span class="feed-post-title" title="<?php echo get_the_title(); ?>"><?php echo get_the_title();?></span></a>
    <a class="feed-post-author-name" href="<?php get_the_author_link()?>"> <?php the_author() ?></a>

    </div>
  </div>
  </li>

<?php endwhile;wp_reset_postdata();?>

    </ul>
  </div>



</div>


  </div>


<div class="section" id="content-creators-section">
  <div class="container">

<div class="section-header">
  <h5>CONTENT CREATORS</h5>
</div>

<?php echo do_shortcode( '[authoravatars avatar_size=300 link_to_authorpage=true show_name=true hiddenusers=1,2,5,6 show_biography=false]' ); ?>

</div>
  </div>

</main>

<?php get_footer();?>
