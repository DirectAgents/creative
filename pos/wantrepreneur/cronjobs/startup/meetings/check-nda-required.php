<?php


include("../../../config.php"); //include config file


require_once '../../../base_path.php';




$sql=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_upcoming ORDER BY id DESC ");

//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql)>0)
{
  //echo "asdf";


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 


$sqlproject= mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE NDA = 'Yes' AND ProjectID = '".$row2['ProjectID']."' ");
$rowproject = mysqli_fetch_array($sqlproject);

if(mysqli_num_rows($sqlproject) == 1) {



$sqlndapending= mysqli_query($connecDB,"SELECT * FROM tbl_nda_pending,tbl_nda_signed WHERE tbl_nda_pending.userID = '".$row2['userID']."' AND tbl_nda_pending.ProjectID = '".$row2['ProjectID']."' OR tbl_nda_signed.userID = '".$row2['userID']."' AND tbl_nda_signed.ProjectID = '".$row2['ProjectID']."'  ");

$rowndapending = mysqli_fetch_array($sqlndapending);

if(mysqli_num_rows($sqlndapending) == 0) {


$sqlndadraft= mysqli_query($connecDB,"SELECT * FROM tbl_nda_draft WHERE ProjectID = '".$row2['ProjectID']."' ");
$rowndadraft = mysqli_fetch_array($sqlndadraft);


    $sql=mysqli_query($connecDB,"INSERT INTO tbl_nda_pending (status, userID, startupID, ProjectID, State, startup_name , nda_purpose,startup_signature ,startup_sig_name, startup_sig_title, startup_sig_company, startup_sig_date ) VALUES ('pending', '".$row2['userID']."' ,'".$row2['startupID']."', '".$row2['ProjectID']."', '".$rowndadraft['State']."'  ,'".$rowndadraft['startup_name']."', '".$rowndadraft['nda_purpose']."','".$rowndadraft['startup_signature']."','".$rowndadraft['startup_sig_name']."', '".$rowndadraft['startup_sig_title']."', '".$rowndadraft['startup_sig_company']."', '".$rowndadraft['startup_sig_date']."')");


    }



}

} 

}



?>
