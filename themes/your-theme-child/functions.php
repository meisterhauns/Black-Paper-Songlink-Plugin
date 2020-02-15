<?php
require('songlink.php');
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_shortcode('songlink', 'songlink');

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'child-style', get_template_directory_uri() . '-child/style.css');
}