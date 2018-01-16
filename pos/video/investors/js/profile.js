$(document).ready(function() {

////////////////Enter Zip Code to retrieve City and State//////////////////////



        $.ajax({
                url: "select.php",
                method: "POST",
                data: { column_name: 'Zip' },
                dataType: "html",
                success: function(response) {
                   var zip = $(response).filter('#zip').html(); 
                    
                if (zip != ''){  
                   $(".zip-textinput").hide();
                   $(".city-state-textinput").show();
                   $(".city-state-textinput").val(zip);

                  }else{

                   $(".zip-textinput").show();
                   $(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
                   $(".city-state-textinput").hide();
                   
                }
               
               }
                
            });


$('.zip-textinput').keyup(function(){
    var zip_input = $(this).val();
    if(zip_input.length == 5){

     $.ajax({
                url: "edit.php",
                method: "POST",
                data: { content: zip_input, column_name: 'Zip' },
                dataType: "html",
                success: function(response) {
                   var zip = $(response).filter('#zip').html(); 
        
                   $(".zip-textinput").hide();
                   $(".city-state-textinput").val(zip);
                   
                }
                
            });


    };
});




$('.city-state-textinput').focus(function(){

    $(".city-state-textinput").hide();
    $(".zip-textinput").show();
    $(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
    
   
});





$('.zip-textinput').blur(function(){
//alert("asdf");


$.ajax({
                url: "select.php",
                method: "POST",
                data: { column_name: 'Zip' },
                dataType: "html",
                success: function(response) {
                   
                   var zip = $(response).filter('#zip').html(); 
        
                   if (zip != ''){  
                   $(".zip-textinput").hide();
                   $(".city-state-textinput").show();
                   $(".city-state-textinput").val(zip);

                  }else{

                   $(".zip-textinput").show();
                   $(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
                   $(".city-state-textinput").hide();
                   
                  }
                   
                }
                
            });

   
});




      
$('#add-zip').click(function() {
    //alert("111");
        $('.zip-textinput').removeClass('hidden');
        $('#add-zip').hide();
        $('#edit-zip').hide();
        $('.zip-textinput').show();
        $('#save-zip').show();
        $('#cancel-zip').show();

    });
     
    
 $('#edit-zip').click(function() {
    //alert("www113rddttteee444333");
        
           $.ajax({
                url: "select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var zip = $(response).filter('#zip').html();
                   
                   if (zip != ''){
                    //$('.zip input[type=text]').html(zip);
                    //$('td.zip').contents().wrapInner('<input type="text" class="zip-textinput" value="'+zip+'" placeholder="Enter your number">');
                    //alert(zip);
                        $('.zip-textinput').removeClass('hidden');
                        $('.zip').addClass('show');
                        //$('.zip-textinput').show();
                        $('.zip').html('<input type="text" class="zip-textinput" value="" placeholder="Enter your Zip Code">');
                        $('#save-zip').show();
                        $('#cancel-zip').show();
                        //$('.zip-textinput').show();
                        //$('.zip-textinput').contents().wrap('<input type="text" class="zip-textinput" value="'+zip+'" placeholder="Enter your number">');
                        //$('td.zip').html('<input type="text" class="zip-textinput" value="'+zip+'" placeholder="Enter your number">');
                        $('#edit-zip').hide();
                        $('#add-zip').hide();
                        $('td.edit-zip').hide();

                    }else{
                        //$(".phone").css("display", "none");
                        //$('.phone').html(phone);
                        $('.zip-textinput').addClass('hidden');
                        $('.zip-textinput').hide();
                        $('#edit-zip').hide();
                        $('#add-zip').show();
                    }
                   
                  

                }


                
            });
 
      return false;


    });

   

    $('#save-zip').click(function() {
        $('#save-zip').hide();
        $('.zip input[type=text]').each(function() {
            var content = $(this).val().replace(/^\s*|\s*$/g,''); //.replace(/\n/g,"<br>");

            if (!content) {

                $('#save-zip').show();
                $(this).css('border-color', 'red');

            } else {

                $(this).html(content);
                $(this).contents().unwrap();

                $.ajax({
                    url: "../edit.php",
                    method: "POST",
                    data: { content: content, column_name: 'Zip' },
                    dataType: "html",
                    success: function(response) {
                        //alert(data);  
                        //$('.phone').html(response);
                        var zip = $(response).filter('#zip').html();
                        $('.zip').html(zip);
                        $('#edit-zip').show();
                        $('td.edit-zip').show();
                    }
                });

                $('#edit-zip').show();
                $('#cancel-zip').hide();

            }

        });



    });


$('#cancel-zip').click(function() {


        $.ajax({
                url: "../select.php",
                method: "POST",
                //data: { column_name: 'Phone' },
                dataType: "html",
                success: function(response) {

                   var zip = $(response).filter('#zip').html(); 
                   //alert(phone);
                   if (zip != ''){
                        $('.zip').html(zip);
                        $('.zip-textinput').contents().unwrap();
                        $('#edit-zip').show();
                        $('#add-zip').hide();
                        $('td.edit-zip').show();

                    }else{
                        //$(".phone").css("display", "none");
                        //$('.phone').html(phone);
                        $('.zip-textinput').hide();
                        $('#edit-zip').hide();
                        $('#add-zip').show();
                        $('td.edit-zip').hide();
                    }
                   
                   

                }
                
            });

           
            $('#save-zip').hide();
            $('#cancel-zip').hide();
         
    });

});