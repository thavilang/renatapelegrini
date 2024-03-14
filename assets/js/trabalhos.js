var grid = document.querySelector('.grid-mansory');
var mansoryGrid = new Masonry(grid, {
    itemSelector: '.post',
    percentPosition: true,
    transitionDuration: 0
});