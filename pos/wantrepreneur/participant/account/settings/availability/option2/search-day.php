<?php
include("../../../../../config.inc.php"); //include config file
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table


$sql = "SELECT DISTINCT day FROM days WHERE day LIKE '%".$searchTerm."%' ORDER BY day ASC";
$query  = $mysqli->query($sql) or die(mysqli_error($connection)); 
//$row = $total_pages->fetch_assoc();

while ($row = $query->fetch_assoc()) {
    $data[] = $row['day'];
}
//return json data
echo json_encode($data);


?>