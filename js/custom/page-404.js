jQuery(function(){
  var icons = jQuery('.error404 #walkway svg');

  if ( icons.length ) {
    var svg = new Walkway({
      selector: '.error404 #walkway svg',
      duration: '1000',
      easing: t => t // linear
    });
    svg.draw();
  }
});