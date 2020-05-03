<?php 
function register_acf_block_type_culture_feature() {

    // register a culture feature block.
    acf_register_block_type(array(
        'name'              => 'culture-feature',
        'title'             => __('Culture | Feature'),
        'description'       => __('An Culture Feature block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/culture/culture-feature.php',
        'category'          => 'formatting',
        'icon'              => 'images-alt2',
		'mode'			    => 'preview',
        'keywords'          => array( 'feature', 'header','culture' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            //wp_enqueue_script( 'culture-feature-js', get_template_directory_uri() . '/template-parts/blocks/culture/js/culture-feature.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_culture_feature');
}

?>