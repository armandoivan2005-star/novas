<?php
    if( isset( $enable_404message ) && ( $enable_404message == 1 || $enable_404message == true )  ) {
        $class = $notfound_style;
        $class .= ( isset( $notfound_darkbg ) && ( $notfound_darkbg == 1 ) ) ? " wdt-dark-bg" :"";
    ?>
    <div class="wrapper <?php echo esc_attr( $class );?>">
        <div class="container">
            <div class="center-content-wrapper">
                <div class="center-content">
                    <div class="error-box square">
                    <img class="normal_logo" alt="<?php esc_html__("404 error", 'mrblack'); ?>" src="<?php echo esc_url(MRBLACK_ROOT_URI.'/assets/images/404_error.png'); ?>"/>
                        <div class="error-box-inner">
                            <h2><?php esc_html_e("Opps !", 'mrblack'); ?></h2>
                            <h3><?php esc_html_e("The Page Not Found.", 'mrblack'); ?></h3>
                        </div>
                    </div>
                    <div class="wdt-hr-invisible-xsmall"></div>
                    <p><?php esc_html_e("Proin non eros elementum, sagittis diam at, feugiat nunc. Ut velit arcu, posuere at neque quis, vestibulum vehicula dui. Praesent at felis ante. Cras sed ultricies risus. Nullam porta fermentum egestas.", 'mrblack'); ?></p>
                    <div class="wdt-hr-invisible-xsmall"></div>
                    <a class="wdt-button filled small" target="_self" href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e("Back to Home",'mrblack');?></a>
                </div>
            </div>
        </div>
    </div><?php
}?>