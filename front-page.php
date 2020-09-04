<?php
/**
 * Front page
*/

get_header(); ?>

<section id="homepageIntro">
  <div class="wrapper wrapper--large">
    <?php 
    if ( have_posts() ) : 
      while ( have_posts() ) : 
        the_post();
				the_content();
      endwhile; 
    endif; 
    ?>
  </div>
</section>

<?php get_footer(); ?>
