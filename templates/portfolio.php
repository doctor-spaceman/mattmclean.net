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
      <div>Design</div>
      <div>Marketing</div>
      <div>Retiforms</div>
      <div>Sketches</div>
    </div>
  </div>
  <div class="col-1-2">
    <div class="slider slider-vertical__right skew--right">
      <div>
        <svg id="cube" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
      </div>
      <div>img</div>
      <div>img</div>
      <div>img</div>
      <div>img</div>
    </div>  
  </div>
</div>


</section>

<?php get_footer(); ?>