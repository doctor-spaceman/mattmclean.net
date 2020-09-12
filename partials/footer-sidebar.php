<div <?php 
  if ( is_page_template('page-photography.php') && ($post->post_parent) ) : //is a child page
  echo 'class="sidebar-footer--under-content"'; 
  elseif ( is_page_template('page-photography.php') ) : 
  echo 'class="sidebar-footer"'; 
  endif; ?>>
  <div class ="attribution wrapper">
      <div>
          <ul id="footerSocial" class="social">
          <?php 
              if ( is_page_template('page-photography.php') ) : dynamic_sidebar('footer-social-photo');
              else : dynamic_sidebar('footer-social');
              endif;
          ?>
          </ul>
      </div>
      <div id="footerAttribution">
          <?php dynamic_sidebar('footer-attribution'); ?>
      </div>
  </div>
</div>