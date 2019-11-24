<?php
/*
Template Name: Archive - Portfolio
*/

get_header(); ?>

		<div class="wrapper">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
		endwhile; endif; ?>
		<?php wp_reset_query(); ?>			
			
			<div class="content-panel row">
		<?php
			$args = array( 
				'post_type' => 'portfolio-item',
				'posts_per_page' => -1
			);
			$the_query = new WP_Query( $args );
		?>
		<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
			$background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
			
				<div class="content-item" style="background: url('<?php echo $background[0]; ?>') no-repeat center center/cover;">
					<a href="<?php the_permalink(); ?>">
						<h3 class="content-item-title"><?php the_title(); ?></h3>
					</a>
				</div>

		<?php endwhile; else: ?>
	
			<p>Sorry, there are currently no portfolio items. Check back soon!</p>
	
		<?php endif; ?>
			</div>

<?php get_footer(); ?>
