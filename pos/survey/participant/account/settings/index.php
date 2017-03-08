<?php
session_start();

require_once '../../../base_path.php';


require_once '../../../class.participant.php';
require_once '../../../class.startup.php';
include_once("../../../config.php");


$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../login');
}


$profileimage = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$rowimage = mysqli_fetch_array($profileimage);

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
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


$payment_method=explode(',',$row['Payment_Method']);

$emailnotifications=explode(',',$row['EmailNotifications']);


  




?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">    
    <head>

<?php include("../../header.php"); ?>
    

<script src="../js/script.js"></script>


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
      var myData = 'interests='+ $("#interests").val()+'&userid='+ $("#userid").val(); 
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
     var myData = 'recordToDelete='+ DbNumberID; 
     
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
        $("#responds-languages").append(response);
        $("#languages").val('');
      },
      error:function (xhr, ajaxOptions, thrownError){
        alert(thrownError);
      }
      });
  });

  $("body").on("click", "#responds-languages .del_button", function(e) {
     e.preventDefault();
     var clickedID = this.id.split('-'); 
     //var DbNumberID =   $('input[name="interestselection[]"]:checked').map(function () {return this.value;}).get().join(",");
     var DbNumberID = clickedID[1]; 
     var myData = 'recordToDelete='+ DbNumberID; 
     
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
    $( "#interests" ).autocomplete({
      source: 'search-interest.php'
    });
  });

   $(function() {
    $( "#languages" ).autocomplete({
      source: 'search-languages.php'
    });
  });

  </script>






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
  
        


    <!-- Main -->








 <div class="clearer"></div>

  <div class="container">
    <div id="white-container-account">
      






    
    

    <div id="a">

<div class="row">
  <div class="col-sm-6">


<div id='preview'>

<?php if($row['google_picture_link'] != ''){ ?>
        <img src="<?php echo $_SESSION['google_picture_link']; ?>" class="profile-photo"/>
<?php } ?>

<?php if($row['facebook_id'] != '0'){  ?>
       
        <img src="https://graph.facebook.com/<?php echo $_SESSION['facebook_photo']; ?>/picture?width=150&height=150" class="profile-photo">

<?php } ?>
       
<?php if($row['google_picture_link'] == '' && $row['facebook_id'] == '0'){ ?>

<?php if($row['profile_image'] != ''){
        echo '<img src="'.BASE_PATH.'/images/profile/participant/'.$_SESSION['profileimage'].'" class="profile-photo"/>';
}else{
        echo '
  
   <img src="'.BASE_PATH.'/images/profile/thumbnail.jpg" class="profile-photo"/>';
 } ?>

<?php } ?>

</div>


<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
Update your image <input type="file" name="photoimg" id="photoimg" />
</form>



        

  </div>

   <div class="col-sm-5">
        <!--
        <a href="<?php echo BASE_PATH; ?>/participant/account/settings/availability/option1/" role="button" class="111slide_open">
  <button type="button" class="btn-request">
  Update your availability</button></a>-->

<p>&nbsp;</p>
  <a href="<?php echo BASE_PATH; ?>/participant/account/settings/nda/" role="button" class="111slide_open">
  <button type="button" class="btn-request">
  Non-disclosure Agreements</button></a>
       

  </div>
  
</div>        

      

     
   

    <div id="result-photo"></div>



  
   <iframe name="votar" style="display:none;"></iframe>
        
    <form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        
         <p>&nbsp;</p>

        <h2 class="no-mobile">
          Basic information
        </h2>

        <fieldset>
          <span class="input">
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname" placeholder="John Doe" value="<?php echo $row['FirstName']; ?>" class="validate">
          </span>
           <span class="input">
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname" placeholder="John Doe" value="<?php echo $row['LastName']; ?>" class="validate">
          </span>
        </fieldset>

        

        

        <fieldset>
          <span class="input">
            <label for="">Email</label>
            <input type="email" name="email" placeholder="Your Email Address" value="<?php echo $row['userEmail']; ?>">
          </span>
          <span class="input select cell-phone">
            <label for="phone_number">Cell Phone</label>
            <!--<span class="select-wrapper">
              <select name="country_code">
                
              
                  <option selected="" value="1">+1</option>
                
                  <option value="20">+20</option>
                
                  <option value="212">+212</option>
                
                  <option value="213">+213</option>
                
                  <option value="216">+216</option>
                
                  <option value="218">+218</option>
                
                  <option value="220">+220</option>
                
                  <option value="221">+221</option>
                
                  <option value="222">+222</option>
                
                  <option value="223">+223</option>
                
                  <option value="224">+224</option>
                
                  <option value="225">+225</option>
                
                  <option value="226">+226</option>
                
                  <option value="227">+227</option>
                
                  <option value="228">+228</option>
                
                  <option value="229">+229</option>
                
                  <option value="230">+230</option>
                
                  <option value="231">+231</option>
                
                  <option value="232">+232</option>
                
                  <option value="233">+233</option>
                
                  <option value="234">+234</option>
                
                  <option value="235">+235</option>
                
                  <option value="236">+236</option>
                
                  <option value="237">+237</option>
                
                  <option value="238">+238</option>
                
                  <option value="239">+239</option>
                
                  <option value="240">+240</option>
                
                  <option value="241">+241</option>
                
                  <option value="242">+242</option>
                
                  <option value="243">+243</option>
                
                  <option value="244">+244</option>
                
                  <option value="245">+245</option>
                
                  <option value="248">+248</option>
                
                  <option value="249">+249</option>
                
                  <option value="250">+250</option>
                
                  <option value="251">+251</option>
                
                  <option value="252">+252</option>
                
                  <option value="253">+253</option>
                
                  <option value="254">+254</option>
                
                  <option value="255">+255</option>
                
                  <option value="256">+256</option>
                
                  <option value="257">+257</option>
                
                  <option value="258">+258</option>
                
                  <option value="260">+260</option>
                
                  <option value="261">+261</option>
                
                  <option value="262">+262</option>
                
                  <option value="263">+263</option>
                
                  <option value="264">+264</option>
                
                  <option value="265">+265</option>
                
                  <option value="266">+266</option>
                
                  <option value="267">+267</option>
                
                  <option value="268">+268</option>
                
                  <option value="269">+269</option>
                
                  <option value="27">+27</option>
                
                  <option value="290">+290</option>
                
                  <option value="291">+291</option>
                
                  <option value="297">+297</option>
                
                  <option value="298">+298</option>
                
                  <option value="299">+299</option>
                
                  <option value="30">+30</option>
                
                  <option value="31">+31</option>
                
                  <option value="32">+32</option>
                
                  <option value="33">+33</option>
                
                  <option value="34">+34</option>
                
                  <option value="350">+350</option>
                
                  <option value="351">+351</option>
                
                  <option value="352">+352</option>
                
                  <option value="353">+353</option>
                
                  <option value="354">+354</option>
                
                  <option value="355">+355</option>
                
                  <option value="356">+356</option>
                
                  <option value="357">+357</option>
                
                  <option value="358">+358</option>
                
                  <option value="359">+359</option>
                
                  <option value="36">+36</option>
                
                  <option value="370">+370</option>
                
                  <option value="371">+371</option>
                
                  <option value="372">+372</option>
                
                  <option value="373">+373</option>
                
                  <option value="374">+374</option>
                
                  <option value="375">+375</option>
                
                  <option value="376">+376</option>
                
                  <option value="377">+377</option>
                
                  <option value="378">+378</option>
                
                  <option value="380">+380</option>
                
                  <option value="381">+381</option>
                
                  <option value="382">+382</option>
                
                  <option value="385">+385</option>
                
                  <option value="386">+386</option>
                
                  <option value="387">+387</option>
                
                  <option value="389">+389</option>
                
                  <option value="39">+39</option>
                
                  <option value="40">+40</option>
                
                  <option value="41">+41</option>
                
                  <option value="420">+420</option>
                
                  <option value="421">+421</option>
                
                  <option value="423">+423</option>
                
                  <option value="43">+43</option>
                
                  <option value="44">+44</option>
                
                  <option value="45">+45</option>
                
                  <option value="46">+46</option>
                
                  <option value="47">+47</option>
                
                  <option value="48">+48</option>
                
                  <option value="49">+49</option>
                
                  <option value="500">+500</option>
                
                  <option value="501">+501</option>
                
                  <option value="502">+502</option>
                
                  <option value="503">+503</option>
                
                  <option value="504">+504</option>
                
                  <option value="505">+505</option>
                
                  <option value="506">+506</option>
                
                  <option value="507">+507</option>
                
                  <option value="508">+508</option>
                
                  <option value="509">+509</option>
                
                  <option value="51">+51</option>
                
                  <option value="52">+52</option>
                
                  <option value="53">+53</option>
                
                  <option value="54">+54</option>
                
                  <option value="55">+55</option>
                
                  <option value="56">+56</option>
                
                  <option value="57">+57</option>
                
                  <option value="58">+58</option>
                
                  <option value="590">+590</option>
                
                  <option value="591">+591</option>
                
                  <option value="592">+592</option>
                
                  <option value="593">+593</option>
                
                  <option value="594">+594</option>
                
                  <option value="595">+595</option>
                
                  <option value="596">+596</option>
                
                  <option value="597">+597</option>
                
                  <option value="598">+598</option>
                
                  <option value="599">+599</option>
                
                  <option value="60">+60</option>
                
                  <option value="61">+61</option>
                
                  <option value="618">+618</option>
                
                  <option value="62">+62</option>
                
                  <option value="63">+63</option>
                
                  <option value="64">+64</option>
                
                  <option value="65">+65</option>
                
                  <option value="66">+66</option>
                
                  <option value="670">+670</option>
                
                  <option value="672">+672</option>
                
                  <option value="673">+673</option>
                
                  <option value="674">+674</option>
                
                  <option value="675">+675</option>
                
                  <option value="676">+676</option>
                
                  <option value="677">+677</option>
                
                  <option value="678">+678</option>
                
                  <option value="679">+679</option>
                
                  <option value="680">+680</option>
                
                  <option value="681">+681</option>
                
                  <option value="682">+682</option>
                
                  <option value="683">+683</option>
                
                  <option value="685">+685</option>
                
                  <option value="686">+686</option>
                
                  <option value="687">+687</option>
                
                  <option value="688">+688</option>
                
                  <option value="689">+689</option>
                
                  <option value="690">+690</option>
                
                  <option value="691">+691</option>
                
                  <option value="692">+692</option>
                
                  <option value="7">+7</option>
                
                  <option value="808">+808</option>
                
                  <option value="81">+81</option>
                
                  <option value="82">+82</option>
                
                  <option value="84">+84</option>
                
                  <option value="850">+850</option>
                
                  <option value="852">+852</option>
                
                  <option value="853">+853</option>
                
                  <option value="855">+855</option>
                
                  <option value="856">+856</option>
                
                  <option value="86">+86</option>
                
                  <option value="872">+872</option>
                
                  <option value="880">+880</option>
                
                  <option value="886">+886</option>
                
                  <option value="90">+90</option>
                
                  <option value="91">+91</option>
                
                  <option value="92">+92</option>
                
                  <option value="93">+93</option>
                
                  <option value="94">+94</option>
                
                  <option value="95">+95</option>
                
                  <option value="960">+960</option>
                
                  <option value="961">+961</option>
                
                  <option value="962">+962</option>
                
                  <option value="963">+963</option>
                
                  <option value="964">+964</option>
                
                  <option value="965">+965</option>
                
                  <option value="966">+966</option>
                
                  <option value="967">+967</option>
                
                  <option value="968">+968</option>
                
                  <option value="970">+970</option>
                
                  <option value="971">+971</option>
                
                  <option value="972">+972</option>
                
                  <option value="973">+973</option>
                
                  <option value="974">+974</option>
                
                  <option value="975">+975</option>
                
                  <option value="976">+976</option>
                
                  <option value="977">+977</option>
                
                  <option value="98">+98</option>
                
                  <option value="992">+992</option>
                
                  <option value="993">+993</option>
                
                  <option value="994">+994</option>
                
                  <option value="995">+995</option>
                
                  <option value="996">+996</option>
                
                  <option value="998">+998</option>
                
              </select>
                
                 
                
              </select>
            </span>-->
            <input placeholder="XXX-XXX-XXXX" type="text" name="phone_number" id="phone_number" value="<?php echo $row['Phone']; ?>" class="validate">
          </span>
        </fieldset>

      



        <div class="note">This is <strong>never shared</strong> and only used to share with the person you meet.</div>

        <fieldset>
          <span class="input">
            <label for="location">City</label>
            <input type="text" name="city" id="city" placeholder="New York" value="<?php echo $row['City']; ?>">
          </span>
          <span class="select gap-before">
            <label>State</label>
            <span class="select-wrapper">
              <select name="state" id="state" class="timezone">
                <option value="" disabled="disabled">Select your state</option>
                  <option value="AL" <?php if($row['State'] == 'AL'){echo "selected";}?>>Alabama</option>
  <option value="AK" <?php if($row['State'] == 'AK'){echo "selected";}?>>Alaska</option>
  <option value="AZ" <?php if($row['State'] == 'AZ'){echo "selected";}?>>Arizona</option>
  <option value="AR" <?php if($row['State'] == 'AR'){echo "selected";}?>>Arkansas</option>
  <option value="CA" <?php if($row['State'] == 'CA'){echo "selected";}?>>California</option>
  <option value="CO" <?php if($row['State'] == 'CO'){echo "selected";}?>>Colorado</option>
  <option value="CT" <?php if($row['State'] == 'CT'){echo "selected";}?>>Connecticut</option>
  <option value="DE" <?php if($row['State'] == 'DE'){echo "selected";}?>>Delaware</option>
  <option value="DC" <?php if($row['State'] == 'DC'){echo "selected";}?>>District Of Columbia</option>
  <option value="FL" <?php if($row['State'] == 'FL'){echo "selected";}?>>Florida</option>
  <option value="GA" <?php if($row['State'] == 'GA'){echo "selected";}?>>Georgia</option>
  <option value="HI" <?php if($row['State'] == 'HI'){echo "selected";}?>>Hawaii</option>
  <option value="ID" <?php if($row['State'] == 'ID'){echo "selected";}?>>Idaho</option>
  <option value="IL" <?php if($row['State'] == 'IL'){echo "selected";}?>>Illinois</option>
  <option value="IN" <?php if($row['State'] == 'IN'){echo "selected";}?>>Indiana</option>
  <option value="IA" <?php if($row['State'] == 'IA'){echo "selected";}?>>Iowa</option>
  <option value="KS" <?php if($row['State'] == 'KS'){echo "selected";}?>>Kansas</option>
  <option value="KY" <?php if($row['State'] == 'KY'){echo "selected";}?>>Kentucky</option>
  <option value="LA" <?php if($row['State'] == 'LA'){echo "selected";}?>>Louisiana</option>
  <option value="ME" <?php if($row['State'] == 'ME'){echo "selected";}?>>Maine</option>
  <option value="MD" <?php if($row['State'] == 'MD'){echo "selected";}?>>Maryland</option>
  <option value="MA" <?php if($row['State'] == 'MA'){echo "selected";}?>>Massachusetts</option>
  <option value="MI" <?php if($row['State'] == 'MI'){echo "selected";}?>>Michigan</option>
  <option value="MN" <?php if($row['State'] == 'MN'){echo "selected";}?>>Minnesota</option>
  <option value="MS" <?php if($row['State'] == 'MS'){echo "selected";}?>>Mississippi</option>
  <option value="MO" <?php if($row['State'] == 'MO'){echo "selected";}?>>Missouri</option>
  <option value="MT" <?php if($row['State'] == 'MT'){echo "selected";}?>>Montana</option>
  <option value="NE" <?php if($row['State'] == 'NE'){echo "selected";}?>>Nebraska</option>
  <option value="NV" <?php if($row['State'] == 'NV'){echo "selected";}?>>Nevada</option>
  <option value="NH" <?php if($row['State'] == 'NH'){echo "selected";}?>>New Hampshire</option>
  <option value="NJ" <?php if($row['State'] == 'NJ'){echo "selected";}?>>New Jersey</option>
  <option value="NM" <?php if($row['State'] == 'NM'){echo "selected";}?>>New Mexico</option>
  <option value="NY" <?php if($row['State'] == 'NY'){echo "selected";}?>>New York</option>
  <option value="NC" <?php if($row['State'] == 'NC'){echo "selected";}?>>North Carolina</option>
  <option value="ND" <?php if($row['State'] == 'ND'){echo "selected";}?>>North Dakota</option>
  <option value="OH" <?php if($row['State'] == 'OH'){echo "selected";}?>>Ohio</option>
  <option value="OK" <?php if($row['State'] == 'OK'){echo "selected";}?>>Oklahoma</option>
  <option value="OR" <?php if($row['State'] == 'OR'){echo "selected";}?>>Oregon</option>
  <option value="PA" <?php if($row['State'] == 'PA'){echo "selected";}?>>Pennsylvania</option>
  <option value="RI" <?php if($row['State'] == 'RI'){echo "selected";}?>>Rhode Island</option>
  <option value="SC" <?php if($row['State'] == 'SC'){echo "selected";}?>>South Carolina</option>
  <option value="SD" <?php if($row['State'] == 'SD'){echo "selected";}?>>South Dakota</option>
  <option value="TN" <?php if($row['State'] == 'TN'){echo "selected";}?>>Tennessee</option>
  <option value="TX" <?php if($row['State'] == 'TX'){echo "selected";}?>>Texas</option>
  <option value="UT" <?php if($row['State'] == 'UT'){echo "selected";}?>>Utah</option>
  <option value="VT" <?php if($row['State'] == 'VT'){echo "selected";}?>>Vermont</option>
  <option value="VA" <?php if($row['State'] == 'VA'){echo "selected";}?>>Virginia</option>
  <option value="WA" <?php if($row['State'] == 'WA'){echo "selected";}?>>Washington</option>
  <option value="WV" <?php if($row['State'] == 'WV'){echo "selected";}?>>West Virginia</option>
  <option value="WI" <?php if($row['State'] == 'WI'){echo "selected";}?>>Wisconsin</option>
  <option value="WY" <?php if($row['State'] == 'WY'){echo "selected";}?>>Wyoming</option>
               </select>
            </span>
          </span>
        </fieldset>

         <!--   <fieldset>
          <span class="input">
            <label for="short_bio">Short Bio</label>
            <input type="text" name="short_bio" id="short_bio" placeholder="Your Short Bio" value="">
          </span>
        </fieldset>
        <div class="note">Optional — 50 characters</div>-->

    
        <fieldset>
          <span class="textarea">
            <label for="bio">
              Short Bio
              <!--<small><a href="/settings/profile/mini-resume" data-action="show-examples">Examples</a></small>-->
            </label>
            <textarea name="bio" id="bio" maxlength="100" placeholder="Tell a little about yourself. No life story haha. Just couple phrases about yourself."><?php echo $row['Bio'];?></textarea>
          </span>
        </fieldset>
         <div class="note">Optional — 100 characters</div> 


      
 <p>&nbsp;</p>

  <h2 class="no-mobile">
          General Information
        </h2>



<!--Interests Starts--> 

<fieldset>
             <!-- <h3>Your interests</h3> -->
            
<div class="note">
                  Add interests so we can recommend the best ideas for you to provide feedback for.
                </div>



          <span class="input">
            <label for="firstname">Interest</label>
            <input type="text" name="interests" id="interests" placeholder="Enter here your interests (e.g Social Media)">
          </span>
        
      



       

<ul id="responds">
<?php
//include db configuration file

if(!empty($_SESSION['participantSession'])){

//echo '<input type="hidden" name="userid" id="userid" value="'.$_SESSION['participantSession'].'">';


//MySQL query
$Result = mysqli_query($connecDB,"SELECT * FROM tbl_participant_interests WHERE userID = '".$_SESSION['participantSession']."' ");


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($Result))
{





echo '<li id="item_'.$row2['id'].'">';
echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row2['id'].'">';
echo '<img src="'.BASE_PATH.'/images/icon_del.gif" border="0" class="icon_del" />';
echo '</a></div>';
//echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
echo $row2['Interests'].'</li>';

}

}



?>
</ul>

  </fieldset>




<fieldset>
              <!--<h3>Languages</h3>-->
             
<div class="note">
                  Add your languages you speak
                </div>



          <span class="input">
            <label for="firstname">Languages</label>
            <input type="text" name="languages" id="languages" placeholder="Enter here the languages you speak">
          </span>
        
      



       

<ul id="responds-languages">
<?php
//include db configuration file

if(!empty($_SESSION['participantSession'])){

//echo '<input type="hidden" name="userid" id="userid" value="'.$_SESSION['participantSession'].'">';


//MySQL query
$Result = mysqli_query($connecDB,"SELECT * FROM tbl_participant_languages WHERE userID = '".$_SESSION['participantSession']."' ");


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($Result))
{





echo '<li id="item_'.$row2['id'].'">';
echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row2['id'].'">';
echo '<img src="'.BASE_PATH.'/images/icon_del.gif" border="0" class="icon_del" />';
echo '</a></div>';
//echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
echo $row2['Languages'].'</li>';

}

}



?>
</ul>

  </fieldset>



        <fieldset>
         <span class="select gap-before">
         <label>Age</label>
         <span class="select-wrapper">
              <select name="age" class="age">
               <option value="" <?php if(in_array('',$age)){echo "selected";}?> disabled="disabled">Select your age</option>
<option value="14" <?php if(in_array(14,$age)){echo "selected";}?>>14</option>
<option value="15" <?php if(in_array(15,$age)){echo "selected";}?>>15</option>
<option value="16" <?php if(in_array(16,$age)){echo "selected";}?>>16</option>
<option value="17" <?php if(in_array(17,$age)){echo "selected";}?>>17</option>
<option value="18" <?php if(in_array(18,$age)){echo "selected";}?>>18</option>
<option value="19" <?php if(in_array(19,$age)){echo "selected";}?>>19</option>
<option value="20" <?php if(in_array(20,$age)){echo "selected";}?>>20</option>
<option value="21" <?php if(in_array(21,$age)){echo "selected";}?>>21</option>
<option value="22" <?php if(in_array(22,$age)){echo "selected";}?>>22</option>
<option value="23" <?php if(in_array(23,$age)){echo "selected";}?>>23</option>
<option value="24" <?php if(in_array(24,$age)){echo "selected";}?>>24</option>
<option value="25" <?php if(in_array(25,$age)){echo "selected";}?>>25</option>
<option value="26" <?php if(in_array(26,$age)){echo "selected";}?>>26</option>
<option value="27" <?php if(in_array(27,$age)){echo "selected";}?>>27</option>
<option value="28" <?php if(in_array(28,$age)){echo "selected";}?>>28</option>
<option value="29" <?php if(in_array(29,$age)){echo "selected";}?>>29</option>
<option value="30" <?php if(in_array(30,$age)){echo "selected";}?>>30</option>
<option value="31" <?php if(in_array(31,$age)){echo "selected";}?>>31</option>
<option value="32" <?php if(in_array(32,$age)){echo "selected";}?>>32</option>
<option value="33" <?php if(in_array(33,$age)){echo "selected";}?>>33</option>
<option value="34" <?php if(in_array(34,$age)){echo "selected";}?>>34</option>
<option value="35" <?php if(in_array(35,$age)){echo "selected";}?>>35</option>
<option value="36" <?php if(in_array(36,$age)){echo "selected";}?>>36</option>
<option value="37" <?php if(in_array(37,$age)){echo "selected";}?>>37</option>
<option value="38" <?php if(in_array(38,$age)){echo "selected";}?>>38</option>
<option value="39" <?php if(in_array(39,$age)){echo "selected";}?>>39</option>
<option value="40" <?php if(in_array(40,$age)){echo "selected";}?>>40</option>
<option value="41" <?php if(in_array(41,$age)){echo "selected";}?>>41</option>
<option value="42" <?php if(in_array(42,$age)){echo "selected";}?>>42</option>
<option value="43" <?php if(in_array(43,$age)){echo "selected";}?>>43</option>
<option value="44" <?php if(in_array(44,$age)){echo "selected";}?>>44</option>
<option value="45" <?php if(in_array(45,$age)){echo "selected";}?>>45</option>
<option value="46" <?php if(in_array(46,$age)){echo "selected";}?>>46</option>
<option value="47" <?php if(in_array(47,$age)){echo "selected";}?>>47</option>
<option value="48" <?php if(in_array(48,$age)){echo "selected";}?>>48</option>
<option value="49" <?php if(in_array(49,$age)){echo "selected";}?>>49</option>
<option value="50" <?php if(in_array(50,$age)){echo "selected";}?>>50</option>
<option value="51" <?php if(in_array(51,$age)){echo "selected";}?>>51</option>
<option value="52" <?php if(in_array(52,$age)){echo "selected";}?>>52</option>
<option value="53" <?php if(in_array(53,$age)){echo "selected";}?>>53</option>
<option value="54" <?php if(in_array(54,$age)){echo "selected";}?>>54</option>
<option value="55" <?php if(in_array(55,$age)){echo "selected";}?>>55</option>
<option value="56" <?php if(in_array(56,$age)){echo "selected";}?>>56</option>
<option value="57" <?php if(in_array(57,$age)){echo "selected";}?>>57</option>
<option value="58" <?php if(in_array(58,$age)){echo "selected";}?>>58</option>
<option value="59" <?php if(in_array(59,$age)){echo "selected";}?>>59</option>
<option value="60" <?php if(in_array(60,$age)){echo "selected";}?>>60</option>


               </select> 
               </span>
            </span>
 </fieldset>
         <fieldset>    
           <span class="select gap-before">
            <label>Gender</label>
            <span class="select-wrapper">
              <select name="gender" class="gender">
                <option value="" disabled="disabled" <?php if(in_array('',$gender)){echo "selected";}?>>Select your gender</option>
                <option value="Female" <?php if(in_array('Female',$gender)){echo "selected";}?>>Female</option>
                <option value="Male" <?php if(in_array('Male',$gender)){echo "selected";}?>>Male</option>
               </select> 
            </span>
          </span>
        </fieldset>


         <fieldset>
          <span class="select gap-before">
            <label>Height</label>
            <span class="select-wrapper">
              <select name="height" class="gender">
               <option value="" <?php if(in_array('',$height)){echo "selected";}?> disabled="disabled">Select your height</option>
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
            </span>
          </span>
           <span class="select gap-before">
            <label>Status</label>
            <span class="select-wrapper">
              <select name="status" class="gender">
               <option value="" <?php if(in_array('',$status)){echo "selected";}?> disabled="disabled">Select your status</option>
<option value="Single" <?php if(in_array('Single',$status)){echo "selected";}?>>Single</option>
<option value="Married" <?php if(in_array('Married',$status)){echo "selected";}?>>Married</option>
<option value="Divorced" <?php if(in_array('Divorced',$status)){echo "selected";}?>>Divorced</option>
<option value="Widowed" <?php if(in_array('Widowed',$status)){echo "selected";}?>>Widowed</option>
               </select> 
            </span>
          </span>
        </fieldset>



        <fieldset>
          <span class="select gap-before">
            <label>Ethnicity</label>
            <span class="select-wrapper">
              <select name="ethnicity" class="gender">
               <option value="" <?php if(in_array('',$ethnicity)){echo "selected";}?>>Select your ethnicity</option>
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
            </span>
          </span>
           <span class="select gap-before">
            <label>Smoke</label>
            <span class="select-wrapper">
              <select name="smoke" class="gender">
               <option value="" <?php if(in_array('',$smoke)){echo "selected";}?>>Do you smoke?</option>
<option value="Yes" <?php if(in_array('Yes',$smoke)){echo "selected";}?>>Yes</option>
<option value="No" <?php if(in_array('No',$smoke)){echo "selected";}?>>No</option>
<option value="Sometimes" <?php if(in_array('Sometimes',$smoke)){echo "selected";}?>>Sometimes</option>
<option value="When drinking" <?php if(in_array('When drinking',$smoke)){echo "selected";}?>>When drinking</option>
<option value="Trying to quit" <?php if(in_array('Trying to quit',$smoke)){echo "selected";}?>>Trying to quit</option>

               </select> 
            </span>
          </span>
        </fieldset>




        <fieldset>
          <span class="select gap-before">
            <label>Drink</label>
            <span class="select-wrapper">
              <select name="drink" class="gender">
               <option value="" <?php if(in_array('',$drink)){echo "selected";}?>>Do you drink?</option>
<option value="Very Often" <?php if(in_array('Very Often',$drink)){echo "selected";}?>>Very Often</option>
<option value="Often" <?php if(in_array('Often',$drink)){echo "selected";}?>>Often</option>
<option value="Socially" <?php if(in_array('Socially',$drink)){echo "selected";}?>>Socially</option>
<option value="Rarely" <?php if(in_array('Rarely',$drink)){echo "selected";}?>>Rarely</option>
<option value="Desperately" <?php if(in_array('Desperately',$drink)){echo "selected";}?>>Desperately</option>
<option value="Not at all" <?php if(in_array('Not at all',$drink)){echo "selected";}?>>Not at all</option>


               </select> 
            </span>
          </span>
           <span class="select gap-before">
            <label>Diet</label>
            <span class="select-wrapper">
              <select name="diet" class="gender">
               <option value="" <?php if(in_array('',$diet)){echo "selected";}?>>What is your diet?</option>
<option value="Vegetarian" <?php if(in_array('Vegetarian',$diet)){echo "selected";}?>>Vegetarian</option>
<option value="Vegan" <?php if(in_array('Vegan',$diet)){echo "selected";}?>>Vegan</option>
<option value="Kosher" <?php if(in_array('Kosher',$diet)){echo "selected";}?>>Kosher</option>
<option value="Halal" <?php if(in_array('Halal',$diet)){echo "selected";}?>>Halal</option>
<option value="No diet in particular" <?php if(in_array('No diet in particular',$diet)){echo "selected";}?>>No diet in particular</option>

               </select> 
            </span>
          </span>
        </fieldset>
       

       <fieldset>
          <span class="select gap-before">
            <label>Religion</label>
            <span class="select-wrapper">
              <select name="religion" class="gender">
               <option value="" <?php if(in_array('',$religion)){echo "selected";}?>>What is your religion?</option>
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
            </span>
          </span>
           <span class="select gap-before">
            <label>Education</label>
            <span class="select-wrapper">
              <select name="education" class="gender">
               <option value="" <?php if(in_array('',$education)){echo "selected";}?>>What is your education level?</option>
<option value="High School" <?php if(in_array('High School',$education)){echo "selected";}?>>High School</option>
<option value="2-year college" <?php if(in_array('2-year college',$education)){echo "selected";}?>>2-year college</option>
<option value="Post grad" <?php if(in_array('Post grad',$education)){echo "selected";}?>>Post grad</option>

               </select> 
            </span>
          </span>
        </fieldset>



         <fieldset>
          <span class="select gap-before">
            <label>Occupation</label>
            <span class="select-wrapper">
              <select name="job" class="gender">
               <option value="" <?php if(in_array('',$job)){echo "selected";}?>>What is your occupation?</option>
<option value="Student" <?php if(in_array('Student',$job)){echo "selected";}?>>Student</option>
<option value="Art / Music / Writing" <?php if(in_array('Art / Music / Writing',$job)){echo "selected";}?>>Art / Music / Writing</option>
<option value="Banking / Finance" <?php if(in_array('Banking / Finance',$job)){echo "selected";}?>>Banking / Finance</option>
<option value="Administration" <?php if(in_array('Administration',$job)){echo "selected";}?>>Administration</option>
<option value="Technology" <?php if(in_array('Technology',$job)){echo "selected";}?>>Technology</option>
<option value="Construction" <?php if(in_array('Construction',$job)){echo "selected";}?>>Construction</option>
<option value="Education" <?php if(in_array('Education',$job)){echo "selected";}?>>Education</option>
<option value="Entertainment / Media" <?php if(in_array('Entertainment / Media',$job)){echo "selected";}?>>Entertainment / Media</option>
<option value="Management" <?php if(in_array('Management',$job)){echo "selected";}?>>Management</option>
<option value="Hospitality" <?php if(in_array('Hospitality',$job)){echo "selected";}?>>Hospitality</option>
<option value="Law" <?php if(in_array('Law',$job)){echo "selected";}?>>Law</option>
<option value="Medicine" <?php if(in_array('Medicine',$job)){echo "selected";}?>>Medicine</option>
<option value="Military" <?php if(in_array('Military',$job)){echo "selected";}?>>Military</option>
<option value="Sales / Marketing" <?php if(in_array('Sales / Marketing',$job)){echo "selected";}?>>Sales / Marketing</option>
<option value="Science / Engineering" <?php if(in_array('Science / Engineering',$job)){echo "selected";}?>>Science / Engineering</option>
<option value="Transportation" <?php if(in_array('Transportation',$job)){echo "selected";}?>>Transportation</option>
<option value="Other" <?php if(in_array('Other',$job)){echo "selected";}?>>Other</option>

               </select> 
            </span>
          </span>
        
        </fieldset>

      

 
        

        
<h2 class="no-mobile">Receive payments in:</h2>
         
        <input id="cash" name="payment_method[]" style="display:block; float:left" type="radio"  value="Cash" <?php if(in_array('Cash',$payment_method)){echo "checked";}?>/>
  <label for="cash_only">Cash</label>
  <a href="#" alt="You will receive your payment in cash after your meeting" class="tooltiptext">(?)</a><br>

  <input id="bank" name="payment_method[]" style="display:block; float:left" type="radio"  value="Bank" <?php if(in_array('Bank',$payment_method)){echo "checked";}?>/>
  <label for="bank_only">Bank Account</label>
  <a href="#" alt="You will receive your payment towards your bank account after your meeting" class="tooltiptext">(?)</a><br>

   


  

        
<h2 class="no-mobile">Receive email notifications when:</h2>
         
        <input id="New-participant-requests-to-participate" name="emailnotifications[]" type="checkbox"  value="New startup requests you participate" <?php if(in_array('New startup requests you participate',$emailnotifications)){echo "checked";}?>/>
  <label for="New-participant-requests-to-participate">New startup requests you participate</label>
  <a href="#" alt="If a startup sents you a request to participate in a feedback session, you will get notified per email" class="tooltiptext">(?)</a><br>

   <input id="New-participant-requests-to-participate" name="emailnotifications[]" type="checkbox"  value="When you qualify to participate to provide feedback on an idea" <?php if(in_array('When you qualify to participate to provide feedback on an idea',$emailnotifications)){echo "checked";}?>/>
  <label for="New-participant-requests-to-participate">When you qualify to participate to provide feedback on an idea</label>
  <a href="#" alt="Each feedback session has certain requirements. Those requirements can be based on age, gender or education. If you qualify to participate to provide feedback for an idea, we will notify you per email" class="tooltiptext">(?)</a><br>



  <h2 class="no-mobile">Delete account:</h2>
         
<a href="#" id="requestbutton" class="my_popup_open">Delete my Account</a>



  <!-- Start Decline -->

<div id="my_popup" class="well slide-decline">
  <div class="result-decline">
  <div id="result-decline">Account Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to delete your account?</h4>
<h5>Note.: this cannot be undone</h5>
<input type="hidden" name="userid" id="userid" value="<?php echo $row['userID']; ?>"/>

<div class="popupoverlay-btn">
  <div class="cancel-decline">
    <button class="my_popup_close cancel">Cancel</button>
    <button class="delete-account btn-delete">Yes</button>
</div>



</div>
</div>

<!-- End Decline -->



   
<br><br><br>
       


        <div id="save">
              <input type="submit" class="save-profile" value="Save"/>

            </div>


   <div style="float:left; width:100%; margin-top:30px;">
 <div id="profile_results"></div>
</div>

      </form>



    </div>
    
   







<div class="clearer"></div>

       
        





     

          
      </div>

    <?php include("../../../footer.php"); ?>

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  

      

   

    <div class="clearer"></div>


      </div>
  
  </div>

  </div>



        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>








<input type="hidden" id='base_path' value="<?php echo BASE_PATH; ?>">



  <script>
    $(document).ready(function() {

      // Initialize the plugin
      $('#my_popup').popup();

    });
  </script>


        
    </body>

</html>