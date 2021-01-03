<?php
/**
 * The blog template file
 */
?>

<?php get_header(); ?>

<?php 
  $posts_page = get_post(get_option('page_for_posts'));
?>

<div class="wrapper wrapper--large">

  <div class="section--l">
    <?php echo apply_filters( 'the_content', $posts_page->post_content ); ?>
  </div>

  <?php
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $posts_query_args = array( 
    'posts_per_page' => 9,
    'paged' => $paged
  );
  $posts_query = new WP_Query( $posts_query_args );
  //Make WordPress apply pagination to our custom query
  // $temp_query = $wp_query;
  // $wp_query = NULL;
  // $wp_query = $posts_query;
  ?>
  <?php if ( $posts_query->have_posts() ) : ?>
  <section class="grid grid--space card-container">
    <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
      <?php get_template_part('partials/content-card','post'); ?>
    <?php endwhile; ?>
  </section>
  <?php else : ?>
  <p class="section">Sorry, there are currently no posts. Check back soon!</p>
  <?php endif; ?>
  
  <?php 
  // check if the max number of pages is greater than 1  
  if ($posts_query->max_num_pages > 1) : ?>
  <nav class="pagination grid grid--space">
    <?php 
    // display older posts link
    if ( get_next_posts_link() ) : ?>
    <div class="prev-posts-link">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
      <p><?php echo get_next_posts_link( 'Past', $posts_query->max_num_pages ); ?></p>
    </div>
    <?php endif; ?>
    <?php
    // display newer posts link
    if ( get_previous_posts_link() ) : ?>
    <div class="next-posts-link">
      <p><?php echo get_previous_posts_link( 'Future' ); ?></p>
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </div>
    <?php endif; ?>
  </nav>
  <?php endif; ?>

<?php get_footer(); ?>
