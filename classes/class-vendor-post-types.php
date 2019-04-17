<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies
 *
 * @class       WCV_Post_types
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WCV_Post_types Class
 */
class WCV_Post_types {

	/**
	 * Hook in methods.
	 */
	public static function init() {

		add_action( 'woocommerce_register_post_type', array( __CLASS__, 'register_shop_order_vendor' ) );
	}

	/**
	 * Register vendor order type
	 */
	public static function register_shop_order_vendor() {
		if ( ! is_blog_installed() || post_type_exists( 'shop_order_vendor' ) ) {
			return;
		}

		// Vendor Order
		wc_register_order_type(
			'shop_order_vendor',
			apply_filters(
				'wcvendors_register_post_type_shop_order_vendor',
				array(
					'labels' => array(
						'name'               => __( 'Vendor Orders', 'wc-vendors' ),
						'singular_name'      => __( 'Vendor Order', 'wc-vendors' ),
						'add_new'            => _x( 'Add Vendor Order', 'custom post type setting', 'wc-vendors' ),
						'add_new_item'       => _x( 'Add New Vendor Order', 'custom post type setting', 'wc-vendors' ),
						'edit'               => _x( 'Edit', 'custom post type setting', 'wc-vendors' ),
						'edit_item'          => _x( 'Edit Vendor Order', 'custom post type setting', 'wc-vendors' ),
						'new_item'           => _x( 'New Vendor Order', 'custom post type setting', 'wc-vendors' ),
						'view'               => _x( 'View Vendor Order', 'custom post type setting', 'wc-vendors' ),
						'view_item'          => _x( 'View Vendor Order', 'custom post type setting', 'wc-vendors' ),
						'search_items'       => __( 'Search Vendor Orders', 'wc-vendors' ),
						'not_found'          => __( 'No Vendor Orders Found', 'wc-vendors' ),
						'not_found_in_trash' => _x( 'No Vendor orders found in trash', 'custom post type setting', 'wc-vendors' ),
						'parent'             => _x( 'Parent Orders', 'custom post type setting', 'wc-vendors' ),
						'menu_name'          => __( 'Vendor Orders', 'wc-vendors' ),
					),

					'description'                      => __( 'This is where vendor orders are stored.', 'wc-vendors' ),
					'public'                           => false,
					'show_ui'                          => true,
					'capability_type'                  => 'shop_order',
					'map_meta_cap'                     => true,
					'publicly_queryable'               => false,
					'exclude_from_search'              => true,
					'show_in_menu'                     => current_user_can( 'manage_woocommerce' ) ? 'wc-vendors' : true,
					'hierarchical'                     => false,
					'show_in_nav_menus'                => false,
					'rewrite'                          => false,
					'query_var'                        => false,
					'supports'                         => array( 'title', 'comments', 'custom-fields' ),
					'has_archive'                      => false,

					// wc_register_order_type() params
					'exclude_from_orders_screen'       => false,
					'add_order_meta_boxes'             => true,
					'exclude_from_order_count'         => true,
					'exclude_from_order_views'         => true,
					'exclude_from_order_reports'       => true,
					'exclude_from_order_sales_reports' => true,
					'class_name'                       => 'WC_Order_Vendor',
				)
			)
		);
	}
}

WCV_Post_types::init();
