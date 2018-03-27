<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 
 require_once('../algoliasearch-client-php-master/algoliasearch.php');


if($_POST){






$sql = mysqli_query($connecDB,"SELECT * FROM investor_company WHERE userID='".$_POST['userid']."'");
$row = mysqli_fetch_array($sql);

if($_POST['logo'] == ''){$logo = $row['Logo'];}else{$logo = $_POST['logo'];}



date_default_timezone_set('America/New_York');
$date = date("Y-m-d");
$time = date('h:i:s A');  





if ($sql->num_rows == 0){




$insert_sql = mysqli_query($connecDB,"INSERT INTO investor_company(userID, companyID, Name, Title, Type, Country, City, State, ZipCode, Logo, Date_Posted) VALUES('".$_POST['userid']."', '".$_POST['userid']."' ,'".$_POST['company']."', '".$_POST['title']."' ,
  '".$_POST['type']."', '".$_POST['country']."', '".$_POST['city']."' , '".$_POST['state']."', '".$_POST['zip']."', '".$logo."' ,'".$date."')");

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
Date_Posted='".$date."'


WHERE companyID='".$_POST['userid']."'";

mysqli_query($connecDB, $sql);


$sql = "UPDATE tbl_users SET 
Position='".$_POST['title']."'

WHERE userID='".$_POST['userid']."'";

mysqli_query($connecDB, $sql);


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