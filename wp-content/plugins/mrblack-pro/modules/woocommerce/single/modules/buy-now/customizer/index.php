<?php

/**
 * WooCommerce - Single - Module - Buy Now - Customizer Settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlack_Shop_Customizer_Single_Buy_Now' ) ) {

    class MrBlack_Shop_Customizer_Single_Buy_Now {

        private static $_instance = null;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            add_filter( 'mrblack_woo_single_page_settings', array( $this, 'single_page_settings' ), 10, 1 );
            add_action( 'customize_register', array( $this, 'register' ), 15);

        }

        function single_page_settings( $settings ) {

            $product_buy_now                   = mrblack_customizer_settings('wdt-single-product-buy-now' );
            $settings['product_buy_now']       = $product_buy_now;

            return $settings;

        }

        function register( $wp_customize ) {

             /**
            * Option : Enable Buy Now
            */
                $wp_customize->add_setting(
                    MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-buy-now]', array(
                        'type' => 'option'
                    )
                );

                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Switch(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-buy-now]', array(
                            'type'    => 'wdt-switch',
                            'label'   => esc_html__( 'Enable Buy Now', 'mrblack-pro'),
                            'section' => 'woocommerce-single-page-default-section',
                            'choices' => array(
                                'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                'off' => esc_attr__( 'No', 'mrblack-pro' )
                            ),
                            'description'   => esc_html__('This option is applicable only for "WooCommerce Default" single page.', 'mrblack-pro')
                        )
                    )
                );

        }

    }

}


if( !function_exists('mrblack_shop_customizer_single_buy_now') ) {
	function mrblack_shop_customizer_single_buy_now() {
		return MrBlack_Shop_Customizer_Single_Buy_Now::instance();
	}
}

mrblack_shop_customizer_single_buy_now();