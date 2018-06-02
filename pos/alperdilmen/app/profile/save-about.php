<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID='".$_POST['userid']."'");
$row = mysqli_fetch_array($sql);

if(mysqli_num_rows($sql) > 0) {

$sql = "UPDATE tbl_users SET 
About='".$_POST['about']."'

WHERE userID='".$_POST['userid']."'";

mysqli_query($connecDB, $sql);


$sql2 = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID='".$_POST['userid']."'");
$row2 = mysqli_fetch_array($sql2);

echo $row2['About'];

}


}

?>