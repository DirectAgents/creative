<?php
session_start();
require_once '../../config.php';
$data = array();
if( isset( $_POST['image_upload'] ) && !empty( $_FILES['images'] )){
	
	$image = $_FILES['images'];
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	
	
	//create directory if not exists
	if (!file_exists('images')) {
		mkdir('images', 0777, true);
	}
	$image_name = $image['name'];
	//get image extension
	$ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
	//assign unique name to image
	$name = time().'.'.$ext;
	//$name = $image_name;
	//image size calcuation in KB
	$image_size = $image["size"] / 1024;
	$image_flag = true;
	//max image size
	$max_size = 512;
	if( in_array($ext, $allowedExts) && $image_size < $max_size ){
		$image_flag = true;
	} else {
		$image_flag = false;
		$data['error'] = 'Maybe '.$image_name. ' exceeds max '.$max_size.' KB size or incorrect file extension';
	} 
	
	if( $image["error"] > 0 ){
		$image_flag = false;
		$data['error'] = '';
		$data['error'].= '<br/> '.$image_name.' Image contains error - Error Code : '.$image["error"];
	}
	
	if($image_flag){
		move_uploaded_file($image["tmp_name"], "images/".$name);
		$src = "images/".$name;
		$dist = "images/thumbnail_".$name;
		$data['success'] = $thumbnail = 'thumbnail_'.$name;
		thumbnail($src, $dist, 200);
		

$sql2 = "SELECT * FROM startup_profile_images WHERE userID='".$_SESSION['startupSession']."'";
$result=mysql_query($sql2);
$row=mysql_fetch_array($result);

if(mysql_num_rows($result)>0)
{
  
  $update_sql = "UPDATE startup_profile_images SET 
  original_image='".$name."',
  thumbnail_image='".$thumbnail."',
  ip_address='".$ip."'
  WHERE userID='".$_SESSION['startupSession']."'";
  mysql_query($update_sql);



	}else{


		$sql="INSERT INTO startup_profile_images (`id`,`userID`,`original_image`, `thumbnail_image`, `ip_address`) VALUES (NULL, '".$_SESSION['startupSession']."' ,'$name','$thumbnail', '$ip');";
		mysql_query($sql);

	}	
		
		
		
	}
	
	//mysqli_close($con);
	header("Location:index.php");
	echo json_encode($data);
	
} else {
	$data[] = 'No Image Selected..';
}



function thumbnail($src, $dist, $dis_width = 100 ){

	$img = '';
	$extension = strtolower(strrchr($src, '.'));
	switch($extension)
	{
		case '.jpg':
		case '.jpeg':
			$img = @imagecreatefromjpeg($src);
			break;
		case '.gif':
			$img = @imagecreatefromgif($src);
			break;
		case '.png':
			$img = @imagecreatefrompng($src);
			break;
	}
	$width = imagesx($img);
	$height = imagesy($img);




	$dis_height = $dis_width * ($height / $width);

	$new_image = imagecreatetruecolor($dis_width, $dis_height);
	imagecopyresampled($new_image, $img, 0, 0, 0, 0, $dis_width, $dis_height, $width, $height);


	$imageQuality = 100;

	switch($extension)
	{
		case '.jpg':
		case '.jpeg':
			if (imagetypes() & IMG_JPG) {
				imagejpeg($new_image, $dist, $imageQuality);
			}
			break;

		case '.gif':
			if (imagetypes() & IMG_GIF) {
				imagegif($new_image, $dist);
			}
			break;

		case '.png':
			$scaleQuality = round(($imageQuality/100) * 9);
			$invertScaleQuality = 9 - $scaleQuality;

			if (imagetypes() & IMG_PNG) {
				imagepng($new_image, $dist, $invertScaleQuality);
			}
			break;
	}
	imagedestroy($new_image);
}