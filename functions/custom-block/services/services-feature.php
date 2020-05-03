<?php 
function register_acf_block_type_services_feature() {

    // register a Services feature block.
    acf_register_block_type(array(
        'name'              => 'services-feature',
        'title'             => __('Services | Feature'),
        'description'       => __('An Services Feature block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/services/services-feature.php',
        'category'          => 'formatting',
        'icon'              => 'images-alt2',
		'mode'			    => 'preview',
        'keywords'          => array( 'feature', 'header','services' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            //wp_enqueue_script( 'services-feature-js', get_template_directory_uri() . '/template-parts/blocks/services/js/services-feature.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_services_feature');
}

?>