document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.main-slider', {
        loop: true,
        speed: 1000,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        // Стандартный эффект листания (slide) самый надежный
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});