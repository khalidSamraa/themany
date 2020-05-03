<?php

/**
 * Editorial Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'editorial-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'editorial-slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap" >

    <div class="slider">
    <?php if(have_rows('slides')):
        while(have_rows('slides')): the_row();
    
        $background_color = get_sub_field('background_color');
        $texture = get_sub_field('textured_background'); 
        $slideStyle = get_sub_field('slide_style');
        
        ?>
                       

        <div class="slide slide-style-<?php echo $slideStyle; ?>">
            <div class="container">
                <?php if($slideStyle === '1'):
                    $image1 = get_sub_field('image_1_1');

                    // Thumbnail size attributes.
                    $size_1 = 'editorial-1-1';
                    $image_1 = $image1['sizes'][ $size_1 ];
                    $width_1 = $image1['sizes'][ $size_1 . '-width' ];
                    $height_1 = $image1['sizes'][ $size_1 . '-height' ];  
                    $alt1 = $image1['alt'];
                
                    $image2 = get_sub_field('image_1_2');
                
                    // Thumbnail size attributes.
                    $size_2 = 'editorial-1-2';
                    $image_2 = $image2['sizes'][ $size_2 ];
                    $width_2 = $image2['sizes'][ $size_2 . '-width' ];
                    $height_2 = $image2['sizes'][ $size_2 . '-height' ];  
                    $alt2 = $image2['alt'];
                
                    $image3 = get_sub_field('image_1_3');
                
                    // Thumbnail size attributes.
                    $size_3 = 'editorial-1-3';
                    $image_3 = $image3['sizes'][ $size_3 ];
                    $width_3 = $image3['sizes'][ $size_3 . '-width' ];
                    $height_3 = $image3['sizes'][ $size_3 . '-height' ];  
                    $alt3 = $image3['alt'];
                
                    $image4 = get_sub_field('image_1_4');
                
                    // Thumbnail size attributes.
                    $size_4 = 'editorial-1-4';
                    $image_4 = $image4['sizes'][ $size_4 ];
                    $width_4 = $image4['sizes'][ $size_4 . '-width' ];
                    $height_4 = $image4['sizes'][ $size_4 . '-height' ]; 
                    $alt4 = $image4['alt'];
                
                    $image5 = get_sub_field('image_1_5');
                
                    // Thumbnail size attributes.
                    $size_5 = 'editorial-1-4';
                    $image_5 = $image5['sizes'][ $size_5 ];
                    $width_5 = $image5['sizes'][ $size_5 . '-width' ];
                    $height_5 = $image5['sizes'][ $size_5 . '-height' ];    
                    $alt5 = $image5['alt'];
                
                    $image6 = get_sub_field('image_1_6');
                
                    // Thumbnail size attributes.
                    $size_6 = 'editorial-1-5';
                    $image_6 = $image6['sizes'][ $size_6 ];
                    $width_6 = $image6['sizes'][ $size_6 . '-width' ];
                    $height_6 = $image6['sizes'][ $size_6 . '-height' ];    
                    $alt6 = $image5['alt'];                
                
                ?>
                <div class="column">
                    <img class="editorial-1-1" src="<?php echo esc_url($image_1); ?>" alt="<?php echo esc_attr($alt1); ?>" width="<?php echo $width_1; ?>" height="<?php echo $height_1; ?>" />
                </div>
                
                <div class="column">
                    <img class="editorial-1-2" src="<?php echo esc_url($image_2); ?>" alt="<?php echo esc_attr($alt2); ?>" width="<?php echo $width_2; ?>" height="<?php echo $height_2; ?>" />
                
                    <img class="editorial-1-3" src="<?php echo esc_url($image_3); ?>" alt="<?php echo esc_attr($alt3); ?>" width="<?php echo $width_3; ?>" height="<?php echo $height_3; ?>" />
                
                    <img class="editorial-1-4" src="<?php echo esc_url($image_4); ?>" alt="<?php echo esc_attr($alt4); ?>" width="<?php echo $width_4; ?>" height="<?php echo $height_4; ?>" />
                
                    <img class="editorial-1-5" src="<?php echo esc_url($image_5); ?>" alt="<?php echo esc_attr($alt5); ?>" width="<?php echo $width_5; ?>" height="<?php echo $height_5; ?>" />
                    
                    <img class="editorial-1-6" src="<?php echo esc_url($image_6); ?>" alt="<?php echo esc_attr($alt6); ?>" width="<?php echo $width_6; ?>" height="<?php echo $height_6; ?>" />
                </div>
                
            <?php elseif($slideStyle === '2'):
                
                    $image1 = get_sub_field('image_2_1');

                    // Thumbnail size attributes.
                    $size_1 = 'editorial-2-1';
                    $image_1 = $image1['sizes'][ $size_1 ];
                    $width_1 = $image1['sizes'][ $size_1 . '-width' ];
                    $height_1 = $image1['sizes'][ $size_1 . '-height' ];  
                    $alt1 = $image1['alt'];
                
                    $image2 = get_sub_field('image_2_2');
                
                    // Thumbnail size attributes.
                    $size_2 = 'editorial-2-2';
                    $image_2 = $image2['sizes'][ $size_2 ];
                    $width_2 = $image2['sizes'][ $size_2 . '-width' ];
                    $height_2 = $image2['sizes'][ $size_2 . '-height' ];  
                    $alt2 = $image2['alt'];
                
                    $image3 = get_sub_field('image_2_3');
                
                    // Thumbnail size attributes.
                    $size_3 = 'editorial-2-3';
                    $image_3 = $image3['sizes'][ $size_3 ];
                    $width_3 = $image3['sizes'][ $size_3 . '-width' ];
                    $height_3 = $image3['sizes'][ $size_3 . '-height' ];  
                    $alt3 = $image3['alt'];
                
                ?>
                <img class="editorial-2-1" src="<?php echo esc_url($image_1); ?>" alt="<?php echo esc_attr($alt1); ?>" width="<?php echo $width_1; ?>" height="<?php echo $height_1; ?>" />
                
                <img class="editorial-2-2" src="<?php echo esc_url($image_2); ?>" alt="<?php echo esc_attr($alt2); ?>" width="<?php echo $width_2; ?>" height="<?php echo $height_2; ?>" />
                
                <img class="editorial-2-3" src="<?php echo esc_url($image_3); ?>" alt="<?php echo esc_attr($alt3); ?>" width="<?php echo $width_3; ?>" height="<?php echo $height_3; ?>" />                
                
            <?php elseif($slideStyle === '3'):
                
                    $image1 = get_sub_field('image_3_1');

                    // Thumbnail size attributes.
                    $size_1 = 'editorial-3-1';
                    $image_1 = $image1['sizes'][ $size_1 ];
                    $width_1 = $image1['sizes'][ $size_1 . '-width' ];
                    $height_1 = $image1['sizes'][ $size_1 . '-height' ];  
                    $alt1 = $image1['alt'];
                
                    $image2 = get_sub_field('image_3_2');
                
                    // Thumbnail size attributes.
                    $size_2 = 'editorial-3-2';
                    $image_2 = $image2['sizes'][ $size_2 ];
                    $width_2 = $image2['sizes'][ $size_2 . '-width' ];
                    $height_2 = $image2['sizes'][ $size_2 . '-height' ];  
                    $alt2 = $image2['alt'];
                
                    $image3 = get_sub_field('image_3_3');
                
                    // Thumbnail size attributes.
                    $size_3 = 'editorial-3-3';
                    $image_3 = $image3['sizes'][ $size_3 ];
                    $width_3 = $image3['sizes'][ $size_3 . '-width' ];
                    $height_3 = $image3['sizes'][ $size_3 . '-height' ];  
                    $alt3 = $image3['alt'];
                
                ?>
                <img class="editorial-3-1" src="<?php echo esc_url($image_1); ?>" alt="<?php echo esc_attr($alt1); ?>" width="<?php echo $width_1; ?>" height="<?php echo $height_1; ?>" />
                
                <img class="editorial-3-2" src="<?php echo esc_url($image_2); ?>" alt="<?php echo esc_attr($alt2); ?>" width="<?php echo $width_2; ?>" height="<?php echo $height_2; ?>" />
                
                <img class="editorial-3-3" src="<?php echo esc_url($image_3); ?>" alt="<?php echo esc_attr($alt3); ?>" width="<?php echo $width_3; ?>" height="<?php echo $height_3; ?>" />                
                                
            <?php elseif($slideStyle === '4'):
                
                    $image1 = get_sub_field('image_4_1');

                    // Thumbnail size attributes.
                    $size_1 = 'editorial-4-1';
                    $image_1 = $image1['sizes'][ $size_1 ];
                    $width_1 = $image1['sizes'][ $size_1 . '-width' ];
                    $height_1 = $image1['sizes'][ $size_1 . '-height' ];  
                    $alt1 = $image1['alt'];
                
                    $image2 = get_sub_field('image_4_2');
                
                    // Thumbnail size attributes.
                    $size_2 = 'editorial-4-2';
                    $image_2 = $image2['sizes'][ $size_2 ];
                    $width_2 = $image2['sizes'][ $size_2 . '-width' ];
                    $height_2 = $image2['sizes'][ $size_2 . '-height' ];  
                    $alt2 = $image2['alt'];
                
                    $image3 = get_sub_field('image_4_3');
                
                    // Thumbnail size attributes.
                    $size_3 = 'editorial-4-3';
                    $image_3 = $image3['sizes'][ $size_3 ];
                    $width_3 = $image3['sizes'][ $size_3 . '-width' ];
                    $height_3 = $image3['sizes'][ $size_3 . '-height' ];  
                    $alt3 = $image3['alt'];
                
                ?>
                <div class="column">
                    <img class="editorial-4-1" src="<?php echo esc_url($image_1); ?>" alt="<?php echo esc_attr($alt1); ?>" width="<?php echo $width_1; ?>" height="<?php echo $height_1; ?>" />

                    <img class="editorial-4-2" src="<?php echo esc_url($image_2); ?>" alt="<?php echo esc_attr($alt2); ?>" width="<?php echo $width_2; ?>" height="<?php echo $height_2; ?>" />
                    
                </div>
                <div class="column">
                    
                    <img class="editorial-4-3" src="<?php echo esc_url($image_3); ?>" alt="<?php echo esc_attr($alt3); ?>" width="<?php echo $width_3; ?>" height="<?php echo $height_3; ?>" />   
                </div>
                       
            <?php endif; ?>
                
            </div>
            <?php if($texture): ?>
                <div class="stylized-bkg">
                    <div class="noise" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/bkg-noise.jpg);" ></div>
                    <div class="paper" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/bkg-paper.jpg);"></div>
                    <div class="color" <?php if(!empty($background_color)): ?>style="background-color:<?php echo $background_color; ?>"<?php endif; ?>>
                    </div>
                </div>
            <?php else: ?>
                <div class="background-color" <?php if(!empty($background_color)): ?>style="background-color:<?php echo $background_color; ?>"<?php endif; ?>>
                </div>
            <?php endif; ?>
        </div>
        <?php 
    endwhile;  endif; ?>

    </div>
</section>