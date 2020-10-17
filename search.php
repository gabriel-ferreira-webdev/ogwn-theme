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

<main>
  <div class="section section-gray">
    <div class="container">
      <div class="section-header">
        <h5>Search: <?php echo get_search_query(); ?></h5>
      </div>

      <!-- Posts feed -->
      <div class="feed-posts">
        <ul>
          <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <?php $author_id = get_the_author_meta('ID'); ?>

          <?php include("feed-post.php"); ?>
          <?php endwhile;wp_reset_postdata();?>
        </ul>
      </div>    <!-- Posts feed -->
    </div>
  </div>
</main>
<?php get_footer();?>
