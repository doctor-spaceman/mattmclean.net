jQuery(function() {
  var portfolio_sidebar_grid = $('.page-template-portfolio-sidebar.page-child .masonry');

  portfolio_sidebar_grid.masonry({
    columnWidth: '.grid-sizer',
    gutter: 16,
    itemSelector: '.grid-item',
    percentPosition: true
  });

  portfolio_sidebar_grid.imagesLoaded(function() { 
    portfolio_sidebar_grid.masonry('layout');
    portfolio_sidebar_grid.addClass('loaded');
  });
});
