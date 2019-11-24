<?php
/**
 * The blog template file
 */

get_header(); ?>

		<div class="wrapper">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
		endwhile; endif; ?>
		<?php wp_reset_query(); ?>			
			<div class="content-panel row">
		<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array( 
				'posts_per_page' => 7,
				'paged' => $paged
			);
			$the_query = new WP_Query( $args );
			//Make WordPress apply pagination to our custom query
			$temp_query = $wp_query;
			$wp_query = NULL;
			$wp_query = $the_query;
		?>
		<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
			if ( has_post_thumbnail() ) : 
				// use the featured image
				$background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
			else : 
				// use the fallback image
				$background[0] = '/mmclean/wp-content/themes/mmclean/img/fallback.jpg';									
			endif; ?>
				<div class="content-item post-block" style="background: url('<?php echo $background[0]; ?>') no-repeat center center/cover;">
					<a href="<?php the_permalink(); ?>">
						<h3 class="content-item-title"><?php the_title(); ?></h3>
						<div class="post-date"><em><?php echo get_the_date('F j, Y'); ?></em></div>
						<div class="post-preview">
							<?php
							// instead of excerpt which is used for post subtitle, 
							// trim and display content
							$contentToTrim = get_the_content();
							$trimmedContent = wp_trim_words($contentToTrim, 15);
							echo $trimmedContent;
							?>
						</div>
					</a>
				</div>
				
		<?php endwhile; else: ?>
	
			<p>Sorry, there are currently no posts. Check back soon!</p>
	
		<?php endif; ?>
			
			</div>
			
		<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
            <nav class="prev-next-posts">
              <div class="prev-posts-link alignleft">
                <p><?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?></p>
              </div>
              <div class="next-posts-link alignright">
                <p><?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?></p>
              </div>
            </nav>
          <?php } ?>

<?php get_footer(); ?>
