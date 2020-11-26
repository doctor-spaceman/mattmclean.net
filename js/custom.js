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
    } else {
      mainMenu.classList.add('is-open');
      mainMenu.classList.remove('is-closed');
      mainMenuToggle.textContent = 'Close';
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

$(function () {
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
    var direction,
        slideCountZeroBased = slick.slideCount - 1;

    if (nextSlide == currentSlide) {
      direction = "same";
    } else if (Math.abs(nextSlide - currentSlide) == 1) {
      direction = nextSlide - currentSlide > 0 ? "right" : "left";
    } else {
      direction = nextSlide - currentSlide > 0 ? "left" : "right";
    } // Add a temp CSS class for the slide animation (.slick-current-clone-animate)


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
  }); // Other sliders here
});