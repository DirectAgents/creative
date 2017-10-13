<?php

session_start();

//include db configuration file
include_once("config.php");


if(isset($_POST["content_suggestcategory"]) && strlen($_POST["content_suggestcategory"])>0) {	//check $_POST["content_txt"] is not empty

	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$contentToSave = filter_var($_POST["content_suggestcategory"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$contentToSource = filter_var($_POST["content_suggestcategory_source"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

	
	// Insert sanitize string in record
	$select_row = $mysqli->query("SELECT * FROM suggested_categories WHERE userID = '".$_SESSION['userID']."' ORDER BY id DESC ");
	$row = mysqli_fetch_array($select_row);

	
	//if(mysqli_num_rows($select_row) == 0) {


	// Insert sanitize string in record

	date_default_timezone_set('America/New_York');
	$the_date = date('Y-m-d'); 
	$the_time = date('h:i:s A');

	$insert_row = $mysqli->query("INSERT INTO suggested_categories(userID,Name,Search_Term,Date,Time) VALUES('".$_SESSION['userID']."','".$contentToSave."',
		'".$contentToSource."','".$the_date."', '".$the_time."')");

	if($insert_row)
	{

		 //Record was successfully inserted, respond result back to index page
		  $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  echo '<li id="'.$my_id.'">';
		  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
		  echo '<img src="images/icon_del.gif" border="0" />';
		  echo '</a></div>';
		 
		 
		  echo $contentToSave;
		  
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
	$delete_row = $mysqli->query("DELETE FROM suggested_categories WHERE id='".$idToDelete."' AND userID = '".$_SESSION['userID']."' ");
	
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



if(isset($_POST["content_book"]) && strlen($_POST["content_book"])>0) {	//check $_POST["content_txt"] is not empty

	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$contentToSave = filter_var($_POST["content_book"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$contentToSave_Link = filter_var($_POST["content_book_link"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	

	if(!empty($contentToSave_Link)){	
if (false === strpos($contentToSave_Link, '://')) {
    $contentToSave_Link = 'http://' . $contentToSave_Link;
}
}
	
	// Insert sanitize string in record
	$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Book != '' ORDER BY page_order DESC ");
	$row = mysqli_fetch_array($select_row);

	$page_order = $row['page_order'] + 1; 
	//if(mysqli_num_rows($select_row) == 0) {


	// Insert sanitize string in record

	$insert_row = $mysqli->query("INSERT INTO i_want_to_be_an_entrepreneur(userID,Book,Book_Link,page_order) VALUES('".$_SESSION['userID']."','".$contentToSave."',
		'".$contentToSave_Link."','".$page_order."')");

	if($insert_row)
	{

		 //Record was successfully inserted, respond result back to index page
		  $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  echo '<li id="'.$my_id.'">';
		  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
		  echo '<img src="images/icon_del.gif" border="0" />';
		  echo '</a></div>';
		  if(!empty($contentToSave_Link)){
		  echo '<a href="'.$contentToSave_Link.'" target="_blank">';
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
	$contentToSave_Link = filter_var($_POST["content_meetup_link"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	

if(!empty($contentToSave_Link)){	
if (false === strpos($contentToSave_Link, '://')) {
    $contentToSave_Link = 'http://' . $contentToSave_Link;
}
}
	
	// Insert sanitize string in record
	//$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' ");

	// Insert sanitize string in record
	$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order DESC ");
	$row = mysqli_fetch_array($select_row);

	$page_order = $row['page_order'] + 1; 
	
	
	//if(mysqli_num_rows($select_row) == 0) {


	// Insert sanitize string in record

	$insert_row = $mysqli->query("INSERT INTO i_want_to_be_an_entrepreneur(userID,Meetup_Group,Meetup_Group_Link,page_order) VALUES('".$_SESSION['userID']."','".$contentToSave."', '".$contentToSave_Link."','".$page_order."')");


	if($insert_row)
	{

		 //Record was successfully inserted, respond result back to index page
		  $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  echo '<li id="'.$my_id.'">';
		  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
		  echo '<img src="images/icon_del.gif" border="0" />';
		  echo '</a></div>';
		  if(!empty($contentToSave_Link)){
		  echo '<a href="'.$contentToSave_Link.'" target="_blank">';
		  echo $contentToSave.'</a>';
		  }else{
		  echo $contentToSave;
		  }
		  echo '</li>';
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









if(isset($_POST["content_startuplawyers"]) && strlen($_POST["content_startuplawyers"])>0) {	//check $_POST["content_txt"] is not empty

	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$contentToSave = filter_var($_POST["content_startuplawyers"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$contentToSave_Link = filter_var($_POST["content_startuplawyers_link"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	

	if(!empty($contentToSave_Link)){	
		if (false === strpos($contentToSave_Link, '://')) {
    $contentToSave_Link = 'http://' . $contentToSave_Link;
		}
	}
	
	
	// Insert sanitize string in record
	//$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' ");

	// Insert sanitize string in record
	$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Startuplawyers != '' ORDER BY page_order DESC ");
	$row = mysqli_fetch_array($select_row);

	$page_order = $row['page_order'] + 1; 
	
	
	//if(mysqli_num_rows($select_row) == 0) {


	// Insert sanitize string in record

	$insert_row = $mysqli->query("INSERT INTO i_want_to_be_an_entrepreneur(userID,Startuplawyers,Startuplawyers_Link,page_order) VALUES('".$_SESSION['userID']."','".$contentToSave."', '".mysql_real_escape_string($contentToSave_Link)."','".$page_order."')");


	if($insert_row)
	{

		 //Record was successfully inserted, respond result back to index page
		  $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  echo '<li id="'.$my_id.'">';
		  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
		  echo '<img src="images/icon_del.gif" border="0" />';
		  echo '</a></div>';
		  if(!empty($contentToSave_Link)){
		  echo '<a href="'.$contentToSave_Link.'" target="_blank">';
		  echo $contentToSave.'</a>';
		  }else{
		  echo $contentToSave;
		  }
		  echo '</li>';
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




if(isset($_POST["content_bootstrap"]) && strlen($_POST["content_bootstrap"])>0) {	//check $_POST["content_txt"] is not empty

	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$contentToSave = filter_var($_POST["content_bootstrap"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$contentToSave_Link = filter_var($_POST["content_bootstrap_link"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	
	
	if(!empty($contentToSave_Link)){	
		if (false === strpos($contentToSave_Link, '://')) {
    $contentToSave_Link = 'http://' . $contentToSave_Link;
		}
	}
	
	
	// Insert sanitize string in record
	//$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' ");

	// Insert sanitize string in record
	$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Bootstrap != '' ORDER BY page_order DESC ");
	$row = mysqli_fetch_array($select_row);

	$page_order = $row['page_order'] + 1; 
	
	
	//if(mysqli_num_rows($select_row) == 0) {


	// Insert sanitize string in record

	$insert_row = $mysqli->query("INSERT INTO i_want_to_be_an_entrepreneur(userID,Bootstrap,Bootstrap_Link,page_order) VALUES('".$_SESSION['userID']."','".$contentToSave."', '".mysql_real_escape_string($contentToSave_Link)."','".$page_order."')");


	if($insert_row)
	{

		 //Record was successfully inserted, respond result back to index page
		  $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  echo '<li id="'.$my_id.'">';
		  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
		  echo '<img src="images/icon_del.gif" border="0" />';
		  echo '</a></div>';
		  if(!empty($contentToSave_Link)){
		  echo '<a href="'.$contentToSave_Link.'" target="_blank">';
		  echo $contentToSave.'</a>';
		  }else{
		  echo $contentToSave;
		  }
		  echo '</li>';
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





if(isset($_POST["content_events"]) && strlen($_POST["content_events"])>0) {	//check $_POST["content_txt"] is not empty

	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$contentToSave = filter_var($_POST["content_events"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$contentToSave_Link = filter_var($_POST["content_events_link"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	
	
	if(!empty($contentToSave_Link)){	
		if (false === strpos($contentToSave_Link, '://')) {
    $contentToSave_Link = 'http://' . $contentToSave_Link;
		}
	}
	
	
	// Insert sanitize string in record
	//$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' ");

	// Insert sanitize string in record
	$select_row = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Events != '' ORDER BY page_order DESC ");
	$row = mysqli_fetch_array($select_row);

	$page_order = $row['page_order'] + 1; 
	
	
	//if(mysqli_num_rows($select_row) == 0) {


	// Insert sanitize string in record

	$insert_row = $mysqli->query("INSERT INTO i_want_to_be_an_entrepreneur(userID,Events,Events_Link,page_order) VALUES('".$_SESSION['userID']."','".$contentToSave."', '".mysql_real_escape_string($contentToSave_Link)."','".$page_order."')");


	if($insert_row)
	{

		 //Record was successfully inserted, respond result back to index page
		  $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  echo '<li id="'.$my_id.'">';
		  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
		  echo '<img src="images/icon_del.gif" border="0" />';
		  echo '</a></div>';
		  if(!empty($contentToSave_Link)){
		  echo '<a href="'.$contentToSave_Link.'" target="_blank">';
		  echo $contentToSave.'</a>';
		  }else{
		  echo $contentToSave;
		  }
		  echo '</li>';
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