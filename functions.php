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



add_theme_support('menus');
add_theme_support('post-thumbnails');
register_nav_menus(
  array(
      'top-menu' => __("Top Menu", 'theme'),
      'footer-menu' => __("Footer Menu", 'theme'),
  )
);
add_image_size('smallest', 300, 300, false);
add_image_size('largest', 800, 800, false);


add_theme_support( 'custom-logo' );

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

 // function wpd_exclude_uncategorized( $query ) {
 //         $query->set( 'category__not_in', array( 1 ) );
 // }
 // add_action( 'pre_get_posts', 'wpd_exclude_uncategorized' );

 ?>
