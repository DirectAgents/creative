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


$random = rand(5, 20000);


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


    var file_data = $('#photoimg').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('firstname', firstname);
    form_data.append('lastname', lastname);
    form_data.append('location', location);
    form_data.append('needs', needs);
    form_data.append('video', video);
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
                url: 'save-homeless.php', // point to server-side PHP script 
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




  <p>&nbsp;</p>



<div id='preview'>


<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
Profile Photo<br><br><input type="file" name="photoimg" id="photoimg" />
</form>

</div>

 <div id="result-photo"></div>     

   

    



    <form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        

       

  <span class="col-sm-12">
        <fieldset>
          <span class="input">
            <label for="firstname">Firstname</label>

     
             <input type="text" name="firstname" id="firstname" class="validate">
    
          
          </span>

          <span class="input">
            <label for="firstname">Lastname</label>

     
             <input type="text" name="lastname" id="lastname" class="validate">
    
          
          </span>

          <span class="input">
            <label for="firstname">Location</label>

     
             <input type="text" name="location" id="location" class="validate">
    
          
          </span>


           <span class="input">
            <label for="firstname">Needs</label>

     
             <input type="text" name="needs" id="needs" class="validate">
    
          
          </span>

          <span class="input">
            <label for="firstname">Video</label>

     
             <input type="text" name="video" id="video" class="validate">
    
          
          </span>
        
        </fieldset>
</span>


        <div id="save">
              <input type="submit" class="save-homeless" value="Add Homeless"/>

            </div>


   <div style="float:left; width:100%; margin-top:30px;">
 <div id="profile_results"></div>
</div>

      </form>


                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


      
 </div>



