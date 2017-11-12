<?php  
 session_start();
 include_once("config.php"); 

 $column_name = $_POST["column_name"]; 

 $sql = "SELECT * FROM profile WHERE id='".$_SESSION['participantSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
  
 $row = mysqli_fetch_array($result);

 //echo $row[$column_name];

 echo '<div id="zip">'.$row['City'].', '.$row['State'].'</div>';



?> 