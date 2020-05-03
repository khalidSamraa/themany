<?php 
function register_acf_block_type_about_feature() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'about-feature',
        'title'             => __('About | Feature'),
        'description'       => __('An About Feature block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/about/about-feature.php',
        'category'          => 'formatting',
        'icon'              => 'images-alt2',
		'mode'			    => 'preview',
        'keywords'          => array( 'feature', 'header','about' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            wp_enqueue_script( 'about-feature-js', get_template_directory_uri() . '/template-parts/blocks/about/js/about-feature.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_about_feature');
}

?>