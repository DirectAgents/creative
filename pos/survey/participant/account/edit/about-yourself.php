<?php
session_start();
require_once '../../../class.participant.php';
include_once("../../../config.php");

$researcher_home = new PARTICIPANT();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('login.php');
}

$stmt = $researcher_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$Project = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$rowproject = mysql_fetch_array($Project);




?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../header.php"); ?>


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
              $('#saveprojectsummary').click();
                  });
              $('#imagestatus').val('');
            }
        });
    }
    else
    {
        //alert("Please Choose file!");
        $(function() {
    $('#saveprojectsummary').click();
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
    <div class="col-md-6 processmenu-active">
<div class="onboarding-trigger-menu" ng-click="initTour()" ng-show="!user.isDeveloper" role="button" tabindex="0" aria-hidden="false">
      <span class="fa-stack fa-md">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-info fa-stack-1x"></i>
      </span>
    </div>

      <div class="dashboardProcessMenuText"><span class="number">1</span> ABOUT YOURSELF <span class="icon-chevron-right"></span></div></div>
    <div class="col-md-6 processmenu-inactive">
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







           

  <div class="filter">
             
               <label for="screening"><span ng-click="enableScreening()" role="button" tabindex="0">
                <h2>Upload Photo</h2></span></label><br><br>
             </div>


          
            <div class="wrapper">

              <div id='preview'>
   
   <?php if($rowproject['profile_image'] != ''){ ?>
          <img src="../../../images/profile/<?PHP echo $row['profile_image']; ?>" class="preview">
       
  <?php }else{ ?>

 <img src="../../../images/profile/thumbnail.jpg" class="preview">

  <?php } ?>

</div>

   <div id="message"></div><br/>    
   <input type="hidden" name="imagestatus" id="imagestatus"/>
   <img src="" id="ShowImage" style="display:none;">
   <label>File:</label>
   <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpeg,.png,.jpeg,.gif" /><br/><br/>
  


</div>
            



          
          <div class="filter">
             
               <label for="screening"><span ng-click="enableScreening()" role="button" tabindex="0">
                <h2>Tell us more about yourself</h2></span></label>
             </div>





          <div id="dashboardSurveyTargetingContainerScreening">

            <!-- ngIf: screeningEnabled --><div id="dashboardSurveyTargetingContainerScreeningText" ng-if="screeningEnabled" class="">
              <div id="dashboardSurveyTargetingContainerScreeningQuestion">
                <div class="screening-description">
                 Introduce yourself to potential projects
                </div>


                

  <textarea rows="5" tabindex="0" placeholder="Add your introduction here" name="bio" id="bio"><?php echo $row['Bio'];?></textarea>

                <div class="filter">
             
               <label for="screening"><span ng-click="enableScreening()" role="button" tabindex="0">
                <h2>Home Address (will be kept private)</h2></span></label><br><br>
             </div>
                




 <div class="form-group">
      <label class="control-label col-sm-2" for="street">Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="street" name="street" placeholder="Street Address" value="<?php echo $row['Street']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="city">City:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $row['City']; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="state">State:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="state" name="state" placeholder="State/Province/Region" value="<?php echo $row['State']; ?>">
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="zip">Zip:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip/Postal Code" value="<?php echo $row['Zip']; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="country">Country:</label>
      <div class="col-sm-10">
       
        <select class="form-control select-holder" id="country" name="country">
          <option value="">Select your country</option>
          <option value="AF">Afghanistan</option>
<option value="AX" <?php if($row['Country'] == 'AX') {echo "selected";} ?>>Åland Islands</option>
<option value="AL" <?php if($row['Country'] == 'AL') {echo "selected";} ?>>Albania</option>
<option value="DZ" <?php if($row['Country'] == 'DZ') {echo "selected";} ?>>Algeria</option>
<option value="AS" <?php if($row['Country'] == 'AS') {echo "selected";} ?>>American Samoa</option>
<option value="AD" <?php if($row['Country'] == 'AD') {echo "selected";} ?>>Andorra</option>
<option value="AO" <?php if($row['Country'] == 'AO') {echo "selected";} ?>>Angola</option>
<option value="AI" <?php if($row['Country'] == 'AI') {echo "selected";} ?>>Anguilla</option>
<option value="AQ" <?php if($row['Country'] == 'AQ') {echo "selected";} ?>>Antarctica</option>
<option value="AG" <?php if($row['Country'] == 'AG') {echo "selected";} ?>>Antigua and Barbuda</option>
<option value="AR" <?php if($row['Country'] == 'AR') {echo "selected";} ?>>Argentina</option>
<option value="AM" <?php if($row['Country'] == 'AM') {echo "selected";} ?>>Armenia</option>
<option value="AW" <?php if($row['Country'] == 'AW') {echo "selected";} ?>>Aruba</option>
<option value="AU" <?php if($row['Country'] == 'AU') {echo "selected";} ?>>Australia</option>
<option value="AT" <?php if($row['Country'] == 'AT') {echo "selected";} ?>>Austria</option>
<option value="AZ" <?php if($row['Country'] == 'AZ') {echo "selected";} ?>>Azerbaijan</option>
<option value="BS" <?php if($row['Country'] == 'BS') {echo "selected";} ?>>Bahamas</option>
<option value="BH" <?php if($row['Country'] == 'BH') {echo "selected";} ?>>Bahrain</option>
<option value="BD" <?php if($row['Country'] == 'BD') {echo "selected";} ?>>Bangladesh</option>
<option value="BB" <?php if($row['Country'] == 'BB') {echo "selected";} ?>>Barbados</option>
<option value="BY" <?php if($row['Country'] == 'BY') {echo "selected";} ?>>Belarus</option>
<option value="BE" <?php if($row['Country'] == 'BE') {echo "selected";} ?>>Belgium</option>
<option value="BZ" <?php if($row['Country'] == 'BZ') {echo "selected";} ?>>Belize</option>
<option value="BJ" <?php if($row['Country'] == 'BJ') {echo "selected";} ?>>Benin</option>
<option value="BM" <?php if($row['Country'] == 'BM') {echo "selected";} ?>>Bermuda</option>
<option value="BT" <?php if($row['Country'] == 'BT') {echo "selected";} ?>>Bhutan</option>
<option value="BO" <?php if($row['Country'] == 'BO') {echo "selected";} ?>>Bolivia, Plurinational State of</option>
<option value="BQ" <?php if($row['Country'] == 'BQ') {echo "selected";} ?>>Bonaire, Sint Eustatius and Saba</option>
<option value="BA" <?php if($row['Country'] == 'BA') {echo "selected";} ?>>Bosnia and Herzegovina</option>
<option value="BW" <?php if($row['Country'] == 'BW') {echo "selected";} ?>>Botswana</option>
<option value="BV" <?php if($row['Country'] == 'BV') {echo "selected";} ?>>Bouvet Island</option>
<option value="BR" <?php if($row['Country'] == 'BR') {echo "selected";} ?>>Brazil</option>
<option value="IO" <?php if($row['Country'] == 'IO') {echo "selected";} ?>>British Indian Ocean Territory</option>
<option value="BN" <?php if($row['Country'] == 'BN') {echo "selected";} ?>>Brunei Darussalam</option>
<option value="BG" <?php if($row['Country'] == 'BG') {echo "selected";} ?>>Bulgaria</option>
<option value="BF" <?php if($row['Country'] == 'BF') {echo "selected";} ?>>Burkina Faso</option>
<option value="BI" <?php if($row['Country'] == 'BI') {echo "selected";} ?>>Burundi</option>
<option value="KH" <?php if($row['Country'] == 'KH') {echo "selected";} ?>>Cambodia</option>
<option value="CM" <?php if($row['Country'] == 'CM') {echo "selected";} ?>>Cameroon</option>
<option value="CA" <?php if($row['Country'] == 'CA') {echo "selected";} ?>>Canada</option>
<option value="CV" <?php if($row['Country'] == 'CV') {echo "selected";} ?>>Cape Verde</option>
<option value="KY" <?php if($row['Country'] == 'KY') {echo "selected";} ?>>Cayman Islands</option>
<option value="CF" <?php if($row['Country'] == 'CF') {echo "selected";} ?>>Central African Republic</option>
<option value="TD" <?php if($row['Country'] == 'TD') {echo "selected";} ?>>Chad</option>
<option value="CL" <?php if($row['Country'] == 'CL') {echo "selected";} ?>>Chile</option>
<option value="CN" <?php if($row['Country'] == 'CN') {echo "selected";} ?>>China</option>
<option value="CX" <?php if($row['Country'] == 'CX') {echo "selected";} ?>>Christmas Island</option>
<option value="CC" <?php if($row['Country'] == 'CC') {echo "selected";} ?>>Cocos (Keeling) Islands</option>
<option value="CO" <?php if($row['Country'] == 'CO') {echo "selected";} ?>>Colombia</option>
<option value="KM" <?php if($row['Country'] == 'KM') {echo "selected";} ?>>Comoros</option>
<option value="CG" <?php if($row['Country'] == 'CG') {echo "selected";} ?>>Congo</option>
<option value="CD" <?php if($row['Country'] == 'CD') {echo "selected";} ?>>Congo, The Democratic Republic of the</option>
<option value="CK" <?php if($row['Country'] == 'CK') {echo "selected";} ?>>Cook Islands</option>
<option value="CR" <?php if($row['Country'] == 'CR') {echo "selected";} ?>>Costa Rica</option>
<option value="CI" <?php if($row['Country'] == 'CI') {echo "selected";} ?>>Côte d&#39;Ivoire</option>
<option value="HR" <?php if($row['Country'] == 'HR') {echo "selected";} ?>>Croatia</option>
<option value="CU" <?php if($row['Country'] == 'CU') {echo "selected";} ?>>Cuba</option>
<option value="CW" <?php if($row['Country'] == 'CW') {echo "selected";} ?>>Curaçao</option>
<option value="CY" <?php if($row['Country'] == 'CY') {echo "selected";} ?>>Cyprus</option>
<option value="CZ" <?php if($row['Country'] == 'CZ') {echo "selected";} ?>>Czech Republic</option>
<option value="DK" <?php if($row['Country'] == 'DK') {echo "selected";} ?>>Denmark</option>
<option value="DJ" <?php if($row['Country'] == 'DJ') {echo "selected";} ?>>Djibouti</option>
<option value="DM" <?php if($row['Country'] == 'DM') {echo "selected";} ?>>Dominica</option>
<option value="DO" <?php if($row['Country'] == 'DO') {echo "selected";} ?>>Dominican Republic</option>
<option value="EC" <?php if($row['Country'] == 'EC') {echo "selected";} ?>>Ecuador</option>
<option value="EG" <?php if($row['Country'] == 'EG') {echo "selected";} ?>>Egypt</option>
<option value="SV" <?php if($row['Country'] == 'SV') {echo "selected";} ?>>El Salvador</option>
<option value="GQ" <?php if($row['Country'] == 'GQ') {echo "selected";} ?>>Equatorial Guinea</option>
<option value="ER" <?php if($row['Country'] == 'ER') {echo "selected";} ?>>Eritrea</option>
<option value="EE" <?php if($row['Country'] == 'ES') {echo "selected";} ?>>Estonia</option>
<option value="ET" <?php if($row['Country'] == 'ET') {echo "selected";} ?>>Ethiopia</option>
<option value="FK" <?php if($row['Country'] == 'FK') {echo "selected";} ?>>Falkland Islands (Malvinas)</option>
<option value="FO" <?php if($row['Country'] == 'FO') {echo "selected";} ?>>Faroe Islands</option>
<option value="FJ" <?php if($row['Country'] == 'FJ') {echo "selected";} ?>>Fiji</option>
<option value="FI" <?php if($row['Country'] == 'FI') {echo "selected";} ?>>Finland</option>
<option value="FR" <?php if($row['Country'] == 'FR') {echo "selected";} ?>>France</option>
<option value="GF" <?php if($row['Country'] == 'GF') {echo "selected";} ?>>French Guiana</option>
<option value="PF" <?php if($row['Country'] == 'PF') {echo "selected";} ?>>French Polynesia</option>
<option value="TF" <?php if($row['Country'] == 'TF') {echo "selected";} ?>>French Southern Territories</option>
<option value="GA" <?php if($row['Country'] == 'GA') {echo "selected";} ?>>Gabon</option>
<option value="GM" <?php if($row['Country'] == 'GM') {echo "selected";} ?>>Gambia</option>
<option value="GE" <?php if($row['Country'] == 'GE') {echo "selected";} ?>>Georgia</option>
<option value="DE" <?php if($row['Country'] == 'DE') {echo "selected";} ?>>Germany</option>
<option value="GH" <?php if($row['Country'] == 'GH') {echo "selected";} ?>>Ghana</option>
<option value="GI" <?php if($row['Country'] == 'GI') {echo "selected";} ?>>Gibraltar</option>
<option value="GR" <?php if($row['Country'] == 'GR') {echo "selected";} ?>>Greece</option>
<option value="GL" <?php if($row['Country'] == 'GL') {echo "selected";} ?>>Greenland</option>
<option value="GD" <?php if($row['Country'] == 'GD') {echo "selected";} ?>>Grenada</option>
<option value="GP" <?php if($row['Country'] == 'GP') {echo "selected";} ?>>Guadeloupe</option>
<option value="GU" <?php if($row['Country'] == 'GU') {echo "selected";} ?>>Guam</option>
<option value="GT" <?php if($row['Country'] == 'GT') {echo "selected";} ?>>Guatemala</option>
<option value="GG" <?php if($row['Country'] == 'GG') {echo "selected";} ?>>Guernsey</option>
<option value="GN" <?php if($row['Country'] == 'GN') {echo "selected";} ?>>Guinea</option>
<option value="GW" <?php if($row['Country'] == 'GW') {echo "selected";} ?>>Guinea-Bissau</option>
<option value="GY" <?php if($row['Country'] == 'GY') {echo "selected";} ?>>Guyana</option>
<option value="HT" <?php if($row['Country'] == 'HT') {echo "selected";} ?>>Haiti</option>
<option value="HM" <?php if($row['Country'] == 'HM') {echo "selected";} ?>>Heard Island and McDonald Islands</option>
<option value="VA" <?php if($row['Country'] == 'VA') {echo "selected";} ?>>Holy See (Vatican City State)</option>
<option value="HN" <?php if($row['Country'] == 'HN') {echo "selected";} ?>>Honduras</option>
<option value="HK" <?php if($row['Country'] == 'HK') {echo "selected";} ?>>Hong Kong</option>
<option value="HU" <?php if($row['Country'] == 'HU') {echo "selected";} ?>>Hungary</option>
<option value="IS" <?php if($row['Country'] == 'IS') {echo "selected";} ?>>Iceland</option>
<option value="IN" <?php if($row['Country'] == 'IN') {echo "selected";} ?>>India</option>
<option value="ID" <?php if($row['Country'] == 'ID') {echo "selected";} ?>>Indonesia</option>
<option value="IR" <?php if($row['Country'] == 'IR') {echo "selected";} ?>>Iran, Islamic Republic of</option>
<option value="IQ" <?php if($row['Country'] == 'IQ') {echo "selected";} ?>>Iraq</option>
<option value="IE" <?php if($row['Country'] == 'IE') {echo "selected";} ?>>Ireland</option>
<option value="IM" <?php if($row['Country'] == 'IM') {echo "selected";} ?>>Isle of Man</option>
<option value="IL" <?php if($row['Country'] == 'IL') {echo "selected";} ?>>Israel</option>
<option value="IT" <?php if($row['Country'] == 'IT') {echo "selected";} ?>>Italy</option>
<option value="JM" <?php if($row['Country'] == 'JM') {echo "selected";} ?>>Jamaica</option>
<option value="JP" <?php if($row['Country'] == 'JP') {echo "selected";} ?>>Japan</option>
<option value="JE" <?php if($row['Country'] == 'JE') {echo "selected";} ?>>Jersey</option>
<option value="JO" <?php if($row['Country'] == 'JO') {echo "selected";} ?>>Jordan</option>
<option value="KZ" <?php if($row['Country'] == 'KZ') {echo "selected";} ?>>Kazakhstan</option>
<option value="KE" <?php if($row['Country'] == 'KE') {echo "selected";} ?>>Kenya</option>
<option value="KI" <?php if($row['Country'] == 'KI') {echo "selected";} ?>>Kiribati</option>
<option value="KP" <?php if($row['Country'] == 'KP') {echo "selected";} ?>>Korea, Democratic People&#39;s Republic of</option>
<option value="KR" <?php if($row['Country'] == 'KR') {echo "selected";} ?>>Korea, Republic of</option>
<option value="KW" <?php if($row['Country'] == 'KW') {echo "selected";} ?>>Kuwait</option>
<option value="KG" <?php if($row['Country'] == 'KG') {echo "selected";} ?>>Kyrgyzstan</option>
<option value="LA" <?php if($row['Country'] == 'LA') {echo "selected";} ?>>Lao People&#39;s Democratic Republic</option>
<option value="LV" <?php if($row['Country'] == 'LV') {echo "selected";} ?>>Latvia</option>
<option value="LB" <?php if($row['Country'] == 'LB') {echo "selected";} ?>>Lebanon</option>
<option value="LS" <?php if($row['Country'] == 'LS') {echo "selected";} ?>>Lesotho</option>
<option value="LR" <?php if($row['Country'] == 'LR') {echo "selected";} ?>>Liberia</option>
<option value="LY" <?php if($row['Country'] == 'LY') {echo "selected";} ?>>Libya</option>
<option value="LI" <?php if($row['Country'] == 'LI') {echo "selected";} ?>>Liechtenstein</option>
<option value="LT" <?php if($row['Country'] == 'LT') {echo "selected";} ?>>Lithuania</option>
<option value="LU" <?php if($row['Country'] == 'LU') {echo "selected";} ?>>Luxembourg</option>
<option value="MO" <?php if($row['Country'] == 'MO') {echo "selected";} ?>>Macao</option>
<option value="MK" <?php if($row['Country'] == 'MK') {echo "selected";} ?>>Macedonia, Republic of</option>
<option value="MG" <?php if($row['Country'] == 'MG') {echo "selected";} ?>>Madagascar</option>
<option value="MW" <?php if($row['Country'] == 'MW') {echo "selected";} ?>>Malawi</option>
<option value="MY" <?php if($row['Country'] == 'MY') {echo "selected";} ?>>Malaysia</option>
<option value="MV" <?php if($row['Country'] == 'MV') {echo "selected";} ?>>Maldives</option>
<option value="ML" <?php if($row['Country'] == 'ML') {echo "selected";} ?>>Mali</option>
<option value="MT" <?php if($row['Country'] == 'MT') {echo "selected";} ?>>Malta</option>
<option value="MH" <?php if($row['Country'] == 'MH') {echo "selected";} ?>>Marshall Islands</option>
<option value="MQ" <?php if($row['Country'] == 'MQ') {echo "selected";} ?>>Martinique</option>
<option value="MR" <?php if($row['Country'] == 'MR') {echo "selected";} ?>>Mauritania</option>
<option value="MU" <?php if($row['Country'] == 'MU') {echo "selected";} ?>>Mauritius</option>
<option value="YT" <?php if($row['Country'] == 'YT') {echo "selected";} ?>>Mayotte</option>
<option value="MX" <?php if($row['Country'] == 'MX') {echo "selected";} ?>>Mexico</option>
<option value="FM" <?php if($row['Country'] == 'FM') {echo "selected";} ?>>Micronesia, Federated States of</option>
<option value="MD" <?php if($row['Country'] == 'MD') {echo "selected";} ?>>Moldova, Republic of</option>
<option value="MC" <?php if($row['Country'] == 'MC') {echo "selected";} ?>>Monaco</option>
<option value="MN" <?php if($row['Country'] == 'MN') {echo "selected";} ?>>Mongolia</option>
<option value="ME" <?php if($row['Country'] == 'ME') {echo "selected";} ?>>Montenegro</option>
<option value="MS" <?php if($row['Country'] == 'MS') {echo "selected";} ?>>Montserrat</option>
<option value="MA" <?php if($row['Country'] == 'MA') {echo "selected";} ?>>Morocco</option>
<option value="MZ" <?php if($row['Country'] == 'MZ') {echo "selected";} ?>>Mozambique</option>
<option value="MM" <?php if($row['Country'] == 'MM') {echo "selected";} ?>>Myanmar</option>
<option value="NA" <?php if($row['Country'] == 'NA') {echo "selected";} ?>>Namibia</option>
<option value="NR" <?php if($row['Country'] == 'NR') {echo "selected";} ?>>Nauru</option>
<option value="NP" <?php if($row['Country'] == 'NP') {echo "selected";} ?>>Nepal</option>
<option value="AN" <?php if($row['Country'] == 'AN') {echo "selected";} ?>>Netherlands Antilles</option>
<option value="NL" <?php if($row['Country'] == 'NL') {echo "selected";} ?>>Netherlands</option>
<option value="NC" <?php if($row['Country'] == 'NC') {echo "selected";} ?>>New Caledonia</option>
<option value="NZ" <?php if($row['Country'] == 'NZ') {echo "selected";} ?>>New Zealand</option>
<option value="NI" <?php if($row['Country'] == 'NI') {echo "selected";} ?>>Nicaragua</option>
<option value="NE" <?php if($row['Country'] == 'NE') {echo "selected";} ?>>Niger</option>
<option value="NG" <?php if($row['Country'] == 'NG') {echo "selected";} ?>>Nigeria</option>
<option value="NU" <?php if($row['Country'] == 'NU') {echo "selected";} ?>>Niue</option>
<option value="NF" <?php if($row['Country'] == 'NF') {echo "selected";} ?>>Norfolk Island</option>
<option value="MP" <?php if($row['Country'] == 'MP') {echo "selected";} ?>>Northern Mariana Islands</option>
<option value="NO" <?php if($row['Country'] == 'NO') {echo "selected";} ?>>Norway</option>
<option value="OM" <?php if($row['Country'] == 'OM') {echo "selected";} ?>>Oman</option>
<option value="PK" <?php if($row['Country'] == 'PK') {echo "selected";} ?>>Pakistan</option>
<option value="PW" <?php if($row['Country'] == 'PW') {echo "selected";} ?>>Palau</option>
<option value="PS" <?php if($row['Country'] == 'PS') {echo "selected";} ?>>Palestine, State of</option>
<option value="PA" <?php if($row['Country'] == 'PA') {echo "selected";} ?>>Panama</option>
<option value="PG" <?php if($row['Country'] == 'PG') {echo "selected";} ?>>Papua New Guinea</option>
<option value="PY" <?php if($row['Country'] == 'PY') {echo "selected";} ?>>Paraguay</option>
<option value="PE" <?php if($row['Country'] == 'PE') {echo "selected";} ?>>Peru</option>
<option value="PH" <?php if($row['Country'] == 'PH') {echo "selected";} ?>>Philippines</option>
<option value="PN" <?php if($row['Country'] == 'PN') {echo "selected";} ?>>Pitcairn</option>
<option value="PL" <?php if($row['Country'] == 'PL') {echo "selected";} ?>>Poland</option>
<option value="PT" <?php if($row['Country'] == 'PT') {echo "selected";} ?>>Portugal</option>
<option value="PR" <?php if($row['Country'] == 'PR') {echo "selected";} ?>>Puerto Rico</option>
<option value="QA" <?php if($row['Country'] == 'QA') {echo "selected";} ?>>Qatar</option>
<option value="RE" <?php if($row['Country'] == 'RE') {echo "selected";} ?>>Réunion</option>
<option value="RO" <?php if($row['Country'] == 'RO') {echo "selected";} ?>>Romania</option>
<option value="RU" <?php if($row['Country'] == 'RU') {echo "selected";} ?>>Russian Federation</option>
<option value="RW" <?php if($row['Country'] == 'RW') {echo "selected";} ?>>Rwanda</option>
<option value="BL" <?php if($row['Country'] == 'BL') {echo "selected";} ?>>Saint Barthélemy</option>
<option value="SH" <?php if($row['Country'] == 'SH') {echo "selected";} ?>>Saint Helena, Ascension and Tristan da Cunha</option>
<option value="KN" <?php if($row['Country'] == 'KN') {echo "selected";} ?>>Saint Kitts and Nevis</option>
<option value="LC" <?php if($row['Country'] == 'LC') {echo "selected";} ?>>Saint Lucia</option>
<option value="MF" <?php if($row['Country'] == 'MF') {echo "selected";} ?>>Saint Martin (French part)</option>
<option value="PM" <?php if($row['Country'] == 'PM') {echo "selected";} ?>>Saint Pierre and Miquelon</option>
<option value="VC" <?php if($row['Country'] == 'VC') {echo "selected";} ?>>Saint Vincent and the Grenadines</option>
<option value="WS" <?php if($row['Country'] == 'WS') {echo "selected";} ?>>Samoa</option>
<option value="SM" <?php if($row['Country'] == 'SM') {echo "selected";} ?>>San Marino</option>
<option value="ST" <?php if($row['Country'] == 'ST') {echo "selected";} ?>>Sao Tome and Principe</option>
<option value="SA" <?php if($row['Country'] == 'SA') {echo "selected";} ?>>Saudi Arabia</option>
<option value="SN" <?php if($row['Country'] == 'SN') {echo "selected";} ?>>Senegal</option>
<option value="RS" <?php if($row['Country'] == 'RS') {echo "selected";} ?>>Serbia</option>
<option value="SC" <?php if($row['Country'] == 'SC') {echo "selected";} ?>>Seychelles</option>
<option value="SL" <?php if($row['Country'] == 'SL') {echo "selected";} ?>>Sierra Leone</option>
<option value="SG" <?php if($row['Country'] == 'SG') {echo "selected";} ?>>Singapore</option>
<option value="SX" <?php if($row['Country'] == 'SX') {echo "selected";} ?>>Sint Maarten (Dutch part)</option>
<option value="SK" <?php if($row['Country'] == 'SK') {echo "selected";} ?>>Slovakia</option>
<option value="SI" <?php if($row['Country'] == 'SI') {echo "selected";} ?>>Slovenia</option>
<option value="SB" <?php if($row['Country'] == 'SB') {echo "selected";} ?>>Solomon Islands</option>
<option value="SO" <?php if($row['Country'] == 'SO') {echo "selected";} ?>>Somalia</option>
<option value="ZA" <?php if($row['Country'] == 'ZA') {echo "selected";} ?>>South Africa</option>
<option value="GS" <?php if($row['Country'] == 'GS') {echo "selected";} ?>>South Georgia and the South Sandwich Islands</option>
<option value="SS" <?php if($row['Country'] == 'SS') {echo "selected";} ?>>South Sudan</option>
<option value="ES" <?php if($row['Country'] == 'ES') {echo "selected";} ?>>Spain</option>
<option value="LK" <?php if($row['Country'] == 'LK') {echo "selected";} ?>>Sri Lanka</option>
<option value="SD" <?php if($row['Country'] == 'SD') {echo "selected";} ?>>Sudan</option>
<option value="SR" <?php if($row['Country'] == 'SR') {echo "selected";} ?>>Suriname</option>
<option value="SJ" <?php if($row['Country'] == 'SJ') {echo "selected";} ?>>Svalbard and Jan Mayen</option>
<option value="SZ" <?php if($row['Country'] == 'SZ') {echo "selected";} ?>>Swaziland</option>
<option value="SE" <?php if($row['Country'] == 'SE') {echo "selected";} ?>>Sweden</option>
<option value="CH" <?php if($row['Country'] == 'CH') {echo "selected";} ?>>Switzerland</option>
<option value="SY" <?php if($row['Country'] == 'SY') {echo "selected";} ?>>Syrian Arab Republic</option>
<option value="TW" <?php if($row['Country'] == 'TW') {echo "selected";} ?>>Taiwan</option>
<option value="TJ" <?php if($row['Country'] == 'TJ') {echo "selected";} ?>>Tajikistan</option>
<option value="TZ" <?php if($row['Country'] == 'TZ') {echo "selected";} ?>>Tanzania, United Republic of</option>
<option value="TH" <?php if($row['Country'] == 'TH') {echo "selected";} ?>>Thailand</option>
<option value="TL" <?php if($row['Country'] == 'TL') {echo "selected";} ?>>Timor-Leste</option>
<option value="TG" <?php if($row['Country'] == 'TG') {echo "selected";} ?>>Togo</option>
<option value="TK" <?php if($row['Country'] == 'TK') {echo "selected";} ?>>Tokelau</option>
<option value="TO" <?php if($row['Country'] == 'TO') {echo "selected";} ?>>Tonga</option>
<option value="TT" <?php if($row['Country'] == 'TT') {echo "selected";} ?>>Trinidad and Tobago</option>
<option value="TN" <?php if($row['Country'] == 'TN') {echo "selected";} ?>>Tunisia</option>
<option value="TR" <?php if($row['Country'] == 'TR') {echo "selected";} ?>>Turkey</option>
<option value="TM" <?php if($row['Country'] == 'TM') {echo "selected";} ?>>Turkmenistan</option>
<option value="TC" <?php if($row['Country'] == 'TC') {echo "selected";} ?>>Turks and Caicos Islands</option>
<option value="TV" <?php if($row['Country'] == 'TV') {echo "selected";} ?>>Tuvalu</option>
<option value="UG" <?php if($row['Country'] == 'UG') {echo "selected";} ?>>Uganda</option>
<option value="UA" <?php if($row['Country'] == 'UA') {echo "selected";} ?>>Ukraine</option>
<option value="AE" <?php if($row['Country'] == 'AE') {echo "selected";} ?>>United Arab Emirates</option>
<option value="GB" <?php if($row['Country'] == 'GB') {echo "selected";} ?>>United Kingdom</option>
<option value="UM" <?php if($row['Country'] == 'UM') {echo "selected";} ?>>United States Minor Outlying Islands</option>
<option value="US" <?php if($row['Country'] == 'US') {echo "selected";} ?>>United States</option>
<option value="UY" <?php if($row['Country'] == 'UY') {echo "selected";} ?>>Uruguay</option>
<option value="UZ" <?php if($row['Country'] == 'UZ') {echo "selected";} ?>>Uzbekistan</option>
<option value="VU" <?php if($row['Country'] == 'VU') {echo "selected";} ?>>Vanuatu</option>
<option value="VE" <?php if($row['Country'] == 'VE') {echo "selected";} ?>>Venezuela, Bolivarian Republic of</option>
<option value="VN" <?php if($row['Country'] == 'VN') {echo "selected";} ?>>Viet Nam</option>
<option value="VG" <?php if($row['Country'] == 'VG') {echo "selected";} ?>>Virgin Islands, British</option>
<option value="VI" <?php if($row['Country'] == 'VI') {echo "selected";} ?>>Virgin Islands, U.S.</option>
<option value="WF" <?php if($row['Country'] == 'WF') {echo "selected";} ?>>Wallis and Futuna</option>
<option value="EH" <?php if($row['Country'] == 'EH') {echo "selected";} ?>>Western Sahara</option>
<option value="YE" <?php if($row['Country'] == 'YE') {echo "selected";} ?>>Yemen</option>
<option value="ZM" <?php if($row['Country'] == 'ZM') {echo "selected";} ?>>Zambia</option>
<option value="ZW" <?php if($row['Country'] == 'ZW') {echo "selected";} ?>>Zimbabwe</option></select>



      </div>
    </div>


               
              </div>

             <p>&nbsp;</p>


              

                <div class="clearer"></div>
              </div>



             

              
              </div>
            </div>
           </div>   
         

         

        

      
</div>

 <div id="result"></div>

 <div id="saveprojectsummary">
              <input type="submit" value="Save"/>

            </div>

      <div id="saveandcontinueprojectsummary">
              
        <input type="submit" value="Save And Continue"/>

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



</form>


        
    </body>

</html>