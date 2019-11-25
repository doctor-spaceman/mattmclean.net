<?php
// Login Page Logo
    function std_admin_login_style() {
        wp_enqueue_style( 'core', get_stylesheet_directory_uri() . '/css/admin.css', false );
    }
    add_action( 'login_enqueue_scripts', 'std_admin_login_style', 10 );

    function std_custom_loginlogo_url() {
         return get_site_url();
    }
    add_filter( 'login_headerurl', 'std_custom_loginlogo_url' );
// END / Login Page Logo

// Update admin menus
    function std_remove_menu_elements() {
       remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
    }
    add_action('admin_init', 'std_remove_menu_elements');

    function std_remove_menu_items() {
        remove_menu_page( 'edit-comments.php' ); // Remove commenting from admin menu
        remove_action('admin_menu', '_add_themes_utility_last', 101); // Remove editor link from appearance menu
    }
    add_action('admin_menu', 'std_remove_menu_items', 1);

    // Remove commenting from post and pages
    function std_remove_comment_support() {
        remove_post_type_support( 'post', 'comments' );
        remove_post_type_support( 'page', 'comments' );
    }
    add_action('init', 'std_remove_comment_support', 100);
    // Remove commenting from admin bar
    function std_admin_bar_render() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }
    add_action( 'wp_before_admin_bar_render', 'std_admin_bar_render' );
// END / Update admin menus    

// Show Page Templates in Admin columns
    add_filter( 'manage_pages_columns', 'std_page_column_views' );
    add_action( 'manage_pages_custom_column', 'std_page_custom_column_views', 5, 2 );
    function std_page_column_views( $defaults ){
        $defaults['page-layout'] = __('Template');
        return $defaults;
    }
    function std_page_custom_column_views( $column_name, $id ) {
        if ( $column_name === 'page-layout' ) {
            $set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
            if ( $set_template == 'default' ) {
                echo 'Default';
            }
            $templates = get_page_templates();
            ksort( $templates );
            foreach ( array_keys( $templates ) as $template ) :
                if ( $set_template == $templates[$template] ) echo $template;
            endforeach;
        }
    }
// END / Show Page Templates in Admin columns

// Allow SVG Uploads in the Media Library
    function std_svg_upload_helper( $data, $file, $filename, $mimes ) {
        $wp_filetype = wp_check_filetype( $filename, $mimes );

        $ext = $wp_filetype['ext'];
        $type = $wp_filetype['type'];
        $proper_filename = $data['proper_filename'];

        return compact( 'ext', 'type', 'proper_filename' );
    }
    add_filter( 'wp_check_filetype_and_ext', 'std_svg_upload_helper', 10, 4 );
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');
// END / Allow SVG Uploads in the Media Library

// Don't link media files by default
function std_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );
    
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'std_imagelink_setup', 10);
// END / Don't link media files by default

// Security Updates
    // Login Page: Remove Hints
    function std_update_wordpress_login_errors(){
        return 'Invalid username or password.';
    }
    add_filter( 'login_errors', 'std_update_wordpress_login_errors' );
    // END / Login Page: Remove Hints

    // Remove version generator
        remove_action('wp_head','wp_generator');
    // END / Remove version generator
// END / Security Updates