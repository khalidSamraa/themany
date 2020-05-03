<?php

/**
 * Flex Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'flex-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'flex-slider';
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
$headline = get_field('headline') ?: 'How We Stack Up';
$text = get_field('text') ?: 'When you challenge comfortable to move the world forward, the world recognizes the effort.';
$text_color = get_field('text_color');
$carousel_type = get_field('carousel_type'); 
$slideTimer = get_field('slide_timer');
$slide_timer_color = get_field('slide_timer_color');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); echo ' '. $carousel_type; ?> snap" >
    <div class="title-container">
        <h3 <?php if(!empty($text_color)): echo 'style="color:'.$text_color.'"'; endif; ?>><?php echo $headline; ?></h3>
        <p class="medium-text" <?php if(!empty($text_color)): echo 'style="color:'.$text_color.'"'; endif; ?>><?php echo $text; ?></p>
    </div>
    <div class="slider">
    <?php if(have_rows('slide')): $i = 0;
        while(have_rows('slide')): the_row();
    
        $background_color = get_sub_field('background_color');
        $texture = get_sub_field('textured_background'); ?>
                       

        <div class="slide <?php if($i === 0): echo 'active'; endif; ?>">
            <div class="container">
                <?php if(have_rows('images')): while(have_rows('images')): the_row();
                    $image = get_sub_field('image');
                    $width = get_sub_field('width');
                
                    if( $image ):

                        // Image variables.
                        $url = $image['url'];
                        $alt = $image['alt']; ?>
                    <div class="column" style="width:<?php echo $width.'%';?>">
                        <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" />
                    </div>
                    <?php endif; ?>
                <?php endwhile;
                endif; ?>
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
        <?php $i++;
    endwhile;  endif; ?>
    <?php if($carousel_type === 'timed'): ?>
        <div class="timer" data-timer="<?php echo $slideTimer; ?>" >
            <div <?php if(!empty($slide_timer_color)): echo 'style="background-color:'.$slide_timer_color.'"'; endif; ?> class="bar" style="transiton-duration:<?php echo $slideTimer.'s'; ?>"></div>
        </div>
    <?php endif; ?>
    </div>
</section>