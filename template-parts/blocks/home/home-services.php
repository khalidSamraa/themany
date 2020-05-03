<?php

/**
 * HP Services Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'services-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'services';
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
$buttonCTA = get_field('button_text') ?: 'Your CTA';
$buttonURL = get_field('button_url');
$label  = get_field('label') ?: 'Your Tag here...';
$background_color = get_field('background_color');
$text_color = get_field('text_color');
$accentColor = get_field('accent_color');
$texture = get_field('textured_background');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap">
    <div class="confetti-style-1">
        <img class="confetti-1" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-01.svg" />
        <img class="confetti-2" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-02.svg" />
        <img class="confetti-3" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-03.svg" />
        <img class="confetti-4" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-04.svg" />
        <img class="confetti-5" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-05.svg" />
        <img class="confetti-6" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-06.svg" />
    </div>
    
    <div class="section-label">
        <p class="alt-1" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $label; ?></p>
        <hr <?php if(!empty($text_color)): ?>style="background-color:<?php echo $text_color; ?>"<?php endif; ?> />
    </div>
    <div class="container">
        <h1 <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $headline; ?></h1>
        <p class="large-text" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $text; ?></p>
        <a href="<?php echo esc_url($buttonURL); ?>" class="button alt-1" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $buttonCTA; ?></a>
    </div>
    
    <?php if(!empty($accentColor)): ?>
        <div class="side-accent" <?php if(!empty($accentColor)): ?>style="background-color:<?php echo $accentColor; ?>"<?php endif; ?>>
        </div>
    <?php endif; ?>
    <div class="bkg-color-block">
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
    </div>
</section>