<?php get_header();?>
<main>
  <div class="section" id="content-creators-section">
    <div class="container">
      <div class="section-header">
        <h2><?php the_title();?></h2>
      </div>

<main>

      <?php if (have_posts()) : while(have_posts()) : the_post();?>
        <?php the_content();?>
      <?php endwhile; endif;?>


    </div>
  </div>
</main>

<?php get_footer();?>
