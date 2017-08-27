<?php

session_start();

require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.customer.php';


$sql=mysqli_query($connecDB,"SELECT * FROM tbl_completed_tasks WHERE taskID = '".$_GET['taskid']."'");
$row = mysqli_fetch_array($sql);


?>


<div id="the-container">

<h2>You have earned $<?php echo $row['Amount']; ?></h2>

<h3>Please choose a homeless person you want to donate to <a href="<?php echo BASE_PATH; ?>/homeless" target="_blank">Click Here</a></h3>

Enter amount you want to donate to the homeless person you have selected

<input type="text" id="amount" name="amount" placeholder="e.g 3"/>

</div>