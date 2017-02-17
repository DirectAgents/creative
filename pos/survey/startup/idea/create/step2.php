<?php
session_start();
require_once '../../../base_path.php';

require_once '../../../class.startup.php';
require_once '../../../class.participant.php';
include_once("../../../config.php");



$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../login');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."'
  AND ProjectID= '".$_SESSION['projectid']."'");
$rowproject = mysqli_fetch_array($Project);

$stage=explode(',',$rowproject['Stage']);


//echo $_SESSION['projectid'];



?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>

<?php include("../../header.php"); ?>

<!--JAVASCRIPT-->
<script src="../js/script.js"></script>



    </head>
    
    <body>

<!--TopNav-->
         <header id="main-header" class='transparent'>
  <div class="inner-col">


<?php include("../../../nav.php"); ?>

   
  </div>
</header>


<!--TopNav-->


<div class="container">



    <!-- Main -->


<div id="dashboardSurveyProcessMenu">
    

    <div class="dashboardProcessMenu audienceDashboard audience">

  <div class="row">

<a href="step1.php?id=<?php echo $_SESSION['projectid']; ?>">     
    <div class="col-md-4 processmenu-inactive">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>

      <div class="dashboardProcessMenuText"><span class="number">1</span> TARGET AUDIENCE </div></div>
    <div class="col-md-4">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>
</a>    
      <div class="dashboardProcessMenuText">
      <div class="processmenu-active"><span class="number">2</span> IDEA SUMMARY </div></div></div>
    <div class="col-sm-4 processmenu-inactive">
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


 

       


        <div class="screeningWrapper step2">

          
          <div class="filter">
             
               <label for="screening"><span ng-click="enableScreening()" role="button" tabindex="0">
                <h2>SHARE MORE ABOUT YOUR IDEA</h2></span></label>
             </div>





          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">




<p>&nbsp;</p>

 <h3>Idea Details</h3>
                
                 <div class="screening-description">
                  Briefly describe what you plan to do or offer to your future customers. This will give participants an overall picture of your idea to provide a better feedback.
                </div>



<textarea name="details" id="details" placeholder="Add your idea's detail here"><?php echo $rowproject['Details'];?></textarea>

                





<h3>What's your agenda during your feedback session?</h3>
                
                 <div class="screening-description">
                 Please explain shortly what will be discussed during the meeting to discuss your idea
                </div>
<textarea name="agenda_one" id="agenda_one" placeholder="Get feedback about my idea"><?php echo $rowproject['Agenda_One'];?></textarea>
 
 <!-- <input type="text" name="agenda_one" id="agenda_one" placeholder="Talk about feedback about my idea" value="<?php echo $rowproject['Agenda_One'];?>">
  <input type="text" name="agenda_two" id="agenda_two" placeholder="Discuss about features" value="<?php echo $rowproject['Agenda_Two'];?>">

  <input type="text" name="agenda_three" id="agenda_three" placeholder="bla bla" value="<?php echo $rowproject['Agenda_Three'];?>">
-->
               
              </div>




      
              

                <div class="clearer"></div>
              </div>



             

              
              </div>
         
          
         

        

         <div id="result"></div>


      


<!--
 <div id="saveprojectsummary">
              <input type="submit" value="Save"/>

            </div>
-->
      <div id="saveandcontinueprojectsummary">
              
        <input type="submit" value="Save And Continue"/>

            </div>

             <div id="back">
              <a href="step1.php?id=<?php echo $_SESSION['projectid']; ?>">< Back</a>

            </div>

            </div>
             </div>   

                </div>

            <!--Footer-->
<?php include("../../../footer.php"); ?>
<!--Footer-->

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