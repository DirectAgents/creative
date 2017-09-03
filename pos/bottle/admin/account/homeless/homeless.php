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

 <table class="table">
    <tbody>
     

       <tr>
        <td style="text-align:center" class="grey">#</td>
        <td style="text-align:center" class="grey">Name</td>
        <td style="text-align:center" class="grey">Location</td>
        <td style="text-align:center" class="grey">Video</td>
        <td style="text-align:center" class="grey">&nbsp;</td>
        <td style="text-align:center" class="grey">&nbsp;</td>
       
      </tr>';


while($row = mysqli_fetch_array($sql))
{   

?>


      <tr>
        <td style="text-align:center"><?php echo $row['homelessID']; ?></td>
        <td style="text-align:center"><?php echo $row['Firstname']; ?> <?php echo $row['Lastname']; ?></td>
        <td style="text-align:center"><?php echo $row['Location']; ?></td>
        <td style="text-align:center"><a href="<?php echo $row['Video']; ?>">Watch Video</a></td>
        <td style="text-align:center"><button type='button' data-button='{"id": <?php echo $row['id'];?>,"homelessid":""}'>Edit</button></td>
        <td style="text-align:center"><button type='button' data-button='{"id": <?php echo $row['id'];?>,"homelessid": <?php echo $row['homelessID'];?>}'>Delete</button></td>

     
       
      </tr>

    <?php } ?>
  
<?php }else{ ?>
<p>&nbsp;</p>
<h4 class="center">No Homeless Person so far!</h4>

 <?php } ?>



  </tbody>
  </table>

    </div>

</div>    