<header>
  <div id="mainNavBar">
    <div class="navbar-container wrapper wrapper--xlarge">
      <div class="navbar-main-banner" 
      <?php 
      $page_color;
      $posts_page_id = get_option('page_for_posts');
      if ( is_home() || is_singular('post') ) : 
        $page_color = get_field('page_color', $posts_page_id);
      elseif ( !is_404() && !is_search() && $post->post_parent && get_field('page_color', $post->post_parent) ) : 
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
        <h1>
          <a href="<?php echo get_the_permalink($posts_page_id); ?>">
            <?php echo get_the_title($posts_page_id); ?>
          </a>
        </h1>
        <?php elseif ( is_singular('post') ) : ?>
        <div>
          <a href="<?php echo get_the_permalink($posts_page_id); ?>">
            <?php echo get_the_title($posts_page_id); ?>
          </a>
        </div>
        <?php elseif ( is_tag() || is_category() ) : ?>
        <div>Archive</div>
        <?php elseif ( is_404() ) : ?>
        <h1>404 Not Found</h1>
        <?php elseif ( is_search() ) : ?>
        <h1>Search</h1>
        <?php else : ?>
        <h1>
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h1>
        <?php endif; ?>
      </div>

      <div class="navbar-main-content grid grid--center grid--space wrapper wrapper--small">
        <a class="navbar-main-content__brand" href="<?php bloginfo('url'); ?>">
          Matt McLean
        </a>
        <div class="grid">
          <div class="grid navbar-main-content__mode">
            <button aria-label="Toggle dark mode">
              Mode
            </button>
            <svg aria-hidden="true" class="navbar-main-content__mode-icon--dark w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
            <svg aria-hidden="true" class="navbar-main-content__mode-icon--light w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
          </div>
          <button aria-label="Open main  menu" class="navbar-main-content__menu">
            Menu
          </button>
        </div>
      </div>
      
      <?php 
        wp_nav_menu(
        array(
          'container' => 'nav',
          'container_class' => 'main-menu',
          'menu_class' => 'menu grid grid--column',
          'theme_location' => 'main-menu',
          'walker' => new Menu_Stylized_Walker()
        )); 
        ?> 
    </div>


</header>