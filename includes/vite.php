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

define( 'VTBT_DIST_URL', get_template_directory_uri() . '/dist' );
define( 'VTBT_DIST_DIR', get_template_directory() . '/dist' );
define( 'VTBT_VITE_DEV_SERVER', 'http://localhost:8098' );
define( 'VTBT_VITE_ENTRY_POINT', 'app.js' );
define( 'VTBT_VITE_DEV', true );

/**
 * Enqueue scripts and styles.
 */
function vtbt_enqueue_vite_scripts() {
	if ( defined( 'VTBT_VITE_DEV' ) && VTBT_VITE_DEV ) {
		add_action( 'wp_head', function() {
			echo '<script type="module" crossorigin src="' . VTBT_VITE_DEV_SERVER . '/' . VTBT_VITE_ENTRY_POINT . '"></script>';
		});
	} else {

		$app_file_css = VTBT_DIST_DIR . '/css/app.css';
		$app_file_js  = VTBT_DIST_DIR . '/js/main.js';

		if ( file_exists( $app_file_css ) ) {
			wp_enqueue_style( 'vtbt-app', VTBT_DIST_URL . '/css/app.css', array(), filemtime( $app_file_css ) );
		}

		if ( file_exists( $app_file_js ) ) {
			wp_enqueue_script( 'vtbt-app', VTBT_DIST_URL . '/js/main.js', array( 'jquery' ), filemtime( $app_file_js ), true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'vtbt_enqueue_vite_scripts' );
