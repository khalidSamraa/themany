<?php

/**
 * About Timeline Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-timeline-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'about-timeline';
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
$background_color = get_field('background_color');
$texture    = get_field('textured_background');
$text_color = get_field('text_color');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap" >

    <div class="container">
        <h2 <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?>><?php echo $headline; ?></h2>
    </div>
    <div class="timeline">
        <div class="scroller">
            <div class="bar"></div>
            <div  class="time-block year-2009">
                <div <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> class="text-block">
                    <h3>2009</h3>
                    <p>Founded as Mistress</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/timeline/2009-mistress-logo.png" alt="mistress agency logo" width="281" height="500" />
            </div>
            <div class="time-block year-2010">
                <div <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> class="text-block">
                    <h3>2010</h3>
                    <p>Venice Beach Office</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/timeline/2010-venice-office.jpg" alt="ad agency vencie office" width="667" height="500" />
            </div>    
            <div class="time-block year-2013">
                <div <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> class="text-block">
                    <h3>2013</h3>
                    <p>Cofounded Neato<br />
                    Collegiate Marketing</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/timeline/2013-neat-collegiate-marketing.png" alt="Neato College Marketing Firm" width="500" height="152" />
            </div>  
            <div class="time-block year-2014">
                <div <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> class="text-block">
                    <h3>2014</h3>
                    <p>Bergamot Station Office</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/timeline/2014-bergamot-station-ad-agency-office.png" alt="Neato College Marketing Firm" width="260" height="183" />
            </div>  
            <div class="time-block year-2015">
                <div <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> class="text-block">
                    <h3>2015</h3>
                    <p>Created Mixwell</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/timeline/2015-mixwell-premium-beverage.png" alt="Mixwell Premium Mixer" width="388" height="362" />
            </div>      
            <div class="time-block year-2017">
                <div <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> class="text-block">
                    <h3>2017</h3>
                    <p>Merged with<br />Supermoon</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/timeline/2017-mistress-supermoon-ad-agency-merger.png" alt="Mistress and Supermoon merge" width="256" height="336" />
            </div> 
            <div class="time-block year-2019">
                <div <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> class="text-block">
                    <h3>2019</h3>
                    <p>- Rebrand to The Many<br />
                    - The Many, Boston</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/timeline/2019-mistress-rebrands-as-the-many-ad-agency.png" alt="Mistress rebrands to the many" width="500" height="460" />
                <img src="<?php echo get_template_directory_uri(); ?>/img/timeline/2019-the-many-boston-office.jpg" alt="The many opens Boston east coast office" width="500" height="319" />
            </div>     
            <div class="time-block year-2020">
                <div <?php if(!empty($text_color)): ?>style="color:<?php echo $text_color; ?>"<?php endif; ?> class="text-block">
                    <h3>2020</h3>
                    <p>Pacific Palisades Office</p>
                </div>

                <img src="<?php echo get_template_directory_uri(); ?>/img/timeline/2020-the-many-office-pacific-palisades.png" alt="The Many moves into new office on California Pacific Coast Highway" width="545" height="344" />
            </div> 
        </div>
    </div>

        <?php if($texture): ?>
            <div class="stylized-bkg">
                <div class="noise" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/bkg-noise.jpg);" ></div>
                <div class="paper" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/bkg-paper.jpg);"></div>
                <div class="color" <?php if($background_color): ?>style="background-color:<?php echo $background_color; ?>"<?php endif; ?>>
                </div>
            </div>
        <?php else: ?>
            <div class="background-color" <?php if(!empty($background_color)): ?>style="background-color:<?php echo $background_color; ?>"<?php endif; ?>>
        </div>
        <?php endif; ?>
</section>