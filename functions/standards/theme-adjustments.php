<?php
// Theme Support
    function std_theme_setup() {
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'menus' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'widgets' );
        add_post_type_support( 'page', 'excerpt' );
    }
    add_action( 'after_setup_theme', 'std_theme_setup' );
// END / Theme Support
