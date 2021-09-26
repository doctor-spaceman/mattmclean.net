"use strict";

window.addEventListener('DOMContentLoaded', function () {
  var images = document.querySelectorAll('.masonry img');
  var icons = document.querySelectorAll('#walkway');
  var overlay = document.querySelector('.overlay');
  images.forEach(function (image) {
    image.addEventListener('click', function () {
      overlay.classList.add('is-open');
      overlay.querySelector('.button--close').setAttribute('tabindex', '0');

      if (icons.length) {
        var svg = new Walkway({
          selector: '#walkway',
          duration: '500',
          easing: function easing(t) {
            return t;
          } // linear

        });
        svg.draw(function () {
          var img_src = image.getAttribute('data-overlay');
          var img_srcset = image.getAttribute('srcset');
          var img_sizes = '100vw';
          var img_alt = image.getAttribute('alt');
          var img_name = image.getAttribute('data-name');
          var img_desc = image.getAttribute('data-caption');

          if (overlay) {
            if (img_src) {
              overlay.querySelector('.overlay-content').insertAdjacentHTML('beforeend', '<img src="' + img_src + '" />');

              if (img_alt) {
                overlay.querySelector('.overlay-content img').setAttribute('alt', img_alt);
              }

              if (img_srcset) {
                overlay.querySelector('.overlay-content img').setAttribute('srcset', img_srcset);
              }

              if (img_sizes) {
                overlay.querySelector('.overlay-content img').setAttribute('sizes', img_sizes);
              }
            }

            imagesLoaded(overlay, function () {
              overlay.classList.add('loaded');

              if (img_name) {
                overlay.querySelector('.overlay-content').insertAdjacentHTML('beforeend', '<div class="overlay-content__title uppercase">' + img_name + '</div>');
              }

              if (img_desc) {
                overlay.querySelector('.overlay-content').insertAdjacentHTML('beforeend', '<p class="overlay-content__caption supplemental">' + img_desc + '</p>');
              }
            });
          }
        });
      }
    });
  });
});