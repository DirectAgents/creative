$(function() {

	(function() {
		
		// Only works on advice and articles page
		if ( !$('body').hasClass('page-id-244')) return;

		$('#advice-select').change(function() {
			//console.log(window.location.hostname);
			//console.log(window.location.pathname);

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

});