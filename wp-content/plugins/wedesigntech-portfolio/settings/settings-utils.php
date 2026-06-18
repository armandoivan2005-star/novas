<?php

// Save General Options
add_action( 'wp_ajax_wdt_save_options_settings', 'wdt_save_options_settings' );
function wdt_save_options_settings() {
    // Verify nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'wdt_settings_nonce' ) ) {
        wp_send_json_error( __( 'Security check failed.', 'wdt-portfolio' ) );
    }
    // Check user capability
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( __( 'Unauthorized request.', 'wdt-portfolio' ) );
    }
    // Validate input
    if ( empty( $_POST['settings'] ) || empty( $_POST['wdt'] ) ) {
        wp_send_json_error( __( 'Invalid request data.', 'wdt-portfolio' ) );
    }
    $settings_key = sanitize_key( wp_unslash( $_POST['settings'] ) );
    $wdt_settings = get_option( 'wdt-settings', array() );
    if ( isset( $_POST['wdt'][ $settings_key ] ) ) {
        $value = sanitize_text_field( wp_unslash( $_POST['wdt'][ $settings_key ] ) );
        $wdt_settings[ $settings_key ] = $value;
        $wdt_settings['plugin-status'] = 'activated';
        if ( update_option( 'wdt-settings', $wdt_settings ) ) {
            wp_send_json_success( __( 'Options have been updated successfully!', 'wdt-portfolio' ) );
        } else {
            wp_send_json_success( __( 'No changes done!', 'wdt-portfolio' ) );
        }
    } else {
        wp_send_json_error( __( 'Invalid settings key.', 'wdt-portfolio' ) );
    }
    wp_die();
}

// Save Skin Settings
add_action( 'wp_ajax_wdt_save_skin_settings', 'wdt_save_skin_settings' );
function wdt_save_skin_settings() {
    // Verify nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'wdt_settings_nonce' ) ) {
        wp_send_json_error( __( 'Security check failed.', 'wdt-portfolio' ) );
    }
    // Check capability
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( __( 'Unauthorized request.', 'wdt-portfolio' ) );
    }
    // Validate input
    if ( ! isset( $_POST['wdt-skin-settings'] ) || ! is_array( $_POST['wdt-skin-settings'] ) ) {
        wp_send_json_error( __( 'Invalid data received.', 'wdt-portfolio' ) );
    }
    // Sanitize settings
    $skin_settings = array_map(
        'sanitize_text_field',
        wp_unslash( $_POST['wdt-skin-settings'] )
    );
    update_option( 'wdt-skin-settings', $skin_settings );
    wp_send_json_success(
        __( '"Skin" settings have been updated successfully!', 'wdt-portfolio' )
    );
}

// Listing Label
if(!function_exists('wdt_get_listing_label')) {
	function wdt_get_listing_label($label_type) {

	    if($label_type == 'singular') {
	    	$label = wdt_option('label', 'listing-singular-label');
	    }

	    if($label_type == 'plural') {
	    	$label = wdt_option('label', 'listing-plural-label');
	    }


	    return $label;

	}
	add_filter( 'listing_label', 'wdt_get_listing_label', 10, 1 );
}

// Amenity Label
if(!function_exists('wdt_get_amenity_label')) {
	function wdt_get_amenity_label($label_type) {

	    if($label_type == 'singular') {
	    	$label = wdt_option('label','amenity-singular-label');
	    }

	    if($label_type == 'plural') {
	    	$label = wdt_option('label','amenity-plural-label');
	    }

	    return $label;

	}
	add_filter( 'amenity_label', 'wdt_get_amenity_label', 10, 1 );
}


?>