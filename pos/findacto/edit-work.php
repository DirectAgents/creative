<?php  
 include_once("config.php");  


$sql=mysqli_query($connecDB,"SELECT * FROM work WHERE id='".$_POST['id']."' ORDER BY id DESC ");
$row_work = mysqli_fetch_array($sql); 

 $screenshots = $_POST['screenshots'];

 $sql = "UPDATE work SET 
 name = '".$_POST['name']."',  
 link = '".$_POST['link']."',
 description = '".$_POST['description']."',
 screenshots = '".$screenshots."'
 
 WHERE id='".$_POST['id']."'";  
 if(mysqli_query($connecDB, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>