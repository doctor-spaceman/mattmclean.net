"use strict";

jQuery(function () {
  var icons = jQuery('.error404 #walkway svg');

  if (icons.length) {
    var svg = new Walkway({
      selector: '.error404 #walkway svg',
      duration: '1000',
      easing: function easing(t) {
        return t;
      } // linear

    });
    svg.draw();
  }
});
"use strict";

window.addEventListener('DOMContentLoaded', function (event) {
  /*------ Site Mode ------*/
  var siteModeToggle = document.querySelector('.navbar-main-content__mode button');
  siteModeToggle.addEventListener('click', function () {
    document.body.classList.toggle("site-mode--dark");
    var siteMode = 'light';

    if (document.body.classList.contains("site-mode--dark")) {
      siteMode = 'dark';
    } // Remember the user's preference


    document.cookie = "site-mode=".concat(siteMode, "; path=/");
  });
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
      menuToggle.setAttribute('aria-label', 'Open main menu');
      menu.querySelectorAll('.menu-item').forEach(function (el) {
        el.setAttribute('tabindex', '-1');
      });
    } else {
      menu.classList.add('is-open');
      menu.classList.remove('is-closed');
      menuToggle.textContent = 'Close';
      menuToggle.setAttribute('aria-label', 'Close main menu');
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
      closeOverlay();
    });
    document.addEventListener('keyup', function (event) {
      if (overlay.classList.contains('is-open')) {
        if (event.code.toLowerCase() === 'escape') {
          closeOverlay();
        }
      }
    });

    var closeOverlay = function closeOverlay() {
      overlay.classList.remove('is-open', 'loaded');
      overlayClose.setAttribute('tabindex', '-1');
      overlayContents.innerHTML = '';
    };
  }
});
"use strict";

// Homepage hero interactive element
var heroGraphic = document.querySelector('.hero-graphic__morph');

function heroClickResponder(e) {
  var el = e.target;
  var typed;
  var typedStrings = ['/JK78/F45/U78/R348/J57/N454/K876/', '/THE/OWLS/ARE/NOT/WHAT/THEY/SEEM/', '/K78/B676/G565/C454/N669/H6776/', '/B789/W26/MN78/N78/H45/JK78/DF45/'];
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
  var icons = jQuery('.search-no-results #walkway svg');

  if (icons.length) {
    var svg = new Walkway({
      selector: '.search-no-results #walkway svg',
      duration: '1000',
      easing: function easing(t) {
        return t;
      } // linear

    });
    svg.draw();
  }
});