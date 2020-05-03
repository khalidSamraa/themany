<?php 
function register_acf_block_type_editorial_slider() {

    // register a Editorial Slider block.
    acf_register_block_type(array(
        'name'              => 'editorial-slider',
        'title'             => __('Editorial Slider'),
        'description'       => __('An Editorial Gallery block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/all/editorial-slider.php',
        'category'          => 'formatting',
        'icon'              => 'layout',
		'mode'			    => 'preview',
        'keywords'          => array( 'slider', 'magazine','editorial', 'gallery', 'carousel' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            
           wp_enqueue_script( 'imagesLoaded', get_template_directory_uri() . '/js/lib/imagesloaded.pkgd.min.js', array(), '1.0.1', true );
                
            wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
            
            wp_enqueue_style( 'slick-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
            
            wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery', 'imagesLoaded'), '1.8.1', true );

            wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/all/css/slider.min.css', array(), '1.0.0' );
            
            wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/all/js/slider.min.js', array(), '1.0.1', true );         
            
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => true]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_editorial_slider');
}

?>