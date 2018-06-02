<?php  
 session_start();	
 include_once("../config.php");  

 require '../cloudinary/lib/rb.php';
 require '../cloudinary/src/Cloudinary.php';
 require '../cloudinary/src/Uploader.php';
 require '../cloudinary/src/Api.php'; // Only required for creating upload presets on the fly


 //require_once('algoliasearch-client-php-master/algoliasearch.php');


 
 $content = $_POST["content"]; 
 $column_name = $_POST["column_name"]; 



 $sql = "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_user = mysqli_fetch_array($result);
 
	


 if($column_name == 'About') {

 $sql = "UPDATE tbl_users SET About='".$content."' WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 if(mysqli_query($connecDB, $sql))  
 {  
      
 echo $row[$column_name];

 }  

 }


if($column_name == 'Email') {

 $sql = "UPDATE tbl_users SET Email='".$content."' WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 if(mysqli_query($connecDB, $sql))  
 {  


 }  

 }


 if($column_name == 'Phone') {

 $sql = "UPDATE startups SET Phone='".$content."' WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 if(mysqli_query($connecDB, $sql))  
 {  

 $sql=mysqli_query($connecDB,"SELECT * FROM tbl_entrepreneur WHERE userID='".$_SESSION['entrepreneurSession']."'");  
 $row=mysqli_fetch_array($sql);  	
 
 echo '<div id="phone">'; 
 echo $row['Phone'];
 echo '</div>';

 }  

 }


if($column_name == 'Zip') {

 $sql=mysqli_query($connecDB,"SELECT * FROM zip_state WHERE zip='".$content."'");
 $row=mysqli_fetch_array($sql); 	

 //$sql = "UPDATE profile SET City='".$row['city']."', State='".$row['state']."', ZipCode='".$row['zip']."' WHERE id='15'";  
 
 //if(mysqli_query($connecDB, $sql))  
 //{  
if ($sql->num_rows == 0){
 
 $sql = "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 $result_user = mysqli_query($connecDB, $sql);  
 $row_user = mysqli_fetch_array($result_user);

 if ($row_user['ZipCode'] != ''){
 echo '<div id="zip">'.$row_user['City'].', '.$row_user['State'].'</div>';
 }else{
 echo '<div id="zip">Type your zip code</div>';
 }

 }else{
      
  echo '<div id="zip">'.$row['city'].', '.$row['state'].'</div>';
 
 }  

 }




 if($column_name == 'Zip Company') {

 $sql=mysqli_query($connecDB,"SELECT * FROM zip_state WHERE zip='".$content."'");
 $row=mysqli_fetch_array($sql); 	

 //$sql = "UPDATE profile SET City='".$row['city']."', State='".$row['state']."', ZipCode='".$row['zip']."' WHERE id='15'";  
 
 //if(mysqli_query($connecDB, $sql))  
 //{  
if ($sql->num_rows == 0){
 
 $sql = "SELECT * FROM startups WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_company = mysqli_fetch_array($result);

 if($row_company != ''){
 echo '<div id="zip">'.$row_company['City'].', '.$row_company['State'].'</div>';
 }else{
 echo '<div id="zip">Type your zip code</div>';
 }

 }else{
      
  echo '<div id="zip">'.$row['city'].', '.$row['state'].'</div>';
 
 }  

 }



if($column_name == 'Skills') {

 $sql = "UPDATE tbl_users SET Skills='".implode(', ',$content)."' WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 mysqli_query($connecDB, $sql); 

 }


if($column_name == 'Social') {

if($_POST['facebook'] != ''){
if(strpos($_POST['facebook'], "http://") !== false || strpos($_POST['facebook'], "https://" !== false) ){ $facebook = $_POST['facebook']; 
}else{$facebook = "http://".$_POST['facebook'];}
}else{
$facebook = '';	
}

if($_POST['twitter'] != ''){
if(strpos($_POST['twitter'], "http://") !== false || strpos($_POST['witter'], "https://" !== false) ){ $twitter = $_POST['twitter']; 
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


 $sql = "UPDATE tbl_users SET 
 Facebook='".$facebook."',
 Twitter='".$twitter."',
 Linkedin='".$linkedin."'

 WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 mysqli_query($connecDB, $sql); 

 } 



if($column_name == 'Resume') {

if($content != ''){

if($row_user['Resume'] != ''){
	
\Cloudinary::config(array(
    "cloud_name" => "dgml9ji66",
    "api_key" => "341921643963213",
    "api_secret" => "BRddFY0iBJQwAwohhJIrsd0VaP8"
));

//R::setup('mysql:host=localhost;dbname=findacto', 'root', '123');

$result = \Cloudinary\Uploader::destroy($row_user['Resume'], $options = array());
}

 $sql = "UPDATE tbl_users SET Resume='".$content."' WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 mysqli_query($connecDB, $sql); 
 }
 
 }



 

 ?>
