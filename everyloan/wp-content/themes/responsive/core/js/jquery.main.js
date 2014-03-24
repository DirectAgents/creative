$(function(){
    //original field values
    var field_values = {
            //id        :  value
            'type_of_loan'  : 'type_of_loan',
			'credit_score'  : 'credit_score',
			'username'  : 'username',
            'password'  : 'password',
            'cpassword' : 'password',
            'firstname'  : 'first name',
            'lastname'  : 'last name',
            'email'  : 'email address'
    };


    //inputfocus
    $('input#type_of_loan').inputfocus({ value: field_values['type_of_loan'] });
	$('input#credit_score').inputfocus({ value: field_values['credit_score'] });
	//$('input#username').inputfocus({ value: field_values['username'] });
    $('input#password').inputfocus({ value: field_values['password'] });
    $('input#cpassword').inputfocus({ value: field_values['cpassword'] }); 
    $('input#lastname').inputfocus({ value: field_values['lastname'] });
    $('input#firstname').inputfocus({ value: field_values['firstname'] });
    $('input#email').inputfocus({ value: field_values['email'] }); 




    //reset progress bar
    $('#progress').css('width','0');
    $('#progress_text').html('0% Complete');

    //first_step
    $('form').submit(function(){ return false; });
   
   
    $('#submit_first').click(function(){
        //remove classes
        $('#first_step input').removeClass('error').removeClass('valid');

        //ckeck if inputs aren't empty
        var fields = $('#first_step select, #first_step input[type=text], #first_step input[type=password]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<4 || value==field_values[$(this).attr('id')] ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
            if( $('#password').val() != $('#cpassword').val() ) {
                    $('#first_step input[type=password]').each(function(){
                        $(this).removeClass('valid').addClass('error');
                        $(this).effect("shake", { times:3 }, 50);
                    });
                    
                    return false;
            } else {   
                //update progress bar
                $('#progress_text').html('13% Complete');
                $('#progress').css('width','13px');
                
                //slide steps
				
			
				
				 $('#first_step').hide();
				 $('#second_step').show();
            }               
        } else return false;
    });







    $('#submit_first_personal').click(function(){
        //remove classes
        $('#first_step input').removeClass('error').removeClass('valid');

        //ckeck if inputs aren't empty
        var fields = $('#first_step select, #first_step input[type=text], #first_step input[type=password]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<4 || value==field_values[$(this).attr('id')] ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
            if( $('#password').val() != $('#cpassword').val() ) {
                    $('#first_step input[type=password]').each(function(){
                        $(this).removeClass('valid').addClass('error');
                        $(this).effect("shake", { times:3 }, 50);
                    });
                    
                    return false;
            } else {   
                //update progress bar
                $('#progress_text').html('13% Complete');
                $('#progress').css('width','13px');
                
                //slide steps
				
			
				
				 $('#first_step').hide();
				 $('#second_step').show();
            }               
        } else return false;
    });




	 

    $('#submit_second').click(function(){
		
        //remove classes
        $('#second_step input').removeClass('error').removeClass('valid');

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
        var fields = $('#second_step select,#second_step input[type=text]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==field_values[$(this).attr('id')] || ( $(this).attr('id')=='email' && !emailPattern.test(value) ) ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
                //update progress bar
                $('#progress_text').html('23% Complete');
                $('#progress').css('width','23px');
                
                //slide steps
                //$('#second_step').slideUp();
                //$('#third_step').slideDown(); 
				
				//$('#second_step').hide("slide", { direction: "left" }, 1000);
				//$('#third_step').show("slide", { direction: "right" }, 1000); 
				
				$('#second_step').hide();
				 $('#third_step').show();  
				 
				 
				 /*
				 var url = document.URL;
				 var step = '3';
				 a_href = url.replace(/(step=)[^\&]+/, '$1' + step);
				 
				 window.location.href = a_href;
				 */ 
				
				
				
        } else return false;

    });




$('#submit_third_personal').click(function(){
	   
	   
	   
	   
        //remove classes
        $('#third_step input').removeClass('error').removeClass('valid');

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
        var fields = $('#third_step select,#third_step input[type=text]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==field_values[$(this).attr('id')] || ( $(this).attr('id')=='email' && !emailPattern.test(value) ) ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
                //update progress bar
                $('#progress_text').html('33% Complete');
                $('#progress').css('width','33px');
                
                //slide steps
                //$('#second_step').slideUp();
                //$('#third_step').slideDown(); 
				
				//$('#second_step').hide("slide", { direction: "left" }, 1000);
				//$('#third_step').show("slide", { direction: "right" }, 1000); 
				 
				 $('#third_step').hide();
				 $('#fourth_step').show();  
				 
				 
				 
				 
				 
				 
				 var prop_purp = document.getElementById('PROP_PURP');
				 var prop_purp_id = prop_purp.options[prop_purp.selectedIndex].value;
				 
				 
				
      
    

    //set the value of the cookie to the element element_1
				
				 
				 /*
				 var url = document.URL;
				 var step = '4';
				 a_href = url.replace(/(step=)[^\&]+/, '$1' + step +'&PROP_PURP='+prop_purp_id);
				 
				 window.location.href = a_href; 
				*/
				
				
        } else return false;

    });
	



   $('#submit_third_home_refinance').click(function(){
	   
	   
	   
	   
        //remove classes
        $('#third_step input').removeClass('error').removeClass('valid');

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
        var fields = $('#third_step select,#third_step input[type=text]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==field_values[$(this).attr('id')] || ( $(this).attr('id')=='email' && !emailPattern.test(value) ) ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
                //update progress bar
                $('#progress_text').html('33% Complete');
                $('#progress').css('width','33px');
                
                //slide steps
                //$('#second_step').slideUp();
                //$('#third_step').slideDown(); 
				
				//$('#second_step').hide("slide", { direction: "left" }, 1000);
				//$('#third_step').show("slide", { direction: "right" }, 1000); 
				 
				 $('#third_step').hide();
				 $('#fourth_step').show();  
				 
				 
				 
				 
				 
				 
				 var prop_purp = document.getElementById('PROP_PURP');
				 var prop_purp_id = prop_purp.options[prop_purp.selectedIndex].value;
				 
				 
				
      
    

    //set the value of the cookie to the element element_1
				
				 
				 /*
				 var url = document.URL;
				 var step = '4';
				 a_href = url.replace(/(step=)[^\&]+/, '$1' + step +'&PROP_PURP='+prop_purp_id);
				 
				 window.location.href = a_href; 
				*/
				
				
        } else return false;

    });
	
	
	
	
	
	
	
	 $('#submit_third_business').click(function(){
	   
	   
	   
	   
        //remove classes
        $('#third_step input').removeClass('error').removeClass('valid');

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
        var fields = $('#third_step select,#third_step input[type=text]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==field_values[$(this).attr('id')] || ( $(this).attr('id')=='email' && !emailPattern.test(value) ) ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
                //update progress bar
                $('#progress_text').html('33% Complete');
                $('#progress').css('width','33px');
                
                //slide steps
                //$('#second_step').slideUp();
                //$('#third_step').slideDown(); 
				
				//$('#second_step').hide("slide", { direction: "left" }, 1000);
				//$('#third_step').show("slide", { direction: "right" }, 1000); 
				 
				 $('#third_step').hide();
				 $('#fourth_step').show();  
				 
				 
				 
				 
				 
				 
				 var prop_purp = document.getElementById('PROP_PURP');
				 var prop_purp_id = prop_purp.options[prop_purp.selectedIndex].value;
				 
				 
				
      
    

    //set the value of the cookie to the element element_1
				
				 
				 /*
				 var url = document.URL;
				 var step = '4';
				 a_href = url.replace(/(step=)[^\&]+/, '$1' + step +'&PROP_PURP='+prop_purp_id);
				 
				 window.location.href = a_href; 
				*/
				
				
        } else return false;

    });
	
	
	
	
	
	
	
	
	
	
	 $('#submit_fourth').click(function(){
        //update progress bar
        $('#progress_text').html('43% Complete');
        $('#progress').css('width','43px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#fourth_step').hide();
	    $('#fifth_step').show();    
		
		
		/*
		 		 var url = document.URL;
				 var step = '5';
				 a_href = url.replace(/(step=)[^\&]+/, '$1' + step);
				 
				 window.location.href = a_href; 
		 */
		          
    });





    $('#submit_fifth').click(function(){
        //update progress bar
        $('#progress_text').html('53% Complete');
        $('#progress').css('width','53px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#fifth_step').hide();
	    $('#sixth_step').show();     
		
		/*
		 var url = document.URL;
		 var step = '6';
		 a_href = url.replace(/(step=)[^\&]+/, '$1' + step);
				 
		window.location.href = a_href; 
		 */         
    });
	
	
	
	  $('#submit_sixth').click(function(){
        //update progress bar
        $('#progress_text').html('63% Complete');
        $('#progress').css('width','63px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#sixth_step').hide();
	    $('#seventh_step').show();     
		          
    });
	
	
	
	
	
	
	$('#signed_contract').click(function(){
        //update progress bar
        $('#progress_text').html('63% Complete');
        $('#progress').css('width','63px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#real-estate-agent').hide();
	    $('#seventh_step').show();     
		          
    });
	
	
	
	$('#do-you-have-a-second-mortgage').click(function(){
        //update progress bar
        $('#progress_text').html('63% Complete');
        $('#progress').css('width','63px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#sixth_step').hide();
		$('#second-mortgage-balance-step').show();
		          
    });
	
	
	
	
	
	$('#real-estate-agent-step').click(function(){
        //update progress bar
        $('#progress_text').html('63% Complete');
        $('#progress').css('width','63px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#sixth_step').hide();
		$('#real-estate-agent').show();
		          
    });
	
	
	
	$('#submit_second-mortgage-balance').click(function(){
		
        //update progress bar
        $('#progress_text').html('68% Complete');
        $('#progress').css('width','68px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#second-mortgage-balance-step').hide();
		$('#second-mortgage-interest_rate_step').show();
		          
    });
	
	
	
	
	
	$('#submit_second-mortgage-interest_rate_step').click(function(){
        //update progress bar
        $('#progress_text').html('68% Complete');
        $('#progress').css('width','68px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#second-mortgage-interest_rate_step').hide();
		$('#seventh_step').show();
		
		/*
		var url = document.URL;
		 var step = '7';
		 a_href = url.replace(/(step=)[^\&]+/, '$1' + step);
				 
		window.location.href = a_href; 
	*/	          
    });
	
	
	
	
	
	
	 $('#submit_seventh').click(function(){
        //update progress bar
        $('#progress_text').html('73% Complete');
        $('#progress').css('width','73px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#seventh_step').hide();
	    $('#eight_step').show();   
		$('#down_payment_step').show();   
		  
		
		/*
		var url = document.URL;
		 var step = '8';
		 a_href = url.replace(/(step=)[^\&]+/, '$1' + step);
				 
		window.location.href = a_href; 
		*/          
    });
	
	
	
	 $('#agent_info_btn').click(function(){
        //update progress bar
        $('#progress_text').html('73% Complete');
        $('#progress').css('width','73px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#agent_info').hide();
	    $('#down_payment_step').show();     
		
		/*
		var url = document.URL;
		 var step = '8';
		 a_href = url.replace(/(step=)[^\&]+/, '$1' + step);
				 
		window.location.href = a_href; 
		*/          
    });
	
	
	 $('#down_payment_btn').click(function(){
        //update progress bar
        $('#progress_text').html('80% Complete');
        $('#progress').css('width','80px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#down_payment_step').hide();
	    $('#eight_step_home_step').show(); 
		    
		
		/*
		var url = document.URL;
		 var step = '8';
		 a_href = url.replace(/(step=)[^\&]+/, '$1' + step);
				 
		window.location.href = a_href; 
		*/          
    });
	
	
	
	
	
	
	
	
	
	
	 $('#submit_eight').click(function(){
        //update progress bar
        $('#progress_text').html('83% Complete');
        $('#progress').css('width','95px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#eight_step').hide();
	    $('#ninth_step').show();  
		
		$('#eight_step_home_step').hide();   
		
		
		/*
		var url = document.URL;
		 var step = '9';
		 a_href = url.replace(/(step=)[^\&]+/, '$1' + step);
				 
		window.location.href = a_href; 
		*/          
    });
	
	
	
	 $('#submit_ninth').click(function(){
        //update progress bar
        $('#progress_text').html('93% Complete');
        $('#progress').css('width','130px');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#ninth_step').hide();
	    $('#tenth_step').show();     
		          
    });
	
	
	
	$('#submit_tenth').click(function(){
        //update progress bar
        $('#progress_text').html('100% Complete');
        $('#progress').css('width','100%');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#tenth_step').hide();
	    $('#eleventh_step').show();     
		          
    });
	
	
	
	
	
	$('#submit_eleventh').click(function(){
        //update progress bar
        $('#progress_text').html('100% Complete');
        $('#progress').css('width','100%');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#eleventh_step').hide();
	    $('#twelth_step').show();   
		$('#last_step_business').show();  
		
		
    });




$('#submit_eleventh_business').click(function(){
        //update progress bar
        $('#progress_text').html('100% Complete');
        $('#progress').css('width','100%');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#eleventh_step').hide();
	    $('#twelth_step').show();   
		$('#last_step_business').show();  
		
		
    });	
	
	
	
	$('#submit_tenth_home').click(function(){
		
        //update progress bar
        $('#progress_text').html('95% Complete');
        $('#progress').css('width','86%');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#tenth_step').hide();
	    $('#eleventh_step').show();   
		$('#last_step_business').show();  
		
		$("#siteloader").html('<object data="http://localhost/directagents/everyloan/github/creative/everyloan/api/leadpoint.html">');
		$('#siteloader').hide();          
    });
	
	
	
	
	
	$('#submit_eleventh_home').click(function(){
        //update progress bar
        $('#progress_text').html('97% Complete');
        $('#progress').css('width','90%');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#eleventh_step_home').hide();
	    $('#twelth_step').show();
		$('#twelth_step_home_steps').show();   
		$('#last_step_business').show();  
		
		
    });
	
	
	
	
	
	$('#submit_twelth_home').click(function(){
        //update progress bar
        $('#progress_text').html('100% Complete');
        $('#progress').css('width','100%');

        //prepare the fourth step
        var fields = new Array(
            $('#type_of_loan').val(),
			$('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        //$('#third_step').slideUp();
        //$('#fourth_step').slideDown();  
		
		//$('#third_step').hide("slide", { direction: "left" }, 1000);
		//$('#fourth_step').show("slide", { direction: "right" }, 1000);  
		
		$('#eleventh_step_home').hide();
	    $('#twelth_step').hide();
		$('#twelth_step_home_steps').hide();   
		$('#last_step_home').show();  
		$('#thirteen_step_home').show();  
		
		
		$('.previous-twelth-home').hide(); 
		$('.previous-eleventh-step').hide();  
		
		$('.previous-last_step_home_btn').show();  
		
		
		
    });
	
	

	
	$('#submit_twelth').click(function(){
        //remove classes
        $('#twelth_step input').removeClass('error').removeClass('valid');

        //ckeck if inputs aren't empty
        var fields = $('#twelth_step select, #twelth_step input[type=text], #twelth_step input[type=password]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<4 || value==field_values[$(this).attr('id')] ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
            if( $('#password').val() != $('#cpassword').val() ) {
                    $('#first_step input[type=password]').each(function(){
                        $(this).removeClass('valid').addClass('error');
                        $(this).effect("shake", { times:3 }, 50);
                    });
                    
                    return false;
            } else {   
                //update progress bar
                $('#progress_text').html('100% Complete');
                $('#progress').css('width','362px');
                
                //slide steps
				
				
		
    
			
				
				 $('#twelth_step').hide();
				 $('#last_step').show();
            }               
        } else return false;
    });
	
	
	
	

    $('#submit_thirteen').click(function(){
        //send information to server
        alert('Data sent');
    });
	
	
	$('#MTG_TWO_YES').change(function(){
		
		$('#submit_sixth').hide();
		$('#do-you-have-a-second-mortgage').show();
	});
	
	$('#MTG_TWO_NO').change(function(){
		
		$('#submit_sixth').show();
		$('#do-you-have-a-second-mortgage').hide();
	});
	
	
	$('#SPEC_YES').change(function(){
		
		$('#submit_sixth').hide();
		$('#real-estate-agent-step').show();
	});
	
	
	$('#SPEC_NO').change(function(){
		
		$('#submit_sixth').show();
		$('#real-estate-agent-step').hide();
	});
	
	
	$('#AGENT_YES').change(function(){
		
		$('#seventh_step').hide();
		$('#agent_info').show();
	});
	
	
	$('#AGENT_NO').change(function(){
		
		$('#seventh_step').show();
		$('#agent_info_home').hide();
	});
	
	
	




if (window.location.search.indexOf('step=2') > -1 && window.location.search.indexOf('loan=home-refinance') > -1) {
 $('#progress_text').html('23% Complete');
 $('#progress').css('width','23px');

}

if (window.location.search.indexOf('step=3') > -1 && window.location.search.indexOf('loan=home-refinance') > -1 ) {
 $('#progress_text').html('33% Complete');
 $('#progress').css('width','33px');

}

if (window.location.search.indexOf('step=4') > -1 && window.location.search.indexOf('loan=home-refinance') > -1 ) {
$('#progress_text').html('43% Complete');
$('#progress').css('width','43px');
}


if (window.location.search.indexOf('step=5') > -1 && window.location.search.indexOf('loan=home-refinance') > -1 ) {
$('#progress_text').html('53% Complete');
$('#progress').css('width','53px');
}


if (window.location.search.indexOf('step=6') > -1 && window.location.search.indexOf('loan=home-refinance') > -1 ) {
$('#progress_text').html('63% Complete');
$('#progress').css('width','63px');
}


if (window.location.search.indexOf('step=7') > -1 && window.location.search.indexOf('loan=home-refinance') > -1 ) {
$('#progress_text').html('73% Complete');
$('#progress').css('width','73px');
}


if (window.location.search.indexOf('step=8') > -1 && window.location.search.indexOf('loan=home-refinance') > -1 ) {
$('#progress_text').html('83% Complete');
$('#progress').css('width','83px');
}


if (window.location.search.indexOf('step=9') > -1 && window.location.search.indexOf('loan=home-refinance') > -1 ) {
$('#progress_text').html('93% Complete');
$('#progress').css('width','88px');
}











	
	
	

$('.previous-second-step').click(function(){
	 $('#second_step').hide();
	 $('#first_step').show(); 
});	 




$('.previous-third-step').click(function(){
	 $('#third_step').hide();
	 $('#second_step').show(); 
});	 
	




$('.previous-fourth-step').click(function(){
	 $('#fourth_step').hide();
	 $('#third_step').show(); 
});	 
	


	
	
$('.previous-fifth-step').click(function(){
	 $('#fifth_step').hide();
	 $('#fourth_step').show(); 
});	 
	




$('.previous-sixth-step').click(function(){
	 $('#sixth_step').hide();
	 $('#fifth_step').show(); 
});	 
	


	
	
$('.previous-seventh-step').click(function(){
	 $('#seventh_step').hide();
	 $('#sixth_step').show(); 
});	 
	




$('.previous-eight-step').click(function(){
	 $('#eight_step').hide();
	 $('#seventh_step').show(); 
});	 
	

	 


$('.previous-eight_step_home').click(function(){
	 $('#eight_step').hide();
	 $('#seventh_step').show(); 
});	 




$('.previous-ninth-step').click(function(){
	 $('#ninth_step').hide();
	 $('#eight_step').show(); 
});	 
	


	
$('.previous-tenth-step').click(function(){
	 $('#tenth_step').hide();
	 $('#ninth_step').show(); 
});	 
	



$('.previous-eleventh-step').click(function(){
	 $('#eleventh_step').hide();
	 $('#tenth_step').show(); 
	 
});	 
	

$('.next-eleventh-step').click(function(){
	 $('#eleventh_step').hide();
	 $('#twelth_step').show(); 
	 
});	 
	
	
	
$('.previous-twelth-step').click(function(){
	 $('#twelth_step').hide();
	 $('#eleventh_step').show(); 
	 $('#eleventh_step_home').show(); 
	 
});	 


$('.previous-twelth-step-home').click(function(){
	 $('#twelth_step').hide();
	 $('#eleventh_step').show(); 
	 $('#eleventh_step_home').show(); 
	 
});	 







$('.previous-last_step_home_btn').click(function(){
	 $('#last_step_home').hide();
	 $('#twelth_step').show(); 
	 
	 $('.previous-twelth-home').show(); 
	 $('.previous-eleventh-step').show();  
	 
	 $('#twelth_step_home').show(); 
	 
});	 






   			
	

});