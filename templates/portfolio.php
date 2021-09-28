<?php 
/* Template Name: Portfolio */ 

?>

<?php get_header(); ?>

<section class="wrapper wrapper--large">
  <div class="section--l">
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
      <div class="swiper slider-vertical__left skew--left">
        <button type="button" class="swiper-button-prev" aria-label="Previous Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg></button>
        <div class="swiper-wrapper">
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
          <div class="swiper-slide"><?php the_title(); ?></div>
        <?php 
        endwhile;
        endif; 
        ?>
        </div>
        <button type="button" class="swiper-button-next" aria-label="Next Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
      </div>
    </div>
    <div class="col-1-2">
      <div id="walkway" class="swiper swiper-no-swiping slider-vertical__right">
        <div class="swiper-wrapper">
        <?php 
        if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post(); 
          $section_icon = get_field('section_icon'); ?>
          
          <div class="swiper-slide">

          <?php 
          if ( $section_icon ) : 
            $section_icon_url = $section_icon['url'];
            echo file_get_contents($section_icon_url); 
          endif; ?>
          
            <div class="section">
              <p><?php echo get_the_excerpt(); ?></p>
              <a class="cta" href="<?php the_permalink(); ?>">View <?php the_title(); ?></a>
            </div>
          </div>
        <?php 
        endwhile;
        endif; 
        ?>
        </div>
      </div>  
    </div>
  </div>
  
</section>

<?php get_footer(); ?>