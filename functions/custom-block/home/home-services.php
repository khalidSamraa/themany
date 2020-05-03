<?php 
function register_acf_block_type_home_services() {

    // register a home services block.
    acf_register_block_type(array(
        'name'              => 'services',
        'title'             => __('Home | Services'),
        'description'       => __('A Home Services block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/home/home-services.php',
        'category'          => 'formatting',
        'icon'              => 'admin-tools',
		'mode'			    => 'preview',
        'align'             => 'full',
        'keywords'          => array( 'offering', 'capabilties' ),
        'enqueue_assets' 	=> function(){

            //wp_enqueue_script( 'home-services-js', get_template_directory_uri() . '/template-parts/blocks/home/js/home-services.min.js', array(), '1.0.0', true );
          },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false],
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_home_services');
}

?>

