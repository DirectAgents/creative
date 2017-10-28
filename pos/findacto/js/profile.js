$( document ).ready(function() {

//About

$('#edit-about').click(function(){
  $('#edit-about').hide();
  $('td.about').each(function(){
    var content = $(this).html();
    

    if(!content) {

    $(this).html('<textarea></textarea>');
    
    
    }else{

    $(this).html('<textarea>' + content + '</textarea>');
    
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
                success:function(data){  
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
                data:{column_name:'Email'}, 
                dataType:"text",  
                success:function(data){  
  
                    $('textarea').html(data);
                    $('textarea').contents().unwrap();  
                }  
           });  


    $('#save-about').hide();
    $('#cancel-about').hide();
    $('#edit-about').show();

 }); 
}); 



//Skills

$('#edit-skills').click(function(){
  $('#edit-skills').hide();
  $('td.skills').each(function(){
    var content = $(this).html();
    $(this).html('<textarea>' + content + '</textarea>');
  });  
  
  $('#save-skills').show();
  $('#cancel-skills').show();
  
});

$('#save-skills').click(function(){
  $('#save-skills').hide();
  $('textarea').each(function(){
    var content = $(this).val();//.replace(/\n/g,"<br>");
    $(this).html(content);
    $(this).contents().unwrap();    
     $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{content:content,column_name:'Skills'},  
                dataType:"text",  
                success:function(data){  
                     //alert(data);  
                }  
           });  
  }); 

  $('#edit-skills').show(); 
  $('#cancel-skills').hide();
  
});


$('#cancel-skills').click(function(){  

$('textarea').each(function(){
    var content = $(this).val();//.replace(/\n/g,"<br>");
    $(this).html(content);
    $(this).contents().unwrap();  

    $('#save-skills').hide();
    $('#cancel-skills').hide();
    $('#edit-skills').show();

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
                success:function(data){  
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
                success:function(data){  
  
                    $('.email input[type=text]').html(data);
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
                success:function(data){  
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
                success:function(data){  
  
                    $('.phone input[type=text]').html(data);
                    $('.phone input[type=text]').contents().unwrap();  
                }  
           });  


    $('#save-phone').hide();
    $('#cancel-phone').hide();
    $('#edit-phone').show();

 }); 
}); 




});