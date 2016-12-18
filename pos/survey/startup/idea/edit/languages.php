<?php

session_start();

//include db configuration file
include_once("../../../config.php");

//check $_POST["content_txt"] is not empty
if(isset($_POST["languages"]) && strlen($_POST["languages"])>0)
{

    //sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH
    $contentToSave = filter_var($_POST["languages"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $projectID = filter_var($_POST["projectid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $userID = filter_var($_POST["userid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


    if($contentToSave == ''){$languages = 'NULL';}else{$languages = $contentToSave;}


       

        $Language = mysqli_query($connecDB,"SELECT * FROM languages WHERE language = '".$contentToSave."'");
        $row = mysqli_fetch_array($Language);
        $my_id = $row['id']; //Get ID of last inserted record from MySQL
        $my_language = $row['language']; //Get ID of last inserted record from MySQL
        

        if($row['language'] == $contentToSave){

        echo '<li id="item_'.$my_id.'">';
        echo '<input id="languageselection_'.$my_id.'" name="languageselection[]" type="checkbox"  value="'.$my_language .'" style="display:none" checked/>';
        echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
        echo '<img src="../../../images/icon_del.gif" border="0" class="icon_del" />';
        echo '</a></div>';
        echo $my_language.'</li>';
       
       }

       
}








?>
