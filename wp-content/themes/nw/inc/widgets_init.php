<?php

// Add support for Wordpress 3.0's widgets
function nw_widgets_init() {

    register_sidebar( array(
        'name' => __( 'Posts Sidebar', 'nuworks' ),
        'id' => 'sidebar-posts',
        'before_title' => '<h5 class="card-header">',
        'after_title' => '</h5><div class="card-body">',
        'before_widget' => '<div id="%1$s" class="card my-4 widget %2$s">',
        'after_widget' => '</div></div>',
    ) );


    register_sidebar( array(
        'name' => __( 'Posts Sidebar 2', 'nuworks' ),
        'id' => 'sidebar-posts-2',
        'before_title' => '<h5 class="card-header">',
        'after_title' => '</h5><div class="card-body">',
        'before_widget' => '<div id="%1$s" class="card my-4 widget %2$s">',
        'after_widget' => '</div></div>',
    ) );
}

add_action( 'widgets_init', 'nw_widgets_init' );