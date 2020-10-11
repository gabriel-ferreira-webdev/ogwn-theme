<?php get_header();?>
<main>
<div class="section section-gray">


<div class="container" >
<div class="section-header">
    <h5><?php single_cat_title();?></h5>
</div>


  <div class="feed-posts">
    <ul>
  <?php if (have_posts()) : while(have_posts()) : the_post();?>
    <li class="feed-post">

      <?php
 $categories = get_categories('exclude=1');
   for ($i=0; $i < sizeof($categories); $i++) {
          ?>
    <div class="feed-category">
      <a href="<?php echo get_category_link($categories[$i]->term_id);?>"> <?php echo $categories[$i]->name;  ?> </a>
         </div>
               <?php  }  ?>


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
  <?php endwhile; endif;?>
</ul>
</div>


</div>
</div>
</main>
<?php get_footer();?>
