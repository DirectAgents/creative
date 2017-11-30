<?php  
 session_start();
 include_once("config.php"); 

 $column_name = $_POST["column_name"]; 

 $sql = "SELECT * FROM profile WHERE id='".$_SESSION['participantSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
  
 $row = mysqli_fetch_array($result);

 if( $column_name == 'About'){
 if($row['About'] != ''){
 echo $row[$column_name];
 }else{
 echo "No Info ";	
 }
 }

 if( $column_name == 'Zip'){
 echo '<div id="zip">'.$row['City'].', '.$row['State'].'</div>';
 }

 if( $column_name == 'Email'){
 if($row['Email'] != ''){
 echo $row[$column_name];
 }else{
 echo "Add your Email Address";	
 }
 }

 if( $column_name == 'Phone'){
 if($row['Phone'] != ''){
 echo $row[$column_name];
 }else{
 echo "Add your Phone Number";	
 } 
 }
 



?> 