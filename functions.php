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

// post types
function create_post_type() {
  register_post_type( 'portfolio-item',
    array(
      'labels' => array(
      'name' => __( 'Portfolio Items' ),
      'singular_name' => __( 'Portfolio Item' ),
      'add_new_item' => __( 'Add New Portfolio Item' ),
      'edit_item' => __( 'Edit Portfolio Item' ),
      'new_item' => __( 'New Portfolio Item' ),
      'view_item' => __( 'View Portfolio Item' ),
      'search_items' => __( 'Search Portfolio Items' ),
      'not_found' => __( 'No portfolio items found' ),
      'not_found_in_trash' => __( 'No portfolio items found in Trash' ),
    ),
	'supports' => array (
	  'thumbnail',
	  'title',
	  'excerpt',
	  'editor'
	),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-portfolio',
    )
  );
  register_post_type( 'resume-section',
  array(
    'labels' => array(
      'name' => __( 'Résumé Sections' ),
      'singular_name' => __( 'Résumé Section' ),
      'add_new_item' => __( 'Add New Résumé Section' ),
      'edit_item' => __( 'Edit Résumé Section' ),
      'new_item' => __( 'New Résumé Section' ),
      'view_item' => __( 'View Résumé Section' ),
      'search_items' => __( 'Search Résumé Sections' ),
      'not_found' => __( 'No résumé sections found' ),
      'not_found_in_trash' => __( 'No résumé sections found in Trash' ),
    ),
	  'supports' => array (
      'thumbnail',
      'title',
      'editor'
	  ),
    'public' => true,
    'has_archive' => false,
    'publicly_queryable' => false,
  'menu_icon' => 'dashicons-media-text',
  )
);
}
add_action( 'init', 'create_post_type' );

// menus
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
	  'sidebar-menu' => __( 'Sidebar Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Enable featured images on posts and pages
add_theme_support( 'post-thumbnails' ); 

//Enable page excerpt
add_post_type_support( 'page', 'excerpt' );

function custom_excerpt_length( $length ) { 
  return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 ); 

// Remove commenting
//-- Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
//-- Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
//-- Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

// Change the URL to the ajax-loader image
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
	return  get_bloginfo('stylesheet_directory') . '/img/ajax-loader.gif';
}

// Don't link media files by default
function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

// Footer widget
function create_my_sidebars() {
    register_sidebar(array(
		'name' => 'Footer Social',
		'id' => 'footer-social',
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<p style="display: none">',
		'after_title' => '</p>'
	));
	register_sidebar(array(
		'name' => 'Footer Social - Photography',
		'id' => 'footer-social-photo',
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<p style="display: none">',
		'after_title' => '</p>'
	));
    register_sidebar(array(
		'name' => 'Footer Attribution',
		'id' => 'footer-attribution',
		'before_widget' => '<p>',
		'after_widget' => '</p>',
		'before_title' => '<p style="display: none">',
		'after_title' => '</p>'		
	));
}
add_action('widgets_init', 'create_my_sidebars');

// Year shortcode for footer widget
function getyear_func( $atts ){
	$getYear = '<span>' . date("Y") . '</span>';
	return $getYear;
}
add_shortcode( 'getyear', 'getyear_func' );

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Highlight the correct nav item when on CPT single page
function nav_parent_class($classes, $item) {
    $cpt_name = 'portfolio-item';
    $parent_slug = 'portfolio';

    if ($cpt_name == get_post_type() && !is_admin()) {
        global $wpdb;

        // get page info (we really just want the post_name so it can be compared to the post type slug)
        $page = get_page_by_title($item->title, OBJECT, 'page');

        // check if slug matches post_name
        if( $page->post_name == $parent_slug ) {
            $classes[] = 'current_page_parent';
        }

    }

    return $classes;
}
add_filter('nav_menu_css_class', 'nav_parent_class', 10, 2);

