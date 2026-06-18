<?php

/*
* Update Summary - Options Filter
*/

if( ! function_exists( 'mrblack_shop_woo_single_summary_options_cmrblack_render' ) ) {
	function mrblack_shop_woo_single_summary_options_cmrblack_render( $options ) {

		$options['countdown'] = esc_html__('Summary Count Down', 'mrblack-pro');
		return $options;

	}
	add_filter( 'mrblack_shop_woo_single_summary_options', 'mrblack_shop_woo_single_summary_options_cmrblack_render', 10, 1 );

}

/*
* Update Summary - Styles Filter
*/

if( ! function_exists( 'mrblack_shop_woo_single_summary_styles_cmrblack_render' ) ) {
	function mrblack_shop_woo_single_summary_styles_cmrblack_render( $styles ) {

		array_push( $styles, 'wdt-shop-coundown-timer' );
		return $styles;

	}
	add_filter( 'mrblack_shop_woo_single_summary_styles', 'mrblack_shop_woo_single_summary_styles_cmrblack_render', 10, 1 );

}

/*
* Update Summary - Scripts Filter
*/

if( ! function_exists( 'mrblack_shop_woo_single_summary_scripts_cmrblack_render' ) ) {
	function mrblack_shop_woo_single_summary_scripts_cmrblack_render( $scripts ) {

		array_push( $scripts, 'jquery-downcount' );
		array_push( $scripts, 'wdt-shop-coundown-timer' );
		return $scripts;

	}
	add_filter( 'mrblack_shop_woo_single_summary_scripts', 'mrblack_shop_woo_single_summary_scripts_cmrblack_render', 10, 1 );

}