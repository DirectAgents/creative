<?php

include("../../../config.php"); //include config file


$sql=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectStatus = 'Public' AND FinishedProcess = 'Y'");
//$results=mysql_query($sql);



//$results = mysql_query("SELECT id,userID,FirstName, LastName, Gender FROM tbl_startup_project 
//WHERE Gender RLIKE '".$Gender."' OR Age RLIKE '".$Age."' OR Location RLIKE '".$Location."' OR Height = '".$Height."' OR Meetupchoice RLIKE '".$Meetupchoice."' ORDER BY id DESC LIMIT $position, $item_per_page");



//output results from database

echo '<div class="page_result">';


if(mysqli_num_rows($sql)>0)
{

//while($results->fetch()){ //fetch values
while($row = mysqli_fetch_array($sql))
{ 

echo $row['ProjectID'];
echo "<br>";

}

}


?>