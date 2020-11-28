<?php 
/* Template Name: Portfolio */ 

?>

<?php get_header(); ?>

<section class="wrapper">
  <?php 
  if ( have_posts() ) : 
    while ( have_posts() ) : 
      the_post();
      the_content();
    endwhile; 
  endif; 
  ?>

  <div class="slider-vertical grid">
    <div class="col-1-2">
      <div class="slider slider-vertical__left skew--left">
        <div>3D Modeling</div>
        <div>Collaborations</div>
        <div>Design</div>
        <div>Retiforms</div>
        <div>Sketches</div>
      </div>
    </div>
    <div class="col-1-2">
      <div id="walkway" class="slider slider-vertical__right skew--right">
        <div>
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
        <div>
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
          <p>Orci eu lobortis elementum nibh tellus molestie nunc non.</p>
        </div>
        <div>img</div>
        <div>img</div>
        <div>img</div>
      </div>  
    </div>
  </div>
  
</section>

<?php get_footer(); ?>