<?php 
function register_acf_block_type_services_service() {

    // register a Services Service block.
    acf_register_block_type(array(
        'name'              => 'services-service',
        'title'             => __('Services | Service'),
        'description'       => __('An Services Service block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/services/services-service.php',
        'category'          => 'formatting',
        'icon'              => 'lightbulb',
		'mode'			    => 'preview',
        'keywords'          => array( 'header','services' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            //wp_enqueue_script( 'services-service-js', get_template_directory_uri() . '/template-parts/blocks/services/js/services-service.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => true]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_services_service');
}

?>