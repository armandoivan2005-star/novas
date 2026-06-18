<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlackPlusWidgetContentSettings' ) ) {
    class MrBlackPlusWidgetContentSettings {

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

        function register( $wp_customize ){

            /**
             * Content Section
             */
            $wp_customize->add_section(
                new MrBlack_Customize_Section(
                    $wp_customize,
                    'site-widgets-content-style-section',
                    array(
                        'title'    => esc_html__('Widget Content', 'mrblack-plus'),
                        'panel'    => 'site-widget-settings-panel',
                        'priority' => 10,
                    )
                )
            );

            if ( ! defined( 'MRBLACK_PRO_VERSION' ) ) {
                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Separator(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[mrblack-plus-site-widgets-content-style-separator]',
                        array(
                            'type'        => 'wdt-separator',
                            'section'     => 'site-widgets-content-style-section',
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

MrBlackPlusWidgetContentSettings::instance();