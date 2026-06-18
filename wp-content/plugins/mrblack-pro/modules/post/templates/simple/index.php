<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'MrBlackProPostSimple' ) ) {
    class MrBlackProPostSimple {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {
            add_filter( 'mrblack_post_styles', array( $this, 'add_post_styles_option' ) );
            add_action( 'mrblack_hook_container_before', array( $this, 'add_post_hook_container_before' ) );
        }

        function add_post_styles_option( $options ) {
            $options['simple'] = esc_html__('Simple', 'mrblack-pro');
            return $options;
        }

        function add_post_hook_container_before() {

            if(is_singular('post')) {

                $post_id = get_the_ID();
                $post_style = mrblack_get_single_post_style( $post_id );

                if($post_style != 'simple') {
                    return;
                }

                $template_args['post_ID'] = $post_id;
                $template_args['post_Style'] = $post_style;
                $template_args = array_merge( $template_args, mrblack_single_post_params() );

                ob_start();
                echo '<div class="post-simple post-header">';
                    mrblack_template_part( 'post', 'templates/simple/parts/date', '', $template_args );
                    if( $template_args['enable_title'] ) :
                        mrblack_template_part( 'post', 'templates/post-extra/title', '', $template_args );
                    endif;
                    mrblack_template_part( 'post', 'templates/simple/parts/category', '', $template_args );
                echo '</div>';
                echo ob_get_clean();

            }

        }

    }
}

MrBlackProPostSimple::instance();