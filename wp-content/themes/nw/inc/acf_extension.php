<?php

/*
 * === Advanced Custom Fields Functions ===
 * The Following functions will be used to add certain functionalities
 * to advanced custom fields plugin
 */

// Register Global Options Page for Advanced Custom Fields
if( function_exists('acf_add_options_page') ) {
	
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Theme Global Settings',
		'menu_title'	=> 'NW Global Settings',
		'menu_slug' 	=> 'nw-global-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Global Settings 2',
		'menu_title'	=> 'NW Global Settings 2',
		'parent_slug' 	=> $parent['menu_slug'],
	));
}