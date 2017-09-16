<?php
session_start();
require_once '../../../class.startup.php';
include_once("../../../config.php");

$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
	$startup_home->redirect('../../login');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


//echo $_SESSION['startupSession'];
//echo $_SESSION['projectid'];


$Project = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."'
  AND id = '".$_SESSION['projectid']."'");
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
$projectstatus=explode(',',$rowproject['ProjectStatus']);






$ProjectPotentialanswers = mysql_query("SELECT * FROM tbl_startup_screeningquestion WHERE userID='".$_SESSION['startupSession']."' AND ProjectID = '".$_SESSION['projectid']."'");
$rowpotentialanswers = mysql_fetch_array($ProjectPotentialanswers);

$potentialanswers =explode(',',$rowpotentialanswers['Accepted']);

?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo $row['userEmail']; ?></title>
        <!-- Bootstrap -->
        <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../../../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../../../assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="../../../css/font-awesome.css" rel="stylesheet" media="screen">




<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">






<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--JAVASCRIPT-->
<script src="../js/script.js"></script>


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
      jQuery.ajax({
      type: "POST", 
      url: "interests.php", 
      dataType:"text", 
      data:myData,
      success:function(response){
        $("#responds").append(response);
        $("#interests").val('');
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
        
        $('#item_'+DbNumberID).fadeOut("slow");
      },
      error:function (xhr, ajaxOptions, thrownError){
        
        alert(thrownError);
      }
      });
  });

});
</script>





<script>
  $(function() {
    $( "#interests" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>















        
    </head>
    
    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Member Home</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> 
								<?php echo $row['userEmail']; ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="http://www.codingcage.com/">Coding Cage</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Tutorials <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li><a href="http://www.codingcage.com/search/label/PHP OOP">PHP OOP</a></li>
                                    <li><a href="http://www.codingcage.com/search/label/PDO">PHP PDO</a></li>
                                    <li><a href="http://www.codingcage.com/search/label/jQuery">jQuery</a></li>
                                    <li><a href="http://www.codingcage.com/search/label/Bootstrap">Bootstrap</a></li>
                                    <li><a href="http://www.codingcage.com/search/label/CRUD">CRUD</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="http://www.codingcage.com/2015/09/login-registration-email-verification-forgot-password-php.html">Tutorial Link</a>
                            </li>
                            
                            
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>



    <div id="dashboardSurveyProcessMenu">
    <div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>

  <div class="dashboardProcessMenuContainer">

    <div class="dashboardProcessMenu audienceDashboard audience">

      <div class="dashboardProcessMenuText stepMenuAudience">
        <a href="step1.php"><span class="number">1</span> DEFINE TARGET AUDIENCE</a> <span class="icon-chevron-right"></span>
      </div>
      <div class="clearer"></div>
    </div>

    <div class="dashboardProcessMenu questionsDashboard audience">
      <div class="dashboardProcessMenuText">
        <a href="step2.php"><span class="number">2</span> CREATE PROJECT SUMMARY </a><span class="icon-chevron-right"></span>
      </div>
      <div class="clearer"></div>
    </div>

    <!-- ngIf: !survey.waitingForApproval --><div class="dashboardProcessMenu confirmDashboard audience" ng-show="!user.isDeveloper" ng-if="!survey.waitingForApproval" aria-hidden="false">
      <div class="dashboardProcessMenuText">
        <a href="step3.php"><span class="number">3</span> CONFIRM</a>
      </div>
      <div class="clearer"></div>
    </div><!-- end ngIf: !survey.waitingForApproval -->

  </div>

  <div class="clearer"></div>
</div>    
        


    <!-- Main -->


    <div class="main-page-container">
    <div id="dashboardSurveyTargetingContainer">
      <div id="dashboardSurveyTargetingContainerLogic">






        <div class="survey-info">

           <div class="reach-people">
              <h2>Project Name</h2>
              <div class="edit"><a href="step1.php?id=<?php echo $_SESSION['projectid']; ?>">Edit</a></div>
            <div class="separator"></div>
            </div>

            <div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
            
              <div class="in-person">
               <label for="in-person"><?php echo $rowproject['Name']; ?></label>
             </div>
            </div>
          </div>
        </div>

           <div class="reach-people">
              <h2>Audience Summary</h2>
              <div class="edit"><a href="step1.php?id=<?php echo $_SESSION['projectid']; ?>">Edit</a></div>
            <div class="separator"></div>
            </div>

<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Reach people</h3>
              <div class="in-person">
               <label for="in-person"><?php echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Meetupchoice']) ?></label>
             </div>
            </div>
          </div>

    
</div>







          <div class="clearer"></div>
  
        </div>




 <div class="survey-info">


<div class="rowaudiencesummary">
          <div class="input-inline first">
            <div class="wrapper">
              <h3>Age</h3>
              <div class="in-person">
               <label for="in-person"><?php if($rowproject['Age'] != ''){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Age']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
              <h3>Gender</h3>
              <div class="google-hangout">
               <label for="google-hangout"><?php if($rowproject['Gender'] != ''){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Gender']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
              <h3>Height</h3>
              <div class="over-the-phone">
               <label for="in-person"><?php if($rowproject['MinHeight'] != ''){echo $rowproject['MinHeight']; echo " - "; echo $rowproject['MaxHeight']; }else{ echo "not selected";};  ?></label>
              </div>
            </div>
          </div>
</div>

<div class="rowaudiencesummary">
         <div class="input-inline first">
            <div class="wrapper">
              <h3>Location</h3>
              <div class="google-hangout">
               <label for="google-hangout"><?php if($rowproject['Location'] != ''){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Location']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

         <div class="input-inline">
            <div class="wrapper">
              <h3>Status</h3>
              <div class="over-the-phone">
               <label for="over-the-phone"><?php if($rowproject['Status'] != ''){ echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Status']); }else{ echo "not selected";};  ?></label>
              </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
              <h3>Ethnicity</h3>
              <div class="in-person">
               <label for="in-person"><?php if($rowproject['Ethnicity'] != ''){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Ethnicity']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>
</div>



<div class="rowaudiencesummary">
          <div class="input-inline first">
            <div class="wrapper">
              <h3>Smoke</h3>
              <div class="google-hangout">
               <label for="google-hangout"><?php if($rowproject['Smoke'] != ''){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Smoke']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
              <h3>Drink</h3>
              <div class="over-the-phone">
               <label for="over-the-phone"><?php if($rowproject['Drink'] != ''){ echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Drink']); }else{ echo "not selected";};  ?></label>
              </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
              <h3>Diet</h3>
              <div class="in-person">
               <label for="in-person"><?php if($rowproject['Diet'] != ''){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Diet']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>
</div>


<div class="rowaudiencesummary">
          <div class="input-inline first">
            <div class="wrapper">
              <h3>Religion</h3>
              <div class="google-hangout">
               <label for="google-hangout"><?php if($rowproject['Religion'] != ''){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Religion']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

            <div class="input-inline">
            <div class="wrapper">
              <h3>Education</h3>
              <div class="over-the-phone">
               <label for="over-the-phone"><?php if($rowproject['Education'] != ''){ echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Education']); }else{ echo "not selected";};  ?></label>
              </div>
            </div>
          </div>

          <div class="input-inline first">
            <div class="wrapper">
              <h3>Job</h3>
              <div class="in-person">
               <label for="in-person"><?php if($rowproject['Job'] != ''){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Job']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>
</div>






          <div class="clearer"></div>
  
        </div>




 <div class="survey-info">

         

<div class="rowaudiencesummary">
          <div class="input-inline first">
            <div class="wrapper">
              <h3>Interested in</h3>
              <div class="in-person">
               <label for="in-person">
                 

<?php
//include db configuration file

echo '<input type="hidden" name="projectid" id="projectid" value="'.$rowproject["id"].'">';
echo '<input type="hidden" name="userid" id="userid" value="'.$row["userID"].'">';


//MySQL query
$Result = mysql_query("SELECT * FROM tbl_startup_interests WHERE ProjectID = '".$rowproject['id']."' ");



//get all records from add_delete_record table
while($row2 = mysql_fetch_array($Result))
{





echo '<li id="item_'.$row2['id'].'">';
echo '<div class="del_wrapper">';
//echo '<img src="../../../images/icon_del.gif" border="0" class="icon_del" />';
echo '</div>';
//echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
echo $row2['Interests'].'</li>';

}


//close db connection
mysql_close($connecDB);
?>



               </label>
             </div>
            </div>
          </div>

    
</div>







          <div class="clearer"></div>
  
        </div>




 <div class="survey-info">

           <div class="reach-people">
              <h2>Screening Question</h2>
              <div class="edit"><a href="step1.php?id=<?php echo $_SESSION['projectid']; ?>">Edit</a></div>
            <div class="separator"></div>
            </div>

<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Screening Question</h3>
              <div class="in-person">
               <label for="in-person"><?php echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Meetupchoice']) ?></label>
             </div>
            </div>
          </div>

</div>


<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Potential Answer #1</h3>
              <div class="in-person">
               <label for="in-person"><?php echo $rowpotentialanswers['PotentialAnswer1'];?></label>
             </div>
            </div>
          </div>

</div>


<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Potential Answer #2</h3>
              <div class="in-person">
               <label for="in-person"><?php echo $rowpotentialanswers['PotentialAnswer2'];?></label>
             </div>
            </div>
          </div>

</div>



<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Potential Answer #3</h3>
              <div class="in-person">
               <label for="in-person"><?php echo $rowpotentialanswers['PotentialAnswer3'];?></label>
             </div>
            </div>
          </div>

</div>






          <div class="clearer"></div>
  
        </div>





 <div class="survey-info">

           <div class="reach-people">
              <h2>Project Summary</h2>
              <div class="edit"><a href="step2.php">Edit</a></div>
            <div class="separator"></div>
            </div>

<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Headline</h3>
              <div class="in-person">
               <label for="in-person"><?php echo $rowproject['Headline']; ?></label>
             </div>
            </div>
          </div>

</div>


<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Summary</h3>
              <div class="in-person">
               <label for="in-person"><?php echo $rowproject['Summary']; ?></label>
             </div>
            </div>
          </div>

</div>






          <div class="clearer"></div>
  
        </div>



     
</div>



  <div class="survey-info">

           <div class="reach-people">
              <h2>Project Setting</h2>
            <div class="separator"></div>
            <div class="wrapper">
            <div class="screening-description">
                  If you like to share your project with the public then choose <strong>Public</strong>. <br>Choose <strong>Private</strong>
                  if you like to keep your project as private. When set to Private only you can see the project.
                </div>
</div>
            </div>



          <div class="input-inline first">
            <div class="wrapper">
             
              <div class="in-person">
               <input id="public" name="projectstatus[]" type="checkbox" value="Public" <?php if(in_array('Public',$projectstatus)){echo "checked";}?> />
               <label for="public">Public</label>
             </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
              <!--<h3>Select survey language:</h3>-->
              <div class="google-hangout">
               <input id="private" name="projectstatus[]" type="checkbox" value="Private" <?php if(in_array('Private',$projectstatus)){echo "checked";}?> />
               <label for="private">Private</label>
             </div>
            </div>
          </div>

         

          <div class="clearer"></div>

        </div>
 




<div class="clearer"></div>

       
        

       <div id="result"></div>




      <div id="submitproject">
              
        <input type="submit" value="Save Project"/>
        <input type="hidden" name="submitok" value="Yes"/>

            </div>

            <div id="back">
              <a href="step2.php">< Back</a>

            </div>

      </div>

    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  

      

    </div>

    <div class="clearer"></div>

  </div>



        <!--/.fluid-container-->
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../../assets/scripts.js"></script>






        
    </body>

</html>