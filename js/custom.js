"use strict";

// Homepage hero interactive element
var heroGraphic = document.querySelector('.hero-graphic__morph');

function heroClickResponder(e) {
  var el = e.target;
  var typed;
  var typedStrings = ['I only have time for coffee.', 'String 2', 'String 3'];
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
  }, 2000);
}

heroGraphic.addEventListener('click', heroClickResponder); // END / Homepage hero interactive element

jQuery(document).ready(function ($) {
  // Set hero height to browser height
  $('.hero').css('height', $(window).height()); // Re-set hero height to new browser height after window is resized.

  $(window).resize(function () {
    $('.hero').css('height', $(window).height());
  }); // Hero height for iOS7 due to vh unit bugginess

  var iOS = navigator.userAgent.match(/(iPod|iPhone|iPad)/);

  if (iOS) {
    var iosVhHeightBug = function iosVhHeightBug() {
      var height = $(window).height();
      $('.hero').css('min-height', height);
    };

    iosVhHeightBug();
    $(window).bind('resize', iosVhHeightBug);
  } // Scroll down with chevron icon


  $('a[href*=\\#]').click(function (event) {
    // Animate scroll to anchor location
    $('html, body').animate({
      scrollTop: $($.attr(this, 'href')).offset().top - 50
    }, 500);
    event.preventDefault();
  }); //----------NAV BAR BEHAVIOR----------

  var heroBottom = $('.hero').height() / 6; // point where I want style change to occur

  var navStyle = function navStyle() {
    var stopPosition = Math.round($(window).scrollTop()); // use rounding to improve performance

    var overlayStatus = $('.screen-overlay').css('display'); // Change nav bar style when far enough down page and if mobile menu overlay is not active

    if (stopPosition > heroBottom && overlayStatus == 'none') {
      $('.nav-container').addClass('past-hero'); // Otherwise, don't change style
    } else {
      $('.nav-container').removeClass('past-hero');
    }
  }; // On scroll


  $(window).on('scroll', function () {
    navStyle();
  }); // On page load or refresh

  $(window).load(function () {
    navStyle();
  }); //----------MENU BEHAVIOR----------
  // Define how mobile menu is toggled

  var toggleMenu = function toggleMenu() {
    $('#navIcon').toggleClass('open');
    $('.screen-overlay').toggle();
    $('.main-menu').toggleClass('mobile-menu');
    $('.main-menu--vertical').toggleClass('mobile-menu');
    $('.sidebar-nav-container').toggleClass('past-hero'); // Check nav bar style

    navStyle();
  }; // Enable mobile menu when clicking hamburger icon


  $('#navIcon').click(function () {
    toggleMenu();
  }); // Disable mobile menu when clicking anywhere

  $('.screen-overlay').click(function () {
    toggleMenu();
  }); // Remove mobile menu on window resize

  var updateNavList;
  $(window).resize(function () {
    updateNavList = $('.main-menu ul').css('flex-direction');

    if (updateNavList == 'row') {
      $('#navIcon').removeClass('open');
      $('.screen-overlay').hide();
      $('.main-menu').removeClass('mobile-menu');
    }

    if ($(window).width() > 639 && $(window).height() > 499) {
      $('.main-menu--vertical').removeClass('mobile-menu');
      $('#navIcon').removeClass('open');
      $('.screen-overlay').hide();
    }
  }); //--------CUSTOM VIDEO CONTENT---------
  //https://github.com/zeusdeux/isInViewport

  $(window).scroll(function () {
    $('video').each(function () {
      if ($(this).is(":in-viewport")) {
        $(this)[0].play();
      } else {
        $(this)[0].pause();
      }
    });
  });
});
"use strict";