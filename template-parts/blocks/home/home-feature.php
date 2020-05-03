<?php

/**
 * HP Feature Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'home-feature-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'home-feature';
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
$featureType = get_field('feature_type');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap">
    <?php if($featureType === 'carousel'): ?>
        <div class="slider">
        <?php if(have_rows('carousel_slide')): while(have_rows('carousel_slide')): the_row();
        $slideType = get_sub_field('slide_type');
    ?>
    
            <div class="slide slide-<?php echo $slideType;?>">
                <div class="container">
                    <?php 
                    $headline = get_sub_field('headline');
                    $buttonCTA = get_sub_field('button_cta'); 
                    $text_color = get_sub_field('text_color');
                    if(!empty($headline)): ?>
                        <h1 <?php if(!empty($text_color)): ?> style="color:<?php echo $text_color; ?>"<?php endif;  ?>><?php the_sub_field('headline'); ?></h1>
                    <?php endif;
                    
                    if(!empty($buttonCTA)): ?>
                        <a <?php if(!empty($text_color)): ?> style="background-color:<?php echo $text_color; ?>"<?php endif;  ?> href="<?php the_sub_field('button_url'); ?>" class="button--solid"><?php the_sub_field('button_cta'); ?></a>
                    <?php endif;?>    
                    
                    <?php if($slideType === 'image'): //IMAGE SLIDE
                        $featuredImage = get_sub_field('featured_image');
                        $mobileImage = get_sub_field('mobile_image'); ?>
                            
                        <div class="slide-img" style="background-image:url(<?php echo esc_url($featuredImage['url']); ?>);"></div>
                        <div class="slide-img mobile" style="background-image:url(<?php echo esc_url($mobileImage['url']); ?>);"></div>
                    
                    <?php else: // VIDEO SLIDE   
                        $video = get_sub_field('video');
                        $posterImage = get_sub_field('poster_image');
                        $mobileOption = get_sub_field('mobile_option');
                        $mobileVideo = get_sub_field('mobile_video');
                        $mobilePosterImage = get_sub_field('mobile_poster_image');
                        $mobileImage = get_sub_field('mobile_image');
                        ?>
                    
                        <video poster="<?php echo esc_url($posterImage['url']); ?>" muted autoplay playsinline loop >
                            <source src="<?php echo esc_url($video['url']); ?>" type="video/mp4" />
                            <img src="<?php echo esc_url($posterImage['url']); ?>" alt="<?php echo esc_attr($posterImage['alt']); ?>"  />
                        </video>

                        <?php if($mobileOption === 'image'): ?>
                            <img class="mobile" src="<?php echo esc_url($mobileImage['url']); ?>" alt="<?php echo esc_attr($mobileImage['alt']); ?>" />
                        <?php else: ?>

                            <video class="mobile" poster="<?php echo esc_url($mobilePosterImage['url']); ?>" muted autoplay playsinline loop >
                                <source src="<?php echo esc_url($mobileVideo['url']); ?>" type="video/mp4" />
                                <img src="<?php echo esc_url($mobilePosterImage['url']); ?>" alt="<?php echo esc_attr($mobilePosterImage['alt']); ?>"  />
                            </video>  

                        <?php endif; ?>
                    <?php endif; // END SLIDE TYPE ?>
                
                </div>
            </div>
        
    <?php endwhile; endif; ?>
    </div>
    
    <?php else: //REEL 
        $reelVideo = get_field('reel');
        $reelPoster = get_field('reel_poster'); 
    ?>       
    
        <video class="reel" poster="<?php echo esc_url($reelPoster['url']); ?>" loop autoplay muted playsinline preload="auto" >
            <source src="<?php echo esc_url($reelVideo['url']); ?>" type="mp4/video" />
            <img src="<?php echo esc_url($reelPoster['url']); ?>" alt="<?php echo esc_attr($reelPoster['alt']); ?>" />
        </video>
    <?php endif; ?>

</section>