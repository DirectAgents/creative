<?php

session_start();
require_once '../../../base_path.php';


require_once '../../../class.admin.php';
require_once '../../../config.php';
require_once '../../../config.inc.php';







$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
  $admin_home->redirect('../../../admin/');
}

$stmt = $admin_home->runQuery("SELECT * FROM tbl_admin WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$sqlhomeless=mysqli_query($connecDB,"SELECT  * FROM homeless WHERE homelessID='".$_GET['homelessid']."'");
$rowhomeless = mysqli_fetch_array($sqlhomeless);   



?> 


<script>
$(document).ready(function(){


 $(".save-homeless").click(function() { 
       //alert("asdf");
        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields   
      

        var homelessid = $("input[name=homelessid]").val()

        
       
       
        if(proceed) //everything looks good! proceed...
        {
          //$("#profile-form #profile_results").hide().html('<div class="success">Pick-Up Schedule Requested!</div>').slideDown();
            //get input field values data to be sent to server
            post_data = {
                'homelessid'   : $("input[name='homelessid']").val()
            };
 

            //alert(time_option1);

            //Ajax post data to server
            $.post('save-homeless-delete.php', post_data, function(response){ 
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = response.text;
                    //reset values in all input fields
                    $("#profile-form select[required=true]").val(''); 
                    $("#profile-form #profile_results").slideUp(); //hide form after success
                  
          

                }
                $("#profile-form #profile_results").hide().html(output).slideDown();
            }, 'json');
        }
       

    });



 });
</script> 


<!-- Main -->


    <div id="white-container-account">
      

  
   <iframe name="votar" style="display:none;"></iframe>



<div class="pick-up-request">




  <p>&nbsp;</p>

    <form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        
        
<input type="hidden" name="homelessid" id="homelessid" value="<?php echo $_GET['homelessid']; ?>" class="validate">
       

  <span class="col-sm-12">
        <fieldset>
          <span class="input">
            <label for="firstname">Firstname</label>

     
             <input type="text" name="firstname" id="firstname" value="<?php echo $rowhomeless['Firstname']; ?>" class="validate">
    
          
          </span>

          <span class="input">
            <label for="firstname">Lastname</label>

     
             <input type="text" name="lastname" id="lastname" value="<?php echo $rowhomeless['Lastname']; ?>" class="validate">
    
          
          </span>

          <span class="input">
            <label for="firstname">Location</label>

     
             <input type="text" name="location" id="location" value="<?php echo $rowhomeless['Location']; ?>" class="validate">
    
          
          </span>

          <span class="input">
            <label for="firstname">Video</label>

     
             <input type="text" name="video" id="video" value="<?php echo $rowhomeless['Video']; ?>" class="validate">
    
          
          </span>
        
        </fieldset>
</span>


        <div id="save">
              <input type="submit" class="save-homeless" value="Delete"/>

            </div>


   <div style="float:left; width:100%; margin-top:30px;">
 <div id="profile_results"></div>
</div>

      </form>


                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


      
 </div>

