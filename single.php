

<?php get_header();?>


<main>



  <?php if (have_posts()) : while(have_posts()) : the_post();?>
    <?php  $author_id = get_the_author_meta('ID'); ?>

<div class="section section-gray">
    <div class="article-header container">

      <h2><?php the_title();?></h2>
<div class="article-header-author">
  <a href=" <?php echo get_author_posts_url($author_id);?> "><?php echo get_avatar($author_id); ?></a>
<div class="article-header-info">

  <h3><a href=" <?php echo get_author_posts_url($author_id);?> "><?php the_author();?></a></h3>
<span class="article-date"><?php the_date(); ?></span>

</div>
</div>
    </div>

<div class="article-content container">
      <?php the_content();?>
</div>
</div>

  <?php endwhile; endif;?>





</main>
<?php get_footer();?>
