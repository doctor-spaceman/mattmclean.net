"use strict";

//----------MENU BEHAVIOR----------
window.addEventListener('DOMContentLoaded', function (event) {
  var mainMenuToggle = document.querySelector('.navbar-main-content__menu');
  var mainMenu = document.querySelector('nav.main-menu');
  mainMenuToggle.addEventListener('click', function (event) {
    if (mainMenu.classList.contains('is-open')) {
      mainMenu.classList.remove('is-open');
      mainMenu.classList.add('is-closed');
      mainMenuToggle.textContent = 'Menu';
      mainMenu.querySelectorAll('.menu-item').setAttribute('tabindex', '-1');
    } else {
      mainMenu.classList.add('is-open');
      mainMenu.classList.remove('is-closed');
      mainMenuToggle.textContent = 'Close';
      mainMenu.querySelectorAll('.menu-item').setAttribute('tabindex', '0');
    }
  });
}); // Define how mobile menu is toggled
// var toggleMenu = function () {
//   $('#navIcon').toggleClass('open');
//   $('.screen-overlay').toggle();
//   $('.main-menu').toggleClass('mobile-menu');
//   $('.main-menu--vertical').toggleClass('mobile-menu');
//   $('.sidebar-nav-container').toggleClass('past-hero');
// }
// // Enable mobile menu when clicking hamburger icon
// $('#navIcon').click(function() { toggleMenu(); } );
// // Disable mobile menu when clicking anywhere
// $('.screen-overlay').click(function() { toggleMenu(); } );
"use strict";

// Homepage hero interactive element
var heroGraphic = document.querySelector('.hero-graphic__morph');

function heroClickResponder(e) {
  var el = e.target;
  var typed;
  var typedStrings = ['weeks crash by, unseeing', 'festooned in metal', 'in the limbo of a long sleep', 'life is a renegotiation', 'the sizes of infinity', 'thought without voice', 'clouds like a page-edge', 'the story spilt out', 'the earth, capped, touches light', 'watching atoms drift by', 'a steady pulling across', 'bookended by oceans', 'a dream unending', 'the fire-smoke of memories'];
  var typedString; // Don't allow subsequent clicks while the response is being displayed

  heroGraphic.removeEventListener('click', heroClickResponder);
  el.classList.add('hero-graphic__morph--clicked'); // Select a string at random

  typedString = typedStrings[Math.floor(Math.random() * typedStrings.length)]; // Create typed.js instance

  typed = new Typed('.typed', {
    showCursor: false,
    strings: [typedString],
    typeSpeed: 40
  });
  setTimeout(function () {
    typed.destroy();
    el.classList.remove('hero-graphic__morph--clicked'); // Re-enable click listener

    heroGraphic.addEventListener('click', heroClickResponder);
  }, 3000);
}

if (heroGraphic) {
  heroGraphic.addEventListener('click', heroClickResponder);
} // END / Homepage hero interactive element
"use strict";

jQuery(function () {
  var sliders = jQuery('.slider');
  var slidesLeft = jQuery('.slider-vertical__left > div');
  var slidesToShow = 1;
  var centerMode = true;

  if (slidesLeft.length < 3) {
    centerMode = false;
  } else {
    slidesToShow = 3;
  } // Vertical slider (Portfolio)


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
    arrows: false,
    autoplay: false,
    dots: true,
    fade: true,
    infinite: true,
    lazyLoad: 'ondemand',
    rows: 0,
    slidesToShow: 1,
    swipe: false
  });
  /**
   * Supports svg drawing in a slider
   * 
   */

  var svg;
  var hasIcons = jQuery('#walkway.slider'); // If we know there will be icons, init Walkway on the first slide

  if (hasIcons.length) {
    var firstIcon = '#walkway svg:first-of-type';
    svg = new Walkway({
      selector: firstIcon,
      duration: 3000
    });
    svg.draw();
    jQuery('.slider-vertical__right').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      var activeSlideIcon = ".slick-slide[data-slick-index=\"".concat(nextSlide, "\"] svg");
      svg = new Walkway({
        selector: activeSlideIcon,
        duration: 3000
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
    var direction,
        slideCountZeroBased = slick.slideCount - 1;

    if (nextSlide == currentSlide) {
      direction = "same";
    } else if (Math.abs(nextSlide - currentSlide) == 1) {
      // 1 or -1
      if (slideCountZeroBased === 1) {
        // If there's only two slides
        direction = "duo";
      } else {
        // More than two slides
        direction = nextSlide - currentSlide > 0 ? "right" : "left";
      }
    } else {
      // e.g., slide 0 to slide 6
      direction = nextSlide - currentSlide > 0 ? "left" : "right";
    } // Add a temp CSS class for the slide animation (.slick-current-clone-animate)


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
    $('.slick-current-clone-animate', sliders).removeClass('slick-current-clone-animate'); //$('.slick-current-clone-animate', sliders).removeClass('slick-current-clone-animate');
  });
});