<?php

//Add support for  navigation menu
function register_nw_menu() {
    register_nav_menus( array(
        'main-menu'     =>  'Main Menu'
    ) );
}

//Add support for  custom menus
// https://codex.wordpress.org/Plugin_API/Action_Reference/init
// Fires after WordPress has finished loading but before any headers are sent.
add_action( 'init', 'register_nw_menu' );
