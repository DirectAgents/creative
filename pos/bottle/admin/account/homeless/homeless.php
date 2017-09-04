<?php

session_start();
require_once '../../../base_path.php';


require_once '../../../class.admin.php';
require_once '../../../config.php';
require_once '../../../config.inc.php';


require '../../../wepay.php';


$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
  $admin_home->redirect('../../../admin/');
}



$stmt = $admin_home->runQuery("SELECT * FROM tbl_admin WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);





?>



<script>
$(document).ready(function(){


$("#add_homeless").click(function() {  

      $( "#the-container" ).load( "homeless-add.php" );

    });


$(function(){
    
    jQuery.fn.id = function () {
    
       var options = $.parseJSON($(this).attr('data-button'));
        
       var id = (options.id);
       var homelessid = (options.homelessid);
       //alert(options.deletehomeless);

      if(id !='' && homelessid == ''){

      $( "#the-container" ).load( "homeless-edit.php?id="+id);
    
      }

      if(id !='' && homelessid != ''){

      $( "#the-container" ).load( "homeless-delete.php?homelessid="+homelessid);
    
      }

   

       return this;
    }

    $('button').click(function(){
        //var data='hello inside';
    
        $(this).id();
        $(this).homelessid();
    });


});





 }); 

 </script>



<div id="the-container">

  <div class="col-lg-12">





 


<?php
$sql=mysqli_query($connecDB,"SELECT  * FROM homeless ORDER BY id DESC");
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql)>0)
{

echo '

  <div class="create-one-here-box" style="float:right">
      <div class="create-one schedule-one-here">
        <a href="#" id="add_homeless" class="create-one-btn">+Add Homeless</a>

       </div> 
  </div>
</div>

<p>&nbsp;</p>


';


echo '

 <table class="table">
    <tbody>
     

       <tr>
        <td style="text-align:center" class="grey">#</td>
        <td style="text-align:center" class="grey">&nbsp;</td>
        <td style="text-align:center" class="grey">Name</td>
        <td style="text-align:center" class="grey">Location</td>
        <td style="text-align:center" class="grey">Needs</td>
        <td style="text-align:center" class="grey">Donations</td>
        <td style="text-align:center" class="grey">Video</td>
        <td style="text-align:center" class="grey">&nbsp;</td>
        <td style="text-align:center" class="grey">&nbsp;</td>
       
      </tr>';


while($row = mysqli_fetch_array($sql))
{   



$sqlwepay=mysqli_query($connecDB,"SELECT  * FROM wepay WHERE homelessID = '".$row['homelessID']."'");

$final_donation = 0;

while($rowwepay = mysqli_fetch_array($sqlwepay))

{  

//echo $rowwepay['TaskID'];

$final_donation+= $rowwepay['homeless_donation'];

} 






?>


      <tr>
        <td style="text-align:center"><?php echo $row['homelessID']; ?></td>
        
        <?php if($row['profile_image'] != ''){ ?>
        <td style="text-align:center"><img src="<?php echo BASE_PATH; ?>/images/profile/homeless/<?php echo $row['profile_image']; ?>" class="thumb"/></td>
        <?php }else{ ?>
    <td style="text-align:center"><img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" class="thumb"/></td>
        <?php } ?>


        <td style="text-align:center"><?php echo $row['Firstname']; ?> <?php echo $row['Lastname']; ?></td>
        <td style="text-align:center"><?php echo $row['Location']; ?></td>
        <td style="text-align:center"><?php echo $row['Needs']; ?></td>
        <td style="text-align:center">$<?php echo $final_donation; ?></td>
        <td style="text-align:center"><a href="<?php echo $row['Video']; ?>">Watch Video</a></td>
        <td style="text-align:center"><button type='button' data-button='{"id": <?php echo $row['id'];?>,"homelessid":""}'>Edit</button></td>
        <td style="text-align:center"><button type='button' data-button='{"id": <?php echo $row['id'];?>,"homelessid": <?php echo $row['homelessID'];?>}'>Delete</button></td>

     
       
      </tr>

    <?php } ?>
  
<?php }else{ ?>
<p>&nbsp;</p>
<h4 class="center">No Homeless Person so far!</h4>


  <div class="create-one-here-box">
      <div class="create-one schedule-one-here">
        <a href="#" id="add_homeless" class="create-one-btn">+Add Homeless</a>

       </div> 
  </div>
</div>




 <?php } ?>



  </tbody>
  </table>

    </div>

</div>    