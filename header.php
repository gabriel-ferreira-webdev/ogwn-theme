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
<div id="menu-top-bg"></div>
<?php wp_nav_menu (

    array(
      'theme_location' => 'top-menu',
      'menu_class' => 'navigation'
    )
  ) ?>
  <input type="checkbox" name="mobilemenu" id="menuCb">
  <div class="fade"></div>
  <button id="mobile-menu-icon" class="hamburger hamburger--squeeze" type="button">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>

  <!-- <a href="#" id="top-subscribe">Subscribe</a> -->


    </div>


      </div>
</header>
