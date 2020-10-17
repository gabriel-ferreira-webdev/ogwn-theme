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
            <input type="checkbox" name="search-cb" id="search-cb" onclick="noScrollOnMenuOpen(this)">
            <label id="search-cb-label" for="search-cb">

              <svg class="search-icon search-open" viewBox="0 0 24 24">
               <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
              </svg>

            </label>
            <div class="search-bg-mb" id="search-bg-mb">
              <input type="text" name="s" id="search" placeholder="Search" size="17"/>

              <button type="submit" id="search-button">
                <svg id="search-icon" class="search-icon" viewBox="0 0 24 24">
                 <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                  <path d="M0 0h24v24H0z" fill="none"/>
                </svg>
               </button>


            </div>
          </input>


             </form>
        <label for="search-cb" class="fade" id="fadesearch"></label>

        <nav id="hamnav">
          <!-- [THE HAMBURGER] -->
          <input type="checkbox" id="hammy" name="hammy" onclick="noScrollOnMenuOpen(this)">
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
        <label for="hammy" class="fade" id="fademenu"></label>
      </div>
    </header>
