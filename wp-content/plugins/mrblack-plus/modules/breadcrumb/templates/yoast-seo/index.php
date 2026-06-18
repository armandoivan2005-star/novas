<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlackPlusBCYoast' ) ) {
    class MrBlackPlusBCYoast {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {
            add_action( 'plugins_loaded', array( $this, 'register_init' ) );
        }

        function register_init() {
            if ( defined( 'WPSEO_VERSION' ) ) {	
                $this->load_backend();
                $this->load_frontend();
            }
        }

        function load_backend() {
            add_filter( 'mrblack_breadcrumb_source', array( $this, 'register_option' ) );
        }

        function load_frontend() {
        }

        function register_option( $options ) {
            $options['yoast-seo'] = esc_html__('Yoast SEO','mrblack-plus');
            return $options;
        }

        function register_template() {
            $bc_source = mrblack_customizer_settings( 'breadcrumb_source' );
            if ($bc_source === 'yoast-seo'):
                    mrblack_template_part( 'breadcrumb', 'templates/yoast-seo/title-content', '', $template_args );
            endif;
         }
    }
}

MrBlackPlusBCYoast::instance();