<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){



if($_POST['facebook'] != ''){
if(strpos($_POST['facebook'], "http://") !== false || strpos($_POST['facebook'], "https://" !== false) ){ $facebook = $_POST['facebook']; 
}else{$facebook = "http://".$_POST['facebook'];}
}else{
$facebook = '';	
}

if($_POST['twitter'] != ''){
if(strpos($_POST['twitter'], "http://") !== false || strpos($_POST['twitter'], "https://" !== false) ){ $twitter = $_POST['twitter']; 
}else{$twitter = "http://".$_POST['twitter'];}
}else{
$twitter = '';	
}

if($_POST['angellist'] != ''){
if(strpos($_POST['angellist'], "http://") !== false || strpos($_POST['angellist'], "https://" !== false) ){ $linkedin = $_POST['angellist']; 
}else{$angellist = "http://".$_POST['angellist'];}
}else{
$angellist = '';	
}	


$sql = mysqli_query($connecDB,"SELECT * FROM startups WHERE id='".$_POST['id']."'");
$row = mysqli_fetch_array($sql);


$arr = explode(",", $_POST['location'], 2);
$city = $arr[0];
$state = $arr[1];
$state_final = str_replace(' ', '', $state);	

$sql_zip = "SELECT * FROM zip_state WHERE city='".$city."' AND state = '".$state_final."'";  
$result = mysqli_query($connecDB, $sql_zip);  
$row_zip = mysqli_fetch_array($result);


if(mysqli_num_rows($sql)<=0) {



$insert_sql = mysqli_query($connecDB,"INSERT INTO startups(userID, Name, Industry, City, State, Zip, About, Logo, Facebook, Twitter, AngelList) VALUES('".$_POST['userid']."','".$_POST['name']."',
  '".$_POST['industry']."', '".$city."' , '".$state_final."', '".$row_zip['zip']."', '".$_POST['about']."', '".$_POST['logo']."' , '".$facebook."', '".$twitter."', '".$angellist."')");


}else{



$sql = "UPDATE startups SET 
Name='".$_POST['name']."',
Industry='".$_POST['industry']."',
About='".$_POST['about']."',
City='".$city."',
State='".$state_final."',
Zip='".$row_zip['zip']."',
Facebook='".$facebook."',
Twitter='".$twitter."',
AngelList='".$angellist."',
Logo='".$_POST['logo']."'


WHERE id='".$_POST['id']."'";

mysqli_query($connecDB, $sql);


}


}

?>