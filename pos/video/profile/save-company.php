<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 
 require_once('../algoliasearch-client-php-master/algoliasearch.php');


if($_POST){



if($_POST['facebook'] != ''){
if(strpos($_POST['facebook'], "http://") !== false || strpos($_POST['facebook'], "https://" !== false) ){ $facebook = $_POST['facebook']; 
}else{$facebook = "http://".$_POST['facebook'];}
}else{
$facebook = '';	
}

if($_POST['twitter'] != ''){
if(strpos($_POST['twitter'], "http://") !== false || strpos($_POST['twitter'], "https://" !== false) ){ $twitter = $_POST['twitter']; 
}else{$twitter = "http://".$_POST['twitter'];}
}else{
$twitter = '';	
}

if($_POST['angellist'] != ''){
if(strpos($_POST['angellist'], "http://") !== false || strpos($_POST['angellist'], "https://" !== false) ){ $linkedin = $_POST['angellist']; 
}else{$angellist = "http://".$_POST['angellist'];}
}else{
$angellist = '';	
}	


$sql = mysqli_query($connecDB,"SELECT * FROM startups WHERE id='".$_POST['id']."'");
$row = mysqli_fetch_array($sql);

if($_POST['logo'] == ''){$logo = $row['Logo'];}else{$logo = $_POST['logo'];}
if($_POST['screenshot'] == ''){$screenshot = $row['Screenshot'];}else{$screenshot = $_POST['screenshot'];}


$arr = explode(",", $_POST['location'], 2);
$city = $arr[0];
$state = $arr[1];
$state_final = str_replace(' ', '', $state);	

$sql_zip = "SELECT * FROM zip_state WHERE city='".$city."' AND state = '".$state_final."'";  
$result = mysqli_query($connecDB, $sql_zip);  
$row_zip = mysqli_fetch_array($result);

date_default_timezone_set('America/New_York');
$date = date('Y-m-d'); 


if(mysqli_num_rows($sql)<=0) {



$insert_sql = mysqli_query($connecDB,"INSERT INTO startups(userID, startupID, Name, Position, Industry, City, State, Zip, About, Description, Logo, Video, Screenshot, Facebook, Twitter, AngelList, Date_Posted) VALUES('".$_POST['userid']."', '".$_POST['userid']."' ,'".$_POST['name']."', '".$_POST['position']."' ,
  '".$_POST['industry']."', '".$city."' , '".$state_final."', '".$row_zip['zip']."', '".$_POST['about']."', '".$_POST['description']."' , '".$logo."' ,
  '".$_POST['video']."', '".$screenshot."', '".$facebook."', '".$twitter."', '".$angellist."', '".$date."')");



$sql = "UPDATE tbl_users SET 
Position='".$_POST['position']."'

WHERE userID='".$_POST['userid']."'";

mysqli_query($connecDB, $sql);



}else{



$sql = "UPDATE startups SET 
Name='".$_POST['name']."',
Position='".$_POST['position']."',
Industry='".$_POST['industry']."',
About='".$_POST['about']."',
Description='".$_POST['description']."',
City='".$city."',
State='".$state_final."',
Zip='".$row_zip['zip']."',
Facebook='".$facebook."',
Twitter='".$twitter."',
AngelList='".$angellist."',
Logo='".$logo."',
Video='".$_POST['video']."',
Screenshot='".$screenshot."',
Date_Posted='".$date."'


WHERE id='".$_POST['id']."'";

mysqli_query($connecDB, $sql);


$sql = "UPDATE tbl_users SET 
Position='".$_POST['position']."'

WHERE userID='".$_POST['userid']."'";

mysqli_query($connecDB, $sql);


}


echo '<div id="position">';
echo '<h5 class="text-white">';
//echo $city.', '.$state_final;
echo $_POST['position'];
echo '</h5>';
echo '</div>';

 

$date_algolia = date('F j',strtotime($date));  // January 30, 2015, for example.


$sql_startup = mysqli_query($connecDB,"SELECT * FROM tbl_users LEFT JOIN startups ON startups.userID=tbl_users.userID WHERE tbl_users.userID='".$_POST['userid']."'");
$row_startup = mysqli_fetch_array($sql_startup);


//$startupID = rand(5, 1000000);


$response = array();

$response[] = array(
	'objectID'=> $row_startup['userID'],
	'startupID'=> $row_startup['userID'],
	'name'=> $_POST['name'], 
	'industry'=> $_POST['industry'],
	'description'=> $row_startup['Description'],
	'location'=> $city.', '.$state_final, 
	'logo'=> $logo,
	'video'=> $_POST['video'],
	'screenshot'=> $screenshot,
	'fullname'=> $row_startup['Fullname'],
	'position'=> $row_startup['Position'],
	'likes'=> '0',
	'date'=> $date_algolia
	 );

$fp = fopen('startups.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

//echo var_dump($response);

//Upload to algolia
$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('startups');

$records = json_decode(file_get_contents('startups.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}




}

?>