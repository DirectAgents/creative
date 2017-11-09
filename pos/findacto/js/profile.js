$( document ).ready(function() {

//About

$('#edit-about').click(function(){
  $('#edit-about').hide();
  $('td.about').each(function(){
    var content = $(this).html();
    
    //alert(content);

    if(!content) {

    $(this).html('<textarea class="about-textarea"></textarea>');
    
    
    }else{

    $(this).html('<textarea class="about-textarea">' + content + '</textarea>');
    
    }


  });  
  
  $('#save-about').show();
  $('#cancel-about').show();
  
});

$('#save-about').click(function(){
  //alert("afasdfas");
  $('#save-about').hide();
  $('textarea').each(function(){
    var content = $(this).val();//.replace(/\n/g,"<br>");

     if(!content) {   

      $('#save-about').show();  
      $(this).css('border-color','red'); 

    }else{


    $(this).html(content);
    $(this).contents().unwrap();    

     $.ajax({  
                url:"../edit.php",  
                method:"POST",  
                data:{content:content,column_name:'About'},  
                dataType:"text",  
                success:function(response){  
                     //alert(data);  
                }  
           });  
  
    $('#edit-about').show(); 
    $('#cancel-about').hide();

    }
  
  }); 


  
});





$('#cancel-about').click(function(){  

$('textarea').each(function(){

    var content = $(this).val();//.replace(/\n/g,"<br>");

     $.ajax({  
                url:"../select.php",  
                method:"POST",  
                data:{column_name:'About'}, 
                dataType:"text",  
                success:function(response){  
 
                    $('.about-textarea').html(response);
                    $('.about-textarea').contents().unwrap();  
                }  
           });  


    $('#save-about').hide();
    $('#cancel-about').hide();
    $('#edit-about').show();

 }); 
}); 



///////Skills/////////



$('#save-skills').click(function(){
  
 
    //var content = $(this).val();//.replace(/\n/g,"<br>");
    var interest = $('input[name="interestselection[]"]:checked').map(function () {return this.value;}).get().join(",");
    //alert(interest);
    //$(this).html("adfasd").delay(3000).hide();
    var submit = $(this).html("<span class='glyphicon glyphicon-repeat gly-spin'></span> Saving"); //
    setTimeout(function() { $(submit).html("<span class='glyphicon glyphicon-ok'></span> Save") }, 2000);
     $.ajax({  
                url:"../edit.php",  
                method:"POST",  
                data:{content:interest,column_name:'Skills'},  
                dataType:"text",  
                success:function(response){  
                     //alert(data);  
                     var skills_count = $(response).filter('#theskills').text();  
                     $('#skills-count').html(skills_count);
                     //alert(skills_count);  
                     
                }  
       });  
 });


  





////////////////Email//////////////////////

$('#edit-email').click(function(){
  $('#edit-email').hide();
  $('td.email').each(function(){
    var content = $(this).html();
    
    if(!content) {

    $(this).html('<input type="text" value="">');
    
    
    }else{

    $(this).html('<input type="text" value="' + content + '">');
    
    }
  });  
  
  $('#save-email').show();
  $('#cancel-email').show();
  
});

$('#save-email').click(function(){
  $('#save-email').hide();
  $('.email input[type=text]').each(function(){
    var content = $(this).val();//.replace(/\n/g,"<br>");
    
    if(!content) {   

      $('#save-email').show();  
      $(this).css('border-color','red'); 

    }else{

    $(this).html(content);
    $(this).contents().unwrap();
     
     $.ajax({  
                url:"../edit.php",  
                method:"POST",  
                data:{content:content,column_name:'Email'},  
                dataType:"text",  
                success:function(response){  
                     //alert(data);  
                }  
           });  

  $('#edit-email').show(); 
  $('#cancel-email').hide();

      }
   
  }); 

 
  
});


$('#cancel-email').click(function(){  

$('.email input[type=text]').each(function(){

    var content = $(this).val();//.replace(/\n/g,"<br>");

     $.ajax({  
                url:"../select.php",  
                method:"POST",  
                data:{column_name:'Email'}, 
                dataType:"text",  
                success:function(response){  
  
                    $('.email input[type=text]').html(response);
                    $('.email input[type=text]').contents().unwrap();  
                }  
           });  


    $('#save-email').hide();
    $('#cancel-email').hide();
    $('#edit-email').show();

 }); 
}); 



////////////////Phone//////////////////////

$('#edit-phone').click(function(){
  $('#edit-phone').hide();
  $('td.phone').each(function(){
    var content = $(this).html();
    
    if(!content) {

    $(this).html('<input type="text" value="">');
    
    
    }else{

    $(this).html('<input type="text" value="' + content + '">');
    
    }
  });  
  
  $('#save-phone').show();
  $('#cancel-phone').show();
  
});

$('#save-phone').click(function(){
  $('#save-phone').hide();
  $('.phone input[type=text]').each(function(){
    var content = $(this).val();//.replace(/\n/g,"<br>");
    
    if(!content) {   

      $('#save-phone').show();  
      $(this).css('border-color','red'); 

    }else{

    $(this).html(content);
    $(this).contents().unwrap();
     
     $.ajax({  
                url:"../edit.php",  
                method:"POST",  
                data:{content:content,column_name:'Phone'},  
                dataType:"text",  
                success:function(response){  
                     //alert(data);  
                }  
           });  

  $('#edit-phone').show(); 
  $('#cancel-phone').hide();

      }
   
  }); 

 
  
});


$('#cancel-phone').click(function(){  

$('.phone input[type=text]').each(function(){

    var content = $(this).val();//.replace(/\n/g,"<br>");

     $.ajax({  
                url:"../select.php",  
                method:"POST",  
                data:{column_name:'Phone'}, 
                dataType:"text",  
                success:function(response){  
  
                    $('.phone input[type=text]').html(response);
                    $('.phone input[type=text]').contents().unwrap();  
                }  
           });  


    $('#save-phone').hide();
    $('#cancel-phone').hide();
    $('#edit-phone').show();

 }); 
}); 




////////////////Work//////////////////////

$('.btn-add-work').click(function(){
$('.list-work-box').hide();

$('.btn-add-work').hide();
$('.btn-list-work').fadeIn("fast");
$('.add-work-box').fadeIn("fast");
});


$('.btn-edit-work').click(function(){

$('.list-work-box').hide();

$('.btn-add-work').hide();
$('.btn-list-work').fadeIn("fast");
$('.edit-work-box').fadeIn("fast");

var data = $.parseJSON($(this).attr('data-button'));
//alert(data.id);

$.ajax({  
                url:"../select-work-edit.php",  
                method:"POST",  
                data:{id:data.id}, 
                dataType:"text",  
                cache: false,
                success:function(response){  
 
                    $('.edit-work-box-inner').html(response);
                    $('.upload-screenshot').css("display", "none");
                    

                }  
           });  


});  

$('.btn-list-work').click(function(){
$('.list-work-box').show();

$('.btn-add-work').fadeIn("fast");
$('.btn-list-work').hide();
$('.add-work-box').hide();
$('.edit-work-box').hide();

$.ajax({  
                url:"../select-work.php",  
                method:"POST",  
                data:{userid:'1'}, 
                dataType:"text",  
                success:function(response){  
  
                    $('.list-work-box').html(response);
                    
                }  
           });  

});  

$('#save-work').click(function(){
  //alert("asdfasd");
  $('#save-phone').hide();

    $("#add-work-form").validate({
 
  submitHandler: function(validator, form, submitButton) {

    var name  = $("input[name=work-name]").val();
    var link  = $("input[name=work-link]").val();
    var description = $("textarea[name='work-description']").val();
    var screenshots = $('input[name="screenshots[]"]:checked').map(function () {return this.value;}).get().join(",");
        
            $.ajax({  
                url:"../insert-work.php",  
                method:"POST",  
                data:{name:name,link:link,description:description,screenshots:screenshots},  
                dataType:"text",  
                success:function(response){  
                     //alert(data);  
                     $('#saved').fadeIn("fast");
                     $('#saved').delay(2000).fadeOut("slow");

                     $('#work-count').html(response);
                     
                }  
           });  

           $("#add-work-form")[0].reset();
        //validator.defaultSubmit();
    },
  showErrors: function(errorMap, errorList) {
    $.each(this.successList, function(index, value) {
      $(value).css('border','1px solid #cccccc');
      return $(value).popover("hide");
      proceed = true;
    });
    return $.each(errorList, function(index, value) {
      $(value.element).css('border-color','red');
      var _popover;
      console.log(value.message);
      _popover = $(value.element).popover({
        trigger: "manual",
        placement: "bottom",
        content: value.message,
        //template: "<div class=\"popover\"><div class=\"arrow\"></div><div class=\"popover-inner\"><div class=\"popover-content\"><p></p></div></div></div>"
        template: "<div class=\"error-message\"><div class=\"popover-content\"></div></div>"

      });
      _popover.data("popover").options.content = value.message;
      return $(value.element).popover("show");
    });
  }
  });
   
});




$('#save-edit-work').click(function(){
  //alert("234");
  $('#save-phone').hide();

    $("#edit-work-form").validate({
 
  submitHandler: function(validator, form, submitButton) {

    var id  = $("input[name=id]").val();
    var name  = $("input[name=work-name-edit]").val();
    var link  = $("input[name=work-link-edit]").val();
    var description = $("textarea[name='work-description-edit']").val();
    var screenshots = $('input[name="screenshots[]"]:checked').map(function () {return this.value;}).get().join(",");
        
        //alert(id);

            $.ajax({  
                url:"../edit-work.php",  
                method:"POST",  
                data:{id:id,name:name,link:link,description:description,screenshots:screenshots},  
                dataType:"text",  
                success:function(response){  
                     //alert(data);  
                     $('#saved').fadeIn("fast");
                     $('#saved').delay(2000).fadeOut("slow");
                     
                }  
           });  

           //$("#add-work-form")[0].reset();
        //validator.defaultSubmit();
    },
  showErrors: function(errorMap, errorList) {
    $.each(this.successList, function(index, value) {
      $(value).css('border','1px solid #cccccc');
      return $(value).popover("hide");
      proceed = true;
    });
    return $.each(errorList, function(index, value) {
      $(value.element).css('border-color','red');
      var _popover;
      console.log(value.message);
      _popover = $(value.element).popover({
        trigger: "manual",
        placement: "bottom",
        content: value.message,
        //template: "<div class=\"popover\"><div class=\"arrow\"></div><div class=\"popover-inner\"><div class=\"popover-content\"><p></p></div></div></div>"
        template: "<div class=\"error-message\"><div class=\"popover-content\"></div></div>"

      });
      _popover.data("popover").options.content = value.message;
      return $(value.element).popover("show");
    });
  }
  });
   
});



//////Delete Work/////////

$('.btn-delete-work').click(function(e){

var data = $.parseJSON($(this).attr('data-button')); 
//alert(data.screenshot);


ConfirmDialog('Are you sure');

function ConfirmDialog(message){
    $('<div></div>').appendTo('body')
                    .html('<div><h6>'+message+'?</h6></div>')
                    .dialog({
                        modal: true, zIndex: 10000, autoOpen: true,
                        width: 'auto', resizable: false,
                        buttons: {
                            Yes: function () {
                                // $(obj).removeAttr('onclick');                                
                                // $(obj).parents('.Parent').remove();
                                
                                //$('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');
                                
                                $(this).dialog("close");

                                $.ajax({  
                url:"../delete-work.php",  
                method:"POST",  
                data:{userid:'1', id:data.id, random:data.random}, 
                dataType:"text",  
                success:function(response){  
                    //alert(data);
                    $('#deleted').fadeIn("fast");
                    $('#deleted').delay(2000).fadeOut("slow");

                    var random = $(response).filter('#random').text();
                    $("#"+random).delay(1000).fadeOut("slow");

                    var work_count = $(response).filter('#thecount').text();  
                    $('#work-count').html(work_count);


                }  
           });  

e.preventDefault();
                            },
                            No: function () {     

                              //$('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');
                            
                              $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            $(this).remove();
                        }
                    });
    };






}); 



$('.delete-screenshot').click(function(e){

var data = $.parseJSON($(this).attr('data-button')); 
//alert(data.screenshot);

$.ajax({  
                url:"../delete-screenshot.php",  
                method:"POST",  
                data:{userid:'1', id:data.id, screenshot:data.screenshot, random:data.random}, 
                dataType:"text",  
                success:function(response){  
                    //alert(data);
                    $("#"+response).delay(1000).fadeOut("slow");
                    $("#the-screenshots").fadeOut("fast");
                    $(".upload-screenshot").delay(1000).fadeIn("slow");
                    //$('.upload-screenshot').css("display", "block");


                }  
           });  

e.preventDefault();

}); 




});