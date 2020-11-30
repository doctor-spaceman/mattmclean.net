<?php 
/* Template Name: Portfolio Item */ 

?>

<?php get_header(); ?>

<section class="wrapper">

  <div class="slider-vertical grid">
    <div class="col-1-2">
      <div class="slider slider-vertical__left skew--left">
      <?php 
      if ( have_rows('content_group') ) : 
        while ( have_rows('content_group') ) :
          the_row();
          $group_name = get_sub_field('group_name');
      ?>
        <?php if ( $group_name ) : ?>
        <div><?php echo esc_html($group_name); ?></div>
        <?php endif; ?>
      <?php 
        endwhile;
      endif; 
      ?>
      </div>
    </div>
    <div class="col-1-2">
      <div class="slider slider-vertical__right">
      <?php 
      if ( have_rows('content_group') ) : 
        while ( have_rows('content_group') ) :
          the_row();
          $content_group = get_row_layout();

          // When you have the panel row name and there's a corresponding panel file
          if ( $content_group && file_exists(get_template_part('partials/content-group', $content_group)) ) :

          include(locate_template('partials/content-group-'.$content_group, false, false));

          endif;
        endwhile;
      endif; 
      ?>
      </div>  
    </div>
  </div>
  
</section>

<?php get_footer(); ?>