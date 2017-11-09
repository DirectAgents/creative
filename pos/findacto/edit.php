<?php  
 include_once("config.php");  

 $id = '1';  
 $content = $_POST["content"]; 
 $column_name = $_POST["column_name"]; 
 
 $sql = "UPDATE profile SET ".$column_name."='".$content."' WHERE id='".$id."'";  
 if(mysqli_query($connecDB, $sql))  
 {  
      //echo 'Data Updated';  
 }  


$sql = mysqli_query($connecDB,"SELECT * FROM profile WHERE id ='1' ");
$row = mysqli_fetch_array($sql);

$skills_array = explode(",", $row['Skills']);

echo '<div id="theskills">';
echo count($skills_array);
echo '</div>';


 ?>