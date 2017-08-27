<?php

session_start();

require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.customer.php';


$sql=mysqli_query($connecDB,"SELECT * FROM tbl_completed_tasks WHERE taskID = '".$_GET['taskid']."'");
$row = mysqli_fetch_array($sql);


?>



<script>

$(document).ready(function(){

$(".make-payment").click(function() {  

      var proceed = true;


      //var input = date;
        //var the_date = $('input[name=the_date]').val();



        
     
      $("#result-accept-"+<?php echo $row2['id']; ?>).hide().slideDown();


      

 //get input field values
        
        var id = $('input[name=id'+<?php echo $row2['id']; ?>+']').val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>+']').val();
        var adminid = $('input[name=adminid'+<?php echo $_SESSION['adminSession']; ?>+']').val();
        var taskid = $('input[name=taskid'+<?php echo $row2['userID']; ?>+']').val();
        var amount = $('input[name=amount'+<?php echo $row2['userID']; ?>+']').val();


        if (amount < 1 ) {

         $("#amount"+<?php echo $row2['userID']; ?>).css('border-color','red');  //change border color to red  
            proceed = false;

        }



        //everything looks good! proceed...
        if(proceed) 
        {

      $(".result-no-date").hide(); 
      $(".result-accept").show().slideDown();
      $(".cancel-accept").hide();
      $(".close-accept").show();



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'id':id,'userid':userid,'adminid':adminid,'taskid':taskid,'amount':amount};
            
            //Ajax post data to server
            $.post('make-payment.php', post_data, function(response){  
              //alert("yes"); 

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            
            output = '<div class="success">Yo</div>';


          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $(".cancel-accept").hide();
        $(".result-accept").show();
        $(".close-accept").show();
        $("#result-accept-"+response.text).hide().slideDown();
            }, 'json');
      
        }

});

});



</script>





<div id="the-container">

<h2>We have collected $<?php echo $row['Amount']; ?> from your recycles</h2>

<h3>Please choose a homeless person you want to donate to <a href="<?php echo BASE_PATH; ?>/homeless" target="_blank">Click Here</a></h3>

Enter amount you want to donate to the homeless person you have selected

<input type="text" id="amount" name="amount" placeholder="e.g 3"/>





<a href="#" class="create-one-btn" id="request-new-pick-up-date-after-canceled-upcoming-pickup">Submit Payment Request</a>


</div>