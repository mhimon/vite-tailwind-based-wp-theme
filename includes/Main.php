<?php
namespace MHImon\VTBT;

use MHImon\VTBT\CPT\Portfolio;
use Pablo_Pacheco\WP_Namespace_Autoloader\WP_Namespace_Autoloader;

/**
 * Main Theme Class
 */
class Main {

	protected static $instance = null;

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}


	/**
	 * Load dependencies and hooks.
	 */
	protected function setup_hooks() {

		Portfolio::get_instance();
	}

	public function __construct() {
		$this->setup_hooks();
	}
}

// if ( ! function_exists( 'vtbt_main' ) ) {

// 	/**
// 	 * Returns the main instance of VTBT.
// 	 *
// 	 * @return Main
// 	 */
// 	function vtbt_main() {
// 		return Main::get_instance();
// 	}
// }

// vtbt_main();
