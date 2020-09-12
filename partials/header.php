<header>
  <div id="mainNavBar">
    <div class="navbar-main-content wrapper--large grid grid--center grid--space">
      <div class="navbar-main-banner" 
      <?php if ( get_field('page_color') ) : ?>style="background-color:<?php echo esc_html(get_field('page_color')); ?>;"<?php endif; ?>>
        <h1>
          <?php the_title(); ?>
        </h1>
      </div>
      <a class="navbar-main-content__brand" href="<?php bloginfo('url'); ?>">
        Matt McLean
      </a>
      <div class="navbar-main-content__menu">
        Menu  
      </div>
      <?php 
      wp_nav_menu(
      array(
        'menu' => 'Main Menu', 
        'container' => 'nav',
        'container_class' => 'main-menu'
      )); ?> 
    </div>
  </div>
  <div class="screen-overlay"></div>
</header>