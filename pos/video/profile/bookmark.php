<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_bookmarks WHERE requester_id='".$_POST['requester_id']."' AND requested_id='".$_POST['requested_id']."' ");
$row = mysqli_fetch_array($sql);


if(mysqli_num_rows($sql)<=0) {	


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_bookmarks(requester_id, requested_id) VALUES('".$_POST['requester_id']."','".$_POST['requested_id']."')");

echo "good";

}else{

echo "no good";

}


}

?>