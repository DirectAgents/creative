<?php

session_start();
include ('../../../config2.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

date_default_timezone_set('America/New_York');
$date = date('Y-m-d'); 


if($_POST)
{


//$all_game_value = implode(",",$_POST['testing']);



if($_POST['bio'] == ''){$bio = '';}else{$bio = $_POST['bio'];}
if($_POST['street'] == ''){$street = '';}else{$street = $_POST['street'];}
if($_POST['city'] == ''){$city = '';}else{$city = $_POST['city'];}
if($_POST['state'] == ''){$state = '';}else{$state = $_POST['state'];}
if($_POST['zip'] == ''){$zip = '';}else{$zip = $_POST['zip'];}
if($_POST['country'] == ''){$country = '';}else{$country = $_POST['country'];}




$update_sql = "UPDATE tbl_participant SET 
  Bio='".$bio."',
  Street='".$street."',
  City='".$city."',
  State='".$state."',
  Zip='".$zip."',
  Country='".$country."'

  WHERE userID='".$_SESSION['participantSession']."'";

  

mysql_query($update_sql);





if($_POST['imagestatus'] = '1' && $_POST['imagestatus'] != '0' && $_POST['imagestatus'] != ''){


$photo = $_SESSION['participantSession'].'_'.$_POST['fileToUpload'];

$_SESSION['profileimage'] = $photo;


$sql2 = "SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'";
$result=mysql_query($sql2);
$row=mysql_fetch_array($result);

if(mysql_num_rows($result)>0)
{


$update_sql = "UPDATE tbl_participant SET profile_image='".$photo."'
  WHERE userID='".$_SESSION['participantSession']."'";
  mysql_query($update_sql);


	
}else{

$sqlinsert="INSERT INTO tbl_participant (userID, profile_image) VALUES ('".$_SESSION['participantSession']."','".$photo."')";
		mysql_query($sqlinsert);




}



} 





	
	    $output = json_encode(array('type'=>'message', 'text' => '<div class="success2">Successfully Saved!</div>'));
		die($output);
	
    //header("Location: index.php?s=success"); 




	
	
	
	
	
}
?>