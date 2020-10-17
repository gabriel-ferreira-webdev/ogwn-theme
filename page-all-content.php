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

          <?php include("feed-post.php"); ?>
        <?php endwhile;wp_reset_postdata();?>
        </ul>
      </div>    <!-- Posts feed -->

    </div>  <!-- Container -->
  </div>  <!-- Section -->
</main>
<?php get_footer();?>
