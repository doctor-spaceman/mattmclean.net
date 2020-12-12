<header>
  <div id="mainNavBar">
    <div class="navbar-container wrapper wrapper--xlarge">
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
      <div class="navbar-main-content grid grid--center grid--space wrapper wrapper--small">
        <a class="navbar-main-content__brand" href="<?php bloginfo('url'); ?>">
          Matt McLean
        </a>
        <button class="navbar-main-content__menu">
          Menu
        </button>
        <?php 
        wp_nav_menu(
        array(
          'menu' => 'Main Menu', 
          'menu_class' => 'menu grid grid--column',
          'container' => 'nav',
          'container_class' => 'main-menu',
          'walker' => new Menu_Stylized_Walker()
        )); 
        ?> 
      </div>
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
        'container_class' => 'main-menu--mobile',
        'walker' => new Menu_Stylized_Walker()
      )); 
      ?> 
  </div>
  <div class="screen-overlay"></div>
</header>