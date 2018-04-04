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




$arr = explode(",", $_POST['location'], 2);
$city = $arr[0];
$state = $arr[1];
$state_final = str_replace(' ', '', $state);	

$sql_zip = "SELECT * FROM zip_state WHERE city='".$city."' AND state = '".$state_final."'";  
$result = mysqli_query($connecDB, $sql_zip);  
$row_zip = mysqli_fetch_array($result);


date_default_timezone_set('America/New_York');
$date = date("Y-m-d");
$time = date('h:i:s A');  




function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}


if ($sql->num_rows == 0){


if($_POST['logo'] == 'on' ){$logo = 'rocket_z6vxuz';}else{$logo = $_POST['logo'];}
if($_POST['screenshot'] == 'on'){$screenshot = 'industries/placeholder-blue';}else{$screenshot = $_POST['screenshot'];}


$insert_sql = mysqli_query($connecDB,"INSERT INTO startups(userID, startupID, Name, Url, Title, Industry, City, State, ZipCode, About, Description, Logo, Video, Screenshot, Facebook, Twitter, AngelList, Date_Posted) VALUES('".$_POST['userid']."', '".$_POST['userid']."' ,'".$_POST['name']."', '".seoUrl($_POST['name'])."' , '".$_POST['title']."' ,
  '".$_POST['industry']."', '".$city."' , '".$state_final."', '".$row_zip['zip']."', '".$_POST['about']."', '".$_POST['description']."' , '".$logo."' ,
  '".$_POST['video']."', '".$screenshot."', '".$facebook."', '".$twitter."', '".$angellist."', '".$date."')");

echo "<div id='startup-link'>";
echo seoUrl($_POST['name']);
echo "</div>";



$sql = "UPDATE tbl_users SET 
Position='".$_POST['position']."'

WHERE userID='".$_POST['userid']."'";

mysqli_query($connecDB, $sql);





$sql_startup = mysqli_query($connecDB,"SELECT * FROM tbl_users LEFT JOIN startups ON startups.userID=tbl_users.userID WHERE tbl_users.userID='".$_POST['userid']."'");
$row_startup = mysqli_fetch_array($sql_startup);


//$startupID = rand(5, 1000000);


//Upload to algolia

if($_POST['logo'] == 'on' ){$logo_algolia = 'rocket_z6vxuz';}else{$logo_algolia = $_POST['logo'];}

$date_algolia = date('F j',strtotime($date));  // January 30, 2015, for example.

$response = array();

$response[] = array(
	'objectID'=> $row_startup['userID'],
	'startupID'=> $row_startup['userID'],
	'name'=> $_POST['name'],
	'url'=> seoUrl($_POST['name']), 
	'industry'=> $_POST['industry'],
	'description'=> $row_startup['Description'],
	'location'=> $city.', '.$state_final, 
	'logo'=> $logo_algolia,
	'video'=> $_POST['video'],
	'screenshot'=> $screenshot,
	'fullname'=> $row_startup['Fullname'],
	'title'=> $row_startup['Title'],
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



}else{


if($_POST['logo'] == 'on' ){$logo = $row['Logo'];}else{$logo = $_POST['logo'];}
if($_POST['screenshot'] == 'on'){$screenshot = $row['Screenshot'];}else{$screenshot = $_POST['screenshot'];}


$sql = "UPDATE startups SET 
Name='".$_POST['name']."',
Url='".seoUrl($_POST['name'])."',
Title='".$_POST['title']."',
Industry='".$_POST['industry']."',
About='".$_POST['about']."',
Description='".$_POST['description']."',
City='".$city."',
State='".$state_final."',
ZipCode='".$row_zip['zip']."',
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








$sql_startup = mysqli_query($connecDB,"SELECT * FROM tbl_users LEFT JOIN startups ON startups.userID=tbl_users.userID WHERE tbl_users.userID='".$_POST['userid']."'");
$row_startup = mysqli_fetch_array($sql_startup);






//Update likes

$sql_likes = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE requested_id='".$_POST['userid']."'");
$row_likes = mysqli_fetch_array($sql_likes);

$sql_top_rated = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Industry='".$row_likes['Industry']."'");
$row_top_rated = mysqli_fetch_array($sql_top_rated);

$sql_top_rated2 = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Industry='".$_POST['industry']."'");
$row_top_rated2 = mysqli_fetch_array($sql_top_rated2);

// Delete likes from old Industry
$sql = "UPDATE tbl_top_rated_startups SET 
Likes='".$row_top_rated['Likes']."' - '".$row_likes['Likes'] ."' 

WHERE Industry='".$row_likes['Industry']."'";

mysqli_query($connecDB, $sql);

//Add likes to new Industry
$sql = "UPDATE tbl_top_rated_startups SET 
Likes='".$row_top_rated2['Likes']."' + '".$row_likes['Likes'] ."' 

WHERE Industry='".$_POST['industry']."'";

mysqli_query($connecDB, $sql);


$sql = "UPDATE tbl_likes SET 
Industry='".$_POST['industry']."'

WHERE requested_id='".$_POST['userid']."'";

mysqli_query($connecDB, $sql);


//$startupID = rand(5, 1000000);


//Upload to algolia

if($row_startup ['Logo'] == 'on'){$logo_algolia = 'rocket_z6vxuz';}else{$logo_algolia = $_POST['logo'];}

$date_algolia = date('F j',strtotime($row['Date_Posted']));  // January 30, 2015, for example.

if(empty($row_likes['Likes'])){$likes = '0';}else{$likes = $row_likes['Likes'];}

$response = array();

$response[] = array(
	'objectID'=> $row_startup['userID'],
	'startupID'=> $row_startup['userID'],
	'name'=> $_POST['name'],
	'url'=> seoUrl($_POST['name']), 
	'industry'=> $_POST['industry'],
	'description'=> $row_startup['Description'],
	'location'=> $city.', '.$state_final, 
	'logo'=> $logo_algolia,
	'video'=> $_POST['video'],
	'screenshot'=> $screenshot,
	'fullname'=> $row_startup['Fullname'],
	'title'=> $row_startup['Title'],
	'likes'=> $likes,
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


echo '<div id="position">';
echo '<h5 class="text-white">';
//echo $city.', '.$state_final;
echo $_POST['position'];
echo '</h5>';
echo '</div>';



/*
$dateTime = "2017-03-05";
$dateTimeSplit = explode(" ",$dateTime);
$date = $dateTimeSplit[0];
echo date('M d, Y',strtotime($date));
*/ 









}

?>