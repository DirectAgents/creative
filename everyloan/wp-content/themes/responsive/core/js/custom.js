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

	(function() {
		
		$('#menu-topmenu-1').find('a').click(function() {
			
			var sub_menu = $(this).next('.sub-menu');
			console.log('link clicked');
			if ( sub_menu.length != 0 )
				sub_menu.slideToggle('fast');

		});

	})();

});