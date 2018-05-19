<?php

// function myplugin_register_query_vars( $vars ) {
// 	$vars[] = 'my_var';
// 	return $vars;
// }
// add_filter( 'query_vars', 'myplugin_register_query_vars' );

// Change number of posts per page
function limit_posts_per_archive_page($query) {

    // var_dump($query->is_archive('videos') && !is_admin());
    // die();

    if (($query->is_home() || $query->is_archive()) && !is_admin()) :
        $query->set('posts_per_page', 5);
    endif;
    
    if ($query->is_category() && !is_admin()) :
        $query->set('posts_per_page', 1);
    endif;


    
    if ($query->is_post_type_archive('posts') && !is_admin()) :
        $query->set('posts_per_page', 5);
    endif;

    // Add this to control the number of videos displayed per page.
    if ($query->is_archive('videos') && !is_admin()) :
        $query->set('posts_per_page', 6);
    endif;



    if($query->is_tax('video_categories') && !is_admin()) :
        $query->set('posts_per_page', 6);
    endif;

    if (is_search()) :

        $query->set('posts_per_page', 5);

        // var_dump($query); die();
    endif;

    return $query;

}

// https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
add_filter('pre_get_posts', 'limit_posts_per_archive_page');


// Add Sorting Feature

// function change_sorting_order($query) {
//     $order = isset($query->query_vars['order']) ? $query->query_vars['order'] : false;
//     $orderby = isset($query->query_vars['orderby']) ? $query->query_vars['orderby'] : false;

//     // var_dump($query); die();
//     // if($query->is_archive('videos') && !is_admin()) {
//     //     if($order) {
//     //         $query->set('order', $order);
//     //     }

//     //     if($orderby) {
//     //         $query->set('orderby', $orderby);
//     //     }
//     // }
// }

// add_filter('pre_get_posts', 'change_sorting_order');
