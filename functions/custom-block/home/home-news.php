<?php 
function register_acf_block_type_home_news() {

    // register a home news block.
    acf_register_block_type(array(
        'name'              => 'news',
        'title'             => __('Home | News'),
        'description'       => __('A Home News block.'),
        'render_template'   => 'template-parts/blocks/home/home-news.php',
        'category'          => 'formatting',
        'icon'              => 'megaphone',
		'mode'			    => 'auto',
        'keywords'          => array( 'news', 'events', 'blog', 'article', 'home' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
            wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
            wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
            
            wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/all/css/slider.min.css', array(), '1.0.0' );
            wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/all/js/slider.min.js', array(), '1.0.0', true );
          },
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_home_news');
}

?>