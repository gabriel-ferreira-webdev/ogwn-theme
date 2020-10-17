<?php get_header();?>

<main>
  <div class="section section-gray">
  <div class="container">

<div class="section-header">
      <h5><?php the_title();?></h5>
</div>

    <!-- Posts feed -->
<div class="feed-posts">
  <ul>

<?php $catquery = new WP_Query( 'post_type=post&posts_per_page=12' ); ?>
<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
  <?php $author_id = get_the_author_meta('ID'); ?>

    <li class="feed-post">
      <!-- post categories -->
      <!--<div class="feed-category">
        <?php
        $categories = get_the_category();
        $cat = $categories[0];
        ?>
        <a href="<?php echo get_category_link($cat->term_id);?>"><?php echo $cat->name;?></a>
      </div>-->
      <!-- post thumbnail -->
      <div class="feed-post-thumb ">
        <a href="<?php the_permalink() ?>" rel="bookmark" class="feed-post-thumb-a" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></a>
      </div>

      <!-- post info -->
      <!-- <div class="feed-post-info-flex"> -->


                <div class="feed-post-info ">
                  <a href="<?php the_permalink(); ?>" rel="bookmark" class="feed-post-title-link"><span class="feed-post-title" title="<?php echo get_the_title(); ?>"><?php echo get_the_title();?></span></a>
                              <a class="feed-post-avatar " title="<?php echo get_author_name($author_id);?>" href="<?php echo get_author_posts_url($author_id); ?>"> <?php echo get_avatar( $author_id, '60' );?></a>
                  <a class="feed-post-author-name" title="<?php echo get_author_name($author_id);?>" href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_author_name($author_id);?></a>
                </div>

      <!-- </div> -->

    </li>

<?php endwhile;wp_reset_postdata();?>

  </ul>
</div>    <!-- Posts feed -->




</div>  <!-- Container -->
  </div>  <!-- Section -->

  </main>
<?php get_footer();?>
