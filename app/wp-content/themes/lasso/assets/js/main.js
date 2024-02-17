(($) => {
    "use strict";

    console.log('main.js script loaded.');

    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.products-card');
        const swipers = document.querySelectorAll('.cubeSwiper');
      
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
      
        // Listen for scroll events and apply transformations
        const handleScroll = () => {
            applyTransform(cards, -1); // Move cards in one direction
            applyTransform(swipers, 1); // Move swipers in the opposite direction
        };
    
        // Initial call in case they're already in view
        handleScroll();
      
        // Attach the scroll event listener
        window.addEventListener('scroll', handleScroll);
    });
    
})(jQuery);
