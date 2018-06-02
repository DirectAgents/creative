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

if($_POST['linkedin'] != ''){
if(strpos($_POST['linkedin'], "http://") !== false || strpos($_POST['linkedin'], "https://" !== false) ){ $linkedin = $_POST['linkedin']; 
}else{$linkedin = "http://".$_POST['linkedin'];}
}else{
$linkedin = '';	
}	


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_team WHERE id='".$_POST['id']."'");
$row = mysqli_fetch_array($sql);


if ($sql->num_rows == 0) {



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_team(userID, startupID, Fullname, Title, About, ProfileImage, Skills, Facebook, Twitter, Linkedin) VALUES('".$_POST['userid']."', '".$_POST['userid']."' ,'".$_POST['fullname']."',
  '".$_POST['title']."', '".$_POST['about']."', '".$_POST['headshot']."' ,'".implode(', ',$_POST['skills'])."', '".$facebook."', '".$twitter."', '".$linkedin."')");


}else{



$sql = "UPDATE tbl_team SET 
Fullname='".$_POST['fullname']."',
Title='".$_POST['title']."',
About='".$_POST['about']."',
Skills='".implode(', ',$_POST['skills'])."',
Facebook='".$facebook."',
Twitter='".$twitter."',
Linkedin='".$linkedin."',
ProfileImage='".$_POST['headshot']."'


WHERE id='".$_POST['id']."'";

mysqli_query($connecDB, $sql);


}


}

?>