<?php //echo $_POST['signature']; 

session_start();
require_once '../../../../config.php';


if($_POST){

$date = new DateTime($_POST['researcher_sig_date']);
$researcher_sig_date =  $date->format('Y-m-d');

	




  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_nda WHERE researcherID='".$_SESSION['researcherSession']."' AND ProjectID='".$_POST['projectid']."'");

if(mysqli_num_rows($sql) == 0) {






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







   $sql=mysqli_query($connecDB,"INSERT INTO tbl_nda (`status`,`researcherID`, `ProjectID`, `researcher_name` , `nda_purpose`,`researcher_signature` ,`researcher_sig_name`, `researcher_sig_title`, `researcher_sig_company`, `researcher_sig_date` ) VALUES ('draft','".$_SESSION['researcherSession']."', '".$_POST['projectid']."','".$_POST['disclosure_party']."', '".$_POST['nda_purpose']."',
      '".$signature."','".$_POST['researcher_sig_name']."', '".$_POST['researcher_sig_title']."', '".$_POST['researcher_sig_company']."', '".$researcher_sig_date."')");

}






}




?>


