<?php
session_start();
require_once '../../../class.researcher.php';
include_once("../../../config.php");

$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
	$researcher_home->redirect('../../login');
}

$stmt = $researcher_home->runQuery("SELECT * FROM tbl_researcher WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['researcherSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


//echo $_SESSION['researcherSession'];
//echo $_SESSION['projectid'];


$Project = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."'
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






$ProjectPotentialanswers = mysql_query("SELECT * FROM tbl_researcher_potentialanswers WHERE userID='".$_SESSION['researcherSession']."' AND ProjectID = '".$_SESSION['projectid']."'");
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
<script src="../js/script.js"></script>






        
    </head>
    
    <body>

     <?php include("../../nav.php"); ?>



<div class="container">


    <!-- Main -->


<div id="dashboardSurveyProcessMenu">
    

    <div class="dashboardProcessMenu audienceDashboard audience">

  <div class="row">
    <div class="col-md-4">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>

      <div class="dashboardProcessMenuText"><span class="number">1</span> DEFINE TARGET AUDIENCE <span class="icon-chevron-right"></span></div></div>
    <div class="col-md-5">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>
      <div class="dashboardProcessMenuText"><span class="number">2</span> CREATE PROJECT SUMMARY <span class="icon-chevron-right"></span></div></div>
    <div class="col-sm-3">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>

      <div class="dashboardProcessMenuText"><span class="number">3</span> CONFIRM</div></div>
  </div>

    
  </div>
</div>




  <div id="white-container">
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
$Result = mysql_query("SELECT * FROM tbl_researcher_interests WHERE ProjectID = '".$rowproject['id']."' ");



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

       
        

       <div id="result"></div>




      <div id="submitproject">
              
        <input type="submit" value="Submit Project"/>
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
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>