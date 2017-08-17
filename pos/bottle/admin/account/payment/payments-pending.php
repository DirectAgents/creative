<?php

session_start();
require_once '../../../base_path.php';

include("../../../config.php"); //include config file
require_once '../../../class.admin.php';
require_once '../../../class.customer.php';




$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
  $admin_home->redirect('../../../admin/login');
}



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



    





<?php

$sql = mysqli_query($connecDB,"SELECT * 
from (
    select startupID, userID, ProjectID, Met, Payment from tbl_meeting_recent
    union all
    select startupID, userID, ProjectID, Met, Payment from tbl_meeting_archived_startup
    union all
    select startupID, userID, ProjectID, Met, Payment from tbl_meeting_archived_participant
   
   
) tbl_startup_project
where startupID = '".$_SESSION['startupSession']."' AND Met = 'Yes' AND Payment = '' GROUP BY ProjectID ");


if(mysqli_num_rows($sql) == true)
{


echo '
<h3>Pending Payments</h3>
 <p>&nbsp;</p>';


//get all records from add_delete_record table
while($row = mysqli_fetch_array($sql))
{ 




?>





    <div class="col-lg-12">
     

 <form action="" id="contact-form" class="form-horizontal" method="post">

  <table class="table">
    <tbody>
      <tr class="info">
        <td colspan="1" style="text-align:left">Project#: <?php echo $row['ProjectID']; ?></td>
        <td colspan="1" style="text-align:right"> <a href="<?php echo BASE_PATH; ?>/startup/meetings/pay/?id=<?php echo $row['ProjectID']; ?>&p=<?php echo $row['userID']; ?>" class="pay-amount">Pay Amount</a></td>
        
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
      
  
  


  



  <?php }   ?>


<?php }else{ ?>
<h3>
You don't have any pending payments!
</h3>
  <?php } ?>







      
          




