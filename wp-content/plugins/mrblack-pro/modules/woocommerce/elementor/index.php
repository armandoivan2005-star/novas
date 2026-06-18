<?php

/**
 * WooCommerce - Elementor Core Class
 */

namespace MrBlackElementor\widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MrBlack_Pro_Elementor {

	/**
	 * A Reference to an instance of this class
	 */
	private static $_instance = null;

	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	const MINIMUM_PHP_VERSION = '7.2';

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->load_modules();

	}

	/**
	 * Requirement Verification
	 */
	public function load_modules() {

		add_action( 'elementor/elements/categories_registered', array( $this, 'mrblack_shop_register_category' ) );

		add_action( 'elementor/widgets/register', array( $this, 'mrblack_shop_register_widgets' ) );

		add_action( 'elementor/frontend/after_register_styles', array( $this, 'mrblack_shop_register_widget_styles' ) );
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'mrblack_shop_register_widget_scripts' ) );

		add_action( 'elementor/preview/enqueue_styles', array( $this, 'mrblack_shop_preview_styles') );
		add_action( 'elementor/preview/enqueue_scripts', array( $this, 'mrblack_shop_preview_scripts') );

	}

	/**
	 * Register category
	 * Add plugin category in elementor
	 */
	public function mrblack_shop_register_category( $elements_manager ) {

		$elements_manager->add_category(
			'wdt-shop-widgets', array(
				'title' => esc_html__( 'MrBlack Shop', 'mrblack-pro' ),
				'icon'  => 'font'
			)
		);

	}

	/**
	 * Register MrBlack widgets
	 */
	public function mrblack_shop_register_widgets( $widgets_manager ) {

		do_action( 'mrblack_shop_register_widgets', $widgets_manager );

	}

	/**
	 * Register MrBlack widgets styles
	 */
	public function mrblack_shop_register_widget_styles() {

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '';

		do_action( 'mrblack_shop_register_widget_styles', $suffix );

	}

	/**
	 * Register MrBlack widgets scripts
	 */
	public function mrblack_shop_register_widget_scripts() {

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '';

		do_action( 'mrblack_shop_register_widget_scripts', $suffix );

	}

	/**
	 * Editor Preview Style
	 */
	public function mrblack_shop_preview_styles() {

		do_action( 'mrblack_shop_preview_styles' );

	}

	/**
	 * Editor Preview Scripts
	 */
	public function mrblack_shop_preview_scripts() {

		do_action( 'mrblack_shop_preview_scripts' );

	}

}

MrBlack_Pro_Elementor::instance();