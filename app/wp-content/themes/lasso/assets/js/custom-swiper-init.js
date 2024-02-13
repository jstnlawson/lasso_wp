document.addEventListener('DOMContentLoaded', function () {

    console.log('Swiper init script loaded.');

    var mySwiper = new Swiper('.mySwiper', {
        // Swiper options here
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
        effect: 'fade',
        fadeEffect: { 
            crossFade: true,
          },
        speed: 2000,
        autoplay: {
            delay: 5500,
            disableOnInteraction: false,
          },
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
});