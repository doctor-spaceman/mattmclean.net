<?php
    // Year shortcode for footer widget
    function getyear_func( $atts ){
        $getYear = '<span>' . date("Y") . '</span>';
        return $getYear;
    }
    add_shortcode( 'getyear', 'getyear_func' );

    // Enable shortcodes in widgets
    add_filter('widget_text', 'do_shortcode');