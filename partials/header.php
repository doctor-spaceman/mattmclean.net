<header>
  <div id="mainNavBar">
  
    <div class="navbar-container wrapper wrapper--xlarge">

      <div class="navbar-main-banner" 
      <?php 
      $page_color;
      $posts_page_id = get_option('page_for_posts');
      if ( is_home() || is_singular('post') ) : 
        $page_color = get_field('page_color', $posts_page_id);
      elseif ( $post->post_parent && get_field('page_color', $post->post_parent) ) : 
        $page_color = get_field('page_color', $post->post_parent);
      elseif ( get_field('page_color') ) : 
        $page_color = get_field('page_color');
      endif; ?>
      <?php if ( !empty($page_color) ) : ?>
        style="background-color:<?php echo esc_html($page_color); ?>;"
      <?php else : ?>
        style="background-color: #484848;"
      <?php endif; ?>
      >
        <?php if ( is_home() ) : ?>
        <h1><?php echo get_the_title($posts_page_id); ?></h1>
        <?php elseif ( is_singular('post') ) : ?>
        <div>
          <a href="<?php echo get_the_permalink($posts_page_id); ?>">
            <?php echo get_the_title($posts_page_id); ?>
          </a>
        </div>
        <?php elseif ( is_404() ) : ?>
        <h1>404 Not Found</h1>
        <?php else : ?>
        <h1><?php the_title(); ?></h1>
        <?php endif; ?>
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

    <div 
      class="navbar-main-banner--mobile" 
      <?php if ( get_field('page_color') ) : ?>style="background-color:<?php echo esc_html(get_field('page_color')); ?>;"<?php endif; ?>
    >
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