window.addEventListener('DOMContentLoaded', () => {
  const rightSlider = document.querySelector('.slider-vertical__right');
  const leftSlider = document.querySelector('.slider-vertical__left .swiper');
  const leftSlides = leftSlider.querySelectorAll('.swiper-slide');
  const hasIcons = document.querySelector('#walkway.swiper');
  let slidesToShow = 3;
  let centerMode = true;

  if ( leftSlides.length < 3 ) {
    centerMode = false;
    slidesToShow = leftSlides.length;
  } else {
    slidesToShow = 5;
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
    slideToClickedSlide: true,
    slidesPerView: 1,
    slidesPerGroup: 1, 
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

  rightSwiper = new Swiper('.slider-vertical__right:not(.adaptive-height)', rightSideOptions);

  if (document.querySelector('.slider-vertical__right.adaptive-height')) {
    rightSideOptions.autoHeight = true;
    rightSwiper = new Swiper('.slider-vertical__right.adaptive-height', rightSideOptions);
  }

  // Control right with left
  leftSwiper.on('slideChange', function () {
    rightSwiper.slideToLoop(leftSwiper.realIndex);

    // Init Walkway on slide change
    if ( hasIcons ) {
      const activeSlideIcon = `.swiper-slide[data-swiper-slide-index="${leftSwiper.realIndex}"] svg`;
      initWalkway(activeSlideIcon, '2500');
    }
  });

  // If we know there will be icons, init Walkway on the first slide
  if ( hasIcons ) {
    initWalkway('#walkway svg:first-of-type', '2500');
  }
  
  // Right-side slider within slider (content gallery)
  const rightSwiperNested = new Swiper('.page-template-portfolio-item .slider-vertical__right .swiper', {
    autoHeight: true,
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    nested: true,
    pagination: {
      bulletElement: 'li',
      clickable: true,
      el: '.swiper-pagination',
      type: 'bullets',
    },
    slidesPerView: 1,
  });
});