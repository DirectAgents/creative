<?php

session_start();

require_once '../base_path.php';

require_once '../class.entrepreneur.php';

include_once("../config.php");


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




if(isset($_GET['code'])){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.linkedin.com/oauth/v2/accessToken?client_id=78x2ye1ktvzj7d&client_secret=wDfh6OIUrSLpQddt&grant_type=authorization_code&redirect_uri=http://localhost/creative/pos/video/linkedin/&code=".$_GET['code']."",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-length: 0",
    "postman-token: a1b79473-86f8-523d-171f-564c0a0b9fe5"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

//curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
}


$json = json_decode($response);

if(isset($json->access_token)){

$access_token = $json->access_token;

//echo $access_token;

//echo $json->profile->displayName;



//echo $access_token;


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.linkedin.com/v1/people/~:(id,first-name,last-name,picture-url,public-profile-url,email-address)?format=json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-length: 0",
    'Content-type: application/json',
    'Authorization: Bearer '.$access_token.''
  ),
));

$response_test = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response_test;

}

  $user = json_decode($response_test);

  echo $user->firstName;


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user->emailAddress."'");
$row = mysqli_fetch_array($sql);



if ($sql->num_rows == 1){ //if user already exist change greeting text to "Welcome Back"

 
        $fullname = $user->firstName.' '.$user->lastName;

        $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
        linkedin_id = '".$user->id."',
        username = '"seoUrl($fullname)"',
        Fullname = '".$fullname."',
        linkedin_picture_link = '".$user->pictureUrl."',
        ProfileImage = 'Linkedin'
    
        WHERE Email='".$user->emailAddress."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['entrepreneurSession'] = $row['userID'];
        $_SESSION['linkedin_id'] = $user->id;
        $_SESSION['email'] = $user->emailAddress;
        $_SESSION['fullname'] = $user->firstName.' '.$user->lastName;
        $_SESSION['linkedin_picture_link'] = $user->pictureUrl;
        //echo $_SESSION['startupSession'];
        header('Location: '.BASE_PATH.'');
        //header('Location: '.BASE_PATH.'');
        exit();

     }
  else //else greeting text "Thanks for registering"
  { 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    
    $username = $user->firstName.' '.$user->lastName;
    

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (username, linkedin_id, Fullname, Email, linkedin_picture_link, ProfileImage, Date_Created) 
      VALUES ('".seoUrl($username)."' ,'".$user->id."',  '".$fullname."', '".$user->emailAddress."', '".$user->pictureUrl."' , 'Linkedin', '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  

        $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user->emailAddress."'");
        $row2 = mysqli_fetch_array($sql);

        $_SESSION['entrepreneurSession'] = $row2['userID'];
        $_SESSION['linkedin_id'] = $user->id;
        $_SESSION['email'] = $user->emailAddress;
        $_SESSION['fullname'] = $user->firstName.' '.$user->lastName;
        $_SESSION['linkedin_picture_link'] = $user->pictureUrl;
        //echo $_SESSION['startupSession'];
        //echo "asdfasfd";
        header('Location: '.BASE_PATH.'/choose/');
        exit();


    
    //echo $user->id;

   
    }

  }

}
 

?>