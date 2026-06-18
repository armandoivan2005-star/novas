<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlack_Shop_Single_Metabox_Options' ) ) {
    class MrBlack_Shop_Single_Metabox_Options {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {
            add_filter( 'mrblack_shop_product_custom_settings', array( $this, 'mrblack_shop_product_custom_settings' ), 20 );
        }

        function mrblack_shop_product_custom_settings( $options ) {

			$product_options = array(

				# Product New Label
					array(
						'id'         => 'product-new-label',
						'type'       => 'switcher',
						'title'      => esc_html__('Add "New" label', 'mrblack-shop'),
					),

					array(
						'id'         => 'product-notes',
						'type'       => 'textarea',
						'title'      => esc_html__('Product Notes', 'mrblack-shop')
					)

			);

			$options = array_merge( $options, $product_options );

			return $options;

        }

    }
}

MrBlack_Shop_Single_Metabox_Options::instance();