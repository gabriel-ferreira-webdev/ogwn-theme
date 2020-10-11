<?php

/**
 * You must declare this variable in your templates. It contains the current
 * related post that is about to be displayed.
 */
global $post;
 $author_id= $post->post_author;
?>
<!-- Featured Posts feed -->
<div class="feed-posts featured-posts">
  <ul>
      <li class="feed-post featured-post">
        <!-- post categories -->
        <div class="feed-categories">
        <?php
        $categories = get_the_category();
        for ($i=0; $i < count($categories); $i++) {
        $cat = $categories[$i];
        $rl_category_color = rl_color($cat->term_id);
        ?>
        <div class="feed-category">

          <a  title="<?php echo $cat->name;?>" href="<?php echo get_category_link($cat->term_id);?>" style="color:<?php echo $rl_category_color?>;"><?php echo $cat->name;?></a>
        </div>
        <?php  } ?>
              </div>
        <!-- post thumbnail -->
        <div class="feed-post-thumb featured-post-thumb">
          <a href="<?php the_permalink() ?>" rel="bookmark" class="feed-post-thumb-a" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></a>
        </div>

        <!-- post info -->
        <div class="feed-post-info-flex featured-post-info-flex">

          <a class="feed-post-avatar featured-post-avatar" title="<?php echo get_author_name($author_id);?>" href="<?php echo get_author_posts_url($author_id); ?>"> <?php echo get_avatar( $author_id, '60' );?></a>

          <div class="feed-post-info featured-post-info">
            <a href="<?php the_permalink(); ?>" rel="bookmark" class="feed-post-title-link"><span class="feed-post-title" title="<?php echo get_the_title(); ?>"><?php echo get_the_title();?></span></a>
            <a class="feed-post-author-name" title="<?php echo get_author_name($author_id);?>" href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_author_name($author_id);?></a>
          </div>

        </div>

      </li>

  </ul>
</div>
