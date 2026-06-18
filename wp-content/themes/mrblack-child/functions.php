<?php
add_action( 'wp_enqueue_scripts', 'mrblack_child_enqueue_styles', 100);
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
function mrblack_child_enqueue_styles() {
	wp_enqueue_style( 'mrblack-parent', get_theme_file_uri('/style.css') );
}