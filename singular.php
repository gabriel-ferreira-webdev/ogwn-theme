<?php get_header();?>

<main>
  <div class="section section-gray">

    <?php if (have_posts()) : while(have_posts()) : the_post();?>
      <?php  $author_id = get_the_author_meta('ID'); ?>


<!-- Article Header -->
      <div class="article-header container">
        <h2><?php the_title();?></h2>

<!-- Author Information Header -->
        <div class="article-header-author">

<!-- Author Avatar -->
          <a href=" <?php echo get_author_posts_url($author_id);?> "><?php echo get_avatar($author_id); ?></a>

<!-- Author Text -->
          <div class="article-header-info">
            <h3><a href=" <?php echo get_author_posts_url($author_id);?> "><?php the_author();?></a></h3>
            <span class="article-date"><?php the_date(); ?></span>
          </div>

        </div>  <!-- Author Information Header -->
      </div>  <!-- Article Header -->


<!-- Article Content -->
      <div class="article-content container">
        <?php the_content();?>
      </div>


    <?php endwhile; endif;?>

  </div> <!-- Section -->
</main>

<?php get_footer();?>
