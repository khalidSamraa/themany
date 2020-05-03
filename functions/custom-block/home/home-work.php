<?php 
function register_acf_block_type_home_work() {

    // register a home work block.
    acf_register_block_type(array(
        'name'              => 'work',
        'title'             => __('Home | Work'),
        'description'       => __('A Home Work block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/home/home-work.php',
        'category'          => 'formatting',
        'icon'              => 'art',
		'mode'			    => 'preview',
        'align'             => 'full',
        'keywords'          => array( 'case studies', 'project' ),
        'enqueue_assets' 	=> function(){

            //wp_enqueue_script( 'home-work-js', get_template_directory_uri() . '/template-parts/blocks/home/js/home-work.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false],
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_home_work');
}

?>