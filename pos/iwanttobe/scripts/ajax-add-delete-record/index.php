<?php

session_start();

$_SESSION['userID'] = 1;

//echo $_SESSION['userID'];

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






 $( ".the-list" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('.the-list li').each(function(){
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
			
		 	var myData = 'content_book='+ $("#contentBook").val()+'&content_book_link='+ $("#contentBookLink").val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#respondsbook").append(response);
				$("#contentBook").val(''); //empty text field on successful
				$("#contentBookLink").val(''); //empty text field on successful
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
			
		 	var myData = 'content_meetup='+ $("#contentMeetup").val()+'&content_meetup_link='+ $("#contentMeetupLink").val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#respondsmeetup").append(response);
				$("#contentMeetup").val(''); //empty text field on successful
				$("#contentMeetupLink").val(''); //empty text field on successful
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
	$("#SubmitStartuplawyers").click(function (e) {
			e.preventDefault();
			if($("#contentStartuplawyers").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
			
			$("#SubmitStartuplawyers").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
		 	var myData = 'content_startuplawyers='+ $("#contentStartuplawyers").val()+'&content_startuplawyers_link='+ $("#contentStartuplawyersLink").val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#respondsstartuplawyers").append(response);
				$("#contentStartuplawyers").val(''); //empty text field on successful
				$("#contentStartuplawyersLink").val(''); //empty text field on successful
				$("#SubmitStartuplawyers").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#SubmitStartuplawyers").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

	//##### Send delete Ajax request to response.php #########
	$("body").on("click", "#respondsstartuplawyers .del_button", function(e) {
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



$(".books").click(function (e) { $(".box").addClass("hide"); $("#books").removeClass("hide"); });
$(".meetupgroups").click(function (e) { $(".box").addClass("hide"); $("#meetupgroups").removeClass("hide");});	
$(".startuplawyers").click(function (e) { $(".box").addClass("hide"); $("#startuplawyers").removeClass("hide");});	
$(".bootstrap").click(function (e) { $(".box").addClass("hide"); $("#bootstrap").removeClass("hide");});	
$(".wisetips").click(function (e) { $(".box").addClass("hide"); $("#wisetips").removeClass("hide");});	
$(".onlinecourses").click(function (e) { $(".box").addClass("hide"); $("#onlinecourses").removeClass("hide");});	
$(".offlinecourses").click(function (e) { $(".box").addClass("hide"); $("#offlinecourses").removeClass("hide");});	
$(".youtube_entrepreneurs").click(function (e) { $(".box").addClass("hide"); $("#youtube_entrepreneurs").removeClass("hide");});	
$(".apps").click(function (e) { $(".box").addClass("hide"); $("#apps").removeClass("hide");});	
$(".accelerators").click(function (e) { $(".box").addClass("hide"); $("#accelerators").removeClass("hide");});	
$(".incubators").click(function (e) { $(".box").addClass("hide"); $("#incubators").removeClass("hide");});	
$(".chromeextension").click(function (e) { $(".box").addClass("hide"); $("#chromeextension").removeClass("hide");});	




});
</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="content_wrapper">

 <h2>Things you recommend to someone who wants to be an <strong>Entrepreneur</strong></h2>

<div class="note">Note.: The one at the top is your #1 favorite. Enter each based in order of your own recommendation</div>

<div class="tags"><a href="#" class="books">Books</a></div>
<div class="tags"><a href="#" class="meetupgroups">Meetup Groups</a></div>
<div class="tags"><a href="#" class="startuplawyers">Startup Lawyers</a></div>
<div class="tags"><a href="#" class="bootstrap">Top 5 tips on how to Bootstrap</a></div>
<div class="tags"><a href="#" class="wisetips">Wise Tips to become an entrepreneur</a></div>
<div class="tags"><a href="#" class="onlinecourses">Online Courses</a></div>
<div class="tags"><a href="#" class="offlinecourses">Offline Courses</a></div>
<div class="tags"><a href="#" class="youtube_entrepreneurs">Entrepreneurs to follow on YouTube</a></div>
<div class="tags"><a href="#" class="apps">Apps for aspiring Entrepreneurs</a></div>
<div class="tags"><a href="#" class="accelerators">Accelerators</a></div>
<div class="tags"><a href="#" class="incubators">Incubators</a></div>
<div class="tags"><a href="#" class="chromeextension">Chrome Extensions</a></div>


<div class="outter-box">

<div class="box hide" id="books">

 <div class="form_style">
    <h3>Recommended <span class="blue">Books</span></h3>
     <div class="col">  
    <div class="col_left">
    <input type="text" name="content_book" id="contentBook" placeholder="Enter name of Book"/>
    </div>

    <div class="col_right">
    <input type="text" name="content_book_link" id="contentBookLink" placeholder="Link to the Book (optional)"/>
    </div>
    

    <button id="SubmitBook" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />


	</div>

</div>


<ul id="respondsbook" class="the-list">
<?php
//include db configuration file
include_once("config.php");

//MySQL query
$results_book = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Book != '' ORDER BY page_order ASC ");
//get all records from add_delete_record table


while($row = $results_book->fetch_assoc())
{


  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Book_Link"])){
  echo '<a href="'.$row["Book_Link"].'" target="_blank">';
  echo $row["Book"].'</a>';
  }else{
  echo $row["Book"];
  }
  echo '</li>';
		  
}


//close db connection
//$mysqli->close();
?>
</ul>

</div>




<div class="box hide" id="meetupgroups">

 <div class="form_style">
    <h3>Recommended <a href="https://www.meetup.com/" target="_blank">Meetup.com</a> Groups</h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_meetup" id="contentMeetup" placeholder="Name"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_meetup_link" id="contentMeetupLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitMeetup" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>




<ul id="respondsmeetup" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Meetup_Group_Link"])){
  echo '<a href="'.$row["Meetup_Group_Link"].'" target="_blank">';
  echo $row["Meetup_Group"].'</a>';
  }else{
  echo $row["Meetup_Group"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>






<div class="box hide" id="startuplawyers">

 <div class="form_style">
    <h3>Recommended <span class="blue">Startup Lawyers</span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_startuplawyers" id="contentStartuplawyers" placeholder="Name"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_startuplawyers_link" id="contentStartuplawyersLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitStartuplawyers" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>



<ul id="respondsstartuplawyers" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Startuplawyers != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Startuplawyers_Link"])){
  echo '<a href="'.$row["Startuplawyers_Link"].'" target="_blank">';
  echo $row["Startuplawyers"].'</a>';
  }else{
  echo $row["Startuplawyers"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>

</div>


<div class="outter-box">

<div class="box hide" id="bootstrap">

 <div class="form_style">
    <h3>Top 5 tips on how to <span class="blue">Bootstrap</span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_meetup" id="contentMeetup" placeholder="Enter here"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_meetup_link" id="contentMeetupLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitMeetup" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>




<ul id="respondsmeetup" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Meetup_Group_Link"])){
  echo '<a href="'.$row["Meetup_Group_Link"].'" target="_blank">';
  echo $row["Meetup_Group"].'</a>';
  }else{
  echo $row["Meetup_Group"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>





<div class="box hide" id="wisetips">

 <div class="form_style">
    <h3>Wise Tips <span class="blue">to become an entrepreneur</span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_meetup" id="contentMeetup" placeholder="ex. Never Give Up!" />
	</div>

	
 
    

    <button id="SubmitMeetup" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>



<ul id="respondsmeetup" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Meetup_Group_Link"])){
  echo '<a href="'.$row["Meetup_Group_Link"].'" target="_blank">';
  echo $row["Meetup_Group"].'</a>';
  }else{
  echo $row["Meetup_Group"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>




<div class="box hide" id="onlinecourses">

 <div class="form_style">
    <h3>Recommended <span class="blue">Online Courses</span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_meetup" id="contentMeetup" placeholder="Name"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_meetup_link" id="contentMeetupLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitMeetup" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>



<ul id="respondsmeetup" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Meetup_Group_Link"])){
  echo '<a href="'.$row["Meetup_Group_Link"].'" target="_blank">';
  echo $row["Meetup_Group"].'</a>';
  }else{
  echo $row["Meetup_Group"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>

</div>


<div class="outter-box">

<div class="box hide" id="offlinecourses">

 <div class="form_style">
    <h3>Recommended <span class="blue">Offline Courses</span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_meetup" id="contentMeetup" placeholder="Name"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_meetup_link" id="contentMeetupLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitMeetup" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>



<ul id="respondsmeetup" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Meetup_Group_Link"])){
  echo '<a href="'.$row["Meetup_Group_Link"].'" target="_blank">';
  echo $row["Meetup_Group"].'</a>';
  }else{
  echo $row["Meetup_Group"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>




<div class="box hide" id="youtube_entrepreneurs">

 <div class="form_style">
    <h3>Recommended <span class="blue">Entrepreneurs to follow on <a href="https://www.youtube.com/" target="_blank">YouTube</a></span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_meetup" id="contentMeetup" placeholder="Name"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_meetup_link" id="contentMeetupLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitMeetup" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>



<ul id="respondsmeetup" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Meetup_Group_Link"])){
  echo '<a href="'.$row["Meetup_Group_Link"].'" target="_blank">';
  echo $row["Meetup_Group"].'</a>';
  }else{
  echo $row["Meetup_Group"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>




<div class="box hide" id="apps">

 <div class="form_style">
    <h3>Recommended <span class="blue">Apps for aspiring Entrepreneurs</span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_meetup" id="contentMeetup" placeholder="Name"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_meetup_link" id="contentMeetupLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitMeetup" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>



<ul id="respondsmeetup" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Meetup_Group_Link"])){
  echo '<a href="'.$row["Meetup_Group_Link"].'" target="_blank">';
  echo $row["Meetup_Group"].'</a>';
  }else{
  echo $row["Meetup_Group"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>




<div class="box hide" id="accelerators">

 <div class="form_style">
    <h3>Recommended <span class="blue">Accelerator Programs</span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_meetup" id="contentMeetup" placeholder="Name"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_meetup_link" id="contentMeetupLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitMeetup" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>



<ul id="respondsmeetup" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Meetup_Group_Link"])){
  echo '<a href="'.$row["Meetup_Group_Link"].'" target="_blank">';
  echo $row["Meetup_Group"].'</a>';
  }else{
  echo $row["Meetup_Group"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>



<div class="box hide" id="incubators">

 <div class="form_style">
    <h3>Recommended <span class="blue">Incubator Programs</span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_meetup" id="contentMeetup" placeholder="Name"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_meetup_link" id="contentMeetupLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitMeetup" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>



<ul id="respondsmeetup" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Meetup_Group_Link"])){
  echo '<a href="'.$row["Meetup_Group_Link"].'" target="_blank">';
  echo $row["Meetup_Group"].'</a>';
  }else{
  echo $row["Meetup_Group"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>



<div class="box hide" id="chromeextension">

 <div class="form_style">
    <h3>Recommended <span class="blue">Chrome Extensions</span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_meetup" id="contentMeetup" placeholder="Name"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_meetup_link" id="contentMeetupLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitMeetup" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>



<ul id="respondsmeetup" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Meetup_Group != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Meetup_Group_Link"])){
  echo '<a href="'.$row["Meetup_Group_Link"].'" target="_blank">';
  echo $row["Meetup_Group"].'</a>';
  }else{
  echo $row["Meetup_Group"];
  }
  echo '</li>';
}
}

//close db connection
//$mysqli->close();
?>
</ul>

</div>




</div>
  

</div>

</body>
</html>
