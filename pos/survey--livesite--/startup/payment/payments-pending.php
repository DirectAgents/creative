<?php

session_start();
require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.startup.php';
require_once '../../class.participant.php';


$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../login');
}



$sql=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_archived WHERE startupID='".$_SESSION['startupSession']."' AND Payment = '' ");
//$result=mysql_query($sql);


//$row = $stmt->fetch(PDO::FETCH_ASSOC);

 
  //if username exists
if(mysqli_num_rows($sql)>0)
{


//get all records from add_delete_record table
while($row = mysqli_fetch_array($sql))
{ 


?>



<script type="text/javascript">
$(document).ready(function() {
$(".launch-photo").click(function() {  
//alert("aads"); 


var me = $(this),
data = me.data('key');
  
var projectid = data.projectid;
var participantid = data.participantid;
var startupid = data.startupid;

//alert(participantid);


$.post('payments-pending-popup.php?projectid='+projectid+'&participantid='+participantid+'&startupid='+startupid, $("#contact-form").serialize(), function(data) {
    //$("#contact-form").hide();
    //alert("aads"); 
   

    $('#result-payment').html(data);

    
   });


    });
   });

</script>



    
<p>&nbsp;</p>

 <h3>Pending Payments</h3>




<?php

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_archived WHERE startupID = '".$_SESSION['startupSession']."' AND Payment = '' ORDER BY id DESC ");
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql)>0)
{


//get all records from add_delete_record table
while($row = mysqli_fetch_array($sql))
{ 



?>




 <div class="therow">
    <div class="col-lg-12">
     

 <form action="" id="contact-form" class="form-horizontal" method="post">

  <table class="table">
    <tbody>
      <tr class="info">
        <td colspan="1" style="text-align:left">Project#: <?php echo $row['ProjectID']; ?></td>
        <td colspan="1" style="text-align:right"> <a href="<?php echo BASE_PATH; ?>/startup/meetings/pay/?id=<?php echo $row['ProjectID']; ?>&p=<?php echo $row['userID']; ?>" class="launch-photo">Pay Amount</a></td>
        
      </tr>




<?php 
//echo $row['userID'];

$sql2=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$row['userID']."'");

while($row2 = mysqli_fetch_array($sql2)){

$sql3=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectID = '".$row['ProjectID']."'");
$row3 = mysqli_fetch_array($sql3);



?>


      <tr>
        <td style="text-align:left"><?php echo $row2['FirstName'].' '.$row2['LastName']; ?></td>
        <td style="text-align:right">$<?php echo $row3['Pay']; ?></td>
       
      </tr>
    
  


<?php } ?>


  </tbody>
  </table>

<div id="result-payment"></div>

  </form>
</div>
      
    </div>
  


  



  <?php } } }  ?>


<?php }else{ ?>
<h3>
You don't have any pending payments!
</h3>
  <?php } ?>







      
          




