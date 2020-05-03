<?php 
function register_acf_block_type_home_awards() {

    // register a home awards block.
    acf_register_block_type(array(
        'name'              => 'awards',
        'title'             => __('Home | Awards'),
        'description'       => __('An Home Awards block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/home/home-awards.php',
        'category'          => 'formatting',
        'icon'              => 'awards',
		'mode'			    => 'preview',
        'keywords'          => array( 'recognition', 'honors' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            //wp_enqueue_script( 'home-awards-js', get_template_directory_uri() . '/template-parts/blocks/home/js/home-awards.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_home_awards');
}

?>