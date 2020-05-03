<?php 
function register_acf_block_type_culture_unfiltered() {

    // register a culture unfiltered gifs block.
    acf_register_block_type(array(
        'name'              => 'culture-unfiltered',
        'title'             => __('Culture | Unfiltered Gifs'),
        'description'       => __('An Culture Feature block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/culture/culture-unfiltered.php',
        'category'          => 'formatting',
        'icon'              => 'format-video',
		'mode'			    => 'preview',
        'keywords'          => array( 'gif', 'unfiltered','giphy', 'gallery' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            //wp_enqueue_script( 'culture-unfiltered-js', get_template_directory_uri() . '/template-parts/blocks/culture/js/culture-unfiltered.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => true]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_culture_unfiltered');
}

?>