<?php 
/*------------------------------------*\
	REMOVE ICONS FROM WP-ADMIN-Bar
\*------------------------------------*/

function remove_toolbar_items($wp_adminbar) {
  	$wp_adminbar->remove_node('analytify'); //Analytics Plugin for dashboard
  	$wp_adminbar->remove_node('comments'); 
	$wp_adminbar->remove_node('wp-logo'); 
}
add_action('admin_bar_menu', 'remove_toolbar_items', 999);

/*------------------------------------*\
	HIDE LEFT SIDEBAR MENU ITEM
\*------------------------------------*/

function remove_menus(){
    remove_menu_page('edit-comments.php');
    remove_menu_page( 'analytify-dashboard' );  
    //remove_menu_page( 'acf' );    
    remove_menu_page( 'cerber-security' );           
}
add_action( 'admin_menu', 'remove_menus' );

/*------------------------------------*\
	CUSTOMIZE DASHBOARD // ONLY SHOW ANALYTICS
\*------------------------------------*/

function remove_dashboard_widgets() {
		remove_meta_box( 'welcome-panel', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box('dashboard_secondary','dashboard','side'); 
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
		remove_meta_box( 'cerber_quick', 'dashboard', 'normal' );
/*		remove_meta_box( 'sendgrid_statistics_widget', 'dashboard', 'normal' );
		remove_meta_box( 'dahsboard_site_health', 'dashboard', 'normal' );*/
        remove_action('welcome_panel','wp_welcome_panel');
}
// 
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

/*------------------------------------*\
	The Many Custom Dashboard Widget
\*------------------------------------*/

add_action('wp_dashboard_setup', 'many_dashboard_widget');
  
function many_dashboard_widget() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('many_dashboard_widget', 'Welcome To The Many CMS', 'many_dashboard_help');
}
 
function many_dashboard_help() {
echo '<div>
<img src="'. get_template_directory_uri().'/img/the-many-logo-dashboard.jpg" style="width:40%; height:auto" width="221" height="59" />
<p>This is your portal to customizing the The Many website. Find documentation on how to edit the CMS here: <br />
<a href="#">The Many Documentation</a><br /><br />
<small>Hint: Enable the table of contents to nagivate the doc.<br />MAC: Ctrl + ⌘, press a then h.<br />PC: Ctrl + Alt, press a then h</small><br /><br />

Report any issues or submit questions to Dave Averdick - contact: <a href="mailto:dave@davevsdave.com">dave@davevsdave.com</a></p></div>';
}

/*------------------------------------*\
	FORCE WIDGET POSITION FOR ALL USERS
\*------------------------------------*/

add_action( 'admin_init', 'set_dashboard_meta_order' );
function set_dashboard_meta_order() {
  $id = get_current_user_id(); //we need to know who we're updating
  $meta_value = array(
    'normal'  => 'plusplus_dashboard_widget', //first key/value pair from the above serialized array
    'side'    => 'analytify-dashboard-addon', //second key/value pair from the above serialized array
  );
  update_user_meta( $id, 'meta-box-order_dashboard', $meta_value ); //update the user meta with the user's ID, the meta_key meta-box-order_dashboard, and the new meta_value
}


/*------------------------------------*\
	Rename "POST" to "Work"
\*------------------------------------*/

function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Work';
    $submenu['edit.php'][5][0] = 'Work';
    $submenu['edit.php'][10][0] = 'Add Work';
    $submenu['edit.php'][16][0] = 'Work Tags';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Work';
    $labels->singular_name = 'Work';
    $labels->add_new = 'Add Work';
    $labels->add_new_item = 'Add Work';
    $labels->edit_item = 'Edit Work';
    $labels->new_item = 'Work';
    $labels->view_item = 'View Work';
    $labels->search_items = 'Search Work';
    $labels->not_found = 'No Work found';
    $labels->not_found_in_trash = 'No Work found in Trash';
    $labels->all_items = 'All Work';
    $labels->menu_name = 'Work';
    $labels->name_admin_bar = 'Work';
    $wp_post_types['post']->menu_icon = 'dashicons-images-alt';
}
 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );

/*------------------------------------*\
	CUSTOM POST COLUMN VIEW
\*------------------------------------*/

class custom_post_view {
  function __construct() {
    add_action( 'manage_pages_columns', array( $this, 'manage_columns' ) );
    add_action( 'manage_posts_columns', array( $this, 'manage_columns' ), 10, 2 );
  }
  function manage_columns( $columns, $post_type = 'page' ) {
    if ( in_array( $post_type, array( 'post', 'page' ) ) ) {
      unset( $columns['comments'] );
      unset( $columns['tags'] );
    }
    return $columns;
  }
}
new custom_post_view();


/*------------------------------------*\
	REMOVE HELP TAB
\*------------------------------------*/

add_action('admin_head', 'remove_help_tabs');
function remove_help_tabs() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
}

/*-----------------------------------------------------------------------------------*/
/* Style the login screen */
/*-----------------------------------------------------------------------------------*/

function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');


/*-----------------------------------------------------------------------------------*/
/* Dashboard stylesheet */
/*-----------------------------------------------------------------------------------*/

function dash_styles() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/custom-dash-styles.css" />';

}
add_action('admin_head', 'dash_styles');


/*-----------------------------------------------------------------------------------*/
/* Dashboard JS */
/*-----------------------------------------------------------------------------------*/

function custom_register_admin_scripts() {
    
    wp_register_script( 'admin-javascript', get_template_directory_uri() . '/js/admin.min.js' );
    wp_enqueue_script( 'admin-javascript', array(), '1.0.0' );

} // end custom_register_admin_scripts

add_action( 'admin_enqueue_scripts', 'custom_register_admin_scripts');


/*-----------------------------------------------------------------------------------*/
/* Set gutenberg block to support full align mode */
/*-----------------------------------------------------------------------------------*/

add_theme_support('align-wide');


/*-----------------------------------------------------------------------------------*/
/* Styling blocks when editing ONLY */
/*-----------------------------------------------------------------------------------*/

add_action('enqueue_block_editor_assets','add_block_editor_assets',10,0);
function add_block_editor_assets(){
    wp_enqueue_style('block_editor_css', get_template_directory_uri() . '/template-parts/blocks/all/css/admin-reset.min.css');
}

/*-----------------------------------------------------------------------------------*/
/* ACF Custom JS  */
/*-----------------------------------------------------------------------------------*/

function my_admin_enqueue_scripts() {

	wp_enqueue_script( 'my-admin-js', get_template_directory_uri() . '/js/lib/acf-customize.min.js', array(), '1.0.0', true );

}
add_action('acf/input/admin_enqueue_scripts', 'my_admin_enqueue_scripts');


/*-----------------------------------------------------------------------------------*/
/* Block Types Per CPT & Page  */
/*-----------------------------------------------------------------------------------*/

function custom_allowed_block_types( $allowed_block_types, $post ) {
  if ( $post->post_type == 'post' ) {
    return array( 
      'core/paragraph' 
    );
  }else if($post->post_type == 'team'){
    return array( 
      'acf/team-member' 
    );
  }else if($post->post_type == 'page'){
    $page_slug=$post->post_name;

    if($page_slug=='about'){
      return array( 
        'acf/about-feature',
        'acf/about-team',
        'acf/about-timeline',
        'acf/values',
        'acf/quote',
        'acf/confetti',
        //'acf/flex-slider',
        'acf/contact-form'
      );
    }
    if($page_slug=='culture'){
      return array( 
        'acf/culture-feature',
        'acf/culture-unfiltered',
        'acf/values',
        'acf/quote',
        'acf/confetti',
        'acf/flex-slider',
        'acf/editorial-slider',
        'acf/contact-form'
      ); 
    }
    if($page_slug=='home'){
      return array( 
        'acf/home-feature',
        'acf/home-services',
        'acf/values',
        'acf/quote',
        'acf/confetti',
        'acf/flex-slider',
        'acf/editorial-slider',
        'acf/contact-form',
        'acf/home-work'
        //'acf/home-news',
        //'acf/home-culture',
      );   
    }
    if($page_slug=='contact'){
      return array( 
        'acf/contact-feature',
        'acf/contact-sinfo',
        'acf/values',
        'acf/quote',
        'acf/confetti',
        'acf/flex-slider',
        'acf/editorial-slider',
        'acf/contact-form'
        //'acf/home-news',
        //'acf/home-culture',
      );       
    }
  }else{
    return $allowed_block_types;
  }
}
 
add_filter( 'allowed_block_types', 'custom_allowed_block_types', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/* Custom Post Order For Dash  */
/*-----------------------------------------------------------------------------------*/

function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
        'index.php', 
        'edit.php?post_type=page',
        'edit.php', 
        'edit.php?post_type=team', 
        'edit.php?post_type=services', 
        'upload.php', 
        'themes.php', 
        'plugins.php',
        'users.php',
        'tools.php',
        'options-general.php', 
        'edit.php?post_type=acf-field-group'
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); 
add_filter('menu_order', 'custom_menu_order');
function remove_discussion_featured_image(){
  remove_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'remove_discussion_featured_image', 11 );
?>