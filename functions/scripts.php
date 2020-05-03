<?php
/**
 * This file loads the CSS and Javascript used for the theme
 *
 * @package The Many
 * @since 1.0
 */

function header_scripts() {

    wp_register_style( 'googlefonts', '//fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap', array(), '1.0', 'all' );
    wp_enqueue_style( 'googlefonts' );

		// register scripts
        wp_register_script('all', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), '1.0.0', true); 
        wp_enqueue_script('all');
}

//Sytlesheet
function site_style() {
    wp_enqueue_style('style', get_bloginfo('template_directory') . '/style.css', false, 1.00);
}
add_action('wp_print_styles', 'site_style');


add_action( 'wp_enqueue_scripts', 'register_jquery' );
function register_jquery() {
    if (!is_admin() && $GLOBALS['pagenow'] != 'wp-login.php') {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
		if(preg_match('/(?i)msie [6-8]/',$_SERVER['HTTP_USER_AGENT'])) {
			// if IE<=8
			wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', true);
		}
		else {
			wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', true);
		}
		
        wp_enqueue_script('jquery');
    }
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

add_action( 'wp_enqueue_scripts' , 'header_scripts' );
add_action('wp_footer','add_ajaxurl');


?>
