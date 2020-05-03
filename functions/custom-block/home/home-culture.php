<?php 
function register_acf_block_type_culture() {

    // register a culture block.
    acf_register_block_type(array(
        'name'              => 'culture',
        'title'             => __('Culture'),
        'description'       => __('A Culture block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/home/home-culture.php',
        'category'          => 'formatting',
        'icon'              => 'palmtree',
		//'mode'			    => 'preview',
        'keywords'          => array( 'culture', 'office', 'environment' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){

            //wp_enqueue_script( 'home-culture-js', get_template_directory_uri() . '/template-parts/blocks/home/js/home-culture.min.js', array(), '1.0.0', true );
          },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false],    
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_culture');
}

?>