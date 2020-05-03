<?php if (have_posts()): while (have_posts()) : the_post(); ?>


<?php endwhile; ?>

<?php else: ?>

		<h2><?php _e( 'Sorry, nothing to display.' ); ?></h2>

<?php endif; ?>
