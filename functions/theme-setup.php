<?php
/**
 * Setup the main theme functions
 *
 * @package The Many Ad Agency
 * @since 1.0
 */

function theme_setup() {

    // Add theme support
    if ( function_exists( 'add_theme_support' ) ) {
        
        // Add Menu Support
        add_theme_support('menus');

        // Add Thumbnail Theme Support
        add_theme_support('post-thumbnails');
        add_image_size('small', 120, '', true); // Small Thumbnail
        
        //About
        add_image_size('about-feature-portrait', 450, 575, true); 
        add_image_size('culture-feature-landscape', 575, 450, true); 
        add_image_size('team-portrait', 550, 875, true); 
        
        //General
        add_image_size('wide', 1920, '', true); 
        
        //Gif Gallery
        add_image_size('gif-gallery-1', 300, 198, true); 
        add_image_size('gif-gallery-2', 300, 300, true); 
        add_image_size('gif-gallery-3', 400, 250, true); 
        add_image_size('gif-gallery-4', 185, 235, true); 
        add_image_size('gif-gallery-5', 475, 166, true); 
        add_image_size('gif-gallery-6', 200, 168, true); 
        add_image_size('gif-gallery-7', 255, 317, true); 
        add_image_size('gif-gallery-8', 200, 179, true); 
        add_image_size('gif-gallery-9', 186, 287, true); 
        
        //Editorial Slider #1
        add_image_size('editorial-1-1', 850, 950, true); 
        add_image_size('editorial-1-2', 355, 507, true); 
        add_image_size('editorial-1-3', 250, 390, true); 
        add_image_size('editorial-1-4', 480, 315, true); 
        add_image_size('editorial-1-5', 320, 420, true); 
        
        //Editorial Slider #2
        add_image_size('editorial-2-1', 842, 900, true);      
        add_image_size('editorial-2-2', 762, 900, true);         
        add_image_size('editorial-2-3', 750, 360, true);         
        
        //Editorial Slider #3
        add_image_size('editorial-3-1', 575, 650, true);          
        add_image_size('editorial-3-2', 390, 350, true);    
        add_image_size('editorial-3-3', 1365, 850, true);   
        
        //Editorial Slider #4
        add_image_size('editorial-4-1', 680, 410, true);        
        add_image_size('editorial-4-2', 680, 390, true);    
        add_image_size('editorial-4-3', 1040, 1080, true);              
    }

	// Add ajaxUrl
	function add_ajaxurl() { ?>
		<script type="text/javascript">
			var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
		</script>
	<?php
	}

	add_action('wp_head','add_ajaxurl');


}



add_action( 'after_setup_theme', 'theme_setup' );    



?>