<?php  
 session_start();
 include_once("config.php"); 


 $sql = "SELECT * FROM profile WHERE id='".$_SESSION['participantSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row = mysqli_fetch_array($result);


 echo '<div id="about">';	
 echo $row['About'];
 echo '</div>';



 echo '<div id="zip">';	
 if($row['ZipCode'] != '') {
 echo $row['City'].', '.$row['State'];
 }else{
 }
 echo '</div>';

 echo '<div id="email">';	
 echo $row['Email'];
 echo '</div>';



 echo '<div id="phone">';	
 echo $row['Phone'];
 echo '</div>';

 
?> 



