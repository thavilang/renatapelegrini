new Swiper('[js-swiper-galeria]', {
    loop: true,
    navigation: {
        nextEl: ".swiper-button-galeria-next",
        prevEl: ".swiper-button-galeria-prev",
    },
});

let quebraMobileInt = document.querySelector('[js-quebra-mansory]').getAttribute('js-quebra-mansory');

if (window.innerWidth > quebraMobileInt) {
    var grids = document.querySelectorAll('.grid-mansory');
    var mansoryGrid = Array();
    grids.forEach((grid, i) => {
        mansoryGrid[i] = new Masonry(grid, {
            itemSelector: '.grid-mansory__img',
            horizontalOrder: true,
            percentPosition: true,
            transitionDuration: 0
        });
        imagesLoaded(grid).on('progress', function () {
            // layout Masonry after each image loads
            mansoryGrid[i].layout();
        });
    });
}