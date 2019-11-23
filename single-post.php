<?php
/**
 * Single posts
 */

get_header(); ?>

		<div class="wrapper">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="content-panel">
					<div class="post-date-single">
					<?php echo get_the_date('F j, Y'); ?>
					</div>
					<?php the_content(); ?>
				</div>
				
			<?php if ( has_tag() ) : ?>
			
			<div class="post-tags"><?php the_tags('&nbsp;&nbsp;',', ',''); ?></div>
				
			<?php endif; endwhile; else: ?>
			
			<p>Sorry, there's nothing here. Check back soon!</p>
	
			<?php endif; 
			
			?>
	        <div class="clearfix"></div>

	        <nav class="prev-next-posts">
	          <div class="prev-posts-link alignleft">
	            <p><?php previous_post_link( '%link','Previous Post' ); ?></p>
	          </div>
	          <div class="next-posts-link alignright">
	            <p><?php next_post_link( '%link','Next Post' ); ?></p>
	          </div>
	        </nav>

<?php get_footer(); ?>
