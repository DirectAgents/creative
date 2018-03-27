<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET){


$sql = mysqli_query($connecDB,"SELECT * FROM investor_company WHERE userID ='".$_GET['userid']."'");
$row = mysqli_fetch_array($sql);

//echo $_GET['userid'];
//echo $row['id'];
 ?>





                




                
            


                        <div id="company-tab-data">

     <!--User Logged in Starts-->                                           
    <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $_GET['userid']) { ?>

                   <form class="form-horizontal form-material" id="update-profile">

                     <input type="hidden" name="userid" id="userid" value="<?php echo $_GET['userid']; ?>"/>
                                           
                                            <div class="form-group">
                                              
                                                <div class="col-md-6">
                                                      <label class="col-md-6" style="padding-left:0px;">Company</label>
                                                    <input type="text" id="fm_company" name="fm_company" value="<?php echo $row['Name']; ?>" placeholder="Company" class="form-control form-control-line">
                                                </div>
                                                 <div class="col-md-6">
                                                    <label class="col-md-12" style="padding-left:0px;">Country</label>
                                                    
<select id="fm_country" name="fm_country" class="form-control form-control-line">
<option value="">--Country--</option>
<option value="USA" <?php if($row['Country'] == 'USA'){ echo "selected"; }?>>United States</option>
<option value="CAN" <?php if($row['Country'] == 'CAN'){ echo "selected"; }?>>Canada</option>
<option value="ABW" <?php if($row['Country'] == 'ABW'){ echo "selected"; }?>>Aruba</option>
<option value="AFG" <?php if($row['Country'] == 'AFG'){ echo "selected"; }?>>Afghanistan</option>
<option value="AIA" <?php if($row['Country'] == 'AIA'){ echo "selected"; }?>>Anguilla</option>
<option value="ALB" <?php if($row['Country'] == 'ALB'){ echo "selected"; }?>>Albania</option>
<option value="AND" <?php if($row['Country'] == 'AND'){ echo "selected"; }?>>Andorra</option>
<option value="ARE" <?php if($row['Country'] == 'ARE'){ echo "selected"; }?>>United Arab Emirates</option>
<option value="ARG" <?php if($row['Country'] == 'ARG'){ echo "selected"; }?>>Argentina</option>
<option value="ARM" <?php if($row['Country'] == 'ARM'){ echo "selected"; }?>>Armenia</option>
<option value="ATG" <?php if($row['Country'] == 'ATG'){ echo "selected"; }?>>Antigua and Barbuda</option>
<option value="AUS" <?php if($row['Country'] == 'AUS'){ echo "selected"; }?>>Australia</option>
<option value="AUT" <?php if($row['Country'] == 'AUT'){ echo "selected"; }?>>Austria</option>
<option value="AZE" <?php if($row['Country'] == 'AZE'){ echo "selected"; }?>>Azerbaijan</option>
<option value="AZR" <?php if($row['Country'] == 'AZR'){ echo "selected"; }?>>Azores</option>
<option value="BEL" <?php if($row['Country'] == 'BEL'){ echo "selected"; }?>>Belgium</option>
<option value="BGD" <?php if($row['Country'] == 'BGD'){ echo "selected"; }?>>Bangladesh</option>
<option value="BGR" <?php if($row['Country'] == 'BGR'){ echo "selected"; }?>>Bulgaria</option>
<option value="BHS" <?php if($row['Country'] == 'BHS'){ echo "selected"; }?>>Bahamas</option>
<option value="BIH" <?php if($row['Country'] == 'BIH'){ echo "selected"; }?>>Bosnia and Herzegovinia</option>
<option value="BLR" <?php if($row['Country'] == 'BLR'){ echo "selected"; }?>>Belarus</option>
<option value="BLZ" <?php if($row['Country'] == 'BLZ'){ echo "selected"; }?>>Belize</option>
<option value="BMU" <?php if($row['Country'] == 'BMU'){ echo "selected"; }?>>Bermuda</option>
<option value="BOL" <?php if($row['Country'] == 'BOL'){ echo "selected"; }?>>Bolivia</option>
<option value="BRA" <?php if($row['Country'] == 'BRA'){ echo "selected"; }?>>Brazil</option>
<option value="BRB" <?php if($row['Country'] == 'BRB'){ echo "selected"; }?>>Barbados</option>
<option value="BTN" <?php if($row['Country'] == 'BTN'){ echo "selected"; }?>>Bhutan</option>
<option value="CAP" <?php if($row['Country'] == 'CAP'){ echo "selected"; }?>>Cape Colony</option>
<option value="CHE" <?php if($row['Country'] == 'CHE'){ echo "selected"; }?>>Switzerland</option>
<option value="CHI" <?php if($row['Country'] == 'CHI'){ echo "selected"; }?>>Channel Islands</option>
<option value="CHL" <?php if($row['Country'] == 'CHL'){ echo "selected"; }?>>Chile</option>
<option value="CHN" <?php if($row['Country'] == 'CHN'){ echo "selected"; }?>>China</option>
<option value="CMR" <?php if($row['Country'] == 'CMR'){ echo "selected"; }?>>Cameroon</option>
<option value="COL" <?php if($row['Country'] == 'COL'){ echo "selected"; }?>>Colombia</option>
<option value="CPV" <?php if($row['Country'] == 'CPV'){ echo "selected"; }?>>Cape Verde</option>
<option value="CRI" <?php if($row['Country'] == 'CRI'){ echo "selected"; }?>>Costa Rica</option>
<option value="CSK" <?php if($row['Country'] == 'CSK'){ echo "selected"; }?>>Czechoslovakia</option>
<option value="CUB" <?php if($row['Country'] == 'CUB'){ echo "selected"; }?>>Cuba</option>
<option value="CYM" <?php if($row['Country'] == 'CYM'){ echo "selected"; }?>>Cayman Islands</option>
<option value="CYP" <?php if($row['Country'] == 'CYP'){ echo "selected"; }?>>Cyprus</option>
<option value="CZE" <?php if($row['Country'] == 'CZE'){ echo "selected"; }?>>Czech Republic</option>
<option value="DEU" <?php if($row['Country'] == 'DEU'){ echo "selected"; }?>>Germany</option>
<option value="DMA" <?php if($row['Country'] == 'DMA'){ echo "selected"; }?>>Dominica</option>
<option value="DNK" <?php if($row['Country'] == 'DNK'){ echo "selected"; }?>>Denmark</option>
<option value="DOM" <?php if($row['Country'] == 'DOM'){ echo "selected"; }?>>Dominican Republic</option>
<option value="DZA" <?php if($row['Country'] == 'DZA'){ echo "selected"; }?>>Algeria</option>
<option value="ECU" <?php if($row['Country'] == 'ECU'){ echo "selected"; }?>>Ecuador</option>
<option value="EGY" <?php if($row['Country'] == 'EGY'){ echo "selected"; }?>>Egypt</option>
<option value="ENG" <?php if($row['Country'] == 'ENG'){ echo "selected"; }?>>England</option>
<option value="ESP" <?php if($row['Country'] == 'ESP'){ echo "selected"; }?>>Spain</option>
<option value="EST" <?php if($row['Country'] == 'EST'){ echo "selected"; }?>>Estonia</option>
<option value="ETH" <?php if($row['Country'] == 'ETH'){ echo "selected"; }?>>Ethopia</option>
<option value="FIN" <?php if($row['Country'] == 'FIN'){ echo "selected"; }?>>Finland</option>
<option value="FJI" <?php if($row['Country'] == 'FJI'){ echo "selected"; }?>>Fiji</option>
<option value="FLK" <?php if($row['Country'] == 'FLK'){ echo "selected"; }?>>Falkland Islands</option>
<option value="FRA" <?php if($row['Country'] == 'FRA'){ echo "selected"; }?>>France</option>
<option value="GIB" <?php if($row['Country'] == 'GIB'){ echo "selected"; }?>>Gibraltar </option>
<option value="GRC" <?php if($row['Country'] == 'GRC'){ echo "selected"; }?>>Greece</option>
<option value="GRD" <?php if($row['Country'] == 'GRD'){ echo "selected"; }?>>Grenada</option>
<option value="GRL" <?php if($row['Country'] == 'GRL'){ echo "selected"; }?>>Greenland</option>
<option value="GUF" <?php if($row['Country'] == 'GUF'){ echo "selected"; }?>>French Guiana </option>
<option value="GUM" <?php if($row['Country'] == 'GUM'){ echo "selected"; }?>>Guatemala</option>
<option value="HKG" <?php if($row['Country'] == 'HKG'){ echo "selected"; }?>>Hong Kong</option>
<option value="HND" <?php if($row['Country'] == 'HND'){ echo "selected"; }?>>Honduras</option>
<option value="HOL" <?php if($row['Country'] == 'HOL'){ echo "selected"; }?>>Holland</option>
<option value="HRV" <?php if($row['Country'] == 'HRV'){ echo "selected"; }?>>Croatia</option>
<option value="HTI" <?php if($row['Country'] == 'HTI'){ echo "selected"; }?>>Haiti</option>
<option value="HUN" <?php if($row['Country'] == 'HUN'){ echo "selected"; }?>>Hungary</option>
<option value="IDN" <?php if($row['Country'] == 'IDN'){ echo "selected"; }?>>Indonesia</option>
<option value="IND" <?php if($row['Country'] == 'IND'){ echo "selected"; }?>>India</option>
<option value="IRL" <?php if($row['Country'] == 'IRL'){ echo "selected"; }?>>Ireland</option>
<option value="IRN" <?php if($row['Country'] == 'IRN'){ echo "selected"; }?>>Iran</option>
<option value="IRQ" <?php if($row['Country'] == 'IRQ'){ echo "selected"; }?>>Iraq</option>
<option value="ISL" <?php if($row['Country'] == 'ISL'){ echo "selected"; }?>>Iceland</option>
<option value="ISR" <?php if($row['Country'] == 'ISR'){ echo "selected"; }?>>Israel</option>
<option value="ITA" <?php if($row['Country'] == 'ITA'){ echo "selected"; }?>>Italy</option>
<option value="JAM" <?php if($row['Country'] == 'JAM'){ echo "selected"; }?>>Jamaica</option>
<option value="JOR" <?php if($row['Country'] == 'JOR'){ echo "selected"; }?>>Jordan</option>
<option value="JPN" <?php if($row['Country'] == 'JPN'){ echo "selected"; }?>>Japan</option>
<option value="KAZ" <?php if($row['Country'] == 'KAZ'){ echo "selected"; }?>>Kazakhstan</option>
<option value="KEN" <?php if($row['Country'] == 'KEN'){ echo "selected"; }?>>Kenya</option>
<option value="KGZ" <?php if($row['Country'] == 'KGZ'){ echo "selected"; }?>>Kyrgystan</option>
<option value="KHM" <?php if($row['Country'] == 'KHM'){ echo "selected"; }?>>Cambodia</option>
<option value="KWT" <?php if($row['Country'] == 'KWT'){ echo "selected"; }?>>Kuwait</option>
<option value="LAO" <?php if($row['Country'] == 'LAO'){ echo "selected"; }?>>Laos</option>
<option value="LBN" <?php if($row['Country'] == 'LBN'){ echo "selected"; }?>>Lebanon</option>
<option value="LIE" <?php if($row['Country'] == 'LIE'){ echo "selected"; }?>>Liechtenstein </option>
<option value="LTU" <?php if($row['Country'] == 'LTU'){ echo "selected"; }?>>Lithuania</option>
<option value="LUX" <?php if($row['Country'] == 'LUX'){ echo "selected"; }?>>Luxembourg</option>
<option value="LVA" <?php if($row['Country'] == 'LVA'){ echo "selected"; }?>>Latvia</option>
<option value="MDA" <?php if($row['Country'] == 'MDA'){ echo "selected"; }?>>Moldava</option>
<option value="MEX" <?php if($row['Country'] == 'MEX'){ echo "selected"; }?>>Mexico</option>
<option value="MKD" <?php if($row['Country'] == 'MKD'){ echo "selected"; }?>>Macedonia</option>
<option value="MLI" <?php if($row['Country'] == 'MLI'){ echo "selected"; }?>>Mali</option>
<option value="MLT" <?php if($row['Country'] == 'MLT'){ echo "selected"; }?>>Malta</option>
<option value="MMR" <?php if($row['Country'] == 'MMR'){ echo "selected"; }?>>Burma/Myanmar</option>
<option value="MYS" <?php if($row['Country'] == 'MYS'){ echo "selected"; }?>>Malaysia</option>
<option value="NIC" <?php if($row['Country'] == 'NIC'){ echo "selected"; }?>>Nicaragua</option>
<option value="NIR" <?php if($row['Country'] == 'NIR'){ echo "selected"; }?>>Northern Ireland</option>
<option value="NLD" <?php if($row['Country'] == 'NLD'){ echo "selected"; }?>>Netherlands</option>
<option value="NOR" <?php if($row['Country'] == 'NOR'){ echo "selected"; }?>>Norway</option>
<option value="NPL" <?php if($row['Country'] == 'NPL'){ echo "selected"; }?>>Nepal</option>
<option value="NZL" <?php if($row['Country'] == 'NZL'){ echo "selected"; }?>>New Zealand</option>
<option value="PAK" <?php if($row['Country'] == 'PAK'){ echo "selected"; }?>>Pakistan</option>
<option value="PAN" <?php if($row['Country'] == 'PAN'){ echo "selected"; }?>>Panama</option>
<option value="PER" <?php if($row['Country'] == 'PER'){ echo "selected"; }?>>Peru</option>
<option value="PHL" <?php if($row['Country'] == 'PHL'){ echo "selected"; }?>>Philippines </option>
<option value="POL" <?php if($row['Country'] == 'POL'){ echo "selected"; }?>>Poland</option>
<option value="PRK" <?php if($row['Country'] == 'PRK'){ echo "selected"; }?>>South Korea</option>
<option value="PRT" <?php if($row['Country'] == 'PRT'){ echo "selected"; }?>>Portugal</option>
<option value="PRY" <?php if($row['Country'] == 'PRY'){ echo "selected"; }?>>Paraguay</option>
<option value="ROM" <?php if($row['Country'] == 'ROM'){ echo "selected"; }?>>Romania</option>
<option value="RUS" <?php if($row['Country'] == 'RUS'){ echo "selected"; }?>>Russia</option>
<option value="SAU" <?php if($row['Country'] == 'SAU'){ echo "selected"; }?>>Saudi Arabia</option>
<option value="SCT" <?php if($row['Country'] == 'SCT'){ echo "selected"; }?>>Scotland</option>
<option value="SER" <?php if($row['Country'] == 'SER'){ echo "selected"; }?>>Serbia</option>
<option value="SGP" <?php if($row['Country'] == 'SGP'){ echo "selected"; }?>>Singapore</option>
<option value="SIC" <?php if($row['Country'] == 'SIC'){ echo "selected"; }?>>Sicily</option>
<option value="SLV" <?php if($row['Country'] == 'SLV'){ echo "selected"; }?>>El Salvador</option>
<option value="SVK" <?php if($row['Country'] == 'SVK'){ echo "selected"; }?>>Slovakia</option>
<option value="SVN" <?php if($row['Country'] == 'SVN'){ echo "selected"; }?>>Slovenia</option>
<option value="SWE" <?php if($row['Country'] == 'SWE'){ echo "selected"; }?>>Sweden</option>
<option value="THA" <?php if($row['Country'] == 'THA'){ echo "selected"; }?>>Thailand</option>
<option value="TMP" <?php if($row['Country'] == 'TMP'){ echo "selected"; }?>>East Timor</option>
<option value="TUR" <?php if($row['Country'] == 'TUR'){ echo "selected"; }?>>Turkey</option>
<option value="TWN" <?php if($row['Country'] == 'TWN'){ echo "selected"; }?>>Taiwan</option>
<option value="UK"  <?php if($row['Country'] == 'UK'){ echo "selected"; }?>>United Kingdom</option>
<option value="UKR" <?php if($row['Country'] == 'UKR'){ echo "selected"; }?>>Ukraine</option>
<option value="URY" <?php if($row['Country'] == 'URY'){ echo "selected"; }?>>Uruguay</option>
<option value="VEN" <?php if($row['Country'] == 'VEN'){ echo "selected"; }?>>Venezuela</option>
<option value="WLS" <?php if($row['Country'] == 'WLS'){ echo "selected"; }?>>Wales</option>
<option value="YUG" <?php if($row['Country'] == 'YUG'){ echo "selected"; }?>>Yugoslavia</option>
<option value="ZAF" <?php if($row['Country'] == 'ZAF'){ echo "selected"; }?>>South Africa</option>
</select>
                                                </div>
                                            </div>
                                           

                                           <div class="form-group">
                                                
                                              
                                                 <div class="col-md-6">
                                                    <label class="col-md-6" style="padding-left:0px;">Title</label>
 <select id="fm_title" name="fm_title" class="form-control form-control-line">
 <option value="">--Select Title--</option>
<option value="Associate/Staff" <?php if($row['Title'] == 'Associate/Staff'){ echo "selected"; }?>>Associate/Staff</option>
<option value="Manager/Supervisor" <?php if($row['Title'] == 'Manager/Supervisor'){ echo "selected"; }?>>Manager/Supervisor</option>
<option value="VP/SVP/Dept Head" <?php if($row['Title'] == 'VP/SVP/Dept Head'){ echo "selected"; }?>>VP/SVP/Dept Head</option>
<option value="C-Level Executive (CEO, CFO, etc.)" <?php if($row['Title'] == 'C-Level Executive (CEO, CFO, etc.)'){ echo "selected"; }?>>C-Level Executive (CEO, CFO, etc.)</option>
<option value="Founder/Owner/Principal" <?php if($row['Title'] == 'Founder/Owner/Principal'){ echo "selected"; }?>>Founder/Owner/Principal</option>
<option value="Other" <?php if($row['Title'] == 'Other'){ echo "selected"; }?>>Other</option>
</select>

                                                </div>


                                                 <div class="col-md-6">
                                                    <label class="col-md-6" style="padding-left:0px;">City</label>
  <input type="text" id="fm_city" name="fm_city" value="<?php echo $row['City'];?>" class="form-control form-control-line"> </div>
                                                </div>

                                            </div>  
                                            
                                         <div class="form-group">   


  <div class="col-md-6">
                                                    <label class="col-md-6" style="padding-left:0px;">Investor Type</label>
 <select id="fm_type" name="fm_type" class="form-control form-control-line">
 <option value="">--Select Title--</option>
<option value="Angel" <?php if($row['Type'] == 'Angel'){ echo "selected"; }?>>Angel</option>
<option value="Investment Banker" <?php if($row['Type'] == 'Investment Banker'){ echo "selected"; }?>>Investment Banker</option>
<option value="Private Equity" <?php if($row['Type'] == 'Private Equity'){ echo "selected"; }?>>Private Equity</option>
<option value="Venture Capital" <?php if($row['Type'] == 'Venture Capital'){ echo "selected"; }?>>Venture Capital</option>
<option value="Bank" <?php if($row['Type'] == 'Bank'){ echo "selected"; }?>>Bank</option>
<option value="Capital Broker" <?php if($row['Type'] == 'Capital Broker'){ echo "selected"; }?>>Capital Broker</option>
<option value="Real Estate Investor" <?php if($row['Type'] == 'Real Estate Investor'){ echo "selected"; }?>>Real Estate Investor</option>
</select>

                                                </div>



                                                <div class="col-md-6">
                                                     <div class="col-md-5">
                                                         <label class="col-md-3" style="padding-left:0px;">State</label>
 <select id="fm_state" name="fm_state" class="form-control form-control-line">
<option value="AL" <?php if($row['State'] == 'AL'){ echo "selected"; } ?>>Alabama</option>
    <option value="AK" <?php if($row['State'] == 'AK'){ echo "selected"; } ?>>Alaska</option>
    <option value="AZ" <?php if($row['State'] == 'AZ'){ echo "selected"; } ?>>Arizona</option>
    <option value="AR" <?php if($row['State'] == 'AR'){ echo "selected"; } ?>>Arkansas</option>
    <option value="CA" <?php if($row['State'] == 'CA'){ echo "selected"; } ?>>California</option>
    <option value="CO" <?php if($row['State'] == 'CO'){ echo "selected"; } ?>>Colorado</option>
    <option value="CT" <?php if($row['State'] == 'CT'){ echo "selected"; } ?>>Connecticut</option>
    <option value="DE" <?php if($row['State'] == 'DE'){ echo "selected"; } ?>>Delaware</option>
    <option value="DC" <?php if($row['State'] == 'DC'){ echo "selected"; } ?>>District Of Columbia</option>
    <option value="FL" <?php if($row['State'] == 'FL'){ echo "selected"; } ?>>Florida</option>
    <option value="GA" <?php if($row['State'] == 'GA'){ echo "selected"; } ?>>Georgia</option>
    <option value="HI" <?php if($row['State'] == 'HI'){ echo "selected"; } ?>>Hawaii</option>
    <option value="ID" <?php if($row['State'] == 'ID'){ echo "selected"; } ?>>Idaho</option>
    <option value="IL" <?php if($row['State'] == 'IL'){ echo "selected"; } ?>>Illinois</option>
    <option value="IN" <?php if($row['State'] == 'IN'){ echo "selected"; } ?>>Indiana</option>
    <option value="IA" <?php if($row['State'] == 'IA'){ echo "selected"; } ?>>Iowa</option>
    <option value="KS" <?php if($row['State'] == 'KS'){ echo "selected"; } ?>>Kansas</option>
    <option value="KY" <?php if($row['State'] == 'KY'){ echo "selected"; } ?>>Kentucky</option>
    <option value="LA" <?php if($row['State'] == 'LA'){ echo "selected"; } ?>>Louisiana</option>
    <option value="ME" <?php if($row['State'] == 'ME'){ echo "selected"; } ?>>Maine</option>
    <option value="MD" <?php if($row['State'] == 'MD'){ echo "selected"; } ?>>Maryland</option>
    <option value="MA" <?php if($row['State'] == 'MA'){ echo "selected"; } ?>>Massachusetts</option>
    <option value="MI" <?php if($row['State'] == 'MI'){ echo "selected"; } ?>>Michigan</option>
    <option value="MN" <?php if($row['State'] == 'MN'){ echo "selected"; } ?>>Minnesota</option>
    <option value="MS" <?php if($row['State'] == 'MS'){ echo "selected"; } ?>>Mississippi</option>
    <option value="MO" <?php if($row['State'] == 'MO'){ echo "selected"; } ?>>Missouri</option>
    <option value="MT" <?php if($row['State'] == 'MT'){ echo "selected"; } ?>>Montana</option>
    <option value="NE" <?php if($row['State'] == 'NE'){ echo "selected"; } ?>>Nebraska</option>
    <option value="NV" <?php if($row['State'] == 'NV'){ echo "selected"; } ?>>Nevada</option>
    <option value="NH" <?php if($row['State'] == 'NH'){ echo "selected"; } ?>>New Hampshire</option>
    <option value="NJ" <?php if($row['State'] == 'NJ'){ echo "selected"; } ?>>New Jersey</option>
    <option value="NM" <?php if($row['State'] == 'NM'){ echo "selected"; } ?>>New Mexico</option>
    <option value="NY" <?php if($row['State'] == 'NY'){ echo "selected"; } ?>>New York</option>
    <option value="NC" <?php if($row['State'] == 'NC'){ echo "selected"; } ?>>North Carolina</option>
    <option value="ND" <?php if($row['State'] == 'ND'){ echo "selected"; } ?>>North Dakota</option>
    <option value="OH" <?php if($row['State'] == 'OH'){ echo "selected"; } ?>>Ohio</option>
    <option value="OK" <?php if($row['State'] == 'OK'){ echo "selected"; } ?>>Oklahoma</option>
    <option value="OR" <?php if($row['State'] == 'OR'){ echo "selected"; } ?>>Oregon</option>
    <option value="PA" <?php if($row['State'] == 'PA'){ echo "selected"; } ?>>Pennsylvania</option>
    <option value="RI" <?php if($row['State'] == 'RI'){ echo "selected"; } ?>>Rhode Island</option>
    <option value="SC" <?php if($row['State'] == 'SC'){ echo "selected"; } ?>>South Carolina</option>
    <option value="SD" <?php if($row['State'] == 'SD'){ echo "selected"; } ?>>South Dakota</option>
    <option value="TN" <?php if($row['State'] == 'TN'){ echo "selected"; } ?>>Tennessee</option>
    <option value="TX" <?php if($row['State'] == 'TX'){ echo "selected"; } ?>>Texas</option>
    <option value="UT" <?php if($row['State'] == 'UT'){ echo "selected"; } ?>>Utah</option>
    <option value="VT" <?php if($row['State'] == 'VT'){ echo "selected"; } ?>>Vermont</option>
    <option value="VA" <?php if($row['State'] == 'VA'){ echo "selected"; } ?>>Virginia</option>
    <option value="WA" <?php if($row['State'] == 'WA'){ echo "selected"; } ?>>Washington</option>
    <option value="WV" <?php if($row['State'] == 'WV'){ echo "selected"; } ?>>West Virginia</option>
    <option value="WI" <?php if($row['State'] == 'WI'){ echo "selected"; } ?>>Wisconsin</option>
    <option value="WY" <?php if($row['State'] == 'WY'){ echo "selected"; } ?>>Wyoming</option>

</select>

                                                </div>

                                                <div class="col-md-5">
                                                    <label class="col-md-12" style="padding-left:0px;">Postal Code</label>
                                            <input type="text" id="fm_zip" name="fm_zip" value="<?php echo $row['ZipCode'];?>" class="form-control form-control-line"> 
                                                  </div>

                                                </div>

                                              </div>   


                                            </div>


 <div class="form-group">   


  <div class="col-md-6">
                                                    <label class="col-md-6" style="padding-left:0px;">Minimum Investment</label>
 <select id="fm_minimum" name="fm_minimum" class="form-control form-control-line">
<option value="1" <?php if($row['Minimum'] == '1'){ echo "selected"; } ?>>Below $10k</option>
<option value="10000" <?php if($row['Minimum'] == '10000'){ echo "selected"; } ?>>$10k</option>
<option value="25000" <?php if($row['Minimum'] == '25000'){ echo "selected"; } ?>>$25k</option>
<option value="50000" <?php if($row['Minimum'] == '50000'){ echo "selected"; } ?>>$50k</option>
<option value="75000" <?php if($row['Minimum'] == '75000'){ echo "selected"; } ?>>$75k</option>
<option value="100000" <?php if($row['Minimum'] == '100000'){ echo "selected"; } ?>>$100k</option>
<option value="500000" <?php if($row['Minimum'] == '500000'){ echo "selected"; } ?>>$500k</option>
<option value="1000000" <?php if($row['Minimum'] == '1000000'){ echo "selected"; } ?>>$1 Mil</option>
<option value="2000000" <?php if($row['Minimum'] == '2000000'){ echo "selected"; } ?>>$2 Mil</option>
<option value="5000000" <?php if($row['Minimum'] == '5000000'){ echo "selected"; } ?>>$5 Mil</option>
<option value="10000000" <?php if($row['Minimum'] == '10000000'){ echo "selected"; } ?>>$10 Mil</option>
<option value="100000000" <?php if($row['Minimum'] == '100000000'){ echo "selected"; } ?>>Above $10 Mil</option>

</select>

                                                </div>



                                                 <div class="col-md-6">
                                                    <label class="col-md-6" style="padding-left:0px;">Maximum Investment</label>
 <select id="fm_maximum" name="fm_maximum" class="form-control form-control-line">
<option value="1" <?php if($row['Maximum'] == '1'){ echo "selected"; } ?>>Below $10k</option>
<option value="10000" <?php if($row['Maximum'] == '10000'){ echo "selected"; } ?>>$10k</option>
<option value="25000" <?php if($row['Maximum'] == '25000'){ echo "selected"; } ?>>$25k</option>
<option value="50000" <?php if($row['Maximum'] == '50000'){ echo "selected"; } ?>>$50k</option>
<option value="75000" <?php if($row['Maximum'] == '75000'){ echo "selected"; } ?>>$75k</option>
<option value="100000" <?php if($row['Maximum'] == '100000'){ echo "selected"; } ?>>$100k</option>
<option value="500000" <?php if($row['Maximum'] == '500000'){ echo "selected"; } ?>>$500k</option>
<option value="1000000" <?php if($row['Maximum'] == '1000000'){ echo "selected"; } ?>>$1 Mil</option>
<option value="2000000" <?php if($row['Maximum'] == '2000000'){ echo "selected"; } ?>>$2 Mil</option>
<option value="5000000" <?php if($row['Maximum'] == '5000000'){ echo "selected"; } ?>>$5 Mil</option>
<option value="10000000" <?php if($row['Maximum'] == '10000000'){ echo "selected"; } ?>>$10 Mil</option>
<option value="100000000" <?php if($row['Maximum'] == '100000000'){ echo "selected"; } ?>>Above $10 Mil</option>
</select>

                                                </div>


</div>
                                          
                                        
                                            <!--
                                            <div class="form-group">
                                                <label class="col-md-12">About Me</label>
                                                <div class="col-md-12">
                                                    <textarea id="fm_about" name="fm_about" rows="5" class="form-control form-control-line">
                                                        <?php echo $row['About'] ;?>
                                                    </textarea>
                                                </div>
                                            </div>-->

                                      

                                    <div class="form-group">
                                              
                                 <div class="col-sm-12">
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-company-investor" tabindex="11" style="margin-right:10px;">Save</button>
                                       
                                    </div>
                                            </div>
                                        </form>


                                          
                                        
<?php } ?>  


<?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $_GET['userid']) { ?>


    No Startup added so far!

<?php } ?>


<!--Visitor Starts-->




</div>



<script>

$(document).ready(function() {


var url_link_investor = 'http://localhost/creative/pos/video/investor/';




$(".save-company-investor").click(function (e) {
  e.preventDefault();
    var proceed = true;
    //alert("22222");

    var userid = $("input[name='userid']").val();
    var fm_company = $("input[name='fm_company']").val();
    var fm_country = $("select[name='fm_country']").val();
    var fm_title = $("select[name='fm_title']").val();
    var fm_type = $("select[name='fm_type']").val();
    var fm_city = $("input[name='fm_city']").val();
    var fm_zip = $("input[name='fm_zip']").val();
    var fm_state = $("select[name='fm_state']").val();
    var fm_minimum = $("select[name='fm_minimum']").val();
    var fm_maximum = $("select[name='fm_maximum']").val();
    var logo = $('input[name="company_logo[]"]:checked').map(function() { return this.value; }).get().join(",");
   
    

  /*
  if (screenshot == '' || screenshot == 'on') {
        //$("#upload-logo").css('border-bottom','1px solid red'); 
        swal({   
            title: "Please upload a screenshot of your video clip",   
            type: "warning"
        })
        proceed = false;
    }

    if (fm_video == '') {
        $('input[name=fm_video]').css('border-bottom','1px solid red'); 
        swal({   
            title: "Enter a link to your video",   
            type: "warning"
        })
        proceed = false;
    }else{
      $('input[name=fm_video]').css('border-bottom','1px solid green'); 
    }

    if (fm_description == '') {
        $('input[name=fm_description]').css('border-bottom','1px solid red'); 
        swal({   
            title: "Describe your startup in one sentence",   
            type: "warning"
        })
        proceed = false;
    }else{
      $('input[name=fm_description]').css('border-bottom','1px solid green'); 
    }


    if (fm_zip == '') {
        $('input[name=fm_zip]').css('border-bottom','1px solid red'); 
        swal({   
            title: "Enter the location of the startup",   
            type: "warning"
        })
        proceed = false;
    }else{
      $('input[name=fm_zip]').css('border-bottom','1px solid green'); 
    }


    if (fm_position == '') {
        $('input[name=fm_position]').css('border-bottom','1px solid red'); 
        swal({   
            title: "Enter your role",   
            type: "warning"
        })
        proceed = false;
    }else{
      $('input[name=fm_position]').css('border-bottom','1px solid green'); 
    }



    if (fm_name == '') {
        $('input[name=fm_name]').css('border-bottom','1px solid red'); 
        swal({   
            title: "Enter your startup name",   
            type: "warning"
        })
        proceed = false;
    }else{
      $('input[name=fm_name]').css('border-bottom','1px solid green'); 
    }

    if (logo == '' || logo == 'on') {
        //$("#upload-logo").css('border-bottom','1px solid red'); 
        swal({   
            title: "Please upload a logo",   
            type: "warning"
        })
        proceed = false;
    }
   */


    

     if(proceed) 
        {   


    $.ajax({
            url: url_link_investor+"save-company.php", 
            method: "POST",
            data: { userid: userid, company : fm_company, country : fm_country, title : fm_title, type : fm_type, city : fm_city, zip : fm_zip, state : fm_state, minimum : fm_minimum, maximum : fm_maximum, logo : logo},
            dataType: "html",
            success: function(response) {
                //alert(id);  
                
                //var url_startup_link = $(response).filter('#startup-link').html();

                //window.location.href = url_link_startup+url_startup_link;

               
                //alert(skills_count);  

            }
        });


      }
 
});




$('.cancel-company-investor').click(function() {
    //alert("asdfasf");
    $( ".show-data" ).removeClass( "hidden" );
    $( ".show-edit" ).addClass( "hidden" );
    $( ".save-company-investor" ).addClass( "hidden" );
    $( ".cancel-company-investor" ).addClass( "hidden" );
});    


















});

</script>
                                  

<!-- Sweet-Alert  -->
<script src="<?php echo BASE_PATH; ?>/js/sweetalert.min.js"></script>


 <?php } ?>                                  