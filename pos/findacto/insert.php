<?php  
 include_once("config.php");

 $id = '1';  



$insert_sql = mysqli_query($connecDB,"INSERT INTO work(name,link,description,screenshots) VALUES('".$_POST["name"]."','".$_POST["link"]."','".$_POST["description"]."','".$_POST["screenshots"]."')");

echo "good";

 ?>

 