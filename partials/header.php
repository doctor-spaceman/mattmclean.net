<header>
  <div id="mainNavBar">
    <div class="navbar-main-content wrapper--large grid grid--center grid--space">
    <a class="navbar-main-content__brand" href="<?php bloginfo('url'); ?>">
        Matt McLean
      </a>
      <button class="navbar-main-content__menu">
        Menu
      </button>
      <div class="navbar-main-banner" 
      <?php 
      if ( $post->post_parent && get_field('page_color', $post->post_parent) ) : 
        $pageColor = get_field('page_color', $post->post_parent);
      elseif ( get_field('page_color') ) : 
        $pageColor = get_field('page_color');
      endif; ?>
      <?php if ( $pageColor ) : ?>
        style="background-color:<?php echo esc_html($pageColor); ?>;"
      <?php else : ?>
        style="background-color: #484848;"
      <?php endif; ?>
      >
        <h1>
          <?php the_title(); ?>
        </h1>
      </div>
      <?php 
      wp_nav_menu(
      array(
        'menu' => 'Main Menu', 
        'menu_class' => 'menu grid grid--column',
        'container' => 'nav',
        'container_class' => 'main-menu'
      )); 
      ?> 
    </div>
    <div class="navbar-main-banner--mobile" 
    <?php if ( get_field('page_color') ) : ?>style="background-color:<?php echo esc_html(get_field('page_color')); ?>;"<?php endif; ?>>
      <h1 class="wrapper">
        <?php the_title(); ?>
      </h1>
    </div>
    <?php 
      wp_nav_menu(
      array(
        'menu' => 'Main Menu', 
        'menu_class' => 'menu grid grid--column',
        'container' => 'nav',
        'container_class' => 'main-menu--mobile'
      )); 
      ?> 
  </div>
  <div class="screen-overlay"></div>
</header>