<?php
// Register menus
function register_my_menus() {
register_nav_menus(
    array(
    'main-menu' => __( 'Header' ),
    'sidebar-menu' => __( 'Sidebar' ),
    'sidebar-menu-photography' => __( 'Photography Sidebar' )
    )
);
}
add_action( 'init', 'register_my_menus' );
// END / Register menus

// Home menu walker
class Home_Stylized_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    $object = $item->object;
    $type = $item->type;
    $id = $item->ID;
    $title = $item->title;
    $permalink = $item->url;
    $pageObj = get_page_by_title($title);
    if ( get_field('page_color', $pageObj->ID) ) :
      $color = get_field('page_color', $pageObj->ID);
    else : 
      $color = '#484848';
    endif;

    $output .= '
      <li 
        id="menu-item-'.$id.'" 
        class="hero-menu-bar '.implode(" ", $item->classes).'" 
        style="background-color: '.$color.';"
      >
        <a class="hero-menu-bar__link" href="'.$permalink.'">
          <span class="hero-menu-bar__text">'.$title.'</span>
        </a>
      </li>
    ';
  }
}
// END / Home menu walker

// Main menu walker
class Menu_Stylized_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    $object = $item->object;
    $type = $item->type;
    $id = $item->ID;
    $title = $item->title;
    $permalink = $item->url;
    $pageObj = get_page_by_title($title);
    if ( get_field('page_color', $pageObj->ID) ) :
      $color = get_field('page_color', $pageObj->ID);
    else : 
      $color = '#484848';
    endif;

    $output .= '
      <li 
        id="menu-item-'.$id.'" 
        class="'.implode(" ", $item->classes).'" 
        style="background-color: '.$color.';"
      >
        <a href="'.$permalink.'">'.$title.'</a>
      </li>
    ';
  }
}
// END / Main menu walker

// Customize excerpt length
function custom_excerpt_length( $length ) { 
  return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 ); 
// END / Customize excerpt length

// Update ajax-loader image
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
    return  get_bloginfo('stylesheet_directory') . '/img/ajax-loader.gif';
}
// END / Update ajax-loader image