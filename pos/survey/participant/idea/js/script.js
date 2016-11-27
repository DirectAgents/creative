$(document).ready(function(){




/**Target Audience Step 1**/
 $(".basicinformationsubmit").click(function() {  
//$( "#basic-information" ).submit(function( event ) {
//$("#savepersonalinformation").click(function() {  
//alert("aads"); 
///var btn= $(this).find("input[type=submit]:focus").val();



        //get input field values
        var firstname       = $('input[name=firstname').val();
        var lastname       = $('input[name=lastname').val();
        var user_email       = $('input[name=email').val();
        var country_code  =  $("select[name='country_code']").val();
        var phone_number  =  $('input[name=phone_number').val();
        var location  =  $('input[name=location').val();
        var timezone  =  $("select[name='timezone']").val();
        var short_bio  = $("textarea[name=short_bio]").val();
        var age  =  $('input[name=age').val();
        var height  =  $("select[name='height']").val();
        var status  =  $("select[name='status']").val();
        var gender  =  $("select[name='gender']").val();
        var ethnicity  =  $("select[name='ethnicity']").val();
        var smoke  =  $("select[name='smoke']").val();
        var drink  =  $("select[name='drink']").val();
        var diet  =  $("select[name='diet']").val();
        var religion  =  $("select[name='religion']").val();
        var education  =  $("select[name='education']").val();
        var job  =  $("select[name='job']").val();


        /*var meetupchoice = $('input[name="meetupselection[]"]:checked').map(function () {return this.value;}).get().join(",");
      


        

    
        //var testing       = $('input[name=meetupselection').val();
        //var testing = $('.meetupselection:checked').serialize();
        // $('input[name="meetupselection[]"]').serialize(); /* it can return true or false */


/*
for dropdowns
    $("select[name=MYFIELDNAME]").val();

for radio buttons
$("select[name=MYFIELDNAME]:checked").val();


for textareas
$("textarea[name=MYFIELDNAME]").val();
*/

        //alert(testing);



        var phone=/^(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})$/i;
        var email=/^[A-Za-z0-9]+([_\.-][A-Za-z0-9]+)*@[A-Za-z0-9]+([_\.-][A-Za-z0-9]+)*\.([A-Za-z]){2,4}$/i;
               
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        
       
        if(user_email=="" || !email.test(user_email)){ 
            $('input[name=email]').css('background-color','red');
            output = '<div class="errorXYZ">Please enter a valid Email address</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }
        if(phone_number=="" || !phone.test(phone_number)){   
            $('input[name=phone_number]').css('background-color','red'); 
            output = '<div class="errorXYZ">Please enter a valid Phone Number</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

      
         

        //everything looks good! proceed...
        if(proceed) 
        {
            //alert("asfd");

          //$( ".processing" ).show();
            //data to be sent to server
            post_data = {'firstname':firstname,'lastname':lastname,'user_email':user_email,'country_code':country_code,
'phone_number':phone_number,'location':location,'timezone':timezone,'short_bio':short_bio,
'age':age,'height':height,'status':status,'gender':gender,'ethnicity':ethnicity,'smoke':smoke,
'drink':drink,'diet':diet,'religion':religion,'education':education,'job':job};
            
            //Ajax post data to server
            $.post('Basicinformation.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
         
          output = '<div class="success">'+response.text+'</div>';
         

       
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }
    });

    
  




});
