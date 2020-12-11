<?php 
/* Template Name: Portfolio */ 

?>

<?php get_header(); ?>

<section class="wrapper">
  <div class="section">
  <?php 
  if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
      the_content();
    endwhile; 
  endif; 
  ?>
  </div>

  <div class="slider-vertical grid">
    <div class="col-1-2">
      <div class="slider slider-vertical__left skew--left">
      <?php 
      // Query the children of this page
      $args = array(
        'post_parent' => $post->ID,
        'post_type' => 'page',
        'order' => 'ASC',
        'orderby' => 'menu_order'
      );
      $child_pages = new WP_Query($args);

      if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post(); 
      ?>
        <div><?php the_title(); ?></div>
      <?php 
      endwhile;
      endif; 
      ?>
      </div>
    </div>
    <div class="col-1-2">
      <div id="walkway" class="slider slider-vertical__right">
      <?php 
      if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post(); 
      ?>
        <div class="content">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
          <p><?php echo get_the_excerpt(); ?></p>
          <a href="<?php the_permalink(); ?>">View <?php the_title(); ?></a>
        </div>
      <?php 
      endwhile;
      endif; 
      ?>
      </div>  
    </div>
  </div>
  
</section>

<?php get_footer(); ?>