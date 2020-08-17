<?php

function site_scripts() {
  // fonts
  wp_register_style('font-google', 'https://fonts.googleapis.com/css2?family=Archivo:wght@400;600&family=Khand:wght@300;500&display=swap');
  wp_enqueue_style('font-google');

  // css
  if ( preg_match('/(staging-mm)/', get_site_url()) ) :
    wp_register_style('css-main', get_template_directory_uri() . '/css/style.css');
  else :
    wp_register_style('css-main', get_template_directory_uri() . '/css/style.min.css');
  endif;
  wp_enqueue_style('css-main');

  // js
  if ( file_exists(get_template_directory() . '/js/vendor.js') ) :
    if ( preg_match('/(staging-mm)/', get_site_url()) ) :
      wp_register_script('js-vendor', get_template_directory_uri() . '/js/vendor.js', array('jquery'), '', true);
      wp_register_script('js-custom', get_template_directory_uri() . '/js/custom.js', array('js-vendor'), '', true);
    else :
      wp_register_script('js-vendor', get_template_directory_uri() . '/js/vendor.min.js', array('jquery'), '', true);
      wp_register_script('js-custom', get_template_directory_uri() . '/js/custom.min.js', array('js-vendor'), '', true);
    endif;
    wp_enqueue_script('js-vendor');
    wp_enqueue_script('js-custom');
  else :
    if ( preg_match('/(staging-mm)/', get_site_url()) ) :
      wp_register_script('js-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);
    else : 
      wp_register_script('js-custom', get_template_directory_uri() . '/js/custom.min.js', array('jquery'), '', true);
    endif;
    wp_enqueue_script('js-custom');
  endif;
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );
