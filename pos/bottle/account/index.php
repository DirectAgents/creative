<?php
session_start();

require_once '../base_path.php';

require_once '../class.customer.php';

include_once("../config.php");




//echo $_SESSION['customerSession'];

$customer_home = new CUSTOMER();

if($_SESSION['customerSession'] == '')
{
  $customer_home->redirect('../login');
}



$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);









?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>

<?php include("header.php"); ?>

       

<script>

/**Create Project**/

$(document).ready(function(){

 $(".go").click(function() {  
//alert("aads"); 

 //get input field values
        
        var projectname = $('input[name=projectname').val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

          if(projectname==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:95.5%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter a name for your Project!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }
      
      
         

        //everything looks good! proceed...
        if(proceed) 
        {


          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectname':projectname};
            
            //Ajax post data to server
            $.post('projectcreate.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            //alert(text);
                
            window.location.href = "create/step1.php?id="+response.text;
            //output = '<div class="success">'+response.text+'</div>';

          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }

});


 

});

</script>
   

        
    </head>
    
    <body>

<!--TopNav-->
         <header id="main-header" class='transparent'>
  <div class="inner-col">


<?php include("../nav.php"); ?>

   
  </div>
</header>


<!--TopNav-->


  
        


    <!-- Main -->


  

<!-- Start Create a Project -->
<!--
<div id="slide" class="well">
  <div id="result"></div>
<h4>Name your project and hit go!</h4>
<input type="text" name="projectname" id="projectname" placeholder="Untitled Project"/>
<div class="popupoverlay-btn">
    <button class="slide_close btn-default">Cancel</button>
    <button class="go btn-default">Go</button>
</div>
</div>

<!-- End Create a Project -->










<div class="container">


  



    <!-- Main -->


    <div id="white-container">



<?php

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE userID = '".$_SESSION['customerSession']."' AND intropopup = 'Show' ");

if(mysqli_num_rows($sql) == 1)
{

  ?>



 <!-- Intro PopUp -->

<div id="slide-intro" class="well slide">
  <div class="result-accept">
  <div id="result-accept">Successfully Canceled!</div>
  </div>

<input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['customerSession']; ?>"/>


<img src="<?php echo BASE_PATH; ?>/images/email/email-logo-large.png" class="center"/>

<h2>Welcome to Mr.Pao</h2>

<h4>Mr.Pao will turn your trash to cash. 
Let us show you show you a quick intro to
schedule your first pick-up.</h4>

<div class="left checkbox-intro"><input type="checkbox" name="dontshow" class="dontshow">&nbsp;Don't show again</button></div>

<div class="popupoverlay-btn">
  <div class="cancel-decline">

    
    <a href="#" class="slide-intro_close decline btn-delete cancel-upcoming-pickup" href="javascript:void(0);" onclick="startIntro();">Let's Go</a>

</div>

<div class="popupoverlay-btn">
  <div class="close-decline">
    <button class="slide-intro_close cancel">Close</button>
</div>
</div>

</div>
</div>

 <!-- End Intro PopUp -->




<script>
$(document).ready(function(){



$(".dontshow").change(function() {

if(this.checked) {  

post_data = {
                'userid': $("input[name='userid']").val()
            };


 //Ajax post data to server
            $.post('dontshow.php', post_data, function(response){ 
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = response.text;
                    //reset values in all input fields
                   
                  
                  //$(".result-accept").show().slideDown(); 

                }
                $("#profile-form #profile_results").hide().html(output).slideDown();
            }, 'json');

}else{


//Ajax post data to server
            $.post('show.php', post_data, function(response){ 
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = response.text;
                    //reset values in all input fields
                   
                  
                  //$(".result-accept").show().slideDown(); 

                }
                $("#profile-form #profile_results").hide().html(output).slideDown();
            }, 'json');


}


});


 });
</script> 


<?php } ?>



<?php

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_pickup_upcoming WHERE userID = '".$_SESSION['customerSession']."' ORDER BY id DESC ");

if(mysqli_num_rows($sql) == 1)
{

$row_pickup_upcoming = mysqli_fetch_array($sql); ?>



<?php if($row_pickup_upcoming['PickupCanceled_ByMe'] == 'Y') { ?>

<div style="float:left; width:100%; background-color:orange; margin-bottom:20px; text-align:center">
<h4>We have canceled the Pick-Up</h4>
</div>

<?php } ?>


<?php if($row_pickup_upcoming['PickupCanceled_ByCustomer'] == 'Y') { ?>

<div style="float:left; width:100%; background-color:orange; margin-bottom:20px; text-align:center">
<h4>You have canceled the Pick-Up</h4>
</div>

<?php } ?>


<?php if($row_pickup_upcoming['PickupCanceled_ByMe'] == 'N' && $row_pickup_upcoming['PickupCanceled_ByCustomer'] == 'N' ) { ?>

<div style="float:left; width:100%; background-color:green; margin-bottom:20px; color:#fff; text-align:center">
<h4>We have confirmed the following pick-up</h4>
</div>

<?php } ?>



<p>&nbsp;</p>
<h4 class="center"><?php echo date('F j, Y',strtotime($row_pickup_upcoming['Pickup_Date'])).' @ '.$row_pickup_upcoming['Pickup_Time']  ?> </h4>
 <p>&nbsp;</p>


 <div class="create-one center">

<?php if($row_pickup_upcoming['PickupCanceled_ByMe'] == 'N' && $row_pickup_upcoming['PickupCanceled_ByCustomer'] == 'N') { ?>

        <a href="#" role="button" class="slide_open create-one-btn">Cancel Pick up</a>

<? }else{ ?>

  <a href="<?php echo BASE_PATH; ?>/account/pickup/schedule/?p=new" class="create-one-btn" id="request-new-pick-up-date-after-canceled-upcoming-pickup">Request New Pick up Date</a>

<?php } ?>






 <!-- Cancel Upcoming Pick-up -->

<div id="slide" class="well slide">
  <div class="result-accept">
  <div id="result-accept">Successfully Canceled!</div>
  </div>

<input type="hidden" name="upcoming_pickup_requestid" id="upcoming_pickup_requestid" value="<?php echo $row_pickup_upcoming['RequestID']; ?>"/>
<input type="hidden" name="upcoming_pickup_date" id="upcoming_pickup_date" value="<?php echo $row_pickup_upcoming['Pickup_Date']; ?>"/>
<input type="hidden" name="upcoming_pickup_time" id="upcoming_pickup_time" value="<?php echo $row_pickup_upcoming['Pickup_Time']; ?>"/>


<h4>Are you sure you want to cancel the pick-up?</h4>


<div class="popupoverlay-btn">
  <div class="cancel-decline">
    <button class="slide_close cancel">Cancel</button>
    <button class="decline btn-delete cancel-upcoming-pickup">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-decline">
    <button class="slide_close cancel">Close</button>
</div>
</div>

</div>
</div>

 <!-- End Cancel Upcoming Pick-up -->



<script>
$(document).ready(function(){


$(".cancel-upcoming-pickup").click(function() { 


post_data = {
                'upcoming_pickup_requestid': $("input[name='upcoming_pickup_requestid']").val(),
                'upcoming_pickup_date'     : $("input[name='upcoming_pickup_date']").val(),
                'upcoming_pickup_time'     : $("input[name='upcoming_pickup_time']").val()
            };


 //Ajax post data to server
            $.post('pickup/schedule/cancel-pickup-upcoming.php', post_data, function(response){ 
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = response.text;
                    //reset values in all input fields
                   
                  
                  $(".result-accept").show().slideDown(); 

                }
                $("#profile-form #profile_results").hide().html(output).slideDown();
            }, 'json');

});










 });
</script> 




<?php }else{ ?>

     


<?php
//include db configuration file




//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_pickup_request WHERE userID = '".$_SESSION['customerSession']."' ORDER BY id DESC ");
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql) == 0)
{
  //echo "asdf";



echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">No Pickup Requests</div>
  <div class="create-one-here-box">
      <div class="create-one schedule-one-here">
 <p>&nbsp;</p>
        <a href="'.BASE_PATH.'/account/pickup/schedule/" class="create-one-btn">Schedule One Here</a>

       </div> 
       <p>&nbsp;</p>
  </div>
</div>

</div>
</div>';

}else{


//get all records from add_delete_record table
while($row_pickup_request = mysqli_fetch_array($sql))
{ 




  ?>
<div id="white-container-account">

<h3>You have requested a pick up for the following date(s) </h3>
<p>&nbsp;</p>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td class="grey"><h3>Dates</h3></td>
<td class="grey"><h3>Time</h3></td>
</tr>

<tr>
<td><h4><?php echo date('F j, Y',strtotime($row_pickup_request['Schedule_Date_Option1']));?> </h4></td>
<td><h4><?php echo $row_pickup_request['Schedule_Time_Option1'];  ?> </h4></td>
</tr>

<tr>
<td><h4><?php echo date('F j, Y',strtotime($row_pickup_request['Schedule_Date_Option2']));?> </h4></td>
<td><h4><?php echo $row_pickup_request['Schedule_Time_Option2'];  ?> </h4></td>
</tr>

<tr>
<td><h4><?php echo date('F j, Y',strtotime($row_pickup_request['Schedule_Date_Option3']));?> </h4></td>
<td><h4><?php echo $row_pickup_request['Schedule_Time_Option3'];  ?> </h4></td>
</tr>

</table>


<p>&nbsp;</p>

      <div class="create-one">

        <a href="<?php echo BASE_PATH; ?>/account/pickup/schedule/?p=new" class="create-one-btn" id="request-new-pick-up-date">Request New Pick up Date</a>

       </div> 
       <p>&nbsp;</p>
  </div>




</div>




<?php 

}

}

}

?>


                  


            


          </div>

   
 </div>
</div>



   

    <div class="clearer"></div>

  </div>
    <div class="container">
 <?php include("../footer.php"); ?>
      </div>
 
  </div>

  </div>

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>


   <script>
$(document).ready(function () {

    $('#slide').popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });

     $('#slide-intro').popup('show');

     $('#slide-intro').popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top',
        transition: 'all 0.3s',
        scrolllock: true // optional
    });

     


    
});
</script>



        
    </body>

</html>
