let slides = document.querySelectorAll('[js-swiper]');

slides.forEach(slide => {
  let id = slide.getAttribute('js-swiper');
  new Swiper(slide, {
    slidesPerView: 1.5,
    spaceBetween: 10,
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
    navigation: {
      nextEl: `.swiper-button-${id}-next`,
      prevEl: `.swiper-button-${id}-prev`,
  },
  });
});