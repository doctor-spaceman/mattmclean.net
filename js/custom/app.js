//----------MENU BEHAVIOR----------
window.addEventListener('DOMContentLoaded', (event) => {
  const mainMenuToggle = document.querySelector('.navbar-main-content__menu');
  const mainMenu = document.querySelector('nav.main-menu');
  const mainMenuWidth = mainMenu.offsetWidth * -1;
  mainMenu.style.right = mainMenuWidth.toString() + 'px';

  mainMenuToggle.addEventListener('click', (event) => {
    if ( mainMenu.classList.contains('is-open') ) {
      mainMenu.classList.remove('is-open');
      mainMenuToggle.textContent = 'Menu';  
    } else {
      mainMenu.classList.add('is-open');
      mainMenuToggle.textContent = 'Close';
    }
  });
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