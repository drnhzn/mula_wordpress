<?php

// Check if is in login page
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}


// Get Thumbnail URL
function nw_post_thumbnail_url () {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	$url = $thumb['0'];
	return $url;
}


/**
 * Returns the permalink for a page based on the incoming slug.
 */
function get_permalink_by_slug( $slug, $post_type = '' ) {

    // Initialize the permalink value
    $permalink = null;

    // Build the arguments for WP_Query
    $args = array(
        'name'          => $slug,
        'max_num_posts' => 1
    );

    // If the optional argument is set, add it to the arguments array
    if( '' != $post_type ) {
        $args = array_merge( $args, array( 'post_type' => $post_type ) );
    } // end if

    // Run the query (and reset it)
    $query = new WP_Query( $args );
    if( $query->have_posts() ) {
        $query->the_post();
        $permalink = get_permalink( get_the_ID() );
    } // end if
    wp_reset_postdata();

    return $permalink;

} // end get_permalink_by_slug