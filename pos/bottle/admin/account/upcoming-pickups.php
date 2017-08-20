<?php
session_start();

require_once '../../base_path.php';

require_once '../../class.admin.php';

include_once("../../config.php");




$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
  $admin_home->redirect('../login');
}



$stmt = $admin_home->runQuery("SELECT * FROM tbl_admin WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



?>



  
        


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









     


<?php
//include db configuration file




//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_pickup_upcoming ORDER BY id DESC ");
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql) == 0)
{
  //echo "asdf";

echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">Upcoming Pickups</div>

</div>

</div>
</div>';

}else{

echo "<h2>Upcoming Pickups</h2>";

//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 


date_default_timezone_set('America/New_York');


$random = rand(5, 20000);



  ?>



<!-- Start Accept -->

<div id="slide-accept<?php echo $row2['id']; ?>_<?php echo $random; ?>" class="well slide-accept">
  <div class="result-accept">
    <div id="result-accept-<?php echo $row2['id']; ?>">Successfully Marked as Finished!</div>
  </div>



<h4>Confirm Pick up</h4>
<p>&nbsp;</p>


<input type="hidden" name="the_date" id="the_date" value=""/>


<input type="hidden" name="id<?php echo $row2['id']; ?>" id="projectid" value="<?php echo $row2['id']; ?>"/>
<input type="hidden" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>







<div class="popupoverlay-btn">
  <div class="cancel-accept">
    <button class="slide-accept<?php echo $row2['id']; ?>_<?php echo $random; ?>_close cancel">Cancel</button>
    <button class="accept<?php echo $row2['id']; ?> btn-delete">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-accept">
    <button class="slide-accept<?php echo $row2['id']; ?>_<?php echo $random; ?>_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Accept -->




<script>

/**Accept Pick Up**/

$(document).ready(function(){



$(".slide-accept"+<?php echo $row2['id']; ?>+"_"+<?php echo $random; ?>+"_open").click(function() {  
$("#slide-accept"+<?php echo $row2['id']; ?>+"_"+<?php echo $random; ?>+"_wrapper").show();
$("#slide-accept"+<?php echo $row2['id']; ?>+"_"+<?php echo $random; ?>+"_background").show();
});


    $('#slide-accept'+<?php echo $row2['id']; ?>+"_"+<?php echo $random; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });


$(".slide-accept"+<?php echo $row2['id']; ?>+"_"+<?php echo $random; ?>+"_close").click(function() {  
$("#slide-accept"+<?php echo $row2['id']; ?>+"_"+<?php echo $random; ?>+"_wrapper").hide();
$("#slide-accept"+<?php echo $row2['id']; ?>+"_"+<?php echo $random; ?>+"_background").hide();
});

 

    
    $(".result-no-date").hide();


    $(".accept"+<?php echo $row2['id']; ?>).click(function() {  

      var proceed = true;


      //var input = date;
        //var the_date = $('input[name=the_date]').val();

        
     
      $("#result-accept-"+<?php echo $row2['id']; ?>).hide().slideDown();


      

 //get input field values
        
        var id = $('input[name=id'+<?php echo $row2['id']; ?>+']').val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>+']').val();




       
        

        //everything looks good! proceed...
        if(proceed) 
        {

      $(".result-no-date").hide(); 
      $(".result-accept").show().slideDown();
      $(".cancel-accept").hide();
      $(".close-accept").show();



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'id':id,'userid':userid};
            
            //Ajax post data to server
            $.post('upcoming-pickups-finished.php', post_data, function(response){  
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




<div class="surveys-list">

<div class="survey-info-container">

<div class="row">












<?php



$customer = mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE userID = '".$row2['userID']."'");
$row_customer = mysqli_fetch_array($customer);


?>


    <div class="col-md-12">


               

            
                  <div class="survey-metadata">
                    <div class="item name">
                      <div class="label">Name</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo $row_customer['FirstName']; ?> <?php echo $row_customer['LastName']; ?></div>
                    </div>
                    <div class="item date">
                      <div class="label">Pick Up Date & Time</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo date('F j, Y',strtotime($row2['Pickup_Date'])).' @ '.$row2['Pickup_Time'] ?>
                        </span>
                      </div>
                    </div>


                    <div class="item location">
                      <div class="label">Location</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo $row_customer['Address'].'<br>'.$row_customer['City'].','.$row_customer['State'].' '.$row_customer['Zip'];  ?>
                        </span>
                      </div>
                    </div>







                    <div class="item date">
                      <div class="label"></div>
                      <div class="value" ng-bind="(survey.numberOfCompletedSurveys)">
                        
 <div class="btn-browse"> <a href="#" role="button" class="slide-accept<?php echo $row2['id']; ?>_<?php echo $random; ?>_open">Finished </a></div>
                      
                        

 <div class="btn-browse">
                       <a href="<?php echo BASE_PATH; ?>/ideas/s/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>"> Cancel </a>
                        </div>

                      </div>
                    </div>








                    <div class="clearer"></div>
                  </div>
                  <div class="survey-actions">
                  
                <!--
                <div class="status_request">Status: 

                  Project is <?php echo $row2['ProjectStatus']; ?>
                
                    

                  </div>-->

                      
              


                    </div>
                  </div>
               


  
    
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
   
 
  </div>

  </div>

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>





        
    </body>

</html>
