(function ($) {

    const wdtTestimonialWidgetHandler = function ($scope) {
        const $testimonialHolder = $scope.find('.wdt-advance-testimonial-swiper-holder');
        
        if (!$testimonialHolder.length) {
            console.warn('No testimonial swiper holder found.');
            return;
        }

        const settings = JSON.parse($testimonialHolder.attr('data-settings') || '{}');
        const { carousel_settings, breakpoints} = settings;

        const allowTouch = carousel_settings?.allow_touch === 'yes';
        const arrows = carousel_settings?.arrows === 'yes';
        const centeredSlides = carousel_settings?.centered_slides === 'yes';
        const effect = carousel_settings?.effect || 'fade';
        const gap = parseInt(carousel_settings?.gap || 30, 10);
        const loop = carousel_settings?.loop === 'yes';
        const slidesonOddswiper = parseInt(carousel_settings?.slides_to_show || 1, 10);
        const slidesonEvenswiper = parseInt(carousel_settings?.slides_to_even_show || 3, 10);
        const transitionDuration = parseInt(carousel_settings?.speed || 300, 10);

        const validatedBreakpoints = breakpoints && typeof breakpoints === 'object' ? breakpoints : {};

        const sliderOne = new Swiper($testimonialHolder.find('.slider-odd')[0], {
            slidesPerView: slidesonOddswiper,
            effect: effect,
            centeredSlides: centeredSlides,
            speed: transitionDuration,
            allowTouchMove: allowTouch,
            breakpoints: validatedBreakpoints,
        });
        
        const sliderTwo = new Swiper($testimonialHolder.find('.slider-even')[0], {
            slidesPerView: slidesonOddswiper,
            centeredSlides: centeredSlides,
            loop: loop,
            navigation: arrows ? {
                nextEl: $testimonialHolder.find('.swiper-next-button-even')[0],
                prevEl: $testimonialHolder.find('.swiper-prev-button-even')[0],
            } : false,
            spaceBetween: gap,
            speed: transitionDuration,
            allowTouchMove: allowTouch,
            breakpoints: validatedBreakpoints,
        });

        sliderOne.on('slideChange', () => {
            const realIndex = sliderOne.realIndex;
            sliderTwo.slideTo(realIndex); 
        });
    
        sliderTwo.on('slideChange', () => {
            const realIndex = sliderTwo.realIndex;
            sliderOne.slideTo(realIndex);
        });

    };
 

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/wdt-advanced-testimonial.default', wdtTestimonialWidgetHandler);
    });

})(jQuery);