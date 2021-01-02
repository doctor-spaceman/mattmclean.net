<?php 
/* Template Name: Portfolio Item */ 

?>

<?php get_header(); ?>

<section class="wrapper wrapper--large">
  <?php if ( $post->post_parent ) : ?>
  <nav class="breadcrumb" aria-label="Breadcrumb">
    <ol class="supplemental">
      <li>
        <a href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo  get_the_title($post->post_parent); ?></a>  
      </li>
      <li>
        <?php echo '&nbsp;//&nbsp;'; ?><a href="<?php the_permalink(); ?>" aria-current="page"><?php the_title(); ?></a>
      </li>
    </ol>
  </nav>
  <?php endif; ?>
  <div class="section--l">
    <?php the_content(); ?>
  </div>

  <div class="slider-vertical grid">
    <div class="col-1-3">
      <div class="slider slider-vertical__left skew--left">
      <?php 
      if ( have_rows('content_group') ) : 
        while ( have_rows('content_group') ) : the_row();
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
    <div class="col-2-3">
      <div class="slider slider-vertical__right">
      <?php 
      if ( have_rows('content_group') ) : 
        while ( have_rows('content_group') ) : the_row();
          $content_group = get_row_layout();

          if ( $content_group && file_exists(locate_template('partials/content-group-'.$content_group.'.php')) ) :

          include(locate_template('partials/content-group-'.$content_group.'.php'));

          endif;
        endwhile;
      endif; 
      ?>
      </div>  
    </div>
  </div>
  
</section>

<?php get_footer(); ?>