<?php  
 session_start();	
 include_once("../config.php");  
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
 if(mysqli_num_rows($sql)<=0) {
 

 echo '<div id="zip">'.$row_user['City'].', '.$row_user['State'].'</div>';
 
 }else{
      
  echo '<div id="zip">'.$row['city'].', '.$row['state'].'</div>';
 
 }  

 }




 if($column_name == 'Zip_Company') {

 $sql=mysqli_query($connecDB,"SELECT * FROM zip_state WHERE zip='".$content."'");
 $row=mysqli_fetch_array($sql); 	

 //$sql = "UPDATE profile SET City='".$row['city']."', State='".$row['state']."', ZipCode='".$row['zip']."' WHERE id='15'";  
 
 //if(mysqli_query($connecDB, $sql))  
 //{  
 if(mysqli_num_rows($sql)<=0) {
 
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

/*
$skill_level = $content;
$values = explode(',', $skill_level);
foreach ($values as $value)
{
    $insert_sql = mysqli_query($connecDB,"INSERT INTO skills_level(userid,skill,skill_level) VALUES('15','".$value."','".$_POST['skill_level_percentage']."')");
}
*/

 $sql = "UPDATE tbl_users SET Skills='".$content."' WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 mysqli_query($connecDB, $sql); 

 }



 

 ?>
