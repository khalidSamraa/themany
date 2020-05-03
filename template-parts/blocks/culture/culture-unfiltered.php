<?php

/**
 * Culture Unfiltered Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'culture-unfiltered-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'culture-unfiltered';
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

$label  = get_field('label');

$background_color = get_field('background_color');
$text_color = get_field('text_color');
$texture = get_field('textured_background');
$accentColor = get_field('accent_color');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap" >
    <?php if(!empty($label)): ?>
        <div class="section-label">
            <p class="alt-1" <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $label; ?></p>
            <hr  <?php if(!empty($text_color)): ?>style="background-color:<?php echo $text_color; ?>"<?php endif; ?> />
        </div>
    <?php endif; ?>
    <div class="container">
        <h2  <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $headline; ?></h2>
        <p class="small-text"  <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $text; ?></p>
        
        <div class="gif-gallery">
            <?php $gifs = get_field('gif_gallery'); 
                if($gifs): $i = 1;
                    $size = 'gif-gallery-1';
                    foreach($gifs as $gif): 
                        //define image sizes
                        switch($i) {
                            case 1: 
                                $size = 'gif-gallery-1';
                                break;
                            case 2:
                                $size = 'gif-gallery-2';
                                break;
                            case 3:
                                $size = 'gif-gallery-3';
                                break;   
                            case 4:
                                $size = 'gif-gallery-4';
                                break; 
                            case 5:
                                $size = 'gif-gallery-4';
                                break;   
                            case 6:
                                $size = 'gif-gallery-5';
                                break;
                            case 7:
                                $size = 'gif-gallery-6';
                                break;   
                            case 8:
                                $size = 'gif-gallery-6';
                                break;   
                            case 9:
                                $size = 'gif-gallery-7';
                                break;
                            case 10:
                                $size = 'gif-gallery-2';
                                break;   
                            case 11:
                                $size = 'gif-gallery-1';
                                break;    
                             case 12:
                                $size = 'gif-gallery-8';
                                break;   
                             case 13:
                                $size = 'gif-gallery-9';
                                break;  
                            default:
                                $size = 'gif-gallery-1';
                                break;
                        }


                        // Image variables.
                        $url = $gif['url'];
                        $alt = $gif['alt'];

                        // Thumbnail size attributes.
                        $thumb = $gif['sizes'][ $size ];
                        $width = $gif['sizes'][ $size . '-width' ];
                        $height = $gif['sizes'][ $size . '-height' ]; 
                        
            
                    //create container divs
                     switch($i) {
                            case 1: 
                                echo '<div class="column">';
                                break;
                            case 2:
                                break;
                            case 3:
                                echo '<div class="column">';
                                break;   
                            case 4:
                                echo '<div class="row">';
                                break;   
                            case 6:
                                echo '<div class="column">';
                                break;                                     
                            case 7:
                                echo '<div class="row"><div class="column">';
                                break;   
                            case 9:
                                echo '<div class="column">';
                                break;                                 
                            case 10:
                                echo '<div class="column">';
                                break;   
                            case 11:
                                break;    
                             case 12:
                                echo '<div class="column">';
                                break;   
                             case 13:
                                break;  
                            default:
                                break;
                        }  
                        //echo  '<p style="display:none"; >imageSize is '.$size.'</p>'; 
                        ?>        
                        <div class="gallery-item">
                            <img class="gif gif-<?php echo $i; ?>" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                        </div>
            
                    
                    <?php 
                        //create closing container divs
                        switch($i) {
                            case 1: 
                                break;
                            case 2:
                                echo '</div>';
                                break;
                            case 3:
                                break;   
                            case 5:
                                echo '</div></div>';
                                break;   
                            case 6:
                                break;                                     
                            case 8:
                                echo '</div>';
                                break;   
                            case 9:
                                echo '</div></div></div>';
                                break;                                 
                            case 10:
                                break;   
                            case 11:
                                echo '</div>';
                                break;    
                             case 12:
                                break;   
                             case 13:
                                echo '</div>';
                                break;  
                            default:
                                break;
                        }   ?>                
            
            
                    <?php $i++; endforeach; ?>
                <?php endif; ?>
            </div>
    </div>
    <?php if(!empty($accentColor)): ?>
        <div class="side-accent" style="background-color:<?php echo $accentColor; ?>">
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
            <div class="background-color" <?php if(!empty($background_color)): ?>style="background-color:<?php echo $background_color; ?>"<?php endif; ?>>
        </div>
        <?php endif; ?>
    </div>
</section>
