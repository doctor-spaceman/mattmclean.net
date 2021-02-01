<?php
/**
 * Front page
*/
?>

<?php 
$footerElements = get_field('footer_elements', 'option');
?>

<?php get_header(); ?>

<section id="homepageIntro" class="wrapper wrapper--large" aria-label="Homepage Intro">
  <div class="grid">
    <div class="col-1-2 content grid grid--column">
      <h1><?php echo get_bloginfo('name'); ?></h1>
      <?php if ( $footerElements['footer_socials'] ) : ?>
      <div class="section social-icons">
        <ul class="grid grid--center grid--space">
        <?php foreach( $footerElements['footer_socials'] as $social ) : ?>
          <li>
            <?php if ( $social['social_link'] ) : ?>
            <a href="<?php echo esc_url($social['social_link']) ?>">
            <?php endif; ?>
              <?php if ( $social['social_icon']['url'] ) : ?>
              <img 
              src="<?php echo esc_url($social['social_icon']['url']); ?>"
              <?php if ( $social['social_icon']['alt'] ) : ?> 
              alt="<?php echo esc_html($social['social_icon']['alt']); ?>"<?php endif; ?> />
              <?php endif; ?>
            <?php if ( $social['social_link'] ) : ?>
            </a>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="corner--block content">
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
