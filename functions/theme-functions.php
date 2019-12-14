<?php
    // Register menus
    function register_my_menus() {
    register_nav_menus(
        array(
        'main-menu' => __( 'Main Menu' ),
        'sidebar-menu' => __( 'Sidebar Menu' )
        )
    );
    }
    add_action( 'init', 'register_my_menus' );
    // END / Register menus

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
    // END / Footer widget

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
    // END / Highlight parent menu item

    // Tracking Notice
    $tracking_notice_enable = true;
    // If the user opted in or out, don't show the cookie notice banner.
    // When the user made their selection, the cookie should have been set via js.
    if ( isset( $_COOKIE['mmtrackingoptout'] ) || isset( $_COOKIE['mmtrackingoptin'] ) ) {
        $tracking_notice_enable = false;
    }
    // If there's no cookie message set in the admin, don't show the cookie notice banner at all.
    if ( !get_field('tracking_notice_msg','option') ) {
        $tracking_notice_enable = false;
    }
    // END / Tracking Notice