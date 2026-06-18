<?php

/**
 * WooCommerce - Single - Module - Social Share & Follow - Customizer Settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlack_Shop_Customizer_Single_Social_Share_And_Follow' ) ) {

    class MrBlack_Shop_Customizer_Single_Social_Share_And_Follow {

        private static $_instance = null;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            add_filter( 'mrblack_woo_single_page_settings', array( $this, 'single_page_settings' ), 10, 1 );
            add_action( 'customize_register', array( $this, 'register' ), 15);

        }

        function single_page_settings( $settings ) {

            $product_show_sharer_facebook                = mrblack_customizer_settings('wdt-single-product-show-sharer-facebook' );
            $settings['product_show_sharer_facebook']    = $product_show_sharer_facebook;

            $product_show_sharer_delicious               = mrblack_customizer_settings('wdt-single-product-show-sharer-delicious' );
            $settings['product_show_sharer_delicious']   = $product_show_sharer_delicious;

            $product_show_sharer_digg                    = mrblack_customizer_settings('wdt-single-product-show-sharer-digg' );
            $settings['product_show_sharer_digg']        = $product_show_sharer_digg;

            $product_show_sharer_twitter                 = mrblack_customizer_settings('wdt-single-product-show-sharer-twitter' );
            $settings['product_show_sharer_twitter']     = $product_show_sharer_twitter;

            $product_show_sharer_linkedin                = mrblack_customizer_settings('wdt-single-product-show-sharer-linkedin' );
            $settings['product_show_sharer_linkedin']    = $product_show_sharer_linkedin;

            $product_show_sharer_pinterest               = mrblack_customizer_settings('wdt-single-product-show-sharer-pinterest' );
            $settings['product_show_sharer_pinterest']   = $product_show_sharer_pinterest;

            $product_show_sharer_instagram               = mrblack_customizer_settings('wdt-single-product-show-sharer-instagram' );
            $settings['product_show_sharer_instagram']   = $product_show_sharer_instagram;

            $product_show_sharer_threads               = mrblack_customizer_settings('wdt-single-product-show-sharer-threads' );
            $settings['product_show_sharer_threads']   = $product_show_sharer_threads;

            return $settings;

        }

        function register( $wp_customize ) {

            /**
            * Share
            */

                /**
                * Option : Sharer Description
                */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-description]', array(
                            'type' => 'option'
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-description]', array(
                                'type'        => 'wdt-description',
                                'label'       => esc_html__( 'Note: ', 'mrblack-pro'),
                                'section'     => 'woocommerce-single-page-sociable-share-section',
                                'description' => esc_html__( 'This option is applicable only for WooCommerce "Custom Template".', 'mrblack-pro')
                            )
                        )
                    );

                /**
                * Option : Show Facebook Sharer
                */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-facebook]', array(
                            'type' => 'option'
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-facebook]', array(
                                'type'    => 'wdt-switch',
                                'label'   => esc_html__( 'Show Facebook Sharer', 'mrblack-pro'),
                                'section' => 'woocommerce-single-page-sociable-share-section',
                                'choices' => array(
                                    'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                    'off' => esc_attr__( 'No', 'mrblack-pro' )
                                )
                            )
                        )
                    );

                /**
                * Option : Show Delicious Sharer
                */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-delicious]', array(
                            'type' => 'option'
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-delicious]', array(
                                'type'    => 'wdt-switch',
                                'label'   => esc_html__( 'Show Delicious Sharer', 'mrblack-pro'),
                                'section' => 'woocommerce-single-page-sociable-share-section',
                                'choices' => array(
                                    'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                    'off' => esc_attr__( 'No', 'mrblack-pro' )
                                )
                            )
                        )
                    );

                /**
                * Option : Show Digg Sharer
                */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-digg]', array(
                            'type' => 'option'
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-digg]', array(
                                'type'    => 'wdt-switch',
                                'label'   => esc_html__( 'Show Digg Sharer', 'mrblack-pro'),
                                'section' => 'woocommerce-single-page-sociable-share-section',
                                'choices' => array(
                                    'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                    'off' => esc_attr__( 'No', 'mrblack-pro' )
                                )
                            )
                        )
                    );

                /**
                * Option : Show Twitter Sharer
                */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-twitter]', array(
                            'type' => 'option'
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-twitter]', array(
                                'type'    => 'wdt-switch',
                                'label'   => esc_html__( 'Show Twitter Sharer', 'mrblack-pro'),
                                'section' => 'woocommerce-single-page-sociable-share-section',
                                'choices' => array(
                                    'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                    'off' => esc_attr__( 'No', 'mrblack-pro' )
                                )
                            )
                        )
                    );

                /**
                * Option : Show LinkedIn Sharer
                */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-linkedin]', array(
                            'type' => 'option'
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-linkedin]', array(
                                'type'    => 'wdt-switch',
                                'label'   => esc_html__( 'Show LinkedIn Sharer', 'mrblack-pro'),
                                'section' => 'woocommerce-single-page-sociable-share-section',
                                'choices' => array(
                                    'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                    'off' => esc_attr__( 'No', 'mrblack-pro' )
                                )
                            )
                        )
                    );

                /**
                * Option : Show Pinterest Sharer
                */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-pinterest]', array(
                            'type' => 'option'
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-pinterest]', array(
                                'type'    => 'wdt-switch',
                                'label'   => esc_html__( 'Show Pinterest Sharer', 'mrblack-pro'),
                                'section' => 'woocommerce-single-page-sociable-share-section',
                                'choices' => array(
                                    'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                    'off' => esc_attr__( 'No', 'mrblack-pro' )
                                )
                            )
                        )
                    );

                /**
                * Option : Show Instagram Sharer
                */
                $wp_customize->add_setting(
                    MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-instagram]', array(
                        'type' => 'option'
                    )
                );

                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Switch(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-instagram]', array(
                            'type'    => 'wdt-switch',
                            'label'   => esc_html__( 'Show Instgram Sharer', 'mrblack-pro'),
                            'section' => 'woocommerce-single-page-sociable-share-section',
                            'choices' => array(
                                'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                'off' => esc_attr__( 'No', 'mrblack-pro' )
                            )
                        )
                    )
                );


                /**
                * Option : Show Threads Sharer
                */
                $wp_customize->add_setting(
                    MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-threads]', array(
                        'type' => 'option'
                    )
                );

                $wp_customize->add_control(
                    new MrBlack_Customize_Control_Switch(
                        $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-sharer-threads]', array(
                            'type'    => 'wdt-switch',
                            'label'   => esc_html__( 'Show Threads Sharer', 'mrblack-pro'),
                            'section' => 'woocommerce-single-page-sociable-share-section',
                            'choices' => array(
                                'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                'off' => esc_attr__( 'No', 'mrblack-pro' )
                            )
                        )
                    )
                );

            /**
            * Follow
            */

                /**
                * Option : Follow Description
                */
                    $wp_customize->add_setting(
                        MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-follow-description]', array(
                            'type' => 'option'
                        )
                    );

                    $wp_customize->add_control(
                        new MrBlack_Customize_Control_Switch(
                            $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-follow-description]', array(
                                'type'    => 'wdt-description',
                                'label'   => esc_html__( 'Note :', 'mrblack-pro'),
                                'section' => 'woocommerce-single-page-sociable-follow-section',
                                'description'   => esc_html__( 'This option is applicable only for WooCommerce "Custom Template".', 'mrblack-pro'),
                            )
                        )
                    );

                    $social_follow = array (
                        'delicious'   => esc_html__('Delicious', 'mrblack-pro'),
                        'deviantart'  => esc_html__('Deviantart', 'mrblack-pro'),
                        'digg'        => esc_html__('Digg', 'mrblack-pro'),
                        'dribbble'    => esc_html__('Dribbble', 'mrblack-pro'),
                        'envelope'    => esc_html__('Envelope', 'mrblack-pro'),
                        'facebook'    => esc_html__('Facebook', 'mrblack-pro'),
                        'flickr'      => esc_html__('Flickr', 'mrblack-pro'),
                        'google-plus' => esc_html__('Google Plus', 'mrblack-pro'),
                        'instagram'   => esc_html__('Instagram', 'mrblack-pro'),
                        'lastfm'      => esc_html__('Lastfm', 'mrblack-pro'),
                        'linkedin'    => esc_html__('Linkedin', 'mrblack-pro'),
                        'myspace'     => esc_html__('Myspace', 'mrblack-pro'),
                        'pinterest'   => esc_html__('Pinterest', 'mrblack-pro'),
                        'reddit'      => esc_html__('Reddit', 'mrblack-pro'),
                        'rss'         => esc_html__('RSS', 'mrblack-pro'),
                        'skype'       => esc_html__('Skype', 'mrblack-pro'),
                        'stumbleupon' => esc_html__('Stumbleupon', 'mrblack-pro'),
                        'tumblr'      => esc_html__('Tumblr', 'mrblack-pro'),
                        'twitter'     => esc_html__('Twitter', 'mrblack-pro'),
                        'viadeo'      => esc_html__('Viadeo', 'mrblack-pro'),
                        'vimeo'       => esc_html__('Vimeo', 'mrblack-pro'),
                        'yahoo'       => esc_html__('Yahoo', 'mrblack-pro'),
                        'youtube'     => esc_html__('Youtube', 'mrblack-pro')
                    );

                    foreach($social_follow as $socialfollow_key => $socialfollow) {

                        $wp_customize->add_setting(
                            MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-follow-'.$socialfollow_key.']', array(
                                'type' => 'option'
                            )
                        );

                        $wp_customize->add_control(
                            new MrBlack_Customize_Control_Switch(
                                $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-show-follow-'.$socialfollow_key.']', array(
                                    'type'    => 'wdt-switch',
                                    'label'   => sprintf(esc_html__('Show %1$s Follow', 'mrblack-pro'), $socialfollow),
                                    'section' => 'woocommerce-single-page-sociable-follow-section',
                                    'choices' => array(
                                        'on'  => esc_attr__( 'Yes', 'mrblack-pro' ),
                                        'off' => esc_attr__( 'No', 'mrblack-pro' )
                                    )
                                )
                            )
                        );

                        $wp_customize->add_setting(
                            MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-follow-'.$socialfollow_key.'-link]', array(
                                'type' => 'option'
                            )
                        );

                        $wp_customize->add_control(
                            new MrBlack_Customize_Control(
                                $wp_customize, MRBLACK_CUSTOMISER_VAL . '[wdt-single-product-follow-'.$socialfollow_key.'-link]', array(
                                    'type'       => 'text',
                                    'section'    => 'woocommerce-single-page-sociable-follow-section',
                                    'input_attrs' => array(
                                        'placeholder' => sprintf(esc_html__('%1$s Link', 'mrblack-pro'), $socialfollow)
                                    ),
                                    'dependency' => array ( 'wdt-single-product-show-follow-'.$socialfollow_key, '==', '1' )
                                )
                            )
                        );

                    }

        }

    }

}


if( !function_exists('mrblack_shop_customizer_single_social_share_and_follow') ) {
	function mrblack_shop_customizer_single_social_share_and_follow() {
		return MrBlack_Shop_Customizer_Single_Social_Share_And_Follow::instance();
	}
}

mrblack_shop_customizer_single_social_share_and_follow();