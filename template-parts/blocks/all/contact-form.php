<?php

/**
 * Contact Form Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-form-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact-form';
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
$text_color = get_field('text_color');
$texture = get_field('textured_background');
$background_color = get_field('background_color')

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap" >

    <div class="container">
        <h3 <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $headline; ?></h3>
        <div class="form">
            <form>
                <div class="column">
                    <textarea required placeholder="This is where you'd type out your message."></textarea>
                    <p class="small-text error"></p>
                </div>
                <div class="column">
                    <div class="field">
                        <select id="regarding" required>
                            <option value="" disabled selected>Regarding...</option>
                            <option value="new-business">New Business</option>
                            <option value="careers">Careers</option>
                            <option value="press">Press</option>
                        </select>
                        <p class="small-text error"></p>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Name" required />
                        <p class="small-text error"></p>
                    </div>
                    <div class="field">
                        <input type="email" placeholder="Email" required />
                        <p class="small-text error"></p>
                    </div>
                </div>
                <input type="submit" class="button--solid" value="send" <?php if(!empty($text_color)): ?>style="background-color:<?php echo $text_color; ?>"<?php endif; ?> />
            </form>
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
        <div class="background-color" <?php if(!empty($background_color)): ?>style="background-color:<?php echo $background_color; ?>" <?php endif; ?>>
    </div>
    <?php endif; ?>
    
    <div class="confetti-style-2">
        <img class="confetti-1" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-alt-01.svg" />
        <img class="confetti-2" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-alt-02.svg" />
        <img class="confetti-3" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-alt-03.svg" />
        <img class="confetti-4" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-alt-04.svg" />
        <img class="confetti-5" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-alt-05.svg" />
        <img class="confetti-6" src="<?php echo get_template_directory_uri() ?>/img/confetti/confetti-alt-06.svg" />
    </div>
    
</section>