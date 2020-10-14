<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>One Great Work Network <?php wp_title('-');?></title>
  <?php wp_head();?>
</head>
<body <?php body_class();?>>
  <!-- page wrap sticky footer -->
  <div class="page-wrap">
    <header>
      <div class="header-flex container">
          <?php if ( function_exists( 'the_custom_logo' ) ) {
           the_custom_logo();
          } ?>

          <a href="<?php echo get_home_url(); ?>" class="title-img"></a>

          <?php echo get_theme_mod( 'my_site_logo_id' );?>

        <nav id="hamnav">
          <!-- [THE HAMBURGER] -->
          <input type="checkbox" id="hammy" name="hammy">
            <label for="hammy">&#9776;</label>
          </input>

          <!-- [MENU ITEMS] -->
          <div id="hamitems">
            <?php wp_nav_menu (
              array(
                'theme_location' => 'top-menu',
                'menu_class' => 'navigation'
              )
            ) ?>
          </div>
        </nav>
      </div>
    </header>
