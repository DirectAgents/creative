<?php

session_start();

//include db configuration file
include_once("../../../config.php");

//check $_POST["content_txt"] is not empty
if(isset($_POST["interests"]) && strlen($_POST["interests"])>0)
{

    //sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH
    $contentToSave = filter_var($_POST["interests"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $projectID = filter_var($_POST["projectid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $userID = filter_var($_POST["userid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


    if($contentToSave == ''){$interests = 'NULL';}else{$interests = $contentToSave;}


       

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
       
       }

       
}








?>
