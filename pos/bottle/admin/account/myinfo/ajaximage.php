<?php
require_once '../../config.php';
require_once '../../base_path.php';
session_start();
$session_id='1'; //$session id
$path = "../../images/profile/customer/";

	$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp", "JPG", "JPEG","PNG", "GIF", "BMP");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{	

			$lastDot = strrpos($_FILES['photoimg']['name'], ".");
            $name = str_replace(array('.', '\\', '/', '*', ','), "", substr($_FILES['photoimg']['name'], 0, $lastDot)) . substr($_FILES['photoimg']['name'], $lastDot);

			//$name = $_FILES['photoimg']['name'];
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



$sql2 = mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE userID='".$_SESSION['customerSession']."'");
$row=mysqli_fetch_array($sql2);

if(mysqli_num_rows($sql2)>0)
{
  
 
  $update_sql = mysqli_query($connecDB,"UPDATE tbl_customer SET profile_image='$actual_image_name', google_picture_link='', facebook_id=''
  WHERE userID='".$_SESSION['customerSession']."'");
  
  echo "<img src='../../images/profile/customer/".$actual_image_name."'  class='preview'>";
 
	}else{

		
		$sql=mysqli_query($connecDB,"INSERT INTO tbl_customer (`id`,`userID`,`profile_image`, `google_picture_link`)VALUES (NULL, '".$_SESSION['customerSession']."' ,'".$actual_image_name."', '')");



     	

		echo "<img src='../../images/profile/customer/".$actual_image_name."'  class='preview'>";

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