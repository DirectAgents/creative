<?php //echo $_POST['signature']; 

session_start();
require_once '../../../../config.php';

require_once '../../../../class.startup.php';
require_once '../../../../class.participant.php';


$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../login');
}



if($_POST){

$date = new DateTime($_POST['startup_sig_date']);
$startup_sig_date =  $date->format('Y-m-d');

	

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_nda_draft WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID='".$_POST['projectid']."'");

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





 $update_sql = mysqli_query($connecDB,"UPDATE tbl_nda_draft SET 
  
  ProjectID = '".$_POST['projectid']."',
  nda_purpose = '".$_POST['nda_purpose']."',
  startup_signature = '".$signature."',
  startup_name = '".$_POST['disclosure_party']."',
  startup_sig_name = '".$_POST['startup_sig_name']."',
  startup_sig_title = '".$_POST['startup_sig_title']."',
  startup_sig_company = '".$_POST['startup_sig_company']."',
  startup_sig_date = '".$startup_sig_date."',
  startupID='".$_SESSION['startupSession']."'

 
  WHERE startupID='".$_SESSION['startupSession']."'");

}else{

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_nda_draft SET 
  
  ProjectID = '".$_POST['projectid']."',
  nda_purpose = '".$_POST['nda_purpose']."',
  startup_name = '".$_POST['disclosure_party']."',
  startup_sig_name = '".$_POST['startup_sig_name']."',
  startup_sig_title = '".$_POST['startup_sig_title']."',
  startup_sig_company = '".$_POST['startup_sig_company']."',
  startup_sig_date = '".$startup_sig_date."',
  startupID='".$_SESSION['startupSession']."'

 
  WHERE startupID='".$_SESSION['startupSession']."'");


}


}





}




?>


