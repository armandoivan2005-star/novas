<?php

/**
 * Listing Framework Template Settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Mrblack_Woo_Listing_Backup_Template_Settings' ) ) {

    class Mrblack_Woo_Listing_Backup_Template_Settings {

        private static $_instance = null;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            /* Template Options Filter */
                add_action( 'cs_framework_options', array ( $this, 'mrblack_woo_cs_framework_backup_options' ), 10 );

        }


        function mrblack_woo_cs_framework_backup_options( $options ) {

            $options['backup']   = array(
                'name'     => 'backup_section',
                'title'    => esc_html__('Backup', 'mrblack-shop'),
                'icon'     => 'fa fa-shield',
                'fields'   => array(
                  array(
                    'type'    => 'notice',
                    'class'   => 'warning',
                    'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'mrblack-shop')
                  ),
                  array(
                    'type'    => 'backup',
                  ),
                )
              );

              return $options;
        }

    }

}


if( !function_exists('mrblack_woo_listing_backup_template_settings') ) {
	function mrblack_woo_listing_backup_template_settings() {
		return Mrblack_Woo_Listing_Backup_Template_Settings::instance();
	}
}

mrblack_woo_listing_backup_template_settings();