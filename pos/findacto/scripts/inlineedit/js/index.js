$( document ).ready(function() {

//About

$('#edit-about').click(function(){
  $('#edit-about').hide();
  $('td.about').each(function(){
    var content = $(this).html();
    $(this).html('<textarea>' + content + '</textarea>');
  });  
  
  $('#save-about').show();
  $('#cancel-about').show();
  
});

$('#save-about').click(function(){
  $('#save-about').hide();
  $('textarea').each(function(){
    var content = $(this).val();//.replace(/\n/g,"<br>");
    $(this).html(content);
    $(this).contents().unwrap();    
     $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{content:content,column_name:'About'},  
                dataType:"text",  
                success:function(data){  
                     //alert(data);  
                }  
           });  
  }); 

  $('#edit-about').show(); 
  $('#cancel-about').hide();
  
});


$('#cancel-about').click(function(){  

$('textarea').each(function(){
    var content = $(this).val();//.replace(/\n/g,"<br>");
    $(this).html(content);
    $(this).contents().unwrap();  

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




});