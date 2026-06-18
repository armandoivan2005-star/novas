<?php

/**
 * Listing Customizer - Category Settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlack_Shop_Listing_Customizer_Category' ) ) {

    class MrBlack_Shop_Listing_Customizer_Category {

        private static $_instance = null;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            add_filter( 'mrblack_woo_category_page_default_settings', array( $this, 'category_page_default_settings' ), 10, 1 );
            add_action( 'customize_register', array( $this, 'register' ), 40);
            add_action( 'mrblack_hook_content_before', array( $this, 'woo_handle_product_breadcrumb' ), 10);

        }

        function category_page_default_settings( $settings ) {

            $disable_breadcrumb             = mrblack_customizer_settings('wdt-woo-category-page-disable-breadcrumb' );
            $settings['disable_breadcrumb'] = $disable_breadcrumb;

            $show_sorter_on_header              = mrblack_customizer_settings('wdt-woo-category-page-show-sorter-on-header' );
            $settings['show_sorter_on_header']  = $show_sorter_on_header;

            $sorter_header_elements             = mrblack_customizer_settings('wdt-woo-category-page-sorter-header-elements' );
            $settings['sorter_header_elements'] = (is_array($sorter_header_elements) && !empty($sorter_header_elements) ) ? $sorter_header_elements : array ();

            $show_sorter_on_footer              = mrblack_customizer_settings('wdt-woo-category-page-show-sorter-on-footer' );
            $settings['show_sorter_on_footer']  = $show_sorter_on_footer;

            $sorter_footer_elements             = mrblack_customizer_settings('wdt-woo-category-page-sorter-footer-elements' );
            $settings['sorter_footer_elements'] = (is_array($sorter_footer_elements) && !empty($sorter_footer_elements) ) ? $sorter_footer_elements : array ();

            return $settings;

        }

        function register( $wp_customize ) {

                /**
                * Option : Disable Breadcrumb
                */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-woo-category-page-disable-breadcrumb]', array(
                            'type' => 'option',
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-woo-category-page-disable-breadcrumb]', array(
                                'type'    => 'wdt-switch',
                                'label'   => esc_html__( 'Disable Breadcrumb', 'mrblack-shop'),
                                'section' => 'woocommerce-category-page-section',
                                'choices' => array(
                                    'on'  => esc_attr__( 'Yes', 'mrblack-shop' ),
                                    'off' => esc_attr__( 'No', 'mrblack-shop' )
                                )
                            )
                        )
                    );


                /**
                 * Option : Show Sorter On Header
                 */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-woo-category-page-show-sorter-on-header]', array(
                            'type' => 'option',
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-woo-category-page-show-sorter-on-header]', array(
                                'type'    => 'wdt-switch',
                                'label'   => esc_html__( 'Show Sorter On Header', 'mrblack-shop'),
                                'section' => 'woocommerce-category-page-section',
                                'choices' => array(
                                    'on'  => esc_attr__( 'Yes', 'mrblack-shop' ),
                                    'off' => esc_attr__( 'No', 'mrblack-shop' )
                                )
                            )
                        )
                    );

                /**
                 * Option : Sorter Header Elements
                 */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-woo-category-page-sorter-header-elements]', array(
                            'type' => 'option',
                        )
                    );

                    $wp_customize->add_control( new MrBlack_Customize_Control_Sortable(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-woo-category-page-sorter-header-elements]', array(
                            'type' => 'wdt-sortable',
                            'label' => esc_html__( 'Sorter Header Elements', 'mrblack-shop'),
                            'section' => 'woocommerce-category-page-section',
                            'choices' => apply_filters( 'mrblack_category_header_sorter_elements', array(
                                'filter'               => esc_html__( 'Filter - OrderBy', 'mrblack-shop' ),
                                'filters_widget_area'  => esc_html__( 'Filters - Widget Area', 'mrblack-shop' ),
                                'result_count'         => esc_html__( 'Result Count', 'mrblack-shop' ),
                                'pagination'           => esc_html__( 'Pagination', 'mrblack-shop' ),
                                'display_mode'         => esc_html__( 'Display Mode', 'mrblack-shop' ),
                                'display_mode_options' => esc_html__( 'Display Mode Options', 'mrblack-shop' )
                            )),
                        )
                    ));

                /**
                 * Option : Show Sorter On Footer
                 */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-woo-category-page-show-sorter-on-footer]', array(
                            'type' => 'option',
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-woo-category-page-show-sorter-on-footer]', array(
                                'type'    => 'wdt-switch',
                                'label'   => esc_html__( 'Show Sorter On Footer', 'mrblack-shop'),
                                'section' => 'woocommerce-category-page-section',
                                'choices' => array(
                                    'on'  => esc_attr__( 'Yes', 'mrblack-shop' ),
                                    'off' => esc_attr__( 'No', 'mrblack-shop' )
                                )
                            )
                        )
                    );

                /**
                 * Option : Sorter Footer Elements
                 */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-woo-category-page-sorter-footer-elements]', array(
                            'type' => 'option',
                        )
                    );

                    $wp_customize->add_control( new MrBlack_Customize_Control_Sortable(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-woo-category-page-sorter-footer-elements]', array(
                            'type' => 'wdt-sortable',
                            'label' => esc_html__( 'Sorter Footer Elements', 'mrblack-shop'),
                            'section' => 'woocommerce-category-page-section',
                            'choices' => apply_filters( 'mrblack_category_footer_sorter_elements', array(
                                'filter'               => esc_html__( 'Filter', 'mrblack-shop' ),
                                'result_count'         => esc_html__( 'Result Count', 'mrblack-shop' ),
                                'pagination'           => esc_html__( 'Pagination', 'mrblack-shop' ),
                                'display_mode'         => esc_html__( 'Display Mode', 'mrblack-shop' ),
                                'display_mode_options' => esc_html__( 'Display Mode Options', 'mrblack-shop' )
                            )),
                        )
                    ));

        }

        function woo_handle_product_breadcrumb() {

            if(is_product_category() && mrblack_customizer_settings('wdt-woo-category-page-disable-breadcrumb' )) {
                remove_action('mrblack_breadcrumb', 'mrblack_breadcrumb_template');
            }

        }

    }

}


if( !function_exists('mrblack_shop_listing_customizer_category') ) {
	function mrblack_shop_listing_customizer_category() {
		return MrBlack_Shop_Listing_Customizer_Category::instance();
	}
}

mrblack_shop_listing_customizer_category();