<?php get_header();?>


  <div class="section section-gray">
  <div class="container">
<div class="section-header">

      <h5><?php the_title();?></h5>
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

    <a class="feed-post-avatar" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <?php echo get_avatar( get_the_author_email(), '60' );?></a>

    <div class="feed-post-info ">

    <a href="<?php the_permalink(); ?>" rel="bookmark" class="feed-post-title-link"><span class="feed-post-title" title="<?php echo get_the_title(); ?>"><?php echo get_the_title();?></span></a>
    <a class="feed-post-author-name" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a>

    </div>
  </div>
  </li>

<?php endwhile;wp_reset_postdata();?>

  </ul>
</div>




</div>
  </div>
<?php get_footer();?>
