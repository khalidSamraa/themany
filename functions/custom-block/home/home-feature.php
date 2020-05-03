<?php 
function register_acf_block_type_home_feature() {

    // register a home feature block.
    acf_register_block_type(array(
        'name'              => 'feature',
        'title'             => __('Home Feature'),
        'description'       => __('A Home Feature block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/home/home-feature.php',
        'category'          => 'formatting',
        'icon'              => 'images-alt2',
		'mode'			    => 'preview',
        'keywords'          => array( 'carousel', 'slider', 'reel', 'home' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            
            wp_enqueue_script( 'imagesLoaded', get_template_directory_uri() . '/js/lib/imagesloaded.pkgd.min.js', array(), '1.0.1', true );
                
            wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
            wp_enqueue_style( 'slick-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
            wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery', 'imagesLoaded'), '1.8.1', true );

            
            wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/all/css/slider.min.css', array(), '1.0.0' );
            wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/all/js/slider.min.js', array(), '1.0.1', true );
          },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false],
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_home_feature');
}


?>