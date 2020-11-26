$(function(){
  // Rolodex slider
  var rolodex = $('.rolodex');
  rolodex.slick({
    arrows: true,
    autoplay: false,
    centerMode: true,
    // centerPadding: '0',
    infinite: true,
    rows: 0,
    slidesToShow: 3,
    // swipeToSlide: true,
    // adaptiveHeight: true,
    vertical: true,
    verticalSwiping: true
  });

  /**
  * FIX JUMPING ANIMATION
  * Set special animation class on first or last clone.
  * https://github.com/kenwheeler/slick/issues/3419
  */
  rolodex.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    var 
      direction,
      slideCountZeroBased = slick.slideCount - 1;

    if (nextSlide == currentSlide) {
      direction = "same";

    } else if (Math.abs(nextSlide - currentSlide) == 1) {
      direction = (nextSlide - currentSlide > 0) ? "right" : "left";

    } else {
      direction = (nextSlide - currentSlide > 0) ? "left" : "right";
    }

    // Add a temp CSS class for the slide animation (.slick-current-clone-animate)
    if (direction == 'right') {
      $('.slick-cloned[data-slick-index="' + (nextSlide + slideCountZeroBased + 1) + '"]', rolodex).addClass('slick-current-clone-animate');
    }

    if (direction == 'left') {
      $('.slick-cloned[data-slick-index="' + (nextSlide - slideCountZeroBased - 1) + '"]', rolodex).addClass('slick-current-clone-animate');
    }
  });

  rolodex.on('afterChange', function (event, slick, currentSlide, nextSlide) {
    $('.slick-current-clone-animate', rolodex).removeClass('slick-current-clone-animate');
    $('.slick-current-clone-animate', rolodex).removeClass('slick-current-clone-animate');
  });

  // Other sliders here
});