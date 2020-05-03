<?php

/**
 * Team Post: Team Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-member-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team-member';
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
$name = get_field('name') ?: 'First Last';
$position = get_field('position');

$bio = get_field('biography') ?: 'Bio goes here.';

$background_color = get_field('background_color');
$secondary_color = get_field('secondary_color');
$text_color = get_field('text_color');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> slide snap" >

    <div class="container">
        <div class="column">
            <?php $photo = get_field('photo');
            if( $photo ):
                // Image variables.
                $url = $photo['url'];
                $alt = $photo['alt'];

                // Thumbnail size attributes.
                $size = 'team-portrait';
                $thumb = $photo['sizes'][ $size ];
                $width = $photo['sizes'][ $size . '-width' ];
                $height = $photo['sizes'][ $size . '-height' ]; ?>
            
                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
            <?php endif; ?>
        </div>
        <div class="column">
            <h2 style="color:<?php echo $text_color; ?>"><?php echo $name; ?></h2>
            <p style="color:<?php echo $text_color; ?>" class="position alt-1"><?php echo $position; ?></p>
            <p class="small-text" style="color:<?php echo $text_color; ?>"><?php echo $bio; ?></p>
        </div>
    </div>

    <div class="stylized-bkg">
        <div class="noise" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/bkg-noise.jpg);" ></div>
        <div class="paper" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/bkg-paper.jpg);"></div>
        <div class="color" style="background-color:<?php echo $background_color; ?>">
        </div>
    </div>
    <div style="background-color:<?php echo $secondary_color; ?>" class="side-color-bar"></div>
</div>