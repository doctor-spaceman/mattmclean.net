<?php
/**
 * The template for displaying search results
 */
?>

<?php get_header(); ?>

<section class="wrapper wrapper--large">

<?php if ( have_posts() ) : ?>

	<div>
		<h2>
			<?php
			printf(
				/* translators: %s: search term. */
				esc_html__( 'Results for "%s"', 'mmclean' ),
				'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
			);
			?>
		</h2>
	</div>

	<p>
		<?php
		printf(
			esc_html(
				/* translators: %d: the number of search results. */
				_n(
					'There is %d result for your search.',
					'There are %d results for your search.',
					(int) $wp_query->found_posts,
					'mmclean'
				)
			),
			(int) $wp_query->found_posts
		);
		?>
	</p>
	<?php
	while ( have_posts() ) :
    the_post();
  ?>
  <div>
    <h3>
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h3>
    <p class="supplemental"><?php echo get_the_excerpt(); ?></p>
  </div>
  <?php 
  endwhile;
else : 
?>

	<div id="walkway" class="section grid grid--column grid--center">
    <svg width="200" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width=".25" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"></path></svg>
    <p style="text-align: center;">There are no results for your search.</p>
    <a class="cta" href="/">Return to home</a>
  </div>

<?php endif; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>

  <nav class="pagination grid grid--space">
    <div class="prev-posts-link">
    <?php 
    // display previous page link
    if ( get_previous_posts_link() ) : ?>  
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
      <p><?php echo get_previous_posts_link( 'Previous Page' ); ?></p>
    <?php endif; ?>
    </div>
    <div class="next-posts-link">
    <?php
    // display next page link
    if ( get_next_posts_link() ) : ?>
      <p><?php echo get_next_posts_link( 'Next Page', $wp_query->max_num_pages ); ?></p>
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <?php endif; ?>   
    </div>
  </nav>

<?php endif; ?>

</section>

<?php get_footer(); ?>
