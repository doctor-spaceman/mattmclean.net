<?php

// fonts
function wpt_theme_fonts() {
	wp_register_style('font-primary', 'https://fonts.googleapis.com/css?family=Poppins:400,500,700');
	wp_register_style('font-heading', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700');
	//wp_register_style('font-awesome', 'https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css');
	wp_enqueue_style('font-primary');
	wp_enqueue_style('font-heading');
	//wp_enqueue_style('font-awesome');
}
add_action('wp_enqueue_scripts', 'wpt_theme_fonts');

// Enqueue Font Awesome CSS
function hook_fa() {
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">		
<?php
}
add_action('wp_head', 'hook_fa');

// css
function wpt_theme_styles() {
	wp_register_style('css-main',  get_template_directory_uri() . '/style.css');
	wp_enqueue_style('css-main');
}
add_action('wp_enqueue_scripts', 'wpt_theme_styles');

// js
function wpt_theme_js() {
	wp_register_script('viewport-plugin',  get_template_directory_uri() . '/js/isInViewport-3.0.0/lib/isInViewport.js', array('jquery'), '', true);
    //wp_enqueue_script('viewport-plugin');
	wp_register_script('js-main',  get_template_directory_uri() . '/js/app.js', array('jquery','viewport-plugin'), '', true);
	wp_enqueue_script('js-main');
}
add_action('wp_enqueue_scripts', 'wpt_theme_js');