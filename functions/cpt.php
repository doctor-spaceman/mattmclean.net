<?php
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
        'show_in_rest' => true
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