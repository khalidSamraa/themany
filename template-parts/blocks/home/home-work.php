<?php

/**
 * HP Work Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'work-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'work';
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
$headline = get_field('headline') ?: 'Your headline here...';
$text = get_field('text') ?: 'Your text Here...';
$tag = get_field('tag') ?: 'Tag';
$linkTo = get_field('link_to');
$label  = get_field('label') ?: 'Your Label here.';
$background_image = get_field('background_image');
$mobile_image = get_field('mobile_image');
$imageOverlay = get_field('image_overlay') ?: 0; //opacity of image overlay range

$text_color = get_field('text_color');
$alignment = get_field('alignment');
$buttonCTA = get_field('button_cta');
$buttonURL = get_field('button_url');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap" >
    <div class="section-label">
        <p <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $label; ?></p>
        <hr <?php if(!empty($text_color)): ?>style="background-color:<?php echo $text_color; ?>"<?php endif; ?> />
    </div>
    <div class="container align-<?php echo $alignment; ?>">
        <div class="text-container">
            <p <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> class="tag"><?php echo $tag; ?></p>
            <h1 <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $headline; ?></h1>
            <p <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $text; ?></p>
        </div>
    </div>
    
    <?php if(!empty($buttonCTA)): ?>
        <a class="button alt-1" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> href="<?php echo $buttonURL['url']; ?>"><?php echo $buttonCTA; ?></a>
    <?php endif; ?>
    
    <?php if($imageOverlay > 0): ?>
        <div class="image-overlay" style="opacity:<?php echo $imageOverlay; ?>"></div>
    <?php endif; ?>
    <div class="background-image" style="background-image:url(<?php if(!empty($background_image)): echo esc_url($background_image['url']); else: echo home_url(). '/wp-content/uploads/2020/03/many-work-hp-placeholder-image.jpg'; endif; ?>);">
    </div>
    <div class="background-image mobile" style="background-image:url(<?php echo esc_url($mobile_image['url']); ?>);">
    </div>
</section>