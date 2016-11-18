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



$Project = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."'
  AND id = '".$_SESSION['projectid']."'");
$rowproject = mysql_fetch_array($Project);




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
        <span class="number">1</span> DEFINE TARGET AUDIENCE <span class="icon-chevron-right"></span>
      </div>
      <div class="clearer"></div>
    </div>

    <div class="dashboardProcessMenu audienceDashboard audience">
      <div class="dashboardProcessMenuText stepMenuAudience">
        <span class="number">2</span> CREATE PROJECT SUMMARY <span class="icon-chevron-right"></span>
      </div>
      <div class="clearer"></div>
    </div>

    <!-- ngIf: !survey.waitingForApproval --><div class="dashboardProcessMenu confirmDashboard audience" ng-show="!user.isDeveloper" ng-if="!survey.waitingForApproval" aria-hidden="false">
      <div class="dashboardProcessMenuText">
        <span class="number">3</span> CONFIRM
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

       


        <div class="screeningWrapper step2">

          
          <div class="filter">
             
               <label for="screening"><span ng-click="enableScreening()" role="button" tabindex="0">
                <h2>Project summary</h2></span></label>
             </div>





          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
                <div class="screening-description">
                  Please describe briefly about what your project or idea is about. This will give participants an overall picture of your project.
                </div>

 <h3>Project/Idea Headline</h3>
                

  <input type="text" name="headline" id="headline" placeholder="Add your headline here" value="<?php echo $rowproject['Headline'];?>">


                <h3>Summary</h3>
                

  <textarea rows="5" tabindex="0" placeholder="Add your project summary here" name="summary" id="summary"><?php echo $rowproject['Summary'];?></textarea>
               
              </div>

              <div class="separator"></div>


              

                <div class="clearer"></div>
              </div>



             

              
              </div>
            </div>
         

        

        

       <div id="result"></div>
</div>

 <div id="saveprojectsummary">
              <input type="submit" value="Save"/>

            </div>

      <div id="saveandcontinueprojectsummary">
              
        <input type="submit" value="Save And Continue"/>

            </div>

             <div id="back">
              <a href="step1.php?id=<?php echo $_SESSION['projectid']; ?>">< Back</a>

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