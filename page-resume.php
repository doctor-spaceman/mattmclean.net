<?php
/**
 * The resume template file
 */

get_header(); ?>

		<div class="wrapper">
	<?php 
		if ( get_the_content() ) : 
			the_content();
		endif;
	?>			

		<?php
			$args = array( 
				'posts_per_page' => -1,
				'post_type' => 'resume-section'
			);
			$the_query = new WP_Query( $args );
		?>
		
		<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
			$secName = get_the_title();
			$secName = strtolower($secName);
			$secName = str_replace(' ', '', $secName); ?>
			<div class="content-panel">
				<h3 class="sec-header"><?php the_title(); ?></h3>
				<div id="<?php echo $secName; ?>">
					<?php the_content(); ?>
				</div>
			</div>
								
		<?php endwhile; else: ?>
	
				<p>Sorry, there are currently no resume sections. Check back soon!</p>
	
		<?php endif; ?>
			
<?php get_footer(); ?>
