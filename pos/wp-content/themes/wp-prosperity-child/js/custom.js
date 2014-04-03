jQuery(function($) {
	
	(function() {
		
		// Only works on case studies
		if ( !$('body').hasClass('single-rs_case_studies') ) return;
		
		// Find the post ID
		var body_classes = $('body').attr('class').toString(),
			ID = body_classes.match(/postid-([0-9]*)/)[1];
		
		// Make the current case study bold and disable click
		$('.tm-latest-updates').find('.post-' + ID + ' a')

			.addClass('current-case-study')
			.click(function() {
				return false;
			});
	
	})();

});