<?php

//Add page slug on body class
add_filter( 'body_class', 'add_slug_body_class' );
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}


//Removing a certain post Type in Search Results
// function SearchFilter($query) {
//     if (($query->is_search) && !is_admin()) {
//         $query->set('post_type', ['post', 'videos']);
//     }
//     return $query;
// }

// add_filter('pre_get_posts','SearchFilter');


//Hidinng certain menu items in the dashboard
function remove_menus () {
    global $menu;
    //$restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
    $restricted = array(__('Posts')); // Hide Only Posts from Dashboard
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
    }
}
// add_action('admin_menu', 'remove_menus');


// For allowing having access to query string parameters in Wordpress 
// without using Super Globals
function custom_query_vars_filter($vars) {
  $vars[] = 'custom-query-string-var';
  return $vars;
}
add_filter( 'query_vars', 'custom_query_vars_filter' );