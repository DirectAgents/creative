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



$_SESSION['projectid'] = $_GET['id'];


//echo $_SESSION['projectid'];


$Project = mysqli_query($connecDB,"SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."' AND
  ProjectID = '".$_GET['id']."'");

$rowproject = mysqli_fetch_array($Project);

if($rowproject < 1){
  header("Location:../../../404.php");
}


$minreq=explode(',',$rowproject['MinReq']);
$meetupchoice = array_map('trim', explode(',', $rowproject['Meetupchoice']));
$age=explode(',',$rowproject['Age']);

//$search_array = array('14','15','16','17');
//if(in_array('14',$search_array)){echo "checked";}

$stage=explode(',',$rowproject['Stage']);
$category=explode(',',$rowproject['Category']);
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





$ProjectPotentialanswers = mysqli_query($connecDB,"SELECT * FROM tbl_researcher_potentialanswers WHERE userID='".$_SESSION['researcherSession']."' AND ProjectID = '".$_GET['id']."'");
$rowpotentialanswers = mysqli_fetch_array($ProjectPotentialanswers);

$screening= $rowpotentialanswers['EnabledorDisabled'];

$potentialanswers =explode(',',$rowpotentialanswers['Accepted']);




?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>
       
       <?php include("../../header.php"); ?>

<!--JAVASCRIPT-->


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
    <div class="col-md-4">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>

      <div class="dashboardProcessMenuText">
      <div class="processmenu-active"><span class="number">1</span> TARGET AUDIENCE</div></div></div>


    <div class="col-md-4 processmenu-inactive">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>
      <div class="dashboardProcessMenuText"><span class="number">2</span> PROJECT SUMMARY (<a href="step2.php?id=<?php echo $_GET['id']; ?>" class="edit-link">Edit</a>) </div></div>
    <div class="col-sm-4 processmenu-inactive">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>
   
      <div class="dashboardProcessMenuText"><span class="number">3</span> PROJECT SETTINGS (<a href="step3.php?id=<?php echo $_GET['id']; ?>" class="edit-link">Edit</a>)</div></div>
  </div>

    
  </div>
</div>


    <div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">






 <div class="survey-info">

           <div class="reach-people">
              <h2>Project Name:</h2>
            <div class="separator"></div>

             <div class="screening-description">
                  It can be your startup name or the name of your idea
                </div>

            </div>

          <div class="input-full">
            <div class="wrapper">
              <!--<h3>In Person</h3>-->
               <div class="form-group">
              <div class="in-person">
               <input class="form-control" name="projectname" type="text" value="<?php echo $rowproject['Name'];?>"/>
              </div>
               
             </div>
            </div>
          </div>

         
          <div class="clearer"></div>

        </div>




<div class="survey-info">

           <div class="reach-people">
              <h2>What stage is your idea/product in?</h2>
            <div class="separator"></div>
            </div>
  <div class="input-full">
            <div class="wrapper">
         <div class="styled-select">
<select name="stage" id="stage">

<option value="Prototype" <?php if(in_array('Prototype',$stage)){echo "selected";}?>>Prototype</option>
<option value="Just an idea" <?php if(in_array('Just an idea',$stage)){echo "selected";}?>>Just an idea</option>
<option value="About to launch" <?php if(in_array('About to launch',$stage)){echo "selected";}?>>About to launch</option>
<option value="Already launched" <?php if(in_array('Already launched',$stage)){echo "selected";}?>>Already launched</option>

</select>
</div>
</div>
  </div>       

         

          <div class="clearer"></div>

        </div>
<!--
        <div class="survey-info">

           <div class="reach-people">
              <h2>I want to reach people:</h2>
            <div class="separator"></div>
            </div>

          <div class="input-inline first">
            <div class="wrapper">
             
              <div class="in-person">
               <input id="in-person" name="meetupselection[]" type="checkbox" value="In Person" <?php if(in_array('In Person',$meetupchoice)){echo "checked";}?> />
               <label for="in-person">In Person</label>
             </div>
            </div>
          </div>

          <div class="input-inline">
            <div class="wrapper">
             
              <div class="google-hangout">
               <input id="google-hangout" name="meetupselection[]" type="checkbox" value="Google Hangout" <?php if(in_array('Google Hangout',$meetupchoice)){echo "checked";}?> />
               <label for="google-hangout">Google Hangout</label>
             </div>
            </div>
          </div>

          <div class="input-inline numberSurveys">
            <div class="wrapper">
              
              <div class="over-the-phone">
               <input id="over-the-phone" name="meetupselection[]" type="checkbox" value="Over the Phone" <?php if(in_array('Over the Phone',$meetupchoice)){echo "checked";}?> />
               <label for="over-the-phone">Over the Phone</label>
              </div>
            </div>
          </div>

          <div class="clearer"></div>

        </div>


-->



    <div class="survey-info">

           <div class="reach-people">
              <h2>Choose Category:</h2>
            <div class="separator"></div>
            </div>
  <div class="input-full">
            <div class="wrapper">
         <div class="styled-select">
<select name="category" id="category">

<option value="web-mobile-solutions" <?php if($rowproject['Category'] == 'web-mobile-solutions'){echo "selected";}?>>Enterprise web/mobile solutions</option>
<option value="media-analytics-and-enhancements" <?php if($rowproject['Category'] == 'media-analytics-and-enhancements'){echo "selected";}?>>Media Analytics and Enhancements</option>
<option value="entertainment-and-gaming" <?php if($rowproject['Category'] == 'entertainment-and-gaming'){echo "selected";}?>>Entertainment and Gaming</option>
<option value="health-and-wellness" <?php if($rowproject['Category'] == 'health-and-wellness'){echo "selected";}?>>Health, and Wellness</option>
<option value="security" <?php if($rowproject['Category'] == 'security'){echo "selected";}?>>Security</option>
<option value="space" <?php if($rowproject['Category'] == 'space'){echo "selected";}?>>Space</option>
<option value="green" <?php if($rowproject['Category'] == 'green'){echo "selected";}?>>Green</option>
<option value="general-consumer" <?php if($rowproject['Category'] == 'general-consumer'){echo "selected";}?>>General Consumer</option>
<option value="beauty" <?php if($rowproject['Category'] == 'beauty'){echo "selected";}?>>Beauty &amp; Cosmetics</option>
<option value="consulting" <?php if($rowproject['Category'] == 'consulting'){echo "selected";}?>>Consulting</option>
<option value="consumer-products" <?php if($rowproject['Category'] == 'consumer-products'){echo "selected";}?>>Consumer Products</option>
<option value="education" <?php if($rowproject['Category'] == 'education'){echo "selected";}?>>Education</option>
<option value="electronics" <?php if($rowproject['Category'] == 'electronics'){echo "selected";}?>>Electronics</option>
<option value="employment" <?php if($rowproject['Category'] == 'employment'){echo "selected";}?>>Employment</option>
<option value="fashion" <?php if($rowproject['Category'] == 'fashion'){echo "selected";}?>>Fashion</option>
<option value="food" <?php if($rowproject['Category'] == 'food'){echo "selected";}?>>Food &amp; Beverage</option>
<option value="pharmaceutical" <?php if($rowproject['Category'] == 'pharmaceutical'){echo "selected";}?>>Pharmaceutical</option>
<option value="retail" <?php if($rowproject['Category'] == 'retail'){echo "selected";}?>>Retail</option>
<option value="service" <?php if($rowproject['Category'] == 'service'){echo "selected";}?>>Service</option>
<option value="sports" <?php if($rowproject['Category'] == 'sports'){echo "selected";}?>>Sports</option>
<option value="technology" <?php if($rowproject['Category'] == 'technology'){echo "selected";}?>>Technology</option>
<option value="telecommunications" <?php if($rowproject['Category'] == 'telecommunications'){echo "selected";}?>>Telecommunications</option>
<option value="transportation" <?php if($rowproject['Category'] == 'transportation'){echo "selected";}?>>Transportation</option>
<option value="travel" <?php if($rowproject['Category'] == 'travel'){echo "selected";}?>>Travel</option>
<option value="other" <?php if($rowproject['Category'] == 'other'){echo "selected";}?>>Other</option>


</select>
</div>
</div>
  </div>       

         

          <div class="clearer"></div>

        </div>




        <div class="survey-info countries">

          <div class="wrapper">

            <h2>I want to reach people by:</h2>
            <div class="separator"></div>


          

<!--Age Starts--> 
          

            <div class="ages">


                 <div class="containertitle">
                  <div class="age">
              <input id="age" type="checkbox" value="" <?php if($rowproject['Age'] != 'NULL' && $rowproject['Age'] != '') {echo "checked";}?>/>
               <label for="age">Age</label>
          </div>


        </div>  

 
  <div id="age-options" <?php if($rowproject['Age'] != 'NULL' && $rowproject['Age'] != '') {echo "style='display:block'";}?>>    
<div class="selectall">
<input id="ageimportant" name="minreq[]" type="checkbox"  value="Age" <?php if(in_array("Age",$minreq) && $rowproject['Age'] != 'NULL'){echo "checked";}?>/>
  <label for="ageimportant">Required</label>
   <input id="selectallages" type="checkbox" onClick="selectAllages(this,'ages')" />
  <label for="selectallages">select all</label>
</div>




  
  <div class="dashboardSurveyTargetingContainerAgeInputContainer first">

     
  <input id="14-17" name="ageselection[]" type="checkbox"  value="14,15,16,17" <?php if(in_array('14',$age)){echo "checked";}?>/>
  <label for="14-17">14-17</label>

</div>

<div class="dashboardSurveyTargetingContainerAgeInputContainer">
  <input id="18-24" name="ageselection[]" type="checkbox" value="18,19,20,21,22,23,24" <?php if(in_array('18',$age)){echo "checked";}?>/>
  <label for="18-24">18-24</label>
</div> 

<div class="dashboardSurveyTargetingContainerAgeInputContainer">
   <input id="25-34" name="ageselection[]" type="checkbox" value="25,26,27,28,29,30,31,32,33,34" <?php if(in_array('25',$age)){echo "checked";}?> />
  <label for="25-34">25-34</label>
</div>

<div class="dashboardSurveyTargetingContainerAgeInputContainer">
  <input id="35-44" name="ageselection[]" type="checkbox" value="35,36,37,38,39,40,41,42,43,44" <?php if(in_array('35',$age)){echo "checked";}?> />
  <label for="35-44">35-44</label>
</div>

<div class="dashboardSurveyTargetingContainerAgeInputContainer">
  <input id="45-54" name="ageselection[]" type="checkbox" value="45,46,47,48,49,50,51,52,53,54" <?php if(in_array('45',$age)){echo "checked";}?>/>
  <label for="45-54">45-54</label>
</div>

<div class="dashboardSurveyTargetingContainerAgeInputContainer">  
  <input id="55+" name="ageselection[]" type="checkbox" value="55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70" <?php if(in_array('55',$age)){echo "checked";}?> />
  <label for="55+">55+</label>
</div>  

                  

                 
              <div class="clearer"></div>

     


            <div class="separator"></div>

 </div> 
 </div>


 <!--Age Ends--> 


  <!--Gender Starts-->         

<div class="genders">
               <div class="containertitle">
                  <div class="gender">
               <input id="gender" name="gender" type="checkbox" <?php if($rowproject['Gender'] != 'NULL') {echo "checked";}?>/>
               <label for="gender">gender</label>
          </div>
        </div>  

<div id="gender-options" <?php if($rowproject['Gender'] != 'NULL') {echo "style='display:block'";}?>>               

<div class="selectall">
<input id="genderimportant" name="minreq[]" type="checkbox"  value="Gender" <?php if(in_array("Gender",$minreq) && $rowproject['Gender'] != 'NULL'){echo "checked";}?>/>
  <label for="ageimportant">Required</label>
   <input id="selectallgender" type="checkbox" onClick="selectAllgender(this,'gender')" />
  <label for="selectallgender">select all</label>
</div>

<div class="dashboardSurveyTargetingContainerAgeInputContainer first">
                   
 <input id="female" name="genderselection[]" type="checkbox" value="Female" <?php if(in_array('Female',$gender)){echo "checked";}?> />
  <label for="female">Female</label>

</div>

<div class="dashboardSurveyTargetingContainerAgeInputContainer">
   <input id="male" name="genderselection[]" type="checkbox" value="Male" <?php if(in_array('Male',$gender)){echo "checked";}?> />
  <label for="male">Male</label>
 </div> 
 
<div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>


<!--Gender Ends-->





 <!--Height Starts-->         

<div class="heights">
               <div class="containertitle">
                  <div class="height">
               <input id="height" name="height" type="checkbox" <?php if($rowproject['MinHeight'] != 'NULL') {echo "checked";}?>/>
               <label for="height">height</label>
          </div>
        </div>  

<div id="height-options" <?php if($rowproject['MinHeight'] != 'NULL') {echo "style='display:block'";}?>>   


 <div class="row">
    <div class="col-md-12">
<input id="heightimportant" name="minreq[]" type="checkbox"  value="Height" <?php if(in_array("Height",$minreq) && $rowproject['MinHeight'] != 'NULL'){echo "checked";}?>/>
  <label for="heightimportant">Required</label>

  </div>
</div>

<p>&nbsp;</p>

<div class="dashboardSurveyTargetingContainerHeightInputContainer first">
   <label for="Female">Minimum</label>                
 <select id="minheight" name="minheight">
<option value="" <?php if(in_array('',$minheight)){echo "selected";}?>>Select minimum height</option>
<option value="50" <?php if(in_array(50,$minheight)){echo "selected";}?>>5'0"</option>
<option value="51" <?php if(in_array(51,$minheight)){echo "selected";}?>>5'1"</option>
<option value="52" <?php if(in_array(52,$minheight)){echo "selected";}?>>5'2"</option>
<option value="53" <?php if(in_array(53,$minheight)){echo "selected";}?>>5'3"</option>
<option value="54" <?php if(in_array(54,$minheight)){echo "selected";}?>>5'4"</option>
<option value="55" <?php if(in_array(55,$minheight)){echo "selected";}?>>5'5"</option>
<option value="56" <?php if(in_array(56,$minheight)){echo "selected";}?>>5'6"</option>
<option value="57" <?php if(in_array(57,$minheight)){echo "selected";}?>>5'7"</option>
<option value="58" <?php if(in_array(58,$minheight)){echo "selected";}?>>5'8"</option>
<option value="59" <?php if(in_array(59,$minheight)){echo "selected";}?>>5'9"</option>
<option value="510" <?php if(in_array(510,$minheight)){echo "selected";}?>>5'10"</option>
<option value="511" <?php if(in_array(511,$minheight)){echo "selected";}?>>5'11"</option>
<option value="60" <?php if(in_array(60,$minheight)){echo "selected";}?>>6'0"</option>
<option value="61" <?php if(in_array(61,$minheight)){echo "selected";}?>>6'1"</option>
<option value="62" <?php if(in_array(62,$minheight)){echo "selected";}?>>6'2"</option>
<option value="63" <?php if(in_array(63,$minheight)){echo "selected";}?>>6'3"</option>
<option value="64" <?php if(in_array(64,$minheight)){echo "selected";}?>>6'4"</option>
 </select>
  

</div>

<div class="dashboardSurveyTargetingContainerHeightInputContainer">
  <label for="Male">Maximum</label>
   <select id="maxheight" name="maxheight">
<option value="" <?php if(in_array('',$maxheight)){echo "selected";}?>>Select maximum height</option>
<option value="50" <?php if(in_array(50,$maxheight)){echo "selected";}?>>5'0"</option>
<option value="51" <?php if(in_array(51,$maxheight)){echo "selected";}?>>5'1"</option>
<option value="52" <?php if(in_array(52,$maxheight)){echo "selected";}?>>5'2"</option>
<option value="53" <?php if(in_array(53,$maxheight)){echo "selected";}?>>5'3"</option>
<option value="54" <?php if(in_array(54,$maxheight)){echo "selected";}?>>5'4"</option>
<option value="55" <?php if(in_array(55,$maxheight)){echo "selected";}?>>5'5"</option>
<option value="56" <?php if(in_array(56,$maxheight)){echo "selected";}?>>5'6"</option>
<option value="57" <?php if(in_array(57,$maxheight)){echo "selected";}?>>5'7"</option>
<option value="58" <?php if(in_array(58,$maxheight)){echo "selected";}?>>5'8"</option>
<option value="59" <?php if(in_array(59,$maxheight)){echo "selected";}?>>5'9"</option>
<option value="510" <?php if(in_array(510,$maxheight)){echo "selected";}?>>5'10"</option>
<option value="511" <?php if(in_array(511,$maxheight)){echo "selected";}?>>5'11"</option>
<option value="60" <?php if(in_array(60,$maxheight)){echo "selected";}?>>6'0"</option>
<option value="61" <?php if(in_array(61,$maxheight)){echo "selected";}?>>6'1"</option>
<option value="62" <?php if(in_array(62,$maxheight)){echo "selected";}?>>6'2"</option>
<option value="63" <?php if(in_array(63,$maxheight)){echo "selected";}?>>6'3"</option>
<option value="64" <?php if(in_array(64,$maxheight)){echo "selected";}?>>6'4"</option>
 </select>
  
 </div> 
 
<div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>


<!--Height Ends--> 



<!--Location Starts--> 
          
<!--
            <div class="locations">


                 <div class="containertitle">
                  <div class="age">
               <input id="location" type="checkbox" <?php if($rowproject['Location'] != 'NULL') {echo "checked";}?>/>
               <label for="location">Location</label>
          </div>
        </div>  

 
 <div id="location-options" <?php if($rowproject['Location'] != 'NULL') {echo "style='display:block'";}?>>      

 <div class="selectall">
   <input id="selectalllocation" type="checkbox" onClick="selectAlllocation(this,'location')" />
  <label for="selectalllocation">select all</label>
</div>            
       
  
  <div class="dashboardSurveyTargetingContainerLocationInputContainer first">
                 
     
  <input id="manhattan" name="locationselection[]" type="checkbox" value="Manhattan" <?php if(in_array('Manhattan',$location)){echo "checked";}?> />
  <label for="manhattan">Manhattan</label>

</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="brooklyn" name="locationselection[]" type="checkbox" value="Brooklyn" <?php if(in_array('Brooklyn',$location)){echo "checked";}?> />
  <label for="brooklyn">Brooklyn</label>
</div> 

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="queens" name="locationselection[]" type="checkbox" value="Queens" <?php if(in_array('Queens',$location)){echo "checked";}?>/>
  <label for="queens">Queens</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="statenisland" name="locationselection[]" type="checkbox" value="Staten Island" <?php if(in_array('Staten Island',$location)){echo "checked";}?>/>
  <label for="statenisland">Staten Island</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="bronx" name="locationselection[]" type="checkbox" value="Bronx" <?php if(in_array('Bronx',$location)){echo "checked";}?> />
  <label for="bronx">Bronx</label>
</div>


                  

                 
      <div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>

-->
 <!--Location Ends--> 





 <!--Marital Status Starts--> 
          

            <div class="statuses">


                 <div class="containertitle">
                  <div class="status">
               <input id="status" type="checkbox" <?php if($rowproject['Status'] != 'NULL') {echo "checked";}?>/>
               <label for="status">Marital Status</label>
          </div>
        </div>  

 
 <div id="status-options" <?php if($rowproject['Status'] != 'NULL') {echo "style='display:block'";}?>>             
  
<div class="selectall">
  
  <input id="statusimportant" name="minreq[]" type="checkbox"  value="Status" <?php if(in_array("Status",$minreq) && $rowproject['Status'] != 'NULL'){echo "checked";}?>/>
  <label for="statusimportant">Required</label>

   <input id="selectallstatus" type="checkbox" onClick="selectAllstatus(this,'status')" />
  <label for="selectallstatus">select all</label>
</div>  

  <div class="dashboardSurveyTargetingContainerLocationInputContainer first">
                 
     
  <input id="single" name="statusselection[]" type="checkbox" value="Single" <?php if(in_array('Single',$status)){echo "checked";}?> />
  <label for="single">Single</label>

</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="arenotsingle" name="statusselection[]" type="checkbox" value="Married" <?php if(in_array('Married',$status)){echo "checked";}?> />
  <label for="arenotsingle">Married</label>
</div> 

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="anystatus" name="statusselection[]" type="checkbox" value="Divorced" <?php if(in_array('Divorced',$status)){echo "checked";}?> />
  <label for="anystatus">Divorced</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="anystatus" name="statusselection[]" type="checkbox" value="Widowed" <?php if(in_array('Widowed',$status)){echo "checked";}?> />
  <label for="anystatus">Widowed</label>
</div>

      
      <div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>


 <!--Status Ends--> 







  <!--Ethnicity Starts--> 
          

            <div class="ethnicities">


                 <div class="containertitle">
                  <div class="ethnicity">
               <input id="ethnicity" type="checkbox" <?php if($rowproject['Ethnicity'] != 'NULL') {echo "checked";}?> />
               <label for="ethnicity">Ethnicity</label>
          </div>
        </div>  

 
 <div id="ethnicity-options" <?php if($rowproject['Ethnicity'] != 'NULL') {echo "style='display:block'";}?>>             
  
  <div class="selectall">

  <input id="ethnicityimportant" name="minreq[]" type="checkbox"  value="Ethnicity" <?php if(in_array("Ethnicity",$minreq) && $rowproject['Ethnicity'] != 'NULL'){echo "checked";}?>/>
  <label for="ethnicityimportant">Required</label>

   <input id="selectallethnicity" type="checkbox" onClick="selectAllethnicity(this,'status')" />
  <label for="selectallethnicity">select all</label>
</div>  

  <div class="dashboardSurveyTargetingContainerLocationInputContainer first">
                 
     
  <input id="asian" name="ethnicityselection[]" type="checkbox" value="Asian" <?php if(in_array('Asian',$ethnicity)){echo "checked";}?> />
  <label for="asian">Asian</label>

</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="black" name="ethnicityselection[]" type="checkbox" value="Black" <?php if(in_array('Black',$ethnicity)){echo "checked";}?> />
  <label for="black">Black</label>
</div> 

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="hispaniclatin" name="ethnicityselection[]" type="checkbox" value="Hispanic/Latin" <?php if(in_array('Hispanic/Latin',$ethnicity)){echo "checked";}?> />
  <label for="hispaniclatin">Hispanic/Latin</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="indian" name="ethnicityselection[]" type="checkbox" value="Indian" <?php if(in_array('Indian',$ethnicity)){echo "checked";}?>/>
  <label for="indian">Indian</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="middleeastern" name="ethnicityselection[]" type="checkbox" value="Middle Eastern" <?php if(in_array('Middle Eastern',$ethnicity)){echo "checked";}?> />
  <label for="middleeastern">Middle Eastern</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="nativeamerican" name="ethnicityselection[]" type="checkbox" value="Native American" <?php if(in_array('Native American',$ethnicity)){echo "checked";}?> />
  <label for="nativeamerican">Native American</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="pacificislander" name="ethnicityselection[]" type="checkbox" value="Pacific Islander" <?php if(in_array('Pacific Islander',$ethnicity)){echo "checked";}?>/>
  <label for="pacificislander">Pacific Islander</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="white" name="ethnicityselection[]" type="checkbox" value="White" <?php if(in_array('White',$ethnicity)){echo "checked";}?> />
  <label for="white">White</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="other" name="ethnicityselection[]" type="checkbox" value="Other" <?php if(in_array('Other',$ethnicity)){echo "checked";}?> />
  <label for="other">Other</label>
</div>

      
      <div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>


 <!--Ethnicity Ends--> 





  <!--Smoking Starts--> 
          

            <div class="smoking">


                 <div class="containertitle">
                  <div class="smoke">
               <input id="smoke" type="checkbox" <?php if($rowproject['Smoke'] != 'NULL') {echo "checked";}?>/>
               <label for="smoke">Smoke</label>
          </div>
        </div>  

 
 <div id="smoke-options" <?php if($rowproject['Smoke'] != 'NULL') {echo "style='display:block'";}?>>             
 
 <div class="selectall">

 <input id="smokeimportant" name="minreq[]" type="checkbox"  value="Smoke" <?php if(in_array("Smoke",$minreq) && $rowproject['Smoke'] != 'NULL'){echo "checked";}?>/>
  <label for="smokeimportant">Required</label>

   <input id="selectallsmoke" type="checkbox" onClick="selectAllsmoke(this,'smoke')" />
  <label for="selectallsmoke">select all</label>
</div>   

  
  <div class="dashboardSurveyTargetingContainerLocationInputContainer first">
                 
     
  <input id="yes" name="smokeselection[]" type="checkbox" value="Yes" <?php if(in_array('Yes',$smoke)){echo "checked";}?> />
  <label for="yes">Yes</label>

</div>


<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="no" name="smokeselection[]" type="checkbox" value="No" <?php if(in_array('No',$smoke)){echo "checked";}?> />
  <label for="no">No</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="sometimes" name="smokeselection[]" type="checkbox" value="Sometimes" <?php if(in_array('Sometimes',$smoke)){echo "checked";}?> />
  <label for="sometimes">Sometimes</label>
</div> 

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="whendrinking" name="smokeselection[]" type="checkbox" value="When drinking" <?php if(in_array('When drinking',$smoke)){echo "checked";}?> />
  <label for="whendrinking">When drinking</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="tryingtoquit" name="smokeselection[]" type="checkbox" value="Trying to quit" <?php if(in_array('Trying to quit',$smoke)){echo "checked";}?>/>
  <label for="Trying to quit">Trying to quit</label>
</div>



      
      <div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>


 <!--Smoking Ends--> 







  <!--Drinks Starts--> 
          

            <div class="drinking">


                 <div class="containertitle">
                  <div class="drinks">
               <input id="drinks" type="checkbox" <?php if($rowproject['Drink'] != 'NULL') {echo "checked";}?>/>
               <label for="drinks">Drinks</label>
          </div>
        </div>  

 
 <div id="drinks-options" <?php if($rowproject['Drink'] != 'NULL') {echo "style='display:block'";}?>>             
  
 <div class="selectall">

 <input id="drinkimportant" name="minreq[]" type="checkbox"  value="Drink" <?php if(in_array("Drink",$minreq) && $rowproject['Drink'] != 'NULL'){echo "checked";}?>/>
  <label for="drinkimportant">Required</label>

   <input id="selectalldrinks" type="checkbox" onClick="selectAlldrinks(this,'drinks')" />
  <label for="selectalldrinks">select all</label>
</div>  

  <div class="dashboardSurveyTargetingContainerLocationInputContainer first">
                 
     
  <input id="veryoften" name="drinkselection[]" type="checkbox" value="Very Often" <?php if(in_array('Very Often',$drink)){echo "checked";}?> />
  <label for="veryoften">Very Often</label>

</div>


<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="often" name="drinkselection[]" type="checkbox" value="Often" <?php if(in_array('Often',$drink)){echo "checked";}?> />
  <label for="often">Often</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="socially" name="drinkselection[]" type="checkbox" value="Socially" <?php if(in_array('Socially',$drink)){echo "checked";}?> />
  <label for="socially">Socially</label>
</div> 

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="rarely" name="drinkselection[]" type="checkbox" value="Rarely" <?php if(in_array('Rarely',$drink)){echo "checked";}?> />
  <label for="rarely">Rarely</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="desperately" name="drinkselection[]" type="checkbox" value="Desperately" <?php if(in_array('Desperately',$drink)){echo "checked";}?> />
  <label for="desperately">Desperately</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="notatall" name="drinkselection[]" type="checkbox" value="Not at all" <?php if(in_array('Not at all',$drink)){echo "checked";}?> />
  <label for="notatall">Not at all</label>
</div>



      
      <div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>


 <!--Drinks Ends--> 




 <!--Diet Starts--> 
          

            <div class="diets">


                 <div class="containertitle">
                  <div class="diet">
               <input id="diet" type="checkbox" <?php if($rowproject['Diet'] != 'NULL') {echo "checked";}?>/>
               <label for="diet">Diet</label>
          </div>
        </div>  

 
 <div id="diet-options" <?php if($rowproject['Diet'] != 'NULL') {echo "style='display:block'";}?>>     

  <div class="selectall">

  <input id="dietimportant" name="minreq[]" type="checkbox"  value="Diet" <?php if(in_array("Diet",$minreq) && $rowproject['Diet'] != 'NULL'){echo "checked";}?>/>
  <label for="dietimportant">Required</label>


   <input id="selectalldiet" type="checkbox" onClick="selectAlldiet(this,'diet')" />
  <label for="selectalldiet">select all</label>
</div>          
  
  <div class="dashboardSurveyTargetingContainerLocationInputContainer first">
                 
     
  <input id="vegetarian" name="dietselection[]" type="checkbox" value="Vegetarian" <?php if(in_array('Vegetarian',$diet)){echo "checked";}?> />
  <label for="vegetarian">Vegetarian</label>

</div>


<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="vegan" name="dietselection[]" type="checkbox" value="Vegan" <?php if(in_array('Vegan',$diet)){echo "checked";}?>/>
  <label for="vegan">Vegan</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="kosher" name="dietselection[]" type="checkbox" value="Kosher" <?php if(in_array('Kosher',$diet)){echo "checked";}?>/>
  <label for="kosher">Kosher</label>
</div> 

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="halal" name="dietselection[]" type="checkbox" value="Halal" <?php if(in_array('Halal',$diet)){echo "checked";}?>/>
  <label for="halal">Halal</label>
</div>




      
      <div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>


 <!--Diet Ends--> 



 <!--Religion Starts--> 
          

            <div class="religions">


                 <div class="containertitle">
                  <div class="religion">
               <input id="religion" type="checkbox" <?php if($rowproject['Religion'] != 'NULL') {echo "checked";}?>/>
               <label for="religion">Religion</label>
          </div>
        </div>  

 
 <div id="religion-options" <?php if($rowproject['Religion'] != 'NULL') {echo "style='display:block'";}?>>             
  

<div class="selectall">

<input id="religionimportant" name="minreq[]" type="checkbox"  value="Religion" <?php if(in_array("Religion",$minreq) && $rowproject['Religion'] != 'NULL'){echo "checked";}?>/>
  <label for="religionimportant">Required</label>

   <input id="selectallreligion" type="checkbox" onClick="selectAllreligion(this,'diet')" />
  <label for="selectallreligion">select all</label>
</div>   



  <div class="dashboardSurveyTargetingContainerLocationInputContainer first">
                 
     
  <input id="agnosticism" name="religionselection[]" type="checkbox" value="Agnostic" <?php if(in_array('Agnostic',$religion)){echo "checked";}?> />
  <label for="agnosticism">Agnostic</label>
</div>



<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="atheism" name="religionselection[]" type="checkbox" value="Atheist" <?php if(in_array('Atheist',$religion)){echo "checked";}?> />
  <label for="atheism">Atheist</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="buddhism" name="religionselection[]" type="checkbox" value="Buddhist" <?php if(in_array('Buddhist',$religion)){echo "checked";}?> />
  <label for="buddhism">Buddhist</label>
</div> 

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="catholicism" name="religionselection[]" type="checkbox" value="Catholic" <?php if(in_array('Catholic',$religion)){echo "checked";}?>/>
  <label for="catholicism">Catholic</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="christianity" name="religionselection[]" type="checkbox" value="Christian" <?php if(in_array('Christian',$religion)){echo "checked";}?> />
  <label for="christianity">Christian</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="hinduism" name="religionselection[]" type="checkbox" value="Hindu" <?php if(in_array('Hindu',$religion)){echo "checked";}?> />
  <label for="hinduism">Hindu</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="judaism" name="religionselection[]" type="checkbox" value="Jewish" <?php if(in_array('Jewish',$religion)){echo "checked";}?> />
  <label for="judaism">Jewish</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="islam" name="religionselection[]" type="checkbox" value="Muslim" <?php if(in_array('Muslim',$religion)){echo "checked";}?>/>
  <label for="islam">Muslim</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="other" name="religionselection[]" type="checkbox" value="Sikh" <?php if(in_array('Sikh',$religion)){echo "checked";}?>/>
  <label for="other">Sikh</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="other" name="religionselection[]" type="checkbox" value="Other" <?php if(in_array('Other',$religion)){echo "checked";}?>/>
  <label for="other">Other</label>
</div>




      
      <div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>


 <!--Religion Ends--> 






 <!--Education Starts--> 
          

            <div class="educations">


                 <div class="containertitle">
                  <div class="education">
               <input id="education" type="checkbox" <?php if($rowproject['Education'] != 'NULL') {echo "checked";}?>/>
               <label for="education">Education</label>
          </div>
        </div>  

 
 <div id="education-options" <?php if($rowproject['Education'] != 'NULL') {echo "style='display:block'";}?>> 

 <div class="selectall">

<input id="educationimportant" name="minreq[]" type="checkbox"  value="Education" <?php if(in_array("Education",$minreq) && $rowproject['Education'] != 'NULL'){echo "checked";}?>/>
  <label for="educationimportant">Required</label>

   <input id="selectalleducation" type="checkbox" onClick="selectAlleducation(this,'education')" />
  <label for="selectalleducation">select all</label>
</div>   
            
  
  <div class="dashboardSurveyTargetingContainerLocationInputContainer first">
                 
     
  <input id="highschool" name="educationselection[]" type="checkbox" value="High School" <?php if(in_array('High School',$education)){echo "checked";}?> />
  <label for="highschool">High school</label>
</div>



<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="twoyearcollege" name="educationselection[]" type="checkbox" value="2-year college" <?php if(in_array('2-year college',$education)){echo "checked";}?> />
  <label for="twoyearcollege">2-year college</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="university" name="educationselection[]" type="checkbox" value="University" <?php if(in_array('University',$education)){echo "checked";}?>/>
  <label for="university">University</label>
</div> 

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="mastersprogram" name="educationselection[]" type="checkbox" value="Post grad" <?php if(in_array('Post grad',$education)){echo "checked";}?>/>
  <label for="mastersprogram">Post grad</label>
</div>







      
      <div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>


 <!--Education Ends--> 




  <!--Occupation Starts--> 
          

            <div class="jobs">


                 <div class="containertitle">
                  <div class="job">
               <input id="job" type="checkbox" <?php if($rowproject['Job'] != 'NULL') {echo "checked";}?>/>
               <label for="job">Occupation</label>
          </div>
        </div>  

 
 <div id="job-options" <?php if($rowproject['Job'] != 'NULL') {echo "style='display:block'";}?>>      

  <div class="selectall">

<input id="jobimportant" name="minreq[]" type="checkbox"  value="Job" <?php if(in_array("Job",$minreq) && $rowproject['Job'] != 'NULL'){echo "checked";}?>/>
  <label for="jobimportant">Required</label>



   <input id="selectalljob" type="checkbox" onClick="selectAlljob(this,'job')" />
  <label for="selectalljob">select all</label>
</div>         
  
  <div class="dashboardSurveyTargetingContainerLocationInputContainer first">
                 
     
  <input id="student" name="jobselection[]" type="checkbox" value="Student" <?php if(in_array('Student',$job)){echo "checked";}?> />
  <label for="student">Student</label>
</div>



<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="artmusicwriting" name="jobselection[]" type="checkbox" value="ArtMusicWriting" <?php if(in_array('ArtMusicWriting',$job)){echo "checked";}?> />
  <label for="artmusicwriting">Art / Music / Writing</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
  <input id="bankingfinance" name="jobselection[]" type="checkbox" value="BankingFinance" <?php if(in_array('BankingFinance',$job)){echo "checked";}?> />
  <label for="bankingfinance">Banking / Finance</label>
</div> 

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="administration" name="jobselection[]" type="checkbox" value="Administration" <?php if(in_array('Administration',$job)){echo "checked";}?>/>
  <label for="administration">Administration</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="technology" name="jobselection[]" type="checkbox" value="Technology" <?php if(in_array('Technology',$job)){echo "checked";}?>/>
  <label for="technology">Technology</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="construction" name="jobselection[]" type="checkbox" value="Construction" <?php if(in_array('Construction',$job)){echo "checked";}?>/>
  <label for="construction">Construction</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="theeducation" name="jobselection[]" type="checkbox" value="Education" <?php if(in_array('Education',$job)){echo "checked";}?>/>
  <label for="theeducation">Education</label>
</div>


<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="entertainmentmedia" name="jobselection[]" type="checkbox" value="EntertainmentMedia" <?php if(in_array('EntertainmentMedia',$job)){echo "checked";}?>/>
  <label for="entertainmentmedia">Entertainment / Media</label>
</div>


<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="management" name="jobselection[]" type="checkbox" value="Management" <?php if(in_array('Management',$job)){echo "checked";}?>/>
  <label for="management">Management</label>
</div>


<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="hospitality" name="jobselection[]" type="checkbox" value="Hospitality" <?php if(in_array('Hospitality',$job)){echo "checked";}?>/>
  <label for="hospitality">Hospitality</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="law" name="jobselection[]" type="checkbox" value="Law" <?php if(in_array('Law',$job)){echo "checked";}?>/>
  <label for="law">Law</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="medicine" name="jobselection[]" type="checkbox" value="Medicine" <?php if(in_array('Medicine',$job)){echo "checked";}?>/>
  <label for="medicine">Medicine</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="military" name="jobselection[]" type="checkbox" value="Military" <?php if(in_array('Military',$job)){echo "checked";}?>/>
  <label for="military">Military</label>
</div>


<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="salesmarketing" name="jobselection[]" type="checkbox" value="SalesMarketing" <?php if(in_array('SalesMarketing',$job)){echo "checked";}?>/>
  <label for="salesmarketing">Sales / Marketing</label>
</div>

<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="scienceengineering" name="jobselection[]" type="checkbox" value="ScienceEngineering" <?php if(in_array('ScienceEngineering',$job)){echo "checked";}?>/>
  <label for="scienceengineering">Science / Engineering</label>
</div>


<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="transportation" name="jobselection[]" type="checkbox" value="Transportation" <?php if(in_array('Transportation',$job)){echo "checked";}?>/>
  <label for="transportation">Transportation</label>
</div>


<div class="dashboardSurveyTargetingContainerLocationInputContainer">
   <input id="otherjob" name="jobselection[]" type="checkbox" value="Other" <?php if(in_array('Other',$job)){echo "checked";}?>/>
  <label for="otherjob">Other</label>
</div>





      
      <div class="clearer"></div>

                



 <div class="separator"></div>

</div>

</div>

<div class="clearer"></div>


 <!--Job Ends--> 


<p>&nbsp;</p>

<!--Interests Starts--> 

<div class="interests">
              <h3>are interested in:</h3>
             
<div class="screening-description">
                  Please enter the interest your potential customer should have before you interview them about your project
                </div>


<div class="form-group">
              <div class="in-person">
               <input class="form-control"  name="interests" id="interests" type="text" placeholder="Enter here the interest (e.g Social Media)"/>
              </div>
               
             </div>


                   
<div class="content_wrapper">





<ul id="responds">
<?php
//include db configuration file

if(!empty($_SESSION['projectid'])){

echo '<input type="hidden" name="projectid" id="projectid" value="'.$_SESSION['projectid'].'">';
echo '<input type="hidden" name="userid" id="userid" value="'.$row["userID"].'">';


//MySQL query
$Result = mysqli_query($connecDB,"SELECT * FROM tbl_researcher_interests WHERE ProjectID = '".$_SESSION['projectid']."' ");


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($Result))
{





echo '<li id="item_'.$row2['id'].'">';
echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row2['id'].'">';
echo '<img src="../../../images/icon_del.gif" border="0" class="icon_del" />';
echo '</a></div>';
//echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
echo $row2['Interests'].'</li>';

}

}



?>
</ul>

</div>

</div>


 
<div class="clearer"></div>

                </div>
               
<!--Interests Ends--> 


              
              
              <div class="clearer"></div>
            </div>

          </div>




          


        <div class="screeningWrapper step6">

          
          <div class="filter">
             <input id="screening" name="screening[]" type="checkbox" value="Enabled" <?php if($screening != 'NULL' && $screening == 'Enabled') {echo "checked";}?>/>
               <label for="screening">
                <h2>I want to filter by screening question</h2></label>
             </div>





          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
                <div class="screening-description">
                  Ask a screening question to qualify or disqualify a participant, based upon the answer they select.<br>
                  If a user does not select one of the qualifying answers, they will not take part.
                </div>
                <h3>Screening question</h3>
                

  <textarea rows="3" tabindex="0" placeholder="Add your screening question here" name="screeningquestion" id="screeningquestion" <?php  if($screening == 'NULL') {echo "disabled";}?>><?php if($rowpotentialanswers['ScreeningQuestion'] != 'NULL'){echo $rowpotentialanswers['ScreeningQuestion'];}?></textarea>
               
              </div>

              <div class="separator"></div>

              <!-- ngRepeat: answer in screeningQuestion.answers --><div class="answersContainerDashboardScreening" ng-repeat="answer in screeningQuestion.answers">
                <div class="answerContainerDashboardScreening">
                  <div class="answerDashboardScreening">

 <div id="potential-answers" <?php if($screening == 'Enabled') {echo "style='display:block'";}?>> 

<div class="dashboardSurveyTargetingContainerPotentialAnswersInputContainer">
  <h3>Potential Answer 1</h3>
    <input class="form-control" type="text" name="potentialanswertext1" id="potentialanswertext1" value="<?php if($rowpotentialanswers['PotentialAnswer1'] != 'NULL'){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowpotentialanswers['PotentialAnswer1']); } ?>" />
   <input id="potentialanswer1" name="potentialansweraccepted[]" type="radio" value="Potential Answer 1" <?php if(in_array('Potential Answer 1',$potentialanswers)){echo "checked";}?>/>
  <label for="potentialanswer1">Accept this</label>
</div>


<div class="dashboardSurveyTargetingContainerPotentialAnswersInputContainer">
  <h3>Potential Answer 2</h3>
    <input class="form-control" type="text" name="potentialanswertext2" id="potentialanswertext2" value="<?php if($rowpotentialanswers['PotentialAnswer2'] != 'NULL'){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowpotentialanswers['PotentialAnswer2']); } ?>" />
   <input id="potentialanswer2" name="potentialansweraccepted[]" type="radio" value="Potential Answer 2" <?php if(in_array('Potential Answer 2',$potentialanswers)){echo "checked";}?>/>
  <label for="potentialanswer2">Accept this</label>
</div>

<div class="dashboardSurveyTargetingContainerPotentialAnswersInputContainer">
  <h3>Potential Answer 3</h3>
    <input class="form-control" type="text" name="potentialanswertext3" id="potentialanswertext3" value="<?php if($rowpotentialanswers['PotentialAnswer3'] != 'NULL'){echo $str = preg_replace('/(?<!\d),|,(?!\d{3})/', ', ', $rowpotentialanswers['PotentialAnswer3']); } ?>" />
   <input id="potentialanswer3" name="potentialansweraccepted[]" type="radio" value="Potential Answer 3" <?php if(in_array('Potential Answer 3',$potentialanswers)){echo "checked";}?>/>
  <label for="potentialanswer3">Accept this</label>
</div>

  
                  
                </div>


  



                  </div>
                </div>

              

                <div class="clearer"></div>
              </div><!-- end ngRepeat: answer in screeningQuestion.answers --><div class="answersContainerDashboardScreening" ng-repeat="answer in screeningQuestion.answers">
               

              
              
                

              

              
              </div><!-- end ngRepeat: answer in screeningQuestion.answers -->
            </div><!-- end ngIf: screeningEnabled -->
          </div>

       

        

     

 

     

      <p>&nbsp;</p>

 <div id="result"></div>
  
    <!--
<div id="savetargetaudience">
              <input type="submit" value="Save"/>

            </div>
-->
      <div id="savetargetaudience">
            
        <input type="submit" value="Save"/>

            </div>


              <div id="back">
              <a href="step2.php?<?php echo $_SESSION['projectid']; ?>">Create a Non-Disclosure Agreement</a>

            </div>

                    <div class="clearer"></div>


            
 </div>
 </div>

   <div class="container">
<!--Footer-->
<?php include("../../../footer.php"); ?>
<!--Footer-->
      </div>
      
          </div>

     


   


      

    </div>

 



</div>  



        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>