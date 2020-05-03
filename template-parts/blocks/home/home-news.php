<?php

/**
 * Services Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'news-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'news';
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
$headline = get_field('headline') ?: 'News';
$label  = get_field('label') ?: 'Your Tag here...'
$background_color = get_field('background_color');
$text_color = get_field('text_color');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap">
    <div class="section-label">
        <p class="alt-1" style="color:<?php echo $text_color; ?>"><?php echo $label; ?></p>
        <hr style="background-color:<?php echo $text_color; ?>" />
    </div>
    <div class="slider">
        <div class="slide">
            <a href="#">
                <div class="container">
                    <img src="" alt="" width="" height="" />
                    <h1 style="color:<?php echo $text_color; ?>">Headline</h1>
                    <p style="color:<?php echo $text_color; ?>">By: </p>
                    <div class="news-label">
                        <p style="color:<?php echo $text_color; ?>">Jan 21</p>
                        <hr style="background-color:<?php echo $text_color; ?>" />
                    </div>
                </div>
            </a>
        </div>
    </div>

</section>