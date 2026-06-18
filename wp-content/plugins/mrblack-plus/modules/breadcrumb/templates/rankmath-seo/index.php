<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlackPlusBCRankMath' ) ) {
    class MrBlackPlusBCRankMath {

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
            if ( function_exists('rank_math_the_breadcrumbs') ) {
                $this->load_backend();
            }
        }

        function load_backend() {
            add_filter( 'mrblack_breadcrumb_source', array( $this, 'register_option' ) );
        }

        function register_option( $options ) {
            $options['rankmath-seo'] = esc_html__('Rank Math SEO','mrblack-plus');
            return $options;
        }

        function register_template() {      

          $bc_source = mrblack_customizer_settings( 'breadcrumb_source' );
            if ($bc_source === 'rankmath-seo'):
                mrblack_template_part( 'breadcrumb', 'templates/rankmath-seo/title-content', '', $template_args );
            endif;
         }
    }
}

MrBlackPlusBCRankMath::instance();