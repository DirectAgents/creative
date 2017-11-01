<?php  
 include_once("config.php");  

 $id = '1';  
 $content = $_POST["content"]; 
 $column_name = $_POST["column_name"]; 
 
 $sql = "UPDATE profile SET ".$column_name."='".$content."' WHERE id='".$id."'";  
 if(mysqli_query($connecDB, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>