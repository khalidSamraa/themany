<?php get_header(); ?>

    <?php 
        if(have_posts()): while(have_posts()): the_post();
          global $post;
          $blocks = parse_blocks( $post->post_content );
          foreach( $blocks as $block ) {
              echo render_block( $block );
          }
        endwhile; endif;
    ?>

<?php get_footer(); ?>
