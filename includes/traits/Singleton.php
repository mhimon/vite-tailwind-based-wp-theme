<?php
namespace MHImon\VTBT\Traits;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Singleton Trait
 */
trait Singleton {

	/**
	 * The single instance of the class.
	 *
	 * @var self|null
	 */
	private static $instance;

	/**
	 * Get the single instance of the class.
	 *
	 * @return self
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {}

	/**
	 * Prevent cloning.
	 */
	private function __clone() {}

	/**
	 * Prevent unserialization.
	 */
	public function __wakeup() {}
}
