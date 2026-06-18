<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlack_Woo_Listing_Option_Hover_Secondary_Image_Effect' ) ) {

    class MrBlack_Woo_Listing_Option_Hover_Secondary_Image_Effect extends MrBlack_Woo_Listing_Option_Core {

        private static $_instance = null;

        public $option_slug;

        public $option_name;

        public $option_type;

        public $option_default_value;

        public $option_value_prefix;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {

            $this->option_slug          = 'product-hover-secondary-image-effect';
            $this->option_name          = esc_html__('Hover Secondary Image Effect', 'mrblack');
            $this->option_default_value = 'product-hover-secimage-fade';
            $this->option_type          = array ( 'class', 'value-css' );
            $this->option_value_prefix  = 'product-hover-';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'mrblack_woo_custom_product_template_hover_options', array( $this, 'woo_custom_product_template_hover_options'), 15, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_hover_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'hover';
        }

        /**
         * Setting Args
         */
        function setting_args() {
            $settings            =  array ();
            $settings['id']      =  $this->option_slug;
            $settings['type']    =  'select';
            $settings['title']   =  $this->option_name;
            $settings['options'] =  array (
                'product-hover-secimage-fade'         => esc_html__('Fade', 'mrblack'),
                'product-hover-secimage-zoomin'       => esc_html__('Zoom In', 'mrblack'),
                'product-hover-secimage-zoomout'      => esc_html__('Zoom Out', 'mrblack'),
                'product-hover-secimage-zoomoutup'    => esc_html__('Zoom Out Up', 'mrblack'),
                'product-hover-secimage-zoomoutdown'  => esc_html__('Zoom Out Down', 'mrblack'),
                'product-hover-secimage-zoomoutleft'  => esc_html__('Zoom Out Left', 'mrblack'),
                'product-hover-secimage-zoomoutright' => esc_html__('Zoom Out Right', 'mrblack'),
                'product-hover-secimage-pushup'       => esc_html__('Push Up', 'mrblack'),
                'product-hover-secimage-pushdown'     => esc_html__('Push Down', 'mrblack'),
                'product-hover-secimage-pushleft'     => esc_html__('Push Left', 'mrblack'),
                'product-hover-secimage-pushright'    => esc_html__('Push Right', 'mrblack'),
                'product-hover-secimage-slideup'      => esc_html__('Slide Up', 'mrblack'),
                'product-hover-secimage-slidedown'    => esc_html__('Slide Down', 'mrblack'),
                'product-hover-secimage-slideleft'    => esc_html__('Slide Left', 'mrblack'),
                'product-hover-secimage-slideright'   => esc_html__('Slide Right', 'mrblack'),
                'product-hover-secimage-hingeup'      => esc_html__('Hinge Up', 'mrblack'),
                'product-hover-secimage-hingedown'    => esc_html__('Hinge Down', 'mrblack'),
                'product-hover-secimage-hingeleft'    => esc_html__('Hinge Left', 'mrblack'),
                'product-hover-secimage-hingeright'   => esc_html__('Hinge Right', 'mrblack'),
                'product-hover-secimage-foldup'       => esc_html__('Fold Up', 'mrblack'),
                'product-hover-secimage-folddown'     => esc_html__('Fold Down', 'mrblack'),
                'product-hover-secimage-foldleft'     => esc_html__('Fold Left', 'mrblack'),
                'product-hover-secimage-foldright'    => esc_html__('Fold Right', 'mrblack'),
                'product-hover-secimage-fliphoriz'    => esc_html__('Flip Horizontal', 'mrblack'),
                'product-hover-secimage-flipvert'     => esc_html__('Flip Vertical', 'mrblack')
            );
            $settings['default'] =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('mrblack_woo_listing_option_hover_secondary_image_effect') ) {
	function mrblack_woo_listing_option_hover_secondary_image_effect() {
		return MrBlack_Woo_Listing_Option_Hover_Secondary_Image_Effect::instance();
	}
}

mrblack_woo_listing_option_hover_secondary_image_effect();