<?php

function nw_title_support() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'nw_title_support' );