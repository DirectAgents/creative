<?php

//include db configuration file
include_once("../../config.php");

//check $_POST["content_txt"] is not empty
if(isset($_POST["interests"]) && strlen($_POST["interests"])>0)
{

    //sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH
    $contentToSave = filter_var($_POST["interests"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $projectID = filter_var($_POST["projectid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $userID = filter_var($_POST["userid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    
    // Insert sanitize string in record
    if(mysql_query("INSERT INTO tbl_startup_interests(userID, ProjectID, Interests) VALUES('".$userID."','".$projectID."','".$contentToSave."')"))
    {
        //Record is successfully inserted, respond to ajax request
        $my_id = mysql_insert_id(); //Get ID of last inserted record from MySQL
        echo '<li id="item_'.$my_id.'">';
        echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
        echo '<img src="../../../images/icon_del.gif" border="0" class="icon_del" />';
        echo '</a></div>';
        echo $contentToSave.'</li>';
        mysql_close($connecDB);
        
    }else{
        //output error
        
        //header('HTTP/1.1 500 '.mysql_error());
        header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
        exit();
    }
    
}
elseif(isset($_POST["recordToDelete"]) && strlen($_POST["recordToDelete"])>0 && is_numeric($_POST["recordToDelete"]))
{//do we have a delete request? $_POST["recordToDelete"]
    
    //sanitize post value, PHP filter FILTER_SANITIZE_NUMBER_INT removes all characters except digits, plus and minus sign.
    $idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);
    
    //try deleting record using the record ID we received from POST
    if(!mysql_query("DELETE FROM tbl_startup_interests WHERE id=".$idToDelete))
    {
        //If mysql delete record was unsuccessful, output error
        header('HTTP/1.1 500 Could not delete record!');
        exit();
    }
    mysql_close($connecDB);
    
}else{

    //Output error
    header('HTTP/1.1 500 Error occurred, Could not process request!');
    exit();
}
?>
