<?php
	$template_args['post_ID'] = $ID;
	$template_args['post_Style'] = $Post_Style;
	$template_args = array_merge( $template_args, mrblack_single_post_params() ); ?>

	<!-- Post Header -->
	<div class="post-header">

		<?php //mrblack_template_part( 'post', 'templates/'.$Post_Style.'/parts/category', '', $template_args ); ?>
	   	<?php if( $template_args['enable_title'] ) : ?>
		        <?php mrblack_template_part( 'post', 'templates/'.$Post_Style.'/parts/title', '', $template_args ); ?>
		<?php endif; ?>
        <?php //mrblack_template_part( 'post', 'templates/'.$Post_Style.'/parts/date', '', $template_args ); ?>

	</div><!-- Post Header -->

    <?php mrblack_template_part( 'post', 'templates/'.$Post_Style.'/parts/image', '', $template_args ); ?>

    <!-- Post Meta -->
    <div class="post-meta">

    	<!-- Meta Left -->
    	<div class="meta-left">
		<?php mrblack_template_part( 'post', 'templates/'.$Post_Style.'/parts/date', '', $template_args ); ?>
    	</div><!-- Meta Left -->
    	<!-- Meta Right -->
    	<div class="meta-right">
			<?php mrblack_template_part( 'post', 'templates/'.$Post_Style.'/parts/author', '', $template_args ); ?>
			<?php mrblack_template_part( 'post', 'templates/'.$Post_Style.'/parts/comment', '', $template_args ); ?>
    	</div><!-- Meta Right -->

    </div><!-- Post Meta -->

    <!-- Post Dynamic -->
    <?php echo apply_filters( 'mrblack_single_post_dynamic_template_part', mrblack_get_template_part( 'post', 'templates/'.$Post_Style.'/parts/dynamic', '', $template_args ) ); ?><!-- Post Dynamic -->