<?php 
$sidebar_logo = $post->post_parent ? get_field('sidebar_logo', $post->post_parent) : get_field('sidebar_logo'); 
$sidebar_logo_link = $post->post_parent ? get_the_permalink($post->post_parent) : get_the_permalink(); 
$sidebar_menu = $post->post_parent ? get_field('sidebar_menu_type', $post->post_parent) : get_field('sidebar_menu_type'); 
?>

<header>  
  <?php if ( $sidebar_logo ) : ?>
  <a 
  aria-label="Home" 
  class="brand" 
  href="<?php echo esc_url($sidebar_logo_link); ?>" 
  title="Home"
  >
    <?php if ( $sidebar_logo['url'] ) : 
    echo file_get_contents($sidebar_logo['url']);
    endif; ?>
  </a>
  <?php endif; ?>
  <button class="main-menu-toggle">
    Menu
  </button>
</header>
<nav id="mainNav" class="sidebar-nav sidebar-wrapper">
  <?php
  if ( $sidebar_menu ) : 
    if ( $sidebar_menu == 'photo' ) : 
  wp_nav_menu(
    array(
        'theme_location' => 'sidebar-menu-photography',
        'container_class' => 'sidebar-menu'
    )); 
    else : 
  wp_nav_menu(
    array(
      'theme_location' => 'sidebar-menu',
      'container_class' => 'sidebar-menu'
    )); 
    endif; 
  endif;
  ?>
  <div class="grid grid--center site-mode-toggle">
    <button aria-label="Toggle dark mode">
      Mode:
    </button>
    <svg role="img" class="site-mode-toggle__icon--dark w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Dark Mode Active</title><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
    <svg role="img" class="site-mode-toggle__icon--light w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Light Mode Active</title><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
  </div>
</nav>