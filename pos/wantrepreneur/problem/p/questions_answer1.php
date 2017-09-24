<?php

session_start();
include("../../config.php"); //include config file

require_once '../../base_path.php';


if($_GET['projectid'] != ''){

$sqlproject = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$_GET['projectid']."' ");
$rowproject = mysqli_fetch_array($sqlproject);	

?>

<!--<h3>Thank you!</h3>-->

<div class="space"></div>

<h3>You answered: <strong>Yes, I have that problem</strong></h3>

<div class="space"></div>

<div class="col-lg-12">

<div class="col-lg-12">
<h4>Please provide your feedback for the following questions:</h4>
</div>

<div class="space"></div>

</div>


<div class="col-lg-11">
<div id="questions">
<table class="table table-striped">
    <tbody>
      <tr>
        <td style="text-align:left;"><strong>Question 1</strong></td>
        <td style="text-align:left;"></td>
    </tr>

   <tr>
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-10"><?php echo $rowproject['PossibleAnswer1_Question1']; ?></td>
        <td style="text-align:left;" class="col-lg-2">
<a data-toggle="modal" data-id="PossibleAnswer1_Question1" title="Add this item" class="slide-video-feedback_open btn-primary" href="#">Record Feedback</a>
       </td>
    </tr>
</table>
</div>
</div>




    

<div class="col-lg-11">
<div id="questions">
<table class="table table-striped">
    <tbody>
      <tr>
        <td style="text-align:left;"><strong>Question 2</strong></td>
        <td style="text-align:left;"></td>
    </tr>

   <tr>
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-10"><?php echo $rowproject['PossibleAnswer1_Question2']; ?></td>
        <td style="text-align:left;" class="col-lg-2">
<a data-toggle="modal" data-id="PossibleAnswer1_Question2" title="Add this item" class="slide-video-feedback_open btn-primary" href="#">Record Feedback</a>
       </td>
    </tr>
</table>
</div>
</div>


<div class="col-lg-11">
<div id="questions">
<table class="table table-striped">
    <tbody>
      <tr>
        <td style="text-align:left;"><strong>Question 3</strong></td>
        <td style="text-align:left;"></td>
    </tr>

   <tr>
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-10"><?php echo $rowproject['PossibleAnswer1_Question3']; ?></td>
        <td style="text-align:left;" class="col-lg-2">
<a data-toggle="modal" data-id="PossibleAnswer1_Question1" title="Add this item" class="slide1_open btn-primary" href="#">Record Feedback</a>
       </td>
    </tr>
</table>
</div>
</div>


<div class="col-lg-11">
<div id="questions">
<table class="table table-striped">
    <tbody>
      <tr>
        <td style="text-align:left;"><strong>Question 4</strong></td>
        <td style="text-align:left;"></td>
    </tr>

   <tr>
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-10"><?php echo $rowproject['PossibleAnswer1_Question1']; ?></td>
        <td style="text-align:left;" class="col-lg-2">
<a data-toggle="modal" data-id="PossibleAnswer1_Question1" title="Add this item" class="slide1_open btn-primary" href="#">Record Feedback</a>
       </td>
    </tr>
</table>
</div>
</div>



<?php 


}



?>