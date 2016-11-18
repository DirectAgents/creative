<?php
session_start();
require_once '../../../base_path.php';

require_once '../../../class.researcher.php';
require_once '../../../class.participant.php';
include_once("../../../config.php");



$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../../login.php');
}

$stmt = $researcher_home->runQuery("SELECT * FROM tbl_researcher WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['researcherSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


//echo $_SESSION['researcherSession'];
//echo $_SESSION['projectid'];


$Project = mysqli_query($connecDB,"SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."'
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




$ProjectPotentialanswers = mysqli_query($connecDB,"SELECT * FROM tbl_researcher_potentialanswers WHERE userID='".$_SESSION['researcherSession']."' AND ProjectID = '".$_SESSION['projectid']."'");
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








<script>

 $(document).ready(function (e) {
    $("#uploadimage").on('submit',(function(e) {
      //alert("sdfa");
    e.preventDefault();
    var fileValue = $('#fileToUpload').val();
    if(fileValue !='')
    {
        $.ajax({
            url: "submitFile.php", 
            type: "POST",             
            data: new FormData(this), 
            contentType: false,                  
            processData:false,        
            success: function(data)   
            {
                
            var $response=$(data);

          //Query the jQuery object for the values
          var oneval = $response.filter('#toolarge').text();
          var resultimage = $response.filter('#resultimage').text();
          

          $("#message").html(oneval);

                //$('#ShowImage').show(data);
                //$('#file').val('');
                $('#imagestatus').val(resultimage);

                //$('#ShowImage').attr("src",'uploads/'+$('input[type=file]')[0].files[0].name);

                 $(function() {
              $('#submitproject').click();
                  });
              $('#imagestatus').val('');
            }
        });
    }
    else
    {
        //alert("Please Choose file!");
        $(function() {
    $('#submitproject').click();
      });

        return false;
    }
    }));

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



<form id="uploadimage" method="post" enctype="multipart/form-data">

<div class="container">


    <!-- Main -->


<div id="dashboardSurveyProcessMenu">
    

    <div class="dashboardProcessMenu audienceDashboard audience">

  <div class="row">
<a href="step1.php"> 
    <div class="col-md-4 processmenu-inactive">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>

      <div class="dashboardProcessMenuText"><span class="number">1</span> DEFINE TARGET AUDIENCE </div></div>
</a>

<a href="step2.php"> 
    <div class="col-md-4 processmenu-inactive">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>
      <div class="dashboardProcessMenuText"><span class="number">2</span> CREATE PROJECT SUMMARY </div></div>
</a>
<a href="step3.php">    
    <div class="col-sm-4">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
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
              <h2>Project Name</h2>
              <div class="edit"><a href="step1.php?id=<?php echo $_SESSION['projectid']; ?>">Edit</a></div>
            <div class="separator"></div>
            </div>

            <div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
            
              <div class="in-person">
               <label for="in-person"><h2><?php echo $rowproject['Name']; ?></h2></label>
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
              <h2>Audience Summary</h2>
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
               <label for="in-person"><?php if($rowproject['MinHeight'] != 'NULL'){echo $rowproject['MinHeight']; echo " - "; echo $rowproject['MaxHeight']; }else{ echo "not selected";};  ?></label>
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
          <div class="input-inline first">
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

          <div class="input-inline">
            <div class="wrapper">
              <h3>Diet</h3>
              <div class="in-person">
               <label for="in-person"><?php if($rowproject['Diet'] != 'NULL'){echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Diet']); }else{ echo "not selected";};  ?></label>
             </div>
            </div>
          </div>
</div>


<div class="rowaudiencesummary">
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
</div>






         
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
$Result = mysqli_query($connecDB,"SELECT * FROM tbl_researcher_interests WHERE ProjectID = '".$_SESSION['projectid']."' ");


if(mysqli_num_rows($Result)>0)
{
//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($Result))
{





echo '<li id="item_'.$row2['id'].'">';
echo '<div class="del_wrapper">';
//echo '<img src="../../../images/icon_del.gif" border="0" class="icon_del" />';
echo '</div>';
//echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
echo $row2['Interests'].'</li>';

}

}else{
  echo "Not specified";
}



?>



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

<?php if($rowpotentialanswers['PotentialAnswer1'] != 'NULL'){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowpotentialanswers['PotentialAnswer1']); }else{ echo "not specified";}  ?>


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

<?php if($rowpotentialanswers['PotentialAnswer2'] != 'NULL'){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowpotentialanswers['PotentialAnswer2']); }else{ echo "not specified";}  ?>


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

<?php if($rowpotentialanswers['PotentialAnswer3'] != 'NULL'){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowpotentialanswers['PotentialAnswer3']); }else{ echo "not specified";}  ?>


              </label>
             </div>
            </div>
          </div>

</div>






        <div class="separator"></div>

  
        </div>





 <div class="survey-info">

           <div class="reach-people">
              <h2>Project Summary</h2>
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
              <h3>Headline</h3>
              <div class="in-person">
               <label for="in-person">
<?php if($rowproject['Headline'] != ''){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Headline']); }else{ echo "not specified";}  ?>

              </label>
             </div>
            </div>
          </div>

</div>


<div class="rowaudiencesummary">
          <div class="input-full">
            <div class="wrapper">
              <h3>Summary</h3>
              <div class="in-person">
               <label for="in-person">

<?php if($rowproject['Summary'] != ''){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowproject['Summary']); }else{ echo "not specified";}  ?>

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
              <h2>Project Setting</h2>
            <div class="separator"></div>
         <div style="float:left; width:100%">
            <div class="screening-description">
                  If you like to share your project with the public then choose <strong>Public</strong>. <br>Choose <strong>Private</strong>
                  if you like to keep your project as private. When set to Private only you can see the project.
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
          <img src="<?php echo BASE_PATH; ?>/projects/uploads/<?PHP echo $rowproject['project_image']; ?>" class="preview">
       
  <?php }else{ ?>

 <img src="<?php echo BASE_PATH; ?>/projects/uploads/thumbnail.jpg" class="preview">

  <?php } ?>

</div>

<div class="file-upload">
   <div id="message"></div><br/>    
   <input type="hidden" name="imagestatus" id="imagestatus"/>
   <img src="" id="ShowImage" style="display:none;"><br/><br/>
   <label>File:</label>
   <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpeg,.png,.jpeg,.gif" /><br/><br/>
  </div>



            </div>


 <div class="separator"></div>


 </div>  


        
 


  <div class="survey-info">

           <div class="reach-people">
              <h2>Pay Out</h2>
            <div class="separator"></div>
          
            <div class="screening-description">
                  If you like to share your project with the public then choose <strong>Public</strong>. <br>Choose <strong>Private</strong>
                  if you like to keep your project as private. When set to Private only you can see the project.
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
        <input type="submit" value="Submit Project"/>
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



</form>


        
    </body>

</html>