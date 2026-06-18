<?php

/**
 * Listings - Category
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlack_Shop_Listing_Category' ) ) {

    class MrBlack_Shop_Listing_Category {

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
                    include_once MRBLACK_SHOP_PATH . 'modules/category/customizer/index.php';

            }

    }

}


if( !function_exists('mrblack_shop_listing_category') ) {
	function mrblack_shop_listing_category() {
		return MrBlack_Shop_Listing_Category::instance();
	}
}

mrblack_shop_listing_category();