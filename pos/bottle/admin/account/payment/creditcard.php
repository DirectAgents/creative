<?php

session_start();
require_once '../../../base_path.php';

include("../../../config.php"); //include config file
include("../../../config.inc.php");
require_once '../../../class.admin.php';
require_once '../../../class.customer.php';


require_once '../../../wepay.php';





$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
  $admin_home->redirect('../../../admin/login');
}





$stmt = $admin_home->runQuery("SELECT * FROM tbl_admin WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?> 

<?php if($row['account_id'] == '') { ?>

<h3>You haven't set up an account yet!</h3>
<p>Looks like you haven't set up an account yet to send money! Click on button below to create one.</p>



<div class="wepay_btn_box">  
  <div class="wepay_btn">

<a id="start_oauth3">Click here to create an Account to send money</a>
 
<script src="<?php echo $endpoint_url; ?>/min/js/wepay.v2.js" type="text/javascript"></script>
<script type="text/javascript">

WePay.set_endpoint("<?php echo $endpoint; ?>"); // stage or production

WePay.OAuth2.button_init(document.getElementById('start_oauth3'), {
    "client_id":"<?php echo $wepay_client_id; ?>",
     "scope":["manage_accounts","collect_payments","view_user","send_money","preapprove_payments"],
    //"user_name":"test user",
    //"user_email":"test@example.com",
    "redirect_uri":"<?php echo BASE_PATH; ?>/startup/payment/",
    "top":100, // control the positioning of the popup with the top and left params
    "left":100,
    "state":"robot", // this is an optional parameter that lets you persist some state value through the flow
    "callback":function(data) {
    /** This callback gets fired after the user clicks "grant access" in the popup and the popup closes. The data object will include the code which you can pass to your server to make the /oauth2/token call **/
        //alert(data.code);
    if (data.code.length !== 0) {
      // send the data to the server
      window.location.href = "<?php echo BASE_PATH; ?>/startup/account/wepay/oauth2/token/?client_id=<?php echo $wepay_client_id; ?>&code="+data.code+"&redirect_uri=<?php echo BASE_PATH; ?>/startup/account/wepay/&client_secret=<?php echo $wepay_client_secret; ?>&code="+data.code;

    } else {
      // an error has occurred and will be in data.error
    }
  }
});

</script>

</div>

</div>



<?php } ?>


<?php if($row['credit_card_id'] == '' && $row['account_id'] != '' ) { ?>




<div class="col-lg-11">

<div class="no-bankaccount-set">  
  Please add a credit card below to send payments.
</div>
<p>&nbsp;</p>

</div>



<?php } ?>


<?php if($row['credit_card_id'] != '' && $row['account_id'] != '' ) { ?>


 <h2 class="heading no-gap">

        <?php

        $cc_name = $row['cc_name'];
        $cc_name_type = explode(' ',trim($cc_name));


        ?>
      
        Your <strong><?php echo $cc_name_type[0];?></strong> ending in <strong><?php echo $row['cc_last_four'];?></strong> is linked to this account.
      
    </h2>
    <p>&nbsp;</p>


<?php } ?>


<?php if($row['account_id'] != '') { ?>

 <form class="ff" id="profile-form" name="edit profile" method="get" action="<?php echo BASE_PATH; ?>/startup/payment/wepay/credit_card/create" target="_self">
  
  


  <input type="hidden" name="user_name" id="user_name" value="<?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?>"/>
  <input type="hidden" name="email" id="email" value="<?php echo $row['userEmail']; ?>"/>




       

        <h2 class="no-mobile">Payment Details</h2>
         
        

  <fieldset>

<section data-group="payment" style="">
    
      <div class="note notforheader mobile-block">
        
          <strong>To update, please supply a new card below.</strong>
        
        
      </div>
    
    <fieldset>
      <span class="input span-2-1">
        <label for="cc-number" class="">Credit Card</label>
        <span class="group">
          <input type="text" name="cc_number" id="cc_number" placeholder="Card number" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number" required="true">
          <input type="text" name="cvv" id="cvv" placeholder="CVV" required="true">
        </span>
      </span>
      <span class="input select span-2-1">
        <label for="cc-month">Expiration</label>
        <span class="group">
          <span class="select-wrapper" style="width: 65%; float: left; border-left: 0;">
            <select name="expiration_month" id="expiration_month" autocomplete="cc-exp-month" autocompletetype="cc-exp-month" x-autocompletetype="cc-exp-month" required="true">
              <option value="">Month</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </span>
          <span class="select-wrapper" style="width: 35%; float: right;">
            <select name="expiration_year" id="expiration_year" autocomplete="cc-exp-year" autocompletetype="cc-exp-year" x-autocompletetype="cc-exp-year" required="true">
              <option value="">Year</option>
              
                
                
                <option value="2016">2016</option>
              
                
                
                <option value="2017">2017</option>
              
                
                
                <option value="2018">2018</option>
              
                
                
                <option value="2019">2019</option>
              
                
                
                <option value="2020">2020</option>
              
                
                
                <option value="2021">2021</option>
              
                
                
                <option value="2022">2022</option>
              
                
                
                <option value="2023">2023</option>
              
                
                
                <option value="2024">2024</option>
              
                
                
                <option value="2025">2025</option>
              
                
                
                <option value="2026">2026</option>
              
                
                
                <option value="2027">2027</option>
              
                
                
                <option value="2028">2028</option>
              
                
                
                <option value="2029">2029</option>
              
                
                
                <option value="2030">2030</option>
              
                
                
                <option value="2031">2031</option>
              
                
                
                <option value="2032">2032</option>
              
                
                
                <option value="2033">2033</option>
              
                
                
                <option value="2034">2034</option>
              
                
                
                <option value="2035">2035</option>
              
            </select>
          </span>
        </span>
      </span>
    </fieldset>
    <div class="note">Your information is kept 100% private!</div>
    <hr>
  </section>





  </fieldset>





<h2 class="no-mobile">
          Billing Address
        </h2>

     
         <section data-group="billing-address" style="">
  

  <fieldset>
    <span class="input required">
      <label for="address1">Address Line 1<em>*</em></label>
      <input type="text" name="billing_address1" required="true" id="billing_address1" placeholder="123 Smith St." value="<?php echo $row['billing_address_one']; ?>">
    </span>

    <span class="input required">
      <label for="address2">Address Line 2</label>
      <input type="text" name="billing_address2" id="billing_address2" placeholder="Optional" value="<?php echo $row['billing_address_two']; ?>">
    </span>

    <span class="input required">
      <label for="city">City <em>*</em></label>
      <span class="group">
        <input type="text" name="billing_city"  id="billing_city" placeholder="New York" value="<?php echo $row['billing_city']; ?>">
      </span>
    </span>

    <span class="input required">
      <label for="region">State/Province <em>*</em></label>
      <span class="group">
        <input type="text" name="billing_state"  id="billing_state" placeholder="NY" value="<?php echo $row['billing_state']; ?>">
      </span>
    </span>

    <span class="input required">
      <label for="zip">Postal Code / ZIP <em>*</em></label>
      <span class="group">
        <input type="text" name="billing_zip"  id="billing_zip" placeholder="10001" value="<?php echo $row['billing_zip']; ?>">
      </span>
    </span>

    <span class="input select required">
      <label for="country">Country <em>*</em></label>
      <span class="group">
        <span class="select-wrapper country-select-wrapper">
          <select name="billing_country">
            <option value="">Choose Country</option>
            
              <option value="AF">Afghanistan</option>
            
              <option value="AL">Albania</option>
            
              <option value="DZ">Algeria</option>
            
              <option value="AS">American Samoa</option>
            
              <option value="AD">Andorra</option>
            
              <option value="AO">Angola</option>
            
              <option value="AI">Anguilla</option>
            
              <option value="AQ">Antarctica</option>
            
              <option value="AG">Antigua and Barbuda</option>
            
              <option value="AR">Argentina</option>
            
              <option value="AM">Armenia</option>
            
              <option value="AW">Aruba</option>
            
              <option value="AU">Australia</option>
            
              <option value="AT">Austria</option>
            
              <option value="AZ">Azerbaijan</option>
            
              <option value="BS">Bahamas</option>
            
              <option value="BH">Bahrain</option>
            
              <option value="BD">Bangladesh</option>
            
              <option value="BB">Barbados</option>
            
              <option value="BY">Belarus</option>
            
              <option value="BE">Belgium</option>
            
              <option value="BZ">Belize</option>
            
              <option value="BJ">Benin</option>
            
              <option value="BM">Bermuda</option>
            
              <option value="BT">Bhutan</option>
            
              <option value="BO">Bolivia</option>
            
              <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
            
              <option value="BA">Bosnia and Herzegovina</option>
            
              <option value="BW">Botswana</option>
            
              <option value="BV">Bouvet Island</option>
            
              <option value="BR">Brazil</option>
            
              <option value="IO">British Indian Ocean Territory</option>
            
              <option value="BN">Brunei Darussalam</option>
            
              <option value="BG">Bulgaria</option>
            
              <option value="BF">Burkina Faso</option>
            
              <option value="BI">Burundi</option>
            
              <option value="KH">Cambodia</option>
            
              <option value="CM">Cameroon</option>
            
              <option value="CA">Canada</option>
            
              <option value="CV">Cape Verde</option>
            
              <option value="KY">Cayman Islands</option>
            
              <option value="CF">Central African Republic</option>
            
              <option value="TD">Chad</option>
            
              <option value="CL">Chile</option>
            
              <option value="CN">China</option>
            
              <option value="CX">Christmas Island</option>
            
              <option value="CC">Cocos (Keeling) Islands</option>
            
              <option value="CO">Colombia</option>
            
              <option value="KM">Comoros</option>
            
              <option value="CG">Congo</option>
            
              <option value="CD">Congo, The Democratic Republic Of The</option>
            
              <option value="CK">Cook Islands</option>
            
              <option value="CR">Costa Rica</option>
            
              <option value="HR">Croatia</option>
            
              <option value="CU">Cuba</option>
            
              <option value="CW">Curaçao</option>
            
              <option value="CY">Cyprus</option>
            
              <option value="CZ">Czech Republic</option>
            
              <option value="CI">Côte D'Ivoire</option>
            
              <option value="DK">Denmark</option>
            
              <option value="DJ">Djibouti</option>
            
              <option value="DM">Dominica</option>
            
              <option value="DO">Dominican Republic</option>
            
              <option value="EC">Ecuador</option>
            
              <option value="EG">Egypt</option>
            
              <option value="SV">El Salvador</option>
            
              <option value="GQ">Equatorial Guinea</option>
            
              <option value="ER">Eritrea</option>
            
              <option value="EE">Estonia</option>
            
              <option value="ET">Ethiopia</option>
            
              <option value="FK">Falkland Islands (Malvinas)</option>
            
              <option value="FO">Faroe Islands</option>
            
              <option value="FJ">Fiji</option>
            
              <option value="FI">Finland</option>
            
              <option value="FR">France</option>
            
              <option value="GF">French Guiana</option>
            
              <option value="PF">French Polynesia</option>
            
              <option value="TF">French Southern Territories</option>
            
              <option value="GA">Gabon</option>
            
              <option value="GM">Gambia</option>
            
              <option value="GE">Georgia</option>
            
              <option value="DE">Germany</option>
            
              <option value="GH">Ghana</option>
            
              <option value="GI">Gibraltar</option>
            
              <option value="GR">Greece</option>
            
              <option value="GL">Greenland</option>
            
              <option value="GD">Grenada</option>
            
              <option value="GP">Guadeloupe</option>
            
              <option value="GU">Guam</option>
            
              <option value="GT">Guatemala</option>
            
              <option value="GG">Guernsey</option>
            
              <option value="GN">Guinea</option>
            
              <option value="GW">Guinea-Bissau</option>
            
              <option value="GY">Guyana</option>
            
              <option value="HT">Haiti</option>
            
              <option value="HM">Heard and McDonald Islands</option>
            
              <option value="VA">Holy See (Vatican City State)</option>
            
              <option value="HN">Honduras</option>
            
              <option value="HK">Hong Kong</option>
            
              <option value="HU">Hungary</option>
            
              <option value="IS">Iceland</option>
            
              <option value="IN">India</option>
            
              <option value="ID">Indonesia</option>
            
              <option value="IR">Iran, Islamic Republic Of</option>
            
              <option value="IQ">Iraq</option>
            
              <option value="IE">Ireland</option>
            
              <option value="IM">Isle of Man</option>
            
              <option value="IL">Israel</option>
            
              <option value="IT">Italy</option>
            
              <option value="JM">Jamaica</option>
            
              <option value="JP">Japan</option>
            
              <option value="JE">Jersey</option>
            
              <option value="JO">Jordan</option>
            
              <option value="KZ">Kazakhstan</option>
            
              <option value="KE">Kenya</option>
            
              <option value="KI">Kiribati</option>
            
              <option value="KP">Korea, Democratic People's Republic Of</option>
            
              <option value="KR">Korea, Republic of</option>
            
              <option value="KW">Kuwait</option>
            
              <option value="KG">Kyrgyzstan</option>
            
              <option value="LA">Lao People's Democratic Republic</option>
            
              <option value="LV">Latvia</option>
            
              <option value="LB">Lebanon</option>
            
              <option value="LS">Lesotho</option>
            
              <option value="LR">Liberia</option>
            
              <option value="LY">Libya</option>
            
              <option value="LI">Liechtenstein</option>
            
              <option value="LT">Lithuania</option>
            
              <option value="LU">Luxembourg</option>
            
              <option value="MO">Macao</option>
            
              <option value="MK">Macedonia, the Former Yugoslav Republic Of</option>
            
              <option value="MG">Madagascar</option>
            
              <option value="MW">Malawi</option>
            
              <option value="MY">Malaysia</option>
            
              <option value="MV">Maldives</option>
            
              <option value="ML">Mali</option>
            
              <option value="MT">Malta</option>
            
              <option value="MH">Marshall Islands</option>
            
              <option value="MQ">Martinique</option>
            
              <option value="MR">Mauritania</option>
            
              <option value="MU">Mauritius</option>
            
              <option value="YT">Mayotte</option>
            
              <option value="MX">Mexico</option>
            
              <option value="FM">Micronesia, Federated States Of</option>
            
              <option value="MD">Moldova, Republic of</option>
            
              <option value="MC">Monaco</option>
            
              <option value="MN">Mongolia</option>
            
              <option value="ME">Montenegro</option>
            
              <option value="MS">Montserrat</option>
            
              <option value="MA">Morocco</option>
            
              <option value="MZ">Mozambique</option>
            
              <option value="MM">Myanmar</option>
            
              <option value="NA">Namibia</option>
            
              <option value="NR">Nauru</option>
            
              <option value="NP">Nepal</option>
            
              <option value="NL">Netherlands</option>
            
              <option value="AN">Netherlands Antilles</option>
            
              <option value="NC">New Caledonia</option>
            
              <option value="NZ">New Zealand</option>
            
              <option value="NI">Nicaragua</option>
            
              <option value="NE">Niger</option>
            
              <option value="NG">Nigeria</option>
            
              <option value="NU">Niue</option>
            
              <option value="NF">Norfolk Island</option>
            
              <option value="MP">Northern Mariana Islands</option>
            
              <option value="NO">Norway</option>
            
              <option value="OM">Oman</option>
            
              <option value="PK">Pakistan</option>
            
              <option value="PW">Palau</option>
            
              <option value="PS">Palestine, State of</option>
            
              <option value="PA">Panama</option>
            
              <option value="PG">Papua New Guinea</option>
            
              <option value="PY">Paraguay</option>
            
              <option value="PE">Peru</option>
            
              <option value="PH">Philippines</option>
            
              <option value="PN">Pitcairn</option>
            
              <option value="PL">Poland</option>
            
              <option value="PT">Portugal</option>
            
              <option value="PR">Puerto Rico</option>
            
              <option value="QA">Qatar</option>
            
              <option value="RO">Romania</option>
            
              <option value="RU">Russian Federation</option>
            
              <option value="RW">Rwanda</option>
            
              <option value="RE">Réunion</option>
            
              <option value="BL">Saint Barthélemy</option>
            
              <option value="SH">Saint Helena</option>
            
              <option value="KN">Saint Kitts And Nevis</option>
            
              <option value="LC">Saint Lucia</option>
            
              <option value="MF">Saint Martin</option>
            
              <option value="PM">Saint Pierre And Miquelon</option>
            
              <option value="VC">Saint Vincent And The Grenedines</option>
            
              <option value="WS">Samoa</option>
            
              <option value="SM">San Marino</option>
            
              <option value="ST">Sao Tome and Principe</option>
            
              <option value="SA">Saudi Arabia</option>
            
              <option value="SN">Senegal</option>
            
              <option value="RS">Serbia</option>
            
              <option value="SC">Seychelles</option>
            
              <option value="SL">Sierra Leone</option>
            
              <option value="SG">Singapore</option>
            
              <option value="SX">Sint Maarten</option>
            
              <option value="SK">Slovakia</option>
            
              <option value="SI">Slovenia</option>
            
              <option value="SB">Solomon Islands</option>
            
              <option value="SO">Somalia</option>
            
              <option value="ZA">South Africa</option>
            
              <option value="GS">South Georgia and the South Sandwich Islands</option>
            
              <option value="SS">South Sudan</option>
            
              <option value="ES">Spain</option>
            
              <option value="LK">Sri Lanka</option>
            
              <option value="SD">Sudan</option>
            
              <option value="SR">Suriname</option>
            
              <option value="SJ">Svalbard And Jan Mayen</option>
            
              <option value="SZ">Swaziland</option>
            
              <option value="SE">Sweden</option>
            
              <option value="CH">Switzerland</option>
            
              <option value="SY">Syrian Arab Republic</option>
            
              <option value="TW">Taiwan, Republic Of China</option>
            
              <option value="TJ">Tajikistan</option>
            
              <option value="TZ">Tanzania, United Republic of</option>
            
              <option value="TH">Thailand</option>
            
              <option value="TL">Timor-Leste</option>
            
              <option value="TG">Togo</option>
            
              <option value="TK">Tokelau</option>
            
              <option value="TO">Tonga</option>
            
              <option value="TT">Trinidad and Tobago</option>
            
              <option value="TN">Tunisia</option>
            
              <option value="TR">Turkey</option>
            
              <option value="TM">Turkmenistan</option>
            
              <option value="TC">Turks and Caicos Islands</option>
            
              <option value="TV">Tuvalu</option>
            
              <option value="UG">Uganda</option>
            
              <option value="UA">Ukraine</option>
            
              <option value="AE">United Arab Emirates</option>
            
              <option value="GB">United Kingdom</option>
            
              <option value="US" selected="selected">United States</option>
            
              <option value="UM">United States Minor Outlying Islands</option>
            
              <option value="UY">Uruguay</option>
            
              <option value="UZ">Uzbekistan</option>
            
              <option value="VU">Vanuatu</option>
            
              <option value="VE">Venezuela, Bolivarian Republic of</option>
            
              <option value="VN">Vietnam</option>
            
              <option value="VG">Virgin Islands, British</option>
            
              <option value="VI">Virgin Islands, U.S.</option>
            
              <option value="WF">Wallis and Futuna</option>
            
              <option value="EH">Western Sahara</option>
            
              <option value="YE">Yemen</option>
            
              <option value="ZM">Zambia</option>
            
              <option value="ZW">Zimbabwe</option>
            
              <option value="AX">Åland Islands</option>
            
          </select>
        </span>
      </span>
    </span>

     <div id="save">
              <input type="submit" class="save-billinginfo_and_credit_info" value="Save"/>

            </div>

             <div style="float:left; width:100%; margin-top:30px;">
 <div id="profile_results"></div>
</div>

  </fieldset>
</section>

      
          


        </form>


<?php } ?>






