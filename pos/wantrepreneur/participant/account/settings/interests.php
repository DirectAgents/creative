<?php


session_start();

//include db configuration file
include_once("../../../config.php");

//check $_POST["content_txt"] is not empty
if(isset($_POST["interests"]) && strlen($_POST["interests"])>0)
{

    //sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH
    $contentToSave = filter_var($_POST["interests"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    //$projectID = filter_var($_POST["projectid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    //$userID = filter_var($_POST["userid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


    if($contentToSave == ''){$interests = 'NULL';}else{$interests = $contentToSave;}


       

        $Interest = mysqli_query($connecDB,"SELECT * FROM interests WHERE interest = '".$contentToSave."'");
        $row = mysqli_fetch_array($Interest);
        $my_id = $row['id']; //Get ID of last inserted record from MySQL
        $my_interest = $row['interest']; //Get ID of last inserted record from MySQL
        

        if($row['interest'] == $contentToSave){

        echo '<li id="item_'.$my_id.'">';
        echo '<input id="interestselection_'.$my_id.'" name="interestselection[]" type="checkbox"  value="'.$my_interest .'" style="display:none" checked/>';
        echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
        echo $my_interest;
        echo '<img src="../../../images/icon_del.gif" border="0" class="icon_del" />';
        echo '</a></div>';
        echo '</li>';
       
       }

       
}









/*
session_start();

//include db configuration file
include_once("../../../config.php");
require_once '../../../base_path.php';


 $participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
    $rowparticipant = mysqli_fetch_array($participant);

//check $_POST["content_txt"] is not empty
if(isset($_POST["interests"]) && strlen($_POST["interests"])>0)
{

    //sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH
    $contentToSave = filter_var($_POST["interests"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $userID = filter_var($_SESSION['participantSession'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $Result = mysqli_query($connecDB,"SELECT * FROM interests WHERE interest = '".$contentToSave."'");
    $row = mysqli_fetch_array($Result);

   

    if($row['interest'] == $contentToSave){



        $addingnewinterest = $contentToSave.','.$rowparticipant['Interests'];
        $interests = rtrim($addingnewinterest,',');
    
    // Insert sanitize string in record
    if(mysqli_query($connecDB,"UPDATE tbl_participant SET Interests = '".$interests."' WHERE userID='".$_SESSION['participantSession']."'"))
    {
         $Interest = mysqli_query($connecDB,"SELECT * FROM interests WHERE interest = '".$contentToSave."'");
        $row = mysqli_fetch_array($Interest);
        $my_id = $row['id']; //Get ID of last inserted record from MySQL
        $my_interest = $row['interest']; //Get ID of last inserted record from MySQL
        

        if($row['interest'] == $contentToSave){

        echo '<li id="item_'.$my_id.'">';
        echo '<input id="interestselection_'.$my_id.'" name="interestselection[]" type="checkbox"  value="'.$my_interest .'" style="display:none" checked/>';
        echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
        echo '<img src="../../../images/icon_del.gif" border="0" class="icon_del" />';
        echo '</a></div>';
        echo $my_interest.'</li>';
        
    }else{
        //output error
        
        //header('HTTP/1.1 500 '.mysql_error());
        header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
        exit();
    }
} 
    
}
elseif(isset($_POST["recordToDelete"]) && strlen($_POST["recordToDelete"])>0 && is_numeric($_POST["recordToDelete"]))
{//do we have a delete request? $_POST["recordToDelete"]
    
   

    //sanitize post value, PHP filter FILTER_SANITIZE_NUMBER_INT removes all characters except digits, plus and minus sign.
    $idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);

    $Result = mysqli_query($connecDB,"SELECT * FROM interests WHERE id = '".$idToDelete."'");
    $row = mysqli_fetch_array($Result);

    $keywords = $rowparticipant['Interests'];       // Set String
    $keywords = explode(',', $keywords);    // Explode into array
    unset($keywords[ array_search($row["interest"], $keywords) ]);   // Unset the array element with value of 'libya'
    $keywords = implode(',',$keywords);     // Reconstruct string
    
    //try deleting record using the record ID we received from POST
    if(!mysqli_query($connecDB,"UPDATE tbl_participant SET Interests = '".$keywords."' WHERE userID='".$_SESSION['participantSession']."'"))
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

*/
?>
