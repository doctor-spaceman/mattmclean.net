<?php
/*-----Enqueue Scripts-----*/
function is_admin_area() {
  if ( is_admin() )  {
      return true;
  }
  if ( strpos( $_SERVER['REQUEST_URI'], 'wp-login') != false ) {
      return true;
  }
}

if ( !is_admin_area() ) {
  // Remove excess Wordpress scripts and styles
  function wp_disable_emojis() {
      remove_action('wp_head', 'print_emoji_detection_script', 7);
      remove_action('admin_print_scripts', 'print_emoji_detection_script');
      remove_action('wp_print_styles', 'print_emoji_styles');
      remove_action('admin_print_styles', 'print_emoji_styles');
      remove_filter('the_content_feed', 'wp_staticize_emoji');
      remove_filter('comment_text_rss', 'wp_staticize_emoji');
      remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
      add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
  }
  add_action('init', 'wp_disable_emojis');

  // Use modern jQuery
  function switch_to_hosted_jquery() {
      wp_deregister_script('jquery');
      wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',null, null, false, null);
      wp_enqueue_script('jquery');
  }
  add_action('init', 'switch_to_hosted_jquery');
}

// Avoid loading Contact Form 7 scripts
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );


function site_scripts() {
  // fonts
  wp_register_style('font-main', 'https://fonts.googleapis.com/css2?family=Archivo:wght@400;600&display=swap');
  wp_register_style('font-heading', 'https://fonts.googleapis.com/css2?family=Khand:wght@300;500&display=swap');
  wp_enqueue_style('font-main');
  wp_enqueue_style('font-heading');

  // css
  if ( preg_match('/(staging-)/', get_site_url()) ) :
    wp_register_style('css-main', get_template_directory_uri() . '/css/style.css');
  else :
    wp_register_style('css-main', get_template_directory_uri() . '/css/style.min.css');
  endif;
  wp_enqueue_style('css-main');

  // js
  if ( preg_match('/(staging-)/', get_site_url()) ) :
    wp_register_script('js-vendor', get_template_directory_uri() . '/js/vendor.min.js', array('jquery'), '', true);
    wp_register_script('js-slider', get_template_directory_uri() . '/js/slider.js', array('js-vendor'), '', true);
    wp_register_script('js-masonry', get_template_directory_uri() . '/js/masonry.js', array('js-vendor'), '', true);
    wp_register_script('js-custom', get_template_directory_uri() . '/js/custom.js', array('js-vendor'), '', true);
  else :
    wp_register_script('js-vendor', get_template_directory_uri() . '/js/vendor.min.js', array('jquery'), '', true);
    wp_register_script('js-slider', get_template_directory_uri() . '/js/slider.min.js', array('js-vendor'), '', true);
    wp_register_script('js-masonry', get_template_directory_uri() . '/js/masonry.min.js', array('js-vendor'), '', true);
    wp_register_script('js-custom', get_template_directory_uri() . '/js/custom.min.js', array('js-vendor'), '', true);
  endif;

  wp_enqueue_script('js-vendor');
  // portfolio scripts
  if ( is_page_template('templates/portfolio.php') || is_page_template('templates/portfolio-item.php') ) : 
    wp_enqueue_script('js-slider');
  endif;
  if ( is_page_template('templates/portfolio-sidebar.php') ) : 
    wp_enqueue_script('js-masonry');
  endif;
  wp_enqueue_script('js-custom');
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );
