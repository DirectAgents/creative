<?php
session_start();
require_once 'base_path.php';
include_once("config.php");
include("config.inc.php");




$sql = mysqli_query($connecDB,"SELECT * FROM profile");
$row = mysqli_fetch_array($sql);

?>


<html>
<head>
	<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script>

$( document ).ready(function() {

//About

$('#edit-about').click(function(){
  $('#edit-about').hide();
  $('td.about').each(function(){
    var content = $(this).html();
    

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
                url:"edit.php",  
                method:"POST",  
                data:{content:content,column_name:'About'},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
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
                url:"select.php",  
                method:"POST",  
                data:{column_name:'About'}, 
                dataType:"text",  
                success:function(data){  
 
                    $('.about-textarea').html(data);
                    $('.about-textarea').contents().unwrap();  
                }  
           });  


    $('#save-about').hide();
    $('#cancel-about').hide();
    $('#edit-about').show();

 }); 
}); 

}); 



</script>




</head>
<body>


	 <table class="table edit-profile">
    <tbody>
      <tr>
        <td class="about"><?php echo $row['About'];?></td>
      </tr>
    </tbody>
  </table>
  <button class="btn btn-info" id="edit-about"><span class="glyphicon glyphicon-edit"></span> edit</button>
  <button class="btn btn-success" id="save-about"><span class="glyphicon glyphicon-ok"></span> save</button>
  <button class="btn btn-cancel" id="cancel-about"><span class="glyphicon glyphicon-remove"></span> cancel</button>


</body>
</html>