<section id="sidebarNav" class="grid grid--column grid--space">
  <header>
    <div class="navbar-container wrapper">
      <div id="brand" class="monogram"><a href="<?php bloginfo('url'); ?>/photography/">MM</a>
        <div class="monogram-sub"><a href="<?php bloginfo('url'); ?>/photography/">Photography</a></div>
      </div>
      <?php if ( $post->post_parent ) : //is a child page ?>
      <nav id="mainNav" class="sidebar-nav sidebar-wrapper">
      <?php else : ?>
      <nav id="mainNav" class="sidebar-nav sidebar-wrapper top-level">
      <?php endif; ?>
        <div id="navIcon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        
        <?php
        wp_nav_menu(
        array(
            'menu' => 'Photo Menu', 
            'container_class' => 'sidebar-menu'
        )); ?>
      </nav>
    </div>
  </header>

  <?php get_footer(); ?>
  
</section>