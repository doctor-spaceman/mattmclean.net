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

<div class="rolodex">
  <div>Sketches</div>
  <div>3D Modeling</div>
  <div>Graphic Design</div>
  <div>Retiforms</div>
  <div>Marketing</div>
</div>

</section>

<?php get_footer(); ?>