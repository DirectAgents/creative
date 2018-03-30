<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 
 require_once('../algoliasearch-client-php-master/algoliasearch.php');


if($_POST){






$sql = mysqli_query($connecDB,"SELECT * FROM investor_company WHERE userID='".$_POST['userid']."'");
$row = mysqli_fetch_array($sql);

if($_POST['logo'] == ''){$logo = $row['Logo'];}else{$logo = str_replace(",","",$_POST['logo']);}


date_default_timezone_set('America/New_York');
$date = date("Y-m-d");
$time = date('h:i:s A');  





if ($sql->num_rows == 0){




$insert_sql = mysqli_query($connecDB,"INSERT INTO investor_company(userID, companyID, Name, Title, Type, Minimum, Maximum, Industry, Countries, Country, Fund_Description, City, State, ZipCode, Logo, Date_Posted) VALUES('".$_POST['userid']."', '".$_POST['userid']."' ,'".$_POST['company']."', '".$_POST['title']."' ,
  '".$_POST['type']."', '".$_POST['minimum']."', '".$_POST['maximum']."', '".implode(', ',$_POST['industry'])."', '".implode(', ',$_POST['countries'])."' , '".$_POST['country']."','".$_POST['fund_description']."', '".$_POST['city']."' , '".$_POST['state']."', '".$_POST['zip']."', '".$logo."' ,'".$date."')");

echo "<div id='startup-link'>";
echo seoUrl($_POST['name']);
echo "</div>";




}else{


$sql = "UPDATE investor_company SET 
Name='".$_POST['company']."',
Title='".$_POST['title']."',
Type='".$_POST['type']."',
Country='".$_POST['country']."',
City='".$_POST['city']."',
State='".$_POST['state']."',
ZipCode='".$_POST['zip']."',
Logo='".$logo."',
Minimum='".$_POST['minimum']."',
Maximum='".$_POST['maximum']."',
Industry='".implode(', ',$_POST['industry'])."',
Countries='".implode(', ',$_POST['countries'])."',
Fund_Description='".$_POST['fund_description']."',
Date_Posted='".$date."'



WHERE companyID='".$_POST['userid']."'";

mysqli_query($connecDB, $sql);


$sql = "UPDATE tbl_users SET 
Position='".$_POST['title']."'

WHERE userID='".$_POST['userid']."'";

mysqli_query($connecDB, $sql);

}



$sql2 = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID = '".$_SESSION['entrepreneurSession']."'");
$row2 = mysqli_fetch_array($sql2);

//Upload to algolia


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

if($row2['ProfileImage'] == 'Google'){$profileimage = $row2['google_picture_link'];}
if($row2['ProfileImage'] == 'Facebook'){$profileimage = "https://graph.facebook.com/".$row2['facebook_id']."/picture?type=large";}
if($row2['ProfileImage'] == 'Google'){$profileimage = $row2['linkedin_picture_link'];}



$date_algolia = date('F j',strtotime($row2['Date_Created']));  // January 30, 2015, for example.


$city_state = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row2['City'])))).', '.$row2['State'];

$response = array();



$response[] = array(
  'objectID'=> $_SESSION['entrepreneurSession'],
  'investorID'=> $_SESSION['entrepreneurSession'],
  'url'=> seoUrl($row2['Fullname']),
  'fullname'=> $row2['Fullname'],
  'profileimage'=> $profileimage,
  'likes'=> '0', 
  'location'=> $city_state,
  'industry'=> explode(',', $row['Industry']),
  'date'=> $date_algolia
   );

$fp = fopen('../choose/investors.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

//echo var_dump($response);


$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('investors');

$records = json_decode(file_get_contents('../choose/investors.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}








echo '<div id="position">';
echo '<h5 class="text-white">';
//echo $city.', '.$state_final;
echo $_POST['position'];
echo '</h5>';
echo '</div>';

echo "<div id='startup-link'>";
echo seoUrl($_POST['name']);
echo "</div>";

/*
$dateTime = "2017-03-05";
$dateTimeSplit = explode(" ",$dateTime);
$date = $dateTimeSplit[0];
echo date('M d, Y',strtotime($date));
*/ 





}

?>