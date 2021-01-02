"use strict";

window.addEventListener('DOMContentLoaded', function (event) {
  /*------ Main Menu ------*/
  var menuToggle = document.querySelector('.navbar-main-content__menu');
  var mainMenu = document.querySelector('nav.main-menu');
  var sidebarMenu = document.querySelector('nav.sidebar-nav');

  if (menuToggle) {
    menuToggle.addEventListener('click', function (event) {
      if (mainMenu) {
        toggleMenu(mainMenu);
      }

      if (sidebarMenu) {
        toggleMenu(sidebarMenu);
      }
    });
  }

  var toggleMenu = function toggleMenu(menu) {
    if (menu.classList.contains('is-open')) {
      menu.classList.remove('is-open');
      menu.classList.add('is-closed');
      menuToggle.textContent = 'Menu';
      menu.querySelectorAll('.menu-item').forEach(function (el) {
        el.setAttribute('tabindex', '-1');
      });
    } else {
      menu.classList.add('is-open');
      menu.classList.remove('is-closed');
      menuToggle.textContent = 'Close';
      menu.querySelectorAll('.menu-item').forEach(function (el) {
        el.setAttribute('tabindex', '0');
      });
    }
  };
  /*------ Content Overlay ------*/


  var overlay = document.querySelector('.overlay');

  if (overlay) {
    var overlayClose = overlay.querySelector('.button--close');
    var overlayContents = overlay.querySelector('.overlay-content');
    overlayClose.addEventListener('click', function (event) {
      overlay.classList.remove('is-open');
      overlayClose.setAttribute('tabindex', '-1');
      overlayContents.innerHTML = '';
    });
  }
});
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