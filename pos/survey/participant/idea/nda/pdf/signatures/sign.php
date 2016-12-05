<?php //echo $_POST['signature']; 

session_start();
require_once '../../../../config.php';


if($_POST){

$date = new DateTime($_POST['participant_sig_date']);
$participant_sig_date =  $date->format('Y-m-d');

$date = new DateTime($_POST['participant_sig_date']);
$participant_sig_date =  $date->format('Y-m-d');

	

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_nda_pending WHERE userID='".$_SESSION['participantSession']."' AND ProjectID='".$_POST['projectid']."'");

if(mysqli_num_rows($sql) == 1) {





$data = $_POST['signature'];

$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));

$random = rand(5, 10000000);

file_put_contents(.$random.'.png', '../../../../nda/signatures/'.$data);

$signature = $random.'.png';





// Get the original image.
$src = imagecreatefrompng($signature);

// Get the width and height.
$width = imagesx($src);
$height = imagesy($src);

// Create a white background, the same size as the original.
$bg = imagecreatetruecolor($width, $height);
$white = imagecolorallocate($bg, 255, 255, 255);
imagefill($bg, 0, 0, $white);

// Merge the two images.
imagecopyresampled(
    $bg, $src,
    0, 0, 0, 0,
    $width, $height,
    $width, $height);

// Save the finished image.
imagepng($bg, $signature, 0);







   $sql=mysqli_query($connecDB,"INSERT INTO tbl_nda_signed (`status`,`startupID`, `ProjectID`, `startup_name` , `nda_purpose`,`startup_signature` ,`startup_sig_name`, `startup_sig_title`, `startup_sig_company`, `startup_sig_date`, `userID`,`participant_name`, `participant_signature`, `participant_sig_name`, `participant_sig_title`, `participant_sig_company`, `participant_sig_date` ) VALUES ('signed','".$_POST['startupID']."', '".$_POST['projectid']."','".$_POST['disclosure_party']."', '".$_POST['nda_purpose']."' ,'".$_POST['startup_signature']."','".$_POST['startup_sig_name']."', '".$_POST['startup_sig_title']."', '".$_POST['startup_sig_company']."', '".$_POST['startup_sig_date']."', '".$_SESSION['participantSession']."', '".$_POST['recipient_party']."', '".$signature."', '".$_POST['participant_sig_name']."', '".$_POST['participant_sig_title']."', '".$_POST['participant_sig_company']."', '".$participant_sig_date."' )");


$sql=mysqli_query($connecDB,"DELETE FROM tbl_nda_pending WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_POST['projectid']."'");




}





}




?>


