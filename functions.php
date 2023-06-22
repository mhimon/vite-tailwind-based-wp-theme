<?php
/**
 * Functions
 *
 * @package FSBO
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Theme setup.
function fsbo_theme_setup() {

	// Title Tag.
	add_theme_support( 'title-tag' );

	// Post Thumbnails.
	add_theme_support( 'post-thumbnails' );

	// HTML5 Support.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	// RSS Feed Links.
	add_theme_support( 'automatic-feed-links' );

	// Register Menus.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'fsbo' ),
		)
	);

}
add_action( 'after_setup_theme', 'fsbo_theme_setup' );

// Enqueue Scripts.
function fsbo_enqueue_scripts() {

	// Theme Styles.
	wp_enqueue_style( 'fsbo-style', get_stylesheet_uri(), array(), '1.0.0', 'all' );

}
add_action( 'wp_enqueue_scripts', 'fsbo_enqueue_scripts' );

// Vite.
require_once get_template_directory() . '/inc/vite.php';
