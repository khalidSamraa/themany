<?php

/**
 * Services Service Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'services-service-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'services-service';
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
$headlineColor = get_field('headline_color');
$text_color = get_field('text_color');
$texture = get_field('textured_background');
$background_color = get_field('background_color');
$label = get_field('label');
$accentColor = get_field('accent_color');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap" >

    
    <div class="section-label">
        <p class="alt-1" <?php if(!empty($headlineColor)): ?>style="color:<?php echo $headlineColor; ?>"<?php endif; ?>><?php echo $label; ?></p>
        <hr <?php if(!empty($headlineColor)): ?>style="background-color:<?php echo $headlineColor; ?>"<?php endif; ?> />
    </div>
    <div class="container">
        <h1 <?php if(!empty($headlineColor)): ?>style="color:<?php echo $headlineColor; ?>"<?php endif; ?>><?php echo $headline; ?></h1>
        <p class="medium-text" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $text; ?></p>
    </div>
    <?php if(have_rows('video_background')):
            while(have_rows('video_background')): the_row();
                 $video = get_sub_field('video');       
                 $videoPoster = get_sub_field('video_poster_image');       
                 $mobileVideo = get_sub_field('mobile_video');       
                 $mobilePoster = get_sub_field('mobile_poster_image');   ?>
    
                <div class="background-container">
                    <video poster="<?php echo esc_url($videoPoster['url']); ?>" muted autoplay playsinline loop >
                        <source src="<?php echo esc_url($video['url']); ?>" type="video/mp4" />
                        <img src="<?php echo esc_url($videoPoster['url']); ?>" alt="<?php echo esc_attr($videoPoster['alt']); ?>"  />
                    </video>

                    <?php if(!empty($mobileVideo)): ?>

                        <video class="mobile" poster="<?php echo esc_url($mobilePoster['url']); ?>" muted autoplay playsinline loop >
                            <source src="<?php echo esc_url($mobileVideo['url']); ?>" type="video/mp4" />
                            <img src="<?php echo esc_url($mobilePoster['url']); ?>" alt="<?php echo esc_attr($mobilePoster['alt']); ?>"  />
                        </video>  

                    <?php endif; ?>
                </div>
    
           <?php endwhile;
        elseif(have_rows('image_background')):
            while(have_rows('image_background')): the_row();
                $image = get_sub_field('image');       
                $mobileImage = get_sub_field('mobile_image'); 
    
                // Image variables.
                $alt = $image['alt'];

                // Thumbnail size attributes.
                $size = 'wide';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ]; 
                
                //MOBILE IMAGE
                $mobileAlt = $mobileImage['alt'];
    
                $mobileSize = 'tall';
                $mobileThumb = $mobileImage['sizes'][ $mobileSize ];
                $mobileWidth = $mobileImage['sizes'][ $mobileSize . '-width' ];
                $mobileHeight = $mobileImage['sizes'][ $mobileSize . '-height' ];  ?>    
    
                <div class="background-container">
                    <img class="desktop" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                    <img class="mobile" src="<?php echo esc_url($mobileThumb); ?>" alt="<?php echo esc_attr($mobileAlt); ?>" width="<?php echo $mobileWidth; ?>" height="<?php echo $mobileHeight; ?>" />
                </div>
    
            <?php endwhile;
        else: ?>

            <div class="bkg-color-block">
                <?php if($texture): ?>
                    <div class="stylized-bkg">
                        <div class="noise" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/bkg-noise.jpg);" ></div>
                        <div class="paper" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/bkg-paper.jpg);"></div>
                        <div class="color" <?php if($background_color): ?>style="background-color:<?php echo $background_color; ?>"<?php endif; ?>>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="background-color" <?php if($background_color): ?>style="background-color:<?php echo $background_color; ?>"<?php endif; ?>>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    
    <?php if(!empty($accentColor)): ?>
        <div class="side-accent" <?php if(!empty($accentColor)): ?>style="background-color:<?php echo $accentColor; ?>"<?php endif; ?>>
        </div>
    <?php endif; ?>    
    
</section>