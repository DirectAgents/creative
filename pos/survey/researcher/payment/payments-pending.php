<?php

session_start();
require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.researcher.php';
require_once '../../class.participant.php';


$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../login');
}



$sql=mysqli_query($connecDB,"SELECT * FROM tbl_project_request WHERE researcherID='".$_SESSION['researcherSession']."' AND Payment = ''");
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
var researcherid = data.researcherid;

//alert(participantid);


$.post('payments-pending-popup.php?projectid='+projectid+'&participantid='+participantid+'&researcherid='+researcherid, $("#contact-form").serialize(), function(data) {
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

$sql="SELECT * FROM tbl_project_request WHERE researcherID = '".$_SESSION['researcherSession']."' AND Payment = '' ORDER BY id DESC ";
$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysql_num_rows($result)>0)
{


//get all records from add_delete_record table
while($row = mysql_fetch_array($result))
{ 



?>




 <div class="therow">
    <div class="col-lg-12">
     

 <form action="" id="contact-form" class="form-horizontal" method="post">

  <table class="table">
    <tbody>
      <tr class="info">
        <td colspan="1" style="text-align:left">Project#: <?php echo $row['ProjectID']; ?></td>
        <td colspan="1" style="text-align:right"> <a href="#" class="launch-photo" data-toggle="modal" data-target="#modal" data-key='{"projectid":"<?php echo $row['ProjectID']; ?>","participantid":"<?php echo $row['userID']; ?>","researcherid":"<?php echo $row['researcherID']; ?>"}'>Pay Amount</a></td>
        
      </tr>




<?php 


$sql="SELECT * FROM tbl_participant WHERE userID = '".$row['userID']."'";
$result2=mysql_query($sql);
while($row2 = mysql_fetch_array($result2)){


$sql3="SELECT * FROM tbl_researcher_project WHERE ProjectID = '".$row['ProjectID']."'";
$result3=mysql_query($sql3);
$row3 = mysql_fetch_array($result3);



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







      
          




