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


$sqlhomeless=mysqli_query($connecDB,"SELECT  * FROM homeless WHERE id='".$_GET['id']."'");
$rowhomeless = mysqli_fetch_array($sqlhomeless);   



?> 


<script>
$(document).ready(function(){


 $(".save-homeless").click(function() { 

    var proceed = true;

    var firstname = $("input[name=firstname]").val()
    var lastname = $("input[name=lastname]").val()
    var location = $("input[name=location]").val()
    var needs = $("input[name=needs]").val()
    var video = $("input[name=video]").val()
    var id = $("input[name=id]").val()


    var file_data = $('#photoimg').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('firstname', firstname);
    form_data.append('lastname', lastname);
    form_data.append('location', location);
    form_data.append('needs', needs);
    form_data.append('video', video);
    form_data.append('id', id);
    //alert(form_data);        


    
        if (firstname == "" ) { 
            $("#firstname").css('border-color','red');  //change border color to red   
                proceed = false;
         }else{

          $("#firstname").css('border-color','green');  //change border color to red   

        }

         if (lastname == "" ) { 
            $("#lastname").css('border-color','red');  //change border color to red   
                proceed = false;
         }else{

          $("#lastname").css('border-color','green');  //change border color to red   

        }

        if (location == "" ) { 
            $("#location").css('border-color','red');  //change border color to red   
                proceed = false;
         }else{

          $("#location").css('border-color','green');  //change border color to red   

        }

        if (needs == "" ) { 
            $("#needs").css('border-color','red');  //change border color to red   
                proceed = false;
         }else{

          $("#needs").css('border-color','green');  //change border color to red   

        }

         if (video == "" ) { 
            $("#video").css('border-color','red');  //change border color to red   
                proceed = false;
         }else{

          $("#video").css('border-color','green');  //change border color to red   

        }

 if(proceed) //everything looks good! proceed...
        {

    $.ajax({
                url: 'save-homeless-edit.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    //alert(php_script_response); // display response from the PHP script, if any
                    //$("#profile-form #profile_results").slideUp(); //hide form after success
                    $("#profile-form #profile_results").hide().html(php_script_response).slideDown();
                }
     });

  }


    });



 });
</script> 


<!-- Main -->


    <div id="white-container-account">
      

  
   <iframe name="votar" style="display:none;"></iframe>



<div class="pick-up-request">





<div id='preview'>


<img src="<?php echo BASE_PATH; ?>/images/profile/homeless/<?php echo $rowhomeless['profile_image']; ?>" class="profile-photo"/>
<br><br>
<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
<input type="file" name="photoimg" id="photoimg" />
</form>

</div>



    <form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        
        
<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" class="validate">
       

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
            <label for="firstname">Needs</label>

     
             <input type="text" name="needs" id="needs" value="<?php echo $rowhomeless['Needs']; ?>" class="validate">
    
          
          </span>

          <span class="input">
            <label for="firstname">Video</label>

     
             <input type="text" name="video" id="video" value="<?php echo $rowhomeless['Video']; ?>" class="validate">
    
          
          </span>
        
        </fieldset>
</span>


        <div id="save">
              <input type="submit" class="save-homeless" value="Save"/>

            </div>


   <div style="float:left; width:100%; margin-top:30px;">
 <div id="profile_results"></div>
</div>

      </form>


                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


      
 </div>

