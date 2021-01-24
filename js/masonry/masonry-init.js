jQuery(function() {
  var $portfolio_sidebar_grid = jQuery('.page-template-portfolio-sidebar.page-child .masonry');

  var grid = $portfolio_sidebar_grid.masonry({
    columnWidth: '.grid-sizer',
    gutter: 16,
    itemSelector: '.grid-item',
    percentPosition: true
  });

  grid.imagesLoaded().progress(function() { 
    grid.masonry('layout');
    $portfolio_sidebar_grid.addClass('loaded');
  });

  jQuery('.masonry img').on('click', function() {
    var clickedImg = jQuery(this);
    jQuery('.overlay').addClass('is-open');
    jQuery('.overlay .button--close').attr('tabindex','0');
    
    var icons = jQuery('#walkway');

    if ( icons.length ) {
      var svg = new Walkway({
        selector: '#walkway',
        duration: '500',
        easing: t => t // linear
      });
      svg.draw(function() {
        var img_src = clickedImg.attr('data-overlay');
        var img_srcset = clickedImg.attr('srcset');
        var img_sizes = '100vw';
        var img_alt = clickedImg.attr('alt');
        var img_name = clickedImg.attr('data-name');
        var img_desc = clickedImg.attr('data-caption');
    
        if ( jQuery('.overlay') ) {
          if ( img_src ) {
            jQuery('.overlay-content').append('<img src="' + img_src + '" />');

            if ( img_alt ) {
              jQuery('.overlay-content img').attr('alt', img_alt);    
            }
            if ( img_srcset ) {
              jQuery('.overlay-content img').attr('srcset', img_srcset);    
            }
            if ( img_sizes ) {
              jQuery('.overlay-content img').attr('sizes', img_sizes);    
            }
          }
    
          jQuery('.overlay').imagesLoaded(function() {
            jQuery('.overlay').addClass('loaded');
            
            if ( img_name ) {
              jQuery('.overlay-content').append('<div class="overlay-content__title uppercase">' + img_name + '</div>');
            }
      
            if ( img_desc ) {
              jQuery('.overlay-content').append('<p class="overlay-content__caption supplemental">' + img_desc + '</p>');
            }
          });
        }
      });
    }
    
  });
});