<?php
function load_stylesheets()
{
  wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', array(), false, 'all');
  wp_enqueue_style('stylesheet');


}

add_action('wp_enqueue_scripts', 'load_stylesheets');

function include_jquery(){
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', '', 1, true);
  add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'include_jquery');


function loadjs(){
  wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
  wp_enqueue_script('customjs');
}
add_action('wp_enqueue_scripts', 'loadjs');

if ( !function_exists( 'yourtheme_setup' ) ) {
    function yourtheme_setup() {
add_theme_support( 'responsive-embeds' );
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support( 'custom-logo' );
 add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'yourtheme_setup' );
}

register_nav_menus(
  array(
      'top-menu' => __("Top Menu", 'theme'),
      'footer-menu' => __("Footer Menu", 'theme'),
  )
);
add_image_size('smallest', 300, 300, false);
add_image_size('largest', 800, 800, false);



// ADD SEARCH BAR TO HEADER MENU
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
 function add_search_form($items, $args) {
 if( $args->theme_location == 'top-menu' )
         $items .= '<li class="search"><form role="search" method="get" id="searchform" action="'.home_url( '/' ).'"><input type="text" placeholder="Search..." name="s" id="s" /><input type="submit" id="searchsubmit" value="" /></form></li>';
         return $items;
 }
 add_action( 'add_search_form', 'search_form' );
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function add_favicon() {
echo '<link rel="shortcut icon" type="image/png" href="'.get_template_directory_uri().'/img/seal.png" />';
}
add_action('wp_head', 'add_favicon');

function mytheme_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here

    $wp_customize->add_section( 'my_site_logo' , array(
        'title'      => __( 'My Site Logo', 'mytheme' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo',
            array(
               'label'      => __( 'Upload a logo', 'theme_name' ),
               'section'    => 'my_site_logo',
               'settings'   => 'my_site_logo_id'
            )
        )
    );

}
add_action( 'customize_register', 'mytheme_customize_register' );


// disable authorbox styles
function disable_authorbox_styles() {

 	wp_deregister_style('author-bio-box-styles');

 }
 add_action('wp_enqueue_scripts', 'disable_authorbox_styles');

 function search_filter($query) {
     if ( ! is_admin() && $query->is_main_query() ) {
         if ( $query->is_search ) {
             $query->set( 'post_type', 'post' );
         }
     }
 }
 add_action( 'pre_get_posts', 'search_filter' );


 ?>
