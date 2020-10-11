<?php
/*
Template Name: Search Page
*/
?>
<?php

global $query_string;

wp_parse_str( $query_string, $search_query );
$search = new WP_Query( $search_query );

?>
<?php get_header();?>


<div class="section section-gray">
  <div class="container">

    <div class="section-header">
      <h5>Search: <?php echo get_search_query(); ?></h5>
    </div>

    <!-- Posts feed -->
<div class="feed-posts">
  <ul>

<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>

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

  <?php endwhile;wp_reset_postdata();?>
</ul>
</div>    <!-- Posts feed -->
  </div>
</div>


<?php get_footer();?>
