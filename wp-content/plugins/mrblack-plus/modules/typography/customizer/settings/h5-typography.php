<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlackPlusH5Settings' ) ) {
    class MrBlackPlusH5Settings {

        private static $_instance = null;
        private $settings         = null;
        private $selector         = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {
            $this->selector = apply_filters( 'mrblack_h5_selector', array( 'h5' ) );
            $this->settings = mrblack_customizer_settings('h5_typo');

            add_filter( 'mrblack_plus_customizer_default', array( $this, 'default' ) );
            add_action( 'customize_register', array( $this, 'register' ), 20);

            add_filter( 'mrblack_h5_typo_customizer_update', array( $this, 'h5_typo_customizer_update' ) );

            add_filter( 'mrblack_google_fonts_list', array( $this, 'fonts_list' ) );
            add_filter( 'mrblack_add_inline_style', array( $this, 'base_style' ) );
            add_filter( 'mrblack_add_tablet_landscape_inline_style', array( $this, 'tablet_landscape_style' ) );
            add_filter( 'mrblack_add_tablet_portrait_inline_style', array( $this, 'tablet_portrait' ) );
            add_filter( 'mrblack_add_mobile_res_inline_style', array( $this, 'mobile_style' ) );
        }

        function default( $option ) {
            $theme_defaults = function_exists('mrblack_theme_defaults') ? mrblack_theme_defaults() : array ();
            $option['h5_typo'] = $theme_defaults['h5_typo'];
            return $option;
        }

        function register( $wp_customize ) {

            $wp_customize->add_section(
                new MrBlack_Customize_Section(
                    $wp_customize,
                    'site-h5-section',
                    array(
                        'title'    => esc_html__('H5 Typography', 'mrblack-plus'),
                        'panel'    => 'site-typography-main-panel',
                        'priority' => 25,
                    )
                )
            );

            /**
             * Option :H5 Typo
             */
                $wp_customize->add_setting(
                    MRBLACK_CUSTOMISER_VAL . '[h5_typo]', array(
                        'type'    => 'option',
                    )
                );

                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Typography(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[h5_typo]', array(
                            'type'    => 'wdt-typography',
                            'section' => 'site-h5-section',
                            'label'   => esc_html__( 'H5 Tag', 'mrblack-plus'),
                        )
                    )
                );

            /**
             * Option : H5 Color
             */
                $wp_customize->add_setting(
                    MRBLACK_CUSTOMISER_VAL . '[h5_color]', array(
                        'default' => '',
                        'type'    => 'option',
                    )
                );

                $wp_customize->add_control(
                    new WP_Customize_Color_Control(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[h5_color]', array(
                            'label'   => esc_html__( 'Color', 'mrblack-plus' ),
                            'section' => 'site-h5-section',
                        )
                    )
                );

        }

        function h5_typo_customizer_update( $defaults ) {
            $h5_typo = mrblack_customizer_settings( 'h5_typo' );
            if( !empty( $h5_typo ) ) {
                return  $h5_typo;
            }
            return $defaults;
        }

        function fonts_list( $fonts ) {
            return mrblack_customizer_frontend_font( $this->settings, $fonts );
        }

        function base_style( $style ) {
            $css   = '';
            $color = mrblack_customizer_settings('h5_color');

            $css .= mrblack_customizer_typography_settings( $this->settings );
            $css .= mrblack_customizer_color_settings( $color );

            $css = mrblack_customizer_dynamic_style( $this->selector, $css );

            return $style.$css;
        }

        function tablet_landscape_style( $style ) {
            $css = mrblack_customizer_responsive_typography_settings( $this->settings, 'tablet-ls' );
            $css = mrblack_customizer_dynamic_style( $this->selector, $css );

            return $style.$css;
        }

        function tablet_portrait( $style ) {
            $css = mrblack_customizer_responsive_typography_settings( $this->settings, 'tablet' );
            $css = mrblack_customizer_dynamic_style( $this->selector, $css );

            return $style.$css;
        }

        function mobile_style( $style ) {
            $css = mrblack_customizer_responsive_typography_settings( $this->settings, 'mobile' );
            $css = mrblack_customizer_dynamic_style( $this->selector, $css );

            return $style.$css;
        }
    }
}

MrBlackPlusH5Settings::instance();