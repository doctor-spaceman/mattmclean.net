<?php
/**
 * The tag template file
 */
?>

<?php get_header(); ?>

<?php 
  $posts_page = get_post(get_option('page_for_posts'));
?>

<div class="wrapper wrapper--large">
  <div class="section--l">
    <h1><?php echo 'Posts tagged with: "'; single_tag_title(); echo '"' ?></h1>
  </div>

  <?php if (have_posts()) : ?>
  
  <section class="flex--space card-container">
    <?php while (have_posts()) : 
    the_post();
    
    get_template_part('partials/content-card','post'); 
    ?>
    <?php endwhile; ?>
  </section>
  <?php else : ?>

  <p class="section--l">Sorry, there is no content associated with that tag.</p>
  
  <?php endif; ?>

  <?php if ($wp_query->max_num_pages > 1) : ?>

  <nav class="pagination flex--space">
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

</div>

<?php get_footer(); ?>
