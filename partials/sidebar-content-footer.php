<?php 
  $footerElements = get_field('footer_elements', 'option'); 
?>

<footer class="sidebar-footer sticky-footer">
  <div class="grid grid--center grid--column grid--space footer">
    <?php if ( $footerElements['footer_socials'] ) : ?>
      <!-- TODO: Option to show different socials than main site -->
    <div class="footer__social">
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
    <?php if ( $footerElements['footer_attribution'] ) : ?>
    <div class="footer__attribution">
      <?php echo apply_filters('the_content', $footerElements['footer_attribution']); ?>
    </div>
    <?php endif; ?>
  </div>
</footer>