jQuery(function($) {
	
	
	function randomInt(min, max)
{
    return Math.floor(Math.random() * (max - min + 1) + min);
}
	
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

	/* Temp Fix for logo URL */
	(function() {
		var logoURL = $('.site-branding a').attr('href');
		var newStr = logoURL.replace('/dasite', '');
		$('.site-branding a').attr('href', newStr);

	})();
	
	
	

	/* Render tabs from the gravity form */
	(function() {

		$('#gf_step_1_1, #gf_step_1_2').find('.gf_step_number').remove();
		setInterval(setTabs, 2000);
		
		
		
		function setTabs ()
		{	
			//delete the extra numbers in the form tabs
			$('#gf_step_1_1, #gf_step_1_2').find('.gf_step_number').remove();
			$('.validation_error').prependTo('.gform_body');
			
			    
	
		}
	
	})();

	// Map the tabs to the forms buttons
	(function() {
		$('#lp-form-container').on('click', '.gf_step_previous', function() {
			//console.log('clicked');
			$('.gform_previous_button').click();
		});

		$('#lp-form-container').on('click', '.gf_step_next', function() {
			//console.log('clicked');
			$('.gform_next_button').click();
			
			
		});

	})();

});