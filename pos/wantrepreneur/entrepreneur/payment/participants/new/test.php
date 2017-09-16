<?php

// Connect to your database
$db_conx = mysqli_connect("localhost", "root", "", "circl");
if (!$db_conx) { die( mysqli_connect_error() ); }
// Query and build the display list
$list = "";
$sql = "SELECT * FROM tbl_participant WHERE idtest NOT IN (SELECT userID FROM tbl_participant_request)";
        // the ON clause specifies that the "id" column from both tables must match
$query = mysqli_query($db_conx, $sql) or die( mysqli_error($db_conx) );
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	$list .= $row["idtest"]." <br> ";
	//$list .= '<u>https://www.youtube.com/user/'.$row["youtube"].'</u> <hr>';



}
// Close the database connection
mysqli_close($db_conx);
echo $list;



?>