<?php

/**
 * HP Culture Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'culture-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'culture-block';
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
$subHeadline = get_field('sub_headline') ?: 'Your sub-headline here...';
$text = get_field('text') ?: 'Your text here';
$buttonCTA = get_field('button_cta');
$buttonURL = get_field('button_url');
$label  = get_field('label') ?: 'Your Tag here...';
$background_color = get_field('background_color');
$text_color = get_field('text_color');
$accentColor = get_field('accent_color');
$texture = get_field('textured_background');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap">
    <div class="section-label">
        <p <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $label; ?></p>
        <hr <?php if(!empty($background_color)): ?>style="background-color:<?php echo $text_color; ?>"<?php endif; ?> /> 
    </div>
    <div class="container">
        <h2 <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $headline; ?></h2>
        <h3 <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $subHeadline; ?></h3>
        
        <p <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $text; ?></p>
        <a href="<?php echo esc_url($buttonURL['url']); ?>" class="button" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $buttonCTA; ?></a>
        <img class="earth" src="<?php echo get_template_directory_uri(); ?>/img/culture/culture-earth.png" width="609" height="609" />
        <img class="astronaut" src="<?php echo get_template_directory_uri(); ?>/img/culture/culture-astronaut.png" width="355" height="658" />
    </div>
    <?php if(!empty($accentColor)): ?>
        <div class="side-accent" style="background-color:<?php echo $accentColor; ?>">
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
            <div class="background-color" <?php if(!empty($background_color)): ?>style="background-color:<?php echo $background_color; ?>"<?php endif;?>>
        </div>
        <?php endif; ?>
</section>