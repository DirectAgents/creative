<?php

session_start();
require_once '../base_path.php';
//include db configuration file
include_once("../config.php");

//check $_POST["content_txt"] is not empty
if(isset($_POST["skills"]) && strlen($_POST["skills"])>0)
{

    //sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH
    $contentToSave = filter_var($_POST["skills"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $skills_level = filter_var($_POST["skills_level"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $userID = filter_var($_POST["userid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


    if($contentToSave == ''){$skills = 'NULL';}else{$skills = $contentToSave;}

       

        $Skill = mysqli_query($connecDB,"SELECT * FROM skills WHERE skill = '".$contentToSave."'");
        $row = mysqli_fetch_array($Skill);
        $my_id = $row['id']; //Get ID of last inserted record from MySQL
        $my_skill = $row['skill']; //Get ID of last inserted record from MySQL
        

        if($row['skill'] == $contentToSave){

        
        echo '<div id="item_'.$my_id.'">';
        echo '<div class="skillsdiv">';
        echo '<input id="skillselection_'.$my_id.'" name="skillselection[]" type="checkbox"  value="'.$my_skill.' ('.$skills_level.'%)" style="display:none" checked/>';
        echo '<input id="skill_level_'.$my_id.'" name="skill_level" type="text"  value="'.$skills_level.'" style="display:none" checked/>';
        echo '<div class="del_wrapper">';
        echo '<div class="the-skill">';
        echo $my_skill.' '.'('.$skills_level.'%)';
        echo '</div>';
        echo '<a href="#" class="del_button" id="del-'.$my_id.'">';
        echo '<img src="'.BASE_PATH.'/images/icon_del.gif" border="0" class="icon_del" />';
        echo '</a></div>';
        echo '</div></div>';
       
       }

       
}


?>
