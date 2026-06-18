(function ($) {
  "use strict";

  var wdtRotateImageWidgetHandler = function($scope, $) {

    let $settings = $scope.find('.wdt-rotate-image-container').data('settings');
    let $rotation_direction = $settings['rotation_side'] ? $settings['rotation_side'] : 'anti-clock';

    let $image = $scope.find('.wdt-rotate-image img');
    const rotateLinks = $scope.find('.wdt-rotate-link');

    let lastKnownScrollPosition = 0;
    let ticking = false;

    const rotateImageOnScroll = function () {
      if ($image.length) {
        let rotation = $rotation_direction === 'anti-clock' ? -lastKnownScrollPosition : lastKnownScrollPosition;
        $image.css("transform", "rotate(" + rotation + "deg)");
      }
    };

    window.addEventListener('scroll', function () {
      lastKnownScrollPosition = window.scrollY;
      if (!ticking) {
        window.requestAnimationFrame(function () {
          rotateImageOnScroll();
          ticking = false;
        });
        ticking = true;
      }
    });

    rotateLinks.each(function () {
      $(this).on('click', function (event) {
        event.preventDefault();
        const target = $(this).attr('href');
        if (target && target.startsWith('#')) {
          
          const $targetElement = $(target);
          if ($targetElement.length) {
            $('html, body').animate({
              scrollTop: $targetElement.offset().top
            }, 100, 'swing');
          }
        }
      });
    });
    
  };

  $(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/wdt-rotate-image.default', wdtRotateImageWidgetHandler);
  });

})(jQuery);
