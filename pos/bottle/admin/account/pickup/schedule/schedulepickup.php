<?php

session_start();
require_once '../../../base_path.php';


require_once '../../../class.customer.php';
require_once '../../../config.php';
require_once '../../../config.inc.php';


require '../../../wepay.php';




$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../../login');
}

$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




  

?> 


<script>
$(document).ready(function(){


$("#request-new-pick-up-date").click(function() { 



         $( "#white-container-account" ).load( "request-new-pickup.php" );


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
       



       if (date_option1.length < 1 ) {
        
            
            $("#date_option_one").css('border-color','red');  //change border color to red  
            proceed = false;
           
          
        }else{

          $("#date_option_one").css('border-color','green');  //change border color to red  

        }


        if (time_option1 == "" ) { 
            $("#time_option_one").css('border-color','red');  //change border color to red   
                proceed = false;
         }else{

          $("#time_option_one").css('border-color','green');  //change border color to red   

        }
        
    


       if (date_option1.length > 0 && time_option1 != ""  ) {
            
            $("#date_option_one").css('border-color','green');  //change border color to red   
            $("#time_option_one").css('border-color','green');  //change border color to red   
            proceed = true;
          
        }





         if (date_option2.length > 0 ) {
            
            $("#time_option_two").css('border-color','red');  //change border color to red  
            proceed = false;
           
          
        }


        if (time_option2 != "" ) { 
            $("#date_option_two").css('border-color','red');  //change border color to red   
                proceed = false;
        }
        

       if (date_option2.length < 0 && time_option2 == ""  ) {
            
            $("#date_option_two").css('border-color','none');  //change border color to red   
            $("#time_option_two").css('border-color','none');  //change border color to red   
            proceed = false;
          
        } 
    


       if (date_option2.length > 0 && time_option2 != ""  ) {
            
            $("#date_option_two").css('border-color','green');  //change border color to red   
            $("#time_option_two").css('border-color','green');  //change border color to red   
            proceed = true;
          
        }




        if (date_option3.length > 0 ) {
            
            $("#time_option_three").css('border-color','red');  //change border color to red  
            proceed = false;
           
          
        }


        if (time_option3 != "" ) { 
            $("#date_option_three").css('border-color','red');  //change border color to red   
                proceed = false;
        }
        


       if (date_option3.length < 0 && time_option3 == ""  ) {
            
            $("#date_option_three").css('border-color','none');  //change border color to red   
            $("#time_option_three").css('border-color','none');  //change border color to red   
            proceed = false;
          
        }
    


       if (date_option3.length > 0 && time_option3 != ""  ) {
            
            $("#date_option_three").css('border-color','green');  //change border color to red   
            $("#time_option_three").css('border-color','green');  //change border color to red   
            proceed = true;
          
        }



       
       
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
            $.post('save.php', post_data, function(response){ 
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



$(".cancel-pickup").click(function() { 


post_data = {
                'confirmed_pickup_date'     : $("input[name='confirmed_pickup_date']").val(),
                'confirmed_pickup_time'     : $("input[name='confirmed_pickup_time']").val()
            };


 //Ajax post data to server
            $.post('cancel-pickup.php', post_data, function(response){ 
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = response.text;
                    //reset values in all input fields
                   
                  
                  $(".result-accept").show().slideDown(); 

                }
                $("#profile-form #profile_results").hide().html(output).slideDown();
            }, 'json');

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







<?php if($row['Address'] == '' || $row['City'] == '' || $row['State'] == '' || $row['Zip'] == '') { ?>

<h3>Please provide your physical address to be able the schedule a pick-up </h3>


<div class="create-one-here-box">
      <div class="create-one">

        <a href="<?php echo BASE_PATH; ?>/account/myinfo/?id=<?php echo $_SESSION['customerSession'];?>" class="create-one-btn">Add Address</a>

       </div> 
       <p>&nbsp;</p>
  </div>
  </div>


<?php } ?>




<?php if($row['Confirmed_Pickup_Date'] != '' && $row['Confirmed_Pickup_Time'] != '') { ?>

<div class="pick-up-requested">

<h3>We have confirmed the following pick-up date: </h3>
<p>&nbsp;</p>
<h4><?php echo date('F j, Y',strtotime($row['Confirmed_Pickup_Date'])).' @ '.$row['Confirmed_Pickup_Time']  ?> </h4>
 <p>&nbsp;</p>

      <div class="create-one">

        <a href="#" role="button" class="slide_open create-one-btn">Cancel Pick up Date</a>
       </div> 
      
  </div>

</div>



 <!-- Add content to the popup -->

<div id="slide" class="well slide">
  <div class="result-accept">
  <div id="result-accept">Successfully Canceled!</div>
  </div>

<input type="text" name="confirmed_pickup_date" id="confirmed_pickup_date" value="<?php echo $row['Confirmed_Pickup_Date']; ?>"/>
<input type="text" name="confirmed_pickup_time" id="confirmed_pickup_time" value="<?php echo $row['Confirmed_Pickup_Time']; ?>"/>

<h4>Are you sure you want to cancel the pick-up date?</h4>


<div class="popupoverlay-btn">
  <div class="cancel-decline">
    <button class="slide_close cancel">Cancel</button>
    <button class="decline btn-delete cancel-pickup">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-decline">
    <button class="slide_close cancel">Close</button>
</div>
</div>

</div>
</div>

 <!-- End content to the popup -->



<?php } ?>





<?php if($row['Schedule_Date_Option1'] != '' && $row['Schedule_Time_Option1'] != '' && $row['Confirmed_Pickup_Date'] == '' && $row['Confirmed_Pickup_Time'] == '') { ?>

<div class="pick-up-requested">

<h3>You have requested a pick up for the following date(s) </h3>
<p>&nbsp;</p>
<h4><?php echo date('F j, Y',strtotime($row['Schedule_Date_Option1'])).' @ '.$row['Schedule_Time_Option1']  ?> </h4>

<?php if($row['Schedule_Date_Option2'] != '' && $row['Schedule_Time_Option1'] != '' ) { ?>
<h4><?php echo date('F j, Y',strtotime($row['Schedule_Date_Option2'])).' @ '.$row['Schedule_Time_Option2']  ?> </h4>
<?php } ?>

<?php if($row['Schedule_Date_Option3'] != '' && $row['Schedule_Time_Option3'] != '' ) { ?>
<h4><?php echo date('F j, Y',strtotime($row['Schedule_Date_Option3'])).' @ '.$row['Schedule_Time_Option3']  ?> </h4>
<?php } ?>

<p>&nbsp;</p>

      <div class="create-one">

        <a href="#" class="create-one-btn" id="request-new-pick-up-date">Request New Pick up Date</a>

       </div> 
       <p>&nbsp;</p>
  </div>

</div>

<?php } ?>



<div class="pick-up-request">


 <?php if($row['Address'] != '' && $row['City'] != '' && $row['State'] != '' && $row['Zip'] != '' && $row['Schedule_Date_Option1'] == '' && $row['Schedule_Time_Option1'] == '') { ?>



    <form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        
        

        <h2 class="no-mobile">
          Pick up Day #1
        </h2>

  <span class="col-sm-6">
        <fieldset>
          <span class="input">
            <label for="firstname">Day of Pickup</label>

     
               <input class="form-control" name="date_option_one" id="date_option_one" type="text" placeholder="Choose date of pick-up" 
               value="<?php echo $row['Schedule_Date_Option1']; ?>"/>

          
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
  <option value="" <?php if($row['Schedule_Time_Option1'] == ''){echo 'selected';}?>>Time of pickup</option>
  <option value="06:00am" <?php if($row['Schedule_Time_Option1'] == '06:00am'){echo 'selected';}?>>06:00 AM</option>
  <option value="07:00am" <?php if($row['Schedule_Time_Option1'] == '07:00am'){echo 'selected';}?>>07:00 AM</option>
  <option value="08:00am" <?php if($row['Schedule_Time_Option1'] == '08:00am'){echo 'selected';}?>>08:00 AM</option>
  <option value="09:00am" <?php if($row['Schedule_Time_Option1'] == '09:00am'){echo 'selected';}?>>09:00 AM</option>
  <option value="10:00am" <?php if($row['Schedule_Time_Option1'] == '10:00am'){echo 'selected';}?>>10:00 AM</option>
  <option value="11:00am" <?php if($row['Schedule_Time_Option1'] == '11:00am'){echo 'selected';}?>>11:00 AM</option>
  <option value="12:00pm" <?php if($row['Schedule_Time_Option1'] == '12:00pm'){echo 'selected';}?>>12:00 PM</option>
  <option value="01:00pm" <?php if($row['Schedule_Time_Option1'] == '01:00pm'){echo 'selected';}?>>01:00 PM</option>
  <option value="02:00pm" <?php if($row['Schedule_Time_Option1'] == '02:00pm'){echo 'selected';}?>>02:00 PM</option>
  <option value="03:00pm" <?php if($row['Schedule_Time_Option1'] == '03:00pm'){echo 'selected';}?>>03:00 PM</option>
  <option value="04:00pm" <?php if($row['Schedule_Time_Option1'] == '04:00pm'){echo 'selected';}?>>04:00 PM</option>
  <option value="05:00pm" <?php if($row['Schedule_Time_Option1'] == '05:00pm'){echo 'selected';}?>>05:00 PM</option>
  <option value="06:00pm" <?php if($row['Schedule_Time_Option1'] == '06:00pm'){echo 'selected';}?>>06:00 PM</option>
  <option value="07:00pm" <?php if($row['Schedule_Time_Option1'] == '07:00pm'){echo 'selected';}?>>07:00 PM</option>
  <option value="08:00pm" <?php if($row['Schedule_Time_Option1'] == '08:00pm'){echo 'selected';}?>>08:00 PM</option>
  <option value="09:00pm" <?php if($row['Schedule_Time_Option1'] == '09:00pm'){echo 'selected';}?>>09:00 PM</option>
  <option value="10:00pm" <?php if($row['Schedule_Time_Option1'] == '10:00pm'){echo 'selected';}?>>10:00 PM</option>
  <option value="11:00pm" <?php if($row['Schedule_Time_Option1'] == '11:00pm'){echo 'selected';}?>>11:00 PM</option>
  <option value="12:00am" <?php if($row['Schedule_Time_Option1'] == '12:00am'){echo 'selected';}?>>12:00 AM</option>
               </select>

               
            </span>
          </span>

          </span>
        </fieldset>

    </span>    


<p>&nbsp;</p>
        
<h2 class="no-mobile">
          Pick up Day #2 (optional)
        </h2>

  <span class="col-sm-6">
        <fieldset>
          <span class="input">
            <label for="firstname">Day of Pickup</label>

     
               <input class="form-control" name="date_option_two" id="date_option_two" type="text" placeholder="Choose date of pick-up"
               value="<?php echo $row['Schedule_Date_Option2']; ?>"/>

          
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
  <option value="" <?php if($row['Schedule_Time_Option2'] == ''){echo 'selected';}?>>Time of pickup</option>
  <option value="06:00am" <?php if($row['Schedule_Time_Option2'] == '06:00am'){echo 'selected';}?>>06:00 AM</option>
  <option value="07:00am" <?php if($row['Schedule_Time_Option2'] == '07:00am'){echo 'selected';}?>>07:00 AM</option>
  <option value="08:00am" <?php if($row['Schedule_Time_Option2'] == '08:00am'){echo 'selected';}?>>08:00 AM</option>
  <option value="09:00am" <?php if($row['Schedule_Time_Option2'] == '09:00am'){echo 'selected';}?>>09:00 AM</option>
  <option value="10:00am" <?php if($row['Schedule_Time_Option2'] == '10:00am'){echo 'selected';}?>>10:00 AM</option>
  <option value="11:00am" <?php if($row['Schedule_Time_Option2'] == '11:00am'){echo 'selected';}?>>11:00 AM</option>
  <option value="12:00pm" <?php if($row['Schedule_Time_Option2'] == '12:00pm'){echo 'selected';}?>>12:00 PM</option>
  <option value="01:00pm" <?php if($row['Schedule_Time_Option2'] == '01:00pm'){echo 'selected';}?>>01:00 PM</option>
  <option value="02:00pm" <?php if($row['Schedule_Time_Option2'] == '02:00pm'){echo 'selected';}?>>02:00 PM</option>
  <option value="03:00pm" <?php if($row['Schedule_Time_Option2'] == '03:00pm'){echo 'selected';}?>>03:00 PM</option>
  <option value="04:00pm" <?php if($row['Schedule_Time_Option2'] == '04:00pm'){echo 'selected';}?>>04:00 PM</option>
  <option value="05:00pm" <?php if($row['Schedule_Time_Option2'] == '05:00pm'){echo 'selected';}?>>05:00 PM</option>
  <option value="06:00pm" <?php if($row['Schedule_Time_Option2'] == '06:00pm'){echo 'selected';}?>>06:00 PM</option>
  <option value="07:00pm" <?php if($row['Schedule_Time_Option2'] == '07:00pm'){echo 'selected';}?>>07:00 PM</option>
  <option value="08:00pm" <?php if($row['Schedule_Time_Option2'] == '08:00pm'){echo 'selected';}?>>08:00 PM</option>
  <option value="09:00pm" <?php if($row['Schedule_Time_Option2'] == '09:00pm'){echo 'selected';}?>>09:00 PM</option>
  <option value="10:00pm" <?php if($row['Schedule_Time_Option2'] == '10:00pm'){echo 'selected';}?>>10:00 PM</option>
  <option value="11:00pm" <?php if($row['Schedule_Time_Option2'] == '11:00pm'){echo 'selected';}?>>11:00 PM</option>
  <option value="12:00am" <?php if($row['Schedule_Time_Option2'] == '12:00am'){echo 'selected';}?>>12:00 AM</option>
               </select>

               
            </span>
          </span>

          </span>
        </fieldset>

    </span>    


        

       <p>&nbsp;</p>


        <h2 class="no-mobile">
          Pick up Day #3 (optional)
        </h2>

  <span class="col-sm-6">
        <fieldset>
          <span class="input">
            <label for="firstname">Day of Pickup</label>

     
               <input class="form-control" name="date_option_three" id="date_option_three" type="text" placeholder="Choose date of pick-up"
               value="<?php echo $row['Schedule_Date_Option3']; ?>"/>
              
          
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
  <option value="" <?php if($row['Schedule_Time_Option3'] == ''){echo 'selected';}?>>Time of pickup</option>
  <option value="06:00am" <?php if($row['Schedule_Time_Option3'] == '06:00am'){echo 'selected';}?>>06:00 AM</option>
  <option value="07:00am" <?php if($row['Schedule_Time_Option3'] == '07:00am'){echo 'selected';}?>>07:00 AM</option>
  <option value="08:00am" <?php if($row['Schedule_Time_Option3'] == '08:00am'){echo 'selected';}?>>08:00 AM</option>
  <option value="09:00am" <?php if($row['Schedule_Time_Option3'] == '09:00am'){echo 'selected';}?>>09:00 AM</option>
  <option value="10:00am" <?php if($row['Schedule_Time_Option3'] == '10:00am'){echo 'selected';}?>>10:00 AM</option>
  <option value="11:00am" <?php if($row['Schedule_Time_Option3'] == '11:00am'){echo 'selected';}?>>11:00 AM</option>
  <option value="12:00pm" <?php if($row['Schedule_Time_Option3'] == '12:00pm'){echo 'selected';}?>>12:00 PM</option>
  <option value="01:00pm" <?php if($row['Schedule_Time_Option3'] == '01:00pm'){echo 'selected';}?>>01:00 PM</option>
  <option value="02:00pm" <?php if($row['Schedule_Time_Option3'] == '02:00pm'){echo 'selected';}?>>02:00 PM</option>
  <option value="03:00pm" <?php if($row['Schedule_Time_Option3'] == '03:00pm'){echo 'selected';}?>>03:00 PM</option>
  <option value="04:00pm" <?php if($row['Schedule_Time_Option3'] == '04:00pm'){echo 'selected';}?>>04:00 PM</option>
  <option value="05:00pm" <?php if($row['Schedule_Time_Option3'] == '05:00pm'){echo 'selected';}?>>05:00 PM</option>
  <option value="06:00pm" <?php if($row['Schedule_Time_Option3'] == '06:00pm'){echo 'selected';}?>>06:00 PM</option>
  <option value="07:00pm" <?php if($row['Schedule_Time_Option3'] == '07:00pm'){echo 'selected';}?>>07:00 PM</option>
  <option value="08:00pm" <?php if($row['Schedule_Time_Option3'] == '08:00pm'){echo 'selected';}?>>08:00 PM</option>
  <option value="09:00pm" <?php if($row['Schedule_Time_Option3'] == '09:00pm'){echo 'selected';}?>>09:00 PM</option>
  <option value="10:00pm" <?php if($row['Schedule_Time_Option3'] == '10:00pm'){echo 'selected';}?>>10:00 PM</option>
  <option value="11:00pm" <?php if($row['Schedule_Time_Option3'] == '11:00pm'){echo 'selected';}?>>11:00 PM</option>
  <option value="12:00am" <?php if($row['Schedule_Time_Option3'] == '12:00am'){echo 'selected';}?>>12:00 AM</option>
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




<?php } ?>
      
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
  