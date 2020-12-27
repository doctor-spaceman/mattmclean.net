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

        mainMenu.querySelectorAll('.menu-item').setAttribute('tabindex','-1');
      } else {
        mainMenu.classList.add('is-open');
        mainMenu.classList.remove('is-closed');
        mainMenuToggle.textContent = 'Close';

        mainMenu.querySelectorAll('.menu-item').setAttribute('tabindex','0');
      }
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