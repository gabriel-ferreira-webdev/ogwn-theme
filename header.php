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

        <form action="/" method="get" id="searchform" class="header-searchform">
          <input type="checkbox" name="search-cb" id="search-cb" onclick="noScrollOnMenuOpen(this)" />
          <label id="search-cb-label" for="search-cb">
            <div class="search-open"></div>
          </label>

          <div class="search-bg-mb" id="search-bg-mb">
            <input type="text" name="s" id="search" placeholder="Search" size="17" value="<?php echo get_search_query(); ?>" />

            <button type="submit" id="search-button">
              <?php include("img/icons/search.svg"); ?>
            </button>
          </div>
        </form>

        <label for="search-cb" class="fade" id="fadesearch"></label>

        <nav id="hamnav">
          <!-- [THE HAMBURGER] -->
          <input type="checkbox" id="hammy" name="hammy" onclick="noScrollOnMenuOpen(this)" />
          <label for="hammy">&#9776;</label>

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
        <label for="hammy" class="fade" id="fademenu"></label>
      </div>
    </header>
