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
    var img_name = $(this).attr('data-name');
    var img_desc = $(this).attr('data-caption');

    if ( $('.overlay') ) {
      if ( img_src ) {
        $('.overlay-content').append('<img src="' + img_src + '" />');

        if ( img_alt ) {
          $('.overlay-content img').attr('alt', img_alt);    
        }
      }

      if ( img_name ) {
        $('.overlay-content').append('<div class="overlay-content__title uppercase">' + img_name + '</div>');
      }

      if ( img_desc ) {
        $('.overlay-content').append('<p class="overlay-content__caption supplemental">' + img_desc + '</p>');
      }
        
      $('.overlay').imagesLoaded(function() {
        $('.overlay').addClass('is-open');
        $('.overlay .button--close').attr('tabindex','0');
      });
    }
  });
});