<?php
session_start();
include("../config.inc.php"); //include config file
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table

$sql = "SELECT * FROM profile WHERE id='15'";
$query  = $mysqli->query($sql) or die(mysqli_error($connection)); 
$row2 = $query->fetch_assoc();




if (stripos($row2['Skills'], $searchTerm) !== false) {

$sql = "SELECT DISTINCT skill FROM skills WHERE skill NOT LIKE '%".$searchTerm."%' ORDER BY skill ASC";
$query  = $mysqli->query($sql) or die(mysqli_error($connection)); 

}else{

$sql = "SELECT DISTINCT skill FROM skills WHERE skill LIKE '%".$searchTerm."%' ORDER BY skill ASC";
$query  = $mysqli->query($sql) or die(mysqli_error($connection)); 

}

//$row = $total_pages->fetch_assoc();

while ($row = $query->fetch_assoc()) {
    $data[] = $row['skill'];
}
//return json data
echo json_encode($data);


?>