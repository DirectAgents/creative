<?php

include_once("config.php"); 


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

if(array_key_exists(0, $row[$keys[20]])) {echo "hello"; }else{}

//echo $keys[1]; // chocolate
//echo $row[$keys[20]]; // 20





?>





