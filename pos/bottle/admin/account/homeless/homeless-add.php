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



?> 


<script>
$(document).ready(function(){


 $(".save-homeless").click(function() { 
       //alert("asdf");
        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields   
        var firstname = $("input[name=firstname]").val()
        var lastname = $("input[name=lastname]").val()
        var location = $("input[name=location]").val()
        var video = $("input[name=video]").val()


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

         if (video == "" ) { 
            $("#video").css('border-color','red');  //change border color to red   
                proceed = false;
         }else{

          $("#video").css('border-color','green');  //change border color to red   

        }
       
       
        if(proceed) //everything looks good! proceed...
        {
          //$("#profile-form #profile_results").hide().html('<div class="success">Pick-Up Schedule Requested!</div>').slideDown();
            //get input field values data to be sent to server
            post_data = {
                'firstname'    : $("input[name='firstname']").val(),
                'lastname'     : $("input[name='lastname']").val(),
                'location'     : $("input[name='location']").val(),
                'video'        : $("input[name='video']").val()
            };
 

            //alert(time_option1);

            //Ajax post data to server
            $.post('save-homeless.php', post_data, function(response){ 
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

