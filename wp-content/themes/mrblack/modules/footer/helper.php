<?php
add_action( 'mrblack_after_main_css', 'footer_style' );
function footer_style() {
    wp_enqueue_style( 'mrblack-footer', get_theme_file_uri('/modules/footer/assets/css/footer.css'), false, MRBLACK_THEME_VERSION, 'all');
}

add_action( 'mrblack_footer', 'footer_content' );
function footer_content() {
    mrblack_template_part( 'content', 'content', 'footer' );
}