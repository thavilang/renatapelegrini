let quebraMobileInt = document.querySelector('[js-quebra-mansory]').getAttribute('js-quebra-mansory');

if (window.innerWidth > quebraMobileInt) {
    var grid = document.querySelector('.grid-mansory');
    var mansoryGrid = new Masonry(grid, {
        itemSelector: '.post',
        percentPosition: true,
        transitionDuration: 0
    });
}