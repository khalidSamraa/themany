<?php 
function register_acf_block_type_about_team() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'about-team',
        'title'             => __('About | Team'),
        'description'       => __('An About Team block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/about/about-team-carousel.php',
        'category'          => 'formatting',
        'icon'              => 'universal-access',
		'mode'			    => 'preview',
        'keywords'          => array( 'feature', 'header','about' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){

            //wp_enqueue_script( 'about-team-js', get_template_directory_uri() . '/template-parts/blocks/about/js/about-team.min.js', array(), '1.0.0', true );
            
            wp_enqueue_script( 'imagesLoaded', get_template_directory_uri() . '/js/lib/imagesloaded.pkgd.min.js', array(), '1.0.1', true );
                
            wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
            wp_enqueue_style( 'slick-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
            wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery', 'imagesLoaded'), '1.8.1', true );

            
            wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/all/css/slider.min.css', array(), '1.0.0' );
            wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/all/js/slider.min.js', array(), '1.0.1', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_about_team');
}

?>