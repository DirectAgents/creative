<?php

session_start();
require_once '../../../base_path.php';

include("../../../config.php"); //include config file
require_once '../../../class.admin.php';
require_once '../../../class.customer.php';

require_once '../../../wepay.php';


$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
  $admin_home->redirect('../login');
}


$sqladmin=mysqli_query($connecDB,"SELECT * FROM tbl_admin WHERE userID = '".$_SESSION['adminSession']."'");
//$resultstartup=mysql_query($sqlstartup);
$rowadmin = mysqli_fetch_array($sqladmin);




?>




<div class="col-lg-12">  

 
    
     
    
<p>&nbsp;</p>



<form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        
        

        <h2 class="no-mobile">
          Basic information
        </h2>

        <fieldset>
          <span class="input">
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname" placeholder="John Doe" class="validate">
          </span>
           <span class="input">
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname" placeholder="John Doe"  class="validate">
          </span>
           <span class="input">
            <label for="lastname">Youtube Link</label>
            <input type="text" name="lastname" id="lastname" placeholder="John Doe" class="validate">
          </span>
        </fieldset>

        

        


        <div id="save">
              <input type="submit" class="save-profile" value="Save"/>

            </div>


   <div style="float:left; width:100%; margin-top:30px;">
 <div id="profile_results"></div>
</div>

      </form>




     





</div>
      
  


  





      
          




