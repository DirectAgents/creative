<?php
session_start();
require_once '../../base_path.php';

require_once '../../class.customer.php';
require_once '../../class.admin.php';
include_once("../../config.php");



$customer_home = new CUSTOMER();

$admin_home = new ADMIN();


if(!$admin_home->is_logged_in() && !$customer_home->is_logged_in())
{
  $startup_home->redirect('../../login');
  exit();
}





if(!$customer_home->is_logged_in())
{
  
  $customer_home->redirect('../../login');

}


$profileimage = mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE userID='".$_SESSION['customerSession']."'");
$rowimage = mysqli_fetch_array($profileimage);

$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$emailnotifications=explode(',',$row['EmailNotifications']);


$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['customerSession']."'");
$rowproject = mysqli_fetch_array($Project);

$meetupchoice=explode(',',$rowproject['Meetupchoice']);
$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$minheight=explode(',',$rowproject['MinHeight']);
$maxheight=explode(',',$rowproject['MaxHeight']);
$city=explode(',',$rowproject['City']);
$status=explode(',',$rowproject['Status']);
$ethnicity=explode(',',$rowproject['Ethnicity']);
$smoke=explode(',',$rowproject['Smoke']);
$drink=explode(',',$rowproject['Drink']);
$diet=explode(',',$rowproject['Diet']);
$religion=explode(',',$rowproject['Religion']);
$education=explode(',',$rowproject['Education']);
$job=explode(',',$rowproject['Job']);






$ProjectPotentialanswers = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion WHERE userID='".$_SESSION['customerSession']."' AND ProjectID = '41'");
$rowpotentialanswers = mysqli_fetch_array($ProjectPotentialanswers);

$screening=explode(',',$rowpotentialanswers['Screening']);

$potentialanswers =explode(',',$rowpotentialanswers['Accepted']);

?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">    
    <head>

<?php include("../header.php"); ?>
    
      





   <script type="text/javascript" src="<?php echo BASE_PATH; ?>/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo BASE_PATH; ?>/js/jquery.form.js"></script>

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
   


<?php include("../../nav.php"); ?>

   
  </div>
</header>


<!--TopNav-->
  
        


    <!-- Main -->








 <div class="clearer"></div>

  <div class="container">
    <div id="white-container-account">
      





<div id="tabs">
    
    

    <div id="a">


        
<div id='preview'>

<?php if(isset($_SESSION['access_token'])){ ?>
        <img src="<?php echo $_SESSION['google_picture_link']; ?>" class="profile-photo">
<?php } ?>

<?php if(isset($_SESSION['facebook_photo'])){ ?>
       
        <img src="https://graph.facebook.com/<?php echo $_SESSION['facebook_photo']; ?>/picture?width=150&height=150" class="profile-photo">

<?php } ?>
       
<?php if(!isset($_SESSION['access_token']) && (!isset($_SESSION['facebook_photo']))){ ?>

<?php if($_SESSION['profileimage'] != ''){ 
        echo '<img src="'.BASE_PATH.'/images/profile/customer/'.$_SESSION['profileimage'].'" class="profile-photo"/>';
}else{
        echo '
  
   <img src="'.BASE_PATH.'/images/profile/thumbnail.jpg" class="profile-photo"/>';
 } ?>

<?php } ?>

</div>

<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
Update your image <input type="file" name="photoimg" id="photoimg" />
</form>

      

   

    <div id="result-photo"></div>



  
   <iframe name="votar" style="display:none;"></iframe>
        
    <form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        
        

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
            <input placeholder="XXX-XXX-XXXX" type="tel" name="phone_number" id="phone_number" value="<?php echo $row['Phone']; ?>" pattern="^\d{3}-\d{3}-\d{4}$" required>
          </span>
        </fieldset>

      



        <div class="note">Your phone will <strong>never be shared to third-parties</strong> and only used during pick-up</div>

        <fieldset>
          <span class="input">
            <label for="location">Address</label>
            <input type="text" name="address" id="address" placeholder="Your Street Address" value="<?php echo $row['Address']; ?>">
          </span>
          <span class="input">
            <label for="location">City</label>
            <input type="text" name="city" id="city" placeholder="City" value="<?php echo $row['City']; ?>">
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
           <span class="input">
            <label for="location">Zip</label>
            <input type="text" name="zip" id="zip" placeholder="Zip Code" value="<?php echo $row['Zip']; ?>">
          </span>
        </fieldset>

         <!--   <fieldset>
          <span class="input">
            <label for="short_bio">Short Bio</label>
            <input type="text" name="short_bio" id="short_bio" placeholder="Your Short Bio" value="">
          </span>
        </fieldset>
        <div class="note">Optional — 50 characters</div>-->

    
    
       


  <h2 class="no-mobile">Delete account:</h2>
         
<a href="#" id="requestbutton" class="my_popup_open">Delete my Account</a>



  <!-- Start Delete -->

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

<!-- End Delete -->

<br><br>
       


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

    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  
<!--Footer-->
<?php include("../../footer.php"); ?>
<!--Footer-->
      

    </div>

    <div class="clearer"></div>

  </div>



        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>




<input type="hidden" id='base_path' value="<?php echo BASE_PATH; ?>">
  <script type="text/javascript" src="<?php echo BASE_PATH; ?>/startup/project/js/jquery.form.min.js"></script>



  <script>
    $(document).ready(function() {

      // Initialize the plugin
      $('#my_popup').popup();

    });
  </script>

        
    </body>

</html>