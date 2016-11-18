<?php
include("config.inc.php"); //include config file
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
	header('HTTP/1.1 500 Invalid page number!');
	exit();
}

//get current starting point of records
$position = ($page_number * $item_per_page);

//Limit our results within a specified range. 
$results = $mysqli->prepare("SELECT id, name, message FROM paginate ORDER BY id DESC LIMIT $position, $item_per_page");
$results->execute(); //Execute prepared Query
$results->bind_result($id, $name, $message); //bind variables to prepared statement

//output results from database
echo '<ul class="page_result">';
while($results->fetch()){ //fetch values
	echo '<li id="item_'.$id.'"><span class="page_name">'.$id.') '.$name.'</span><span class="page_message">'.$message.'</span></li>';	
}
echo '</ul>';


?>

