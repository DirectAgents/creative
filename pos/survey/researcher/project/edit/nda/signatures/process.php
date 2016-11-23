<?php //echo $_POST['signature']; 

session_start();
require_once '../../../../../config.php';


if($_POST){

$date = new DateTime($_POST['researcher_sig_date']);
$researcher_sig_date =  $date->format('Y-m-d');

	

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_nda WHERE researcherID='".$_SESSION['researcherSession']."' AND ProjectID='".$_POST['projectid']."'");

if(mysqli_num_rows($sql)>0)
{


if($_POST['signature'] != ''){

$data = $_POST['signature'];

$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));

$random = rand(5, 10000000);

file_put_contents($random.'.png', $data);

$signature = $random.'.png';


 $update_sql = mysqli_query($connecDB,"UPDATE tbl_nda SET 
  
  ProjectID = '".$_POST['projectid']."',
  researcher_signature = '".$signature."',
  researcher_sig_name = '".$_POST['researcher_sig_name']."',
  researcher_sig_title = '".$_POST['researcher_sig_title']."',
  researcher_sig_company = '".$_POST['researcher_sig_company']."',
  researcher_sig_date = '".$researcher_sig_date."',
  researcherID='".$_SESSION['researcherSession']."'

 
  WHERE researcherID='".$_SESSION['researcherSession']."'");

}else{

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_nda SET 
  
  ProjectID = '".$_POST['projectid']."',
  researcher_sig_name = '".$_POST['researcher_sig_name']."',
  researcher_sig_title = '".$_POST['researcher_sig_title']."',
  researcher_sig_company = '".$_POST['researcher_sig_company']."',
  researcher_sig_date = '".$researcher_sig_date."',
  researcherID='".$_SESSION['researcherSession']."'

 
  WHERE researcherID='".$_SESSION['researcherSession']."'");


}

}





  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_nda WHERE researcherID='".$_SESSION['researcherSession']."' AND ProjectID='".$_POST['projectid']."'");

if(mysqli_num_rows($sql)<0)
{




if($_POST['signature'] != ''){

$data = $_POST['signature'];

$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));

$random = rand(5, 10000000);

file_put_contents($random.'.png', $data);

$signature = $random.'.png';







   $sql=mysqli_query($connecDB,"INSERT INTO tbl_nda (`researcherID`, `ProjectID`,`researcher_signature` ,`researcher_sig_name`, `researcher_sig_title`, `researcher_sig_company`, `researcher_sig_date` ) VALUES ('".$_SESSION['researcherSession']."', '".$_POST['projectid']."',
      '".$signature."','".$_POST['researcher_sig_name']."', '".$_POST['researcher_sig_title']."', '".$_POST['researcher_sig_company']."', '".$researcher_sig_date."')");

}else{

   $sql=mysqli_query($connecDB,"INSERT INTO tbl_nda (`researcherID`, `ProjectID`, `researcher_sig_name`, `researcher_sig_title`, `researcher_sig_company`, `researcher_sig_date` ) VALUES ('".$_SESSION['researcherSession']."', '".$_POST['projectid']."',
      '".$_POST['researcher_sig_name']."', '".$_POST['researcher_sig_title']."', '".$_POST['researcher_sig_company']."', '".$researcher_sig_date."')");


}




} 



}




?>


