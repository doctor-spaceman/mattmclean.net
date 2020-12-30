//----------MENU BEHAVIOR----------
window.addEventListener('DOMContentLoaded', (event) => {
  const mainMenuToggle = document.querySelector('.navbar-main-content__menu');
  const mainMenu = document.querySelector('nav.main-menu');

  if ( mainMenuToggle ) {
    mainMenuToggle.addEventListener('click', (event) => {
      if ( mainMenu.classList.contains('is-open') ) {
        mainMenu.classList.remove('is-open');
        mainMenu.classList.add('is-closed');
        mainMenuToggle.textContent = 'Menu';

        mainMenu.querySelectorAll('.menu-item').forEach(el => {
          el.setAttribute('tabindex','-1');
        });
      } else {
        mainMenu.classList.add('is-open');
        mainMenu.classList.remove('is-closed');
        mainMenuToggle.textContent = 'Close';

        mainMenu.querySelectorAll('.menu-item').forEach(el => {
          el.setAttribute('tabindex','0');
        });
      }
    });
  }

  /*------ Content Overlay ------*/
  const overlay = document.querySelector('.overlay');

  if ( overlay ) {
    const overlayClose = overlay.querySelector('.button--close');
    const overlayContents = overlay.querySelector('.overlay-content');

    overlayClose.addEventListener('click', (event) => {
      overlay.classList.remove('is-open');
      overlayClose.setAttribute('tabindex','-1');
      overlayContents.innerHTML = '';
    });
  }
});





// Define how mobile menu is toggled
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