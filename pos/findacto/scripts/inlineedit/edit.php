<?php  
 $connect = mysqli_connect("localhost", "root", "123", "findacto");  

 $id = '1';  
 $content = $_POST["content"]; 
 $column_name = $_POST["column_name"]; 
 
 $sql = "UPDATE profile SET ".$column_name."='".$content."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>