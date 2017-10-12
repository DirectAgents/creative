<?php
//update.php
$connect = mysqli_connect("localhost", "root", "123", "google");
//$page_id = $_POST["page_id_array"];

if($_POST['category'] == 'Book'){
for($i=0; $i<count($_POST["page_id_array"]); $i++)
{
 $query = "
 UPDATE i_want_to_be_an_entrepreneur
 SET page_order = '".$i."' 
 WHERE id = '".$_POST["page_id_array"][$i]."' AND userID =  '".$_SESSION['userID']."' AND Book != ''";
 mysqli_query($connect, $query);
}
}


if($_POST['category'] == 'Meetup_Group'){
for($i=0; $i<count($_POST["page_id_array"]); $i++)
{
 $query = "
 UPDATE i_want_to_be_an_entrepreneur
 SET page_order = '".$i."' 
 WHERE id = '".$_POST["page_id_array"][$i]."' AND userID =  '".$_SESSION['userID']."' AND Meetup_Group != ''";
 mysqli_query($connect, $query);
}
}

//echo $_POST["page_id_array"][$i];
//echo 'Page Order has been updated'; 

?>