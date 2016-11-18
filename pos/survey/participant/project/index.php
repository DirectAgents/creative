<?php
session_start();
require_once '../../class.researcher.php';
include_once("../../config.php");

$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
	$researcher_home->redirect('login.php');
}

$stmt = $researcher_home->runQuery("SELECT * FROM tbl_researcher WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['researcherSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$Project = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."'");
$rowproject = mysql_fetch_array($Project);

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
$screening=explode(',',$rowproject['Screening']);




$ProjectPotentialanswers = mysql_query("SELECT * FROM tbl_researcher_potentialanswers WHERE userID='".$_SESSION['researcherSession']."' AND ProjectID = '41'");
$rowpotentialanswers = mysql_fetch_array($ProjectPotentialanswers);

$potentialanswers =explode(',',$rowpotentialanswers['Accepted']);

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
<script src="<?php echo BASE_PATH; ?>/researcher/project/js/jquery.popupoverlay.js"></script>

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


 $(".delete").click(function() {  
//alert("aads"); 

 //get input field values
        
        var projectid = $('input[name=projectid').val();
       
       
        
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
            post_data = {'projectid':projectid};
            
            //Ajax post data to server
            $.post('projectdelete.php', post_data, function(response){  
              

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
   

        
    </head>
    
    <body>

<!--TopNav-->
        <?php include("../nav.php"); ?>

<!--TopNav-->


  
        


    <!-- Main -->


  

<!-- Start Create a Project -->

<div id="slide" class="well">
  <div id="result"></div>
<h4>Name your project and hit go!</h4>
<input type="text" name="projectname" id="projectname" placeholder="Untitled Project"/>
<div class="popupoverlay-btn">
    <button class="slide_close btn-default">Cancel</button>
    <button class="go btn-default">Go</button>
</div>
</div>

<!-- End Create a Project -->










<div class="container">

 <div id="create-project-box">
    <div id="create-project">
              <button class="initialism slide_open btn btn-success">Create a new project</button>

            </div>
       </div>  
   
  



    <!-- Main -->


    <div id="white-container">
     


<?php
//include db configuration file

echo '<input type="hidden" name="projectid" id="projectid" value="'.$rowproject["id"].'">';
echo '<input type="hidden" name="userid" id="userid" value="'.$row["userID"].'">';


//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID = '".$_SESSION['researcherSession']."' ORDER BY id DESC ");

$sql="SELECT * FROM tbl_researcher_project WHERE researcherID = '".$_SESSION['researcherSession']."' ORDER BY id DESC ";
$result=mysql_query($sql);
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

<div id="slide-delete-<?php echo $row2['id']; ?>" class="well slide-delete">
  <div class="result-delete">
  <div id="result-delete-<?php echo $row2['id']; ?>">Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to delete this project?</h4>
<input type="hidden" name="projectid" id="projectid" placeholder="<?php echo $row2['id']; ?>"/>
<div class="popupoverlay-btn">
  <div class="cancel-delete">
    <button class="slide-delete-<?php echo $row2['id']; ?>_close cancel">Cancel</button>
    <button class="delete btn-default">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-delete">
    <button class="slide-delete-<?php echo $row2['id']; ?>_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Create a Project -->


<script>
$(document).ready(function () {

    $('#slide-delete-'+<?php echo $row2['id']; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });
  
});
</script>


<div class="surveys-list">

<div class="survey-info-container">
                  <div class="survey-header">
                    <div class="account-project-name">
                      Project Name
                    </div>
                    <div class="edit-delete">
                      <a href="<?php echo BASE_PATH; ?>/researcher/project/edit/step1.php?id=<?php echo $row2['id']; ?>">
                        <i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="#" role="button" class="slide-delete-<?php echo $row2['id']; ?>_open">  
                      <i class="icon-trash"></i>
                    </a>
                    </div>  
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row2['Name']; ?></div>
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
                      <div class="value" ng-bind="(survey.numberOfCompletedSurveys)">100</div>
                    </div>
                    <div class="clearer"></div>
                  </div>
                  <div class="survey-actions">
                  
                      
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="browse">Browse Participants</a>

                      </div>

                      <div class="action" ng-click="triggerPreview(survey)" ng-show="survey.surveyLength > 0" role="button" tabindex="0" aria-hidden="false">
                        
                        preview
                      </div>
                    

                    </div>
                  </div>
               


          <div class="clearer"></div>
  
    



<?php 

}

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







<div class="clearer"></div>

       
        





     

          
      </div>

    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  

      

    

  

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