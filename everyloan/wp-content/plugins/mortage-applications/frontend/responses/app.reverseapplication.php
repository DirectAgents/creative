<?php
require(MORTGAGEAPPS_FDIR . 'html2pdf/html2fpdf.php');

$path = $_SERVER['HTTP_REFERER'];
if(!$mailto || $mailto=="") $mailto = get_mortgage_app_default_mailto("reverse-application");


global $wpdb;
$dbdata = array();
$dbdata["app_fname"] = $_POST['cf6_field_4'];
$dbdata["app_lname"] = $_POST['cf6_field_5'];
$dbdata["app_ssn"] = $_POST['cf6_field_6'];
$dbdata["app_dob"] = $_POST['cf6_field_7'];
$dbdata["app_marital"] = $_POST['cf6_field_8'];
$dbdata["app_years"] = $_POST['cf6_field_9'];
$dbdata["app_email"] = $_POST['cf6_field_10'];
$dbdata["app_income"] = $_POST['cf6_field_11'];
$dbdata["app_assets"] = $_POST['cf6_field_12'];
$dbdata["app_assets2"] = $_POST['cf6_field_13'];
$dbdata["app_alternate_contact"] = $_POST['cf6_field_14'];
$dbdata["app_address"] = $_POST['cf6_field_15'];
$dbdata["app_city"] = $_POST['cf6_field_17'];
$dbdata["app_state"] = $_POST['cf6_field_16'];
$dbdata["app_zipcode"] = $_POST['cf6_field_18'];
$dbdata["app_phone"] = $_POST['cf6_field_19'];
$dbdata["app_co_fname"] = $_POST['cf6_field_21'];
$dbdata["app_co_lname"] = $_POST['cf6_field_22'];
$dbdata["app_co_ssn"] = $_POST['cf6_field_23'];
$dbdata["app_co_dob"] = $_POST['cf6_field_24'];
$dbdata["app_co_marital"] = $_POST['cf6_field_25'];
$dbdata["app_co_years"] = $_POST['cf6_field_28'];
$dbdata["app_co_email"] = $_POST['cf6_field_26'];
$dbdata["app_co_income"] = $_POST['cf6_field_29'];
$dbdata["app_co_assets"] = $_POST['cf6_field_30'];
$dbdata["app_co_assets2"] = $_POST['cf6_field_31'];
$dbdata["app_co_alternate_contact"] = $_POST['cf6_field_32'];
$dbdata["app_co_address"] = $_POST['cf6_field_33'];
$dbdata["app_co_city"] = $_POST['cf6_field_35'];
$dbdata["app_co_state"] = $_POST['cf6_field_34'];
$dbdata["app_co_zipcode"] = $_POST['cf6_field_36'];
$dbdata["app_co_phone"] = $_POST['cf6_field_27'];
$dbdata["app_appliedfor"] = $_POST['cf7_field_3'];
$dbdata["app_special"] = $_POST['cf7_field_4'];
$dbdata["app_amorttype"] = $_POST['cf7_field_5'];
$dbdata["app_payplan"] = $_POST['cf7_field_6'];
$dbdata["app_caseno"] = $_POST['cf7_field_7'];
$dbdata["app_armtype"] = $_POST['cf7_field_8'];
$dbdata["app_property_address"] = $_POST['cf7_field_10'];
$dbdata["app_property_state"] = $_POST['cf7_field_11'];
$dbdata["app_property_city"] = $_POST['cf7_field_12'];
$dbdata["app_property_zipcode"] = $_POST['cf7_field_13'];
$dbdata["app_property_legaldesc"] = $_POST['cf7_field_14'];
$dbdata["app_property_title"] = $_POST['cf7_field_15'];
$dbdata["app_property_units"] = $_POST['cf7_field_16'];
$dbdata["app_property_appraised"] = $_POST['cf7_field_17'];
$dbdata["app_property_year"] = $_POST['cf7_field_18'];
$dbdata["app_property_type"] = $_POST['cf7_field_19'];
$dbdata["app_property_title2"] = $_POST['cf7_field_20'];
$dbdata["app_property_trust"] = $_POST['cf7_field_21'];
$dbdata["app_leins1_name"] = $_POST['cf8_field_4'];
$dbdata["app_leins1_state"] = $_POST['cf8_field_6'];
$dbdata["app_leins1_address"] = $_POST['cf8_field_5'];
$dbdata["app_leins1_balance"] = $_POST['cf8_field_7'];
$dbdata["app_leins1_acnum"] = $_POST['cf8_field_8'];
$dbdata["app_leins1_city"] = $_POST['cf8_field_9'];
$dbdata["app_leins1_zipcode"] = $_POST['cf8_field_10'];
$dbdata["app_leins2_name"] = $_POST['cf8_field_11'];
$dbdata["app_leins2_state"] = $_POST['cf8_field_13'];
$dbdata["app_leins2_address"] = $_POST['cf8_field_12'];
$dbdata["app_leins2_balance"] = $_POST['cf8_field_14'];
$dbdata["app_leins2_acnum"] = $_POST['cf8_field_15'];
$dbdata["app_leins2_city"] = $_POST['cf8_field_16'];
$dbdata["app_leins2_zipcode"] = $_POST['cf8_field_17'];
$dbdata["app_leins3_name"] = $_POST['cf8_field_18'];
$dbdata["app_leins3_state"] = $_POST['cf8_field_20'];
$dbdata["app_leins3_address"] = $_POST['cf8_field_19'];
$dbdata["app_leins3_balance"] = $_POST['cf8_field_21'];
$dbdata["app_leins3_acnum"] = $_POST['cf8_field_22'];
$dbdata["app_leins3_city"] = $_POST['cf8_field_23'];
$dbdata["app_leins3_zipcode"] = $_POST['cf8_field_24'];
$dbdata["app_nonestate_amount"] = $_POST['cf8_field_26'];
$dbdata["app_declarations"] = $_POST['cf9_field_4'];
$dbdata["app_co_declarations"] = $_POST['cf9_field_5'];
$dbdata["app_backruptcy"] = $_POST['cf9_field_7'];
$dbdata["app_co_backruptcy"] = $_POST['cf9_field_8'];
$dbdata["app_lawsuit"] = $_POST['cf9_field_10'];
$dbdata["app_co_lawsuit"] = $_POST['cf9_field_11'];
$dbdata["app_debt"] = $_POST['cf9_field_13'];
$dbdata["app_co_debt"] = $_POST['cf9_field_14'];
$dbdata["app_residence"] = $_POST['cf9_field_16'];
$dbdata["app_co_residence"] = $_POST['cf9_field_17'];
$dbdata["app_endorser"] = $_POST['cf9_field_19'];
$dbdata["app_co_endorser"] = $_POST['cf9_field_20'];
$dbdata["app_citizen"] = $_POST['cf9_field_22'];
$dbdata["app_co_citizen"] = $_POST['cf9_field_23'];
$dbdata["app_alien"] = $_POST['cf9_field_25'];
$dbdata["app_co_alien"] = $_POST['cf9_field_26'];
$dbdata["app_heardfrom"] = $_REQUEST['cf10_field_4'];
$dbdata["app_furnish"] = $_REQUEST['cf10_field_6'];
$dbdata["app_ethnicity"] = $_REQUEST['cf10_field_8'];
$dbdata["app_race"] = $_REQUEST['cf10_field_10'];
$dbdata["app_gender"] = $_REQUEST['cf10_field_11'];
$dbdata["app_co_furnish"] = $_REQUEST['cf10_field_13'];
$dbdata["app_co_ethnicity"] = $_REQUEST['cf10_field_16'];
$dbdata["app_co_race"] = $_REQUEST['cf10_field_18'];
$dbdata["app_co_gender"] = $_REQUEST['cf10_field_19'];
$dbdata["app_agree"] = $_REQUEST['cf10_field_23'];
$dbdata["app_added"] = date("Y-m-d H:i:s");
addToDatabase($wpdb->mortgageapp_reverse_tbl, $dbdata);


// email stuff (change data below)

$pdf=new HTML2FPDF();
$pdf->AddPage();
$mailbody='<table width="400" border="0" cellpadding="7" cellspacing="0"><tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Residential Loan Application for Reverse Mortgages (step 1/5)</b></td></tr>';

/*step form 1*/
$mailbody.='<tr><td><b>Applicant First Name:</b></td><td>'.$_POST['cf6_field_4'].'</td></tr>';
$mailbody.='<tr><td><b>Applicant Last Name:</b></td><td>'.$_POST['cf6_field_5'].'</td></tr>';
$mailbody.='<tr><td><b>Social Sec. Number :</b></td><td>'.$_POST['cf6_field_6'].'</td></tr>';
$mailbody.='<tr><td><b>Birth Date:</b></td><td>'.$_POST['cf6_field_7'].'</td></tr>';
$mailbody.='<tr><td><b>Marital Status:</b></td><td>'.$_POST['cf6_field_8'].'</td></tr>';
$mailbody.='<tr><td><b>Yrs at Present Address:</b></td><td>'.$_POST['cf6_field_9'].'</td></tr>';
$mailbody.='<tr><td><b>Email Address:</b></td><td>'.$_POST['cf6_field_10'].'</td></tr>';
$mailbody.='<tr><td><b>Monthly Income:</b></td><td>'.$_POST['cf6_field_11'].'</td></tr>';
$mailbody.='<tr><td><b>Real Estate Assets:$</b></td><td>'.$_POST['cf6_field_12'].'</td></tr>';
$mailbody.='<tr><td><b>Available Assets:$</b></td><td>'.$_POST['cf6_field_13'].'</td></tr>';
$mailbody.='<tr><td><b>Alternative Contact Person (name, address, phone):</b></td><td>'.$_POST['cf6_field_14'].'</td></tr>';
$mailbody.='<tr><td><b>Address:</b></td><td>'.$_POST['cf6_field_15'].'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$_POST['cf6_field_16'].'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$_POST['cf6_field_17'].'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$_POST['cf6_field_18'].'</td></tr>';
$mailbody.='<tr><td><b>Home Phone:</b></td><td>'.$_POST['cf6_field_19'].'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>Co-Applicant Name:</b></td><td>'.$_POST['cf6_field_21'].'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant Last Name:</b></td><td>'.$_POST['cf6_field_22'].'</td></tr>';
$mailbody.='<tr><td><b>Social Sec. Number:</b></td><td>'.$_POST['cf6_field_23'].'</td></tr>';
$mailbody.='<tr><td><b>Birth Date:</b></td><td>'.$_POST['cf6_field_24'].'</td></tr>';
$mailbody.='<tr><td><b>Marital Status:</b></td><td>'.$_POST['cf6_field_25'].'</td></tr>';
$mailbody.='<tr><td><b>Email Address:</b></td><td>'.$_POST['cf6_field_26'].'</td></tr>';
$mailbody.='<tr><td><b>Home Phone:</b></td><td>'.$_POST['cf6_field_27'].'</td></tr>';
$mailbody.='<tr><td><b>Yrs at Present Address:</b></td><td>'.$_POST['cf6_field_28'].'</td></tr>';
$mailbody.='<tr><td><b>Monthly Income:$</b></td><td>'.$_POST['cf6_field_29'].'</td></tr>';
$mailbody.='<tr><td><b>Real Estate Assets:$</b></td><td>'.$_POST['cf6_field_30'].'</td></tr>';
$mailbody.='<tr><td><b>Available Assets:$</b></td><td>'.$_POST['cf6_field_31'].'</td></tr>';
$mailbody.='<tr><td><b>Alternative Contact Person (name, address, phone):</b></td><td>'.$_POST['cf6_field_32'].'</td></tr>';
$mailbody.='<tr><td><b>Address:</b></td><td>'.$_POST['cf6_field_33'].'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$_POST['cf6_field_34'].'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$_POST['cf6_field_35'].'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$_POST['cf6_field_36'].'</td></tr>';

/*end step 1 form*/
/*step 2 form*/
$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Residential Loan Application for Reverse Mortgages (step 2/5)</b></td></tr>';

$mailbody.='<tr><td colspan="2">I. Type of Mortgage and Terms of Loan</td></tr>';

$mailbody.='<tr><td><b>Mortgage Applied For:</b></td><td>'.$_POST['cf7_field_3'].'</td></tr>';
$mailbody.='<tr><td><b>Special Features:</b></td><td>'.$_POST['cf7_field_4'].'</td></tr>';
$mailbody.='<tr><td><b>Amortization Type:</b></td><td>'.$_POST['cf7_field_5'].'</td></tr>';
$mailbody.='<tr><td><b>Loan Payment Plansemployed:</b></td><td>'.$_POST['cf7_field_6'].'</td></tr>';
$mailbody.='<tr><td><b>Lender Case No.:</b></td><td>'.$_POST['cf7_field_7'].'</td></tr>';
$mailbody.='<tr><td><b>ARM type:</b></td><td>'.$_POST['cf7_field_8'].'</td></tr>';

$mailbody.='<tr><td colspan="2">II. Property Information</td></tr>';

$mailbody.='<tr><td><b>Property Address:</b></td><td>'.$_POST['cf7_field_10'].'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$_POST['cf7_field_11'].'</td></tr>';
$mailbody.='<tr><td><b>Property City:</b></td><td>'.$_POST['cf7_field_12'].'</td></tr>';
$mailbody.='<tr><td><b>zip code: $</b></td><td>'.$_POST['cf7_field_13'].'</td></tr>';
$mailbody.='<tr><td><b>Legal Description of Property:</b></td><td>'.$_POST['cf7_field_14'].'</td></tr>';
$mailbody.='<tr><td><b>Property Title is Held in These Names: $</b></td><td>'.$_POST['cf7_field_15'].'</td></tr>';
$mailbody.='<tr><td><b>Number of Units:</b></td><td>'.$_POST['cf7_field_16'].'</td></tr>';
$mailbody.='<tr><td><b>Estimate of Appraised Value:$</b></td><td>'.$_POST['cf7_field_17'].'</td></tr>';
$mailbody.='<tr><td><b>Year Built:</b></td><td>'.$_POST['cf7_field_18'].'</td></tr>';
$mailbody.='<tr><td><b>Resident Type:</b></td><td>'.$_POST['cf7_field_19'].'</td></tr>';
$mailbody.='<tr><td><b>Property Title Held As:</b></td><td>'.$_POST['cf7_field_20'].'</td></tr>';
$mailbody.='<tr><td><b>Title is also held as Living Trust:</b></td><td>'.$_POST['cf7_field_21'].'</td></tr>';

/*end step 2 form*/

/*start 3 step form*/

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Residential Loan Application for Reverse Mortgages (step 3/5)</b></td></tr>';

$mailbody.='<tr><td colspan="2">III. Liens Against The Property</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>List below all obligations that apply (loans, credit lines, charge accounts, rent, mortgages, payments for alimony, child support, judgments, and liens)</b></td></tr>';

$mailbody.='<tr><td><b>Name of Creditor:</b></td><td>'.$_POST['cf8_field_4'].'</td></tr>';
$mailbody.='<tr><td><b>Address:</b></td><td>'.$_POST['cf8_field_5'].'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$_POST['cf8_field_6'].'</td></tr>';
$mailbody.='<tr><td><b>Unpaid Balance $:</b></td><td>'.$_POST['cf8_field_7'].'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$_POST['cf8_field_8'].'</td></tr>';
$mailbody.='<tr><td><b>City: $</b></td><td>'.$_POST['cf8_field_9'].'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$_POST['cf8_field_10'].'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';


$mailbody.='<tr><td><b>Name of Creditor:</b></td><td>'.$_POST['cf8_field_11'].'</td></tr>';
$mailbody.='<tr><td><b>Address:</b></td><td>'.$_POST['cf8_field_12'].'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$_POST['cf8_field_13'].'</td></tr>';
$mailbody.='<tr><td><b>Unpaid Balance $:</b></td><td>'.$_POST['cf8_field_14'].'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$_POST['cf8_field_15'].'</td></tr>';
$mailbody.='<tr><td><b>City: $</b></td><td>'.$_POST['cf8_field_16'].'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$_POST['cf8_field_17'].'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>Name of Creditor:</b></td><td>'.$_POST['cf8_field_18'].'</td></tr>';
$mailbody.='<tr><td><b>Address:</b></td><td>'.$_POST['cf8_field_19'].'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$_POST['cf8_field_20'].'</td></tr>';
$mailbody.='<tr><td><b>Unpaid Balance $:</b></td><td>'.$_POST['cf8_field_21'].'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$_POST['cf8_field_22'].'</td></tr>';
$mailbody.='<tr><td><b>City: $</b></td><td>'.$_POST['cf8_field_23'].'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$_POST['cf8_field_24'].'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';
$mailbody.='<tr><td colspan="2">IV. Total Non-Real Estate Debts</td></tr>';

$mailbody.='<tr><td><b>Total Amount of Non-Real Estate Debts:$:</b></td><td>'.$_POST['cf8_field_26'].'</td></tr>';

/*end 3 step form*/

/*start step form 4*/

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Residential Loan Application for Reverse Mortgages (step 4/5)</b></td></tr>';

$mailbody.='<tr><td colspan="2">V. Declarations</td></tr>';

$mailbody.='<tr><td colspan="2">a. Are there any outstanding judgments against you?</td></tr>';
$mailbody.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_4'].'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_5'].'</td></tr>';

$mailbody.='<tr><td colspan="2">b. Have you filed for any bankruptcy that has not been resolved?</td></tr>';
$mailbody.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_7'].'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_8'].'</td></tr>';

$mailbody.='<tr><td colspan="2">c. Are you a party to a lawsuit?</td></tr>';
$mailbody.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_10'].'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_11'].'</td></tr>';

$mailbody.='<tr><td colspan="2">d. Are you presently delinquent or in default on any Federal debt or any other loan, mortgage, financial obligation, bond, or loan guarantee? [If \'Yes\', give details, including date, name and address of lender, FHA or VA case number( if applicable), and reason for delinquency/default.]</td></tr>';
$mailbody.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_13'].'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_14'].'</td></tr>';

$mailbody.='<tr><td colspan="2">e. Do you intend to occupy the property as your primary residence?</td></tr>';
$mailbody.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_16'].'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_17'].'</td></tr>';

$mailbody.='<tr><td colspan="2">f. Are you a co-maker or endorser on a note? (Optional for HUD)</td></tr>';
$mailbody.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_19'].'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_20'].'</td></tr>';

$mailbody.='<tr><td colspan="2">g. Are you a U. S. citizen? (Optional for HUD)</td></tr>';
$mailbody.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_22'].'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_23'].'</td></tr>';

$mailbody.='<tr><td colspan="2">h. Are you a permanent resident alien? (Optional for HUD)</td></tr>';
$mailbody.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_25'].'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_26'].'</td></tr>';

$mailbody.='<tr><td colspan="2">VI. Acknowledgements and Agreement</td></tr>';


/*end step form 4*/


/*start form 5*/
$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Residential Loan Application for Reverse Mortgages (step 5/5)</b></td></tr>';

$mailbody.='<tr><td colspan="2">VII. Information for Government Monitoring Purposes</td></tr>';

$mailbody.='<tr><td><b>How did you hear about us?:</b></td><td>'.$_REQUEST['cf10_field_4'].'</td></tr>';

$mailbody.='<tr><td colspan="2">Applicant</td></tr>';

$mailbody.='<tr><td><b>I do not wish to furnish this information:</b></td><td>'.$_REQUEST['cf10_field_6'].'</td></tr>';

$mailbody.='<tr><td><b>Ethnicity:</b></td><td>'.$_REQUEST['cf10_field_8'].'</td></tr>';

$mailbody.='<tr><td><b>Race:</b></td><td>'.$_REQUEST['cf10_field_10'].'</td></tr>';

$mailbody.='<tr><td><b>Gender:</b></td><td>'.$_REQUEST['cf10_field_11'].'</td></tr>';

$mailbody.='<tr><td colspan="2">Co-Applicant</td></tr>';

$mailbody.='<tr><td><b>I do not wish to furnish this information:</b></td><td>'.$_REQUEST['cf10_field_13'].'</td></tr>';

$mailbody.='<tr><td><b>Ethnicity:</b></td><td>'.$_REQUEST['cf10_field_16'].'</td></tr>';

$mailbody.='<tr><td><b>Race:</b></td><td>'.$_REQUEST['cf10_field_18'].'</td></tr>';

$mailbody.='<tr><td><b>Gender:</b></td><td>'.$_REQUEST['cf10_field_19'].'</td></tr>';

$mailbody.='<tr><td><b>I Agree/I Do NOT Agree:</b></td><td>'.$_REQUEST['cf10_field_23'].'</td></tr></table>';


/*end form 5*/





$body='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Residential Loan Application for Reverse Mortgages (step 1/5)</b></td></tr>';

/*step form 1*/
$body.='<tr><td><b>Applicant First Name:</b></td><td>'.$_POST['cf6_field_4'].'</td></tr>';
$body.='<tr><td><b>Applicant Last Name:</b></td><td>'.$_POST['cf6_field_5'].'</td></tr>';
$body.='<tr><td><b>Social Sec. Number :</b></td><td>'.$_POST['cf6_field_6'].'</td></tr>';
$body.='<tr><td><b>Birth Date:</b></td><td>'.$_POST['cf6_field_7'].'</td></tr>';
$body.='<tr><td><b>Marital Status:</b></td><td>'.$_POST['cf6_field_8'].'</td></tr>';
$body.='<tr><td><b>Yrs at Present Address:</b></td><td>'.$_POST['cf6_field_9'].'</td></tr>';
$body.='<tr><td><b>Email Address:</b></td><td>'.$_POST['cf6_field_10'].'</td></tr>';
$body.='<tr><td><b>Monthly Income:</b></td><td>'.$_POST['cf6_field_11'].'</td></tr>';
$body.='<tr><td><b>Real Estate Assets:$</b></td><td>'.$_POST['cf6_field_12'].'</td></tr>';
$body.='<tr><td><b>Available Assets:$</b></td><td>'.$_POST['cf6_field_13'].'</td></tr>';
$body.='<tr><td><b>Alternative Contact Person (name, address, phone):</b></td><td>'.$_POST['cf6_field_14'].'</td></tr>';
$body.='<tr><td><b>Address:</b></td><td>'.$_POST['cf6_field_15'].'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$_POST['cf6_field_16'].'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$_POST['cf6_field_17'].'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$_POST['cf6_field_18'].'</td></tr>';
$body.='<tr><td><b>Home Phone:</b></td><td>'.$_POST['cf6_field_19'].'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>Co-Applicant Name:</b></td><td>'.$_POST['cf6_field_21'].'</td></tr>';
$body.='<tr><td><b>Co-Applicant Last Name:</b></td><td>'.$_POST['cf6_field_22'].'</td></tr>';
$body.='<tr><td><b>Social Sec. Number:</b></td><td>'.$_POST['cf6_field_23'].'</td></tr>';
$body.='<tr><td><b>Birth Date:</b></td><td>'.$_POST['cf6_field_24'].'</td></tr>';
$body.='<tr><td><b>Marital Status:</b></td><td>'.$_POST['cf6_field_25'].'</td></tr>';
$body.='<tr><td><b>Email Address:</b></td><td>'.$_POST['cf6_field_26'].'</td></tr>';
$body.='<tr><td><b>Home Phone:</b></td><td>'.$_POST['cf6_field_27'].'</td></tr>';
$body.='<tr><td><b>Yrs at Present Address:</b></td><td>'.$_POST['cf6_field_28'].'</td></tr>';
$body.='<tr><td><b>Monthly Income:$</b></td><td>'.$_POST['cf6_field_29'].'</td></tr>';
$body.='<tr><td><b>Real Estate Assets:$</b></td><td>'.$_POST['cf6_field_30'].'</td></tr>';
$body.='<tr><td><b>Available Assets:$</b></td><td>'.$_POST['cf6_field_31'].'</td></tr>';
$body.='<tr><td><b>Alternative Contact Person (name, address, phone):</b></td><td>'.$_POST['cf6_field_32'].'</td></tr>';
$body.='<tr><td><b>Address:</b></td><td>'.$_POST['cf6_field_33'].'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$_POST['cf6_field_34'].'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$_POST['cf6_field_35'].'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$_POST['cf6_field_36'].'</td></tr>';

/*end step 1 form*/
/*step 2 form*/
$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Residential Loan Application for Reverse Mortgages (step 2/5)</b></td></tr>';

$body.='<tr><td colspan="2">I. Type of Mortgage and Terms of Loan</td></tr>';

$body.='<tr><td><b>Mortgage Applied For:</b></td><td>'.$_POST['cf7_field_3'].'</td></tr>';
$body.='<tr><td><b>Special Features:</b></td><td>'.$_POST['cf7_field_4'].'</td></tr>';
$body.='<tr><td><b>Amortization Type:</b></td><td>'.$_POST['cf7_field_5'].'</td></tr>';
$body.='<tr><td><b>Loan Payment Plansemployed:</b></td><td>'.$_POST['cf7_field_6'].'</td></tr>';
$body.='<tr><td><b>Lender Case No.:</b></td><td>'.$_POST['cf7_field_7'].'</td></tr>';
$body.='<tr><td><b>ARM type:</b></td><td>'.$_POST['cf7_field_8'].'</td></tr>';

$body.='<tr><td colspan="2">II. Property Information</td></tr>';

$body.='<tr><td><b>Property Address:</b></td><td>'.$_POST['cf7_field_10'].'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$_POST['cf7_field_11'].'</td></tr>';
$body.='<tr><td><b>Property City:</b></td><td>'.$_POST['cf7_field_12'].'</td></tr>';
$body.='<tr><td><b>zip code: $</b></td><td>'.$_POST['cf7_field_13'].'</td></tr>';
$body.='<tr><td><b>Legal Description of Property:</b></td><td>'.$_POST['cf7_field_14'].'</td></tr>';
$body.='<tr><td><b>Property Title is Held in These Names: $</b></td><td>'.$_POST['cf7_field_15'].'</td></tr>';
$body.='<tr><td><b>Number of Units:</b></td><td>'.$_POST['cf7_field_16'].'</td></tr>';
$body.='<tr><td><b>Estimate of Appraised Value:$</b></td><td>'.$_POST['cf7_field_17'].'</td></tr>';
$body.='<tr><td><b>Year Built:</b></td><td>'.$_POST['cf7_field_18'].'</td></tr>';
$body.='<tr><td><b>Resident Type:</b></td><td>'.$_POST['cf7_field_19'].'</td></tr>';
$body.='<tr><td><b>Property Title Held As:</b></td><td>'.$_POST['cf7_field_20'].'</td></tr>';
$body.='<tr><td><b>Title is also held as Living Trust:</b></td><td>'.$_POST['cf7_field_21'].'</td></tr>';

/*end step 2 form*/

/*start 3 step form*/

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Residential Loan Application for Reverse Mortgages (step 3/5)</b></td></tr>';

$body.='<tr><td colspan="2">III. Liens Against The Property</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>List below all obligations that apply (loans, credit lines, charge accounts, rent, mortgages, payments for alimony, child support, judgments, and liens)</b></td></tr>';

$body.='<tr><td><b>Name of Creditor:</b></td><td>'.$_POST['cf8_field_4'].'</td></tr>';
$body.='<tr><td><b>Address:</b></td><td>'.$_POST['cf8_field_5'].'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$_POST['cf8_field_6'].'</td></tr>';
$body.='<tr><td><b>Unpaid Balance $:</b></td><td>'.$_POST['cf8_field_7'].'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$_POST['cf8_field_8'].'</td></tr>';
$body.='<tr><td><b>City: $</b></td><td>'.$_POST['cf8_field_9'].'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$_POST['cf8_field_10'].'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';


$body.='<tr><td><b>Name of Creditor:</b></td><td>'.$_POST['cf8_field_11'].'</td></tr>';
$body.='<tr><td><b>Address:</b></td><td>'.$_POST['cf8_field_12'].'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$_POST['cf8_field_13'].'</td></tr>';
$body.='<tr><td><b>Unpaid Balance $:</b></td><td>'.$_POST['cf8_field_14'].'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$_POST['cf8_field_15'].'</td></tr>';
$body.='<tr><td><b>City: $</b></td><td>'.$_POST['cf8_field_16'].'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$_POST['cf8_field_17'].'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>Name of Creditor:</b></td><td>'.$_POST['cf8_field_18'].'</td></tr>';
$body.='<tr><td><b>Address:</b></td><td>'.$_POST['cf8_field_19'].'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$_POST['cf8_field_20'].'</td></tr>';
$body.='<tr><td><b>Unpaid Balance $:</b></td><td>'.$_POST['cf8_field_21'].'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$_POST['cf8_field_22'].'</td></tr>';
$body.='<tr><td><b>City: $</b></td><td>'.$_POST['cf8_field_23'].'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$_POST['cf8_field_24'].'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';
$body.='<tr><td colspan="2">IV. Total Non-Real Estate Debts</td></tr>';

$body.='<tr><td><b>Total Amount of Non-Real Estate Debts:$:</b></td><td>'.$_POST['cf8_field_26'].'</td></tr>';

/*end 3 step form*/

/*start step form 4*/

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Residential Loan Application for Reverse Mortgages (step 4/5)</b></td></tr>';

$body.='<tr><td colspan="2">V. Declarations</td></tr>';

$body.='<tr><td colspan="2">a. Are there any outstanding judgments against you?</td></tr>';
$body.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_4'].'</td></tr>';
$body.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_5'].'</td></tr>';

$body.='<tr><td colspan="2">b. Have you filed for any bankruptcy that has not been resolved?</td></tr>';
$body.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_7'].'</td></tr>';
$body.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_8'].'</td></tr>';

$body.='<tr><td colspan="2">c. Are you a party to a lawsuit?</td></tr>';
$body.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_10'].'</td></tr>';
$body.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_11'].'</td></tr>';

$body.='<tr><td colspan="2">d. Are you presently delinquent or in default on any Federal debt or any other loan, mortgage, financial obligation, bond, or loan guarantee? [If \'Yes\', give details, including date, name and address of lender, FHA or VA case number( if applicable), and reason for delinquency/default.]</td></tr>';
$body.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_13'].'</td></tr>';
$body.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_14'].'</td></tr>';

$body.='<tr><td colspan="2">e. Do you intend to occupy the property as your primary residence?</td></tr>';
$body.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_16'].'</td></tr>';
$body.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_17'].'</td></tr>';

$body.='<tr><td colspan="2">f. Are you a co-maker or endorser on a note? (Optional for HUD)</td></tr>';
$body.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_19'].'</td></tr>';
$body.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_20'].'</td></tr>';

$body.='<tr><td colspan="2">g. Are you a U. S. citizen? (Optional for HUD)</td></tr>';
$body.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_22'].'</td></tr>';
$body.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_23'].'</td></tr>';

$body.='<tr><td colspan="2">h. Are you a permanent resident alien? (Optional for HUD)</td></tr>';
$body.='<tr><td><b>Applicant:</b></td><td>'.$_POST['cf9_field_25'].'</td></tr>';
$body.='<tr><td><b>Co-Applicant:</b></td><td>'.$_POST['cf9_field_26'].'</td></tr>';

$body.='<tr><td colspan="2">VI. Acknowledgements and Agreement</td></tr>';


/*end step form 4*/


/*start form 5*/
$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Residential Loan Application for Reverse Mortgages (step 5/5)</b></td></tr>';

$body.='<tr><td colspan="2">VII. Information for Government Monitoring Purposes</td></tr>';

$body.='<tr><td><b>How did you hear about us?:</b></td><td>'.$_REQUEST['cf10_field_4'].'</td></tr>';

$body.='<tr><td colspan="2">Applicant</td></tr>';

$body.='<tr><td><b>I do not wish to furnish this information:</b></td><td>'.$_REQUEST['cf10_field_6'].'</td></tr>';

$body.='<tr><td><b>Ethnicity:</b></td><td>'.$_REQUEST['cf10_field_8'].'</td></tr>';

$body.='<tr><td><b>Race:</b></td><td>'.$_REQUEST['cf10_field_10'].'</td></tr>';

$body.='<tr><td><b>Gender:</b></td><td>'.$_REQUEST['cf10_field_11'].'</td></tr>';

$body.='<tr><td colspan="2">Co-Applicant</td></tr>';

$body.='<tr><td><b>I do not wish to furnish this information:</b></td><td>'.$_REQUEST['cf10_field_13'].'</td></tr>';

$body.='<tr><td><b>Ethnicity:</b></td><td>'.$_REQUEST['cf10_field_16'].'</td></tr>';

$body.='<tr><td><b>Race:</b></td><td>'.$_REQUEST['cf10_field_18'].'</td></tr>';

$body.='<tr><td><b>Gender:</b></td><td>'.$_REQUEST['cf10_field_19'].'</td></tr>';

$body.='<tr><td><b>I Agree/I Do NOT Agree:</b></td><td>'.$_REQUEST['cf10_field_23'].'</td></tr>';

/*end form 5*/



$mail_explodes = explode(";", $mailto);
$to = $mail_explodes[0];
$from = 'Everyloan.com';
$fromemail = 'application@everyloan.com';
$subject = "Reverse application request from Everyloan Financial Services";
$message =$mailbody."<p>Please see the attachment.</p>";


// a random hash will be necessary to send mixed content
$separator = md5(time());


// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
$a='<html><body><table border="1" width="650" align="center">
<tr><td align="center" colspan="2"><strong>Reverse Application</strong></td></tr>'.$body.'</table></body></html>';


$pdf->WriteHTML($a);
$filename = "loanmodification.pdf";
$pdfdoc=$pdf->Output("loanmodification.pdf","S");
$attachment = chunk_split(base64_encode($pdfdoc));

// main header (multipart mandatory)
$headers = "From: ".$from."<{$fromemail}>".$eol;
$headers .= "To: ".$to.$eol;
if(sizeof($mail_explodes)>1) {
    unset($mail_explodes[0]);
    $headers .= "Bcc: " . implode(", ", $mail_explodes) . $eol;
}
$headers .= "MIME-Version: 1.0".$eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol;
$headers .= "Content-Transfer-Encoding: 7bit".$eol;
$headers .= "This is a MIME encoded message.".$eol.$eol;

// message
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$headers .= $message.$eol.$eol;

// attachment
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
$headers .= "Content-Transfer-Encoding: base64".$eol;
$headers .= "Content-Disposition: attachment".$eol.$eol;
$headers .= $attachment.$eol.$eol;
$headers .= "--".$separator."--";


 if(mail($to, $subject, "", $headers))
 {
echo '<div style="color:#FFFFFF; background:#3579A2; border:2px solid #BAD8E9; width:100%; margin-top:20px; margin-bottom:20px; text-align:center; font-weight:bold; font-style:italic; font-size:16px; padding-top:40px; padding-bottom:40px;">Your Residential Loan Application for Reverse Mortgages Request Sent Successfully</div>
<div style="width:100%; text-align:center; color:#000000; border:1px solid #81C4DA; padding-top:10px; padding-bottom:10px;">If Your Browser Does Not Redirect Automatically After 15sec,Then<a href="'.$path.'?mail=success" style="color:#C53323; font-weight:bold;"> Click Here </a><span><img src="http://bm.crowdgrip.com/mlc/loading.gif" align="center" /></span></div>';
 // header('location:'.$path.'&mail=success');
 ?>
 <script type="text/JavaScript">
<!--
setTimeout("location.href ='<?php echo $path.'?mail=success' ?>';",10000);
-->
</script>
<?php
 }
 else
 {
 echo '<div style="color:#FFFFFF; background:#3579A2; border:2px solid #BAD8E9; width:100%; margin-top:20px; margin-bottom:20px; text-align:center; font-weight:bold; font-style:italic; font-size:16px; padding-top:40px; padding-bottom:40px;">Mail Sent Failed.</div>
<div style="width:100%; text-align:center; color:#000000; border:1px solid #81C4DA; padding-top:10px; padding-bottom:10px;">If Your Browser Does Not Redirect Automatically After 15sec,Then<a href="'.$path.'?mail=success" style="color:#C53323; font-weight:bold;"> Click Here </a><span><img src="http://bm.crowdgrip.com/mlc/loading.gif" align="center" /></span></div>';
 // header('location:'.$path.'&mail=success');
 ?>
 <script type="text/JavaScript">
<!--
setTimeout("location.href ='<?php echo $path.'?mail=failed' ?>';",10000);
-->
</script>
<?php
 }
?>