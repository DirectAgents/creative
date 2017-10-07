<?php

session_start();

//include db configuration file
include_once("config.php");


	if(isset($_POST["content_book"]) && strlen($_POST["content_book"])>0) {	//check $_POST["content_txt"] is not empty

	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$contentToSave = filter_var($_POST["content_book"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$contentToSave_BookLink = filter_var($_POST["content_book_link"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	
	
	// Insert sanitize string in record
	$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' ORDER BY page_order DESC ");
	$row = mysqli_fetch_array($select_row);

	$page_order = $row['page_order'] + 1; 
	//if(mysqli_num_rows($select_row) == 0) {


	// Insert sanitize string in record

	$insert_row = $mysqli->query("INSERT INTO i_want_to_be_an_entrepreneur(userID,Book,Book_Link,page_order) VALUES('".$_SESSION['userID']."','".$contentToSave."',
		'".$contentToSave_BookLink."','".$page_order."')");

	if($insert_row)
	{

		 //Record was successfully inserted, respond result back to index page
		  $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  echo '<li id="'.$my_id.'">';
		  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
		  echo '<img src="images/icon_del.gif" border="0" />';
		  echo '</a></div>';
		  if(!empty($contentToSave_BookLink)){
		  echo '<a href="'.$contentToSave_BookLink.'" target="_blank">';
		  echo $contentToSave.'</a>';
		  }else{
		  echo $contentToSave;
		  }
		  echo '</li>';
		  $mysqli->close(); //close db connection

	}else{
		
	     //$update_row = $mysqli->query("UPDATE i_want_to_be_an_entrepreneur SET Book = '".$contentToSave."' WHERE userID = '".$_SESSION['userID']."' ");
		 
		 //Record was successfully inserted, respond result back to index page
		  //$my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  //echo '<li id="item_'.$my_id.'">';
		  //echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
		  //echo '<img src="images/icon_del.gif" border="0" />';
		  //echo '</a></div>';
		  //echo $contentToSave.'</li>';
		  //$mysqli->close(); //close db connection

		//header('HTTP/1.1 500 '.mysql_error()); //display sql errors.. must not output sql errors in live mode.
		//header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
		//exit();
	}

}
elseif(isset($_POST["recordToDelete"]) && strlen($_POST["recordToDelete"])>0 && is_numeric($_POST["recordToDelete"]))
{	//do we have a delete request? $_POST["recordToDelete"]

	//sanitize post value, PHP filter FILTER_SANITIZE_NUMBER_INT removes all characters except digits, plus and minus sign.
	$idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT); 
	
	//try deleting record using the record ID we received from POST
	$delete_row = $mysqli->query("DELETE FROM i_want_to_be_an_entrepreneur WHERE id='".$idToDelete."' AND userID = '".$_SESSION['userID']."' ");
	
	if(!$delete_row)
	{    
		//If mysql delete query was unsuccessful, output error 
		//header('HTTP/1.1 500 Could not delete record!');
		//exit();
	}
	$mysqli->close(); //close db connection
}
else
{
	//Output error
	//header('HTTP/1.1 500 Error occurred, Could not process request!');
    //exit();
}







if(isset($_POST["content_meetup"]) && strlen($_POST["content_meetup"])>0) {	//check $_POST["content_txt"] is not empty

	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$contentToSave = filter_var($_POST["content_meetup"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	
	
	// Insert sanitize string in record
	//$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' ");

	
	
	//if(mysqli_num_rows($select_row) == 0) {


	// Insert sanitize string in record

	$insert_row = $mysqli->query("INSERT INTO i_want_to_be_an_entrepreneur(userID,Meetup_Group) VALUES('".$_SESSION['userID']."','".$contentToSave."')");

	if($insert_row)
	{

		 //Record was successfully inserted, respond result back to index page
		  $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  echo '<li id="'.$my_id.'">';
		  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
		  echo '<img src="images/icon_del.gif" border="0" />';
		  echo '</a></div>';
		  echo $contentToSave.'</li>';
		  $mysqli->close(); //close db connection

	}else{
		
	     //$update_row = $mysqli->query("UPDATE i_want_to_be_an_entrepreneur SET Book = '".$contentToSave."' WHERE userID = '".$_SESSION['userID']."' ");
		 

		//header('HTTP/1.1 500 '.mysql_error()); //display sql errors.. must not output sql errors in live mode.
		//header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
		//exit();
	}

}
elseif(isset($_POST["recordToDelete"]) && strlen($_POST["recordToDelete"])>0 && is_numeric($_POST["recordToDelete"]))
{	//do we have a delete request? $_POST["recordToDelete"]

	//sanitize post value, PHP filter FILTER_SANITIZE_NUMBER_INT removes all characters except digits, plus and minus sign.
	$idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT); 
	
	//try deleting record using the record ID we received from POST
	$delete_row = $mysqli->query("DELETE FROM i_want_to_be_an_entrepreneur WHERE id='".$idToDelete."' AND userID = '".$_SESSION['userID']."' ");
	
	if(!$delete_row)
	{    
		//If mysql delete query was unsuccessful, output error 
		//header('HTTP/1.1 500 Could not delete record!');
		//exit();
	}
	$mysqli->close(); //close db connection
}
else
{
	//Output error
	//header('HTTP/1.1 500 Error occurred, Could not process request!');
    //exit();
}





?>