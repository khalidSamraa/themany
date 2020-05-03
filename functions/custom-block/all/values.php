<?php 
function register_acf_block_type_values() {

    // register a values block.
    acf_register_block_type(array(
        'name'              => 'values',
        'title'             => __('Values'),
        'description'       => __('A Values block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/all/values.php',
        'category'          => 'formatting',
        'icon'              => 'image-filter',
		'mode'			    => 'preview',
        'keywords'          => array( 'partner', 'value','about' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            wp_enqueue_script( 'values-js', get_template_directory_uri() . '/template-parts/blocks/all/js/values.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_values');
}

?>