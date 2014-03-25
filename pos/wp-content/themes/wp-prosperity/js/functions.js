/**
 * Functionality specific to theme.
 *
 * Provides helper functions to enhance the theme experience.
 */

(function($){

	// Superfish
	jQuery('ul.nav-menu').superfish({ 
		delay:	100,							// delay on mouseout 
		animation:	{opacity:'show', height:'show'},	// fade-in and slide-down animation 
		speed:	'fast',						// speed of the opening animation. Equivalent to second parameter of jQuery's .animate() method
		speedOut:	'fast',						// speed of the closing animation. Equivalent to second parameter of jQuery's .animate() method
		cssArrows:	false							// disable generation of arrow mark-up
	});

	// Add active class for toggles and accordions
	jQuery('.toggle-panel').on('show.bs.collapse', function (e) {
		jQuery(e.target).prev('.toggle-heading').find('.toggle-toggle').addClass('active');
	});

	// Remove active class for toggles and accordions
	jQuery('.toggle-panel').on('hide.bs.collapse', function (e) {
		jQuery(this).find('.toggle-toggle').not($(e.target)).removeClass('active');
	});

	// Button to display search form
	jQuery(".search-button").click(function(){
		jQuery(".topnav-search").slideToggle("fast");
		jQuery(this).toggleClass("active");
		return false;
	});

	// Tooltips
	jQuery("[data-toggle='tooltip']").tooltip();

	// Open external links in new window
	jQuery('a[rel*=external]').click(function() {
		window.open(this.href);
		return false;
	});

	// Scroll to top link 
	jQuery(document).ready(function() {
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('#backtotop').fadeIn(duration);
			} else {
				jQuery('#backtotop').fadeOut(duration);
			}
		});
		jQuery('#backtotop').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
	});

	// Gallery Slider
	jQuery(document).ready(function() {
		jQuery('.galleryslider .flexslider').flexslider({
			animationLoop:true,
			animationSpeed:500,
			animation:'fade',
			slideshow: true,
			controlNav: 'thumbnails',
			smoothHeight:false,
			useCSS:false,
			pauseOnAction: true,
			pauseOnHover: true,
		});
	});

	// PostSlide Shortcode
	jQuery(document).ready(function() {
		jQuery('.postslider .flexslider').flexslider({
			animationLoop:true,
			animationSpeed:300,
			animation:'slide',
			slideshow: false,
			controlNav: true,
			smoothHeight:true,
			useCSS:false,
			pauseOnAction: true,
			pauseOnHover: true,
		});
	});


	// Fixed Navigation
	jQuery(document).ready(function() {
		jQuery(window).scroll(function() {
			var yPos = ( jQuery(window).scrollTop() );
			if(yPos > 200) { // show fixed nav bar after screen has scrolled down 200px from the top
				jQuery(".nav-fixed").fadeIn('fast');
			} else {
				jQuery(".nav-fixed").fadeOut('fast');
			}
		});
	});


	// Menu toggle for mobile devices - top navbar.
	(function(){
		var nav = $('.nav-primary'), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '#topnav' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		jQuery( '.nav-primary .menu-toggle' ).on( 'click.themebeagle', function() {
			nav.toggleClass( 'toggled-on', 300 );
		} );

	})();

	// Menu toggle for mobile devices - header nav bar.
	(function() {
		var nav = $( '.nav-secondary' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '#secnav' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		jQuery( '.nav-secondary .menu-toggle' ).on( 'click.themebeagle', function() {
			nav.toggleClass( 'toggled-on', 300 );
		});

	})();

	// Menu toggle for mobile devices - fixed nav bar.
	(function() {
		var nav = $( '.nav-fixed' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '#fixednav' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		jQuery( '.nav-fixed .menu-toggle' ).on( 'click.themebeagle', function() {
			nav.toggleClass( 'toggled-on', 300 );
		});

	})();


	jQuery(document).ready(function() {

		// adding Active class to first selected tab and show
		jQuery(".tabs-top ul.nav-tabs li:first").addClass("active").show(); 

		// adding Active class to first selected tab and show
		jQuery(".tabs-top div.tab-pane:first").addClass("in active").show();

		// adding Active class to first selected tab and show
		jQuery(".tabs-left ul.nav-tabs li:first").addClass("active").show(); 

		// adding Active class to first selected tab and show
		jQuery(".tabs-left div.tab-pane:first").addClass("in active").show(); 
	});

	// These are functions only for the theme demo
	jQuery(".nav-menu .darkheader").click(function(){
		jQuery('body').addClass('darkheader');
		return false;
	});
	jQuery(".nav-menu .lightheader").click(function(){
		jQuery('body').removeClass('darkheader');
		return false;
	});
	jQuery(".nav-menu .unboxed").click(function(){
		jQuery('body').addClass('unboxed');
		return false;
	});
	jQuery(".nav-menu .boxed").click(function(){
		jQuery('body').removeClass('unboxed');
		return false;
	});
	jQuery(".nav-menu .thumb-left").click(function(){
		jQuery('.standard-blog article.post').addClass('thumbs-left');
		jQuery('.standard-blog article.post').removeClass('thumbs-right');
		return false;
	});
	jQuery(".nav-menu .thumb-right").click(function(){
		jQuery('.standard-blog article.post').addClass('thumbs-right');
		jQuery('.standard-blog article.post').removeClass('thumbs-left');
		return false;
	});
	jQuery(".nav-menu .thumb-top").click(function(){
		jQuery('.standard-blog article.post').removeClass('thumbs-right');
		jQuery('.standard-blog article.post').removeClass('thumbs-left');
		return false;
	});
	// End theme demo functions

	// Function for Youtube Videos Slider
	function callPlayer(frame_id, func, args) {
		if (window.jQuery && frame_id instanceof jQuery) frame_id = frame_id.get(0).id;
		var iframe = document.getElementById(frame_id);
		if (iframe && iframe.tagName.toUpperCase() != 'IFRAME') {
			iframe = iframe.getElementsByTagName('iframe')[0];
		}
		// When the player is not ready yet, add the event to a queue
		// Each frame_id is associated with an own queue.
		// Each queue has three possible states:
		//  undefined = uninitialised / array = queue / 0 = ready
		if (!callPlayer.queue) callPlayer.queue = {};
		var queue = callPlayer.queue[frame_id],
			domReady = document.readyState == 'complete';

		if (domReady && !iframe) {
			// DOM is ready and iframe does not exist. Log a message
			window.console && console.log('callPlayer: Frame not found; id=' + frame_id);	
			if (queue) clearInterval(queue.poller);
		} else if (func === 'listening') {
			// Sending the "listener" message to the frame, to request status updates	
			if (iframe && iframe.contentWindow) {
				func = '{"event":"listening","id":' + JSON.stringify(''+frame_id) + '}';
				iframe.contentWindow.postMessage(func, '*');
			}
		} else if (!domReady || iframe && (!iframe.contentWindow || queue && !queue.ready)) {
			if (!queue) queue = callPlayer.queue[frame_id] = [];
			queue.push([func, args]);
			if (!('poller' in queue)) {
				// keep polling until the document and frame is ready
				queue.poller = setInterval(function() {
					callPlayer(frame_id, 'listening');
				}, 250);
				// Add a global "message" event listener, to catch status updates:
				messageEvent(1, function runOnceReady(e) {
					var tmp = JSON.parse(e.data);
					if (tmp && tmp.id == frame_id && tmp.event == 'onReady') {
						// YT Player says that they're ready, so mark the player as ready
						clearInterval(queue.poller);
						queue.ready = true;
						messageEvent(0, runOnceReady);
						// .. and release the queue:
						while (tmp = queue.shift()) {
							callPlayer(frame_id, tmp[0], tmp[1]);
						}
					}
				}, false);
			}
		} else if (iframe && iframe.contentWindow) {
			// When a function is supplied, just call it (like "onYouTubePlayerReady")
			if (func.call) return func();
			// Frame exists, send message
			iframe.contentWindow.postMessage(JSON.stringify({
				"event": "command",
				"func": func,
				"args": args || [],
				"id": frame_id
			}), "*");
		}

		/* IE8 does not support addEventListener... */
		function messageEvent(add, listener) {
			var w3 = add ? window.addEventListener : window.removeEventListener;	
			w3 ?
				w3('message', listener, !1)
			:
				(add ? window.attachEvent : window.detachEvent)('onmessage', listener);
		}
	}

})(jQuery);