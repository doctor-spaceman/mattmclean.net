<footer class="sticky-footer">
  <div class="wrapper wrapper--large grid grid--center grid--space footer">
    <?php if ( $footerElements['footer_socials'] ) : ?>
    <div class="footer__social">
      <ul class="grid grid--center grid--space">
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
    <?php if ( $footerElements['footer_attribution'] ) : ?>
    <div class="footer__attribution">
      <?php echo $footerElements['footer_attribution']; ?>
    </div>
    <?php endif; ?>
  </div>
</footer>