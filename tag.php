<?php
/**
 * The tag template file
 */

get_header(); ?>

		<div class="wrapper">
			<div class="content-panel row">
			<?php if (have_posts()) : while (have_posts()) : the_post();
				if ( has_post_thumbnail() ) : 
					// use the featured image
					$background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' ); 
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
							$contentToTrim = get_the_content();
							$trimmedContent = wp_trim_words($contentToTrim, 15);
							echo $trimmedContent;
							?>
						</div>
					</a>
				</div>
			<?php endwhile; else : ?>
				<p>Sorry, there is no content associated with that tag.</p>
			<?php endif; ?>
			</div>
            <nav class="prev-next-posts">
              <div class="prev-posts-link alignleft">
                <p><?php echo get_next_posts_link( 'Older Entries' ); // display older posts link ?></p>
              </div>
              <div class="next-posts-link alignright">
                <p><?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?></p>
              </div>
            </nav>

<?php get_footer(); ?>
