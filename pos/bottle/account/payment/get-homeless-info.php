<?php 


include("../../config.php"); //include config file


if($_POST)
{

$sqlhomeless=mysqli_query($connecDB,"SELECT * FROM homeless WHERE homelessID = '".$_POST['homeless_id']."'");
$rowhomeless = mysqli_fetch_array($sqlhomeless);

echo $rowhomeless['Firstname'].' '.$rowhomeless['Lastname'];



}

?>