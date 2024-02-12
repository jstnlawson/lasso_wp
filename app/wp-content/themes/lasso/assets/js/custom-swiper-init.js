document.addEventListener('DOMContentLoaded', function () {

    console.log('Swiper init script loaded.');

    var mySwiper = new Swiper('.mySwiper', {
        // Swiper options here
        loop: true,
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