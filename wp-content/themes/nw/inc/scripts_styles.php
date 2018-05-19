<?php

//Remove jQuery from public side

function change_default_jquery( &$scripts){

    if(!is_admin()){
        $scripts->remove('jquery');
        // $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}

add_filter( 'wp_default_scripts', 'change_default_jquery' );

/**
 * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
 * This will enqueue stylesheets and scripts to be used on various templates for the NuWorks Theme.
 */
function add_nw_stylesheet_scripts() {
    // Respects SSL, Style.css is relative to the current file
    if(!is_admin()) {
        wp_register_style( 'vendor-css' , THEME_DIR . '/assets/dist/css/vendor.css' , '' , '2.5.0', $media = 'all' );
        wp_register_style( 'main-css' , THEME_DIR . '/assets/dist/css/main.css' , '' , '2.5.0', $media = 'all' );
        wp_enqueue_style( 'vendor-css' );
        wp_enqueue_style( 'main-css' );


        wp_register_script( 'modernizr-js' , THEME_DIR . '/assets/dist/js/vendor/modernizr.js', '' , '2.5.0', false );
        wp_register_script( 'vendor-js' , THEME_DIR . '/assets/dist/js/vendor.js', ''  , '2.5.0', true );
        wp_register_script( 'main-js' , THEME_DIR . '/assets/dist/js/main.js', ''  , '2.5.0', true );
        wp_enqueue_script( 'modernizr-js' );
        wp_enqueue_script( 'vendor-js' );
        wp_enqueue_script( 'main-js' );

    }

    if(is_admin()) {
        wp_dequeue_style( 'normalize-css' );
        wp_dequeue_style( 'font-license-css' );
        wp_dequeue_style( 'vendor-css' );
        wp_dequeue_style( 'main-css' );
        wp_dequeue_script( 'main-js' );
        wp_dequeue_script( 'vendor-js' );
        wp_dequeue_script( 'main-js' );
    }


    if(is_login_page()) {
        wp_dequeue_style( 'normalize-css' );
        wp_dequeue_style( 'font-license-css' );
        wp_dequeue_style( 'vendor-css' );
        wp_dequeue_style( 'main-css' );
        wp_dequeue_script( 'main-js' );
        wp_dequeue_script( 'vendor-js' );
        wp_dequeue_script( 'main-js' );
    }
}



add_action( 'wp_enqueue_scripts', 'add_nw_stylesheet_scripts' );
