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

  var singleProductSwiper = new Swiper(".singleProductSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  var thumbSwiper = new Swiper(".thumbSwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 10,
    freeMode: true,
    watchSlidesProgress: true,
  });
  var thumbSwiper2 = new Swiper(".thumbSwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: thumbSwiper,
    },
  });

      // Query all images within the swiper-slide
      document.querySelectorAll('.thumbSwiper-img--main').forEach(function(image) {
        image.addEventListener('click', function() {
            // Create a new div element for the fullscreen view
            var fullscreenDiv = document.createElement('div');
            fullscreenDiv.classList.add('fullscreen-image');

            // Create a new img element for the fullscreen image
            var fullscreenImg = new Image();
            fullscreenImg.src = this.src; // Set the source of the image to the clicked image's src
            fullscreenDiv.appendChild(fullscreenImg); // Add the image to the fullscreen div

            // Append the fullscreen div to the body
            document.body.appendChild(fullscreenDiv);

            // Add click event to close the fullscreen view when clicked
            fullscreenDiv.addEventListener('click', function() {
                document.body.removeChild(this); // Remove the fullscreen div from the body
            });
        });
    });

});
