<?php get_header();?>

<main>
  <div class="section section-gray">
    <div class="container">
      <div class="section-header">
        <h5><?php the_title();?></h5>
      </div>

      <!-- Posts feed -->
        <?php echo do_shortcode('[ajax_load_more container_type="div" css_classes="feed-posts" post_type="post" posts_per_page="15"]'); ?>
    </div>  <!-- Container -->
  </div>  <!-- Section -->
</main>
<?php get_footer();?>
