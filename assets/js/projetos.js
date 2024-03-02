let slides = document.querySelectorAll('[js-swiper]');

slides.forEach(slide => {
  let id = slide.getAttribute('js-swiper');
  new Swiper(slide, {
    slidesPerView: 3,
    spaceBetween: 30,
  });
});