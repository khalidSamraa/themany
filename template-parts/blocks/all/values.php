<?php

/**
 * Values Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'values-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'values';
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
$subHeadline = get_field('sub_headline')  ?: 'Sub-headline here...';

$label  = get_field('label') ?: 'Your label here.';

$background_color = get_field('background_color');
$text_color = get_field('text_color');
$accentColor = get_field('accent_color');
$texture = get_field('textured_background');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap" >

    <div class="section-label">
        <p class="alt-1"  <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $label; ?></p>
        <hr  <?php if(!empty($text_color)): ?>style="background-color:<?php echo $text_color; ?>"<?php endif; ?> />
    </div>
    <div class="container">
        <h2  <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $headline; ?></h2>
        <div class="row">
            <div class="column">
                <p class="alt-1"  <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $subHeadline; ?></p>
                <ul>
                <?php 
                $firstVideoUrl;
                $firstVideoPoster;
                $firstVideoCaption;
                if( have_rows('values') ):
                    $i = 1; while ( have_rows('values') ) : the_row();
                        $valueName = get_sub_field('value_name');
                        $video = get_sub_field('video');
                        $videoPoster = get_sub_field('video_poster_image');
                        $caption = get_sub_field('caption'); ?>
                        <li><a <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> href="#" data-video="<?php echo esc_url($video['url']); ?>" data-image="<?php echo esc_url($videoPoster['url']); ?>" data-caption="<?php echo $caption; ?>" <?php if($i === 1): echo 'class="active"'; endif; ?>><?php echo $valueName; ?></a></li>
                    <?php if($i === 1): 
                        $firstVideoUrl = $video['url'];
                        $firstVideoPoster = $videoPoster['url'];
                        $firstVideoCaption = $caption;
                    endif; ?>
                
                    <?php $i++; endwhile;
                endif; ?>
                </ul>
                        
            </div>
            <div class="column media">
                <video poster="<?php echo esc_url($firstVideoPoster); ?>" preload="auto" muted playsinline loop>
                    <source src="<?php echo esc_url($firstVideoUrl); ?>" type="video/mp4" />
                    <img src="<?php echo esc_url($firstVideoPoster); ?>" />
                </video>
                <p class="small-text"  <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $firstVideoCaption; ?></p>
            </div>
        </div>        
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
            <div class="background-color" <?php if(!empty($background_color)): ?>style="background-color:<?php echo $background_color; ?>"<?php endif; ?>>
        </div>
        <?php endif; ?>
</section>