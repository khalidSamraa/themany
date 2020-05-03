<?php 
function register_acf_block_type_confetti() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'confefetti',
        'title'             => __('Confetti Frame'),
        'description'       => __('A Confetti Messaging block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/all/confetti.php',
        'category'          => 'formatting',
        'icon'              => 'buddicons-groups',
		'mode'			    => 'preview',
        'keywords'          => array( 'confetti', 'title','messaging', 'card' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            wp_enqueue_script( 'confetti-js', get_template_directory_uri() . '/template-parts/blocks/all/js/confetti.min.js', array(), '1.0.0', true );
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_confetti');
}

?>