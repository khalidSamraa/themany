<?php 
function register_acf_block_type_quote() {

    // register a Quote block.
    acf_register_block_type(array(
        'name'              => 'quote',
        'title'             => __('Quote'),
        'description'       => __('A Quote block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/all/quote.php',
        'category'          => 'formatting',
        'icon'              => 'format-quote',
		'mode'			    => 'preview',
        'align'             => 'full',
        'keywords'          => array( 'testimonial', 'blurb' ),
        'enqueue_assets' 	=> function(){

            wp_enqueue_script( 'quote-js', get_template_directory_uri() . '/template-parts/blocks/all/js/quote.min.js', array(), '1.0.0', true );
          },
        'supports'      => ['align' => ['full'], 'mode' => false],
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_quote');
}


?>