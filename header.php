<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <?php wp_head();?>
  </head>

  <body <?php body_class();?>>
    <!-- page wrap sticky footer -->
<div class="page-wrap">
<header>

  <div class="container">
  <div class="header-flex">

      <?php if ( function_exists( 'the_custom_logo' ) ) {
       the_custom_logo();
      } ?>

  <a href="<?php echo get_home_url(); ?>" class="title-img"></a>

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

    </div>
      </div>
</header>
