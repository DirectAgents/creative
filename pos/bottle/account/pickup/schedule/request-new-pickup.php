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
  $customer_home->redirect('../../../login');
}


$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $customer_home->runQuery("SELECT * FROM tbl_pickup_request WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row_pickup_request = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $customer_home->runQuery("SELECT * FROM tbl_pickup_upcoming WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row_pickup_confirmed = $stmt->fetch(PDO::FETCH_ASSOC);


?>




<script src="https://static.wepay.com/min/js/wepay.v2.js" type="text/javascript"></script>



<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {


  

    $( "#date_option_one" ).datepicker({
    
      minDate: 2,
      maxDate: '+2y',
      buttonText: "Select date",
      onSelect: function(date){

        var selectedDate = new Date(date);
        var msecsInADay = 86400000;
        var endDate = new Date(selectedDate.getTime() + msecsInADay);

       

    }
    });

    $( "#date_option_two" ).datepicker({
     
      minDate: 2,
      maxDate: '+2y',
      buttonText: "Select date",
      changeMonth: true,
      onSelect: function(date){

        var selectedDate = new Date(date);
        var msecsInADay = 86400000;
        var endDate = new Date(selectedDate.getTime() + msecsInADay);

        

       

    }
    });

    $( "#date_option_three" ).datepicker({
    
      minDate: 2,
      maxDate: '+2y',
      buttonText: "Select date",
      changeMonth: true
    });

  } );
  </script>



 <script>
  
  $(function() {
    $( "#date_option_one" ).datepicker({ minDate: 2});
    $( "#date_option_two" ).datepicker({ minDate: 2});
    $( "#date_option_three" ).datepicker({ minDate: 2});
  });

  </script>


<script>
$(document).ready(function(){



function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

var p = getParameterByName('p');



$(".cancel").click(function() { 


if(p == 'new'){

history.back();

//$(location).attr('href', 'http://stackoverflow.com')

}else{  

//$( "#white-container-account" ).load( "schedulepickup.php" );
window.location.reload();

}






 }); 





 $(".schedule-pickup").click(function() { 
       //alert("asdf");
        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields   
        var date_option1 = $("input[name='date_option_one']").val()
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






        if (date_option2.length < 1 ) {
        
            
            $("#date_option_two").css('border-color','red');  //change border color to red  
            proceed = false;
           
          
        }else{

          $("#date_option_two").css('border-color','green');  //change border color to red  

        }


        if (time_option2 == "" ) { 
            $("#time_option_two").css('border-color','red');  //change border color to red   
                proceed = false;
         }else{

          $("#time_option_two").css('border-color','green');  //change border color to red   

        }




         if (date_option3.length < 1 ) {
        
            
            $("#date_option_three").css('border-color','red');  //change border color to red  
            proceed = false;
           
          
        }else{

          $("#date_option_three").css('border-color','green');  //change border color to red  

        }


        if (time_option3 == "" ) { 
            $("#time_option_three").css('border-color','red');  //change border color to red   
                proceed = false;
         }else{

          $("#time_option_three").css('border-color','green');  //change border color to red   

        }
    

      //Optional//
       /*

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
        */



       
       
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
            $.post('new-pickup-request-save.php', post_data, function(response){ 
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






   <iframe name="votar" style="display:none;"></iframe>



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
          Pick up Day #2 (optional)
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
          Pick up Day #3 (optional)
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

  


     
              <input type="submit" class="schedule-pickup" value="Schedule New Pickup"/>

           

             <div id="cancel">

              <input type="submit" class="cancel" value="Cancel"/>

            </div>


   <div style="float:left; width:100%; margin-top:30px;">
 <div id="profile_results"></div>
</div>

      </form>