(($) => {
    "use strict";

    console.log('main.js script loaded.');

    
        const applyTransform = (selector, directionMultiplier) => {
            $(selector).each(function() {
                const rect = this.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                const centerDistance = rect.top + rect.height / 2 - windowHeight / 2;
                const transformValue = centerDistance * 0.5 * directionMultiplier;
                $(this).css('transform', `translateX(${transformValue}px)`);
            });
        };
    
        const adjustOpacityOnScroll = (selector) => {
            $(selector).each(function() {
                const rect = this.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                const headerHeight = windowHeight * 0.15; // 15vh header space
                const adjustedWindowHeight = windowHeight - headerHeight;
                const viewportCenter = adjustedWindowHeight / 2 + headerHeight;
                const elementCenterToAdjustedViewportCenter = Math.abs(viewportCenter - (rect.top + rect.height / 2));
                const distanceNormalized = elementCenterToAdjustedViewportCenter / (adjustedWindowHeight / 2);
                const dampeningFactor = 0.5;
                let opacity = 1 - (distanceNormalized * dampeningFactor);
                opacity = Math.max(0, Math.min(opacity, 1));
                $(this).css('opacity', opacity);
            });
        };
    
        let scrollInProgress = false;
    
        const handleScroll = () => {
            if (!scrollInProgress) {
                requestAnimationFrame(() => {
                    applyTransform('.gradient-about__teaser', -1); 
                    applyTransform('.products-card', -1); 
                    applyTransform('.cubeSwiper', 2);
                    applyTransform('.swiper-slide__action-call', 1);
                    adjustOpacityOnScroll('.gradient-splash');
                    applyTransform('.gradient-custom__photo-container--one', -1);
                    applyTransform('.gradient-custom__photo-container--two', 1);
                    scrollInProgress = false;
                });
            }
            scrollInProgress = true;
        };
    
        $(window).on('scroll', handleScroll);


    const $dropdownArea = $('.single-product__dropdown--head');

    $dropdownArea.on('click', function() {
        let $dropdownContent = $(this).closest('.single-product__dropdown').find('.single-product__dropdown--content');
        $dropdownContent.toggleClass('show-dropdown');
        let $dropdownBtn = $(this).closest('.single-product__dropdown').find('.single-product__dropdown--icon');
        $dropdownBtn.toggleClass('rotate-icon');
    });
    
})(jQuery);
