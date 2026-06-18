(function ($) {
    var wdtShopProductSingleRelatedImagesCarousel = function ($scope, $) {
        $scope.find('.wdt-product-related-products').each(function () {
            var $swiperItem = $(this);
            const $layout = $swiperItem.data('layout');

            if ($layout === "carousel") {
                const $ulElement = $swiperItem.find("ul");
                $ulElement.addClass('swiper-container');
                $ulElement.find("li").addClass('swiper-slide');
                if (!$ulElement.find('.swiper-wrapper').length) {
                    $ulElement.wrapInner('<div class="swiper-wrapper" />');
                }
            }

            const $productcarouselslidesperview = $swiperItem.data('carouselslidesperview') || 1;
            const $productcarouselmousewheelcontrol = $swiperItem.data('carousel_mousewheelcontrol') || false;
            const $productcarouselbulletpagination = $swiperItem.data('carousel_bulletpagination') || false;
            const $productcarouselarrowpagination = $swiperItem.data('carousel_arrowpagination') || false;
            const $productcarouselspacebetween = parseInt($swiperItem.data('carousel_spacebetween') || 0, 10);
            const $carouselresponsive = $swiperItem.data('carouselresponsive') || {};

            const productimagerelatedgallery = {
                initialSlide: 0,
                touchRatio: 0.2,
                grabCursor: true,
                slideToClickedSlide: false,
                spaceBetween: $productcarouselspacebetween,
                keyboardControl: true,
                loop: true,
                mousewheel: $productcarouselmousewheelcontrol,
                slidesPerView: $productcarouselslidesperview,
            };

            // Handle pagination
            if ($productcarouselbulletpagination) {
                productimagerelatedgallery.pagination = {
                    el: $swiperItem.find('.wdt-related-product-image-gallery-bullet-pagination')[0],
                    type: 'bullets',
                    clickable: true,
                };
            }

            // Handle navigation
            if ($productcarouselarrowpagination) {
                productimagerelatedgallery.navigation = {
                    prevEl: $swiperItem.find('.wdt-related-product-image-gallery-arrow-prev')[0],
                    nextEl: $swiperItem.find('.wdt-related-product-image-gallery-arrow-next')[0],
                };
            }

            // Handle responsive breakpoints
            if ($carouselresponsive.responsive && Array.isArray($carouselresponsive.responsive)) {
                const $responsiveData = {};
                $.each($carouselresponsive.responsive, function (index, value) {
                    if (value.breakpoint && value.toshow) {
                        $responsiveData[value.breakpoint] = {
                            slidesPerView: value.toshow,
                        };
                    }
                });
                productimagerelatedgallery.breakpoints = $responsiveData;
            }

            // Initialize Swiper
            try {
                const swiper = new Swiper($swiperItem.find('.mrblack-related-product-carousel')[0], productimagerelatedgallery);
            } catch (error) {
                console.error('Error initializing Swiper:', error, $swiperItem);
            }
        });
    };

    // Attach the script to Elementor frontend initialization
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/wdt-shop-related-products.default', wdtShopProductSingleRelatedImagesCarousel);
    });
})(jQuery);
