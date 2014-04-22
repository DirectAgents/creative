jQuery(function($) {

	var $form_cont = $('#rs-contact'),
		$form = $('#rs-form');
		
	(function() {
//Cache some 		
		$('.sliding-contact-btn').toggle(
			
			function() { $form_cont.animate({ 'right' : '0px' }); },
			function() { $form_cont.animate({ 'right' : '-400px' }); }
		);
	})();
	
	// Ajax functionality for sliding contact form
	(function() {

		$ajax_img = $('.ajax-loader');
		$ajax_img.hide();
		
		$('.rs-submit').click(function(e) {
			
			// Front end validation for form fields
			// Make sure fields dont have deault values and aren't empty
			// var valid_fields = validate_fields();
			// if (!valid_fields) 
			// {
			// 	console.log('ERROR:Some form fields are empty');
			// 	return false;
			// }

			$ajax_img.show();
			
			var values = get_form_values();
			//console.log(values);
			jQuery.post(
			    
			    ajax_url.ajax_url, 
			    {
			        'action': 'rs_submit_slide_form',
			        'data':   values
			    }, 

			    function(response){

			        console.log('Server response ' + response);
			        $ajax_img.hide();
			        $('.img-ajax-cont').append('<p>Thank you! Your message was recieved!</p>');
			    }
			);

			return false;
		});
		
	})();

	// Empty text field functionality
	(function() {
		
		$form.find('.rs-form-field').each(function() {
			switch ($(this).val())
			{
				case 'Name':
					check_value($(this), 'Name');
					break;

				case 'Email Address':
					check_value($(this), 'Email Address');
					break;

				case 'Company':
					check_value($(this), 'Company');
					break;

				case 'Phone Number':
					check_value($(this), 'Phone Number');
					break;

				case 'Message':
					check_value($(this), 'Message');
					break;
			}
		});
	})();

	//Helper function for toggling empty fields
	function check_value($el, field_val)
	{
		$el.click(function() { 
    		if ($(this).val() == field_val) $(this).data('original', $(this).val()).val('');
	    });

		$el.blur(function() { 
		    if ($(this).val() == '') $(this).val($(this).data('original'));
		});
	}

	// Populate the $form_field_values array
	function get_form_values ()
	{	
		var field_name = '',
			$form_field_values = 
			{ 
				name: '', 
				email: '', 
				company: '',
				tel: '',
				message: '' 
			};

		$form.find('.rs-form-field').each(function() {
			
			field_name = $(this).attr('name');
			$form_field_values[field_name] = $(this).val();
		});

		return $form_field_values;
	}

	function validate_fields ()
	{
		$form.find('.rs-form-field').each(function() {

			//Check if any required fields are empty
			// if ($(this).val() == '' && $(this).hasClass('required')) 
			// {
			// 	empty_field_error( $(this).attr('name') );
			// 	console.log('ERROR: The ' + $(this).attr('name') + ' field is empty');
			// 	return false;
			// }

			/******* ERROR is somewhere here ********/
			// switch ($(this).val())
			// {
			// 	case 'Name':
					
			// 		empty_field_error( $(this).attr('name') );
			// 		return false;
					
			// 	case 'Email Address':
			// 		empty_field_error( $(this).attr('name') );
			// 		return false;

			// 	case 'Message':
			// 		empty_field_error( $(this).attr('name') );
			// 		return false;
			
			// }

			return true;
		});
	}

	function empty_field_error (field_name)
	{
		alert ('The ' + field_name + ' field cannot be empty');
	}

});