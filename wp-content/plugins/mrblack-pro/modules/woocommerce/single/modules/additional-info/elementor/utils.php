<?php

/*
* Update Summary - Options Filter
*/

if( ! function_exists( 'mrblack_shop_woo_single_summary_options_ai_render' ) ) {
	function mrblack_shop_woo_single_summary_options_ai_render( $options ) {

		$options['additional_info']                   = esc_html__('Summary Additional Info', 'mrblack-pro');
		$options['additional_info_delivery_period']   = esc_html__('Summary Additional Info - Delivery Period', 'mrblack-pro');
		$options['additional_info_realtime_visitors'] = esc_html__('Summary Additional Info - Real Time Visitors', 'mrblack-pro');
		$options['additional_info_shipping_offer']    = esc_html__('Summary Additional Info - Shipping Offer', 'mrblack-pro');
		$options['additional_info_weight']    		  = esc_html__('Summary Additional Info - Weight', 'mrblack-pro');
		$options['additional_info_dimensions']        = esc_html__('Summary Additional Info - Dimenstions', 'mrblack-pro');
		$options['additional_info_color']             = esc_html__('Summary Additional Info - Color', 'mrblack-pro');
		$options['additional_info_size']              = esc_html__('Summary Additional Info - Size', 'mrblack-pro');
		return $options;

	}
	add_filter( 'mrblack_shop_woo_single_summary_options', 'mrblack_shop_woo_single_summary_options_ai_render', 10, 1 );

}

/*
* Update Summary - Styles Filter
*/

if( ! function_exists( 'mrblack_shop_woo_single_summary_styles_ai_render' ) ) {
	function mrblack_shop_woo_single_summary_styles_ai_render( $styles ) {

		array_push( $styles, 'wdt-shop-additional-info' );
		return $styles;

	}
	add_filter( 'mrblack_shop_woo_single_summary_styles', 'mrblack_shop_woo_single_summary_styles_ai_render', 10, 1 );

}

/*
* Update Summary - Scripts Filter
*/

if( ! function_exists( 'mrblack_shop_woo_single_summary_scripts_ai_render' ) ) {
	function mrblack_shop_woo_single_summary_scripts_ai_render( $scripts ) {

		array_push( $scripts, 'wdt-shop-additional-info' );
		return $scripts;

	}
	add_filter( 'mrblack_shop_woo_single_summary_scripts', 'mrblack_shop_woo_single_summary_scripts_ai_render', 10, 1 );

}