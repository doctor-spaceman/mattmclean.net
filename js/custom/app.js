window.addEventListener('DOMContentLoaded', (event) => {
  /*------ Main Menu ------*/
  const menuToggle = document.querySelector('.navbar-main-content__menu');
  const mainMenu = document.querySelector('nav.main-menu');
  const sidebarMenu = document.querySelector('nav.sidebar-nav')

  if ( menuToggle ) {
    menuToggle.addEventListener('click', (event) => {
      if ( mainMenu ) {
        toggleMenu(mainMenu);
      }
      
      if ( sidebarMenu ) {
        toggleMenu(sidebarMenu);
      }
    });
  }

  var toggleMenu = function(menu) {
    if ( menu.classList.contains('is-open') ) {
      menu.classList.remove('is-open');
      menu.classList.add('is-closed');
      menuToggle.textContent = 'Menu';

      menu.querySelectorAll('.menu-item').forEach(el => {
        el.setAttribute('tabindex','-1');
      });
    } else {
      menu.classList.add('is-open');
      menu.classList.remove('is-closed');
      menuToggle.textContent = 'Close';

      menu.querySelectorAll('.menu-item').forEach(el => {
        el.setAttribute('tabindex','0');
      });
    }
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