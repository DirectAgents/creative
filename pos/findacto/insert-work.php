<?php  
 include_once("config.php");




$insert_sql = mysqli_query($connecDB,"INSERT INTO work(userID,name,link,description,screenshots) VALUES('1','".$_POST["name"]."','".$_POST["link"]."','".$_POST["description"]."','".$_POST["screenshots"]."')");


$result_count = mysqli_query($connecDB,"SELECT userID,id, COUNT(DISTINCT id) AS count FROM work WHERE userID = '1' GROUP BY userID");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo $count;
}

 ?>

 