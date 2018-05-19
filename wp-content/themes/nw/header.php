<?php 
/**
 * The template for the header part of the site theme.
 *
 * @package WordPress
 * @subpackage NWTheme
 * @since NW 1.0
 */ 
?>

<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head <?php language_attributes(); ?>>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="<?php echo THEME_DIR; ?>/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo THEME_DIR; ?>/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo THEME_DIR; ?>/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo THEME_DIR; ?>/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo THEME_DIR; ?>/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo THEME_DIR; ?>/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo THEME_DIR; ?>/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo THEME_DIR; ?>/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo THEME_DIR; ?>/apple-touch-icon-152x152.png" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <!-- Favicons -->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <style>
        .admin-bar header {
            top: 32px;
        }
    </style>

    <?php
        wp_head();
        
        if(function_exists('get_field')) {
            $fb_page_url = get_field('fb_page_url', 'options');
            $instagram_page_url = get_field('instagram_page_url', 'options');
            $youtube_page_url = get_field('youtube_page_url', 'options');
            $twitter_page_url = get_field('twitter_page_url', 'options');
        }
    ?>

</head>


<body <?php body_class(); ?> id="site-body">

    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav class="header-social">
                        <ul>
                            <li>
                                <a href="#">SUBSCRIBE NOW</a>
                            </li>

                            <?php 
                                if($fb_page_url) :
                            ?>
                            <li>
                                <a href="<?php echo $fb_page_url; ?>" target="_blank">
                                    <i class="fa fa-facebook fa-lg"></i>
                                </a>
                            </li>
                            <?php 
                                endif;
                                if($instagram_page_url) :
                            ?>
                            <li>
                                <a href="<?php echo $instagram_page_url; ?>" target="_blank">
                                    <i class="fa fa-instagram fa-lg"></i>
                                </a>
                            </li>
                            <?php 
                                endif;
                                if($youtube_page_url) :
                            ?>
                            <li>
                                <a href="<?php $youtube_page_url ?>" target="_blank">
                                    <i class="fa fa-youtube-play fa-lg"></i>
                                </a>
                            </li>
                            <?php
                                endif;
                                if($twitter_page_url) :
                            ?>
                            <li>
                                <a href="<?php echo $twitter_page_url; ?>" target="_blank">
                                    <i class="fa fa-twitter fa-lg"></i>
                                </a>
                            </li>
                            <?php 
                                endif;
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row header-links align-items-end">
                <div class="col-2">
                    <div class="logo">
                        <a href="<?php echo site_url(); ?>">
                            <img src="<?php echo THEME_DIR; ?>/assets/dist/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-10">
                    <?php 
                        wp_nav_menu( array(
                            'theme_location' => 'main-menu',
                            'container' => 'nav',
                            'container_class' => 'header-nav'
                        )); 
                    ?>
                </div>
            </div>
        </div>
    </header>