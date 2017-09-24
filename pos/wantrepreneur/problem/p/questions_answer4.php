<?php

//session_start();
require_once(__DIR__."../../../config.php");
require_once(__DIR__."../../../base_path.php");






if($_GET['id'] != ''){

$sqlproject = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$_GET['id']."' ");
$rowproject = mysqli_fetch_array($sqlproject);	

?>

<!--<h3>Thank you!</h3>-->

<div class="space"></div>

<h3>You answered: <strong>Very rare</strong></h3>

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
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-9"><?php echo $rowproject['PossibleAnswer4_Question1']; ?></td>
        <td class="col-lg-3">
        <div class="btn-setup-a-meeting">
<a data-toggle="modal" data-id="PossibleAnswer4_Question1" title="Add this item" class="slide-video-feedback_open" href="#">Record Feedback</a>
</div>
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
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-9"><?php echo $rowproject['PossibleAnswer4_Question2']; ?></td>
        <td class="col-lg-3">
        <div class="btn-setup-a-meeting">
<a data-toggle="modal" data-id="PossibleAnswer4_Question2" title="Add this item" class="slide-video-feedback_open" href="#">Record Feedback</a>
</div>
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
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-9"><?php echo $rowproject['PossibleAnswer4_Question3']; ?></td>
        <td class="col-lg-3">
        <div class="btn-setup-a-meeting">
<a data-toggle="modal" data-id="PossibleAnswer4_Question3" title="Add this item" class="slide-video-feedback_open" href="#">Record Feedback</a>
</div>
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
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-9"><?php echo $rowproject['PossibleAnswer4_Question4']; ?></td>
        <td class="col-lg-3">
        <div class="btn-setup-a-meeting">
<a data-toggle="modal" data-id="PossibleAnswer4_Question4" title="Add this item" class="slide-video-feedback_open" href="#">Record Feedback</a>
</div>
       </td>
    </tr>
</table>
</div>
</div>



<?php 


}



?>