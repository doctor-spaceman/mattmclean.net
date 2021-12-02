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
  <div class="flex">
    <div class="col-1-2 content flex--column">
      <h1><?php echo 'Matt McLean'; ?></h1>
      <p class="supplemental"><?php echo '(he/him)'; ?></p>
      <?php if ( $footerElements['footer_socials'] ) : ?>
      <div class="section social-icons">
        <ul class="flex--center flex--space">
        <?php foreach( $footerElements['footer_socials'] as $social ) : ?>
          <li>
            <?php if ( $social['social_link'] ) : ?>
            <a 
            href="<?php echo esc_url($social['social_link']) ?>"
            <?php if ( $social['channel_name'] ) : ?>
            aria-label="<?php echo esc_html($social['channel_name']); ?>" 
            title="<?php echo esc_html($social['channel_name']); ?>"
            <?php endif; ?>
            >
            <?php endif; ?>
              <?php if ( $social['social_icon']['url'] ) : 
              echo file_get_contents($social['social_icon']['url']);
              endif; ?>
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
