<?php

session_start();

require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.customer.php';


$sql=mysqli_query($connecDB,"SELECT * FROM tbl_completed_tasks WHERE taskID = '".$_GET['taskid']."'");
$row = mysqli_fetch_array($sql);


?>






<!-- Start Accept -->

<div id="slide" class="well slide">
  <div class="result-accept">
    <div id="result-accept">Payment was sent successfully!</div>
  </div>


<div class="result-no-date">
<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">
    <div id="result-accept-<?php echo $row2['id']; ?>">Make a payment!</div>
    </div>
  </div>



<h4>Pay the Customer</h4>
<p>&nbsp;</p>


<input type="hidden" name="the_date" id="the_date" value=""/>


<input type="text" name="id" id="projectid" value="<?php echo $row2['id']; ?>"/>
<input type="text" name="userid" id="userid" value="<?php echo $row2['userID']; ?>"/>
<input type="text" name="taskid" id="taskid" value="<?php echo $row2['taskID']; ?>"/>
<input type="text" name="adminid" id="adminid" value="<?php echo $_SESSION['adminSession']; ?>"/>





<h3>Enter amount</h3>
<input type="text" name="amount" id="amount"/>







<div class="popupoverlay-btn">
  <div class="cancel-accept">
    <button class="slide_close cancel">Cancel</button>
    <button class="accept btn-delete">Yes</button>
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

<h2>We have collected $<?php echo $row['Amount']; ?> from your recycles</h2>

<h3>Please choose a homeless person you want to donate to <a href="<?php echo BASE_PATH; ?>/homeless" target="_blank">Click Here</a></h3>

Enter amount you want to donate to the homeless person you have selected

<input type="text" id="amount" name="amount" placeholder="e.g 3"/>


<h3>Payout explained:</h3>

You will receive: 

You donate: 

Total payout to you: 




<a href="#" class="create-one-btn slide_open">Submit Payment Request</a>


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


