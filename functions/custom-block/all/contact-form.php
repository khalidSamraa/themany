<?php 
function register_acf_block_type_contact_form() {

    // register a contact form block.
    acf_register_block_type(array(
        'name'              => 'contact-form',
        'title'             => __('Contact Form'),
        'description'       => __('A Contact Form block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/all/contact-form.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
		'mode'			    => 'preview',
        'align'             => 'full',
        'keywords'          => array( 'contact', 'form', 'message', 'question' ),
        'enqueue_assets' 	=> function(){

            wp_enqueue_script( 'contact-form-js', get_template_directory_uri() . '/template-parts/blocks/all/js/contact-form.min.js', array(), '1.0.0', true );
          },
        'supports'      => ['align' => ['full'], 'mode' => false],
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_contact_form');
}


?>