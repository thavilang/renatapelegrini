new Swiper('[js-swiper-banner]', {
    loop: true,
    effect: "fade",
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-banner-next",
        prevEl: ".swiper-button-banner-prev",
    },
    pagination: {
        el: '.swiper-pagination-banner',
        clickable: true,
    },
});