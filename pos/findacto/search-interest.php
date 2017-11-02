<?php
include("config.inc.php"); //include config file
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table

$sql = "SELECT * FROM profile WHERE id='1'";
$query  = $mysqli->query($sql) or die(mysqli_error($connection)); 
$row2 = $query->fetch_assoc();




if (stripos($row2['Skills'], $searchTerm) !== false) {

$sql = "SELECT DISTINCT interest FROM interests WHERE interest NOT LIKE '%".$searchTerm."%' ORDER BY interest ASC";
$query  = $mysqli->query($sql) or die(mysqli_error($connection)); 

}else{

$sql = "SELECT DISTINCT interest FROM interests WHERE interest LIKE '%".$searchTerm."%' ORDER BY interest ASC";
$query  = $mysqli->query($sql) or die(mysqli_error($connection)); 

}

//$row = $total_pages->fetch_assoc();

while ($row = $query->fetch_assoc()) {
    $data[] = $row['interest'];
}
//return json data
echo json_encode($data);


?>