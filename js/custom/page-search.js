jQuery(function(){
  var icons = jQuery('.search-no-results #walkway svg');

  if ( icons.length ) {
    var svg = new Walkway({
      selector: '.search-no-results #walkway svg',
      duration: '1000',
      easing: t => t // linear
    });
    svg.draw();
  }
});