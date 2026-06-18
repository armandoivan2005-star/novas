<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package MrBlack WordPress theme
 */

function mrblack_tgmpa_plugins_register() {

	// Get array of recommended plugins.

	$plugins_list = array(

		array(
            'name'               => esc_html__('MrBlack Plus', 'mrblack'),
            'slug'               => 'mrblack-plus',
            'source'             => MRBLACK_MODULE_DIR . '/plugins/mrblack-plus.rar',
            'required'           => true,
            'version'            => '1.0.2',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('MrBlack Pro', 'mrblack'),
            'slug'               => 'mrblack-pro',
            'source'             => MRBLACK_MODULE_DIR . '/plugins/mrblack-pro.rar',
            'required'           => true,
            'version'            => '1.0.2',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('MrBlack Shop', 'mrblack'),
            'slug'               => 'mrblack-shop',
            'source'             => MRBLACK_MODULE_DIR . '/plugins/mrblack-shop.rar',
            'required'           => true,
            'version'            => '1.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
		array(
            'name'               => esc_html__('WeDesignTech Elementor Addon', 'mrblack'),
            'slug'               => 'wedesigntech-elementor-addon',
            'source'             => MRBLACK_MODULE_DIR . '/plugins/wedesigntech-elementor-addon.rar',
            'required'           => true,
            'version'            => '1.0.3',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
		array(
            'name'               => esc_html__('WeDesignTech Portfolio', 'mrblack'),
            'slug'               => 'wedesigntech-portfolio',
            'source'             => MRBLACK_MODULE_DIR . '/plugins/wedesigntech-portfolio.rar',
            'required'           => true,
            'version'            => '1.0.2',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('Elementor', 'mrblack'),
            'slug'     => 'elementor',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('Contact Form 7', 'mrblack'),
            'slug'     => 'contact-form-7',
            'required' => true,
		),
		array(
            'name'     => esc_html__('TI WooCommerce Wishlist', 'mrblack'),
            'slug'     => 'ti-woocommerce-wishlist',
            'required' => true,
        ),
		array(
            'name'     => esc_html__('WooCommerce', 'mrblack'),
            'slug'     => 'woocommerce',
            'required' => false,
        ),
		array(
            'name'     => esc_html__('One click Demo Import', 'mrblack'),
            'slug'     => 'one-click-demo-import',
            'required' => true,
        )

	);

    $plugins = apply_filters('mrblack_required_plugins_list', $plugins_list);

	// Register notice
	tgmpa( $plugins, array(
		'id'           => 'mrblack_theme',
		'domain'       => 'mrblack',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
		'dismissable'  => true,
	) );

}
add_action( 'tgmpa_register', 'mrblack_tgmpa_plugins_register' );