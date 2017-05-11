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


//echo $_SESSION['startupSession'];
//echo $_SESSION['projectid'];


$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."'
  AND ProjectID= '".$_SESSION['projectid']."'");
$rowproject = mysqli_fetch_array($Project);


if($_SESSION['projectid'] != $rowproject['ProjectID']){
  header("Location:../../index.php");
}


$meetupchoice=explode(',',$rowproject['Meetupchoice']);
$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$minheight=explode(',',$rowproject['MinHeight']);
$maxheight=explode(',',$rowproject['MaxHeight']);
//$location=explode(',',$rowproject['Location']);
$status=explode(',',$rowproject['Status']);
$ethnicity=explode(',',$rowproject['Ethnicity']);
$smoke=explode(',',$rowproject['Smoke']);
$drink=explode(',',$rowproject['Drink']);
$diet=explode(',',$rowproject['Diet']);
$religion=explode(',',$rowproject['Religion']);
$education=explode(',',$rowproject['Education']);
$job=explode(',',$rowproject['Job']);
$projectstatus=explode(',',$rowproject['ProjectStatus']);

$pay=explode(',',$rowproject['Pay']);
$minutes=explode(',',$rowproject['Minutes']);




$ProjectPotentialanswers = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion WHERE userID='".$_SESSION['startupSession']."' AND ProjectID = '".$_SESSION['projectid']."'");
$rowpotentialanswers = mysqli_fetch_array($ProjectPotentialanswers);

//echo $rowpotentialanswers['PotentialAnswer1'];

$screening=explode(',',$rowpotentialanswers['ScreeningQuestion']);

$potentialanswers =explode(',',$rowpotentialanswers['Accepted']);

?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>

<?php include("../../header.php"); ?>

<!--JAVASCRIPT-->
<script src="../js/script.js"></script>








  <script type="text/javascript" src="<?php echo BASE_PATH; ?>/participant/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo BASE_PATH; ?>/participant/js/jquery.form.js"></script>

<script type="text/javascript" >

var jq = $.noConflict();
jq(document).ready(function(){
    
            jq('#photoimg').live('change', function()      { 
                 jq("#preview").html('');
          jq("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
      jq("#imageform").ajaxForm({
            target: '#preview'
    }).submit();

    //location.reload();
      });
     
        }); 

</script>



        
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
        <i class="fa fa-male fa-stack-1x"></i>
      </span>
    </div>

      <div class="dashboardProcessMenuText"><span class="number">1</span> TARGET AUDIENCE </div></div>
</a>

<a href="step2.php"> 
    <div class="col-md-4 processmenu-inactive">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-lightbulb-o fa-stack-1x"></i>
      </span>
    </div>
      <div class="dashboardProcessMenuText"><span class="number">2</span> IDEA SUMMARY </div></div>
</a>
<a href="step3.php">    
    <div class="col-sm-4">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-lock fa-stack-1x"></i>
      </span>
    </div>

      <div class="dashboardProcessMenuText"> <div class="processmenu-active"><span class="number">3</span> CONFIRM</div></div></div>
  </div>
 </a> 

    
  </div>
</div>




  <div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">


 
        

        <div class="survey-info">

           <div class="reach-people">
              <h2>What is the idea?</h2>
              <div class="edit"><a href="step1.php?id=<?php echo $_SESSION['projectid']; ?>">Edit</a></div>
            <div class="separator"></div>
            </div>

            <div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
            
              <div class="in-person">
               <label for="in-person"><h2 class="grey"><?php echo $rowproject['Name']; ?></h2></label>
               <p>&nbsp;</p>

             </div>
            </div>
          </div>
        </div>

          
<!--
<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Reach people</h3>
              <div class="in-person">
               <label for="in-person"><?php echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Meetupchoice']) ?></label>
             </div>
            </div>
          </div>

    
</div>-->


<div class="separator"></div>



  
        </div>




 <div class="survey-info">


   <div class="reach-people">
              <h2>Target Audience Summary</h2>
              <div class="edit"><a href="step1.php?id=<?php echo $_SESSION['projectid']; ?>">Edit</a></div>
            <div class="separator"></div>
            </div>


<div class="rowaudiencesummary">
          <div class="input-inline first">
            <div class="wrapper">
              <h3>Age</h3>
              <div class="in-person">
               <label for="in-person"><?php if($rowproject['Age'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Age']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
              <h3>Gender</h3>
              <div class="google-hangout">
               <label for="google-hangout"><?php if($rowproject['Gender'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Gender']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
              <h3>Height</h3>
              <div class="over-the-phone">
               <label for="in-person"><?php if($rowproject['MinHeight'] != 'NULL'){

                if($rowproject['MinHeight'] == '50'){echo '5\'0"';}
                if($rowproject['MinHeight'] == '51'){echo '5\'1"';}
                if($rowproject['MinHeight'] == '52'){echo '5\'2"';}
                if($rowproject['MinHeight'] == '53'){echo '5\'3"';}
                if($rowproject['MinHeight'] == '54'){echo '5\'4"';}
                if($rowproject['MinHeight'] == '55'){echo '5\'5"';}
                if($rowproject['MinHeight'] == '56'){echo '5\'6"';}
                if($rowproject['MinHeight'] == '57'){echo '5\'7"';}
                if($rowproject['MinHeight'] == '58'){echo '5\'8"';}
                if($rowproject['MinHeight'] == '59'){echo '5\'9"';}
                if($rowproject['MinHeight'] == '60'){echo '6\'0"';}
                if($rowproject['MinHeight'] == '61'){echo '6\'1"';}
                if($rowproject['MinHeight'] == '62'){echo '6\'2"';}
                if($rowproject['MinHeight'] == '63'){echo '6\'3"';}
                if($rowproject['MinHeight'] == '64'){echo '6\'4"';}
                echo " - "; 
                
                if($rowproject['MaxHeight'] == '50'){echo '5\'0"';}
                if($rowproject['MaxHeight'] == '51'){echo '5\'1"';}
                if($rowproject['MaxHeight'] == '52'){echo '5\'2"';}
                if($rowproject['MaxHeight'] == '53'){echo '5\'3"';}
                if($rowproject['MaxHeight'] == '54'){echo '5\'4"';}
                if($rowproject['MaxHeight'] == '55'){echo '5\'5"';}
                if($rowproject['MaxHeight'] == '56'){echo '5\'6"';}
                if($rowproject['MaxHeight'] == '57'){echo '5\'7"';}
                if($rowproject['MaxHeight'] == '58'){echo '5\'8"';}
                if($rowproject['MaxHeight'] == '59'){echo '5\'9"';}
                if($rowproject['MaxHeight'] == '60'){echo '6\'0"';}
                if($rowproject['MaxHeight'] == '61'){echo '6\'1"';}
                if($rowproject['MaxHeight'] == '62'){echo '6\'2"';}
                if($rowproject['MaxHeight'] == '63'){echo '6\'3"';}
                if($rowproject['MaxHeight'] == '64'){echo '6\'4"';}


                }else{ echo "not selected";};  ?></label>
              </div>
            </div>
          </div>


           <div class="input-inline">
            <div class="wrapper">
              <h3>Smoke</h3>
              <div class="google-hangout">
               <label for="google-hangout"><?php if($rowproject['Smoke'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Smoke']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>


          <div class="input-inline">
            <div class="wrapper">
              <h3>Drink</h3>
              <div class="over-the-phone">
               <label for="over-the-phone"><?php if($rowproject['Drink'] != 'NULL'){ echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Drink']); }else{ echo "not selected";};  ?></label>
              </div>
            </div>
          </div>
</div>

<!--
<div class="rowaudiencesummary">
         <div class="input-inline first">
            <div class="wrapper">
              <h3>Location</h3>
              <div class="google-hangout">
               <label for="google-hangout"><?php if($rowproject['Location'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Location']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

         <div class="input-inline">
            <div class="wrapper">
              <h3>Status</h3>
              <div class="over-the-phone">
               <label for="over-the-phone"><?php if($rowproject['Status'] != 'NULL'){ echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Status']); }else{ echo "not selected";};  ?></label>
              </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
              <h3>Ethnicity</h3>
              <div class="in-person">
               <label for="in-person"><?php if($rowproject['Ethnicity'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Ethnicity']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>
</div>
-->


<div class="rowaudiencesummary">
        

          <div class="input-inline">
            <div class="wrapper">
              <h3>Diet</h3>
              <div class="in-person">
               <label for="in-person"><?php if($rowproject['Diet'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Diet']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

           <div class="input-inline first">
            <div class="wrapper">
              <h3>Religion</h3>
              <div class="google-hangout">
               <label for="google-hangout"><?php if($rowproject['Religion'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Religion']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

            <div class="input-inline">
            <div class="wrapper">
              <h3>Education</h3>
              <div class="over-the-phone">
               <label for="over-the-phone"><?php if($rowproject['Education'] != 'NULL'){ echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Education']); }else{ echo "not selected";};  ?></label>
              </div>
            </div>
          </div>

            <div class="input-inline first">
            <div class="wrapper">
              <h3>Job</h3>
              <div class="in-person">
               <label for="in-person"><?php if($rowproject['Job'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Job']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>

            <div class="input-inline first">
            <div class="wrapper">
              <h3>Interested in</h3>
              <div class="in-person">
               <label for="in-person">
                 

<?php if($rowproject['Interest'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Interest']); }else{ echo "not selected";};  ?>



               </label>
             </div>
            </div>
          </div>

</div>







         
        </div>




 <div class="survey-info">

         

<div class="rowaudiencesummary">
          <div class="input-inline first">
            <div class="wrapper">
              <h3>Languages</h3>
              <div class="in-person">
               <label for="in-person">
                 

<?php if($rowproject['Languages'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Languages']); }else{ echo "not selected";};  ?>



               </label>
             </div>
            </div>
          </div>

    
</div>







       <div class="separator"></div>

  
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
               <label for="in-person">

<?php if($rowpotentialanswers['ScreeningQuestion'] != 'NULL'){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowpotentialanswers['ScreeningQuestion']); }else{ echo "not specified";}  ?>

                </label>
             </div>
            </div>
          </div>

</div>


<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Potential Answer #1</h3>
              <div class="in-person">
               <label for="in-person">

<?php if($rowpotentialanswers['PotentialAnswer1'] != ''){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowpotentialanswers['PotentialAnswer1']); }else{ echo "not specified";}  ?>


              </label>
             </div>
            </div>
          </div>

</div>


<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Potential Answer #2</h3>
              <div class="in-person">
               <label for="in-person">

<?php if($rowpotentialanswers['PotentialAnswer2'] != ''){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowpotentialanswers['PotentialAnswer2']); }else{ echo "not specified";}  ?>


               </label>
             </div>
            </div>
          </div>

</div>



<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Potential Answer #3</h3>
              <div class="in-person">
               <label for="in-person">

<?php if($rowpotentialanswers['PotentialAnswer3'] != ''){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowpotentialanswers['PotentialAnswer3']); }else{ echo "not specified";}  ?>


              </label>
             </div>
            </div>
          </div>

</div>






        <div class="separator"></div>

  
        </div>





 <div class="survey-info">

           <div class="reach-people">
              <h2>Idea Summary</h2>
              <div class="edit"><a href="step2.php?<?php echo $_SESSION['projectid']; ?>">Edit</a></div>
            <div class="separator"></div>
            </div>


<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>What stage is your idea/product in?</h3>
              <div class="in-person">
               <label for="in-person">

<?php if($rowproject['Stage'] != ''){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Stage']); }else{ echo "not specified";}  ?>

</label>
             </div>
            </div>
          </div>

</div>


<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Details</h3>
              <div class="in-person">
               <label for="in-person">
<?php if($rowproject['Details'] != ''){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Details']); }else{ echo "not specified";}  ?>

              </label>
             </div>
            </div>
          </div>

</div>





<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>What will be discussed?</h3>
              <div class="in-person">
               <label for="in-person">
<?php if($rowproject['Agenda_One'] != ''){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Agenda_One']); }else{ echo "not specified";}  ?>
              </label>
             </div>
            </div>
          </div>

</div>

<!--
<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Agenda #2</h3>
              <div class="in-person">
               <label for="in-person"><?php echo $rowproject['Agenda_Two']; ?></label>
             </div>
            </div>
          </div>

</div>



<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Agenda #3</h3>
              <div class="in-person">
               <label for="in-person"><?php echo $rowproject['Agenda_Three']; ?></label>
             </div>
            </div>
          </div>

</div>
-->





         <div class="separator"></div>

  
        </div>



     
</div>



  <div class="survey-info">

           <div class="reach-people">
              <h2>Idea Setting</h2>
            <div class="separator"></div>
         <div style="float:left; width:100%">
            <div class="screening-description">
                  If you like to share your idea with the public then choose <strong>Public</strong>. <br>Choose <strong>Private</strong>
                  if you like to keep your idea as private. When set to Private only you can see the idea. <br>In Private mode you can still share
                  your idea with people you choose.
                </div>
</div>
            </div>



          <div class="input-inline first">
            <div class="wrapper">
             
              <div class="in-person">
               <input id="public" name="projectstatus[]" type="checkbox" value="Public" <?php if(!in_array('Private',$projectstatus)){echo "checked";}?> />
               <label for="public">Public</label>
             </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
              <!--<h3>Select survey language:</h3>-->
             <div class="in-person">
               <input id="private" name="projectstatus[]" type="checkbox" value="Private" <?php if(in_array('Private',$projectstatus)){echo "checked";}?> />
               <label for="private">Private</label>
             </div>
            </div>
          </div>

         

 </div>   





<div class="separator"></div>



<div class="survey-info">

           <div class="reach-people">
              <h2>Upload Image</h2>
            <div class="separator"></div>
           

              <div id='preview'>
   
   <?php if($rowproject['project_image'] != ''){ ?>
          <img src="<?php echo BASE_PATH; ?>/ideas/uploads/<?PHP echo $rowproject['project_image']; ?>" class="preview">
       
  <?php }else{ ?>

 <img src="<?php echo BASE_PATH; ?>/ideas/uploads/thumbnail.jpg" class="preview">

  <?php } ?>

</div>

<div class="file-upload">
  <form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php?projectid=<?php echo $_SESSION['projectid']; ?>'>
Update your image <input type="file" name="photoimg" id="photoimg" />
</form>
  </div>



            </div>


 <div class="separator"></div>


 </div>  


        
 


  <div class="survey-info">

           <div class="reach-people">
              <h2>Pay Out</h2>
            <div class="separator"></div>
          
            <div class="screening-description">
                  Choose the amount you are willing to <strong>Pay</strong> for the person you will meet and for how long you intend to have a meeting for. 
                </div>
</div>


            



          <div class="input-inline first">
           
             <div class="wrapper">
              <div class="in-person">
                <label for="public">Amount you pay:</label>
                 <div class="styled-select">
<select name="pay" id="pay">

<option value="1.00" <?php if(in_array('1.00',$pay)){echo "selected";}?>>$1.00</option>
<option value="2.00" <?php if(in_array('2.00',$pay)){echo "selected";}?>>$2.00</option>
<option value="3.00" <?php if(in_array('3.00',$pay)){echo "selected";}?>>$3.00</option>
<option value="4.00" <?php if(in_array('4.00',$pay)){echo "selected";}?>>$4.00</option>
<option value="5.00" <?php if(in_array('5.00',$pay)){echo "selected";}?>>$5.00</option>
<option value="6.00" <?php if(in_array('6.00',$pay)){echo "selected";}?>>$6.00</option>
<option value="7.00" <?php if(in_array('7.00',$pay)){echo "selected";}?>>$7.00</option>
<option value="8.00" <?php if(in_array('8.00',$pay)){echo "selected";}?>>$8.00</option>
<option value="9.00" <?php if(in_array('9.00',$pay)){echo "selected";}?>>$9.00</option>
<option value="10.00" <?php if(in_array('10.00',$pay)){echo "selected";}?>>$10.00</option>
<option value="11.00" <?php if(in_array('11.00',$pay)){echo "selected";}?>>$11.00</option>
<option value="12.00" <?php if(in_array('12.00',$pay)){echo "selected";}?>>$12.00</option>
<option value="13.00" <?php if(in_array('13.00',$pay)){echo "selected";}?>>$13.00</option>
<option value="14.00" <?php if(in_array('14.00',$pay)){echo "selected";}?>>$14.00</option>
<option value="15.00" <?php if(in_array('15.00',$pay)){echo "selected";}?>>$15.00</option>
<option value="16.00" <?php if(in_array('16.00',$pay)){echo "selected";}?>>$16.00</option>
<option value="17.00" <?php if(in_array('17.00',$pay)){echo "selected";}?>>$17.00</option>
<option value="18.00" <?php if(in_array('18.00',$pay)){echo "selected";}?>>$18.00</option>
<option value="19.00" <?php if(in_array('19.00',$pay)){echo "selected";}?>>$19.00</option>
<option value="20.00" <?php if(in_array('20.00',$pay)){echo "selected";}?>>$20.00</option>
<option value="21.00" <?php if(in_array('21.00',$pay)){echo "selected";}?>>$21.00</option>
<option value="22.00" <?php if(in_array('22.00',$pay)){echo "selected";}?>>$22.00</option>
<option value="23.00" <?php if(in_array('23.00',$pay)){echo "selected";}?>>$23.00</option>
<option value="24.00" <?php if(in_array('24.00',$pay)){echo "selected";}?>>$24.00</option>
<option value="25.00" <?php if(in_array('25.00',$pay)){echo "selected";}?>>$25.00</option>
<option value="26.00" <?php if(in_array('26.00',$pay)){echo "selected";}?>>$26.00</option>
<option value="27.00" <?php if(in_array('27.00',$pay)){echo "selected";}?>>$27.00</option>
<option value="28.00" <?php if(in_array('28.00',$pay)){echo "selected";}?>>$28.00</option>
<option value="29.00" <?php if(in_array('29.00',$pay)){echo "selected";}?>>$29.00</option>
<option value="30.00" <?php if(in_array('30.00',$pay)){echo "selected";}?>>$30.00</option>
<option value="31.00" <?php if(in_array('31.00',$pay)){echo "selected";}?>>$31.00</option>
<option value="32.00" <?php if(in_array('32.00',$pay)){echo "selected";}?>>$32.00</option>
<option value="33.00" <?php if(in_array('33.00',$pay)){echo "selected";}?>>$33.00</option>
<option value="34.00" <?php if(in_array('34.00',$pay)){echo "selected";}?>>$34.00</option>
<option value="35.00" <?php if(in_array('35.00',$pay)){echo "selected";}?>>$35.00</option>
<option value="36.00" <?php if(in_array('36.00',$pay)){echo "selected";}?>>$36.00</option>
<option value="37.00" <?php if(in_array('37.00',$pay)){echo "selected";}?>>$37.00</option>
<option value="38.00" <?php if(in_array('38.00',$pay)){echo "selected";}?>>$38.00</option>
<option value="39.00" <?php if(in_array('39.00',$pay)){echo "selected";}?>>$39.00</option>
<option value="40.00" <?php if(in_array('40.00',$pay)){echo "selected";}?>>$40.00</option>
<option value="41.00" <?php if(in_array('41.00',$pay)){echo "selected";}?>>$41.00</option>
<option value="42.00" <?php if(in_array('42.00',$pay)){echo "selected";}?>>$42.00</option>
<option value="43.00" <?php if(in_array('43.00',$pay)){echo "selected";}?>>$43.00</option>
<option value="44.00" <?php if(in_array('44.00',$pay)){echo "selected";}?>>$44.00</option>
<option value="45.00" <?php if(in_array('45.00',$pay)){echo "selected";}?>>$45.00</option>
<option value="46.00" <?php if(in_array('46.00',$pay)){echo "selected";}?>>$46.00</option>
<option value="47.00" <?php if(in_array('47.00',$pay)){echo "selected";}?>>$47.00</option>
<option value="48.00" <?php if(in_array('48.00',$pay)){echo "selected";}?>>$48.00</option>
<option value="49.00" <?php if(in_array('49.00',$pay)){echo "selected";}?>>$49.00</option>
<option value="50.00" <?php if(in_array('50.00',$pay)){echo "selected";}?>>$50.00</option>

</select>
</div>
         </div>    
             </div>
            </div>
         

          <div class="input-inline">
                        <div class="wrapper">
              <!--<h3>Select survey language:</h3>-->
             <div class="in-person">
               <label for="public">How long do you want to meet?</label>
                          <div class="styled-select">
<select name="minutes" id="minutes">

<option value="5" <?php if(in_array('5',$minutes)){echo "selected";}?>>5 minutes</option>
<option value="10" <?php if(in_array('10',$minutes)){echo "selected";}?>>10 minutes</option>
<option value="15" <?php if(in_array('15',$minutes)){echo "selected";}?>>15 minutes</option>
<option value="20" <?php if(in_array('20',$minutes)){echo "selected";}?>>20 minutes</option>
<option value="25" <?php if(in_array('25',$minutes)){echo "selected";}?>>25 minutes</option>
<option value="30" <?php if(in_array('30',$minutes)){echo "selected";}?>>30 minutes</option>
<option value="35" <?php if(in_array('35',$minutes)){echo "selected";}?>>35 minutes</option>
<option value="40" <?php if(in_array('40',$minutes)){echo "selected";}?>>40 minutes</option>
<option value="45" <?php if(in_array('45',$minutes)){echo "selected";}?>>45 minutes</option>
<option value="50" <?php if(in_array('50',$minutes)){echo "selected";}?>>50 minutes</option>
<option value="55" <?php if(in_array('55',$minutes)){echo "selected";}?>>55 minutes</option>
<option value="60" <?php if(in_array('60',$minutes)){echo "selected";}?>>60 minutes</option>

</select>
</div>
            
            
          </div>

          </div>
 </div>


         <div class="separator"></div>

        
 


       
       

       <div id="result"></div>



 
      <div id="submitproject">
       <div class="survey-info">
               <div class="wrapper">
        <input type="submit" value="Post Idea"/>
        <input type="hidden" name="submitok" value="Yes"/>
 
            

            <div id="back">
              <a href="step2.php?<?php echo $_SESSION['projectid']; ?>">< Back</a>

            </div>
</div>  
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