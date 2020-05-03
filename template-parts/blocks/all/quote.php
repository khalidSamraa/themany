<?php

/**
 * Quote Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'quote-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'quote';
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
    <?php if(have_rows('quote_repeater')): 
        while(have_rows('quote_repeater')): the_row();
    
        $tag = get_sub_field('tag') ?: 'Your tag here...';
        $quote = get_sub_field('quote') ?: 'Your Quote Here...';
        $background_color = get_sub_field('background_color');
        $text_color = get_sub_field('text_color');
        $texture = get_sub_field('textured_background');
        $typeAdjust = get_sub_field('adjust_type');
        //$count = count(get_sub_field('quote_repeater'); ?>
                       

        <div class="slide">
            <blockquote class="testimonial-blockquote" style="color:<?php echo $text_color; ?>">
                <span class="testimonial-tag small-text">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
                         viewBox="0 0 390 350.9" style="fill:<?php echo $text_color; ?>; enable-background:new 0 0 390 350.9;" xml:space="preserve">
                    <path d="M153.2,63.3c-31,5.8-52.8,28.3-65.3,67.3c-6.3,19.3-9.4,38.4-9.4,57.2c0,2.3,0.1,4.2,0.3,5.7c0.2,1.6,0.6,5.1,1,10.4h73.4
                        v146.8H9.8V215.5C9.8,149.1,23,97.9,49.5,62C76,26,110.6,5.4,153.2,0V63.3z M380.2,63.3c-24.7,4-43.4,18-56.2,41.8
                        c-12.8,23.8-19.2,51.2-19.2,82.2c0,2.7,0.1,5.4,0.3,8.1c0.2,2.7,0.8,5.6,1.7,8.8h73.4v146.8H236.1V215.5
                        c0-53.4,11.2-101.1,33.7-143.1C292.2,30.4,329,6.3,380.2,0V63.3z"/>
                    </svg>
                    <?php echo $tag; ?>
                </span>
                <span class="testimonial-quote <?php if($typeAdjust !== 0): echo 'adjust-type-'.$typeAdjust; endif; ?>">
                    <?php echo $quote; ?>
                </span>
            </blockquote>
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