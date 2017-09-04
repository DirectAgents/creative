<?php

session_start();

require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.customer.php';


$sql=mysqli_query($connecDB,"SELECT * FROM tbl_completed_tasks WHERE taskID = '".$_GET['taskid']."'");
$row = mysqli_fetch_array($sql);


$sqladmin=mysqli_query($connecDB,"SELECT * FROM tbl_admin");
$rowadmin = mysqli_fetch_array($sqladmin);


if(isset($_GET['h'])){

$sqlhomeless=mysqli_query($connecDB,"SELECT * FROM homeless WHERE homelessID = '".$_GET['h']."'");
$rowhomeless = mysqli_fetch_array($sqlhomeless);

}


?>


<script>

$(document).ready(function(){



        //alert(homeless_donation);

        /*if (amount < 1 ) {

         $("#amount"+<?php echo $row2['userID']; ?>).css('border-color','red');  //change border color to red  
            proceed = false;

        }*/

$(".accept").click(function() { 

      var proceed = true;


        var id = $('input[name=id]').val();
        var userid = $('input[name=userid]').val();
        var adminid = $('input[name=adminid]').val();
        var taskid = $('input[name=taskid').val();
        var amount = $('input[name=amount').val();
        var homeless_donation = $('input[name=homeless_donation').val();
        var homeless_id = $('input[name=homeless_id').val();

        //alert(homeless_donation);

        //everything looks good! proceed...
        if(proceed) 
        {

      $(".result-no-date").hide(); 
      $(".result-accept").show().slideDown();
      $(".cancel-accept").hide();
      $(".close-accept").show();



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'userid':userid,'adminid':adminid,'taskid':taskid,'amount':amount,'homeless_donation':homeless_donation, 'homeless_id':homeless_id};
            
            //Ajax post data to server
            $.post('make-payment.php', post_data, function(response){  
              //alert("yes"); 

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            
            output = '<div class="success">Yo</div>';


          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $(".cancel-accept").hide();
        $(".result-accept").show();
        $(".close-accept").show();
        $("#result-accept-"+response.text).hide().slideDown();
            }, 'json');
      
        }



 });
 
 });     

</script>




<!-- Start Accept -->


<script>

$(document).ready(function(){

 $(".preview-payment").click(function() {  


 


        var id = $('input[name=id]').val();
        var userid = $('input[name=userid]').val();
        var adminid = $('input[name=adminid]').val();
        var taskid = $('input[name=taskid').val();
        var amount = $('input[name=amount').val();
        var homeless_donation = '$'+$('input[name=homeless_donation').val();
        var homeless_donation_amount = $('input[name=homeless_donation').val();
        var homeless_id = $('input[name=homeless_id').val();

     //alert(homeless_id);

     if(homeless_id == 'undefined'){

     alert("Please choose a homeless to make a donation to!");

     return false


     }   


     if(homeless_donation_amount == ''){

     alert("Please enter a donation amount!");

     return false


     }

        //alert(homeless_id);


        

        //alert(homeless_donation_amount);
        //alert(amount);

        $("#amount-credited").text(amount);
        $("#homeless_donation_amount").text(homeless_donation);
        

        var payout_to_customer = amount - homeless_donation_amount;

        var payout_to_customer_final = "$"+payout_to_customer;

        $("#payout-to-customer").text(payout_to_customer_final);

        if (homeless_donation_amount-amount > 0 ){
          /*$("#error-calculation").html('<div class="result-no-date"><div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please lower your donation amount!</div></div>');*/
        alert("Please lower your donation amount!");  
        return false
        }


        var form_data = new FormData();
        form_data.append('homeless_id', homeless_id);

        $.ajax({
                url: 'get-homeless-info.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    //alert(php_script_response);
                    $("#homeless_donation_id").text(php_script_response);
                }
        });

    

 });
 
 });


</script>





<div id="slide" class="well slide">
  <div class="result-accept">
    <div id="result-accept">Thank You!<br>Donation and a Payout to your account was made successfully!</div>
  </div>




<h4>Retrieve Payment & Donation</h4>



<input type="hidden" name="the_date" id="the_date" value=""/>


<input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['customerSession']; ?>">
<input type="hidden" name="taskid" id="taskid" value="<?php echo $_GET['taskid']; ?>">
<input type="hidden" name="adminid" id="adminid" value="<?php echo $rowadmin['userID']; ?>">
<input type="hidden" name="amount" id="amount" value="<?php echo $row['Amount']; ?>">


<div id="error-calculation"></div>


<h3>Payout explained</h3>

<div style="float:left; width:100%">
<p><h4><div style="float:left">Amount credited: $</div><div id="amount-credited" style="float:left; font-weight:bold"></div></h4></p>
</div>


<div style="float:left; width:100%">
<p><h4><div style="float:left; margin-right:5px;">You donate</div><div id="homeless_donation_amount" style="float:left; margin-right:5px; font-weight:bold"></div>
<div style="float:left; margin-right:5px;">to</div><div id="homeless_donation_id" style="float:left; font-weight:bold"></div></h4>




</p>
</div>

<div style="float:left; width:100%">
<p><h4><div style="float:left; margin-right:5px;">Total payout to you:</div> <div id="payout-to-customer" style="float:left;font-weight:bold"></div></h4></p>
</div>



<div class="popupoverlay-btn">
  <div class="cancel-accept">
    <button class="slide_close cancel">Cancel</button>
    <button class="accept btn-delete">Submit</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-accept">
    <button class="slide_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Accept -->





<div id="the-container">

<h2>We have collected <strong>$<?php echo $row['Amount']; ?></strong> from your recycles</h2>
<p>&nbsp;</p>
<?php if(!isset($_GET['h'])){ ?>

<h4>Step 1: Please choose a homeless person you want to donate to <strong><a href="<?php echo BASE_PATH; ?>/homeless/?d=<?php echo $_GET['taskid']; ?>">Click Here</a></strong></h4>

<?php }else{ ?>

<p>You have selected the following individual for donation:</p>

<?php if($rowhomeless['profile_image'] != '') { ?>
<p><img src="<?php echo BASE_PATH; ?>/images/profile/homeless/<?php echo $rowhomeless['profile_image']; ?>" class="profile-photo"/></p>
<?php }else{ ?>
<p><img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" class="profile-photo"/></p>
<?php } ?>

<p><?php echo $rowhomeless['Firstname']; ?> <?php echo $rowhomeless['Lastname']; ?></p>
<p>Needs: <?php echo $rowhomeless['Needs']; ?></p>

<?php } ?>



<p>&nbsp;</p>


<p><h4>Step 2: Enter amount you want to donate (min. 1 cent)</h4></p>
<br>
<p>$<input type="text" id="homeless_donation" name="homeless_donation" placeholder="e.g 3.00" style="width:100px"/></p>

<?php if(isset($_GET['h'])){ ?>
<input type="hidden" id="homeless_id" name="homeless_id" value="<?php echo $_GET['h']; ?>"/>
<?php } ?>

<p>&nbsp;</p>
<p><a href="#" class="create-one-btn slide_open preview-payment">Preview Payment</a></p>


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


