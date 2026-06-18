<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlackPlusWidgetTitleSettings' ) ) {
    class MrBlackPlusWidgetTitleSettings {

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
             * Title Section
             */
            $wp_customize->add_section(
                new MrBlack_Customize_Section(
                    $wp_customize,
                    'site-widgets-title-style-section',
                    array(
                        'title'    => esc_html__('Widget Title', 'mrblack-plus'),
                        'panel'    => 'site-widget-settings-panel',
                        'priority' => 5,
                    )
                )
            );

            if ( ! defined( 'MRBLACK_PRO_VERSION' ) ) {
                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Separator(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[mrblack-plus-site-sidebar-title-separator]',
                        array(
                            'type'        => 'wdt-separator',
                            'section'     => 'site-widgets-title-style-section',
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

MrBlackPlusWidgetTitleSettings::instance();