<?php
session_start();
include_once("config.php");
include("config.inc.php");

?>


<!DOCTYPE html>


<html lang="en">
  <head>

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



  <script type="text/javascript">
$(document).ready(function() {



  $("#interests").blur(function (e) {
       e.preventDefault();
     if($("#interests").val()==='')
      {
        //alert("Please enter a job position!");
        return false;
      }
      var myData = 'interests='+ $("#interests").val()+'&projectid='+ $("#projectid").val()+'&userid='+ $("#userid").val(); 
      //alert(myData);
      jQuery.ajax({
      type: "POST", 
      url: "interests.php", 
      dataType:"text", 
      data:myData,
      success:function(response){
        $("#responds").append(response);
        $("#interests").val('');
        //$('#interestimportant').prop('checked', true); // checks it
       
      },
      error:function (xhr, ajaxOptions, thrownError){
        alert(thrownError);
      }
      });
  });

  $("body").on("click", "#responds .del_button", function(e) {
     e.preventDefault();
     var clickedID = this.id.split('-'); 
     //var DbNumberID =   $('input[name="interestselection[]"]:checked').map(function () {return this.value;}).get().join(",");
     var DbNumberID = clickedID[1]; 
     var myData = 'recordToDelete='+ DbNumberID +'&projectid='+ $("#projectid").val(); 
     
     //alert(DbNumberID);


      jQuery.ajax({
      type: "POST", 
      url: "interests.php", 
      dataType:"text", 
      data:myData, 
      success:function(response){
        $("#responds").append(response);
        $('#interestselection_'+DbNumberID).prop('checked', false); // Unchecks it
        
        $('#item_'+DbNumberID).fadeOut("slow");

        
        //alert(response);
      
      },
      error:function (xhr, ajaxOptions, thrownError){
        
        alert(thrownError);
      }
      });
  });

 $(function() {
    $( "#interests" ).autocomplete({
      source: 'search-interest.php'
    });
  });


});
</script>




  </head>

  <body>

<input class="form-control"  name="interests" id="interests" type="text" placeholder="Enter here the interest (e.g Social Media)"/>



<ul id="responds">
<?php
//include db configuration file



echo '<input type="hidden" name="userid" id="userid" value="1">';


//MySQL query
$Result = mysqli_query($connecDB,"SELECT * FROM profile ");


//get all records from add_delete_record table
$row2 = mysqli_fetch_array($Result);




$ctop = $row2['Skills']; 
$ctop = explode(',',$ctop); 



if($row2['Skills'] != '' && $row2['Skills'] != 'NULL' ){



foreach($ctop as $interest)  
{ 
    //Uncomment the last commented line if single quotes are showing up  
    //otherwise delete these 3 commented lines 
    

//MySQL query
$sqlinterest = mysqli_query($connecDB,"SELECT * FROM interests WHERE interest = '".$interest."' ");
$row3 = mysqli_fetch_array($sqlinterest);


echo '<li id="item_'.$row3['id'].'">';
if(in_array($interest,$ctop)){
echo '<input id="interestselection_'.$row3['id'].'" name="interestselection[]" type="checkbox"  value="'.$interest.'" style="display:none" checked/>';
}
echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row3['id'].'">';
echo $interest;
echo '<img src="../../../images/icon_del.gif" border="0" class="icon_del" />';
echo '</a></div>';
//echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
echo '</li>';

} 



}





?>
</ul>

</body>
</html>