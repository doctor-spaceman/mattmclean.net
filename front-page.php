<?php
/**
 * Front page
*/

get_header(); ?>

		<div class="wrapper">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				the_content();
			endwhile; endif; ?>

<?php get_footer(); ?>
