<?php  
 include_once("config.php");  

 $sql = "UPDATE work SET 
 name = '".$_POST['name']."',  
 link = '".$_POST['link']."',
 description = '".$_POST['description']."',
 screenshots = '".$_POST['screenshots']."'
 
 WHERE id='".$_POST['id']."'";  
 if(mysqli_query($connecDB, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>