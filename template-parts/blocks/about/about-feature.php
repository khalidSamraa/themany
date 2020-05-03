<?php

/**
 * About Feature Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-feature-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'about-feature feature';
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
$headline = get_field('headline')  ?: 'Headline here';
$text = get_field('text')  ?: 'Description here...';

$label  = get_field('label') ?: 'Your label here.';

$background_color = get_field('background_color');
$text_color = get_field('text_color');
$texture = get_field('textured_background');
$accentColor = get_field('accent_color');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap" >

    <div class="section-label">
        <p class="alt-1" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $label; ?></p>
        <hr <?php if(!empty($text_color)): ?>style="background-color:<?php echo $text_color; ?>"<?php endif; ?> />
    </div>
    <div class="container">
        <h2 <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $headline; ?></h2>
        <p class="medium-text" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $text; ?></p>
    </div>
    <div class="parallax photos">
        <?php if( have_rows('images') ): ?>
            <?php $i = 1; while ( have_rows('images') ) : the_row(); 
                $image = get_sub_field('image');
                if( $image ):

                    // Image variables.
                    $url = $image['url'];
                    $title = $image['title'];
                    $alt = $image['alt'];
                    $caption = $image['caption'];

                    // Thumbnail size attributes.
                    $size = 'about-feature-portrait';
                    $thumb = $image['sizes'][ $size ];
                    $width = $image['sizes'][ $size . '-width' ];
                    $height = $image['sizes'][ $size . '-height' ]; ?>
                
                    <img id="portrait-<?php echo $i; ?>" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                <?php endif; ?>
            <?php $i++; endwhile; ?>
        <?php endif; ?>
    </div>
    
    <?php if(!empty($accentColor)): ?>
        <div class="side-accent" <?php if(!empty($accentColor)): ?>style="background-color:<?php echo $accentColor; ?>"<?php endif; ?>>
        </div>
    <?php endif; ?>
    
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