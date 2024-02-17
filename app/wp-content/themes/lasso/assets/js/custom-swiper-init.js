document.addEventListener("DOMContentLoaded", function () {
  console.log("Swiper init script loaded.");

  var mySwiper = new Swiper(".mySwiper", {
    // Swiper options here
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    speed: 2000,
    autoplay: {
      delay: 5500,
      disableOnInteraction: false,
    },
  });

  const reviewSwiper = new Swiper(".reviewSwiper", {
    // Swiper options here
    loop: true,
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    speed: 1500,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});

var cubeSwiper = new Swiper(".cubeSwiper", {
  effect: "cube",
  grabCursor: true,
  loop: true,
  cubeEffect: {
    shadow: true,
    slideShadows: true,
    shadowOffset: 20,
    shadowScale: 0.94,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: true,
  },
  speed: 3000,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
