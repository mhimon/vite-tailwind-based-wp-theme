<?php
namespace MHImon\VTBT\CPT;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use MHImon\VTBT\Traits\Singleton;

/**
 * Portfolio CPT
 */
class Portfolio {
	use Singleton;

	/**
	 * Constructor.
	 */
	private function __construct() {
		$this->setup_hooks();
	}

	/**
	 * Setup hooks.
	 */
	private function setup_hooks() {
		add_action( 'init', array( $this, 'register_portfolio_cpt' ) );
	}

	/**
	 * Register Portfolio Custom Post Type.
	 */
	public function register_portfolio_cpt() {
		$labels = array(
			'name'                  => _x( 'Portfolios', 'Post Type General Name', 'vtbt' ),
			'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'vtbt' ),
			'menu_name'             => __( 'Portfolios', 'vtbt' ),
			'name_admin_bar'        => __( 'Portfolio', 'vtbt' ),
			'archives'              => __( 'Portfolio Archives', 'vtbt' ),
			'attributes'            => __( 'Portfolio Attributes', 'vtbt' ),
			'parent_item_colon'     => __( 'Parent Portfolio:', 'vtbt' ),
			'all_items'             => __( 'All Portfolios', 'vtbt' ),
			'add_new_item'          => __( 'Add New Portfolio', 'vtbt' ),
			'add_new'               => __( 'Add New', 'vtbt' ),
			'new_item'              => __( 'New Portfolio', 'vtbt' ),
			'edit_item'             => __( 'Edit Portfolio', 'vtbt' ),
			'update_item'           => __( 'Update Portfolio', 'vtbt' ),
			'view_item'             => __( 'View Portfolio', 'vtbt' ),
			'view_items'            => __( 'View Portfolios', 'vtbt' ),
			'search_items'          => __( 'Search Portfolio', 'vtbt' ),
			'not_found'             => __( 'No Portfolio found', 'vtbt' ),
			'not_found_in_trash'    => __( 'No Portfolio found in Trash', 'vtbt' ),
			'featured_image'        => __( 'Featured Image', 'vtbt' ),
			'set_featured_image'    => __( 'Set featured image', 'vtbt' ),
			'remove_featured_image' => __( 'Remove featured image', 'vtbt' ),
			'use_featured_image'    => __( 'Use as featured image', 'vtbt' ),
			'insert_into_item'      => __( 'Insert into Portfolio', 'vtbt' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Portfolio', 'vtbt' ),
			'items_list'            => __( 'Portfolios list', 'vtbt' ),
			'items_list_navigation' => __( 'Portfolios list navigation', 'vtbt' ),
			'filter_items_list'     => __( 'Filter Portfolios list', 'vtbt' ),
		);

		$args = array(
			'label'                 => __( 'Portfolio', 'vtbt' ),
			'description'           => __( 'Portfolio Description', 'vtbt' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-portfolio',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
		);

		register_post_type( 'portfolio', $args );
	}
}
