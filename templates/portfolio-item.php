<?php 
/* Template Name: Portfolio Item */ 
?>

<?php 
$adaptiveHeight = get_field('adaptive_height');
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

  <div class="slider-vertical flex">
    <div class="col-1-3">
      <div class="slider-vertical__left skew--left">
        <div class="swiper">
          <div class="swiper-wrapper">
          <?php 
          if ( have_rows('content_group') ) : 
            while ( have_rows('content_group') ) : the_row();
              $group_name = get_sub_field('group_name');
          ?>
            <?php if ( $group_name ) : ?>
            <div class="swiper-slide">
              <p><?php echo esc_html($group_name); ?></p>
            </div>
            <?php endif; ?>
          <?php 
            endwhile;
          endif; 
          ?>
          </div>
        </div>
        <button type="button" class="swiper-button-prev" aria-label="Previous Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg></button>
        <button type="button" class="swiper-button-next" aria-label="Next Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
      </div>
    </div>
    <div class="col-2-3">
      <div 
      class="
        swiper 
        swiper-no-swiping 
        slider-vertical__right
        <?php if ( $adaptiveHeight ) : ?>adaptive-height<?php endif; ?>
      ">
        <div class="swiper-wrapper">
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
  </div>
  
</section>

<?php get_footer(); ?>