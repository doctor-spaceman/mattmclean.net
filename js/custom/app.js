window.addEventListener('DOMContentLoaded', (event) => {

  /*------ Site Mode ------*/
  const siteModeToggle = document.querySelector('.navbar-main-content__mode button');

  siteModeToggle.addEventListener('click', function() {
    document.body.classList.toggle("site-mode--dark");

    let siteMode = 'light';
    if ( document.body.classList.contains("site-mode--dark") ) {
      siteMode = 'dark';
    }
    
    // Remember the user's preference
    document.cookie = `site-mode=${siteMode}; path=/`;
  });

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
      menuToggle.setAttribute('aria-label','Open main menu');

      menu.querySelectorAll('.menu-item').forEach(el => {
        el.setAttribute('tabindex','-1');
      });
      
    } else {
      menu.classList.add('is-open');
      menu.classList.remove('is-closed');
      menuToggle.textContent = 'Close';
      menuToggle.setAttribute('aria-label','Close main menu');

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
      closeOverlay();
    });
    document.addEventListener('keyup', (event) => {
      if ( overlay.classList.contains('is-open') ) {
        if ( event.code.toLowerCase() === 'escape' ) {
          closeOverlay();
        }
      }
    });

    const closeOverlay = (() => {
      overlay.classList.remove('is-open', 'loaded');
      overlayClose.setAttribute('tabindex','-1');
      overlayContents.innerHTML = '';
    });
  }
});