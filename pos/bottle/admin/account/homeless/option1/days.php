<?php

session_start();

//include db configuration file
include_once("../../../../../config.php");

//check $_POST["content_txt"] is not empty
if(isset($_POST["days"]) && strlen($_POST["days"])>0)
{

    //sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH
    $contentToSave = filter_var($_POST["days"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


    if($contentToSave == ''){$days = 'NULL';}else{$days = $contentToSave;}


       

        $Day = mysqli_query($connecDB,"SELECT * FROM days WHERE day = '".$contentToSave."'");
        $row = mysqli_fetch_array($Day);
        $my_id = $row['id']; //Get ID of last inserted record from MySQL
        $my_day = $row['day']; //Get ID of last inserted record from MySQL
        

        if($row['day'] == $contentToSave){

        echo '<li id="item_'.$my_id.'">';
        echo '<input id="dayselection_'.$my_id.'" name="dayselection[]" type="checkbox"  value="'.$my_day .'" style="display:none" checked/>';
        echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
        echo '<img src="../../../../../images/icon_del.gif" border="0" class="icon_del" />';
        echo '</a></div>';
        echo $my_day.'</li>';
       
       }

       
}








?>
