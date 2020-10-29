<?php get_header();?>
<?php
$author_id = get_the_author_meta('ID');
$emailcb  = get_the_author_meta('emailcb', $author_id);
$web2  = get_the_author_meta('web2', $author_id);
$web3  = get_the_author_meta('web3', $author_id);
$twitter  = get_the_author_meta('twitter', $author_id);
$facebook = get_the_author_meta('facebook', $author_id);
$googleplus = get_the_author_meta('googleplus', $author_id);
$linkedin = get_the_author_meta('linkedin', $author_id);
$instagram = get_the_author_meta('instagram', $author_id);
$youtube = get_the_author_meta('youtube', $author_id);
$bitchute = get_the_author_meta('bitchute', $author_id);
$lbry = get_the_author_meta('lbry', $author_id);
$email = get_the_author_meta('email', $author_id);
$author_url = get_the_author_meta('user_url', $author_id);
$author_name = get_the_author_meta('user_login');
?>

<main id="author-page">
  <div class="author-page-header section">
    <div class="author-container">
      <div class="container">

        <!-- Author Page Header Profile -->
        <div class="author-page-header-profile">
          <?php echo get_avatar($author_id, 300); ?>
          <nav class="author-donate">
            <a href="donate">DONATE TO<br><?php the_author();?></a>
          </nav>
        </div>

        <!-- Author Page Header Bio -->
        <div class="author-page-header-side">
          <h2><?php the_author(); ?></h2>

          <div id="more-less" class="author-page-header-desc">
            <?php the_author_description(); ?>
          </div>

          <div class="float-right">
            <button title="Read more/less" type="button" class="link-button" onclick="readMoreToggle()" id="button-more">
              Read more
            </button>
          </div>
          <div class="clr"></div>

          <a class="author-url" href="<?php  echo $author_url ?>"><?php  echo $author_url ?></a>
          <?php
          if(!empty($web2)) {
                        echo '<br><a title="'.$web2.'" href="'.$web2.'" class="author-url">'.$web2.'</a>';
                      }
                      if(!empty($web3)) {
                                    echo '<br><a title="'.$web3.'" href="'.$web3.'" class="author-url">'.$web3.'</a>';
                                  }
                       ?>
          <!-- Author Page Header Social Icons -->
          <div class="author-page-header-social">
          <?php

            if(!empty($emailcb)) {
              echo '<a title="Contact '.$author_name.' via Email" href="mailto:'.$email.'" class="author-social"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/></svg></a>';
            }
            if(!empty($instagram)) {
              echo '<a title="Follow '.$author_name.' on Instagram" href="'.$instagram.'" class="author-social"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>';
            }
            if(!empty($youtube)) {
              echo '<a title="Follow '.$author_name.' on Youtube" href="'.$youtube.'" class="author-social"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg></a>';
            }
            if(!empty($linkedin)) {
              echo '<a title="Follow '.$author_name.' on LinkedIn" href="'.$linkedin.'" class="author-social"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg></a>';
            }
            if(!empty($googleplus)) {
              echo '<a title="Follow '.$author_name.' on Google Plus" href="'.$googleplus.'" class="author-social"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z" fill-rule="evenodd" clip-rule="evenodd"/></svg></a>';
            }
            if(!empty($twitter)) {
              echo '<a title="Follow '.$author_name.' on Twitter" href="'.$twitter.'" class="author-social"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>';
            }
            if(!empty($facebook)) {
              echo '<a title="Follow '.$author_name.' on Facebook" href="'.$facebook.'" class="author-social"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg></a>';
            }
            if(!empty($bitchute)) {
              echo '<a title="Follow '.$author_name.' on BitChute" href="'.$bitchute.'" class="author-social"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg></a>';
            }
            if(!empty($lbry)) {
              echo '<a title="Follow '.$author_name.' on LBRY" href="'.$lbry.'" class="author-social"><svg stroke="currentColor" fill="currentColor" x="0px" y="0px" viewBox="0 0 322 254" class="icon lbry-icon"><path d="M296,85.9V100l-138.8,85.3L52.6,134l0.2-7.9l104,51.2L289,96.1v-5.8L164.2,30.1L25,116.2v38.5l131.8,65.2 l137.6-84.4l3.9,6l-141.1,86.4L18.1,159.1v-46.8l145.8-90.2C163.9,22.1,296,85.9,296,85.9z"></path><path d="M294.3,150.9l2-12.6l-12.2-2.1l0.8-4.9l17.1,2.9l-2.8,17.5L294.3,150.9L294.3,150.9z"></path></svg></a>';
            }
          ?>
          </div> <!-- Author Page Header Social Icons -->

        </div> <!-- Author Page Header Profile -->

      </div> <!-- Container Author Page Header-->
    </div>
  </div> <!-- Section Author Page Header-->

  <div class="section author-page-posts">
    <div class="container">

      <!-- Posts Feed -->
          <?php
           echo do_shortcode('[ajax_load_more transition_container="false" container_type="div" css_classes="feed-posts" post_type="post" posts_per_page="15" category="'.$author_name.'" cache="true" cache_id="cache-'.$author_name.'" tag__not_in="26"]');?>

    </div> <!-- Container Author Page Posts -->
  </div> <!-- Section Author Page Posts -->
</main>
<script>
  window.onload = () => {
    initAuthor();
  };
</script>
<?php get_footer();?>
