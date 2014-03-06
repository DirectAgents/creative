$(function() {

	(function() {
		
		// Only works on advice and articles page
		if ( !$('body').hasClass('page-id-244')) return;
		
		$('#advice-select').change(function() {
			//console.log(window.location.hostname);
			//console.log(window.location.pathname);
			var url = window.location.toString();
			window.location = url.replace(/(\/page\/)(\d){1}\//, '?advice=' + this.value);
		});



	})();

});