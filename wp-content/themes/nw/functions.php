<?php
/**
 * Functions.php for NWTheme Theme by Michael Yap of nuworks.ph
 * This file will include functions that will be used by the NWTheme Theme
 *
 * @package WordPress
 * @subpackage NWTheme
 * @since NWTheme 1.0
 *
 */

//  Define theme constants
require_once('inc/constants.php');

//  Add Thumbnail Support
require_once('inc/thumbnails.php');

// Add Title Support
require_once('inc/title_support.php');

// Add Nav Menu Support
require_once('inc/nav_menu.php');

// Initiate Widgets
require_once('inc/widgets_init.php');

// Initiate Theme Scripts and Style Queue
require_once('inc/scripts_styles.php');

// Post Type and Taxonomy Query Overrides
require_once('inc/post_tax_query.php');

// Pagination Function
require_once('inc/pagination.php');

// Duplicate Post Content
require_once('inc/duplicate_post.php');

// Include Custom Functions that I used in the past
require_once('inc/custom_functions.php');

// Include Custom Filters
require_once('inc/custom_filters_actions.php');

// Nav Header Walker
require_once('inc/nav_walker_example.php');

// ACF Custom Methods
require_once('inc/acf_extension.php');

// Custom Breadcrumbs 
require_once('inc/redirections.php');

// Custom Breadcrumbs 
require_once('inc/custom_breadcrumbs.php');

