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
	$("#SubmitSuggestCategory").click(function (e) {
			e.preventDefault();
			if($("#contentSuggestcategory").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
			
			$("#SubmitSuggestCategory").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
		 	var myData = 'content_suggestcategory='+ $("#contentSuggestcategory").val()+'&content_suggestcategory_source='+ $("#content_suggestcategory_source").val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#respondssuggestcategory").append(response);
				$("#contentSuggestcategory").val(''); //empty text field on successful
				//$("#contentBookLink").val(''); //empty text field on successful
				$("#SubmitBook").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#SubmitSuggestCategory").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

	//##### Send delete Ajax request to response.php #########
	$("body").on("click", "#respondssuggestcategory .del_button", function(e) {
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



	//##### send add record Ajax request to response.php #########
	$("#SubmitBootstrap").click(function (e) {
			e.preventDefault();
			if($("#contentBootstrap").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
			
			$("#SubmitBootstrap").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
		 	var myData = 'content_bootstrap='+ $("#contentBootstrap").val()+'&content_bootstrap_link='+ $("#contentBootstrapLink").val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#respondsbootstrap").append(response);
				$("#contentBootstrap").val(''); //empty text field on successful
				$("#contentBootstrapLink").val(''); //empty text field on successful
				$("#SubmitBootstrap").show(); //show submit button
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
	$("body").on("click", "#respondsbootstrap .del_button", function(e) {
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
	$("#SubmitEvents").click(function (e) {
			e.preventDefault();
			if($("#contentEvents").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
			
			$("#SubmitEvents").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
		 	var myData = 'content_events='+ $("#contentEvents").val()+'&content_events_link='+ $("#contentEventsLink").val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#respondsevents").append(response);
				$("#contentEvents").val(''); //empty text field on successful
				$("#contentEventsLink").val(''); //empty text field on successful
				$("#SubmitEvents").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#SubmitEvents").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

	//##### Send delete Ajax request to response.php #########
	$("body").on("click", "#respondsevents .del_button", function(e) {
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



$(".books").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#books").removeClass("hide"); });
$(".meetupgroups").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#meetupgroups").removeClass("hide");});	
$(".startuplawyers").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#startuplawyers").removeClass("hide");});	
$(".bootstrap").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#bootstrap").removeClass("hide");});	
$(".wisetips").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#wisetips").removeClass("hide");});	
$(".onlinecourses").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#onlinecourses").removeClass("hide");});	
$(".offlinecourses").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#offlinecourses").removeClass("hide");});	
$(".youtube_entrepreneurs").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#youtube_entrepreneurs").removeClass("hide");});	
$(".apps").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#apps").removeClass("hide");});	
$(".accelerators").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#accelerators").removeClass("hide");});	
$(".incubators").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#incubators").removeClass("hide");});	
$(".chromeextension").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#chromeextension").removeClass("hide");});	
$(".events").click(function (e) { e.preventDefault(); $(".box").addClass("hide"); $("#events").removeClass("hide");});	




});
</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="content_wrapper">

 <h2>Login</h2>

<div class="note">
Whether you are an entrepreneur or want to be one, this will be the right place for you to get all the help and recommendations you need to stay up-to-date and to be successful as an entrepreneur.
</div>

<div class="note">
Provide and Receive recommendations to and from your fellow members.
</div>


<div class="note">I am a <input type="text" name="content_events" id="contentEvents" placeholder="ex. Bookkeeper, Entrepreneur"/>

<input type="submit" value="Sign up"/>

</div>


Sign up then show google login, facebook and linkedin sign up option


<div class="outter-box">




<div class="box hide" id="events">

 <div class="form_style">
    <h3>Recommended <span class="blue">Events</span></h3>
    
 <div class="col">   
    <div class="col_left">
   <input type="text" name="content_events" id="contentEvents" placeholder="Name"/>
	</div>

	 <div class="col_right">
    <input type="text" name="content_events_link" id="contentEventsLink" placeholder="URL"/>
    </div>
 
    

    <button id="SubmitEvents" class="btn">+</button>
    <img src="images/loading.gif" id="LoadingImage" style="display:none" />

	</div>

</div>



<ul id="respondsevents" class="the-list">
<?php
//include db configuration file
//include_once("config.php");

//MySQL query
$results_meetupgroup = $mysqli->query("SELECT * FROM i_want_to_be_an_entrepreneur WHERE userID = '".$_SESSION['userID']."' AND Events != '' ORDER BY page_order ASC");
//get all records from add_delete_record table

if(mysqli_num_rows($results_meetupgroup) != 0) {

while($row = $results_meetupgroup->fetch_assoc())
{
 

  echo '<li id="'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  if(!empty($row["Events_Link"])){
  echo '<a href="'.$row["Events_Link"].'" target="_blank">';
  echo $row["Events"].'</a>';
  }else{
  echo $row["Events"];
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
