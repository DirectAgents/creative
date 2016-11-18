<?php
session_start();
require_once '../../class.participant.php';
include_once("../../config.php");

$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login.php');
}


$profileimage = mysql_query("SELECT * FROM participant_profile_images WHERE userID='".$_SESSION['participantSession']."'");
$rowimage = mysql_fetch_array($profileimage);

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$Project = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$rowproject = mysql_fetch_array($Project);

$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$height=explode(',',$rowproject['Height']);
$location=explode(',',$rowproject['Location']);
$status=explode(',',$rowproject['Status']);
$ethnicity=explode(',',$rowproject['Ethnicity']);
$smoke=explode(',',$rowproject['Smoke']);
$drink=explode(',',$rowproject['Drink']);
$diet=explode(',',$rowproject['Diet']);
$religion=explode(',',$rowproject['Religion']);
$education=explode(',',$rowproject['Education']);
$job=explode(',',$rowproject['Job']);






?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo $row['userEmail']; ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="<?php echo BASE_PATH; ?>/css/font-awesome.css" rel="stylesheet" media="screen">




<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">






<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--JAVASCRIPT-->
<script src="<?php echo BASE_PATH; ?>/participant/project/js/script.js"></script>

 <!-- jQuery Popup Overlay -->
<script src="<?php echo BASE_PATH; ?>/participant/project/js/jquery.popupoverlay.js"></script>




  
    <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  

  
    
      <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css">



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

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



        
    </head>
    
    <body>

<!--TopNav-->
        <?php include("../nav.php"); ?>

<!--TopNav-->
  
        


    <!-- Main -->










 <div class="clearer"></div>

  <div class="container">
    <div id="white-container-account">



    
    <div class="main">
            <ul class="tabs">
              <li>
                <input type="radio" checked name="tabs" id="tab1">
                <label for="tab1">Personal Information</label>
                <div id="tab-content1" class="tab-content animated fadeIn">


 <form id="basic-information" class="ff" name="edit profile">
        <h2 class="no-mobile">
          Basic information
        </h2>

        <fieldset>
          <span class="input">
            <label for="name">Firstname</label>
            <input type="text" name="firstname" id="firstname" placeholder="John Doe" value="<?php echo $row['FirstName'];  ?>" class="validate">
          </span>
           <span class="input">
            <label for="name">Lastname</label>
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
            <span class="select-wrapper">
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
            </span>
            <input placeholder="XXX-XXX-XXXX" type="text" name="phone_number" id="phone_number" value="<?php echo $row['Phone']; ?>" class="validate">
          </span>
        </fieldset>

      



        <div class="note">This is <strong>never shared</strong> and only used to send you notifications.</div>

        <fieldset>
          <span class="input">
            <label for="location">Your Location</label>
            <input type="text" name="location" id="location" placeholder="New York, NY" value="New York, New York">
          </span>
          <span class="select gap-before">
            <label>Your Timezone</label>
            <span class="select-wrapper">
              <select name="timezone" class="timezone"><option value="" disabled="disabled">Select a timezone</option><option value="Hawaii">(GMT-10:00) Hawaii</option><option value="Alaska">(GMT-08:00) Alaska</option><option value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option><option value="Arizona">(GMT-07:00) Arizona</option><option value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option><option value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option><option value="Eastern Time (US &amp; Canada)" selected="selected">(GMT-04:00) Eastern Time (US &amp; Canada)</option><option value="Indiana (East)">(GMT-04:00) Indiana (East)</option><option value="Atlantic Time (Canada)">(GMT-03:00) Atlantic Time (Canada)</option><option value="break" disabled="disabled">--------</option><option value="American Samoa">(GMT-11:00) American Samoa</option><option value="International Date Line West">(GMT-11:00) International Date Line West</option><option value="Midway Island">(GMT-11:00) Midway Island</option><option value="Tijuana">(GMT-07:00) Tijuana</option><option value="Chihuahua">(GMT-06:00) Chihuahua</option><option value="Mazatlan">(GMT-06:00) Mazatlan</option><option value="Central America">(GMT-06:00) Central America</option><option value="Guadalajara">(GMT-05:00) Guadalajara</option><option value="Mexico City">(GMT-05:00) Mexico City</option><option value="Monterrey">(GMT-05:00) Monterrey</option><option value="Saskatchewan">(GMT-06:00) Saskatchewan</option><option value="Bogota">(GMT-05:00) Bogota</option><option value="Lima">(GMT-05:00) Lima</option><option value="Quito">(GMT-05:00) Quito</option><option value="Caracas">(GMT-04:30) Caracas</option><option value="Georgetown">(GMT-04:00) Georgetown</option><option value="La Paz">(GMT-04:00) La Paz</option><option value="Newfoundland">(GMT-02:30) Newfoundland</option><option value="Brasilia">(GMT-03:00) Brasilia</option><option value="Buenos Aires">(GMT-03:00) Buenos Aires</option><option value="Greenland">(GMT-02:00) Greenland</option><option value="Santiago">(GMT-03:00) Santiago</option><option value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option><option value="Azores">(GMT+00:00) Azores</option><option value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option><option value="Casablanca">(GMT+01:00) Casablanca</option><option value="Dublin">(GMT+01:00) Dublin</option><option value="Edinburgh">(GMT+01:00) Edinburgh</option><option value="Lisbon">(GMT+01:00) Lisbon</option><option value="London">(GMT+01:00) London</option><option value="Monrovia">(GMT+00:00) Monrovia</option><option value="UTC">(GMT+00:00) UTC</option><option value="Amsterdam">(GMT+02:00) Amsterdam</option><option value="Belgrade">(GMT+02:00) Belgrade</option><option value="Berlin">(GMT+02:00) Berlin</option><option value="Bern">(GMT+02:00) Bern</option><option value="Bratislava">(GMT+02:00) Bratislava</option><option value="Brussels">(GMT+02:00) Brussels</option><option value="Budapest">(GMT+02:00) Budapest</option><option value="Copenhagen">(GMT+02:00) Copenhagen</option><option value="Ljubljana">(GMT+02:00) Ljubljana</option><option value="Madrid">(GMT+02:00) Madrid</option><option value="Paris">(GMT+02:00) Paris</option><option value="Prague">(GMT+02:00) Prague</option><option value="Rome">(GMT+02:00) Rome</option><option value="Sarajevo">(GMT+02:00) Sarajevo</option><option value="Skopje">(GMT+02:00) Skopje</option><option value="Stockholm">(GMT+02:00) Stockholm</option><option value="Vienna">(GMT+02:00) Vienna</option><option value="Warsaw">(GMT+02:00) Warsaw</option><option value="West Central Africa">(GMT+01:00) West Central Africa</option><option value="Zagreb">(GMT+02:00) Zagreb</option><option value="Athens">(GMT+03:00) Athens</option><option value="Bucharest">(GMT+03:00) Bucharest</option><option value="Cairo">(GMT+02:00) Cairo</option><option value="Harare">(GMT+02:00) Harare</option><option value="Helsinki">(GMT+03:00) Helsinki</option><option value="Istanbul">(GMT+03:00) Istanbul</option><option value="Jerusalem">(GMT+03:00) Jerusalem</option><option value="Kyiv">(GMT+03:00) Kyiv</option><option value="Pretoria">(GMT+02:00) Pretoria</option><option value="Riga">(GMT+03:00) Riga</option><option value="Sofia">(GMT+03:00) Sofia</option><option value="Tallinn">(GMT+03:00) Tallinn</option><option value="Vilnius">(GMT+03:00) Vilnius</option><option value="Baghdad">(GMT+03:00) Baghdad</option><option value="Kuwait">(GMT+03:00) Kuwait</option><option value="Minsk">(GMT+03:00) Minsk</option><option value="Moscow">(GMT+03:00) Moscow</option><option value="Nairobi">(GMT+03:00) Nairobi</option><option value="Riyadh">(GMT+03:00) Riyadh</option><option value="St. Petersburg">(GMT+03:00) St. Petersburg</option><option value="Volgograd">(GMT+03:00) Volgograd</option><option value="Tehran">(GMT+04:30) Tehran</option><option value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option><option value="Baku">(GMT+05:00) Baku</option><option value="Muscat">(GMT+04:00) Muscat</option><option value="Tbilisi">(GMT+04:00) Tbilisi</option><option value="Yerevan">(GMT+04:00) Yerevan</option><option value="Kabul">(GMT+04:30) Kabul</option><option value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option><option value="Islamabad">(GMT+05:00) Islamabad</option><option value="Karachi">(GMT+05:00) Karachi</option><option value="Tashkent">(GMT+05:00) Tashkent</option><option value="Chennai">(GMT+05:30) Chennai</option><option value="Kolkata">(GMT+05:30) Kolkata</option><option value="Mumbai">(GMT+05:30) Mumbai</option><option value="New Delhi">(GMT+05:30) New Delhi</option><option value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option><option value="Kathmandu">(GMT+05:45) Kathmandu</option><option value="Almaty">(GMT+06:00) Almaty</option><option value="Astana">(GMT+06:00) Astana</option><option value="Dhaka">(GMT+06:00) Dhaka</option><option value="Novosibirsk">(GMT+06:00) Novosibirsk</option><option value="Urumqi">(GMT+06:00) Urumqi</option><option value="Rangoon">(GMT+06:30) Rangoon</option><option value="Bangkok">(GMT+07:00) Bangkok</option><option value="Hanoi">(GMT+07:00) Hanoi</option><option value="Jakarta">(GMT+07:00) Jakarta</option><option value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option><option value="Beijing">(GMT+08:00) Beijing</option><option value="Chongqing">(GMT+08:00) Chongqing</option><option value="Hong Kong">(GMT+08:00) Hong Kong</option><option value="Irkutsk">(GMT+08:00) Irkutsk</option><option value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option><option value="Perth">(GMT+08:00) Perth</option><option value="Singapore">(GMT+08:00) Singapore</option><option value="Taipei">(GMT+08:00) Taipei</option><option value="Ulaan Bataar">(GMT+09:00) Ulaan Bataar</option><option value="Osaka">(GMT+09:00) Osaka</option><option value="Sapporo">(GMT+09:00) Sapporo</option><option value="Seoul">(GMT+09:00) Seoul</option><option value="Tokyo">(GMT+09:00) Tokyo</option><option value="Yakutsk">(GMT+09:00) Yakutsk</option><option value="Adelaide">(GMT+09:30) Adelaide</option><option value="Darwin">(GMT+09:30) Darwin</option><option value="Brisbane">(GMT+10:00) Brisbane</option><option value="Canberra">(GMT+10:00) Canberra</option><option value="Guam">(GMT+10:00) Guam</option><option value="Hobart">(GMT+10:00) Hobart</option><option value="Magadan">(GMT+10:00) Magadan</option><option value="Melbourne">(GMT+10:00) Melbourne</option><option value="Port Moresby">(GMT+10:00) Port Moresby</option><option value="Solomon Is.">(GMT+10:00) Solomon Is.</option><option value="Sydney">(GMT+10:00) Sydney</option><option value="Vladivostok">(GMT+10:00) Vladivostok</option><option value="New Caledonia">(GMT+11:00) New Caledonia</option><option value="Auckland">(GMT+12:00) Auckland</option><option value="Fiji">(GMT+12:00) Fiji</option><option value="Kamchatka">(GMT+12:00) Kamchatka</option><option value="Marshall Is.">(GMT+12:00) Marshall Is.</option><option value="Wellington">(GMT+12:00) Wellington</option><option value="Nuku" alofa'="">(GMT+13:00) Nuku'alofa</option><option value="Samoa">(GMT+13:00) Samoa</option><option value="Tokelau Is.">(GMT+13:00) Tokelau Is.</option></select>
            </span>
          </span>
        </fieldset>

            <fieldset>
          <span class="input">
            <label for="short_bio">Short Bio</label>
            <textarea name="short_bio" placeholder="Your Short Bio"><?php echo $row['Bio']; ?></textarea>
          </span>
        </fieldset>
        <div class="note">Optional — 50 characters</div>



 <h2 class="no-mobile">
          General Information
        </h2>

        <fieldset>
          <span class="input">
            <label for="name">Age</label>
            <input type="text" name="age" id="age" placeholder="ex. 28" value="<?php if($row['Age'] == 'NULL'){echo '';}else{echo $row['Age'];} ?>" class="validate">
          </span>
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

<div id="result"></div>
        <div id="save">
          <button type="button" id="btn-save" class="basicinformationsubmit">Save</button>

            </div>

      </form>



                </div>
              </li>
              <li>
                <input type="radio" name="tabs" id="tab2">
                <label for="tab2">Photo</label>
                <div id="tab-content2" class="tab-content animated fadeIn">

  <div class="form-container">
      
      <div id="uploaded_images" class="uploaded-images">
      <div id="error_div"></div>
      
       <div id='preview'>
         
          <img src="uploads/<?PHP echo $rowimage['thumbnail_image']; ?>" class="preview">

       </div>

      <div id="success_div">
       
       
       
      </div>
      
    </div>

  

<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
<input type="file" name="photoimg" id="photoimg" />
</form>
  
       


    </div>
    <div class="clearfix"></div>

                </div>
              </li>
              <li>
                <input type="radio" name="tabs" id="tab3">
                <label for="tab3">Social</label>
                <div id="tab-content3" class="tab-content animated fadeIn">

 <form class="ff" name="edit profile">
        <h2 class="no-mobile">
          Social Accounts
        </h2>

        <fieldset>
         

<div class="in-person">


               <input id="in-person" name="meetupselection[]" type="checkbox" value="In Person" <?php if(in_array('In Person',$meetupchoice)){echo "checked";}?> />
            <label for="in-person">Linkedid</label>
             </div>

             <div class="in-person">


               <input id="in-person" name="meetupselection[]" type="checkbox" value="In Person" <?php if(in_array('In Person',$meetupchoice)){echo "checked";}?> />
            <label for="in-person">Twitter</label>
             </div>


             <div class="in-person">


               <input id="in-person" name="meetupselection[]" type="checkbox" value="In Person" <?php if(in_array('In Person',$meetupchoice)){echo "checked";}?> />
            <label for="in-person">Facebook</label>
             </div>

        </fieldset>

        

        

       


        <div id="save">
              <input type="submit" value="Save"/>

            </div>

      </form>





    </div>
  








               
              </li>


 <li>
                <input type="radio" name="tabs" id="tab4">
                <label for="tab4">Availability</label>
                <div id="tab-content4" class="tab-content animated fadeIn">

 <form class="ff" name="edit profile">
        <h2 class="no-mobile">
          Social Accounts
        </h2>

        <fieldset>
         

<div class="in-person">


               <input id="in-person" name="meetupselection[]" type="checkbox" value="In Person" <?php if(in_array('In Person',$meetupchoice)){echo "checked";}?> />
            <label for="in-person">Linkedid</label>
             </div>

             <div class="in-person">


               <input id="in-person" name="meetupselection[]" type="checkbox" value="In Person" <?php if(in_array('In Person',$meetupchoice)){echo "checked";}?> />
            <label for="in-person">Twitter</label>
             </div>


             <div class="in-person">


               <input id="in-person" name="meetupselection[]" type="checkbox" value="In Person" <?php if(in_array('In Person',$meetupchoice)){echo "checked";}?> />
            <label for="in-person">Facebook</label>
             </div>

        </fieldset>

        

        

       


        <div id="save">
              <input type="submit" id="savepersonalinformation" value="Save"/>

            </div>

      </form>





    </div>
  







<div class="clearer"></div>

                </div>
              </li>



             
</div>


          </ul>
          </div>
    









      





<!--ending-->

      <div class="clearer"></div>


  

      

    </div>

    <div class="clearer"></div>

  </div>






        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>




<script type="text/javascript" src="<?php echo BASE_PATH; ?>/participant/account/js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo BASE_PATH; ?>/participant/account/js/jquery.form.js"></script>

<script type="text/javascript" >
 $(document).ready(function() { 
    
            $('#photoimg').live('change', function()      { 
                 $("#preview").html('');
          $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
      $("#imageform").ajaxForm({
            target: '#preview'
    }).submit();
    
      });
        }); 
</script>




        
    </body>

</html>