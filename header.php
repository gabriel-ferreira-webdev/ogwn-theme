<?php
/**
 * The header template for our theme.
 *
 * This is the file that displays the <head> & <header> sections.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); // Displays the language attributes for the ‘html’ tag. ?>>


<!-- Head Section
============================================= -->
<head>
  <meta charset="<?php bloginfo('charset'); // Echoes “UTF-8” – the default encoding of WordPress. ?>">

  <!-- Tells devices to use their native size. -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); // Prints scripts or data in the head tag on the front end. ?>
</head>


<!-- Body Section
============================================= -->
<body <?php body_class(); // Dynamically displays class names for the body element. ?>>


  <!-- Header Section
  ============================================= -->
  <header class="site-header">

    <div class="header-flex container">
      
      <!-- Custom Logo (Eye) -->
      <?php 
        if ( function_exists( 'the_custom_logo' ) ) {
          the_custom_logo(); // Displays the custom logo.
        } 
      ?>

      <!-- Custom Logo (Text) -->
      <a class="title-img" href="<?php echo get_home_url(); // Retrieves the 'Home' URL ?>"></a>

      <!-- Search Button -->
      <form id="searchform" class="header-searchform" action="/" method="get">

        <input id="search-cb" name="search-cb" type="checkbox" onclick="noScrollOnMenuOpen(this)" />

        <label id="search-cb-label" for="search-cb">
          <div class="search-open"></div>
        </label>

        <div id="search-bg-mb" class="search-bg-mb">
          <input type="text" name="s" id="search" placeholder="Search" size="17" value="<?php echo get_search_query(); // Retrieves the contents of the search. ?>" />

          <button id="search-button" type="submit">
            <?php include("img/icons/search.svg"); ?>
          </button>
        </div>

        <label id="fadesearch" class="fade" for="search-cb"></label>

      </form><!-- #searchform -->


      <!-- Header Navigation Menu
      ============================================= -->
      <nav class="header-navigation">

        <!-- Hamburger Menu -->
        <input id="hammy" name="hammy" type="checkbox" onclick="noScrollOnMenuOpen(this)" />
        <label for="hammy">&#9776;</label>

        <!-- Menu Items -->
        <div class="menu-items">
          <?php
            // Displays the Header Navigation Menu.
            wp_nav_menu(
              array(
                'theme_location' => 'top-menu',
                'menu_class' => 'navigation'
              )
            );
          ?>
        </div><!-- .menu-items -->

      </nav><!-- .header-navigation -->
      <label id="fademenu" class="fade" for="hammy"></label>


    </div><!-- .header-flex -->

  </header><!-- .site-header -->
