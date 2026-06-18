<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (! class_exists ( 'MrBlackPlusFooterPostType' ) ) {

	class MrBlackPlusFooterPostType {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

		function __construct() {

			add_action ( 'init', array( $this, 'mrblack_register_cpt' ) );
			add_filter ( 'template_include', array ( $this, 'mrblack_template_include' ) );
		}

		function mrblack_register_cpt() {

			$labels = array (
				'name'				 => __( 'Footers', 'mrblack-plus' ),
				'singular_name'		 => __( 'Footer', 'mrblack-plus' ),
				'menu_name'			 => __( 'Footers', 'mrblack-plus' ),
				'add_new'			 => __( 'Add Footer', 'mrblack-plus' ),
				'add_new_item'		 => __( 'Add New Footer', 'mrblack-plus' ),
				'edit'				 => __( 'Edit Footer', 'mrblack-plus' ),
				'edit_item'			 => __( 'Edit Footer', 'mrblack-plus' ),
				'new_item'			 => __( 'New Footer', 'mrblack-plus' ),
				'view'				 => __( 'View Footer', 'mrblack-plus' ),
				'view_item' 		 => __( 'View Footer', 'mrblack-plus' ),
				'search_items' 		 => __( 'Search Footers', 'mrblack-plus' ),
				'not_found' 		 => __( 'No Footers found', 'mrblack-plus' ),
				'not_found_in_trash' => __( 'No Footers found in Trash', 'mrblack-plus' ),
			);

			$args = array (
				'labels' 				=> $labels,
				'public' 				=> true,
				'exclude_from_search'	=> true,
				'show_in_nav_menus' 	=> false,
				'show_in_rest' 			=> true,
				'menu_position'			=> 26,
				'menu_icon' 			=> 'dashicons-editor-insertmore',
				'hierarchical' 			=> false,
				'supports' 				=> array ( 'title', 'editor', 'revisions' ),
			);

			register_post_type ( 'wdt_footers', $args );
		}

		function mrblack_template_include($template) {
			if ( is_singular( 'wdt_footers' ) ) {
				if ( ! file_exists ( get_stylesheet_directory () . '/single-wdt_footers.php' ) ) {
					$template = MRBLACK_PLUS_DIR_PATH . 'post-types/templates/single-wdt_footers.php';
				}
			}

			return $template;
		}
	}
}

MrBlackPlusFooterPostType::instance();