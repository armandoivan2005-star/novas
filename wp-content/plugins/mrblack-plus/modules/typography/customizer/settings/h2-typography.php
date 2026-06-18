<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlackPlusH2Settings' ) ) {
    class MrBlackPlusH2Settings {

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
            $this->selector = apply_filters( 'mrblack_h2_selector', array( 'h2' ) );
            $this->settings = mrblack_customizer_settings('h2_typo');

            add_filter( 'mrblack_plus_customizer_default', array( $this, 'default' ) );
            add_action( 'customize_register', array( $this, 'register' ), 20);

            add_filter( 'mrblack_h2_typo_customizer_update', array( $this, 'h2_typo_customizer_update' ) );

            add_filter( 'mrblack_google_fonts_list', array( $this, 'fonts_list' ) );
            add_filter( 'mrblack_add_inline_style', array( $this, 'base_style' ) );
            add_filter( 'mrblack_add_tablet_landscape_inline_style', array( $this, 'tablet_landscape_style' ) );
            add_filter( 'mrblack_add_tablet_portrait_inline_style', array( $this, 'tablet_portrait' ) );
            add_filter( 'mrblack_add_mobile_res_inline_style', array( $this, 'mobile_style' ) );
        }

        function default( $option ) {
            $theme_defaults = function_exists('mrblack_theme_defaults') ? mrblack_theme_defaults() : array ();
            $option['h2_typo'] = $theme_defaults['h2_typo'];
            return $option;
        }

        function register( $wp_customize ) {

            $wp_customize->add_section(
                new MrBlack_Customize_Section(
                    $wp_customize,
                    'site-h2-section',
                    array(
                        'title'    => esc_html__('H2 Typography', 'mrblack-plus'),
                        'panel'    => 'site-typography-main-panel',
                        'priority' => 10,
                    )
                )
            );

            /**
             * Option :H2 Typo
             */
                $wp_customize->add_setting(
                    MRBLACK_CUSTOMISER_VAL . '[h2_typo]', array(
                        'type'    => 'option',
                    )
                );

                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Typography(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[h2_typo]', array(
                            'type'    => 'wdt-typography',
                            'section' => 'site-h2-section',
                            'label'   => esc_html__( 'H2 Tag', 'mrblack-plus'),
                        )
                    )
                );

            /**
             * Option : H2 Color
             */
                $wp_customize->add_setting(
                    MRBLACK_CUSTOMISER_VAL . '[h2_color]', array(
                        'default' => '',
                        'type'    => 'option',
                    )
                );

                $wp_customize->add_control(
                    new WP_Customize_Color_Control(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[h2_color]', array(
                            'label'   => esc_html__( 'Color', 'mrblack-plus' ),
                            'section' => 'site-h2-section',
                        )
                    )
                );

        }

        function h2_typo_customizer_update( $defaults ) {
            $h2_typo = mrblack_customizer_settings( 'h2_typo' );
            if( !empty( $h2_typo ) ) {
                return  $h2_typo;
            }
            return $defaults;
        }

        function fonts_list( $fonts ) {
            return mrblack_customizer_frontend_font( $this->settings, $fonts );
        }

        function base_style( $style ) {
            $css   = '';
            $color = mrblack_customizer_settings('h2_color');

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

MrBlackPlusH2Settings::instance();