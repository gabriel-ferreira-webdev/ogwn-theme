<?php get_header();?>

<main>
<div class="section section-gray">
<div class="container" >

<div class="section-header">
    <h5><?php single_cat_title();?></h5>
</div>

    <!-- Posts feed -->
  <div class="feed-posts">
    <ul>
  <?php if (have_posts()) : while(have_posts()) : the_post();?>
<<<<<<< HEAD
    <?php $author_id = get_the_author_meta('ID'); ?>

      <li class="feed-post">
        <!-- post categories -->
        <div class="feed-category">
          <?php
          $categories = get_the_category();
          $cat = $categories[0];
          ?>
          <a href="<?php echo get_category_link($cat->term_id);?>"><?php echo $cat->name;?></a>
        </div>
        <!-- post thumbnail -->
        <div class="feed-post-thumb ">
          <a href="<?php the_permalink() ?>" rel="bookmark" class="feed-post-thumb-a" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></a>
        </div>

        <!-- post info -->
        <div class="feed-post-info-flex">

          <a class="feed-post-avatar" href="<?php echo get_author_posts_url($author_id); ?>"> <?php echo get_avatar( get_the_author_email(), '60' );?></a>

          <div class="feed-post-info">
            <a href="<?php the_permalink(); ?>" rel="bookmark" class="feed-post-title-link"><span class="feed-post-title" title="<?php echo get_the_title(); ?>"><?php echo get_the_title();?></span></a>
            <a class="feed-post-author-name" href="<?php echo get_author_posts_url($author_id); ?>"><?php the_author();?></a>
          </div>

        </div>

      </li>
=======
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
>>>>>>> 5235abadba555c20fcb8479e16ef438585f09c53
  <?php endwhile; endif;?>
</ul>
</div>  <!-- posts feed -->


</div>  <!-- container -->
</div>  <!-- section -->
</main>

<?php get_footer();?>
