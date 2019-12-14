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
    
    //----------NAV BAR BEHAVIOR----------
	var heroBottom = $('.hero').height() / 6; // point where I want style change to occur
	var navStyle = function() {
        var stopPosition = Math.round($(window).scrollTop()); // use rounding to improve performance
    	var overlayStatus = $('.screen-overlay').css('display');
    	
    	// Change nav bar style when far enough down page and if mobile menu overlay is not active
        if (stopPosition > heroBottom && overlayStatus == 'none') {
            $('.nav-container').addClass('past-hero');
        // Otherwise, don't change style
        } else {
            $('.nav-container').removeClass('past-hero');
        }		
	}

	// On scroll
	$(window).on('scroll', function() { navStyle(); } );
	// On page load or refresh
    $(window).load( function() { navStyle(); } );
    
    //----------MENU BEHAVIOR----------
	// Define how mobile menu is toggled
	var toggleMenu = function () {
	    $('#navIcon').toggleClass('open');
	    $('.screen-overlay').toggle();
	    $('.main-menu').toggleClass('mobile-menu');
		$('.main-menu--vertical').toggleClass('mobile-menu');
		$('.sidebar-nav-container').toggleClass('past-hero');
	    // Check nav bar style
	    navStyle();
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

// Tracking Notice
jQuery(document).ready(function($) {
	var trackOptOutStr = 'mmtrackingoptout',
		trackOptInStr = 'mmtrackingoptin',
		trackOptOut = mmmGetCookie( trackOptOutStr );
		trackOptIn = mmmGetCookie( trackOptInStr );

    $('#cookieNotice .button').on('click', function() {
		// Opted out
		if ( $(this).attr('data-track') == 'opt-out' ) {
			if ( trackOptIn ) {
				mmmRemoveCookie(trackOptInStr);
			}
			mmmSetCookie(trackOptOutStr, 1, 10950);
			removeCookieBanner();
		}
		// Opted In
        if ( $(this).attr('data-track') == 'opt-in' ) {
			if ( trackOptOut ) {
				mmmRemoveCookie(trackOptOutStr);
			}
			mmmSetCookie(trackOptInStr, 1, 10950);
			removeCookieBanner();
			setTimeout(function(){
				window.location.reload(); // Reload page so tracking scripts will get added
			});
		}
    });
});
// END / Tracking Notice

// Cookie Helpers
function removeCookieBanner() {
	jQuery('#cookieNotice').remove();
	jQuery('body').removeClass('has-cookie-msg');
}

function mmmGetCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return '';
}

function mmmSetCookie(cname, cvalue, exdays, path) {
    if (undefined === path) {
      path = '/'
    }

    var expires = 'expires=';

    if (-1 === exdays) {
      expires += null;
    } else {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      expires += d.toUTCString();
    }

    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=" + path;
}

// This function deletes a cookie.
function mmmRemoveCookie( cname ) {
    if( mmmGetCookie( cname ) ) {
        var expires = "expires=Thu, 01 Jan 1970 00:00:01 GMT";
        document.cookie = cname + "=;" + expires + ";" + "path=/";
    }
}
// END / Cookie Helpers