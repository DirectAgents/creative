<?php  
 session_start();
 include_once("../config.php"); 


 $column_name = $_POST["column_name"]; 


if($column_name == 'Zip') {

 $sql = "SELECT * FROM tbl_users WHERE userID ='".$_SESSION['entrepreneurSession']."'";  
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

}


if($column_name == 'Zip Company') {

 $sql = "SELECT * FROM startups WHERE startupID ='".$_SESSION['entrepreneurSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row = mysqli_fetch_array($result);




 if($column_name == 'Zip Company') {
 echo '<div id="zip">';	
 if($row['ZipCode'] != '') {
 echo $row['City'].', '.$row['State'];
 }else{
 }
 echo '</div>';
}

}



 
?> 



