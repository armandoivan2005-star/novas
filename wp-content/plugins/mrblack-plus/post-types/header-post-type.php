<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (! class_exists ( 'MrBlackPlusHeaderPostType' ) ) {

	class MrBlackPlusHeaderPostType {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

		function __construct() {

			add_action ( 'init', array( $this, 'mrblack_register_cpt' ), 5 );
			add_filter ( 'template_include', array ( $this, 'mrblack_template_include' ) );
		}

		function mrblack_register_cpt() {

			$labels = array (
				'name'				 => __( 'Headers', 'mrblack-plus' ),
				'singular_name'		 => __( 'Header', 'mrblack-plus' ),
				'menu_name'			 => __( 'Headers', 'mrblack-plus' ),
				'add_new'			 => __( 'Add Header', 'mrblack-plus' ),
				'add_new_item'		 => __( 'Add New Header', 'mrblack-plus' ),
				'edit'				 => __( 'Edit Header', 'mrblack-plus' ),
				'edit_item'			 => __( 'Edit Header', 'mrblack-plus' ),
				'new_item'			 => __( 'New Header', 'mrblack-plus' ),
				'view'				 => __( 'View Header', 'mrblack-plus' ),
				'view_item' 		 => __( 'View Header', 'mrblack-plus' ),
				'search_items' 		 => __( 'Search Headers', 'mrblack-plus' ),
				'not_found' 		 => __( 'No Headers found', 'mrblack-plus' ),
				'not_found_in_trash' => __( 'No Headers found in Trash', 'mrblack-plus' ),
			);

			$args = array (
				'labels' 				=> $labels,
				'public' 				=> true,
				'exclude_from_search'	=> true,
				'show_in_nav_menus' 	=> false,
				'show_in_rest' 			=> true,
				'menu_position'			=> 25,
				'menu_icon' 			=> 'dashicons-heading',
				'hierarchical' 			=> false,
				'supports' 				=> array ( 'title', 'editor', 'revisions' ),
			);

			register_post_type ( 'wdt_headers', $args );
		}

		function mrblack_template_include($template) {
			if ( is_singular( 'wdt_headers' ) ) {
				if ( ! file_exists ( get_stylesheet_directory () . '/single-wdt_headers.php' ) ) {
					$template = MRBLACK_PLUS_DIR_PATH . 'post-types/templates/single-wdt_headers.php';
				}
			}

			return $template;
		}
	}
}

MrBlackPlusHeaderPostType::instance();