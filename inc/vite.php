<?php
/**
 * Vite Setup
 *
 * @package FSBO
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'FSBO_DIST_URL', get_template_directory_uri() . '/dist' );
define( 'FSBO_DIST_DIR', get_template_directory() . '/dist' );
define( 'FSBO_VITE_DEV_SERVER', 'http://localhost:8098' );
define( 'FSBO_VITE_ENTRY_POINT', 'app.js' );
define( 'FSBO_VITE_DEV', true );

/**
 * Enqueue scripts and styles.
 */
function fsbo_enqueue_vite_scripts() {
	if ( defined( 'FSBO_VITE_DEV' ) && FSBO_VITE_DEV ) {
		add_action( 'wp_head', function() {
			echo '<script type="module" crossorigin src="' . FSBO_VITE_DEV_SERVER . '/' . FSBO_VITE_ENTRY_POINT . '"></script>';
		});
	} else {

		// Get Data from manifest.json.
		$manifest = json_decode( file_get_contents( FSBO_DIST_DIR . '/manifest.json' ), true );

		if ( ! $manifest ) {
			throw new \Exception( 'No manifest.json found. Please run yarn build or yarn dev to generate one.' );
		}

		if ( is_array( $manifest ) ) {
			foreach ( $manifest as $key => $value ) {
				$file = $value['file'];
				if ( 'css' === pathinfo( $file, PATHINFO_EXTENSION ) ) {
					wp_enqueue_style( $key, FSBO_DIST_URL . '/' . $file, array(), null );
				} else {
					wp_enqueue_script( $key, FSBO_DIST_URL . '/' . $file, array( 'jquery' ), null, true );
				}
			}
		}
	}
}
add_action( 'wp_enqueue_scripts', 'fsbo_enqueue_vite_scripts' );

/**
 * Add async to all scripts.
 *
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return string
 */
function fsbo_add_async_attribute( $tag, $handle ) {
	if ( 'jquery-core' === $handle ) {
		return $tag;
	}
	return str_replace( ' src', ' async="async" src', $tag );
}
// add_filter( 'script_loader_tag', 'fsbo_add_async_attribute', 10, 2 );

/**
 * Add defer to all scripts.
 *
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return string
 */
function fsbo_add_defer_attribute( $tag, $handle ) {
	if ( 'jquery-core' === $handle ) {
		return $tag;
	}
	return str_replace( ' src', ' defer="defer" src', $tag );
}
// add_filter( 'script_loader_tag', 'fsbo_add_defer_attribute', 10, 2 );