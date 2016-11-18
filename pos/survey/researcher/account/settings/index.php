<?php
session_start();
require_once '../../../base_path.php';

require_once '../../../class.researcher.php';
require_once '../../../class.participant.php';
include_once("../../../config.php");



$participant_home = new PARTICIPANT();

$researcher_home = new RESEARCHER();


if(!$researcher_home->is_logged_in() && !$participant_home->is_logged_in())
{
  $researcher_home->redirect('../../researcher/login');
  exit();
}



if(!$participant_home->is_logged_in() && !$researcher_home->is_logged_in())
{
  $participant_home->redirect('../../participant/login');
  exit();
}


$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../../login.php');
}


$profileimage = mysqli_query($connecDB,"SELECT * FROM tbl_researcher WHERE userID='".$_SESSION['researcherSession']."'");
$rowimage = mysqli_fetch_array($profileimage);

$stmt = $researcher_home->runQuery("SELECT * FROM tbl_researcher WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['researcherSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$emailnotifications=explode(',',$row['EmailNotifications']);


$Project = mysqli_query($connecDB,"SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."'");
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






$ProjectPotentialanswers = mysqli_query($connecDB,"SELECT * FROM tbl_researcher_potentialanswers WHERE userID='".$_SESSION['researcherSession']."' AND ProjectID = '41'");
$rowpotentialanswers = mysqli_fetch_array($ProjectPotentialanswers);

$screening=explode(',',$rowpotentialanswers['Screening']);

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
      





<div id="tabs">
    
    

    <div id="a">


        
<?php if(isset($_SESSION['access_token'])){ ?>
        <img src="<?php echo $_SESSION['google_picture_link']; ?>" class="profile-photo">
<?php } ?>

<?php if(isset($_SESSION['facebook_photo'])){ ?>
       
        <img src="https://graph.facebook.com/<?php echo $_SESSION['facebook_photo']; ?>/picture?width=150&height=150" class="profile-photo">

<?php } ?>
       
<?php if(!isset($_SESSION['access_token']) && (!isset($_SESSION['facebook_photo']))){ ?>

<img src="<?php echo BASE_PATH; ?>/images/profile/<?PHP echo $rowimage['profile_image']; ?>" class="profile-photo">

<?php } ?>

      

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

      



        <div class="note">This is <strong>never shared</strong> and only used to send you notifications.</div>

        <fieldset>
          <span class="input">
            <label for="location">Your Location</label>
            <input type="text" name="location" id="location" placeholder="San Francisco, CA" value="New York, New York">
          </span>
         <!-- <span class="select gap-before">
            <label>Your Timezone</label>
            <span class="select-wrapper">
              <select name="timezone" class="timezone">
                <option value="" disabled="disabled">Select a timezone</option>
                <option value="Hawaii">(GMT-10:00) Hawaii</option>
                <option value="Alaska">(GMT-08:00) Alaska</option>
                <option value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option>
                <option value="Arizona">(GMT-07:00) Arizona</option>
                <option value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option>
                <option value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option>
                <option value="Eastern Time (US &amp; Canada)" selected="selected">(GMT-04:00) Eastern Time (US &amp; Canada)</option>
                <option value="Indiana (East)">(GMT-04:00) Indiana (East)</option>
                <option value="Atlantic Time (Canada)">(GMT-03:00) Atlantic Time (Canada)</option>
                <option value="break" disabled="disabled">--------</option><option value="American Samoa">(GMT-11:00) American Samoa</option>
                <option value="International Date Line West">(GMT-11:00) International Date Line West</option>
                <option value="Midway Island">(GMT-11:00) Midway Island</option>
                <option value="Tijuana">(GMT-07:00) Tijuana</option><option value="Chihuahua">(GMT-06:00) Chihuahua</option><option value="Mazatlan">(GMT-06:00) Mazatlan</option><option value="Central America">(GMT-06:00) Central America</option><option value="Guadalajara">(GMT-05:00) Guadalajara</option><option value="Mexico City">(GMT-05:00) Mexico City</option><option value="Monterrey">(GMT-05:00) Monterrey</option><option value="Saskatchewan">(GMT-06:00) Saskatchewan</option><option value="Bogota">(GMT-05:00) Bogota</option><option value="Lima">(GMT-05:00) Lima</option><option value="Quito">(GMT-05:00) Quito</option><option value="Caracas">(GMT-04:30) Caracas</option><option value="Georgetown">(GMT-04:00) Georgetown</option><option value="La Paz">(GMT-04:00) La Paz</option><option value="Newfoundland">(GMT-02:30) Newfoundland</option><option value="Brasilia">(GMT-03:00) Brasilia</option><option value="Buenos Aires">(GMT-03:00) Buenos Aires</option><option value="Greenland">(GMT-02:00) Greenland</option><option value="Santiago">(GMT-03:00) Santiago</option><option value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option><option value="Azores">(GMT+00:00) Azores</option><option value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option><option value="Casablanca">(GMT+01:00) Casablanca</option><option value="Dublin">(GMT+01:00) Dublin</option><option value="Edinburgh">(GMT+01:00) Edinburgh</option><option value="Lisbon">(GMT+01:00) Lisbon</option><option value="London">(GMT+01:00) London</option><option value="Monrovia">(GMT+00:00) Monrovia</option><option value="UTC">(GMT+00:00) UTC</option><option value="Amsterdam">(GMT+02:00) Amsterdam</option><option value="Belgrade">(GMT+02:00) Belgrade</option><option value="Berlin">(GMT+02:00) Berlin</option><option value="Bern">(GMT+02:00) Bern</option><option value="Bratislava">(GMT+02:00) Bratislava</option><option value="Brussels">(GMT+02:00) Brussels</option><option value="Budapest">(GMT+02:00) Budapest</option><option value="Copenhagen">(GMT+02:00) Copenhagen</option><option value="Ljubljana">(GMT+02:00) Ljubljana</option><option value="Madrid">(GMT+02:00) Madrid</option><option value="Paris">(GMT+02:00) Paris</option><option value="Prague">(GMT+02:00) Prague</option><option value="Rome">(GMT+02:00) Rome</option><option value="Sarajevo">(GMT+02:00) Sarajevo</option><option value="Skopje">(GMT+02:00) Skopje</option><option value="Stockholm">(GMT+02:00) Stockholm</option><option value="Vienna">(GMT+02:00) Vienna</option><option value="Warsaw">(GMT+02:00) Warsaw</option><option value="West Central Africa">(GMT+01:00) West Central Africa</option><option value="Zagreb">(GMT+02:00) Zagreb</option><option value="Athens">(GMT+03:00) Athens</option><option value="Bucharest">(GMT+03:00) Bucharest</option><option value="Cairo">(GMT+02:00) Cairo</option><option value="Harare">(GMT+02:00) Harare</option><option value="Helsinki">(GMT+03:00) Helsinki</option><option value="Istanbul">(GMT+03:00) Istanbul</option><option value="Jerusalem">(GMT+03:00) Jerusalem</option><option value="Kyiv">(GMT+03:00) Kyiv</option><option value="Pretoria">(GMT+02:00) Pretoria</option><option value="Riga">(GMT+03:00) Riga</option><option value="Sofia">(GMT+03:00) Sofia</option><option value="Tallinn">(GMT+03:00) Tallinn</option><option value="Vilnius">(GMT+03:00) Vilnius</option><option value="Baghdad">(GMT+03:00) Baghdad</option><option value="Kuwait">(GMT+03:00) Kuwait</option><option value="Minsk">(GMT+03:00) Minsk</option><option value="Moscow">(GMT+03:00) Moscow</option><option value="Nairobi">(GMT+03:00) Nairobi</option><option value="Riyadh">(GMT+03:00) Riyadh</option><option value="St. Petersburg">(GMT+03:00) St. Petersburg</option><option value="Volgograd">(GMT+03:00) Volgograd</option><option value="Tehran">(GMT+04:30) Tehran</option><option value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option><option value="Baku">(GMT+05:00) Baku</option><option value="Muscat">(GMT+04:00) Muscat</option><option value="Tbilisi">(GMT+04:00) Tbilisi</option><option value="Yerevan">(GMT+04:00) Yerevan</option><option value="Kabul">(GMT+04:30) Kabul</option><option value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option><option value="Islamabad">(GMT+05:00) Islamabad</option><option value="Karachi">(GMT+05:00) Karachi</option><option value="Tashkent">(GMT+05:00) Tashkent</option><option value="Chennai">(GMT+05:30) Chennai</option><option value="Kolkata">(GMT+05:30) Kolkata</option><option value="Mumbai">(GMT+05:30) Mumbai</option><option value="New Delhi">(GMT+05:30) New Delhi</option><option value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option><option value="Kathmandu">(GMT+05:45) Kathmandu</option><option value="Almaty">(GMT+06:00) Almaty</option><option value="Astana">(GMT+06:00) Astana</option><option value="Dhaka">(GMT+06:00) Dhaka</option><option value="Novosibirsk">(GMT+06:00) Novosibirsk</option><option value="Urumqi">(GMT+06:00) Urumqi</option><option value="Rangoon">(GMT+06:30) Rangoon</option><option value="Bangkok">(GMT+07:00) Bangkok</option><option value="Hanoi">(GMT+07:00) Hanoi</option><option value="Jakarta">(GMT+07:00) Jakarta</option><option value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option><option value="Beijing">(GMT+08:00) Beijing</option><option value="Chongqing">(GMT+08:00) Chongqing</option><option value="Hong Kong">(GMT+08:00) Hong Kong</option><option value="Irkutsk">(GMT+08:00) Irkutsk</option><option value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option><option value="Perth">(GMT+08:00) Perth</option><option value="Singapore">(GMT+08:00) Singapore</option><option value="Taipei">(GMT+08:00) Taipei</option><option value="Ulaan Bataar">(GMT+09:00) Ulaan Bataar</option><option value="Osaka">(GMT+09:00) Osaka</option><option value="Sapporo">(GMT+09:00) Sapporo</option><option value="Seoul">(GMT+09:00) Seoul</option><option value="Tokyo">(GMT+09:00) Tokyo</option><option value="Yakutsk">(GMT+09:00) Yakutsk</option><option value="Adelaide">(GMT+09:30) Adelaide</option><option value="Darwin">(GMT+09:30) Darwin</option><option value="Brisbane">(GMT+10:00) Brisbane</option><option value="Canberra">(GMT+10:00) Canberra</option><option value="Guam">(GMT+10:00) Guam</option><option value="Hobart">(GMT+10:00) Hobart</option><option value="Magadan">(GMT+10:00) Magadan</option><option value="Melbourne">(GMT+10:00) Melbourne</option><option value="Port Moresby">(GMT+10:00) Port Moresby</option><option value="Solomon Is.">(GMT+10:00) Solomon Is.</option><option value="Sydney">(GMT+10:00) Sydney</option><option value="Vladivostok">(GMT+10:00) Vladivostok</option><option value="New Caledonia">(GMT+11:00) New Caledonia</option><option value="Auckland">(GMT+12:00) Auckland</option><option value="Fiji">(GMT+12:00) Fiji</option><option value="Kamchatka">(GMT+12:00) Kamchatka</option><option value="Marshall Is.">(GMT+12:00) Marshall Is.</option><option value="Wellington">(GMT+12:00) Wellington</option><option value="Nuku" alofa'="">(GMT+13:00) Nuku'alofa</option><option value="Samoa">(GMT+13:00) Samoa</option><option value="Tokelau Is.">(GMT+13:00) Tokelau Is.</option></select>
            </span>
          </span>-->
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


      
 
      

 
        <h2 class="no-mobile">
          Social Accounts
        </h2>

       


  <fieldset>
          <span class="input">
            <label for="firstname">Linkedin</label>
           <input type="text" name="linkedin" id="linkedin" placeholder="http://" value="<?php echo $row['Linkedin']; ?>" class="validate">
          </span>
           <span class="input">
            <label for="lastname">Twitter</label>
            <input type="text" name="twitter" id="twitter" placeholder="http://" value="<?php echo $row['Twitter']; ?>" class="validate">
          </span>
           <span class="input">
            <label for="lastname">Facebook</label>
            <input type="text" name="facebook" id="facebook" placeholder="http://" value="<?php echo $row['Facebook']; ?>" class="validate">
          </span>
        </fieldset>
        

        
<h2 class="no-mobile">Receive email notifications when:</h2>
         
        <input id="New-participant-requests-to-participate" name="emailnotifications[]" type="checkbox"  value="New participant requests to participate" <?php if(in_array('New participant requests to participate',$emailnotifications)){echo "checked";}?>/>
  <label for="New-participant-requests-to-participate">New participant requests to participate</label><br>

       


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
<?php include("../../../footer.php"); ?>
<!--Footer-->
      

    </div>

    <div class="clearer"></div>

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