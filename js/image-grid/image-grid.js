window.addEventListener('DOMContentLoaded', function() {
  const images = document.querySelectorAll('.masonry img');
  const icons = document.querySelectorAll('#walkway');
  const overlay = document.querySelector('.overlay');

  images.forEach(image => {
    image.addEventListener('click', () => {
      overlay.classList.add('is-open');
      overlay.querySelector('.button--close').setAttribute('tabindex','0');

      if ( icons.length ) {
        const svg = new Walkway({
          selector: '#walkway',
          duration: '500',
          easing: t => t // linear
        });
        svg.draw(function() {
          const img_src = image.getAttribute('data-overlay');
          const img_srcset = image.getAttribute('srcset');
          const img_sizes = '100vw';
          const img_alt = image.getAttribute('alt');
          const img_name = image.getAttribute('data-name');
          const img_desc = image.getAttribute('data-caption');
      
          if ( overlay ) {
            if ( img_src ) {
              overlay.querySelector('.overlay-content').insertAdjacentHTML('beforeend', '<img src="' + img_src + '" />');
    
              if ( img_alt ) {
                overlay.querySelector('.overlay-content img').setAttribute('alt', img_alt);    
              }
              if ( img_srcset ) {
                overlay.querySelector('.overlay-content img').setAttribute('srcset', img_srcset);    
              }
              if ( img_sizes ) {
                overlay.querySelector('.overlay-content img').setAttribute('sizes', img_sizes);    
              }
            }
      
            imagesLoaded(overlay, function() {
              overlay.classList.add('loaded');
              
              if ( img_name ) {
                setTimeout(() => {
                  overlay.querySelector('.overlay-content').insertAdjacentHTML('beforeend', '<div class="overlay-content__title uppercase">' + img_name + '</div>');
                }, 100);
              }
        
              if ( img_desc ) {
                setTimeout(() => {
                  overlay.querySelector('.overlay-content').insertAdjacentHTML('beforeend', '<p class="overlay-content__caption supplemental">' + img_desc + '</p>');
                }, 100);
              }
            });
          }
        });
      }
    });
  });
});