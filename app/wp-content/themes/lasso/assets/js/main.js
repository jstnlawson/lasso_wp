(($) => {
    "use strict";

    console.log('main.js script loaded.');

    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.products-card');
        const productCube = document.querySelectorAll('.cubeSwiper');
        const splash = document.querySelectorAll('.gradient-splash');
        const splashText = document.querySelectorAll('.swiper-slide__action-call');
        const aboutTeaser = document.querySelectorAll('.gradient-about__teaser');
        const productsTeaser = document.querySelectorAll('.gradient-products__teaser');
        const contactPhotoOne = document.querySelectorAll('.gradient-custom__photo-container--one');
        const contactPhotoTwo = document.querySelectorAll('.gradient-custom__photo-container--two');
        const contactInfo = document.querySelectorAll('.gradient-custom__info');
      
        // Function to calculate and apply the transform for each element
        const applyTransform = (elements, directionMultiplier) => {
            elements.forEach(element => {
                const rect = element.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                
                // Calculate how far this element is from the center of the viewport
                const centerDistance = rect.top + rect.height / 2 - windowHeight / 2;
                
                // Apply the transformation, adjust multiplier to control the effect's strength
                const transformValue = centerDistance * 0.5 * directionMultiplier;
                
                element.style.transform = `translateX(${transformValue}px)`;
            });
        };
      
        const adjustOpacityOnScroll = (elements) => {
            elements.forEach(element => {
                const rect = element.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                const headerHeight = windowHeight * 0.15; // Header takes up 15vh
                const adjustedWindowHeight = windowHeight - headerHeight;
                const viewportCenter = adjustedWindowHeight / 2 + headerHeight;
        
                const elementCenterToAdjustedViewportCenter = Math.abs(viewportCenter - (rect.top + rect.height / 2));
                const distanceNormalized = elementCenterToAdjustedViewportCenter / (adjustedWindowHeight / 2);
        
                // Dampening factor - Adjust this value to control how quickly opacity decreases
                // Higher values will keep the opacity at 1 longer as the element moves away from the center
                const dampeningFactor = 0.25;
        
                let opacity = 1 - (distanceNormalized * dampeningFactor);
        
                opacity = Math.max(0, Math.min(opacity, 1));
        
                element.style.opacity = opacity;
            });
        };
        

        // Listen for scroll events and apply transformations
        const handleScroll = () => {
            applyTransform(aboutTeaser, -1); 
            applyTransform(cards, -1); 
            applyTransform(productCube, 2);
            // applyTransform(splash, 1); 
            applyTransform(splashText, 1);
            adjustOpacityOnScroll(splash);
            adjustOpacityOnScroll(productsTeaser);
            // adjustOpacityOnScroll(contactInfo);
            applyTransform(contactPhotoOne, -1);
            applyTransform(contactPhotoTwo, 1);
        };
    
        // Initial call in case they're already in view
        handleScroll();
      
        // Attach the scroll event listener
        window.addEventListener('scroll', handleScroll);

        
    });

    const $dropdownArea = $('.single-product__dropdown--head');

    $dropdownArea.on('click', function() {
        let $dropdownContent = $(this).closest('.single-product__dropdown').find('.single-product__dropdown--content');
        $dropdownContent.toggleClass('show-dropdown');
        let $dropdownBtn = $(this).closest('.single-product__dropdown').find('.single-product__dropdown--icon');
        $dropdownBtn.toggleClass('rotate-icon');
    });
    
})(jQuery);
