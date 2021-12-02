<?php
// Theme Support
  function std_theme_setup() {
    add_theme_support( 'custom-logo' );
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'widgets' );
    add_post_type_support( 'page', 'excerpt' );

    remove_theme_support( 'widgets-block-editor' );
  }
  add_action( 'after_setup_theme', 'std_theme_setup' );
// END / Theme Support

// Application Passwords
  add_filter( 'wp_is_application_passwords_available', '__return_false' );
// END / Application Passwords

// Disable Gutenberg default styles
// function wps_deregister_styles() {
//   wp_dequeue_style( 'wp-block-library' );
// }
// add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
// END / Disable Gutenberg default styles