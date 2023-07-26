<?php
/**
 * Vite Setup
 *
 * @package VTBT
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'vtbt_DIST_URL', get_template_directory_uri() . '/dist' );
define( 'vtbt_DIST_DIR', get_template_directory() . '/dist' );
define( 'vtbt_VITE_DEV_SERVER', 'http://localhost:8098' );
define( 'vtbt_VITE_ENTRY_POINT', 'app.js' );
define( 'vtbt_VITE_DEV', true );

/**
 * Enqueue scripts and styles.
 */
function vtbt_enqueue_vite_scripts() {
	if ( defined( 'vtbt_VITE_DEV' ) && vtbt_VITE_DEV ) {
		add_action( 'wp_head', function() {
			echo '<script type="module" crossorigin src="' . vtbt_VITE_DEV_SERVER . '/' . vtbt_VITE_ENTRY_POINT . '"></script>';
		});
	} else {

		$app_file_css = vtbt_DIST_DIR . '/css/app.css';
		$app_file_js  = vtbt_DIST_DIR . '/js/main.js';

		if ( file_exists( $app_file_css ) ) {
			wp_enqueue_style( 'vtbt-app', vtbt_DIST_URL . '/css/app.css', array(), filemtime( $app_file_css ) );
		}

		if ( file_exists( $app_file_js ) ) {
			wp_enqueue_script( 'vtbt-app', vtbt_DIST_URL . '/js/main.js', array( 'jquery' ), filemtime( $app_file_js ), true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'vtbt_enqueue_vite_scripts' );
