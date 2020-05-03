<?php 
function register_acf_block_type_about_timeline() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'about-timeline',
        'title'             => __('About | Timeline'),
        'description'       => __('An About Timeline block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/about/about-timeline.php',
        'category'          => 'formatting',
        'icon'              => 'backup',
		'mode'			    => 'preview',
        'keywords'          => array( 'timeline', 'history','about' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            wp_enqueue_script( 'about-timeline-js', get_template_directory_uri() . '/template-parts/blocks/about/js/about-timeline.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_about_timeline');
}

?>