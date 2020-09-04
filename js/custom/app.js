// Homepage hero interactive element
const heroGraphic = document.querySelector('.hero-graphic__morph');

function heroClickResponder(e) {
  let el = e.target;
  let typed;
  const typedStrings = [
    'weeks crash by, unseeing', 
    'festooned in metal', 
    'in the limbo of a long sleep',
    'life is a renegotiation',
    'the sizes of infinity',
    'thought without voice',
    'clouds like a page-edge',
    'the story spilt out',
    'the earth, capped, touches light',
    'watching atoms drift by',
    'a steady pulling across',
    'bookended by oceans',
    'a dream unending',
    'the fire-smoke of memories'
  ];
  let typedString;

  // Don't allow subsequent clicks while the response is being displayed
  heroGraphic.removeEventListener('click', heroClickResponder);

  el.classList.add('hero-graphic__morph--clicked');

  // Select a string at random
  typedString = typedStrings[Math.floor(Math.random() * typedStrings.length)]

  // Create typed.js instance
  typed = new Typed('.typed', {
    showCursor: false,
    strings: [typedString],
    typeSpeed: 40  
  });
  
  setTimeout(() => {
    typed.destroy();
    el.classList.remove('hero-graphic__morph--clicked');

    // Re-enable click listener
    heroGraphic.addEventListener('click', heroClickResponder);
  },3000);
}
if ( heroGraphic ) {
  heroGraphic.addEventListener('click', heroClickResponder);
}
// END / Homepage hero interactive element



jQuery(document).ready( function($){
    // Set hero height to browser height
	$('.hero').css( 'height', $(window).height() );
	
	// Re-set hero height to new browser height after window is resized.
	$(window).resize( function () {
	    $('.hero').css( 'height', $(window).height() );
	});
	
	// Hero height for iOS7 due to vh unit bugginess
	var iOS = navigator.userAgent.match(/(iPod|iPhone|iPad)/);
	if(iOS){

		function iosVhHeightBug() {
			var height = $(window).height();
			$('.hero').css('min-height', height);
		}

		iosVhHeightBug();
		$(window).bind('resize', iosVhHeightBug);
	}  

	// Scroll down with chevron icon
	$('a[href*=\\#]').click(function(event){
		// Animate scroll to anchor location
    $('html, body').animate({
      scrollTop: $( $.attr(this, 'href') ).offset().top -50
    }, 500);
    event.preventDefault();
  });
    

  //----------MENU BEHAVIOR----------
	// Define how mobile menu is toggled
	var toggleMenu = function () {
    $('#navIcon').toggleClass('open');
    $('.screen-overlay').toggle();
    $('.main-menu').toggleClass('mobile-menu');
		$('.main-menu--vertical').toggleClass('mobile-menu');
		$('.sidebar-nav-container').toggleClass('past-hero');
	}
	// Enable mobile menu when clicking hamburger icon
	$('#navIcon').click(function() { toggleMenu(); } );
	// Disable mobile menu when clicking anywhere
	$('.screen-overlay').click(function() { toggleMenu(); } );
	
	// Remove mobile menu on window resize
	var updateNavList;
	$(window).resize(function() {	
		updateNavList = $('.main-menu ul').css('flex-direction');
		if (updateNavList == 'row') {
			$('#navIcon').removeClass('open');
			$('.screen-overlay').hide();
			$('.main-menu').removeClass('mobile-menu');
		}
		if ($(window).width() > 639 && $(window).height() > 499) {
			$('.main-menu--vertical').removeClass('mobile-menu');
			$('#navIcon').removeClass('open');
			$('.screen-overlay').hide();
		}
	});
	
	//--------CUSTOM VIDEO CONTENT---------
	//https://github.com/zeusdeux/isInViewport
    $(window).scroll(function() {
		$('video').each(function(){
			if ($(this).is(":in-viewport")) {
				$(this)[0].play();
			} else {
				$(this)[0].pause();
			}
		})
	});
	
});