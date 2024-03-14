if (window.innerWidth > 400) {
    var grid = document.querySelector('.grid-mansory');
    var mansoryGrid = new Masonry(grid, {
        itemSelector: '.clipping-item',
        horizontalOrder: true,
        percentPosition: true,
        transitionDuration: 0
    });
}