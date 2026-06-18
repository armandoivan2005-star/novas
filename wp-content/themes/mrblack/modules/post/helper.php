<?php

if( !function_exists('mrblack_single_post_params_default') ) {
    function mrblack_single_post_params_default() {
        $params = array(
            'enable_title'   		 => 0,
            'enable_image_lightbox'  => 0,
            'enable_disqus_comments' => 0,
            'post_disqus_shortname'  => '',
            'post_dynamic_elements'  => array( 'content', 'author_bio', 'navigation', 'comment_box' ),
            'post_commentlist_style' => 'rounded',
            'select_post_navigation' => 'type1',
        );

        return $params;
    }
}

if( !function_exists('mrblack_single_post_misc_default') ) {
    function mrblack_single_post_misc_default() {
        $params = array(
            'enable_related_article'=> 0,
            'rposts_title'   		=> esc_html__('Related Posts', 'mrblack'),
            'rposts_column'         => 'one-third-column',
            'rposts_count'          => 3,
            'rposts_excerpt'        => 0,
            'rposts_excerpt_length' => 25,
            'rposts_carousel'       => 0,
            'rposts_carousel_nav'   => ''
        );

        return $params;
    }
}

if( !function_exists('mrblack_single_post_params') ) {
    function mrblack_single_post_params() {
        $params = mrblack_single_post_params_default();
        return apply_filters( 'mrblack_single_post_params', $params );
    }
}

add_action( 'mrblack_after_main_css', 'post_style' );
function post_style() {
    if( is_singular('post') || is_attachment() ) {
        wp_enqueue_style( 'mrblack-post', get_theme_file_uri('/modules/post/assets/css/post.css'), false, MRBLACK_THEME_VERSION, 'all');

        $post_style = mrblack_get_single_post_style( get_the_ID() );
        if ( file_exists( get_theme_file_path('/modules/post/templates/'.$post_style.'/assets/css/post-'.$post_style.'.css') ) ) {
            wp_enqueue_style( 'mrblack-post-'.$post_style, get_theme_file_uri('/modules/post/templates/'.$post_style.'/assets/css/post-'.$post_style.'.css'), false, MRBLACK_THEME_VERSION, 'all');
        }
    }
}

if( !function_exists('mrblack_get_single_post_style') ) {
	function mrblack_get_single_post_style( $post_id ) {
		return apply_filters( 'mrblack_single_post_style', 'minimal', $post_id );
	}
}

if( !function_exists('mrblack_breadcrumb_template_part') ) {
    function mrblack_breadcrumb_template_part($args, $post_id) {
        $post_style = mrblack_get_single_post_style( get_the_ID() );
        if(is_single($post_id) && $post_style == 'simple') {
           return;
        } else{
            echo mrblack_html_output($args);
        }
    }
    add_filter( 'mrblack_breadcrumb_get_template_part', 'mrblack_breadcrumb_template_part', 10, 2 );
}

if( ! function_exists( 'mrblack_breadcrumb_header_wrapper_classes' )  ) {
	function mrblack_breadcrumb_header_wrapper_classes($classes) {
        $post_id = get_the_ID();
        $post_style = mrblack_get_single_post_style( $post_id );
        if(is_single($post_id) && $post_style == 'simple') {
            array_push($classes, 'wdt-no-breadcrumb');
        }
        return $classes;
	}
	add_filter( 'mrblack_header_wrapper_classes', 'mrblack_breadcrumb_header_wrapper_classes', 10, 1 );
}

add_action( 'mrblack_after_main_css', 'mrblack_single_post_enqueue_css' );
if( !function_exists( 'mrblack_single_post_enqueue_css' ) ) {
    function mrblack_single_post_enqueue_css() {

        wp_enqueue_style( 'mrblack-magnific-popup', get_theme_file_uri('/modules/post/assets/css/magnific-popup.css'), false, MRBLACK_THEME_VERSION, 'all');
    }
}

add_action( 'mrblack_before_enqueue_js', 'mrblack_single_post_enqueue_js' );
if( !function_exists( 'mrblack_single_post_enqueue_js' ) ) {
    function mrblack_single_post_enqueue_js() {

        wp_enqueue_script('jquery-magnific-popup', get_theme_file_uri('/modules/post/assets/js/jquery.magnific-popup.js'), array(), false, true);
    }
}

add_filter('post_class', 'mrblack_single_set_post_class', 10, 3);
if( !function_exists('mrblack_single_set_post_class') ) {
    function mrblack_single_set_post_class( $classes, $class, $post_id ) {

        if( is_singular('post') || is_attachment() ) {
        	$classes[] = 'blog-single-entry';
        	$classes[] = 'post-'.mrblack_get_single_post_style( $post_id );
        }

        return $classes;
    }
}


// Add custom placeholders to the comment form fields
add_filter( 'comment_form_default_fields', 'mrblack_custom_placeholder_comment_fields' );
function mrblack_custom_placeholder_comment_fields( $fields ) {
    
    $required = get_option( 'require_name_email' ) ? 'required="required"' : '';
    
    $fields['author'] = '<p class="comment-form-author">
        <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ?? '' ) . '" 
        size="30" maxlength="245" ' . $required . ' placeholder="Name *" />
    </p>';
    
    $fields['email'] = '<p class="comment-form-email">
        <input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ?? '' ) . '" 
        size="30" maxlength="100" ' . $required . ' placeholder="Email *" />
    </p>';
    
    $fields['url'] = '<p class="comment-form-url">
        <input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ?? '' ) . '" 
        size="30" maxlength="200" placeholder="Website" />
    </p>';

    return $fields;
}

// Add a custom placeholder to the comment textarea field
add_filter( 'comment_form_defaults', 'mrblack_custom_placeholder_comment_textarea' );
function mrblack_custom_placeholder_comment_textarea( $fields ) {
    $required = get_option( 'require_name_email' ) ? 'required="required"' : '';
    
    $fields['comment_field'] = '<p class="comment-form-comment">
        <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" ' . $required . ' 
        placeholder="Comment *"></textarea>
    </p>';

    return $fields;
}