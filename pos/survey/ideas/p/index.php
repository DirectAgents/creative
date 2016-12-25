<?php
session_start();

if(!empty($test)){
include_once("../../config.php");
}else{
include_once("../config.php");
}


if($_SESSION['startupSession'] != ''){



if(!empty($test)){
require_once '../../class.startup.php';
}else{
require_once '../class.startup.php';
}


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('login.php');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

}

if(!empty($_GET["cat"])){

$Project = mysql_query("SELECT * FROM tbl_startup_project WHERE Category='".$_GET['cat']."'");
$rowproject = mysql_fetch_array($Project);

}else{

$Project = mysql_query("SELECT * FROM tbl_startup_project");
$rowproject = mysql_fetch_array($Project);
}


$meetupchoice=explode(',',$rowproject['Meetupchoice']);
$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$minheight=explode(',',$rowproject['MinHeight']);
$maxheight=explode(',',$rowproject['MaxHeight']);
$location=explode(',',$rowproject['Location']);
$status=explode(',',$rowproject['Status']);
$ethnicity=explode(',',$rowproject['Ethnicity']);
$smoke=explode(',',$rowproject['Smoke']);
$drink=explode(',',$rowproject['Drink']);
$diet=explode(',',$rowproject['Diet']);
$religion=explode(',',$rowproject['Religion']);
$education=explode(',',$rowproject['Education']);
$job=explode(',',$rowproject['Job']);






?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo $row['userEmail']; ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="<?php echo BASE_PATH; ?>/css/font-awesome.css" rel="stylesheet" media="screen">




<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">






<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--JAVASCRIPT-->

 <!-- jQuery Popup Overlay -->
<script src="<?php echo BASE_PATH; ?>/startup/project/js/jquery.popupoverlay.js"></script>

<script>

/**Create Project**/

$(document).ready(function(){

 $(".go").click(function() {  
//alert("aads"); 

 //get input field values
        
        var projectname = $('input[name=projectname').val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

          if(projectname==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:95.5%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter a name for your Project!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }
      
      
         

        //everything looks good! proceed...
        if(proceed) 
        {


          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectname':projectname};
            
            //Ajax post data to server
            $.post('projectcreate.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            //alert(text);
                
            window.location.href = "create/step1.php?id="+response.text;
            //output = '<div class="success">'+response.text+'</div>';

          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }

});


 

});

</script>
   

        
    </head>
    
    <body>

<!--TopNav-->
        <?php 

if($_SESSION['startupSession'] != ''){

  if(!empty($test)){
        include("../../startup/nav.php"); 
    }else{
      include("../startup/nav.php"); 
    }
  }

        ?>

<!--TopNav-->


  
        


    <!-- Main -->












<div class="container">





    <!-- Main -->


     


<?php
//include db configuration file




//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");


if(!empty($_GET["cat"])){

$sql="SELECT * FROM tbl_startup_project WHERE Category = '".$_GET['cat']."' ORDER BY id DESC ";
$result=mysql_query($sql);

}else{

$sql="SELECT * FROM tbl_startup_project ORDER BY id DESC ";
$result=mysql_query($sql);
}



//$row=mysql_fetch_array($result);

  //if username exists
if(mysql_num_rows($result)>0)
{
  //echo "asdf";


//get all records from add_delete_record table
while($row2 = mysql_fetch_array($result))
{ 



$date = date_create($row2['Date_Created']);

  ?>


<!-- Delete a Project -->

<div id="slide-delete-<?php echo $row2['ProjectID']; ?>" class="well slide-delete">
  <div class="result-delete">
  <div id="result-delete-<?php echo $row2['ProjectID']; ?>">Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to delete this project?</h4>
<input type="hidden" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<div class="popupoverlay-btn">
  <div class="cancel-delete">
    <button class="slide-delete-<?php echo $row2['ProjectID']; ?>_close cancel">Cancel</button>
    <button class="delete<?php echo $row2['ProjectID']; ?> btn-delete">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-delete">
    <button class="slide-delete-<?php echo $row2['ProjectID']; ?>_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Delete a Project -->







<script>
$(document).ready(function () {

    $('#slide-delete-'+<?php echo $row2['ProjectID']; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });



    $(".delete"+<?php echo $row2['ProjectID']; ?>).click(function() {  
//alert("aads"); 

 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>).val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        
      
      
         

        //everything looks good! proceed...
        if(proceed) 
        {


          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid};
            
            //Ajax post data to server
            $.post('project/projectdelete.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            //alert(text);
                
            output = '<div class="success">'+response.text+'</div>';

          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $(".cancel-delete").hide();
        $(".result-delete").show();
        $(".close-delete").show();
        $("#result-delete-"+response.text).hide().slideDown();
            }, 'json');
      
        }

});
  
});
</script>


<a href="<?php echo BASE_PATH; ?>/ideas/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>">

<div class="surveys-list">

<div class="survey-info-container">

<div class="row">
    <div class="col-md-2">

<?php 

$ProjectImage = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$row2['ProjectID']."'");
$rowprojectimage = mysql_fetch_array($ProjectImage);

if($rowprojectimage['project_image'] != '') { ?>

<img src="<?php echo BASE_PATH; ?>/ideas/<?php echo $row2['Category']; ?>/uploads/<?php echo $rowprojectimage['project_image']; ?>" width="100">

<?php }else{
echo '<img src="uploads/thumbnail.jpg" width="100">'; 
}


?></div>


    <div class="col-md-10">


                  <div class="survey-header">
                  
                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row2['Name']; ?></div>
                  <?php echo $row2['Headline']; ?>
                   
                  </div>
                 
                  <div class="survey-metadata">
                    <div class="item ">
                      <div class="label">Created:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo date_format($date, 'm/d/Y'); ?></div>
                    </div>
                    <div class="item date">
                      <div class="label">status:</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo $row2['ProjectStatus']; ?>
                        </span>
                      </div>
                    </div>
                    <div class="item date">
                      <div class="label">Participants:</div>
                      <div class="value" ng-bind="(survey.numberOfCompletedSurveys)">
                        
<?php


$result_count = mysql_query("SELECT ProjectID,userID, COUNT(DISTINCT userID) AS count FROM tbl_participant_request WHERE ProjectID = '".$row2['ProjectID']."' AND Not_Qualified_Anymore = '' GROUP BY ProjectID");
$row_count = mysql_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo "<a href=project/browse/?id=".$row2['ProjectID'].">";
echo $count;
echo "</a>";
}else{
  echo "0";
}
?>


                      </div>
                    </div>
                    <div class="clearer"></div>
                  </div>
                 
                  </div>
               


  
    
   </div>
</div>


<?php 

}

echo '</a>';


}else{ ?>

<div class="row">
    <div class="col-md-12">
<div class="empty-projects">No Projects</div>
  <div class="create-one-here-box">
      <div class="create-one">
        <button class="slide_open create-one-btn">Create one here</button>
       </div> 
  </div>
</div>

</div>
</div>


<?php }

//close db connection
mysql_close($connecDB);
?>








       
        





     

          
      </div>

    



            


          </div>



  
<!--Footer-->
<?php 
if(!empty($test)){
include("../../footer.php"); 
}else{
include("../footer.php");
}

?>
<!--Footer-->

      

 
</div>
  
  

  </div>



        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>



<script>
$(document).ready(function () {

    $('#slide').popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });
  
});
</script>


        
    </body>

</html>
