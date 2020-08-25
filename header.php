<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <?php wp_head();?>
  </head>
  <body <?php body_class();?>>


<header>
  <div class="container">


  <div class="header-flex">


      <?php if ( function_exists( 'the_custom_logo' ) ) {
       the_custom_logo();
      } ?>


  <a href="#" class="title-img"></a>


<?php echo get_theme_mod( 'my_site_logo_id' );?>

<?php wp_nav_menu (

    array(
      'theme_location' => 'top-menu',
      'menu_class' => 'navigation'
    )
  ) ?>
 <div id="mobile-menu-icon">
    <img src="https://localhost/ogwnw/wp-content/uploads/2020/07/Hamburger-Button.png" alt="">
  </div>
  <!-- <a href="#" id="top-subscribe">Subscribe</a> -->


    </div>


      </div>
</header>
