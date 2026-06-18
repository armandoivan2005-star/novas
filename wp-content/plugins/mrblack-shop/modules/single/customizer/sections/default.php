<?php

/**
 * Listing Customizer - Product Single - Default Settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlack_Shop_Customizer_Single_Default' ) ) {

    class MrBlack_Shop_Customizer_Single_Default {

        private static $_instance = null;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            add_filter( 'mrblack_woo_single_page_settings', array( $this, 'single_page_settings' ), 10, 1 );
            add_action( 'customize_register', array( $this, 'register' ), 40);
            add_action( 'mrblack_hook_content_before', array( $this, 'woo_handle_product_breadcrumb' ), 10);

        }

        function single_page_settings( $settings ) {

            $product_disable_breadcrumb                 = mrblack_customizer_settings('wdt-single-product-disable-breadcrumb' );
            $settings['product_disable_breadcrumb']     = $product_disable_breadcrumb;

            $product_title_breadcrumb                 = mrblack_customizer_settings('wdt-single-product-title-breadcrumb' );
            $settings['product_title_breadcrumb']     = $product_title_breadcrumb;

            return $settings;

        }

        function register( $wp_customize ) {

            /**
            * Option : Disable Breadcrumb
            */
                $wp_customize->add_setting(
                    MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-disable-breadcrumb]', array(
                        'type' => 'option',
                    )
                );

                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Switch(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-disable-breadcrumb]', array(
                            'type'    => 'wdt-switch',
                            'label'   => esc_html__( 'Disable Breadcrumb', 'mrblack-shop'),
                            'section' => 'woocommerce-single-page-default-section',
                            'choices' => array(
                                'on'  => esc_attr__( 'Yes', 'mrblack-shop' ),
                                'off' => esc_attr__( 'No', 'mrblack-shop' )
                            )
                        )
                    )
                );

            /**
            * Option : Show Title in Breadcrumb
            */
                $wp_customize->add_setting(
                    MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-title-breadcrumb]', array(
                        'type' => 'option',
                    )
                );

                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Switch(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-title-breadcrumb]', array(
                            'type'    => 'wdt-switch',
                            'label'   => esc_html__( 'Product Title in Breadcrumb', 'mrblack-shop'),
                            'section' => 'woocommerce-single-page-default-section',
                            'choices' => array(
                                'on'  => esc_attr__( 'Yes', 'mrblack-shop' ),
                                'off' => esc_attr__( 'No', 'mrblack-shop' )
                            ),
                            'description'   => esc_html__('If you like to show title in breadcrumb section.', 'mrblack-shop')
                        )
                    )
                );

        }

        function woo_handle_product_breadcrumb() {

            if(is_product() && mrblack_customizer_settings('wdt-single-product-disable-breadcrumb' )) {
                remove_action('mrblack_breadcrumb', 'mrblack_breadcrumb_template');
            }

        }

    }

}


if( !function_exists('mrblack_shop_customizer_single_default') ) {
	function mrblack_shop_customizer_single_default() {
		return MrBlack_Shop_Customizer_Single_Default::instance();
	}
}

mrblack_shop_customizer_single_default();