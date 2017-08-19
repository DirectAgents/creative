<?php
session_start();

require_once '../base_path.php';

require_once '../class.customer.php';

include_once("../config.php");






$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../login');
}



$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['customerSession']."' AND FinishedProcess = 'Y' ");
$rowproject = mysqli_fetch_array($Project);

$meetupchoice=explode(',',$rowproject['Meetupchoice']);
$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$minheight=explode(',',$rowproject['MinHeight']);
$maxheight=explode(',',$rowproject['MaxHeight']);
$city=explode(',',$rowproject['City']);
$status=explode(',',$rowproject['Status']);
$ethnicity=explode(',',$rowproject['Ethnicity']);
$smoke=explode(',',$rowproject['Smoke']);
$drink=explode(',',$rowproject['Drink']);
$diet=explode(',',$rowproject['Diet']);
$religion=explode(',',$rowproject['Religion']);
$education=explode(',',$rowproject['Education']);
$job=explode(',',$rowproject['Job']);






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
      <div class="create-one">
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
<h4><?php echo date('F j, Y',strtotime($row_pickup_request['Schedule_Date_Option1'])).' @ '.$row_pickup_request['Schedule_Time_Option1']  ?> </h4>

<?php if($row_pickup_request['Schedule_Date_Option2'] != '' && $row_pickup_request['Schedule_Time_Option1'] != '' ) { ?>
<h4><?php echo date('F j, Y',strtotime($row_pickup_request['Schedule_Date_Option2'])).' @ '.$row_pickup_request['Schedule_Time_Option2']  ?> </h4>
<?php } ?>

<?php if($row_pickup_request['Schedule_Date_Option3'] != '' && $row_pickup_request['Schedule_Time_Option3'] != '' ) { ?>
<h4><?php echo date('F j, Y',strtotime($row_pickup_request['Schedule_Date_Option3'])).' @ '.$row_pickup_request['Schedule_Time_Option3']  ?> </h4>
<?php } ?>

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






        
    </body>

</html>
