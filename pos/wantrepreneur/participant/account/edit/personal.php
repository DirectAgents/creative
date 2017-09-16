<?php
session_start();
require_once '../../../class.participant.php';
include_once("../../../config.php");

$startup_home = new PARTICIPANT();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../login/');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$age=explode(',',$row['Age']);
$gender=explode(',',$row['Gender']);
$height=explode(',',$row['Height']);
$status=explode(',',$row['Status']);
$ethnicity=explode(',',$row['Ethnicity']);
$smoke=explode(',',$row['Smoke']);
$drink=explode(',',$row['Drink']);
$diet=explode(',',$row['Diet']);
$religion=explode(',',$row['Religion']);
$education=explode(',',$row['Education']);
$job=explode(',',$row['Job']);
$languages=explode(',',$row['Languages']);
$industry_interest=explode(',',$row['Industry_Interest']);



?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../header.php"); ?>

<!--JAVASCRIPT-->
<script src="../js/script.js"></script>




<script type="text/javascript">
$(document).ready(function() {


  $("#languages").blur(function (e) {
       e.preventDefault();
     if($("#languages").val()==='')
      {
        //alert("Please enter a job position!");
        return false;
      }
      var myData = 'languages='+ $("#languages").val()+'&userid='+ $("#userid").val(); 
      jQuery.ajax({
      type: "POST", 
      url: "languages.php", 
      dataType:"text", 
      data:myData,
      success:function(response){
        $("#responds").append(response);
        $("#languages").val('');
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
      url: "languages.php", 
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
    $( "#languages" ).autocomplete({
      source: 'search_languages.php'
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

<a href="about-yourself.php">     
    <div class="col-md-6 processmenu-inactive">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>

      <div class="dashboardProcessMenuText"><span class="number">1</span> ABOUT YOURSELF <span class="icon-chevron-right"></span></div></div>
    <div class="col-md-6 processmenu-active">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>
</a>    
      <div class="dashboardProcessMenuText"><span class="number">2</span> PERSONAL INFORMATION <span class="icon-chevron-right"></span></div></div>
   
  </div>

    
  </div>
</div>





    <div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">


 

       


        <div class="screeningWrapper step2">




 






          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               


 <div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Age</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="age" name="age">
         
<?php
    for ($i=1; $i<=100; $i++)
    {
        ?>
            <option value="<?php echo $i;?>" <?php if(in_array($i,$age)){echo "selected";}?>><?php echo $i;?></option>
        <?php
    }
?>

         </select>



      </div>
    </div>


           


</div>
 </div>
    </div>


<p>&nbsp;</p>







          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               


 <div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Gender</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="gender" name="gender">
         
<option value="Male" <?php if(in_array('Male',$gender)){echo "selected";}?>>Male</option>
<option value="Female" <?php if(in_array('Female',$gender)){echo "selected";}?>>Female</option>

         </select>



      </div>
    </div>


                



</div>
 </div>
    </div>

<p>&nbsp;</p>







          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               

    

<div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Height</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="height" name="height">
         
<option value="50" <?php if(in_array(50,$height)){echo "selected";}?>>5'0"</option>
<option value="51" <?php if(in_array(51,$height)){echo "selected";}?>>5'1"</option>
<option value="52" <?php if(in_array(52,$height)){echo "selected";}?>>5'2"</option>
<option value="53" <?php if(in_array(53,$height)){echo "selected";}?>>5'3"</option>
<option value="54" <?php if(in_array(54,$height)){echo "selected";}?>>5'4"</option>
<option value="55" <?php if(in_array(55,$height)){echo "selected";}?>>5'5"</option>
<option value="56" <?php if(in_array(56,$height)){echo "selected";}?>>5'6"</option>
<option value="57" <?php if(in_array(57,$height)){echo "selected";}?>>5'7"</option>
<option value="58" <?php if(in_array(58,$height)){echo "selected";}?>>5'8"</option>
<option value="59" <?php if(in_array(59,$height)){echo "selected";}?>>5'9"</option>
<option value="510" <?php if(in_array(510,$height)){echo "selected";}?>>5'10"</option>
<option value="511" <?php if(in_array(511,$height)){echo "selected";}?>>5'11"</option>
<option value="60" <?php if(in_array(60,$height)){echo "selected";}?>>6'0"</option>
<option value="61" <?php if(in_array(61,$height)){echo "selected";}?>>6'1"</option>
<option value="62" <?php if(in_array(62,$height)){echo "selected";}?>>6'2"</option>
<option value="63" <?php if(in_array(63,$height)){echo "selected";}?>>6'3"</option>
<option value="64" <?php if(in_array(64,$height)){echo "selected";}?>>6'4"</option>

         </select>



      </div>
    </div>




</div>
 </div>
    </div>  


<p>&nbsp;</p>





          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               

<div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Status</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="status" name="status">
         
<option value="Sinlge" <?php if(in_array('Single',$status)){echo "selected";}?>>Single</option>
<option value="Married" <?php if(in_array('Married',$status)){echo "selected";}?>>Married</option>
<option value="Divorced" <?php if(in_array('Divorced',$status)){echo "selected";}?>>Divorced</option>
<option value="Widowed" <?php if(in_array('Widowed',$status)){echo "selected";}?>>Widowed</option>


         </select>



      </div>
    </div>
                




</div>
 </div>
    </div>  


<p>&nbsp;</p>







          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               

 

<div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Ethnicity</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="ethnicity" name="ethnicity">
         
<option value="Asian" <?php if(in_array('Asian',$ethnicity)){echo "selected";}?>>Asian</option>
<option value="Black" <?php if(in_array('Black',$ethnicity)){echo "selected";}?>>Black</option>
<option value="Hispanic/Latin" <?php if(in_array('Hispanic/Latin',$ethnicity)){echo "selected";}?>>Hispanic/Latin</option>
<option value="Indian" <?php if(in_array('Indian',$ethnicity)){echo "selected";}?>>Indian</option>
<option value="Middle Eastern" <?php if(in_array('Middle Eastern',$ethnicity)){echo "selected";}?>>Middle Eastern</option>
<option value="Native American" <?php if(in_array('Native American',$ethnicity)){echo "selected";}?>>Native American</option>
<option value="Pacific Islander" <?php if(in_array('Pacific Islander',$ethnicity)){echo "selected";}?>>Pacific Islander</option>
<option value="White" <?php if(in_array('White',$ethnicity)){echo "selected";}?>>White</option>
<option value="Other" <?php if(in_array('Other',$ethnicity)){echo "selected";}?>>Other</option>


         </select>



      </div>
    </div>





</div>
 </div>
    </div>  

<p>&nbsp;</p>






          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               


<div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Do you smoke?</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="smoke" name="smoke">
         
<option value="Yes" <?php if(in_array('Yes',$smoke)){echo "selected";}?>>Yes</option>
<option value="No" <?php if(in_array('No',$smoke)){echo "selected";}?>>No</option>
<option value="Sometimes" <?php if(in_array('Sometimes',$smoke)){echo "selected";}?>>Sometimes</option>
<option value="When drinking" <?php if(in_array('When drinking',$smoke)){echo "selected";}?>>When drinking</option>
<option value="Trying to quit" <?php if(in_array('Trying to quit',$smoke)){echo "selected";}?>>Trying to quit</option>


         </select>



      </div>
    </div>

               




</div>
 </div>
    </div> 

<p>&nbsp;</p>






          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               




<div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Do you Drink Alcohol?</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="drink" name="drink">
         
<option value="Very Often" <?php if(in_array('Very Often',$drink)){echo "selected";}?>>Very Often</option>
<option value="Often" <?php if(in_array('Often',$drink)){echo "selected";}?>>Often</option>
<option value="Socially" <?php if(in_array('Socially',$drink)){echo "selected";}?>>Socially</option>
<option value="Rarely" <?php if(in_array('Rarely',$drink)){echo "selected";}?>>Rarely</option>
<option value="Desperately" <?php if(in_array('Desperately',$drink)){echo "selected";}?>>Desperately</option>
<option value="Not at all" <?php if(in_array('Not at all',$drink)){echo "selected";}?>>Not at all</option>


         </select>



      </div>
    </div>

                


 

</div>
 </div>
    </div>       



<p>&nbsp;</p>






          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               



<div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>What is your Diet?</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="diet" name="diet">
         
<option value="Vegetarian" <?php if(in_array('Vegetarian',$diet)){echo "selected";}?>>Vegetarian</option>
<option value="Vegan" <?php if(in_array('Vegan',$diet)){echo "selected";}?>>Vegan</option>
<option value="Kosher" <?php if(in_array('Kosher',$diet)){echo "selected";}?>>Kosher</option>
<option value="Halal" <?php if(in_array('Halal',$diet)){echo "selected";}?>>Halal</option>
<option value="Eat everything" <?php if(in_array('Eat everything',$diet)){echo "selected";}?>>Eat everything</option>


         </select>



      </div>
    </div>                



</div>
 </div>
    </div> 

<p>&nbsp;</p>







          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               

 
<div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>What is your Religion?</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="religion" name="religion">
         
<option value="Agnostic" <?php if(in_array('Agnostic',$religion)){echo "selected";}?>>Agnostic</option>
<option value="Atheist" <?php if(in_array('Atheist',$religion)){echo "selected";}?>>Atheist</option>
<option value="Buddhist" <?php if(in_array('Buddhist',$religion)){echo "selected";}?>>Buddhist</option>
<option value="Catholic" <?php if(in_array('Catholic',$religion)){echo "selected";}?>>Catholic</option>
<option value="Christian" <?php if(in_array('Christian',$religion)){echo "selected";}?>>Christian</option>
<option value="Hindu" <?php if(in_array('Hindu',$religion)){echo "selected";}?>>Hindu</option>
<option value="Jewish" <?php if(in_array('Jewish',$religion)){echo "selected";}?>>Jewish</option>
<option value="Muslim" <?php if(in_array('Muslim',$religion)){echo "selected";}?>>Muslim</option>
<option value="Sikh" <?php if(in_array('Sikh',$religion)){echo "selected";}?>>Sikh</option>
<option value="Other" <?php if(in_array('Other',$religion)){echo "selected";}?>>Other</option>



         </select>



      </div>
    </div>                   



</div>
 </div>
    </div>     



<p>&nbsp;</p>
 





          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               



<div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Level of Education</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="education" name="education">
         
<option value="High School" <?php if(in_array('High School',$education)){echo "selected";}?>>High School</option>
<option value="2-year college" <?php if(in_array('2-year college',$education)){echo "selected";}?>>2-year college</option>
<option value="University" <?php if(in_array('University',$education)){echo "selected";}?>>University</option>
<option value="Post grad" <?php if(in_array('Post grad',$education)){echo "selected";}?>>Post grad</option>



         </select>



      </div>
    </div>               


 

</div>
 </div>
    </div>        


<p>&nbsp;</p>







          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               

 
 <div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Area of Occupation</h2></label>
      <div class="col-sm-12">
       
        <select class="form-control select-holder" id="job" name="job">
         
<option value="Student" <?php if(in_array('Student',$job)){echo "selected";}?>>Student</option>
<option value="BankingFinance" <?php if(in_array('BankingFinance',$job)){echo "selected";}?>>BankingFinance</option>
<option value="Administration" <?php if(in_array('Administration',$job)){echo "selected";}?>>Administration</option>
<option value="Technology" <?php if(in_array('Technology',$job)){echo "selected";}?>>Technology</option>
<option value="Construction" <?php if(in_array('Construction',$job)){echo "selected";}?>>Construction</option>
<option value="Education" <?php if(in_array('Education',$job)){echo "selected";}?>>Education</option>
<option value="EntertainmentMedia" <?php if(in_array('EntertainmentMedia',$job)){echo "selected";}?>>EntertainmentMedia</option>
<option value="Management" <?php if(in_array('Management',$job)){echo "selected";}?>>Management</option>
<option value="Hospitality" <?php if(in_array('Hospitality',$job)){echo "selected";}?>>Hospitality</option>
<option value="Law" <?php if(in_array('Law',$job)){echo "selected";}?>>Law</option>
<option value="Medicine" <?php if(in_array('Medicine',$job)){echo "selected";}?>>Medicine</option>
<option value="Military" <?php if(in_array('Military',$job)){echo "selected";}?>>Military</option>
<option value="SalesMarketing" <?php if(in_array('SalesMarketing',$job)){echo "selected";}?>>SalesMarketing</option>
<option value="ScienceEngineering" <?php if(in_array('ScienceEngineering',$job)){echo "selected";}?>>ScienceEngineering</option>
<option value="Transportation" <?php if(in_array('Transportation',$job)){echo "selected";}?>>Transportation</option>
<option value="Other" <?php if(in_array('Other',$job)){echo "selected";}?>>Other</option>



         </select>



      </div>
    </div>                 



</div>
 </div>
    </div>   

<p>&nbsp;</p>







          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               

 
 <div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Languages</h2></label>
      <div class="col-sm-12">

            <div class="screening-description">
                  Select the languages you speak frequently
                </div>
       
    <div class="in-person">
               <input class="form-control"  name="languages" id="languages" type="text" placeholder="Enter here the languages you speak"/>
              </div>



              <div class="content_wrapper">





<ul id="responds">
<?php
//include db configuration file

echo '<input type="hidden" name="userid" id="userid" value="'.$row["userID"].'">';


//MySQL query
$Result = mysql_query("SELECT * FROM tbl_participant_languages WHERE userID = '".$_SESSION['participantSession']."' ");



//get all records from add_delete_record table
while($row2 = mysql_fetch_array($Result))
{





echo '<li id="item_'.$row2['id'].'">';
echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row2['id'].'">';
echo '<img src="../../../images/icon_del.gif" border="0" class="icon_del" />';
echo '</a></div>';
//echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
echo $row2['Languages'].'</li>';

}


//close db connection
mysql_close($connecDB);
?>
</ul>

</div>



      </div>
    </div>                 



</div>
 </div>
    </div>   

<p>&nbsp;</p>






 <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
               

 
 <div class="form-group">
      <label class="control-label col-sm-12" for="country"> <h2>Interests</h2></label>
      <div class="col-sm-12">

            <div class="screening-description">
                  Select your interests
                </div>
       
    <div class="in-person">
               <input class="form-control"  name="languages" id="languages" type="text" placeholder="Enter here the languages you speak"/>
              </div>



              <div class="content_wrapper">



<div class="checked-interests">

<div class="checked-artsandentertainment">
   
    <input type="checkbox" id="Artsandentertainment" class="Artsandentertainment" name="industry_interest[]" value="Arts and Entertainment" <?php if(in_array('Arts and Entertainment',$industry_interest)){echo "checked";}?> />

    <label for="Artsandentertainment">Arts & Entertainment</label>
  </div>

  <div class="checked-businessandcareer">
   
    <input type="checkbox" id="Businessandcareer" class="Businessandcareer" name="industry_interest[]" value="Business and Career" <?php if(in_array('Business and Career',$industry_interest)){echo "checked";}?>  />
     <label for="Businessandcareer">Business & Career</label>
  </div>

    <div class="checked-communitiesandlifestyles">
   
    <input type="checkbox" id="Communitiesandlifestyles" name="industry_interest[]" value="Communities and Lifestyles" <?php if(in_array('Communities and Lifestyles',$industry_interest)){echo "checked";}?>/>
     <label for="Communitiesandlifestyles">Communities & Lifestyles</label>
  </div>

  <div class="checked-culturesandlanguages">
  
    <input type="checkbox" id="Culturesandlanguages" name="industry_interest[]" value="Agriculture" <?php if(in_array('Agriculture',$industry_interest)){echo "checked";}?>/>
     <label for="Culturesandlanguages">Cultures and Languages</label>
  </div>

    <div class="checked-healthandsupport">
   
    <input type="checkbox" id="Healthandsupport" name="industry_interest[]" value="Health and Support"  <?php if(in_array('Health and Support',$industry_interest)){echo "checked";}?>/>
     <label for="Healthandsupport">Health and Support</label>
  </div>

   <div class="checked-hobbies">
   
    <input type="checkbox" id="Hobbies" name="industry_interest[]" value="Hobbies" <?php if(in_array('Hobbies',$industry_interest)){echo "checked";}?>/>
      <label for="Hobbies">Health and Support</label>
  </div>

  <div class="checked-internetandtechnology">
   
    <input type="checkbox" id="Internetandtechnology" name="industry_interest[]" value="Internet and Technology" <?php if(in_array('Internet and Technology',$industry_interest)){echo "checked";}?> />
      <label for="Internetandtechnology">Internet and Technology</label>
  </div>

  <div class="checked-parentingandfamily">
   
    <input type="checkbox" id="Parentingandfamily" name="industry_interest[]" value="Parenting and Family" <?php if(in_array('Parenting and Family',$industry_interest)){echo "checked";}?>/>
     <label for="Parentingandfamily">Parenting & Family</label>
  </div>


   <div class="checked-petsandanimals">
   
    <input type="checkbox" id="Petsandanimals" name="industry_interest[]" value="Pets and Animals" <?php if(in_array('Pets and Animals',$industry_interest)){echo "checked";}?> />
     <label for="Petsandanimals">Pets & Animals</label>
  </div>


<div class="checked-politicsandactivism">
   
    <input type="checkbox" id="Politicsandactivism" name="industry_interest[]" value="Politics and Activism" <?php if(in_array('Politics and Activism',$industry_interest)){echo "checked";}?>/>
      <label for="Politicsandactivism">Politics & Activism</label>
  </div>


  <div class="checked-religionandbeliefs">
   
    <input type="checkbox" id="Religionandbeliefs" name="industry_interest[]" value="Religion and Beliefs" <?php if(in_array('Religion and Beliefs',$industry_interest)){echo "checked";}?>/>
     <label for="Religionandbeliefs">Religion & Beliefs</label>
  </div>

<div class="checked-science">
  
    <input type="checkbox" id="Science" name="industry_interest[]" value="Science" <?php if(in_array('Science',$industry_interest)){echo "checked";}?>/>
     <label for="Science">Science</label>
  </div>

  <div class="checked-social">
  
    <input type="checkbox" id="Social" name="industry_interest[]" value="Social" <?php if(in_array('Social',$industry_interest)){echo "checked";}?>/>
    <label for="Social">Social</label>
  </div>

  <div class="checked-sportsandrecreation">
   
    <input type="checkbox" id="Sportsandrecreation" name="industry_interest[]" value="Sports and Recreation" <?php if(in_array('Sports and Recreation',$industry_interest)){echo "checked";}?>/>
       <label for="Sportsandrecreation">Sports and Recreation</label>
  </div>

   <div class="checked-education">
   
    <input type="checkbox" id="Education" name="industry_interest[]" value="Education" <?php if(in_array('Education',$industry_interest)){echo "checked";}?> />
      <label for="Education">Education</label>
  </div>


</div>





</div>



      </div>
    </div>                 



</div>
 </div>
    </div>   

<p>&nbsp;</p>




          
      




            </div>
           </div>   
         

        

        
 <div id="result"></div>
      
</div>



 <div id="savesteptwo">
              <input type="submit" value="Save"/>

            </div>

     

             <div id="back">
              <a href="about-yourself.php">< Back</a>

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