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








$("#request-new-pick-up-date").click(function() { 

         $( "#white-container-account" ).load( "request-new-pickup.php" );

         $( ".pick-up-requested" ).hide();

 }); 



$("#request-new-pick-up-date-after-canceled-upcoming-pickup").click(function() { 

         $( "#white-container-account" ).load( "request-new-pickup-after-canceled-upcoming-pickup.php" );

         $( ".pick-up-requested" ).hide();

 }); 



 $(".schedule-pickup").click(function() { 
       //alert("asdf");
        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields   
        var date_option1 = $("input[name=date_option_one]").val()
        var time_option1 = $("select[name='time_option_one']").val()

        var date_option2 = $("input[name='date_option_two']").val()
        var time_option2 = $("select[name='time_option_two']").val()

        var date_option3 = $("input[name='date_option_three']").val()
        var time_option3 = $("select[name='time_option_three']").val()
       


       
        if(proceed) //everything looks good! proceed...
        {
          //$("#profile-form #profile_results").hide().html('<div class="success">Pick-Up Schedule Requested!</div>').slideDown();
            //get input field values data to be sent to server
            post_data = {
                'date_option1'     : $("input[name='date_option_one']").val(),
                'time_option1'     : $("select[name='time_option_one']").val(),
                'date_option2'     : $("input[name='date_option_two']").val(),
                'time_option2'     : $("select[name='time_option_two']").val(),
                'date_option3'     : $("input[name='date_option_three']").val(),
                'time_option3'     : $("select[name='time_option_three']").val()
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





  <script>
  
  $(function() {
    $( "#date_option_one" ).datepicker({ minDate: 2});
    $( "#date_option_two" ).datepicker({ minDate: 2});
    $( "#date_option_three" ).datepicker({ minDate: 2});
  });

  </script>



<!-- Main -->






    <div id="white-container-account">
      





  
   <iframe name="votar" style="display:none;"></iframe>











<div class="pick-up-request">




  <h4><strong>Choose 3 possible dates and pick up times for us to collect your bag(s)</strong></h4>
  <p>&nbsp;</p>

    <form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        
        

        <h2 class="no-mobile">
          Pick up Day #1
        </h2>

  <span class="col-sm-6">
        <fieldset>
          <span class="input">
            <label for="firstname">Day of Pickup</label>

     
               <input class="form-control" name="date_option_one" id="date_option_one" type="text" placeholder="Click to select a date" 
               value="<?php echo $row_pickup_request['Schedule_Date_Option1']; ?>"/>

          
          </span>

          </span>
        </fieldset>
</span>



 <span class="col-sm-6">


        <fieldset>
          <span class="input">
            <label for="firstname">Time</label>
           
             <span class="select-wrapper">
            
              <select name="time_option_one" id="time_option_one" class="fromto">
  <option value="" <?php if($row_pickup_request['Schedule_Time_Option1'] == ''){echo 'selected';}?>>Time of pickup</option>
  <option value="6:00am - 9:00am" <?php if($row_pickup_request['Schedule_Time_Option1'] == '6:00am - 9:00am'){echo 'selected';}?>>6:00am - 9:00am</option>
  <option value="9:00am - 12:00pm" <?php if($row_pickup_request['Schedule_Time_Option1'] == '9:00am - 12:00pm'){echo 'selected';}?>>9:00am - 12:00pm</option>
  <option value="12:00pm - 3:00pm" <?php if($row_pickup_request['Schedule_Time_Option1'] == '12:00pm - 3:00pm'){echo 'selected';}?>>12:00pm - 3:00pm</option>
  <option value="3:00pm - 6:00pm" <?php if($row_pickup_request['Schedule_Time_Option1'] == '3:00pm - 6:00pm'){echo 'selected';}?>>3:00pm - 6:00pm</option>
  <option value="6:00pm - 9:00pm" <?php if($row_pickup_request['Schedule_Time_Option1'] == '6:00pm - 9:00pm'){echo 'selected';}?>>6:00pm - 9:00pm</option>
  <option value="9:00pm - 12:00am" <?php if($row_pickup_request['Schedule_Time_Option1'] == '9:00pm - 12:00am'){echo 'selected';}?>>9:00pm - 12:00am</option>
 
               </select>

               
            </span>
          </span>

          </span>
        </fieldset>

    </span>    


<p>&nbsp;</p>
        
<h2 class="no-mobile">
          Pick up Day #2
        </h2>

  <span class="col-sm-6">
        <fieldset>
          <span class="input">
            <label for="firstname">Day of Pickup</label>

     
               <input class="form-control" name="date_option_two" id="date_option_two" type="text" placeholder="Click to select a date"
               value="<?php echo $row_pickup_request['Schedule_Date_Option2']; ?>"/>

          
          </span>

          </span>
        </fieldset>
</span>



 <span class="col-sm-6">


        <fieldset>
          <span class="input">
            <label for="firstname">Time</label>
           
             <span class="select-wrapper">
            
              <select name="time_option_two" id="time_option_two" class="fromto">
  <option value="" <?php if($row_pickup_request['Schedule_Time_Option2'] == ''){echo 'selected';}?>>Time of pickup</option>
   <option value="6:00am - 9:00am" <?php if($row_pickup_request['Schedule_Time_Option2'] == '6:00am - 9:00am'){echo 'selected';}?>>6:00am - 9:00am</option>
  <option value="9:00am - 12:00pm" <?php if($row_pickup_request['Schedule_Time_Option2'] == '9:00am - 12:00pm'){echo 'selected';}?>>9:00am - 12:00pm</option>
  <option value="12:00pm - 3:00pm" <?php if($row_pickup_request['Schedule_Time_Option2'] == '12:00pm - 3:00pm'){echo 'selected';}?>>12:00pm - 3:00pm</option>
  <option value="3:00pm - 6:00pm" <?php if($row_pickup_request['Schedule_Time_Option2'] == '3:00pm - 6:00pm'){echo 'selected';}?>>3:00pm - 6:00pm</option>
  <option value="6:00pm - 9:00pm" <?php if($row_pickup_request['Schedule_Time_Option2'] == '6:00pm - 9:00pm'){echo 'selected';}?>>6:00pm - 9:00pm</option>
  <option value="9:00pm - 12:00am" <?php if($row_pickup_request['Schedule_Time_Option2'] == '9:00pm - 12:00am'){echo 'selected';}?>>9:00pm - 12:00am</option>
               </select>

               
            </span>
          </span>

          </span>
        </fieldset>

    </span>    


        

       <p>&nbsp;</p>


        <h2 class="no-mobile">
          Pick up Day #3
        </h2>

  <span class="col-sm-6">
        <fieldset>
          <span class="input">
            <label for="firstname">Day of Pickup</label>

     
               <input class="form-control" name="date_option_three" id="date_option_three" type="text" placeholder="Click to select a date"
               value="<?php echo $row_pickup_request['Schedule_Date_Option3']; ?>"/>
              
          
          </span>

          </span>
        </fieldset>
</span>



 <span class="col-sm-6">


        <fieldset>
          <span class="input">
            <label for="firstname">Time</label>
           
             <span class="select-wrapper">
            
              <select name="time_option_three" id="time_option_three" class="fromto">
  <option value="" <?php if($row_pickup_request['Schedule_Time_Option3'] == ''){echo 'selected';}?>>Time of pickup</option>
   <option value="6:00am - 9:00am" <?php if($row_pickup_request['Schedule_Time_Option3'] == '6:00am - 9:00am'){echo 'selected';}?>>6:00am - 9:00am</option>
  <option value="9:00am - 12:00pm" <?php if($row_pickup_request['Schedule_Time_Option3'] == '9:00am - 12:00pm'){echo 'selected';}?>>9:00am - 12:00pm</option>
  <option value="12:00pm - 3:00pm" <?php if($row_pickup_request['Schedule_Time_Option3'] == '12:00pm - 3:00pm'){echo 'selected';}?>>12:00pm - 3:00pm</option>
  <option value="3:00pm - 6:00pm" <?php if($row_pickup_request['Schedule_Time_Option3'] == '3:00pm - 6:00pm'){echo 'selected';}?>>3:00pm - 6:00pm</option>
  <option value="6:00pm - 9:00pm" <?php if($row_pickup_request['Schedule_Time_Option3'] == '6:00pm - 9:00pm'){echo 'selected';}?>>6:00pm - 9:00pm</option>
  <option value="9:00pm - 12:00am" <?php if($row_pickup_request['Schedule_Time_Option3'] == '9:00pm - 12:00am'){echo 'selected';}?>>9:00pm - 12:00am</option>
               </select>

               
            </span>
          </span>

          </span>
        </fieldset>

    </span>    

  


        <div id="save">
              <input type="submit" class="schedule-pickup" value="Schedule Pickup"/>

            </div>


   <div style="float:left; width:100%; margin-top:30px;">
 <div id="profile_results"></div>
</div>

      </form>




    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


      
 </div>


   <script>
$(document).ready(function () {

    $('#slide').popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });

    
});
</script>
  
