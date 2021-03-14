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
      <div class="cta">
        <div class="grid grid--center site-mode-toggle">
          <button aria-label="Toggle dark mode">
            Mode:
          </button>
          <svg aria-hidden="true" class="site-mode-toggle__icon--dark w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
          <svg aria-hidden="true" class="site-mode-toggle__icon--light w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        </div>
      </div>
      <h1><?php echo 'Matt McLean'; ?></h1>
      <p class="supplemental"><?php echo '(he/him)'; ?></p>
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

  <div class="content">
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
