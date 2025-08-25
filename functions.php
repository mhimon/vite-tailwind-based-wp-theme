<?php
/**
 * Functions
 *
 * Author: Mahbub Hasan Imon <mhimon.dev@gmail.com>
 * Author URI: https://mhimon.dev / https://ultradevs.com
 *
 * @package VTBT
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Theme setup.
function vtbt_theme_setup() {

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
			'primary' => __( 'Primary Menu', 'vtbt-theme' ),
		)
	);

}
add_action( 'after_setup_theme', 'vtbt_theme_setup' );

// Enqueue Scripts.
function vtbt_enqueue_scripts() {

	// Theme Styles.
	wp_enqueue_style( 'vtbt-style', get_stylesheet_uri(), array(), '1.0.0', 'all' );

}
add_action( 'wp_enqueue_scripts', 'vtbt_enqueue_scripts' );

// Main File.
require_once get_template_directory() . '/includes/class-main.php';

require_once get_template_directory() . '/includes/class-vite.php';
