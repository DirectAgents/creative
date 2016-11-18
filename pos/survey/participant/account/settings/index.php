<?php
session_start();

require_once '../../../base_path.php';


require_once '../../../class.participant.php';
require_once '../../../class.researcher.php';
include_once("../../../config.php");


$researcher_home = new RESEARCHER();

if($researcher_home->is_logged_in())
{
  $researcher_home->logout();
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
      var myData = 'interests='+ $("#interests").val()+'&projectid='+ $("#projectid").val()+'&userid='+ $("#userid").val(); 
      jQuery.ajax({
      type: "POST", 
      url: "languages.php", 
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


 <!-- jQuery Popup Overlay -->
<script src="<?php echo BASE_PATH; ?>/researcher/project/js/jquery.popupoverlay.js"></script>
   

<script type="text/javascript">
$(document).ready(function() {
$(".launch-photo").click(function() {  
//alert("aads"); 


$.post('profile-photo.php', $("#contact-form").serialize(), function(data) {
    //$("#contact-form").hide();
    //alert("aads"); 
    $('#result-photo').html(data);
   });


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



<?php if(isset($_SESSION['access_token'])){ ?>
        <img src="<?php echo $_SESSION['google_picture_link']; ?>" class="profile-photo">
<?php } ?>

<?php if(isset($_SESSION['facebook_photo'])){ ?>
       
        <img src="https://graph.facebook.com/<?php echo $_SESSION['facebook_photo']; ?>/picture?width=150&height=150" class="profile-photo">

<?php } ?>
       
<?php if(!isset($_SESSION['access_token']) && (!isset($_SESSION['facebook_photo']))){ ?>

<img src="<?php echo BASE_PATH; ?>/images/profile/<?PHP echo $rowimage['profile_image']; ?>" class="profile-photo">

<?php } ?>




        

  </div>

   <div class="col-sm-5">
        
        <a href="<?php echo BASE_PATH; ?>/participant/account/settings/availability/option1/" role="button" class="111slide_open">
  <button type="button" class="btn-request">
  Update your availability</button></a>


  <a href="<?php echo BASE_PATH; ?>/participant/account/settings/nda/" role="button" class="111slide_open">
  <button type="button" class="btn-request">
  Non-disclosure Agreements</button></a>
       

  </div>
  
</div>        

      

       <form action="" id="contact-form" class="form-horizontal" method="post">

    
           
              <input type="hidden" name="userid" id="userid" value="<?php echo $row2['userID']; ?>">
              <input type="hidden" name="projectid" id="projectid" value="<?php echo $_GET['id']; ?>">
          

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
            <input placeholder="XXX-XXX-XXXX" type="text" name="phone_number" id="phone_number" value="<?php echo $row['Phone']; ?>" class="validate">
          </span>
        </fieldset>

      



        <div class="note">Your number will <strong>only</strong> be shared with people you meet through this site.</div>

        <fieldset>
          <span class="input">
            <label for="location">City</label>
            <input type="text" name="city" id="city" placeholder="New York" value="New York">
          </span>
          <span class="select gap-before">
            <label>State</label>
            <span class="select-wrapper">
              <select name="state" id="state" class="timezone">
                <option value="" disabled="disabled">Select your state</option>
                  <option value="AL">Alabama</option>
  <option value="AK">Alaska</option>
  <option value="AZ">Arizona</option>
  <option value="AR">Arkansas</option>
  <option value="CA">California</option>
  <option value="CO">Colorado</option>
  <option value="CT">Connecticut</option>
  <option value="DE">Delaware</option>
  <option value="DC">District Of Columbia</option>
  <option value="FL">Florida</option>
  <option value="GA">Georgia</option>
  <option value="HI">Hawaii</option>
  <option value="ID">Idaho</option>
  <option value="IL">Illinois</option>
  <option value="IN">Indiana</option>
  <option value="IA">Iowa</option>
  <option value="KS">Kansas</option>
  <option value="KY">Kentucky</option>
  <option value="LA">Louisiana</option>
  <option value="ME">Maine</option>
  <option value="MD">Maryland</option>
  <option value="MA">Massachusetts</option>
  <option value="MI">Michigan</option>
  <option value="MN">Minnesota</option>
  <option value="MS">Mississippi</option>
  <option value="MO">Missouri</option>
  <option value="MT">Montana</option>
  <option value="NE">Nebraska</option>
  <option value="NV">Nevada</option>
  <option value="NH">New Hampshire</option>
  <option value="NJ">New Jersey</option>
  <option value="NM">New Mexico</option>
  <option value="NY">New York</option>
  <option value="NC">North Carolina</option>
  <option value="ND">North Dakota</option>
  <option value="OH">Ohio</option>
  <option value="OK">Oklahoma</option>
  <option value="OR">Oregon</option>
  <option value="PA">Pennsylvania</option>
  <option value="RI">Rhode Island</option>
  <option value="SC">South Carolina</option>
  <option value="SD">South Dakota</option>
  <option value="TN">Tennessee</option>
  <option value="TX">Texas</option>
  <option value="UT">Utah</option>
  <option value="VT">Vermont</option>
  <option value="VA">Virginia</option>
  <option value="WA">Washington</option>
  <option value="WV">West Virginia</option>
  <option value="WI">Wisconsin</option>
  <option value="WY">Wyoming</option>
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
              <small><a href="/settings/profile/mini-resume" data-action="show-examples">Examples</a></small>
            </label>
            <textarea name="bio" id="bio"></textarea>
          </span>
        </fieldset>
         <div class="note">Optional — 50 characters</div> 


      
 
      

 
        

       


  

        
<h2 class="no-mobile">Receive email notifications when:</h2>
         
        <input id="New-participant-requests-to-participate" name="emailnotifications[]" type="checkbox"  value="New researcher requests you participate" <?php if(in_array('New researcher requests you participate',$emailnotifications)){echo "checked";}?>/>
  <label for="New-participant-requests-to-participate">New researcher requests you participate</label>
  <a href="#" alt="If a researcher sents you a request to participate in a survey, you will get notified per email" class="tooltiptext">(?)</a><br>

   <input id="New-participant-requests-to-participate" name="emailnotifications[]" type="checkbox"  value="When you qualify for new projects" <?php if(in_array('When you qualify for new projects',$emailnotifications)){echo "checked";}?>/>
  <label for="New-participant-requests-to-participate">When you qualify for new projects</label>
  <a href="#" alt="Each survey has certain requirements, those requirements can be based on age, gender or education. If you qualify in new projects, we will notify you per email" class="tooltiptext">(?)</a><br>

       


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



<script>
$(document).ready(function () {

    $('#slide').popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });

});
</script>


<input type="hidden" id='base_path' value="<?php echo BASE_PATH; ?>">
  <script type="text/javascript" src="<?php echo BASE_PATH; ?>/researcher/project/js/jquery.form.min.js"></script>



        
    </body>

</html>