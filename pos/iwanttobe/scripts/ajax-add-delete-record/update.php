<?php
//update.php
$connect = mysqli_connect("localhost", "root", "123", "google");
//$page_id = $_POST["page_id_array"];


for($i=0; $i<count($_POST["page_id_array"]); $i++)
{
 $query = "
 UPDATE i_want_to_be_an_entrepreneur
 SET page_order = '".$i."' 
 WHERE id = '".$_POST["page_id_array"][$i]."' AND userID =  '".$_SESSION['userID']."' AND id = '".$_POST["page_id_array"]."' ";
 mysqli_query($connect, $query);
}


//echo $_POST["page_id_array"][$i];
//echo 'Page Order has been updated'; 

?>