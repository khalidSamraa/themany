<?php

/**
 * Contact Info Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-info-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact-info';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

$text_color = get_field('text_color');
$background_color = get_field('background_color');
$texture = get_field('textured_background');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap" >

    <div class="container">
    <?php $image = get_field('featured_image');
        if( $image ):

            // Image variables.
            $url = $image['url'];
            $alt = $image['alt'];

            // Thumbnail size attributes.
            $size = 'wide';
            $thumb = $image['sizes'][ $size ];
            $width = $image['sizes'][ $size . '-width' ];
            $height = $image['sizes'][ $size . '-height' ]; ?>

            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
        <?php endif; ?>
    
        <div class="text-container">
            <div class="row">
                <?php if(have_rows('locations')): while(have_rows('locations')): the_row(); ?>
                    <div class="column" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>>
                        <h2><?php the_sub_field('headline'); ?></h2>
                        <address>
                            <a class="small-text" target="_blank" href="<?php the_sub_field('address_url'); ?>"><?php the_sub_field('address'); ?></a>
                        </address>
                        <a class="phone medium-text" href="<?php echo preg_replace('/[^0-9]/', '', the_sub_field('phone_number')); ?>"><?php the_sub_field('phone_number'); ?></a>
                    </div>
                <?php endwhile; endif; ?>
            </div>
            
            <div class="row">
                <?php if(have_rows('contact_items')): while(have_rows('contact_items')): the_row(); ?>
                    <div class="column" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>>
                        <p class="small-text"><?php the_sub_field('title'); ?></p>
                        <a class="small-text" href="<?php the_sub_field('email_address'); ?>"><?php the_sub_field('email_address'); ?></a>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
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
    
</section>