window.addEventListener('DOMContentLoaded', (event) => {
  /*------ Site Mode ------*/
  const siteModeToggle = document.querySelector('.site-mode-toggle button');
  const root = document.querySelector('html');

  siteModeToggle.addEventListener('click', () => {
    themeUpdate();  
  });

  function themeUpdate() {
    if ( 
      root.classList.contains('site-mode--dark') || 
      localStorage.getItem('site-mode') === 'dark' 
    ) {
      root.classList.remove("site-mode--dark");
      localStorage.removeItem('site-mode');
    } else {
      root.classList.add("site-mode--dark");
      localStorage.setItem('site-mode', 'dark');
    }
  };

  /*------ Main Menu ------*/
  const menuToggle = document.querySelector('.main-menu-toggle');
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

  function toggleMenu(menu) {
    if ( menu.classList.contains('is-open') ) {
      menu.classList.remove('is-open');
      menu.classList.add('is-closed');
      menuToggle.textContent = 'Menu';
      menuToggle.setAttribute('aria-label','Open main menu');
      menuToggle.focus();

      menu.querySelectorAll('.menu-item a').forEach(el => {
        el.setAttribute('tabindex','-1');
      });
      
    } else {
      menu.classList.add('is-open');
      menu.classList.remove('is-closed');
      menuToggle.textContent = 'Close';
      menuToggle.setAttribute('aria-label','Close main menu');

      menu.querySelectorAll('.menu-item a').forEach(el => {
        el.setAttribute('tabindex','0');
      });

      // Dismiss menu
      document.addEventListener('keyup', (event) => {
        if ( menu.classList.contains('is-open') ) {
          if ( event.code.toLowerCase() === 'escape' ) {
            toggleMenu(menu);
          }
        }
      });

      // Menu item tabbing circularity
      const menuItemList = menu.querySelectorAll('.menu-item a');
      menuItemList[menuItemList.length - 1].addEventListener('focusout', (event) => {
        if ( menu.classList.contains('is-open') ) {
          menuItemList[0].focus();
        }
      });
    }
  };

  /*------ Content Overlay ------*/
  const overlay = document.querySelector('.overlay');
  
  if ( overlay ) {
    const overlayClose = overlay.querySelector('.button--close');
    const overlayContents = overlay.querySelector('.overlay-content');

    // Dismiss menu
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

    function closeOverlay() {
      overlay.classList.remove('is-open', 'loaded');
      overlayClose.setAttribute('tabindex','-1');
      overlayContents.innerHTML = '';
    };
  }

  /*------ Portfolio Sidebar Image Grid Load ------*/
  const portfolio_sidebar_grid = document.querySelector('.page-template-portfolio-sidebar.page-child .masonry');
  imagesLoaded(portfolio_sidebar_grid, function() {
    portfolio_sidebar_grid.classList.add('loaded');
  });

  /*------ Draw SVG icons -------*/
  // Draw svg icons
  const initWalkway = (sel) => {
    const icon = new Walkway({
      selector: sel,
      duration: '3000',
      easing: t => t // linear
    });
    icon.draw();
  };
});