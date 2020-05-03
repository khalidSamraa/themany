<?php
/**
 * Team Post Categories
 *
 * @package The Many Agency
 * @since 1.0

**/
// Create taxonomy
function departments_taxonomy_register() {

    $labels = array(
        'name'                       => __( 'Departments' ),
        'singular_name'              => __( 'Department' ),
        'search_items'               => __( 'Seach Departments'  ),
        'popular_items'              => __( 'Popular Departments'  ),
        'all_items'                  => __( 'All Departments'  ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Department'  ),
        'update_item'                => __( 'Update Department'  ),
        'add_new_item'               => __( 'Add New Department'  ),
        'new_item_name'              => __( 'New Department Name'  ),
        'separate_items_with_commas' => __( 'Separate Departments with commas'  ),
        'add_or_remove_items'        => __( 'Add or remove Department'  ),
        'choose_from_most_used'      => __( 'Choose from the most used Department'  ),
        'not_found'                  => __( 'No Department found'  ),
        'menu_name'                  => __( 'Department' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'Departments' ),
        'show_in_rest'          => true,
    );

    register_taxonomy( 'departments', array( 'team' ), $args );
}

add_action( 'init', 'departments_taxonomy_register', 0 );



?>