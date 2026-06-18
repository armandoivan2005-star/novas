<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlackPlusCustomizerSite404' ) ) {
    class MrBlackPlusCustomizerSite404 {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {
            add_action( 'customize_register', array( $this, 'register' ), 15);
        }

        function register( $wp_customize ) {

            /**
             * 404 Page
             */
            $wp_customize->add_section(
                new MrBlack_Customize_Section(
                    $wp_customize,
                    'site-404-page-section',
                    array(
                        'title'    => esc_html__('404 Page', 'mrblack-plus'),
                        'priority' => mrblack_customizer_panel_priority( '404' )
                    )
                )
            );

            if ( ! defined( 'MRBLACK_PRO_VERSION' ) ) {
                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Separator(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[mrblack-plus-site-404-separator]',
                        array(
                            'type'        => 'wdt-separator',
                            'section'     => 'site-404-page-section',
                            'settings'    => array(),
                            'caption'     => MRBLACK_PLUS_REQ_CAPTION,
                            'description' => MRBLACK_PLUS_REQ_DESC,
                        )
                    )
                );
            }

        }

    }
}

MrBlackPlusCustomizerSite404::instance();