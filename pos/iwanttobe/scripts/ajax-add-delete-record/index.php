<?php

session_start();

$_SESSION['userID'] = 1;

echo $_SESSION['userID'];

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Add/Delete a Record with jQuery Fade In/Fade Out</title>



<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
 $( "#respondsbook" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#respondsbook li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
     //alert(data);
    }
   });
  }
 });

});
</script>




<script type="text/javascript">
$(document).ready(function() {

	//##### send add record Ajax request to response.php #########
	$("#SubmitBook").click(function (e) {
			e.preventDefault();
			if($("#contentBook").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
			
			$("#SubmitBook").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
		 	var myData = 'content_book='+ $("#contentBook").val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#respondsbook").append(response);
				$("#contentBook").val(''); //empty text field on successful
				$("#SubmitBook").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#SubmitBook").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

	//##### Send delete Ajax request to response.php #########
	$("body").on("click", "#respondsbook .del_button", function(e) {
		 e.preventDefault();
		 var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
		 var DbNumberID = clickedID[1]; //and get number from array
		 //alert(DbNumberID);
		 var myData = 'recordToDelete='+ DbNumberID; //build a post data structure
		 
		$("#"+DbNumberID).addClass( "sel" ); //change background of this element by adding class
		$("#"+DbNumberID).hide(); //hide currently clicked delete button
		 
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				//on success, hide  element user wants to delete.
				$(DbNumberID).fadeOut();
			},
			error:function (xhr, ajaxOptions, thrownError){
				//On error, we alert user
				alert(thrownError);
			}
			});
	});





	//##### send add record Ajax request to response.php #########
	$("#SubmitMeetup").click(function (e) {
			e.preventDefault();
			if($("#contentMeetup").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
			
			$("#SubmitMeetup").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
		 	var myData = 'content_meetup='+ $("#contentMeetup").val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#respondsmeetup").append(response);
				$("#contentMeetup").val(''); //empty text field on successful
				$("#SubmitMeetup").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#SubmitMeetup").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

	//##### Send delete Ajax request to response.php #########
	$("body").on("click", "#respondsmeetup .del_button", function(e) {
		 e.preventDefault();
		 var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
		 var DbNumberID = clickedID[1]; //and get number from array
		 var myData = 'recordToDelete='+ DbNumberID; //build a post data structure
		 
		$(DbNumberID).addClass( "sel" ); //change background of this element by adding class
		$(this).hide(); //hide currently clicked delete button
		 
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				//on success, hide  element user wants to delete.
				$(DbNumberID).fadeOut();
			},
			error:function (xhr, ajaxOptions, thrownError){
				//On error, we alert user
				alert(thrownError);
			}
			});
	});

});
</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="content_wrapper">
<ul id="respondsbook">
<?php
//include db configuration file
include_once("config.php");

//MySQL query
$results_book = $mysqli->query("SELECT id,Book FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Book != '' ORDER BY page_order ASC ");
//get all records from add_delete_record table


while($row = $results_book->fetch_assoc())
{


  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  echo $row["Book"].'</li>';
}


//close db connection
//$mysqli->close();
?>
</ul>

<input type="hidden" name="page_order_list" id="page_order_list" />

    <div class="form_style">
    <h3>Your Favorite Books</h3>
    <div class="col_left">
    <input type="text" name="content_book" id="contentBook" placeholder="Enter name of Book"/>
    </div>

    <div class="col_right">
    <input type="text" name="content_book" id="contentBook" placeholder="Link to the Book (optional)"/>
    </div>
    

    <button id="SubmitBook">Add Your Favorite Books</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

    </div>


<ul id="respondsmeetup">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT id,Meetup_Group FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != ''");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  echo $row["Meetup_Group"].'</li>';
}
}

//close db connection
$mysqli->close();
?>
</ul>
    <div class="form_style">
    <input type="text" name="content_meetup" id="contentMeetup" placeholder="Enter name of Meetup Group"/>
    <button id="SubmitMeetup">Add Your Favorite Meetup Groups</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />
    </div>


</div>

</body>
</html>
