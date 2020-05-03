<?php 
function register_acf_block_type_contact_info() {

    // register a contact info block.
    acf_register_block_type(array(
        'name'              => 'contact-info',
        'title'             => __('Contact | Info'),
        'description'       => __('A Contact Info block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/contact/contact-info.php',
        'category'          => 'formatting',
        'icon'              => 'location-alt',
		'mode'			    => 'preview',
        'keywords'          => array( 'map', 'address','info', 'contact', 'directions' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            wp_enqueue_script( 'contact-info-js', get_template_directory_uri() . '/template-parts/blocks/contact/js/contact-info.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_contact_info');
}

?>