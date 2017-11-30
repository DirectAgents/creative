<?php  
 session_start();	
 include_once("config.php");  
 require_once('algoliasearch-client-php-master/algoliasearch.php');


 
 $content = $_POST["content"]; 
 $column_name = $_POST["column_name"]; 
 


 if($column_name == 'About') {

 $sql = "UPDATE profile SET About='".$content."' WHERE id='".$_SESSION['participantSession']."'";  
 if(mysqli_query($connecDB, $sql))  
 {  
      
 echo $row[$column_name];

 }  

 }


if($column_name == 'Email') {

 $sql = "UPDATE profile SET Email='".$content."' WHERE id='".$_SESSION['participantSession']."'";  
 if(mysqli_query($connecDB, $sql))  
 {  


 }  

 }


 if($column_name == 'Phone') {

 $sql = "UPDATE profile SET Phone='".$content."' WHERE id='".$_SESSION['participantSession']."'";  
 if(mysqli_query($connecDB, $sql))  
 {  


 }  

 }


 if($column_name == 'Zip') {

 $sql=mysqli_query($connecDB,"SELECT * FROM zip_state WHERE zip='".$content."'");
 $row=mysqli_fetch_array($sql); 	

 $sql = "UPDATE profile SET City='".$row['city']."', State='".$row['state']."', ZipCode='".$row['zip']."' WHERE id='".$_SESSION['participantSession']."'";  
 if(mysqli_query($connecDB, $sql))  
 {  
      
  echo '<div id="zip">'.$row['city'].', '.$row['state'].'</div>';
 
 }  

 }



if($column_name == 'Skills') {

	

 $sql = "UPDATE profile SET Skills='".$content."' WHERE id='".$_SESSION['participantSession']."'";  
 if(mysqli_query($connecDB, $sql))  
 {  

      

 }  

 }





$response = array();
//$posts = array();


$sql=mysqli_query($connecDB,"SELECT * FROM profile WHERE id='".$_SESSION['participantSession']."' limit 20 ");
$row=mysqli_fetch_array($sql); 


if($rownav['google_picture_link'] != ''){ 
       
       $profileimage = $_SESSION['google_picture_link'];
 } 

if(isset($_SESSION['fb_access_token_participant'])){ 
       $profileimage = 'https://graph.facebook.com/'.$_SESSION['facebook_photo'].'/picture';
 }
       
if(!isset($_SESSION['access_token']) && (!isset($_SESSION['fb_access_token_participant']))){

     $profileimage =  $row['ProfileImage'];
 }    

  

$response[] = array(
	'objectID'=> $row['id'],
	'name'=> $row['Firstname'].' '.$row['Lastname'], 
	'profileid'=> $row['id'],
	'profileimage'=> $profileimage,
	'about'=> 'I am etc...', 
	'skills'=> explode(',', $row['Skills']),
	'workexamples'=> 'testing app',
	'interestedindustries'=> 'Finance',
	'position'=> 'CEO', 
	'lookingfor'=> 'Technical Co-Founder', 
	'location'=> 'New York, NY', 
	'asa'=> 'CTO',
	'for'=> 'Equity',
	'rating'=> 4875,
	'alternative_name'=> null
	
	 );




$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

//echo var_dump($response);

//Upload to algolia
$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('developers');

$records = json_decode(file_get_contents('results.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}



$skills_array = explode(",", $row['Skills']);


if($row['Skills'] != ''){

echo '<div id="theskills">';
echo count($skills_array);
echo '</div>';

}else{

echo '<div id="theskills">';
echo '0';
echo '</div>';

}
 




 ?>