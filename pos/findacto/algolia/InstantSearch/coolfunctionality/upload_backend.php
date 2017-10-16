<?php
header("Access-Control-Allow-Origin: *");
session_start();
require 'main.php';
include 'config.php';



if(isset($_POST['finished'])) 
{


$_SESSION['submissionID'] = rand(100, 1000000);

echo $_SESSION['submissionID'];

}




if(isset($_POST['save'])) 
{
//echo $_POST['description'];
//echo "<br>";
//echo $_POST['version'];

  $update_sql = mysqli_query($connecDB,"UPDATE photo SET 
  description='".$_POST['description']."'

  WHERE version='".$_POST['version']."'");


}


if(isset($_POST['submit'])){


  $_SESSION['submissionID'] = rand(100, 1000000);

$insert_sql = mysqli_query($connecDB,"INSERT INTO submission(userID, submissionID, name) VALUES('911','".$_SESSION['submissionID']."', '".$_POST['submission-name']."')");



function create_photo( $file_path, $orig_name )
{
    # Upload the received image file to Cloudinary
    $result = \Cloudinary\Uploader::upload($file_path, array(
            "tags" => "backend_photo_album",
            "public_id" => $orig_name,
            
    ));

    unlink($file_path);
    error_log("Upload result: " . \PhotoAlbum\ret_var_dump($result));
    $photo = \PhotoAlbum\create_photo_model($result);
    return $result;
}

$files = $_FILES["files"];
$files = is_array($files) ? $files : array( $files );
$files_data = array();
foreach ($files["tmp_name"] as $index => $value) {
    array_push($files_data, create_photo($value, $files["name"][$index]));
}


}

?>

<?php 

//echo $_SESSION['submissionID'];

$sql = mysqli_query($connecDB,"SELECT * FROM submission WHERE submissionID = '".$_SESSION['submissionID']."'");

if(mysqli_num_rows($sql) == 0)
{ ?>

<!-- A standard form for sending the image data to your server -->
    <div id='backend_upload'>
      <form action="upload_backend.php" method="post" enctype="multipart/form-data">
        <h3>Give it a name</h3>
        <input type="text" name="submission-name" id="submission-name"/><br><br>
        <h3>Upload screenshots</h3>
        <input id="fileupload" type="file" name="files[]" multiple accept="image/gif, image/jpeg, image/png"><br><br>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>

 <?php }else{ ?>



<?php $sql2 = mysqli_query($connecDB,"SELECT * FROM photo WHERE submissionID = '".$_SESSION['submissionID']."'"); 

while($row2 = mysqli_fetch_array($sql2))
{ 

?>
<a id="form"></a>
<form action="" method="post" enctype="multipart/form-data">


<div style="float:left; width:100%; margin-top:20px;">

<div style="float:left">
<img src="<?php echo $row2['url'];?>" width="200"/>
</div>

<div style="float:left">
<input type="hidden" name="version" id="version" value="<?php echo $row2['version']; ?>"/>
<textarea style="width:100%; height:100px;" name="description" id="description"><?php echo $row2['description']; ?></textarea>

<div style="float:left; width:100%; margin-top:20px;">

<input type="submit" name="save" value="submit"/>

</div>

</div>


</div>



</form>


<?php } ?> 

<form action="" method="post" enctype="multipart/form-data">
<input type="submit" name="finished" value="Finished"/>
</form>

<?php } ?>   


<?php

/*if(isset($files_data)){

foreach ($files_data as $file_data) {
    //\PhotoAlbum\array_to_table($file_data);
    echo '<div style="float:left; margin-top:20px; width:100%">';
    echo '<div style="float:left">';
    echo cl_image_tag($file_data['public_id'], array_merge($thumbs_params, array( "crop" => "fill" )));
    echo '</div>';
    echo '<div style="float:left">';
    echo '<textarea rows="4" cols="50"></textarea>';
     echo '</div>';
     echo '</div>';
}

}*/

?>





