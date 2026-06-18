<?php

/**
 * Listings - Tag
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlack_Shop_Listing_Tag' ) ) {

    class MrBlack_Shop_Listing_Tag {

        private static $_instance = null;

        private $settings;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            /* Load Modules */
                $this->load_modules();

        }

        /*
        Load Modules
        */
            function load_modules() {

                /* Customizer */
                    include_once MRBLACK_SHOP_PATH . 'modules/tag/customizer/index.php';

            }

    }

}


if( !function_exists('mrblack_shop_listing_tag') ) {
	function mrblack_shop_listing_tag() {
		return MrBlack_Shop_Listing_Tag::instance();
	}
}

mrblack_shop_listing_tag();