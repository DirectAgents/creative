jQuery(function($) {
	
	(function() {
		var clicked = false;
		$('.sliding-contact-btn').click(function(){
			if (!clicked)
			{
				$('#wpcf7-f104-o1').animate({
					'right' : '0px'
				});
				clicked = true;
			}
			else
			{
				$('#wpcf7-f104-o1').animate({
					'right' : '-400px'
				});
				clicked = false;
			}

		});
	})();

});