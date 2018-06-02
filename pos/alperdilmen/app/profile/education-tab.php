<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


 $sql = "SELECT * FROM tbl_users WHERE userID ='".$_GET['userid']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_entrepreneur = mysqli_fetch_array($result);


 if($_GET){

 ?>
         <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $row_entrepreneur['userID']) { ?>
                        <div id="add-a-team-member">
                             <div class="col-sm-12" style="padding-left:15px">
                                         <div class="row"> 
                                             <ul class="side-icon-text pull-left">
                                                    <li><a href="#" class="add-team-member"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add a Team Member</span></a></li>
                                             </ul>
                                        </div>
                            </div> 
                             <p>&nbsp;</p>  
                         </div>  
                        <?php } ?>  



<?php 

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_education WHERE userID ='".$_GET['userid']."'");
while($row = mysqli_fetch_array($sql)){  

?>

<h3><strong><?php echo $row['University']; ?></strong></h3>


<?php

  }
} 

?>