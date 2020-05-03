<?php
/**
 * Functions.php contains all the core functions for your theme to work properly.
 *
 * @package The Many
 * @since 1.0
 */


/**
 * Theme Setup
 * @since 1.0
*/
require_once( get_template_directory() .'/functions/theme-setup.php' );


/**
* Main functions
* @since 1.0
*/
require_once( get_template_directory() .'/functions/dashboard-customization.php' );
require_once( get_template_directory() .'/functions/scripts.php' );
require_once( get_template_directory() .'/functions/common-functions.php' );
require_once( get_template_directory() .'/functions/advanced-custom-fields/acf.php' );
require_once( get_template_directory() .'/functions/advanced-custom-fields/add-ons/contact-form-7/acf-cf7.php' );
require_once( get_template_directory() .'/functions/advanced-custom-fields/add-ons/oembed-field/acf-oembed.php' );


/**
* Custom Taxonomies
* @since 1.0
*/
//example registration of custom tax
require_once( get_template_directory() .'/functions/custom-taxonomy/departments-taxonomy.php' );


/**
* HP Custom Blocks
* @since 1.0
*/
require_once( get_template_directory() .'/functions/custom-block/home/home-feature.php' );
require_once( get_template_directory() .'/functions/custom-block/home/home-services.php' );
require_once( get_template_directory() .'/functions/custom-block/home/home-work.php' );
require_once( get_template_directory() .'/functions/custom-block/home/home-awards.php' );
require_once( get_template_directory() .'/functions/custom-block/home/home-culture.php' );

/*
require_once( get_template_directory() .'/functions/custom-block/home/news.php' );
*/

/**
* All Custom Blocks
* @since 1.0
*/
require_once( get_template_directory() .'/functions/custom-block/all/quote.php' );
require_once( get_template_directory() .'/functions/custom-block/all/flex-slider.php' );
require_once( get_template_directory() .'/functions/custom-block/all/contact-form.php' );
require_once( get_template_directory() .'/functions/custom-block/all/values.php' );
require_once( get_template_directory() .'/functions/custom-block/all/confetti.php' );
require_once( get_template_directory() .'/functions/custom-block/all/editorial-slider.php' );

/**
* About Page Custom Blocks
* @since 1.0
*/
require_once( get_template_directory() .'/functions/custom-block/about/about-feature.php' );
require_once( get_template_directory() .'/functions/custom-block/about/about-team.php' );
require_once( get_template_directory() .'/functions/custom-block/about/about-timeline.php' );
/**
* Culture Page Custom Blocks
* @since 1.0
*/
require_once( get_template_directory() .'/functions/custom-block/culture/culture-feature.php' );
require_once( get_template_directory() .'/functions/custom-block/culture/culture-unfiltered.php' );

/**
* Contact Page Custom Blocks
* @since 1.0
*/
require_once( get_template_directory() .'/functions/custom-block/contact/contact-feature.php' );
require_once( get_template_directory() .'/functions/custom-block/contact/contact-info.php' );

/**
* Contact Page Custom Blocks
* @since 1.0
*/
require_once( get_template_directory() .'/functions/custom-block/services/services-feature.php' );
require_once( get_template_directory() .'/functions/custom-block/services/services-service.php' );

/**
* Team Post Custom Blocks
* @since 1.0
*/
require_once( get_template_directory() .'/functions/custom-block/cpt/team.php' );

/**
* Custom Post Types
* @since 1.0
*/
//require_once( get_template_directory() .'/functions/custom-post/post.php' );
require_once( get_template_directory() .'/functions/custom-post/team.php' );
require_once( get_template_directory() .'/functions/custom-post/services.php' );




/*------------------------------------*\
	Functions
\*------------------------------------*/


// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

/*------------------------------------*\
	Add page slug to body class, love this - Credit: Starkers Wordpress Theme
\*------------------------------------*/
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}



/*------------------------------------*\
	Block Configuration
\*------------------------------------*/

/*add_filter( 'allowed_block_types', 'allowed_block_types', 10, 2 );
 
function allowed_block_types( $allowed_blocks, $post ) {
 
	$allowed_blocks = array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list'
	);
 
	if( $post->post_type === 'page' ) {
		$allowed_blocks[] = 'core/shortcode';
	}
 
	return $allowed_blocks;
 
}*/

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}



// Add Actions

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


if (!function_exists('normalize_empty_atts')) {
    function normalize_empty_atts ($atts) {
        foreach ($atts as $attribute => $value) {
            if (is_int($attribute)) {
                $atts[strtolower($value)] = true;
                unset($atts[$attribute]);
            }
        }
        return $atts;
    }
}

//move wpautop filter to AFTER shortcode is processed
remove_filter( 'the_content', 'wpautop' );
/*add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );*/


function any_ptype_on_tag($request) {
    if ( isset($request['tag']) )
        $request['post_type'] = 'any';

    return $request;
}

add_filter('request', 'any_ptype_on_tag');


add_filter('xmlrpc_enabled', '__return_false');

//toggle admin bar visibility
if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}
add_filter('show_admin_bar', '__return_false');


register_nav_menu( 'primary', 'Primary Menu' );

?>
