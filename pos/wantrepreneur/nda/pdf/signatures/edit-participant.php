<?php //echo $_POST['signature']; 

session_start();
require_once '../../../config.php';


require_once '../../../base_path.php';

require_once '../../../class.startup.php';
require_once '../../../class.participant.php';



$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../../participant/login');
}




if($_POST){

$date = new DateTime($_POST['participant_sig_date']);
$participant_sig_date =  $date->format('Y-m-d');

	

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_nda_signed WHERE userID='".$_SESSION['participantSession']."' AND ProjectID='".$_POST['projectid']."'");

if(mysqli_num_rows($sql) == 1) {



if($_POST['signature'] != ''){

$data = $_POST['signature'];

$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));

$random = rand(5, 10000000);

file_put_contents($random.'.png', $data);

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





 $update_sql = mysqli_query($connecDB,"UPDATE tbl_nda_signed SET 
  
  ProjectID = '".$_POST['projectid']."',
  participant_signature = '".$signature."',
  participant_name = '".$_POST['recipient_party']."',
  participant_sig_name = '".$_POST['participant_sig_name']."',
  participant_sig_title = '".$_POST['participant_sig_title']."',
  participant_sig_company = '".$_POST['participant_sig_company']."',
  participant_sig_date = '".$participant_sig_date."',
  userID='".$_SESSION['participantSession']."'

 
  WHERE userID='".$_SESSION['participantSession']."' AND ProjectID='".$_POST['projectid']."'");

}else{

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_nda_signed SET 
  
  ProjectID = '".$_POST['projectid']."',
  participant_name = '".$_POST['recipient_party']."',
  participant_sig_name = '".$_POST['participant_sig_name']."',
  participant_sig_title = '".$_POST['participant_sig_title']."',
  participant_sig_company = '".$_POST['participant_sig_company']."',
  participant_sig_date = '".$participant_sig_date."',
  userID='".$_SESSION['participantSession']."'

 
  WHERE userID='".$_SESSION['participantSession']."' AND ProjectID='".$_POST['projectid']."'");


}


}





}




?>


