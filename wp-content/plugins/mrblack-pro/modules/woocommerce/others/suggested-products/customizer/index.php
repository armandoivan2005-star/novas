<?php

/**
 * WooCommerce - Single - Module - Suggested Products - Customizer Settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlack_Shop_Customizer_Others_Suggested_Products' ) ) {

    class MrBlack_Shop_Customizer_Others_Suggested_Products {

        private static $_instance = null;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            add_filter( 'mrblack_woo_others_settings', array( $this, 'others_settings' ), 10, 1 );
            add_action( 'customize_register', array( $this, 'register' ), 15);

        }

        function others_settings( $settings ) {

            $enable_suggested_products                 = mrblack_customizer_settings('wdt-woo-others-enable-suggested-products' );
            $settings['enable_suggested_products']     = $enable_suggested_products;

            return $settings;

        }

        function register( $wp_customize ) {

            /**
            * Option : Enable Suggested Products
            */
                $wp_customize->add_setting(
                    MRBLACK_CUSTOMISER_VAL . '[wdt-woo-others-enable-suggested-products]', array(
                        'type' => 'option'
                    )
                );

                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Switch(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-woo-others-enable-suggested-products]', array(
                            'type'    => 'wdt-switch',
                            'label'   => esc_html__( 'Enable Suggested Products', 'mrblack-pro'),
                            'section' => 'woocommerce-others-section',
                            'choices' => array(
                                'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                'off' => esc_attr__( 'No', 'mrblack-pro' )
                            ),
                            'description'   => esc_html__('Enable suggested products sticky section.', 'mrblack-pro'),
                        )
                    )
                );

        }

    }

}


if( !function_exists('mrblack_shop_customizer_others_suggested_products') ) {
	function mrblack_shop_customizer_others_suggested_products() {
		return MrBlack_Shop_Customizer_Others_Suggested_Products::instance();
	}
}

mrblack_shop_customizer_others_suggested_products();