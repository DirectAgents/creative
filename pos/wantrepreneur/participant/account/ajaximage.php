<?php
require_once '../../config.php';
session_start();
$session_id='1'; //$session id
$path = "uploads/";

	$valid_formats = array("jpg", "jpeg" , "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = 'thumb_'.time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{

$sql2 = "SELECT * FROM participant_profile_images WHERE userID='".$_SESSION['participantSession']."'";
$result=mysql_query($sql2);
$row=mysql_fetch_array($result);

if(mysql_num_rows($result)>0)
{
  
  $update_sql = "UPDATE participant_profile_images SET thumbnail_image='$actual_image_name'
  WHERE userID='".$_SESSION['participantSession']."'";
  mysql_query($update_sql);
  
  echo "<img src='uploads/".$actual_image_name."'  class='preview'>";


	}else{


		$sql="INSERT INTO participant_profile_images (`id`,`userID`,`thumbnail_image`) VALUES (NULL, '".$_SESSION['participantSession']."' ,'$actual_image_name');";
		mysql_query($sql);

		echo "<img src='uploads/".$actual_image_name."'  class='preview'>";

	}			
									
								}
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
?>