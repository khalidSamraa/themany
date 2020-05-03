<?php 
function register_acf_block_type_cpt_team() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'team-member',
        'title'             => __('Team Member'),
        'description'       => __('An Team Member block.'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/team/team.php',
        'category'          => 'formatting',
        'icon'              => 'universal-access',
		'mode'			    => 'preview',
        'keywords'          => array( 'team', 'employee','slide', 'member', 'person', 'people' ),
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
            wp_enqueue_style( 'team-css', get_template_directory_uri() . '/template-parts/blocks/team/css/team-member.min.css', array(), '1.0.0', true );
            
        },
        'supports'      => ['align' => ['full'], 'mode' => false, 'multiple' => false]    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_type_cpt_team');
}

?>