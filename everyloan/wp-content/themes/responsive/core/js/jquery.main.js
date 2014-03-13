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
				
				
				
        } else return false;

    });





   $('#submit_third').click(function(){
	   
	   
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
		          
    });
	
	
	
	 $('#submit_eight').click(function(){
        //update progress bar
        $('#progress_text').html('83% Complete');
        $('#progress').css('width','83px');

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
        $('#progress').css('width','360px');

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
		
		$("#siteloader").html('<object data="http://localhost/directagents/everyloan/github/creative/everyloan/api/leadpoint.html">');
		$('#siteloader').hide();          
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
				
				
		
		$( "#result" ).load( "http://termlifequotetoday.com/everyloan/wp-content/themes/responsive/business-loan-insert.php" ); 
    
			
				
				 $('#twelth_step').hide();
				 $('#last_step').show();
            }               
        } else return false;
    });
	
	
	
	

    $('#submit_thirteen').click(function(){
        //send information to server
        alert('Data sent');
    });
	
	
	

$('.previous-second-step').click(function(){
	 $('#second_step').hide();
	 $('#first_step').show(); 
});	 

$('.next-second-step').click(function(){
	 $('#second_step').hide();
	 $('#third_step').show(); 
});	 


$('.previous-third-step').click(function(){
	 $('#third_step').hide();
	 $('#second_step').show(); 
});	 
	

$('.next-third-step').click(function(){
	 $('#third_step').hide();
	 $('#fourth_step').show(); 
});	


$('.previous-fourth-step').click(function(){
	 $('#fourth_step').hide();
	 $('#third_step').show(); 
});	 
	

$('.next-fourth-step').click(function(){
	 $('#fourth_step').hide();
	 $('#fifth_step').show(); 
});	 
	
	
$('.previous-fifth-step').click(function(){
	 $('#fifth_step').hide();
	 $('#fourth_step').show(); 
});	 
	

$('.next-fifth-step').click(function(){
	 $('#fifth_step').hide();
	 $('#sixth_step').show(); 
});	 


$('.previous-sixth-step').click(function(){
	 $('#sixth_step').hide();
	 $('#fifth_step').show(); 
});	 
	

$('.next-sixth-step').click(function(){
	 $('#sixth_step').hide();
	 $('#seventh_step').show(); 
});	 
	
	
$('.previous-seventh-step').click(function(){
	 $('#seventh_step').hide();
	 $('#sixth_step').show(); 
});	 
	

$('.next-seventh-step').click(function(){
	 $('#seventh_step').hide();
	 $('#eight_step').show(); 
});	


$('.previous-eight-step').click(function(){
	 $('#eight_step').hide();
	 $('#seventh_step').show(); 
});	 
	

$('.next-eight-step').click(function(){
	 $('#eight_step').hide();
	 $('#ninth_step').show(); 
});	 


$('.previous-ninth-step').click(function(){
	 $('#ninth_step').hide();
	 $('#eight_step').show(); 
});	 
	

$('.next-ninth-step').click(function(){
	 $('#ninth_step').hide();
	 $('#tenth_step').show(); 
});	 
	
	
$('.previous-tenth-step').click(function(){
	 $('#tenth_step').hide();
	 $('#ninth_step').show(); 
});	 
	

$('.next-tenth-step').click(function(){
	 $('#tenth_step').hide();
	 $('#eleventh_step').show(); 
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
});	 
	

				
	

});