<?php

session_start();
include_once("../config.php"); 

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$_SESSION['entrepreneurSession']."'");
$row = mysqli_fetch_array($sql);



?>


 <a href="http://res.cloudinary.com/dgml9ji66/image/upload/v1519605264/<?php echo $row['Resume']; ?>.pdf" target="_blank">
View Resume
</a>