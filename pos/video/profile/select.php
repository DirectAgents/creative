<?php  
 session_start();
 include_once("../config.php"); 


  $column_name = $_POST["column_name"]; 


 $sql = "SELECT * FROM tbl_startup WHERE userID ='15'";  
 $result = mysqli_query($connecDB, $sql);  
 $row = mysqli_fetch_array($result);




 if($column_name == 'Zip') {
 echo '<div id="zip">';	
 if($row['ZipCode'] != '') {
 echo $row['City'].', '.$row['State'];
 }else{
 }
 echo '</div>';
}



 
?> 



