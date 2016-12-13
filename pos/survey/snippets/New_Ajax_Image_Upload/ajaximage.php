<?php
require_once 'config.php';
session_start();
$session_id='1'; //$session id
$path = "uploads/";

	$valid_formats = array("jpg", "png", "gif", "bmp");
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



$sql2 = mysqli_query($connecDB,"SELECT * FROM participant_profile_images WHERE userID='2'");
$row=mysqli_fetch_array($sql2);

if(mysqli_num_rows($sql2)>0)
{
  


  $update_sql = mysqli_query($connecDB,"UPDATE participant_profile_images SET thumbnail_image='$actual_image_name' WHERE userID='2'");
  
 echo "<img src='uploads/".$actual_image_name."'  class='preview'>";
 
	}else{

		
		$sql=mysqli_query($connecDB,"INSERT INTO tbl_participant (`id`,`userID`,`profile_image`)
			VALUES (NULL, '2' ,'".$actual_image_name."')");



     	

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