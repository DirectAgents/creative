<?php
session_start();

//include db configuration file
include_once("../../../config.php");
require_once '../../../base_path.php';


 $participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
    $rowparticipant = mysqli_fetch_array($participant);

//check $_POST["content_txt"] is not empty
if(isset($_POST["languages"]) && strlen($_POST["languages"])>0)
{

    //sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH
    $contentToSave = filter_var($_POST["languages"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $userID = filter_var($_SESSION['participantSession'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $Result = mysqli_query($connecDB,"SELECT * FROM languages WHERE language = '".$contentToSave."'");
    $row = mysqli_fetch_array($Result);

   

    if($row['language'] == $contentToSave){



        $addingnewlanguage = $contentToSave.','.$rowparticipant['Languages'];
        $languages = rtrim($addingnewlanguage,',');
    
    // Insert sanitize string in record
    if(mysqli_query($connecDB,"UPDATE tbl_participant SET Languages = '".$languages."' WHERE userID='".$_SESSION['participantSession']."'"))
    {
        //Record is successfully inserted, respond to ajax request
         $Language = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$userID."' AND Languages = '".$contentToSave."'");
        $row = mysqli_fetch_array($Language);
        $my_id = $row['userID']; //Get ID of last inserted record from MySQL
        echo '<li id="item_'.$contentToSave.'">';
        echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$contentToSave.'">';
        echo '<img src="'.BASE_PATH.'/images/icon_del.gif" border="0" />';
        echo '</a></div>';
        echo $contentToSave.'</li>';
        
    }else{
        //output error
        
        //header('HTTP/1.1 500 '.mysql_error());
        header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
        exit();
    }
} 
    
}
elseif(isset($_POST["recordToDelete"]) && strlen($_POST["recordToDelete"])>0 && !is_numeric($_POST["recordToDelete"]))
{//do we have a delete request? $_POST["recordToDelete"]
    
    //sanitize post value, PHP filter FILTER_SANITIZE_NUMBER_INT removes all characters except digits, plus and minus sign.
    $idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);

    $keywords = $rowparticipant['Languages'];       // Set String
$keywords = explode(',', $keywords);    // Explode into array
unset($keywords[ array_search($_POST["recordToDelete"], $keywords) ]);   // Unset the array element with value of 'libya'
$keywords = implode(',',$keywords);     // Reconstruct string
    
    //try deleting record using the record ID we received from POST
    if(!mysqli_query($connecDB,"UPDATE tbl_participant SET Languages = '".$keywords."' WHERE userID='".$_SESSION['participantSession']."'"))
    {
        //If mysql delete record was unsuccessful, output error
        header('HTTP/1.1 500 Could not delete record!');
        exit();
    }
    
}else{

    //Output error
    header('HTTP/1.1 500 Error occurred, Could not process request!');
    exit();
}
?>
