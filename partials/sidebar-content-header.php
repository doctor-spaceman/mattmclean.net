<header>
  <?php 
  $sidebar_logo = get_field('sidebar_logo');
  $sidebar_logo_parent = get_field('sidebar_logo', $post->post_parent);
  if ( $sidebar_logo ) : ?>
  <a href="<?php echo get_the_permalink(); ?>" title="Home">
    <img 
      class="brand" 
      src="<?php echo $sidebar_logo['url']; ?>" alt="<?php echo $sidebar_log['alt']; ?>"
    />
  </a>
  <?php elseif ( $sidebar_logo_parent ) : ?>
  <a href="<?php echo get_the_permalink($post->post_parent); ?>" title="Home">
    <img 
      class="brand" 
      src="<?php echo $sidebar_logo_parent['url']; ?>" alt="<?php echo $sidebar_logo_parent['alt']; ?>" 
    />
  </a>
  <?php endif; ?>
  <button class="navbar-main-content__menu">
    Menu
  </button>
</header>
<nav id="mainNav" class="sidebar-nav sidebar-wrapper">
  <?php
  wp_nav_menu(
  array(
      'theme_location' => 'sidebar-menu-photography',
      'container_class' => 'sidebar-menu'
  )); 
  ?>
</nav>