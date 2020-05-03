<?php
/**
 * Services Post
 *
 * @package The Many Agency
 * @since 1.0

**/


function register_services() {
	$labels = [
		"name" => __( "Services", "custom-post-type-ui" ),
		"singular_name" => __( "Service", "custom-post-type-ui" ),
		"menu_name" => __( "Services", "custom-post-type-ui" ),
		"all_items" => __( "Services", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Service", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Service", "custom-post-type-ui" ),
		"new_item" => __( "New Service", "custom-post-type-ui" ),
		"view_item" => __( "View Service", "custom-post-type-ui" ),
		"view_items" => __( "View Service", "custom-post-type-ui" ),
		"search_items" => __( "Search Service", "custom-post-type-ui" ),
		"not_found" => __( "No Services found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Services found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Service:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Service ", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Service", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Service", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Service", "custom-post-type-ui" ),
		"archives" => __( "Services archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Service", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Service", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Services list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Services list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Services list", "custom-post-type-ui" ),
		"attributes" => __( "Services attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Service", "custom-post-type-ui" ),
		"item_published" => __( "Service published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Service published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Service reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Service scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Service updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Service:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Team", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "team", "with_front" => true ],
		"query_var" => true,
        'taxonomies'  => array('departments'),
		"supports" => [ "title", "editor" ],
        'menu_icon' => 'dashicons-lightbulb',
        'show_in_rest' => true,

	];

	register_post_type( "services", $args );
}

add_action( 'init', 'register_services' );



?>