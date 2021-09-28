window.addEventListener('DOMContentLoaded', () => {
  const leftSlider = document.querySelector('.slider-vertical__left');
  const leftSlides = leftSlider.querySelectorAll('.swiper-slide');
  let slidesToShow = 3;
  let centerMode = true;

  if ( leftSlides.length < 3 ) {
    centerMode = false;
  } else {
    slidesToShow = 7;
  }

  // Left-side slider
  const leftSwiper = new Swiper(leftSlider, {
    centeredSlides: true,
    direction: 'horizontal',
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    slidesPerView: 1,
    slidesPerGroup: 1, 
    spaceBetween: 16,
    watchOverflow: true,
    breakpoints: {
      599: {
        centeredSlides: true,
        direction: 'horizontal',
        slidesPerView: 3,
      },
      782: {
        centeredSlides: centerMode,
        direction: 'vertical',
        slidesPerView: slidesToShow,
      },
    }
  });

  // Right-side slider
  let rightSwiper;
  let rightSideOptions = {
    autoHeight: false,
    centeredSlides: false,
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    loop: true,
    slidesPerView: 1,
  };

  rightSwiper = new Swiper(document.querySelector('.slider-vertical__right:not(.adaptive-height)'), rightSideOptions);

  if (document.querySelector('.slider-vertical__right.adaptive-height')) {
    rightSideOptions.autoHeight = true;
    rightSwiper = new Swiper(document.querySelector('.slider-vertical__right.adaptive-height'), rightSideOptions);
  }

  // Control right with left
  leftSwiper.on('slideChange', function () {
    rightSwiper.slideToLoop(leftSwiper.realIndex);
  });
});


// jQuery(function(){

//   // Vertical slider (Portfolio)
//   var slidesLeft = jQuery('.slider-vertical__left > div');
//   var slidesToShow = 1;
//   var centerMode = true;
  
//   if ( slidesLeft.length < 3 ) {
//     centerMode = false;
//   } else {
//     slidesToShow = 3;
//   }

//   jQuery('.slider-vertical__left').slick({
//     arrows: true,
//     asNavFor: '.slider-vertical__right',
//     autoplay: false,
//     centerMode: centerMode,
//     focusOnSelect: true,
//     infinite: true,
//     prevArrow: '<button type="button" class="slick-prev" aria-label="Previous Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg></button>',
//     nextArrow: '<button type="button" class="slick-next" aria-label="Next Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>',
//     rows: 0,
//     slidesToShow: slidesToShow,
//     vertical: true,
//     verticalSwiping: true,
//     responsive: [
//       {
//         breakpoint: 782,
//         settings: {
//           centerMode: true,
//           centerPadding: '16px',
//           prevArrow: '<button type="button" class="slick-prev" aria-label="Previous Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>',
//           nextArrow: '<button type="button" class="slick-next" aria-label="Next Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>',
//           rows: 0,
//           slidesToShow: 3,
//           vertical: false, 
//           verticalSwiping: false,
//         }
//       },
//       {
//         breakpoint: 599,
//         settings: {
//           centerMode: true,
//           centerPadding: '16px',
//           prevArrow: '<button type="button" class="slick-prev" aria-label="Previous Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>',
//           nextArrow: '<button type="button" class="slick-next" aria-label="Next Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>',
//           rows: 0,
//           slidesToShow: 1,
//           vertical: false, 
//           verticalSwiping: false,
//         }
//       }
//     ]
//   });

//   // Right-side slider
//   var rightSideOptions = {
//     adaptiveHeight: false,
//     arrows: false,
//     autoplay: false,
//     fade: true,
//     infinite: true,
//     rows: 0,
//     slidesToShow: 1,
//     swipe: false
//   };
//   jQuery('.slider-vertical__right:not(.adaptive-height)').slick(rightSideOptions);

//   if (jQuery('.slider-vertical__right.adaptive-height')) {
//     rightSideOptions.adaptiveHeight = true;
//     jQuery('.slider-vertical__right.adaptive-height').slick(rightSideOptions);
//   }
  
//   // Right-side slider within slider (content gallery)
//   jQuery('.page-template-portfolio-item .slider-vertical__right .slider').slick({
//     adaptiveHeight: true,
//     arrows: false,
//     autoplay: false,
//     dots: true,
//     fade: true,
//     focusOnSelect: true,
//     infinite: false,
//     prevArrow: '<button type="button" class="slick-prev" aria-label="Previous Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>',
//     nextArrow: '<button type="button" class="slick-next" aria-label="Next Item"><svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>',
//     rows: 0,
//     slidesToShow: 1,
//     swipe: false // "true" doesn't play nicely with iframes
//   });
//   // Refresh the right-side slider so it can recalculate 
//   // its size after its child slider has initialized.
//   jQuery('.slider-vertical__right').slick('refresh');

  
  
//   /**
//   * FIX JUMPING ANIMATION
//   * Set special animation class on first or last clone.
//   * https://github.com/kenwheeler/slick/issues/3419
//   */

//   var sliders = jQuery('.slider-vertical__left');

//   sliders.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
//     var 
//       direction,
//       slideCountZeroBased = slick.slideCount - 1;

//     if (nextSlide == currentSlide) {
//       direction = "same";

//     } else if (Math.abs(nextSlide - currentSlide) == 1) { // 1 or -1
//       if (slideCountZeroBased === 1) { // If there's only two slides
//         direction = "duo";
//       } else { // More than two slides
//         direction = (nextSlide - currentSlide > 0) ? "right" : "left"; 
//       }
//     } else { // e.g., slide 0 to slide 6
//       direction = (nextSlide - currentSlide > 0) ? "left" : "right";
//     }

//     // Add a temp CSS class for the slide animation (.slick-current-clone-animate)
//     if (direction == 'duo') {  
//       jQuery('.slick-cloned[data-slick-index="' + (nextSlide + slideCountZeroBased + 1) + '"]', sliders).addClass('slick-current-clone-animate');

//       jQuery('.slick-cloned[data-slick-index="' + (nextSlide - slideCountZeroBased - 1) + '"]', sliders).addClass('slick-current-clone-animate');
//     }

//     if (direction == 'right') {  
//       jQuery('.slick-cloned[data-slick-index="' + (nextSlide + slideCountZeroBased + 1) + '"]', sliders).addClass('slick-current-clone-animate');
//     }

//     if (direction == 'left') {
//       jQuery('.slick-cloned[data-slick-index="' + (nextSlide - slideCountZeroBased - 1) + '"]', sliders).addClass('slick-current-clone-animate');
//     }
//   });

//   sliders.on('afterChange', function (event, slick, currentSlide, nextSlide) {
//     jQuery('.slick-current-clone-animate', sliders).removeClass('slick-current-clone-animate');
//   });


//   /**
//    * Supports svg drawing in a slider
//    * 
//    */
//   var svgFirst, svgActive;
//   var hasIcons = jQuery('#walkway.slider');

//   // If we know there will be icons, init Walkway on the first slide
//   if ( hasIcons.length ) {
//     var firstIcon = '#walkway svg:first-of-type';
//     svgFirst = new Walkway({
//       selector: firstIcon,
//       duration: '3000',
//       easing: t => t // linear
//     });
//     svgFirst.draw();

//     // On slide change
//     jQuery('.slider-vertical__right').on('beforeChange', function(event, slick, currentSlide, nextSlide){
//       var activeSlideIcon = `.slick-slide[data-slick-index="${nextSlide}"] svg`;
//       svgActive = new Walkway({
//         selector: activeSlideIcon,
//         duration: '3000',
//         easing: t => t // linear
//       });
//       svgActive.draw();
//     });
//   }

// });