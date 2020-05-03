<?php

/**
 * About Page: Team Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-team-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'about-team';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> snap" >
    <div class="categories">
        <div class="container">
            <?php 
            $args = array(
                'orderby'       => 'title',
                'order'         => 'ASC',
                'taxonomy'      => 'departments',
                );
            $departments = get_terms($args);
            ?>
            <?php
            if ( ! empty( $departments ) ): $i = 0;
                foreach ( $departments as $department ): ?>
                   <a class="alt-1 <?php if($i == 0): echo active; endif; ?>" href="<?php echo esc_url( get_term_link( $department ) ); ?>"><?php echo $department->name; ?></a>
            <?php $i++; endforeach;
            endif; ?>
        </div>
    </div>
    <div class="slider">
        <?php
            // Get all slides from the admin
            $team_loop = new WP_Query( 

                array( 

                    'post_type'         => 'team',
                    'post_status'       => 'publish',
                    'no_found_rows'     => true,
                    'posts_per_page'    => '-1',


                ) 

            );
			

            if ( $team_loop->have_posts() ) : 
                while ( $team_loop->have_posts() ) : $team_loop->the_post(); 
                  global $post;
                  $blocks = parse_blocks( $post->post_content );
                  foreach( $blocks as $block ) {
                      echo render_block( $block );
                  }
                endwhile; 
            endif; 
        ?>
    </div>
</section>