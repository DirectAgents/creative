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

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_completed_tasks WHERE Payment = 'N' ORDER BY id DESC ");


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
        <td colspan="1" style="text-align:left">Task#: <?php echo $row['taskID']; ?></td>
        <td colspan="1" style="text-align:right"> </td>
        
      </tr>




<?php 
//echo $row['userID'];

$sql2=mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE userID = '".$row['userID']."'");

while($row2 = mysqli_fetch_array($sql2)){





?>


      <tr>
        <td style="text-align:left"><?php echo $row2['FirstName'].' '.$row2['LastName']; ?></td>
        <td style="text-align:right"><a href="<?php echo BASE_PATH; ?>/startup/meetings/pay/?id=<?php echo $row['ProjectID']; ?>&p=<?php echo $row['userID']; ?>">Pay Customer</a></td>
       
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







      
          




