<?php

session_start();
require_once '../../base_path.php';


require_once '../../class.customer.php';
require_once '../../config.php';
require_once '../../config.inc.php';


require '../../wepay.php';




$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../../login');
}

$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




  

?> 

</head>
    
    <body>

<div id="tabs">

 <ul>
    <li><a href="#schedulepickup" class="schedulepickup">Schedule Pickup</a></li>
    <li>&nbsp;</li>
    <?php if($row['Payment_Method'] == 'Bank'){ ?>
    <!--<li><a href="#refund-requests" class="refund-requests">Refund Requests</a>-->
    <?php } ?>

 <?php

$result_count = mysqli_query($connecDB,"SELECT refundrequest,participant_id,id, COUNT(DISTINCT id) AS count FROM wepay WHERE refundrequest = 'yes' AND participant_id = '".$_SESSION['customerSession']."' GROUP BY id");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo ' <div class="viewed-bubble">';
echo $count;
echo '</div>';
}
?>



    </li>
    <li>&nbsp;</li>
    <?php if($row['Payment_Method'] == 'Bank'){ ?>
    <li><a href="#cancelpickup" class="cancelpickup">Cancel Pickup</a></li>
    <?php } ?>
   
  </ul>  





<div id="white-container">

<div id="schedulepickup" class="tabContent" >





<div class="wepay_btn_box">  
  <div class="wepay_btn">



<p>&nbsp;</p>  


<div class="row-day">
<div class="the-day">
<h4>Meeting Date Option #1:</h4> 

<div class="select-row">
<div style="float:left; margin-left:3px;">
<input type="text" name="date_option_one" id="date_option_one" placeholder="Pick a date" class="validate">
</div>
<div style="float:left; margin-left:15px;">
<select name="time_suggested_one" id="time_suggested_one">
  <option value="" selected disabled="disabled">Select a time</option>
  <option value="06:00 am">06:00 AM</option>
  <option value="07:00 am">07:00 AM</option>
  <option value="08:00 am">08:00 AM</option>
  <option value="09:00 am">09:00 AM</option>
  <option value="10:00 am">10:00 AM</option>
  <option value="11:00 am">11:00 AM</option>
  <option value="12:00 pm">12:00 PM</option>
  <option value="01:00 pm">01:00 PM</option>
  <option value="02:00 pm">02:00 PM</option>
  <option value="03:00 pm">03:00 PM</option>
  <option value="04:00 pm">04:00 PM</option>
  <option value="05:00 pm">05:00 PM</option>
  <option value="06:00 pm">06:00 PM</option>
  <option value="07:00 pm">07:00 PM</option>
  <option value="08:00 pm">08:00 PM</option>
  <option value="09:00 pm">09:00 PM</option>
  <option value="10:00 pm">10:00 PM</option>
  <option value="11:00 pm">11:00 PM</option>
  <option value="12:00 am">12:00 AM</option>
               </select>

    </div>
</div>

</div>

</div>

</div> 


</div>

</div>

<input type="submit" class="btn-request" value="Request to Meet"/>

 </div>