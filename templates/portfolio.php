<?php 
/* Template Name: Portfolio */ 

?>

<?php get_header(); ?>

<section class="wrapper wrapper--large">
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
        $section_icon = get_field('section_icon'); ?>

        <div class="content">
        
        <?php 
        if ( $section_icon ) : 
          $section_icon_url = $section_icon['url'];
          echo file_get_contents($section_icon_url); 
        endif; ?>

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