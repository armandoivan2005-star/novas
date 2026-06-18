<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php
	$template_args['post_ID'] = $ID;
	$template_args['post_Style'] = $Post_Style;
	$template_args = array_merge( $template_args, mrblack_archive_blog_post_params() );
	$post_page='all-post-content';
	$path = mrblack_get_template_part( 'blog', 'templates/'.$Post_Style.'/parts/'.$post_page, '', $template_args );
	echo mrblack_html_output($path);
	do_action( 'mrblack_blog_post_entry_details_close_wrap' );