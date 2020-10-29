<?php get_header();?>

<main>
<div class="section section-gray">
<div class="container" >


    <!-- Posts feed -->
<?php if(is_category()){
   $cat = get_query_var('cat');
   $category = get_category ($cat);
   echo '<div class="section-header">
       <h5>'.$category->cat_name.'</h5></div>';

   echo do_shortcode('[ajax_load_more scroll="false" button_label="Load more" transition_container="false" posts_per_page="15" category="'.$category->slug.'" cache="true" tag__not_in="26" cache_id="cache-'.$category->slug.'"]');
}
if(is_tag()){
   $tag = get_query_var('tag');
   echo '<div class="section-header">
       <h5>'.single_tag_title('',false).'</h5></div>';
   echo do_shortcode('[ajax_load_more scroll="false" button_label="Load more" transition_container="false" posts_per_page="15" tag__not_in="26"  tag="'.$tag.'"]');
}
if(is_tax()){
   echo '<div class="section-header">
       <h5>'.$tax_name.'</h5></div>';
   echo do_shortcode('[ajax_load_more scroll="false" button_label="Load more" transition_container="false" posts_per_page="15" taxonomy="'. $tax .'" tag__not_in="26"  taxonomy_terms="'. $tax_term .'" taxonomy_operator="IN"]');
}



?>
 <!-- posts feed -->


</div>  <!-- container -->
</div>  <!-- section -->
</main>

<?php get_footer();?>
