<?php 
$sidebar_logo = $post->post_parent ? get_field('sidebar_logo', $post->post_parent) : get_field('sidebar_logo'); 
$sidebar_logo_link = $post->post_parent ? get_the_permalink($post->post_parent) : get_the_permalink(); 
$sidebar_menu = $post->post_parent ? get_field('sidebar_menu_type', $post->post_parent) : get_field('sidebar_menu_type'); 
?>

<header>  
  <?php if ( $sidebar_logo ) : ?>
  <a 
  href="<?php echo esc_url($sidebar_logo_link); ?>" 
  title="Home">
    <img 
    class="brand" 
    src="<?php echo esc_url($sidebar_logo['url']); ?>" 
    alt="<?php echo esc_attr($sidebar_logo['alt']); ?>" />
  </a>
  <?php endif; ?>
  <button class="navbar-main-content__menu">
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
</nav>