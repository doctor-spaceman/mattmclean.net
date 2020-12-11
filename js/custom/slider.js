jQuery(function(){
  
  var sliders = jQuery('.slider');

  // Vertical slider (Portfolio)
  var slidesLeft = jQuery('.slider-vertical__left > div');
  var slidesToShow = 1;
  var centerMode = true;
  
  if ( slidesLeft.length < 3 ) {
    centerMode = false;
  } else {
    slidesToShow = 3;
  }

  jQuery('.slider-vertical__left').slick({
    arrows: true,
    asNavFor: '.slider-vertical__right',
    autoplay: false,
    centerMode: centerMode,
    infinite: true,
    prevArrow: '<button type="button" class="slick-prev" aria-label="Previous"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg></button>',
    nextArrow: '<button type="button" class="slick-next" aria-label="Next"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>',
    rows: 0,
    slidesToShow: slidesToShow,
    vertical: true,
    verticalSwiping: true
  });

  jQuery('.slider-vertical__right').slick({
    arrows: false,
    autoplay: false,
    fade: true,
    infinite: true,
    rows: 0,
    slidesToShow: 1,
    swipe: false
  });

  jQuery('.page-template-portfolio-item .slider-vertical__right .slider').slick({
    adaptiveHeight: true,
    arrows: true,
    autoplay: false,
    dots: true,
    fade: true,
    infinite: true,
    prevArrow: '<button type="button" class="slick-prev" aria-label="Previous"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>',
    nextArrow: '<button type="button" class="slick-next" aria-label="Next"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>',
    lazyLoad: 'ondemand',
    rows: 0,
    slidesToShow: 1,
    swipe: false
  });
  // Refresh the right-side slider so it can recalculate 
  // its width after its child slider has initialized.
  jQuery('.slider-vertical__right').slick('refresh');


  /**
   * Supports svg drawing in a slider
   * 
   */
  var svg;
  var hasIcons = jQuery('#walkway.slider');

  // If we know there will be icons, init Walkway on the first slide
  if ( hasIcons.length ) {
    var firstIcon = '#walkway svg:first-of-type';
    svg = new Walkway({
      selector: firstIcon,
      duration: 3000,
    });
    svg.draw();

    jQuery('.slider-vertical__right').on('beforeChange', function(event, slick, currentSlide, nextSlide){
      var activeSlideIcon = `.slick-slide[data-slick-index="${nextSlide}"] svg`;
      svg = new Walkway({
        selector: activeSlideIcon,
        duration: 3000,
      });
      svg.redraw();
    });
  }

  /**
  * FIX JUMPING ANIMATION
  * Set special animation class on first or last clone.
  * https://github.com/kenwheeler/slick/issues/3419
  */
  sliders.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    var 
      direction,
      slideCountZeroBased = slick.slideCount - 1;

    if (nextSlide == currentSlide) {
      direction = "same";

    } else if (Math.abs(nextSlide - currentSlide) == 1) { // 1 or -1
      if (slideCountZeroBased === 1) { // If there's only two slides
        direction = "duo";
      } else { // More than two slides
        direction = (nextSlide - currentSlide > 0) ? "right" : "left"; 
      }
    } else { // e.g., slide 0 to slide 6
      direction = (nextSlide - currentSlide > 0) ? "left" : "right";
    }

    // Add a temp CSS class for the slide animation (.slick-current-clone-animate)
    if (direction == 'duo') {  
      $('.slick-cloned[data-slick-index="' + (nextSlide + slideCountZeroBased + 1) + '"]', sliders).addClass('slick-current-clone-animate');

      $('.slick-cloned[data-slick-index="' + (nextSlide - slideCountZeroBased - 1) + '"]', sliders).addClass('slick-current-clone-animate');
    }

    if (direction == 'right') {  
      $('.slick-cloned[data-slick-index="' + (nextSlide + slideCountZeroBased + 1) + '"]', sliders).addClass('slick-current-clone-animate');
    }

    if (direction == 'left') {
      $('.slick-cloned[data-slick-index="' + (nextSlide - slideCountZeroBased - 1) + '"]', sliders).addClass('slick-current-clone-animate');
    }
  });

  sliders.on('afterChange', function (event, slick, currentSlide, nextSlide) {
    $('.slick-current-clone-animate', sliders).removeClass('slick-current-clone-animate');
    //$('.slick-current-clone-animate', sliders).removeClass('slick-current-clone-animate');
  });

});