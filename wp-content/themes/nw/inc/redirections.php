<?php

function nw_theme_redirects() {
  $queried_post_type = get_query_var('post_type');
  if ( is_single() && 'custom-post-type' ==  $queried_post_type ) {
    wp_redirect( home_url(), 301 );
    exit;
  }
}

// Disable Single Post Page
add_action( 'template_redirect', 'nw_theme_redirects' );

