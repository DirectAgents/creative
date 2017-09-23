<?php

session_start();
include("../../config.php"); //include config file

require_once '../../base_path.php';



if($_POST){



/*
$sql = mysqli_query($connecDB, "SELECT * FROM tbl_meeting_request WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_POST['projectid']."'");
*/


$sql = mysqli_query($connecDB,"SELECT * 
from (
    select userID, ProjectID from tbl_feedback_request
    union all
    select userID, ProjectID from tbl_feedback_upcoming
    union all
    select userID, ProjectID from tbl_feedback_recent
    union all
    select userID, ProjectID from tbl_feedback_archived_startup
    union all
    select userID, ProjectID from tbl_feedback_archived_participant
   
) tbl_participant
where userID = '".$_SESSION['participantSession']."' AND ProjectID = '".$_POST['projectid']."'");








if(mysqli_num_rows($sql)== 0)
{


if($_POST['possibleanswerschosen'] == ''){$possibleanswerschosen = 'NULL';}else{$possibleanswerschosen = $_POST['possibleanswerschosen'];}



date_default_timezone_set('America/New_York');
$the_date = date('Y-m-d'); 
$the_time = date('h:i:s A');





$sqlproject = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$_POST['projectid']."' ");
$rowproject = mysqli_fetch_array($sqlproject);


$sqlscreeningquestion = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion  WHERE ProjectID = '".$_POST['projectid']."' ");
$rowscreeningquestion = mysqli_fetch_array($sqlscreeningquestion);




if($rowscreeningquestion['EnabledorDisabled'] == 'Enabled'){

if($rowscreeningquestion['Accepted'] == $_POST['potentialanswergiven']){

    $screening_passed = 'Passed';

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_participant_potentialanswer(userID, ProjectID, PotentialAnswerGiven) 
VALUES('".$_SESSION['participantSession']."', '".$_POST['projectid']."','".$_POST['potentialanswergiven']."')");


}else{

    $screening_passed = 'Not Passed';

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_feedbacks(userID, startupID, ProjectID, Answer, Date,Time) 
VALUES('".$_SESSION['participantSession']."', '".$rowproject['startupID']."','".$rowproject['ProjectID']."','".$possibleanswerschosen."','".$the_date."','".$the_time."')");

}

}    




if($rowscreeningquestion['EnabledorDisabled'] == 'Disabled'){


$screening_passed = 'Not required';

$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_feedbacks(userID, startupID, ProjectID, Answer, ScreeningQuestion, Date,Time) 
VALUES('".$_SESSION['participantSession']."', '".$rowproject['startupID']."','".$rowproject['ProjectID']."','".$possibleanswerschosen."', '".$screening_passed."','".$the_date."','".$the_time."')");

}




//Check if NDA is required


/*
if($rowproject['NDA'] == 'Yes')
{

$sqlnda = mysqli_query($connecDB,"SELECT * FROM tbl_nda_draft  WHERE ProjectID = '".$_POST['projectid']."'");
$rownda = mysqli_fetch_array($sqlnda);

 $sql=mysqli_query($connecDB,"INSERT INTO tbl_nda_pending (`status`, `userID`,`startupID`, `ProjectID`, `startup_name` , `nda_purpose`,`startup_signature` ,`startup_sig_name`, `startup_sig_title`, `startup_sig_company`, `startup_sig_date` ) VALUES ('pending', '".$_SESSION['participantSession']."' ,'".$rownda['startupID']."', '".$_POST['projectid']."','".$rownda['startup_name']."', '".$rownda['nda_purpose']."','".$rownda['startup_signature']."','".$rownda['startup_sig_name']."', '".$rownda['startup_sig_title']."', '".$rownda['startup_sig_company']."', '".$rownda['startup_sig_date']."')");

}
*/


}


//PASSED
$output = json_encode(array('type'=>'message', 'text' => '<div class="success2">Request to meet sent!</div>'));
die($output);






}

    




    
?>