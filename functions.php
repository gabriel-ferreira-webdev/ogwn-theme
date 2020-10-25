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

$caid = '-1';
function exclude_category_all_content( $query ) {
    if ( ! is_admin() ){
    global $caid;
        $query->set( 'cat', $caid );
        }
}
add_action( 'pre_get_posts', 'exclude_category_all_content' );

// allow HTML in author bio for formatting
remove_filter('pre_user_description', 'wp_filter_kses');

// Add user contact methods
add_filter( 'user_contactmethods','wpse_user_contactmethods', 10, 1 );
function wpse_user_contactmethods( $contact_methods ) {
    $contact_methods['emailcb']  = __( 'Display Email', 'checkbox' );
    $contact_methods['web2']  = __( 'Website 2', 'text_domain' );
    $contact_methods['web3']  = __( 'Website 3', 'text_domain' );
    $contact_methods['twitter']  = __( 'Twitter URL', 'text_domain' );
    $contact_methods['facebook'] = __( 'Facebook URL', 'text_domain'    );
    $contact_methods['googleplus'] = __( 'Google+ URL', 'text_domain'    );
    $contact_methods['instagram'] = __( 'Instagram URL', 'text_domain'    );
    $contact_methods['linkedin'] = __( 'LinkedIn URL', 'text_domain'    );
    $contact_methods['youtube']  = __( 'YouTube URL', 'text_domain' );
    $contact_methods['bitchute']  = __( 'BitChute URL', 'text_domain' );
    $contact_methods['lbry']  = __( 'LBRY URL', 'text_domain' );

    return $contact_methods;
}

// custom login Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/seal.png);
		height:65px;
		width:320px;
		background-size: contain;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


// add_action('save_post', 'prevent_post_publishing', -1);
// function prevent_post_publishing($post_id)
// {
//     $post = get_post($post_id);
//
//     // You also add a post type verification here,
//     // like $post->post_type == 'your_custom_post_type'
//     if($post->post_status == 'publish' && !has_post_thumbnail($post_id)) {
//         $post->post_status = 'draft';
//         wp_update_post($post);
//
//         $message = '<p>Please, add a thumbnail!</p>'
//                  . '<p><a href="' . admin_url('post.php?post=' . $post_id . '&action=edit') . '">Go back and edit the post</a></p>';
//         wp_die($message, 'Error - Missing thumbnail!');
//     }
// }

add_action( 'after_switch_theme', 'create_about_page_on_theme_activation' );
function create_about_page_on_theme_activation(){

    // Set the title, template, etc
    $new_page_title     = __('About','text-domain'); // Page's title
    $new_page_content   = '';                           // Content goes here
    $new_page_template  = 'page-template-reading-shadow.php';       // The template to use for the page
    $page_check = get_page_by_title($new_page_title);   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
            'post_type'     => 'page',
            'post_title'    => $new_page_title,
            'post_content'  => $new_page_content,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_name'     => 'about'
    );
    // If the page doesn't already exist, create it
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    }
}

?>


<?php

//
// add_action( 'after_setup_theme', 'create_search_page_on_theme_activation' );
//
// function create_search_page_on_theme_activation(){
//
//     // Set the title, template, etc
//     $new_page_title     = __('Search','text-domain'); // Page's title
//     $new_page_content   = '';                           // Content goes here
//     $new_page_template  = 'search.php';       // The template to use for the page
//     $page_check = get_page_by_title($new_page_title);   // Check if the page already exists
//     // Store the above data in an array
//     $new_page = array(
//             'post_type'     => 'page',
//             'post_title'    => $new_page_title,
//             'post_content'  => $new_page_content,
//             'post_status'   => 'publish',
//             'post_author'   => 1,
//             'post_name'     => 'search'
//     );
//     // If the page doesn't already exist, create it
//     if(!isset($page_check->ID)){
//         $new_page_id = wp_insert_post($new_page);
//         if(!empty($new_page_template)){
//             update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
//         }
//     }
// }
//
// add_action( 'after_setup_theme', 'create_hosts_page_on_theme_activation' );
//
// function create_hosts_page_on_theme_activation(){
//
//     // Set the title, template, etc
//     $new_page_title     = __('Hosts','text-domain'); // Page's title
//     $new_page_content   = '';                           // Content goes here
//     $new_page_template  = 'hosts.php';       // The template to use for the page
//     $page_check = get_page_by_title($new_page_title);   // Check if the page already exists
//     // Store the above data in an array
//     $new_page = array(
//             'post_type'     => 'page',
//             'post_title'    => $new_page_title,
//             'post_content'  => $new_page_content,
//             'post_status'   => 'publish',
//             'post_author'   => 1,
//             'post_name'     => 'hosts'
//     );
//     // If the page doesn't already exist, create it
//     if(!isset($page_check->ID)){
//         $new_page_id = wp_insert_post($new_page);
//         if(!empty($new_page_template)){
//             update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
//         }
//     }
// }
//
//
// add_action( 'after_setup_theme', 'create_about_page_on_theme_activation' );
//
// function create_about_page_on_theme_activation(){
//
//     // Set the title, template, etc
//     $new_page_title     = __('About','text-domain'); // Page's title
//     $new_page_content   = '<!-- wp:paragraph {"align":"left"} -->
// <p class="has-text-align-left"><strong>One Great Work Network</strong> is a privately-organized collective of Conscious Individuals, who each create dynamic content for the purpose of spreading the message of Natural Law, Truth, and Freedom to a worldwide audience. The <strong>One Great Work Network</strong> is actively engaged in the ongoing war against the Dark Occult Ruling Class. Together, this group of Freedom Advocates and Spiritual Warriors continually disseminates empowering information in a tireless effort to free Humanity from the condition of Slavery.<br><br></p>
// <!-- /wp:paragraph -->
//
// <p></p>
//
// <!-- wp:paragraph {"align":"left"} -->
// <p class="has-text-align-left"><strong><em>One Great Work Network – Ending Slavery, One Mind At A Time.</em></strong></p>
// <!-- /wp:paragraph -->';                           // Content goes here
//     $new_page_template  = 'page-template-reading-shadow.php';       // The template to use for the page
//     $page_check = get_page_by_title($new_page_title);   // Check if the page already exists
//     // Store the above data in an array
//     $new_page = array(
//             'post_type'     => 'page',
//             'post_title'    => $new_page_title,
//             'post_content'  => $new_page_content,
//             'post_status'   => 'publish',
//             'post_author'   => 1,
//             'post_name'     => 'about'
//     );
//     // If the page doesn't already exist, create it
//     if(!isset($page_check->ID)){
//         $new_page_id = wp_insert_post($new_page);
//         if(!empty($new_page_template)){
//             update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
//         }
//     }
// }
//
//
// add_action( 'after_setup_theme', 'create_donate_page_on_theme_activation' );
//
// function create_donate_page_on_theme_activation(){
//
//     // Set the title, template, etc
//     $new_page_title     = __('Donate','text-domain'); // Page's title
//     $new_page_content   = '<!-- wp:heading {"align":"center","level":5} -->
// <h5 class="has-text-align-center">Donate To Support One Great Work Network</h5>
// <!-- /wp:heading -->
//
// <!-- wp:paragraph {"align":"center"} -->
// <p class="has-text-align-center"><table style="width: 740px; height: 1665px; margin-left: auto; margin-right: auto;" cellpadding="15">
// <tbody>
// <tr>
// <td style="text-align: center; vertical-align: top;">––––––––––––––––––––––––––––––––––––––––<p></p>
// <table style="width: 200px;" border="0">
// <tbody>
// <tr>
// <td valign="middle" align="center"><a href="https://www.paypal.me/MarkPassio" target="_blank" rel="noopener noreferrer">Donate with</a><br>
// <a href="https://www.paypal.me/MarkPassio" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="https://ogwn.net/wp-content/uploads/woeih-paypal.png" alt="woeih paypal" width="255" height="73"></a></td>
// <td><a href="https://www.paypal.me/MarkPassio" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="https://ogwn.net/wp-content/uploads/paypal-me.png" alt="paypal me" width="155" height="155"></a></td>
// </tr>
// </tbody>
// </table>
// <p><strong><a href="https://www.paypal.me/MarkPassio" target="_blank" rel="noopener noreferrer"><strong><span style="font-size: 12pt;">PayPal.me/MarkPassio<br>
// </span></strong></a></strong><br>
// ––––––––––––––––––––––––––––––––––––––––</p>
// <table style="width: 200px;" border="0">
// <tbody>
// <tr>
// <td valign="middle" align="center"><a href="https://www.patreon.com/markpassio" target="_blank" rel="noopener noreferrer">Donate with</a><br>
// <a href="https://www.patreon.com/markpassio" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="https://ogwn.net/wp-content/uploads/patreon-logo.png" alt="patreon logo" width="255" height="95"></a></td>
// <td><a href="https://www.patreon.com/markpassio" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="https://ogwn.net/wp-content/uploads/patreon.jpg" alt="patreon" width="155" height="155"></a></td>
// </tr>
// </tbody>
// </table>
// <p><strong><a href="https://www.patreon.com/markpassio" target="_blank" rel="noopener noreferrer"><strong><span style="font-size: 12pt;">Patreon.com/MarkPassio</span></strong></a></strong></p>
// <p><span style="font-size: 10pt;"><span style="font-size: 10pt;"> ––––––––––––––––––––––––––––––––––––––––</span></span></p>
// <table style="width: 200px;" border="0">
// <tbody>
// <tr>
// <td valign="middle" align="center"><a href="https://www.venmo.com/MarkPassio" target="_blank" rel="noopener noreferrer">Donate with</a><br>
// <a href="https://www.venmo.com/MarkPassio" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="https://ogwn.net/wp-content/uploads/venmo-logo.png" alt="patreon logo" width="255" height="67"></a></td>
// <td><a href="https://www.venmo.com/MarkPassio" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="https://ogwn.net/wp-content/uploads/venmo.jpg" alt="patreon" width="155" height="155"></a></td>
// </tr>
// </tbody>
// </table>
// <p><span style="font-size: 10pt;"><a href="https://www.venmo.com/MarkPassio" target="_blank" rel="noopener noreferrer"><strong><strong><span style="font-size: 12pt;">Venmo.com/MarkPassio</span></strong></strong></a></span></p>
// <p><span style="font-size: 10pt;"><span style="font-size: 10pt;"> ––––––––––––––––––––––––––––––––––––––––</span></span></p>
// <table style="width: 200px;" border="0">
// <tbody>
// <tr>
// <td valign="middle" align="center">Donate with<p></p>
// <p><img loading="lazy" src="https://ogwn.net/wp-content/uploads/bitcoin-logo.png" alt="bitcoin logo" width="255" height="53"></p></td>
// <td><span style="font-size: 12pt;"><strong><strong><span style="font-size: 12pt;"><img loading="lazy" src="https://ogwn.net/wp-content/uploads/bitcoin.png" alt="bitcoin" width="155" height="155"></span></strong></strong></span></td>
// </tr>
// </tbody>
// </table>
// <p><span style="font-size: 12pt;"><span style="font-size: 10pt;"><strong>1JEvjzWxozRp93xfXwP4ADxbmr2msrsE7z</strong></span></span></p>
// <p><span style="font-size: 10pt;"> ––––––––––––––––––––––––––––––––––––––––</span></p>
// <table style="width: 200px;" border="0">
// <tbody>
// <tr>
// <td valign="middle" align="center">Donate with<p></p>
// <p><img loading="lazy" src="https://ogwn.net/wp-content/uploads/bitcoin-cash-logo.png" alt="bitcoin cash logo" width="255" height="48"></p></td>
// <td><span style="font-size: 12pt;"><strong><strong><span style="font-size: 12pt;"><img loading="lazy" src="https://ogwn.net/wp-content/uploads/bitcoin-cash.png" alt="bitcoin cash" width="155" height="155"></span></strong></strong></span></td>
// </tr>
// </tbody>
// </table>
// <p><span style="font-size: 10pt;"><strong>qppm2c6yfja0k5r3dc0epke9dnu6tvdv0c9ly5xzuq</strong></span></p>
// <p>––––––––––––––––––––––––––––––––––––––––<span style="font-size: 12pt;"><span style="font-size: 12pt;"></span></span></p>
// <table style="width: 200px;" border="0">
// <tbody>
// <tr>
// <td valign="middle" align="center">Donate with<p></p>
// <p><img loading="lazy" src="https://ogwn.net/wp-content/uploads/bitcoin-sv-logo.png" alt="bitcoin sv logo" width="255" height="65"></p></td>
// <td><img loading="lazy" src="https://ogwn.net/wp-content/uploads/bitcoin-sv.png" alt="bitcoin sv" width="155" height="155"></td>
// </tr>
// </tbody>
// </table>
// <p><span style="font-size: 12pt;"><strong><span style="font-size: 10pt;">12STJ4VeMLNRLWuT8D2iUHabeCHhySsQFW</span></strong></span></p>
// <p><span style="font-size: 10pt;">––––––––––––––––––––––––––––––––––––––––</span><span style="font-size: 12pt;"></span></p>
// <table style="width: 200px;" border="0">
// <tbody>
// <tr>
// <td valign="middle" align="center">Donate with<p></p>
// <p><img loading="lazy" src="https://ogwn.net/wp-content/uploads/litecoin-logo.png" alt="litecoin logo" width="255" height="76"></p></td>
// <td><img loading="lazy" src="https://ogwn.net/wp-content/uploads/litecoin.png" alt="litecoin" width="155" height="155"></td>
// </tr>
// </tbody>
// </table>
// <p><strong>LL74piubrTd64sPmRFtyLnEcUVS1Cj2q9c</strong></p>
// <p>––––––––––––––––––––––––––––––––––––––––<span style="font-size: 12pt;"><span style="font-size: 12pt;"></span></span></p>
// <table style="width: 200px;" border="0">
// <tbody>
// <tr>
// <td valign="middle" align="center">Donate with<p></p>
// <p><img loading="lazy" src="https://ogwn.net/wp-content/uploads/ethereum-logo.png" alt="ethereum logo" width="255" height="64"></p></td>
// <td><img loading="lazy" src="https://ogwn.net/wp-content/uploads/ethereum.png" alt="ethereum" width="155" height="155"></td>
// </tr>
// </tbody>
// </table>
// <p><span style="font-size: 12pt;"><span style="font-size: 10pt;"><strong>0x514f1E496C265ea799657434aA73Dc573bB53F04</strong></span></span></p>
// <p><span style="font-size: 10pt;">––––––––––––––––––––––––––––––––––––––––</span></p>
// <table style="width: 200px;" border="0">
// <tbody>
// <tr>
// <td valign="middle" align="center">Donate with<p></p>
// <p><img loading="lazy" src="https://ogwn.net/wp-content/uploads/dash-logo.png" alt="ethereum logo" width="255" height="50"></p></td>
// <td><img loading="lazy" src="https://ogwn.net/wp-content/uploads/dash.png" alt="dash" width="155" height="155"></td>
// </tr>
// </tbody>
// </table>
// <p><strong>XyGJbk95MvGaZdWhafD5JCNemtxTq2m7KE</strong></p>
// <p>––––––––––––––––––––––––––––––––––––––––<span style="font-size: 12pt;"></span></p>
// <table style="width: 455px; height: 165px;" border="0">
// <tbody>
// <tr>
// <td style="text-align: center; vertical-align: middle;">Donate by<br>
// <strong>Personal Check</strong> or <strong>Money Order</strong><p></p>
// <p><img loading="lazy" src="https://ogwn.net/wp-content/uploads/checkmoneyorder.jpg" alt="checkmoneyorder" width="255" height="107"></p></td>
// <td style="width: 200px;"><a href="mailto:Mark@WhatOnEarthIsHappening.com?subject=WOEIH%20Donation%20Inquiry&amp;body=I would like to donate to What On Earth Is Happening via personal check or money order. Please send me the mailing address to make a personal donation.">Click here to request the<br>
// mailing address for donations&nbsp;via Personal Check&nbsp;or Money Order.<p></p>
// </a><p><a href="mailto:Mark@WhatOnEarthIsHappening.com?subject=WOEIH%20Donation%20Inquiry&amp;body=I would like to donate to What On Earth Is Happening via personal check or money order. Please send me the mailing address to make a personal donation."></a><a href="mailto:Mark@WhatOnEarthIsHappening.com?subject=WOEIH%20Donation%20Inquiry&amp;body=I would like to donate to What On Earth Is Happening via personal check or money order. Please send me the mailing address to make a personal donation."><span style="font-size: 10pt;">(Please do NOT change<br>
// the subject line.)</span></a></p></td>
// </tr>
// </tbody>
// </table>
// </td>
// <td rowspan="2" style="text-align: center; vertical-align: top;"><a href="https://www.amazon.com/hz/wishlist/ls/2BIVBFDLRP5N" target="_blank" rel="noopener noreferrer"><span style="color: #24c242;"><img loading="lazy" src="https://ogwn.net/wp-content/uploads/wishlist.jpg" alt="wishlist" style="float: left;" width="250" height="153"> <span style="font-size: 14pt;"><strong>WOEIH TECH NEEDS LIST</strong></span><span style="color: #00cc33;"></span></span></a><span style="color: #00cc33;"><a href="https://www.amazon.com/hz/wishlist/ls/2BIVBFDLRP5N" target="_blank" rel="noopener noreferrer" style="color: #00cc33;"><span style="font-size: 12pt;"><strong></strong></span></a></span><a href="https://www.amazon.com/hz/wishlist/ls/2BIVBFDLRP5N" target="_blank" rel="noopener noreferrer"> </a><p></p>
// <p style="text-align: left;"><a href="https://www.amazon.com/hz/wishlist/ls/2BIVBFDLRP5N" target="_blank" rel="noopener noreferrer">Click this link</a> to view a list of specific<br>
// items I currently require to continue<br>
// to operate the <strong>What On </strong><strong>Earth Is Happening</strong> website, presentations, office and gift shop. If you wish to donate an item from this list, you can purchase it and have it shipped directly to me.<br>
// <strong></strong><em><strong></strong></em><span style="text-decoration: underline;"><em><strong></strong></em></span><em><strong></strong></em><em><strong></strong></em></p>
// </td>
// </tr>
// </tbody>
// </table></p>
// <!-- /wp:paragraph -->';                           // Content goes here
//     $new_page_template  = 'page-template-reading-shadow.php';       // The template to use for the page
//     $page_check = get_page_by_title($new_page_title);   // Check if the page already exists
//     // Store the above data in an array
//     $new_page = array(
//             'post_type'     => 'page',
//             'post_title'    => $new_page_title,
//             'post_content'  => $new_page_content,
//             'post_status'   => 'publish',
//             'post_author'   => 1,
//             'post_name'     => 'donate'
//     );
//     // If the page doesn't already exist, create it
//     if(!isset($page_check->ID)){
//         $new_page_id = wp_insert_post($new_page);
//         if(!empty($new_page_template)){
//             update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
//         }
//     }
// } ?>
