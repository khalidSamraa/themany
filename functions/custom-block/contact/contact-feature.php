<?php 
function register_acf_block_type_contact_feature() {

    // register a contact feature block.
    acf_register_block_type(array(
        'name'              => 'contact-feature',
        'title'             => __('Contact | Feature'),
        'description'       => __('A Contact Feature block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/contact/contact-feature.php',
        'category'          => 'formatting',
        'icon'              => 'format-image',
		'mode'			    => 'preview',
        'keywords'          => array( 'feature', 'header','contact' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            //wp_enqueue_script( 'contact-feature-js', get_template_directory_uri() . '/template-parts/blocks/contact/js/contact-feature.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_contact_feature');
}

?>