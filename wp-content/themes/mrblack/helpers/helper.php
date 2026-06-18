<?php
if ( ! function_exists( 'mrblack_template_part' ) ) {
	/**
	 * Function that echo module template part.
	 */
	function mrblack_template_part( $module, $template, $slug = '', $params = array() ) {
		echo mrblack_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'mrblack_get_template_part' ) ) {
	/**
	 * Function that load module template part.
	 */
	function mrblack_get_template_part( $module, $template, $slug = '', $params = array() ) {
        $file_path = '';
        $html      = '';
        $template_path = MRBLACK_MODULE_DIR . '/' . $module;
        $temp_path = $template_path . '/' . $template;
        if ( ! empty( $temp_path ) ) {
            if ( ! empty( $slug ) ) {
                $file_path = "{$temp_path}-{$slug}.php";
                if ( ! file_exists( $file_path ) ) {
                    $file_path = $temp_path . '.php';
                }
            } else {
                $file_path = $temp_path . '.php';
            }
        }
        $file_path = apply_filters( 'mrblack_get_template_plugin_part', $file_path, $module, $template, $slug );
        if ( $file_path && file_exists( $file_path ) ) {
            ob_start();
            if ( is_array( $params ) && count( $params ) ) {
                extract( $params, EXTR_SKIP );
            }
            include $file_path;
            $html = ob_get_clean();
        }
        return $html;
    }
}

if ( ! function_exists( 'mrblack_get_page_id' ) ) {
	function mrblack_get_page_id() {

		$page_id = get_queried_object_id();

		if( is_archive() || is_search() || is_404() || ( is_front_page() && is_home() ) ) {
			$page_id = -1;
		}

		return $page_id;
	}
}

/* Convert hexdec color string to rgb(a) string */
if ( ! function_exists( 'mrblack_hex2rgba' ) ) {
	function mrblack_hex2rgba($color, $opacity = false) {

		$default = 'rgb(0,0,0)';

		if(empty($color)) {
			return $default;
		}

		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		if (strlen($color) == 6) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
				return $default;
		}

		$rgb =  array_map('hexdec', $hex);

		if($opacity){
			if(abs($opacity) > 1) {
				$opacity = 1.0;
			}
			$output = implode(",",$rgb).','.$opacity;
		} else {
			$output = implode(",",$rgb);
		}

		return $output;

	}
}

if ( ! function_exists( 'mrblack_html_output' ) ) {
	function mrblack_html_output( $html ) {
		return apply_filters( 'mrblack_html_output', $html );
	}
}


if ( ! function_exists( 'mrblack_theme_defaults' ) ) {
	/**
	 * Function to load default values
	 */
	function mrblack_theme_defaults() {

		$defaults = array (
			'primary_color' => '#dd4242',
			'primary_color_rgb' => mrblack_hex2rgba('#dd4242', false),
			'secondary_color' => '#f1f1f1',
			'secondary_color_rgb' => mrblack_hex2rgba('#f1f1f1', false),
			'tertiary_color' => '#292929',
			'tertiary_color_rgb' => mrblack_hex2rgba('#292929', false),
			'body_bg_color' => '#171717',
			'body_bg_color_rgb' => mrblack_hex2rgba('#171717', false),
			'body_text_color' => '#d1d1d1',
			'body_text_color_rgb' => mrblack_hex2rgba('#d1d1d1', false),
			'headalt_color' => '#f1f1f1',
			'headalt_color_rgb' => mrblack_hex2rgba('#f1f1f1', false),
			'link_color' => '#f1f1f1',
			'link_color_rgb' => mrblack_hex2rgba('#f1f1f1', false),
			'link_hover_color' => '#dd4242',
			'link_hover_color_rgb' => mrblack_hex2rgba('#dd4242', false),
			'border_color' => '#696969',
			'border_color_rgb' => mrblack_hex2rgba('#696969', false),
			'accent_text_color' => '#000000',
			'accent_text_color_rgb' => mrblack_hex2rgba('#000000', false),

			'body_typo' => array (
				'font-family' => "Poppins",
				'font-fallback' => '"Poppins", sans-serif',
				'font-weight' => 400,
				'fs-desktop' => 16,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.875,
				'lh-desktop-unit' => ''
			),
			'h1_typo' => array (
				'font-family' => "Syne",
				'font-fallback' => '"Syne", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 68,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.25,
				'lh-desktop-unit' => ''
			),
			'h2_typo' => array (
				'font-family' => "Syne",
				'font-fallback' => '"Syne", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 46,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.25,
				'lh-desktop-unit' => ''
			),
			'h3_typo' => array (
				'font-family' => "Syne",
				'font-fallback' => '"Syne", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 36,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.25,
				'lh-desktop-unit' => ''
			),
			'h4_typo' => array (
				'font-family' => "Syne",
				'font-fallback' => '"Syne", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 24,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.25,
				'lh-desktop-unit' => ''
			),
			'h5_typo' => array (
				'font-family' => "Syne",
				'font-fallback' => '"Syne", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 20,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.25,
				'lh-desktop-unit' => ''
			),
			'h6_typo' => array (
				'font-family' => "Syne",
				'font-fallback' => '"Syne", sans-serif',
				'font-weight' => 600,
				'fs-desktop' => 18,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.25,
				'lh-desktop-unit' => ''
			),
			'extra_typo' => array (
				'font-family' => "Dancing Script",
				'font-fallback' => '"Dancing Script", sans-serif',
				'font-weight' => 500,
				'fs-desktop' => 14,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.1,
				'lh-desktop-unit' => ''
			),

		);

		return $defaults;

	}
}