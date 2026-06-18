<?php

if( ! function_exists('mrblack_event_breadcrumb_title') ) {
    function mrblack_event_breadcrumb_title($title) {
        if( get_post_type() == 'tribe_events' && is_single()) {
            $etitle = esc_html__( 'Event Detail', 'mrblack' );
            return '<h1>'.$etitle.'</h1>';
        } else {
            return $title;
        }
    }

    add_filter( 'mrblack_breadcrumb_title', 'mrblack_event_breadcrumb_title', 20, 1 );
}

?>