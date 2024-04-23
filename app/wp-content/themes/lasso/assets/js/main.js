(($) => {
  "use strict";

  console.log("main.js script loaded.");

  const applyTransform = (selector, directionMultiplier) => {
    $(selector).each(function () {
      const rect = this.getBoundingClientRect();
      const windowHeight = window.innerHeight;
      const centerDistance = rect.top + rect.height / 2 - windowHeight / 2;
      const transformValue = centerDistance * 0.5 * directionMultiplier;
      $(this).css("transform", `translateX(${transformValue}px)`);
    });
  };

  const adjustOpacityOnScroll = (selector) => {
    $(selector).each(function () {
      const rect = this.getBoundingClientRect();
      const windowHeight = window.innerHeight;
      const headerHeight = windowHeight * 0.15; // 15vh header space
      const adjustedWindowHeight = windowHeight - headerHeight;
      const viewportCenter = adjustedWindowHeight / 2 + headerHeight;
      const elementCenterToAdjustedViewportCenter = Math.abs(
        viewportCenter - (rect.top + rect.height / 2)
      );
      const distanceNormalized =
        elementCenterToAdjustedViewportCenter / (adjustedWindowHeight / 2);
      const dampeningFactor = 0.5;
      let opacity = 1 - distanceNormalized * dampeningFactor;
      opacity = Math.max(0, Math.min(opacity, 1));
      $(this).css("opacity", opacity);
    });
  };

  let scrollInProgress = false;

  // const handleScroll = () => {
  //   if (!scrollInProgress && $(window).width() > 600) {
  //     requestAnimationFrame(() => {
  //       applyTransform(".lasso-about__teaser", -1);
  //       applyTransform(".products-card", -1);
  //       applyTransform(".cubeSwiper", 2);
  //       applyTransform(".swiper-slide__action-call", 1);
  //       adjustOpacityOnScroll(".lasso-splash");
  //       applyTransform(".lasso-contact__photo-container--one", -1);
  //       applyTransform(".lasso-contact__photo-container--two", 1);
  //       scrollInProgress = false;
  //     });
  //   }
  //   scrollInProgress = true;
  // };

  const handleScroll = () => {
    if (!scrollInProgress) {
      scrollInProgress = true;
  
      requestAnimationFrame(() => {
        // These transformations are applied regardless of the screen width
        applyTransform(".lasso-about__teaser", -1);
        applyTransform(".swiper-slide__action-call", 1);
        adjustOpacityOnScroll(".lasso-splash");
        applyTransform(".lasso-contact__photo-container--one", -1);
        applyTransform(".lasso-contact__photo-container--two", 1);
  
        // Screen width check is specifically for these transformations
        if ($(window).width() > 600) {
          applyTransform(".products-card", -1);
          applyTransform(".cubeSwiper", 2);
        }
  
        // Mark the scrolling operation as completed
        scrollInProgress = false;
      });
    }
  };
  

  $(window).on("scroll", handleScroll);

  const $dropdownArea = $(".single-product__dropdown--head");

  $dropdownArea.on("click", function () {
    let $dropdownContent = $(this)
      .closest(".single-product__dropdown")
      .find(".single-product__dropdown--content");
    $dropdownContent.toggleClass("show-dropdown");
    let $dropdownBtn = $(this)
      .closest(".single-product__dropdown")
      .find(".single-product__dropdown--icon");
    $dropdownBtn.toggleClass("rotate-icon");
  });


  
  const $toast = $(".toast");
  const $progress = $(".progress");
  const $closeBtn = $(".toast__close");
  let $timerOne;
  let $timerTwo;

  function showToast() {
    $toast.addClass("active");
    $progress.addClass("active");

    $timerOne = setTimeout(() => {
      $toast.removeClass("active");
    }, 5000);

    $timerTwo = setTimeout(() => {
      $progress.removeClass("active");
    }, 5300);
  }

  $(document).on('showToast', function() {
    showToast();
  });

  $closeBtn.on("click", function () {
    $toast.removeClass("active");

    setTimeout(() => {
      $progress.removeClass("active");
    }, 300);

    clearTimeout($timerOne);
    clearTimeout($timerTwo);
  });

})(jQuery);
