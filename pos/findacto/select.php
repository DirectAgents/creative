<?php  
 $connect = mysqli_connect("localhost", "root", "123", "findacto");  

 $id = '1';  

 $column_name = $_POST["column_name"]; 

 $sql = "SELECT * FROM profile WHERE id='".$id."'";  
 $result = mysqli_query($connect, $sql);  
  
 $row = mysqli_fetch_array($result);

 echo $row[$column_name];



?> 