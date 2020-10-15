<?php
/*
Template Name: Reading Width Light Border
Template Post Type: page
*/
// Page code here..
 get_header();?>

<main>
  <div class="section section-gray">
    <div class="reading-container-light">
      <div class="section-header">
        <h5><?php the_title();?></h5>
      </div>

      <?php if (have_posts()) : while(have_posts()) : the_post();?>
        <?php the_content();?>
      <?php endwhile; endif;?>

    </div>
  </div>
</main>

<?php get_footer();?>
