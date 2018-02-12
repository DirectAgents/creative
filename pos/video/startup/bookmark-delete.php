<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_bookmarks WHERE requester_id='".$_GET['requester_id']."' AND requested_id='".$_GET['requested_id']."' ");
$row = mysqli_fetch_array($sql);


if(mysqli_num_rows($sql)<=0) {	


echo "no good";


}else{


$sql=mysqli_query($connecDB,"DELETE FROM tbl_bookmarks WHERE requester_id='".$_GET['requester_id']."' AND requested_id='".$_GET['requested_id']."'");	

echo "good";



}


}

?>