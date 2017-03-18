<?php
session_start();
$target_dir = "../../../images/profile/";
$target_file = $target_dir . $_SESSION['participantSession'].'_'.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if($_FILES["fileToUpload"] !='') {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        //echo 'Successfully Uploaded';
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}




 $maxDim = 200;
        list($width, $height, $type, $attr) = getimagesize( $_FILES['fileToUpload']['tmp_name'] );
        if ( $width > $maxDim || $height > $maxDim ) {
            $target_filename = $_FILES['fileToUpload']['tmp_name'];
            $fn = $_FILES['fileToUpload']['tmp_name'];
            $size = getimagesize( $fn );
            $ratio = $size[0]/$size[1]; // width/height
            if( $ratio > 1) {
                $width = $maxDim;
                $height = $maxDim/$ratio;
            } else {
                $width = $maxDim*$ratio;
                $height = $maxDim;
            }
            $src = imagecreatefromstring( file_get_contents( $fn ) );
            $dst = imagecreatetruecolor( $width, $height );
            imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
            imagedestroy( $src );
            imagepng( $dst, $target_filename ); // adjust format as needed
            imagedestroy( $dst );
        }





// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    echo '<div id="resultimage">1</div>';
    $uploadOk = 0;
}

 

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo '<div id="toolarge">Sorry, your file is too large.</div>';
    echo '<div id="resultimage">0</div>';
    //echo "0";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    echo '<div id="resultimage">0</div>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
        echo '<div id="resultimage">1</div>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>