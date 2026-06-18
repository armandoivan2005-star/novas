<?php
/**
 * Plugin Name:	MrBlack Pro
 * Description: Adds advanced features for MrBlack Theme.
 * Version: 1.0.2
 * Author: the WeDesignTech team
 * Author URI: https://wedesignthemes.com/
 * Text Domain: mrblack-pro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlackPro' ) ) {
    class MrBlackPro {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {

            $this->define_constants();

            /**
             * Before Hook
             */
            do_action( 'mrblack_pro_before_plugin_load' );

                $this->load_helper();
                $this->load_modules();
                $this->frontend();
                $this->load_post_types();
                $this->load_widget_area_generator();

                add_filter( 'cs_framework_settings', array ( $this, 'mrblack_cs_framework_settings' ) );

                add_action( 'plugins_loaded', array( $this, 'check_if_user_logged_in' ) );

            /**
             * After Hook
             */
            do_action( 'mrblack_pro_after_plugin_load' );
        }

        function check_if_user_logged_in() {

            $this->load_codestar();

        }

        function define_constants() {

            define( 'MRBLACK_PRO_VERSION', '1.0.0' );
            define( 'MRBLACK_PRO_DIR_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
            define( 'MRBLACK_PRO_DIR_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
            if( !defined('MRBLACK_CUSTOMISER_VAL') ) {
                define( 'MRBLACK_CUSTOMISER_VAL', 'mrblack-customiser-option');
            }

        }

        function i18n() {
            add_action( 'plugins_loaded', array( $this, 'i18n' ) );
            load_plugin_textdomain( 'mrblack-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
        }

        function load_codestar() {
            if( !defined( 'CS_OPTION' ) ) {
                define( 'CS_OPTION', '_mrblack_cs_options' );
            }
            define( 'WDT_CS_FOLDER_PATH', 'mrblack-pro' );
            require_once MRBLACK_PRO_DIR_PATH . 'cs-framework/cs-framework.php';
        }

        function load_helper() {
            require_once MRBLACK_PRO_DIR_PATH . 'functions.php';
        }

        function load_modules() {

            /**
             * Before Hook
             */
            do_action( 'mrblack_pro_before_load_modules' );

                foreach( glob( MRBLACK_PRO_DIR_PATH. 'modules/*/index.php'  ) as $module ) {
                    include_once $module;
                }

            /**
             * After Hook
             */
            do_action( 'mrblack_pro_after_load_modules' );

        }

        function load_post_types() {
            require_once MRBLACK_PRO_DIR_PATH . 'post-types/post-types.php';
        }

        function load_widget_area_generator() {
            require_once MRBLACK_PRO_DIR_PATH . 'widget-area/widget-area.php';
        }

        function frontend() {
            add_filter( 'body_class', array( $this, 'add_body_classes' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
        }

        function add_body_classes( $classes ) {
            $classes[] = 'mrblack-pro-'.MRBLACK_PRO_VERSION;
            return $classes;
        }

        function enqueue_assets() {

            /**
             * Add Common css & javascript
             */

            wp_enqueue_style( 'mrblack-pro-widget', MRBLACK_PRO_DIR_URL . 'assets/css/widget.css', false, MRBLACK_PRO_VERSION, 'all');

            do_action( 'mrblack_pro_after_asset_enqueue' );
        }

        function mrblack_cs_framework_settings($settings){

	        $settings           = array(
	          'menu_title'      => esc_html__('MrBlack Settings', 'mrblack-pro'),
	          'menu_type'       => 'menu',
	          'menu_slug'       => 'mrblack-pro-settings',
	          'ajax_save'       => true,
	          'show_reset_all'  => false,
	          'framework_title' => esc_html__('MrBlack', 'mrblack-pro'),
	        );

            return apply_filters( 'mrblack_pro_cs_framework_settings', $settings );
        }

    }
}

if( !function_exists( 'mrblack_pro' ) ) {
    function mrblack_pro() {
        return MrBlackPro::instance();
    }
}

register_activation_hook( __FILE__, 'mrblack_pro_activation_hook' );
function mrblack_pro_activation_hook() {
    if (!class_exists ( 'MrBlackPlus' )) {
        deactivate_plugins( plugin_basename( __FILE__ ) );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'mrblack-pro' ),
            '<strong>' . esc_html__( 'MrBlack Pro Plugin', 'mrblack-pro' ) . '</strong>',
            '<strong>' . esc_html__( 'MrBlack Plus Plugin', 'mrblack-pro' ) . '</strong>'
        );
        wp_die( sprintf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message ), 'Plugin dependency check', array( 'back_link' => true ) );
    } else {
        mrblack_pro();

        // Updating customizer default values
        $saved_settings = get_option( MRBLACK_CUSTOMISER_VAL );
        $saved_settings = (is_array($saved_settings) && !empty($saved_settings)) ? $saved_settings : array ();

        if(!array_key_exists('pro-settings-updated',  $saved_settings)) {
            $pro_defaults = apply_filters( 'mrblack_pro_customizer_default', array( 'pro-settings-updated' => true ) );
            $saved_settings = array_merge($saved_settings, $pro_defaults);
        }

        if(class_exists('WooCommerce')) {
            if(!array_key_exists('shop-pro-settings-updated',  $saved_settings)) {
                $shop_pro_defaults = apply_filters( 'mrblack_shop_pro_customizer_default', array( 'shop-pro-settings-updated' => true ) );
                $saved_settings = array_merge($saved_settings, $shop_pro_defaults);
            }
        }

        if(!empty($saved_settings)) {
            update_option( constant( 'MRBLACK_CUSTOMISER_VAL' ), $saved_settings );
        }

    }
}

if (class_exists ( 'MrBlackPlus' ) && class_exists ( 'MrBlackPro' )) {
    mrblack_pro();
} else {
    add_action( 'admin_init', 'mrblack_init' );
    function mrblack_init() {
        deactivate_plugins( __FILE__ );
    }
}