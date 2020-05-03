<?php 
function register_acf_block_type_flex_slider() {

    // register a Flex Slider block.
    acf_register_block_type(array(
        'name'              => 'flex slider',
        'title'             => __('Flex Slider'),
        'description'       => __('A Flex Slider block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/all/flex-slider.php',
        'category'          => 'formatting',
        'icon'              => 'format-quote',
		'mode'			    => 'preview',
        'align'             => 'full',
        'keywords'          => array( 'slider', 'carousel', 'awards' ),
        'enqueue_assets' 	=> function(){

            wp_enqueue_script( 'flex-slider-js', get_template_directory_uri() . '/template-parts/blocks/all/js/flex-slider.min.js', array(), '1.0.0', true );
          },
        'supports'      => ['align' => ['full'], 'mode' => false],
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_flex_slider');
}


?>