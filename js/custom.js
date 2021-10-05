"use strict";

window.addEventListener('DOMContentLoaded', function (event) {
  /*------ Site Mode ------*/
  var siteModeToggle = document.querySelector('.site-mode-toggle button');
  var root = document.querySelector('html');
  siteModeToggle.addEventListener('click', function () {
    themeUpdate();
  });

  function themeUpdate() {
    if (root.classList.contains('site-mode--dark') || localStorage.getItem('site-mode') === 'dark') {
      root.classList.remove("site-mode--dark");
      localStorage.removeItem('site-mode');
    } else {
      root.classList.add("site-mode--dark");
      localStorage.setItem('site-mode', 'dark');
    }
  }

  ;
  /*------ Main Menu ------*/

  var menuToggle = document.querySelector('.main-menu-toggle');
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

  function toggleMenu(menu) {
    if (menu.classList.contains('is-open')) {
      menu.classList.remove('is-open');
      menu.classList.add('is-closed');
      menuToggle.textContent = 'Menu';
      menuToggle.setAttribute('aria-label', 'Open main menu');
      menuToggle.focus();
      menu.querySelectorAll('.menu-item a').forEach(function (el) {
        el.setAttribute('tabindex', '-1');
      });
    } else {
      menu.classList.add('is-open');
      menu.classList.remove('is-closed');
      menuToggle.textContent = 'Close';
      menuToggle.setAttribute('aria-label', 'Close main menu');
      menu.querySelectorAll('.menu-item a').forEach(function (el) {
        el.setAttribute('tabindex', '0');
      }); // Dismiss menu

      document.addEventListener('keyup', function (event) {
        if (menu.classList.contains('is-open')) {
          if (event.code.toLowerCase() === 'escape') {
            toggleMenu(menu);
          }
        }
      }); // Menu item tabbing circularity

      var menuItemList = menu.querySelectorAll('.menu-item a');
      menuItemList[menuItemList.length - 1].addEventListener('focusout', function (event) {
        if (menu.classList.contains('is-open')) {
          menuItemList[0].focus();
        }
      });
    }
  }

  ;
  /*------ Content Overlay ------*/

  var overlay = document.querySelector('.overlay');

  if (overlay) {
    var closeOverlay = function closeOverlay() {
      overlay.classList.remove('is-open', 'loaded');
      overlayClose.setAttribute('tabindex', '-1');
      overlayContents.innerHTML = '';
    };

    var overlayClose = overlay.querySelector('.button--close');
    var overlayContents = overlay.querySelector('.overlay-content'); // Dismiss menu

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
    ;
  }
});
/*------ Draw SVG icons -------*/

function initWalkway(sel, dur, timing) {
  var icon = new Walkway({
    selector: sel,
    duration: dur,
    easing: timing ? timing : function (t) {
      return t;
    } // linear

  });
  icon.draw();
}

;
"use strict";

document.addEventListener('DOMContentLoaded', function () {
  var icons = document.querySelectorAll('.error404 #walkway svg');

  if (icons.length) {
    initWalkway('.error404 #walkway svg', '1000');
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

document.addEventListener('DOMContentLoaded', function () {
  var icons = document.querySelectorAll('.search-no-results #walkway svg');

  if (icons.length) {
    initWalkway('.search-no-results #walkway svg', '1000');
  }
});