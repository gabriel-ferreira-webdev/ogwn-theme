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
    <?php $author_id = get_the_author_meta('ID'); ?>

          <?php include("feed-post.php"); ?>

  <?php endwhile; endif;?>

</ul>
</div>  <!-- posts feed -->


</div>  <!-- container -->
</div>  <!-- section -->
</main>

<?php get_footer();?>
