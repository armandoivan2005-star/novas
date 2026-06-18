(function ($) {

  const wdtImageBoxWidgetHandler = function($scope) {
    const instance = new wdtImageBoxWidgetHandlerInit($scope);
    if($scope.find('.wdt-image-box-holder').data('settings')) {
      const settings = $scope.find('.wdt-image-box-holder').data('settings');
     
      if(settings['enable_popup']) {
        instance.init();
      }
   
      if(settings['enable_hover_class']) {
        instance.hover_active_class();
      }

      if(settings['enable_class_on_click'] == 'yes' ) {
        instance.clickon_active_class();
      }

      instance.showcaseItemfun();
      instance.contentgrpheight();
      instance.imagecontentheight();

    }
  };

  const wdtImageBoxWidgetHandlerInit = function($scope) {

    const $self = this;
    $self.init = function() {

      const $image_box_content_repeater = $scope.find('.wdt-content-image-wrapper');
      $image_box_content_repeater.each(function() {
  
        const $this_image_box = $(this);
        const $image_url = $this_image_box.find('img').attr('src');
        $self.onClickInit($this_image_box, $image_url);

      });

    };

    $self.onClickInit = function($this_image_box, $image_url) {

      $this_image_box.magnificPopup({
        items: {
          src: $image_url,
          type: 'image',
        },
        removalDelay: 500,
        showCloseBtn: true,
        enableEscapeKey: true,
        closeOnBgClick: true,
        mainClass: 'wdt-image-box-popup wdt-popup-box-window',
      });

    };

    $self.hover_active_class = function(){

      var $get_scope_name = $scope.find('.wdt-image-box-holder' ).hasClass( '.wdt-carousel-holder');

      var $hover_on_item = $scope.find('.wdt-image-box-holder');
      var $default_value = $hover_on_item.find('.wdt-default-template').length > 0;

      if( $get_scope_name ) {
      
        var image_box_wdt_swiper = $scope.find('.wdt-image-box-holder .wdt-image-box-container .wdt-image-box-wrapper .swiper-slide');

        $scope.find('.wdt-image-box-holder .wdt-image-box-container .wdt-image-box-wrapper .swiper-slide:first-child').addClass('wdt-active');
        image_box_wdt_swiper.mouseover( function() {
          if( !($(this).hasClass('wdt-active')) ) {
            $scope.find('.wdt-image-box-holder .wdt-image-box-container .wdt-image-box-wrapper .swiper-slide').removeClass('wdt-active');
            $(this).addClass('wdt-active');
          }
        });

      } else if( $default_value ){

        var image_box_wdt_default = $scope.find('.wdt-image-box-holder .wdt-default-template');

        image_box_wdt_default.first().addClass('wdt-active'); 

        image_box_wdt_default.on('mouseenter', function() {
            if (!$(this).hasClass('wdt-active')) {
                image_box_wdt_default.removeClass('wdt-active'); 
                $(this).addClass('wdt-active'); 
            }
        });

      } else {

        var image_box_wdt_column = $scope.find('.wdt-image-box-holder .wdt-column-wrapper .wdt-column');

        $scope.find('.wdt-image-box-holder .wdt-column-wrapper .wdt-column:first-child').addClass('wdt-active');
        
        image_box_wdt_column.mouseover( function() {
          if( !($(this).hasClass('wdt-active')) ) {
            $scope.find('.wdt-image-box-holder .wdt-column-wrapper .wdt-column').removeClass('wdt-active');
            $(this).addClass('wdt-active');
          }
        } );

      }      

    };


    $self.showcaseItemfun = function(){
      const $showcaseItem = $scope.find('.wdt-image-box-holder');
      $showcaseItem.find('.wdt-content-description').each(function() {
          const contentHeight = $(this).outerHeight();
          $(this)[0].style.setProperty('--desc_height', `${contentHeight}px`);
      });
    };

    $self.contentgrpheight = function(){
      const $contentgrp = $scope.find('.wdt-content-detail-group');
      $contentgrp.find('.wdt-content-group').each(function() { 
          const contengroupheight = $(this).outerHeight();
          $(this)[0].style.setProperty('--desc_height', `${contengroupheight}px`);
      });
    };

    $self.imagecontentheight = function() {
      $('.wdt-content-image-wrapper').each(function() { 
          const $image = $(this).find('.wdt-content-image img');
            if ($image.length) {
                $image.on('load', () => {
                    const imgcontengroupheight = $image.outerHeight();
                    $image.closest('.wdt-content-image')[0].style.setProperty('--desc_height', `${imgcontengroupheight}px`);
                }).each(function() {
                    if (this.complete) $(this).trigger('load');
                });
            }
        });
    };
  
  
  
    $self.clickon_active_class = function(){
      var $get_scope_name = $scope.find('.wdt-image-box-holder').hasClass('wdt-carousel-holder');
      if( $get_scope_name ) {
        var image_box_wdt_swiper = $scope.find('.wdt-image-box-holder .wdt-image-box-container .wdt-image-box-wrapper .swiper-slide');
        $scope.find('.wdt-image-box-holder .wdt-image-box-container .wdt-image-box-wrapper .swiper-slide:first-child').addClass('wdt-active');
        image_box_wdt_swiper.click( function() {
          if( !($(this).hasClass('wdt-active')) ) {
            $scope.find('.wdt-image-box-holder .wdt-image-box-container .wdt-image-box-wrapper .swiper-slide').removeClass('wdt-active');
            $(this).addClass('wdt-active');
          }
        });

      } else {

        var image_box_wdt_column = $scope.find('.wdt-image-box-holder .wdt-column-wrapper .wdt-column');      
        $scope.find('.wdt-image-box-holder .wdt-column-wrapper .wdt-column:first-child').addClass('wdt-active');
        image_box_wdt_column.click(function() {
            if (!$(this).hasClass('wdt-active')) {
                $scope.find('.wdt-image-box-holder .wdt-column-wrapper .wdt-column').removeClass('wdt-active');
                $(this).addClass('wdt-active');
            
            }
        }); 
      
      }
    };



  };

  $(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/wdt-image-box.default', wdtImageBoxWidgetHandler);
  });

})(jQuery);
