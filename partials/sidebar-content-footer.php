<?php 
  $footerElements = get_field('footer_elements', 'option'); 
  $sidebar_menu = $post->post_parent ? get_field('sidebar_menu_type', $post->post_parent) : get_field('sidebar_menu_type'); 
?>

<footer class="sidebar-footer sticky-footer">
  <div class="grid grid--center grid--column grid--space footer">
    <?php if ( $sidebar_menu && $sidebar_menu == 'photo' ) : ?>
      <?php if ( $footerElements['footer_socials_alt1'] ) : ?>
    <div class="footer__social">
      <ul class="grid grid--center grid--space">
      <?php foreach( $footerElements['footer_socials_alt1'] as $social ) : ?>
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
    <?php else : ?>
      <?php if ( $footerElements['footer_socials'] ) : ?>
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
    <?php endif; ?>
    <?php if ( $footerElements['footer_attribution'] ) : ?>
    <div class="footer__attribution">
      <?php echo apply_filters('the_content', $footerElements['footer_attribution']); ?>
    </div>
    <?php endif; ?>
  </div>
</footer>