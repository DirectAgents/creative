<?php

session_start();
include("../../config.php"); //include config file

require_once '../../base_path.php';


if($_GET['projectid'] != ''){

$sqlproject = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$_GET['projectid']."' ");
$rowproject = mysqli_fetch_array($sqlproject);	

echo "<h3>Thank you!</h3>";

echo '<div class="space"></div>';

echo "You answered: <strong>Yes, I have that problem</strong>";

echo '<div class="space"></div>';

echo '<div class="col-lg-12">';

echo '<div class="col-lg-12">';
echo "<h4>Please provide your feedback for the following questions:</h4>";
echo '</div>';

echo '<div class="space"></div>';

echo '</div>';


echo '<div class="col-lg-11">';
echo '<div id="questions">';
echo '<table class="table table-striped">
    <tbody>
      <tr>
        <td style="text-align:left;"><strong>Question 1</strong></td>
        <td style="text-align:left;"></td>
    </tr>

   <tr>
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-8">'.$rowproject['PossibleAnswer1_Question1'].'</td>
        <td style="text-align:left;" class="col-lg-4">Feedback</td>
    </tr>
</table>';
echo '</div>'; 
echo '</div>';   



echo '<div class="col-lg-11">';
echo '<div id="questions">';
echo '<table class="table table-striped">
    <tbody>
      <tr>
        <td style="text-align:left;"><strong>Question 2</strong></td>
        <td style="text-align:left;"></td>
    </tr>

   <tr>
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-8">'.$rowproject['PossibleAnswer1_Question2'].'</td>
        <td style="text-align:left;" class="col-lg-4">Feedback</td>
    </tr>
</table>';
echo '</div>'; 
echo '</div>';        
    


echo '<div class="col-lg-11">';
echo '<div id="questions">';
echo '<table class="table table-striped">
    <tbody>
      <tr>
        <td style="text-align:left;"><strong>Question 3</strong></td>
        <td style="text-align:left;"></td>
    </tr>

   <tr>
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-8">'.$rowproject['PossibleAnswer1_Question3'].'</td>
        <td style="text-align:left;" class="col-lg-4">Feedback</td>
    </tr>
</table>';
echo '</div>'; 
echo '</div>';   



echo '<div class="col-lg-11">';
echo '<div id="questions">';
echo '<table class="table table-striped">
    <tbody>
      <tr>
        <td style="text-align:left;"><strong>Question 4</strong></td>
        <td style="text-align:left;"></td>
    </tr>

   <tr>
        <td style="text-align:left; border-right:1px solid #eee"" class="col-lg-8">'.$rowproject['PossibleAnswer1_Question3'].'</td>
        <td style="text-align:left;" class="col-lg-4">Feedback</td>
    </tr>
</table>';
echo '</div>'; 
echo '</div>';   




}



?>