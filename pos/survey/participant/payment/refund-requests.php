<?php

session_start();
include("../../config.php"); //include config file
require_once '../../class.participant.php';



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login.php');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row_participant = $stmt->fetch(PDO::FETCH_ASSOC);




?>



<?php 



$sql2=mysqli_query($connecDB,"SELECT DISTINCT(checkout_find_date) FROM wepay WHERE participant_id = '".$_SESSION['participantSession']."' AND refundrequest = 'yes' AND refunded = ''  ORDER BY order_by DESC ");
//$result2=mysql_query($sql2);

  //if username exists
if(mysqli_num_rows($sql2)>0)
{



?>
        
        

        <h2 class="no-mobile">
         Refund Requests
        </h2>

  <fieldset>

<section data-group="payment" style="">
    
      <div class="note notforheader mobile-block">



<?php

$sql="SELECT * FROM wepay WHERE participant_id = '".$_SESSION['participantSession']."' AND refundrequest = 'yes' AND refunded = '' ORDER BY order_by DESC ";
$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

$sum = 0;

//get all records from add_delete_record table
while($row = mysql_fetch_array($result))
{ 

$sum+= $row['total'];

}




?>


        
          <h2><?php echo "$"; echo $sum; ?></h2>
        
        
      </div>
    





<?php

$sql="SELECT DISTINCT(checkout_find_date) FROM wepay WHERE participant_id = '".$_SESSION['participantSession']."' AND refundrequest = 'yes' AND refunded = ''  ORDER BY order_by DESC ";
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
     



  <table class="table table-striped" id="transactions">
    <tbody>
      <tr class="info">
        <td colspan="3" style="text-align:left"><?php echo $row['checkout_find_date']; ?></td>
        
      </tr>




<?php 
$sql="SELECT * FROM wepay WHERE participant_id = '".$_SESSION['participantSession']."' AND refundrequest = 'yes' AND refunded = '' ORDER BY id DESC ";
$result2=mysql_query($sql);
while($row2 = mysql_fetch_array($result2)){

$sql3="SELECT * FROM tbl_researcher WHERE userID = '".$row2['researcher_id']."'";
$result3=mysql_query($sql3);
$row3 = mysql_fetch_array($result3);





?>


      <tr>
        <td style="text-align:left"><?php echo $row3['FirstName'].' '.$row3['LastName']; ?></td>
        <td style="text-align:right">$<?php echo $row2['total']; ?></td>
        <td style="text-align:right"><a href="refund/?id=<?php echo $row2['id']; ?>">View Details</a></td>
       
      </tr>
    
  






  </tbody>
  </table>
</div>
      
    </div>
  


  

<?php } ?>

<?php } ?>

 <?php } ?>

<?php }else{ ?>
<div class="no-account-yet">
<h3>No Refund Requests!</h3>
</div>
<?php } ?>





      
          




