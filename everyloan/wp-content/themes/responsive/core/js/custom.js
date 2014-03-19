$(function() {

	(function() {
		
		// Only works on advice and articles page
		if ( !$('body').hasClass('page-id-244')) return;

		$('#advice-select').change(function() {

			// if url is paged, replace /page/$any_digit/ and ?advice=$any_char with the advice vars
			if (window.location.pathname.match(/(\/page\/)(\d){1}\//))
			{	
				var url = window.location.toString();
				window.location = url.replace(/(\/page\/)(\d){1}\/(\?advice=.+)?/, '?advice=' + this.value);
			}
			else
			{
				window.location.replace('?advice=' + this.value);
			}
		});

	})();

	// Mobile menu adjustments
	(function() {
		
		// Add a sub-menu item that mimics the root anchor
		// if the the link goes somewhere
		$('#menu-topmenu-1 > li a').each(function() {

			var $this = $(this),
				$href = $this.attr('href'),
				$next = $this.next();

			// if the anchor isn't linked exit out early
			if ($href == '#' || $href == '')
				return false;

			if ($next.hasClass('sub-menu'))
			{	
				$next.prepend('<li><a href="' + $href + '">' + $this.text() +'</a></li>');
			}
		});

		// Implement a slide in-out for sub-menus
		$('#menu-topmenu-1').find('a').click(function() {
			
			var $next = $(this).next();

			if ($next.hasClass('sub-menu'))
			{
				$next.slideToggle('fast');
				return false;
			}
			
		});

	})();

});