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

  $('.masonry img').on('click', function() {
    var img_src = $(this).attr('data-full-url');
    var img_alt = $(this).attr('alt');

    if ( $('.overlay') ) {
      $('.overlay img').attr('src', img_src);
      $('.overlay img').attr('alt', img_alt);
  
      $('.overlay').imagesLoaded(function() {
        $('.overlay').addClass('is-open');
        $('.overlay .button--close').attr('tabindex','0');
      });
    }
  });
});