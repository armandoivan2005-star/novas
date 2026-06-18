<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlackPlusCustomizerSiteGeneral' ) ) {
    class MrBlackPlusCustomizerSiteGeneral {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {
            add_action( 'customize_register', array( $this, 'register' ), 15 );
        }

        function register( $wp_customize ) {

            /**
             * Panel
             */
            $wp_customize->add_panel(
                new MrBlack_Customize_Panel(
                    $wp_customize,
                    'site-general-main-panel',
                    array(
                        'title'    => esc_html__('Site General', 'mrblack-plus'),
                        'priority' => mrblack_customizer_panel_priority( 'general' )
                    )
                )
            );

            do_action('mrblack_general_cutomizer_options', $wp_customize );

        }
    }
}

MrBlackPlusCustomizerSiteGeneral::instance();