<?php
require(MORTGAGEAPPS_FDIR . 'html2pdf/html2fpdf.php');

$path = $_SERVER['HTTP_REFERER'];
if(!$mailto || $mailto=="") $mailto = get_mortgage_app_default_mailto("online-application");

$Borrower=$_POST['checkbox-1[]'];
$Co_Borrower=$_POST['checkbox-2[]'];
$Type_of_Loan=$_POST['menu-52'];
$Loan_Purposes=$_POST['menu-53'];
$Residence_Type=$_POST['menu-54'];
$Property_Type=$_POST['menu-55'];
$Number_Of_Units=$_POST['menu-56'];
$Length_of_loan_desired=$_POST['menu-57'];
$Sales_Price=$_POST['text-1'];
$Estimated_Loan_Amount=$_POST['text-2'];



$Applicant_First_Name=$_POST['text-3'];
$Applicant_Last_Name=$_POST['text-4'];
$Home_Phone=$_POST['text-6'];
$Work_Phone=$_POST['text-7'];
$Social_Sec_No=$_POST['text-777'];
$Dependents_no=$_POST['text-8'];
$Date_Of_Birth=$_POST['text-9'];
$Dependents_ages=$_POST['text-10'];
$Years_of_Schooling=$_POST['menu-58'];
$Email=$_POST['email-915'];

$Co_Applicant_Name=$_POST['text-11'];
$Co_Applicant_Last_Name=$_POST['text-12'];
$Home_Phone_co=$_POST['text-13'];
$Work_Phone_co=$_POST['text-14'];
$Social_Sec_No_co=$_POST['text-15'];
$Dependents_no_co=$_POST['text-16'];
$Date_Of_Birth_co=$_POST['text-17'];
$Dependents_ages_co=$_POST['text-18'];
$Years_of_Schooling_co=$_POST['menu-59'];
$Email_co=$_POST['email-916'];
$Current_Address_co=$_POST['text-19'];
$City_co=$_POST['text-20'];
$State_co=$_POST['menu-60'];
$Zip_co=$_POST['text-21'];
$Length_of_time_at_address_co=$_POST['text-22'];



$Applicant_Employer1=$_POST['text-23'];
$Position1=$_POST['text-24111'];
$Years_on_Job1=$_POST['menu-61'];
$Years_in_same_field1=$_POST['menu-62'];
$Monthly_Income1=$_POST['text-241111'];

$Applicant_Employer2=$_POST['text-25'];
$Position2=$_POST['text-2666'];
$Years_on_Job2=$_POST['menu-63'];
$Years_in_same_field2=$_POST['menu-64'];
$Monthly_Income2=$_POST['text-26'];

$Other_Income_Applicant=$_POST['menu-65'];
$Other_Income_Co_Applicant=$_POST['menu-66'];



$Cash_Deposit=$_POST['text-27'];
$amount_cash_deposit=$_POST['text-28'];
$Financial_Institution1=$_POST['text-29'];
$Amount1=$_POST['text-30'];
$Account_Number1=$_POST['text-31'];
$Financial_Institution2=$_POST['text-32'];
$Amount2=$_POST['text-33'];
$Account_Number2=$_POST['text-34'];

$Stocks_Bonds1=$_POST['text-35'];
$Stocks_Bonds1_Amount=$_POST['text-36'];
$Stocks_Bonds2=$_POST['text-37'];
$Stocks_Bonds2_Amount=$_POST['text-38'];
$Stocks_Bonds3=$_POST['text-39'];
$Stocks_Bonds3_Amount=$_POST['text-40'];

$Life_Insurance=$_POST['text-41'];
$Face_Amount=$_POST['text-42'];

$Automobile_Type1=$_POST['text-43'];
$Automobile_Type1_Est_Value=$_POST['text-44'];
$Automobile_Type2=$_POST['text-45'];
$Automobile_Type2_Est_Value=$_POST['text-46'];
$Automobile_Type3=$_POST['text-47'];
$Automobile_Type3_Est_Value=$_POST['text-48'];

$Other_Assets1=$_POST['text-49'];
$Other_Assets_Amount1=$_POST['text-50'];
$Other_Assets2=$_POST['text-51'];
$Other_Assets_Amount2=$_POST['text-52'];
$Other_Assets3=$_POST['text-53'];
$Other_Assets_Amount3=$_POST['text-54'];



$Mortgage1=$_POST['text-55'];
$Mortgage2=$_POST['text-56'];
$Property_Taxes=$_POST['text-57'];
$Home_Owners_Ins=$_POST['text-58'];
$Mortgage_Insurance=$_POST['text-59'];
$Rent_Monthly_Payment=$_POST['text-60'];
$Aprx_Mtg_Balance1=$_POST['text-61'];
$Aprx_Mtg_Balance2=$_POST['text-62'];
$Max_Line_of_Credit=$_POST['text-63'];
$Aprx_Home_Value=$_POST['text-64'];
$Home_is_to_be=$_POST['menu-6666'];



$Type_of_Liability1=$_POST['menu-67'];
$Account_Number_liability1=$_POST['text-65'];
$Cur_Bal_liability1=$_POST['text-66'];
$Monthly_Pmt_liability1=$_POST['text-67'];

$Type_of_Liability2=$_POST['menu-68'];
$Account_Number_liability2=$_POST['text-68'];
$Cur_Bal_liability2=$_POST['text-69'];
$Monthly_Pmt_liability2=$_POST['text-70'];

$Type_of_Liability3=$_POST['menu-69'];
$Account_Number_liability3=$_POST['text-71'];
$Cur_Bal_liability3=$_POST['text-72'];
$Monthly_Pmt_liability3=$_POST['text-73'];

$Type_of_Liability4=$_POST['menu-70'];
$Account_Number_liability4=$_POST['text-74'];
$Cur_Bal_liability4=$_POST['text-75'];
$Monthly_Pmt_liability4=$_POST['text-76'];

$Type_of_Liability5=$_POST['menu-71'];
$Account_Number_liability5=$_POST['text-77'];
$Cur_Bal_liability5=$_POST['text-78'];
$Monthly_Pmt_liability5=$_POST['text-79'];


$I_do_not_wish_to_furnish_this_information=$_POST['checkbox-318[]'];
$Ethnicity=$_POST['radio-710'];
$Race=$_POST['checkbox-937[]']."/".$_POST['checkbox-938[]']."/".$_POST['checkbox-939[]']."/".$_POST['checkbox-940[]']."/".$_POST['checkbox-941[]'];
$Gender=$_POST['menu-72'];
$Marital_Status=$_POST['menu-73'];
$would_be=$_POST['text-80'];
$around=$_POST['text-81'];
$prefer_contact_by=$_POST['menu-7333'];
$Comments=$_POST['textarea-544'];
$How_did_you_hear_about_us=$_POST['text-82'];
$Applicant_agree=$_POST['radio-711'];
$Co_Applicant_agree=$_POST['radio-712'];


global $wpdb;
$dbdata = array();
$dbdata["app_borrower"] = $_POST['checkbox-1[]'];
$dbdata["app_coborrower"] = $_POST['checkbox-2[]'];
$dbdata["app_type"] = $_POST['menu-52'];
$dbdata["app_purpose"] = $_POST['menu-53'];
$dbdata["app_residence"] = $_POST['menu-54'];
$dbdata["app_propertytype"] = $_POST['menu-55'];
$dbdata["app_units"] = $_POST['menu-56'];
$dbdata["app_duration"] = $_POST['menu-57'];
$dbdata["app_price"] = $_POST['text-1'];
$dbdata["app_loanamount"] = $_POST['text-2'];
$dbdata["app_fname"] = $_POST['text-3'];
$dbdata["app_lname"] = $_POST['text-4'];
$dbdata["app_phone"] = $_POST['text-6'];
$dbdata["app_phone2"] = $_POST['text-7'];
$dbdata["app_ssn"] = $_POST['text-777'];
$dbdata["app_dependents"] = $_POST['text-8'];
$dbdata["app_dob"] = $_POST['text-9'];
$dbdata["app_dependentages"] = $_POST['text-10'];
$dbdata["app_schooling"] = $_POST['menu-58'];
$dbdata["app_email"] = $_POST['email-915'];
$dbdata["app_co_fname"] = $_POST['text-11'];
$dbdata["app_co_lname"] = $_POST['text-12'];
$dbdata["app_co_phone"] = $_POST['text-13'];
$dbdata["app_co_phone2"] = $_POST['text-14'];
$dbdata["app_co_ssn"] = $_POST['text-15'];
$dbdata["app_co_dependents"] = $_POST['text-16'];
$dbdata["app_co_dob"] = $_POST['text-17'];
$dbdata["app_co_dependentages"] = $_POST['text-18'];
$dbdata["app_co_schooling"] = $_POST['menu-59'];
$dbdata["app_co_email"] = $_POST['email-916'];
$dbdata["app_co_address"] = $_POST['text-19'];
$dbdata["app_co_city"] = $_POST['text-20'];
$dbdata["app_co_state"] = $_POST['menu-60'];
$dbdata["app_co_zipcode"] = $_POST['text-21'];
$dbdata["app_co_time"] = $_POST['text-22'];
$dbdata["app_employment_name"] = $_POST['text-23'];
$dbdata["app_employment_position"] = $_POST['text-24111'];
$dbdata["app_employment_years"] = $_POST['menu-61'];
$dbdata["app_employment_years2"] = $_POST['menu-62'];
$dbdata["app_employment_income"] = $_POST['text-241111'];
$dbdata["app_employment_co_name"] = $_POST['text-25'];
$dbdata["app_employment_co_position"] = $_POST['text-2666'];
$dbdata["app_employment_co_years"] = $_POST['menu-63'];
$dbdata["app_employment_co_years2"] = $_POST['menu-64'];
$dbdata["app_employment_co_income"] = $_POST['text-26'];
$dbdata["app_employment_income2"] = $_POST['menu-65'];
$dbdata["app_employment_co_income2"] = $_POST['menu-66'];
$dbdata["app_assets_actype"] = $_POST['text-27'];
$dbdata["app_assets_amount"] = $_POST['text-28'];
$dbdata["app_assets_finst1_name"] = $_POST['text-29'];
$dbdata["app_assets_finst1_amount"] = $_POST['text-30'];
$dbdata["app_assets_finst1_acnum"] = $_POST['text-31'];
$dbdata["app_assets_finst2_name"] = $_POST['text-32'];
$dbdata["app_assets_finst2_amount"] = $_POST['text-33'];
$dbdata["app_assets_finst2_acnum"] = $_POST['text-34'];
$dbdata["app_assets_stock1_name"] = $_POST['text-35'];
$dbdata["app_assets_stock1_amount"] = $_POST['text-36'];
$dbdata["app_assets_stock2_name"] = $_POST['text-37'];
$dbdata["app_assets_stock2_amount"] = $_POST['text-38'];
$dbdata["app_assets_stock3_name"] = $_POST['text-39'];
$dbdata["app_assets_stock3_amount"] = $_POST['text-40'];
$dbdata["app_assets_life_insurance"] = $_POST['text-41'];
$dbdata["app_assets_face_amount"] = $_POST['text-42'];
$dbdata["app_assets_automob1_type"] = $_POST['text-43'];
$dbdata["app_assets_automob1_value"] = $_POST['text-44'];
$dbdata["app_assets_automob2_type"] = $_POST['text-45'];
$dbdata["app_assets_automob2_value"] = $_POST['text-46'];
$dbdata["app_assets_automob3_type"] = $_POST['text-47'];
$dbdata["app_assets_automob3_value"] = $_POST['text-48'];
$dbdata["app_assets21_name"] = $_POST['text-49'];
$dbdata["app_assets21_amount"] = $_POST['text-50'];
$dbdata["app_assets22_name"] = $_POST['text-51'];
$dbdata["app_assets22_amount"] = $_POST['text-52'];
$dbdata["app_assets23_name"] = $_POST['text-53'];
$dbdata["app_assets23_amount"] = $_POST['text-54'];
$dbdata["app_expenses_mortgage"] = $_POST['text-55'];
$dbdata["app_expenses_mortgage2"] = $_POST['text-56'];
$dbdata["app_expenses_taxes"] = $_POST['text-57'];
$dbdata["app_expenses_insurance"] = $_POST['text-58'];
$dbdata["app_expenses_insurance2"] = $_POST['text-59'];
$dbdata["app_expenses_rent"] = $_POST['text-60'];
$dbdata["app_expenses_approx_mortgage"] = $_POST['text-61'];
$dbdata["app_expenses_approx_mortgage2"] = $_POST['text-62'];
$dbdata["app_expenses_max_credits"] = $_POST['text-63'];
$dbdata["app_expenses_home_value"] = $_POST['text-64'];
$dbdata["app_expenses_home_istobe"] = $_POST['menu-6666'];
$dbdata["app_debts1_type"] = $_POST['menu-67'];
$dbdata["app_debts1_acnum"] = $_POST['text-65'];
$dbdata["app_debts1_balance"] = $_POST['text-66'];
$dbdata["app_debts1_payment"] = $_POST['text-67'];
$dbdata["app_debts2_type"] = $_POST['menu-68'];
$dbdata["app_debts2_acnum"] = $_POST['text-68'];
$dbdata["app_debts2_balance"] = $_POST['text-69'];
$dbdata["app_debts2_payment"] = $_POST['text-70'];
$dbdata["app_debts3_type"] = $_POST['menu-69'];
$dbdata["app_debts3_acnum"] = $_POST['text-71'];
$dbdata["app_debts3_balance"] = $_POST['text-72'];
$dbdata["app_debts3_payment"] = $_POST['text-73'];
$dbdata["app_debts4_type"] = $_POST['menu-70'];
$dbdata["app_debts4_acnum"] = $_POST['text-74'];
$dbdata["app_debts4_balance"] = $_POST['text-75'];
$dbdata["app_debts4_payment"] = $_POST['text-76'];
$dbdata["app_debts5_type"] = $_POST['menu-71'];
$dbdata["app_debts5_acnum"] = $_POST['text-77'];
$dbdata["app_debts5_balance"] = $_POST['text-78'];
$dbdata["app_debts5_payment"] = $_POST['text-79'];
$dbdata["app_furnish"] = $_POST['checkbox-318[]'];
$dbdata["app_ethnicity"] = $_POST['radio-710'];
$dbdata["app_race"] = $_POST['checkbox-937[]']."/".$_POST['checkbox-938[]']."/".$_POST['checkbox-939[]']."/".$_POST['checkbox-940[]']."/".$_POST['checkbox-941[]'];
$dbdata["app_gender"] = $_POST['menu-72'];
$dbdata["app_marital"] = $_POST['menu-73'];
$dbdata["app_projected_closing"] = $_POST['text-80'];
$dbdata["app_projected_around"] = $_POST['text-81'];
$dbdata["app_projected_contact"] = $_POST['menu-7333'];
$dbdata["app_comments"] = $_POST['textarea-544'];
$dbdata["app_heardfrom"] = $_POST['text-82'];
$dbdata["app_agree"] = $_POST['radio-711'];
$dbdata["app_co_agree"] = $_POST['radio-712'];
$dbdata["app_added"] = date("Y-m-d H:i:s");
addToDatabase($wpdb->mortgageapp_online_tbl, $dbdata);


// email stuff (change data below)

$pdf=new HTML2FPDF();
$pdf->AddPage();
$mailbody='<table width="400" border="0" cellpadding="7" cellspacing="0"><tr><td colspan=\"2\" style=\"background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;\"><b>What Kind of Loan Are You Looking For?</b></td></tr>';

$mailbody.='<tr><td><b>Borrower:</b></td><td>'.$Borrower.'</td></tr>';
$mailbody.='<tr><td><b>Co-Borrower:</b></td><td>'.$Co_Borrower.'</td></tr>';
$mailbody.='<tr><td><b>Type of Loan:</b></td><td>'.$Type_of_Loan.'</td></tr>';
$mailbody.='<tr><td><b>Loan Purposes:</b></td><td>'.$Loan_Purposes.'</td></tr>';
$mailbody.='<tr><td><b>Residence Type:</b></td><td>'.$Residence_Type.'</td></tr>';
$mailbody.='<tr><td><b>Property Type:</b></td><td>'.$Property_Type.'</td></tr>';
$mailbody.='<tr><td><b>Number Of Units:</b></td><td>'.$Number_Of_Units.'</td></tr>';
$mailbody.='<tr><td><b>Length of loan desired:</b></td><td>'.$Length_of_loan_desired.'</td></tr>';
$mailbody.='<tr><td><b>Sales Price or Home-Value if Refi:</b></td><td>'.$Sales_Price.'</td></tr>';
$mailbody.='<tr><td><b>Estimated Loan Amount($):</b></td><td>'.$Estimated_Loan_Amount.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please Tell Us About Yourself</b></td></tr>';

$mailbody.='<tr><td><b>Applicant First Name:</b></td><td>'.$Applicant_First_Name.'</td></tr>';
$mailbody.='<tr><td><b>Applicant Last Name:</b></td><td>'.$Applicant_Last_Name.'</td></tr>';
$mailbody.='<tr><td><b>Home Phone:</b></td><td>'.$Home_Phone.'</td></tr>';
$mailbody.='<tr><td><b>Work Phone:</b></td><td>'.$Work_Phone.'</td></tr>';
$mailbody.='<tr><td><b>Social Sec. No:</b></td><td>'.$Social_Sec_No.'</td></tr>';
$mailbody.='<tr><td><b>Dependents no.:</b></td><td>'.$Dependents_no.'</td></tr>';
$mailbody.='<tr><td><b>Date Of Birth:</b></td><td>'.$Date_Of_Birth.'</td></tr>';
$mailbody.='<tr><td><b>Dependents ages:</b></td><td>'.$Dependents_ages.'</td></tr>';
$mailbody.='<tr><td><b>Years of Schooling:</b></td><td>'.$Years_of_Schooling.'</td></tr>';
$mailbody.='<tr><td><b>Email:</b></td><td>'.$Email.'</td></tr>';

$mailbody.='<tr><td><b>Co-Applicant Name:</b></td><td>'.$Co_Applicant_Name.'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant Last Name:</b></td><td>'.$Co_Applicant_Last_Name.'</td></tr>';
$mailbody.='<tr><td><b>Home Phone:</b></td><td>'.$Home_Phone_co.'</td></tr>';
$mailbody.='<tr><td><b>Work Phone:</b></td><td>'.$Work_Phone_co.'</td></tr>';
$mailbody.='<tr><td><b>Social Sec. No:</b></td><td>'.$Social_Sec_No_co.'</td></tr>';
$mailbody.='<tr><td><b>Dependents no.:</b></td><td>'.$Dependents_no_co.'</td></tr>';
$mailbody.='<tr><td><b>Date Of Birth:</b></td><td>'.$Date_Of_Birth_co.'</td></tr>';
$mailbody.='<tr><td><b>Dependents ages:</b></td><td>'.$Dependents_ages_co.'</td></tr>';
$mailbody.='<tr><td><b>Years of Schooling:</b></td><td>'.$Years_of_Schooling_co.'</td></tr>';
$mailbody.='<tr><td><b>Email:</b></td><td>'.$Email_co.'</td></tr>';
$mailbody.='<tr><td><b>Current Address:</b></td><td>'.$Current_Address_co.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$City_co.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State_co.'</td></tr>';
$mailbody.='<tr><td><b>Zip:</b></td><td>'.$Zip_co.'</td></tr>';
$mailbody.='<tr><td><b>Length of time at address:</b></td><td>'.$Length_of_time_at_address_co.'</td></tr>';


$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Employment Information</b></td></tr>';

$mailbody.='<tr><td><b>Applicant Employer:</b></td><td>'.$Applicant_Employer1.'</td></tr>';
$mailbody.='<tr><td><b>Position:</b></td><td>'.$Position1.'</td></tr>';
$mailbody.='<tr><td><b>Years on Job:</b></td><td>'.$Years_on_Job1.'</td></tr>';
$mailbody.='<tr><td><b>Years in same field:</b></td><td>'.$Years_in_same_field1.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Income($):</b></td><td>'.$Monthly_Income1.'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant Employer:</b></td><td>'.$Applicant_Employer2.'</td></tr>';
$mailbody.='<tr><td><b>Position:</b></td><td>'.$Position2.'</td></tr>';
$mailbody.='<tr><td><b>Years on Job:</b></td><td>'.$Years_on_Job2.'</td></tr>';
$mailbody.='<tr><td><b>Years in same field:</b></td><td>'.$Years_in_same_field2.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Income ($):</b></td><td>'.$Monthly_Income2.'</td></tr>';
$mailbody.='<tr><td><b>Other Income Applicant:</b></td><td>'.$Other_Income_Applicant.'</td></tr>';
$mailbody.='<tr><td><b>Other Income Co-Applicant:</b></td><td>'.$Other_Income_Co_Applicant.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Your Assets</b></td></tr>';

$mailbody.='<tr><td><b>Cash Deposit (Account Type):</b></td><td>'.$Cash_Deposit.'</td></tr>';
$mailbody.='<tr><td><b>Amount($):</b></td><td>'.$amount_cash_deposit.'</td></tr>';

$mailbody.='<tr><td><b>Financial Institution:</b></td><td>'.$Financial_Institution1.'</td></tr>';
$mailbody.='<tr><td><b>Amount($):</b></td><td>'.$Amount1.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number1.'</td></tr>';

$mailbody.='<tr><td><b>Financial Institution:</b></td><td>'.$Financial_Institution2.'</td></tr>';
$mailbody.='<tr><td><b>Amount($):</b></td><td>'.$Amount2.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number2.'</td></tr>';

$mailbody.='<tr><td><b>Stocks & Bonds(Description):</b></td><td>'.$Stocks_Bonds1.'</td></tr>';
$mailbody.='<tr><td><b>Amount ($):</b></td><td>'.$Stocks_Bonds1_Amount.'</td></tr>';

$mailbody.='<tr><td><b>Stocks & Bonds(Description):</b></td><td>'.$Stocks_Bonds2.'</td></tr>';
$mailbody.='<tr><td><b>Amount ($):</b></td><td>'.$Stocks_Bonds2_Amount.'</td></tr>';

$mailbody.='<tr><td><b>Stocks & Bonds(Description):</b></td><td>'.$Stocks_Bonds3.'</td></tr>';
$mailbody.='<tr><td><b>Amount ($):</b></td><td>'.$Stocks_Bonds3_Amount.'</td></tr>';

$mailbody.='<tr><td><b>Life Insurance:</b></td><td>'.$Life_Insurance.'</td></tr>';
$mailbody.='<tr><td><b>Face Amount($):</b></td><td>'.$Face_Amount.'</td></tr>';

$mailbody.='<tr><td><b>Automobile Type:</b></td><td>'.$Automobile_Type1.'</td></tr>';
$mailbody.='<tr><td><b>Est. Value($):</b></td><td>'.$Automobile_Type1_Est_Value.'</td></tr>';

$mailbody.='<tr><td><b>Automobile Type:</b></td><td>'.$Automobile_Type2.'</td></tr>';
$mailbody.='<tr><td><b>Est. Value($):</b></td><td>'.$Automobile_Type2_Est_Value.'</td></tr>';

$mailbody.='<tr><td><b>Automobile Type:</b></td><td>'.$Automobile_Type3.'</td></tr>';
$mailbody.='<tr><td><b>Est. Value($):</b></td><td>'.$Automobile_Type3_Est_Value.'</td></tr>';

$mailbody.='<tr><td><b>Other Assets(Description):</b></td><td>'.$Other_Assets1.'</td></tr>';
$mailbody.='<tr><td><b>Amount($):</b></td><td>'.$Other_Assets_Amount1.'</td></tr>';

$mailbody.='<tr><td><b>Other Assets(Description):</b></td><td>'.$Other_Assets2.'</td></tr>';
$mailbody.='<tr><td><b>Amount($):</b></td><td>'.$Other_Assets_Amount2.'</td></tr>';

$mailbody.='<tr><td><b>Other Assets(Description):</b></td><td>'.$Other_Assets3.'</td></tr>';
$mailbody.='<tr><td><b>Amount($):</b></td><td>'.$Other_Assets_Amount3.'</td></tr>';


$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please Describe Your Housing Expenses</b></td></tr>';

$mailbody.='<tr><td><b>1st Mortgage:</b></td><td>'.$Mortgage1.'</td></tr>';
$mailbody.='<tr><td><b>2nd Mortgage:</b></td><td>'.$Mortgage2.'</td></tr>';
$mailbody.='<tr><td><b>Property Taxes:</b></td><td>'.$Property_Taxes.'</td></tr>';
$mailbody.='<tr><td><b>Home Owners Ins.:</b></td><td>'.$Home_Owners_Ins.'</td></tr>';
$mailbody.='<tr><td><b>Mortgage Insurance:</b></td><td>'.$Mortgage_Insurance.'</td></tr>';
$mailbody.='<tr><td><b>Rent Monthly Payment:</b></td><td>'.$Rent_Monthly_Payment.'</td></tr>';
$mailbody.='<tr><td><b>Aprx.1stMtg Balance($):</b></td><td>'.$Aprx_Mtg_Balance1.'</td></tr>';
$mailbody.='<tr><td><b>Aprx.2ndMtg Balance($):</b></td><td>'.$Aprx_Mtg_Balance2.'</td></tr>';
$mailbody.='<tr><td><b>Max Line of Credit($):</b></td><td>'.$Max_Line_of_Credit.'</td></tr>';
$mailbody.='<tr><td><b>Aprx. Home Value($):</b></td><td>'.$Aprx_Home_Value.'</td></tr>';
$mailbody.='<tr><td><b>Home is to be:</b></td><td>'.$Home_is_to_be.'</td></tr>';



$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please list your Monthly Debts (This Section is Optional)</b></td></tr>';

$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability1.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability2.'</td></tr>';
$mailbody.='<tr><td><b>Cur. Bal.($):</b></td><td>'.$Cur_Bal_liability1.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Pmt.($):</b></td><td>'.$Monthly_Pmt_liability1.'</td></tr>';

$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability2.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability2.'</td></tr>';
$mailbody.='<tr><td><b>Cur. Bal.($):</b></td><td>'.$Cur_Bal_liability2.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Pmt.($):</b></td><td>'.$Monthly_Pmt_liability2.'</td></tr>';

$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability3.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability3.'</td></tr>';
$mailbody.='<tr><td><b>Cur. Bal.($):</b></td><td>'.$Cur_Bal_liability3.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Pmt.($):</b></td><td>'.$Monthly_Pmt_liability3.'</td></tr>';

$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability4.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability4.'</td></tr>';
$mailbody.='<tr><td><b>Cur. Bal.($):</b></td><td>'.$Cur_Bal_liability4.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Pmt.($):</b></td><td>'.$Monthly_Pmt_liability4.'</td></tr>';

$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability5.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability5.'</td></tr>';
$mailbody.='<tr><td><b>Cur. Bal.($):</b></td><td>'.$Cur_Bal_liability5.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Pmt.($):</b></td><td>'.$Monthly_Pmt_liability5.'</td></tr>';


$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Applicant</b></td></tr>';

$mailbody.='<tr><td><b>I do not wish to furnish this information:</b></td><td>'.$I_do_not_wish_to_furnish_this_information.'</td></tr>';
$mailbody.='<tr><td><b>Ethnicity:</b></td><td>'.$Ethnicity.'</td></tr>';
$mailbody.='<tr><td><b>Race:</b></td><td>'.$Race.'</td></tr>';
$mailbody.='<tr><td><b>Gender:</b></td><td>'.$Gender.'</td></tr>';
$mailbody.='<tr><td><b>Marital Status:</b></td><td>'.$Marital_Status.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Applicant</b></td></tr>';

$mailbody.='<tr><td><b>Projected date of closing would be:</b></td><td>'.$would_be.'</td></tr>';
$mailbody.='<tr><td><b>Projected date of closing around:</b></td><td>'.$around.'</td></tr>';
$mailbody.='<tr><td><b>prefer contact by:</b></td><td>'.$prefer_contact_by.'</td></tr>';
$mailbody.='<tr><td><b>Comments:</b></td><td>'.$Comments.'</td></tr>';
$mailbody.='<tr><td><b>How did you hear about us?:</b></td><td>'.$How_did_you_hear_about_us.'</td></tr>';

$mailbody.='<tr><td><b>Applicant:</b></td><td>'.$Applicant_agree.'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant:</b></td><td>'.$Co_Applicant_agree.'</td></tr></table>';




$body='<tr><td colspan=\"2\" style=\"background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;\"><b>What Kind of Loan Are You Looking For?</b></td></tr>';

$body.='<tr><td><b>Borrower:</b></td><td>'.$Borrower.'</td></tr>';
$body.='<tr><td><b>Co-Borrower:</b></td><td>'.$Co_Borrower.'</td></tr>';
$body.='<tr><td><b>Type of Loan:</b></td><td>'.$Type_of_Loan.'</td></tr>';
$body.='<tr><td><b>Loan Purposes:</b></td><td>'.$Loan_Purposes.'</td></tr>';
$body.='<tr><td><b>Residence Type:</b></td><td>'.$Residence_Type.'</td></tr>';
$body.='<tr><td><b>Property Type:</b></td><td>'.$Property_Type.'</td></tr>';
$body.='<tr><td><b>Number Of Units:</b></td><td>'.$Number_Of_Units.'</td></tr>';
$body.='<tr><td><b>Length of loan desired:</b></td><td>'.$Length_of_loan_desired.'</td></tr>';
$body.='<tr><td><b>Sales Price or Home-Value if Refi:</b></td><td>'.$Sales_Price.'</td></tr>';
$body.='<tr><td><b>Estimated Loan Amount($):</b></td><td>'.$Estimated_Loan_Amount.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please Tell Us About Yourself</b></td></tr>';

$body.='<tr><td><b>Applicant First Name:</b></td><td>'.$Applicant_First_Name.'</td></tr>';
$body.='<tr><td><b>Applicant Last Name:</b></td><td>'.$Applicant_Last_Name.'</td></tr>';
$body.='<tr><td><b>Home Phone:</b></td><td>'.$Home_Phone.'</td></tr>';
$body.='<tr><td><b>Work Phone:</b></td><td>'.$Work_Phone.'</td></tr>';
$body.='<tr><td><b>Social Sec. No:</b></td><td>'.$Social_Sec_No.'</td></tr>';
$body.='<tr><td><b>Dependents no.:</b></td><td>'.$Dependents_no.'</td></tr>';
$body.='<tr><td><b>Date Of Birth:</b></td><td>'.$Date_Of_Birth.'</td></tr>';
$body.='<tr><td><b>Dependents ages:</b></td><td>'.$Dependents_ages.'</td></tr>';
$body.='<tr><td><b>Years of Schooling:</b></td><td>'.$Years_of_Schooling.'</td></tr>';
$body.='<tr><td><b>Email:</b></td><td>'.$Email.'</td></tr>';

$body.='<tr><td><b>Co-Applicant Name:</b></td><td>'.$Co_Applicant_Name.'</td></tr>';
$body.='<tr><td><b>Co-Applicant Last Name:</b></td><td>'.$Co_Applicant_Last_Name.'</td></tr>';
$body.='<tr><td><b>Home Phone:</b></td><td>'.$Home_Phone_co.'</td></tr>';
$body.='<tr><td><b>Work Phone:</b></td><td>'.$Work_Phone_co.'</td></tr>';
$body.='<tr><td><b>Social Sec. No:</b></td><td>'.$Social_Sec_No_co.'</td></tr>';
$body.='<tr><td><b>Dependents no.:</b></td><td>'.$Dependents_no_co.'</td></tr>';
$body.='<tr><td><b>Date Of Birth:</b></td><td>'.$Date_Of_Birth_co.'</td></tr>';
$body.='<tr><td><b>Dependents ages:</b></td><td>'.$Dependents_ages_co.'</td></tr>';
$body.='<tr><td><b>Years of Schooling:</b></td><td>'.$Years_of_Schooling_co.'</td></tr>';
$body.='<tr><td><b>Email:</b></td><td>'.$Email_co.'</td></tr>';
$body.='<tr><td><b>Current Address:</b></td><td>'.$Current_Address_co.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$City_co.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State_co.'</td></tr>';
$body.='<tr><td><b>Zip:</b></td><td>'.$Zip_co.'</td></tr>';
$body.='<tr><td><b>Length of time at address:</b></td><td>'.$Length_of_time_at_address_co.'</td></tr>';


$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Employment Information</b></td></tr>';

$body.='<tr><td><b>Applicant Employer:</b></td><td>'.$Applicant_Employer1.'</td></tr>';
$body.='<tr><td><b>Position:</b></td><td>'.$Position1.'</td></tr>';
$body.='<tr><td><b>Years on Job:</b></td><td>'.$Years_on_Job1.'</td></tr>';
$body.='<tr><td><b>Years in same field:</b></td><td>'.$Years_in_same_field1.'</td></tr>';
$body.='<tr><td><b>Monthly Income($):</b></td><td>'.$Monthly_Income1.'</td></tr>';
$body.='<tr><td><b>Co-Applicant Employer:</b></td><td>'.$Applicant_Employer2.'</td></tr>';
$body.='<tr><td><b>Position:</b></td><td>'.$Position2.'</td></tr>';
$body.='<tr><td><b>Years on Job:</b></td><td>'.$Years_on_Job2.'</td></tr>';
$body.='<tr><td><b>Years in same field:</b></td><td>'.$Years_in_same_field2.'</td></tr>';
$body.='<tr><td><b>Monthly Income ($):</b></td><td>'.$Monthly_Income2.'</td></tr>';
$body.='<tr><td><b>Other Income Applicant:</b></td><td>'.$Other_Income_Applicant.'</td></tr>';
$body.='<tr><td><b>Other Income Co-Applicant:</b></td><td>'.$Other_Income_Co_Applicant.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Your Assets</b></td></tr>';

$body.='<tr><td><b>Cash Deposit (Account Type):</b></td><td>'.$Cash_Deposit.'</td></tr>';
$body.='<tr><td><b>Amount($):</b></td><td>'.$amount_cash_deposit.'</td></tr>';

$body.='<tr><td><b>Financial Institution:</b></td><td>'.$Financial_Institution1.'</td></tr>';
$body.='<tr><td><b>Amount($):</b></td><td>'.$Amount1.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number1.'</td></tr>';

$body.='<tr><td><b>Financial Institution:</b></td><td>'.$Financial_Institution2.'</td></tr>';
$body.='<tr><td><b>Amount($):</b></td><td>'.$Amount2.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number2.'</td></tr>';

$body.='<tr><td><b>Stocks & Bonds(Description):</b></td><td>'.$Stocks_Bonds1.'</td></tr>';
$body.='<tr><td><b>Amount ($):</b></td><td>'.$Stocks_Bonds1_Amount.'</td></tr>';

$body.='<tr><td><b>Stocks & Bonds(Description):</b></td><td>'.$Stocks_Bonds2.'</td></tr>';
$body.='<tr><td><b>Amount ($):</b></td><td>'.$Stocks_Bonds2_Amount.'</td></tr>';

$body.='<tr><td><b>Stocks & Bonds(Description):</b></td><td>'.$Stocks_Bonds3.'</td></tr>';
$body.='<tr><td><b>Amount ($):</b></td><td>'.$Stocks_Bonds3_Amount.'</td></tr>';

$body.='<tr><td><b>Life Insurance:</b></td><td>'.$Life_Insurance.'</td></tr>';
$body.='<tr><td><b>Face Amount($):</b></td><td>'.$Face_Amount.'</td></tr>';

$body.='<tr><td><b>Automobile Type:</b></td><td>'.$Automobile_Type1.'</td></tr>';
$body.='<tr><td><b>Est. Value($):</b></td><td>'.$Automobile_Type1_Est_Value.'</td></tr>';

$body.='<tr><td><b>Automobile Type:</b></td><td>'.$Automobile_Type2.'</td></tr>';
$body.='<tr><td><b>Est. Value($):</b></td><td>'.$Automobile_Type2_Est_Value.'</td></tr>';

$body.='<tr><td><b>Automobile Type:</b></td><td>'.$Automobile_Type3.'</td></tr>';
$body.='<tr><td><b>Est. Value($):</b></td><td>'.$Automobile_Type3_Est_Value.'</td></tr>';

$body.='<tr><td><b>Other Assets(Description):</b></td><td>'.$Other_Assets1.'</td></tr>';
$body.='<tr><td><b>Amount($):</b></td><td>'.$Other_Assets_Amount1.'</td></tr>';

$body.='<tr><td><b>Other Assets(Description):</b></td><td>'.$Other_Assets2.'</td></tr>';
$body.='<tr><td><b>Amount($):</b></td><td>'.$Other_Assets_Amount2.'</td></tr>';

$body.='<tr><td><b>Other Assets(Description):</b></td><td>'.$Other_Assets3.'</td></tr>';
$body.='<tr><td><b>Amount($):</b></td><td>'.$Other_Assets_Amount3.'</td></tr>';


$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please Describe Your Housing Expenses</b></td></tr>';

$body.='<tr><td><b>1st Mortgage:</b></td><td>'.$Mortgage1.'</td></tr>';
$body.='<tr><td><b>2nd Mortgage:</b></td><td>'.$Mortgage2.'</td></tr>';
$body.='<tr><td><b>Property Taxes:</b></td><td>'.$Property_Taxes.'</td></tr>';
$body.='<tr><td><b>Home Owners Ins.:</b></td><td>'.$Home_Owners_Ins.'</td></tr>';
$body.='<tr><td><b>Mortgage Insurance:</b></td><td>'.$Mortgage_Insurance.'</td></tr>';
$body.='<tr><td><b>Rent Monthly Payment:</b></td><td>'.$Rent_Monthly_Payment.'</td></tr>';
$body.='<tr><td><b>Aprx.1stMtg Balance($):</b></td><td>'.$Aprx_Mtg_Balance1.'</td></tr>';
$body.='<tr><td><b>Aprx.2ndMtg Balance($):</b></td><td>'.$Aprx_Mtg_Balance2.'</td></tr>';
$body.='<tr><td><b>Max Line of Credit($):</b></td><td>'.$Max_Line_of_Credit.'</td></tr>';
$body.='<tr><td><b>Aprx. Home Value($):</b></td><td>'.$Aprx_Home_Value.'</td></tr>';
$body.='<tr><td><b>Home is to be:</b></td><td>'.$Home_is_to_be.'</td></tr>';



$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please list your Monthly Debts (This Section is Optional)</b></td></tr>';

$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability1.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability2.'</td></tr>';
$body.='<tr><td><b>Cur. Bal.($):</b></td><td>'.$Cur_Bal_liability1.'</td></tr>';
$body.='<tr><td><b>Monthly Pmt.($):</b></td><td>'.$Monthly_Pmt_liability1.'</td></tr>';

$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability2.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability2.'</td></tr>';
$body.='<tr><td><b>Cur. Bal.($):</b></td><td>'.$Cur_Bal_liability2.'</td></tr>';
$body.='<tr><td><b>Monthly Pmt.($):</b></td><td>'.$Monthly_Pmt_liability2.'</td></tr>';

$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability3.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability3.'</td></tr>';
$body.='<tr><td><b>Cur. Bal.($):</b></td><td>'.$Cur_Bal_liability3.'</td></tr>';
$body.='<tr><td><b>Monthly Pmt.($):</b></td><td>'.$Monthly_Pmt_liability3.'</td></tr>';

$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability4.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability4.'</td></tr>';
$body.='<tr><td><b>Cur. Bal.($):</b></td><td>'.$Cur_Bal_liability4.'</td></tr>';
$body.='<tr><td><b>Monthly Pmt.($):</b></td><td>'.$Monthly_Pmt_liability4.'</td></tr>';

$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability5.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability5.'</td></tr>';
$body.='<tr><td><b>Cur. Bal.($):</b></td><td>'.$Cur_Bal_liability5.'</td></tr>';
$body.='<tr><td><b>Monthly Pmt.($):</b></td><td>'.$Monthly_Pmt_liability5.'</td></tr>';


$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Applicant</b></td></tr>';

$body.='<tr><td><b>I do not wish to furnish this information:</b></td><td>'.$I_do_not_wish_to_furnish_this_information.'</td></tr>';
$body.='<tr><td><b>Ethnicity:</b></td><td>'.$Ethnicity.'</td></tr>';
$body.='<tr><td><b>Race:</b></td><td>'.$Race.'</td></tr>';
$body.='<tr><td><b>Gender:</b></td><td>'.$Gender.'</td></tr>';
$body.='<tr><td><b>Marital Status:</b></td><td>'.$Marital_Status.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Applicant</b></td></tr>';

$body.='<tr><td><b>Projected date of closing would be:</b></td><td>'.$would_be.'</td></tr>';
$body.='<tr><td><b>Projected date of closing around:</b></td><td>'.$around.'</td></tr>';
$body.='<tr><td><b>prefer contact by:</b></td><td>'.$prefer_contact_by.'</td></tr>';
$body.='<tr><td><b>Comments:</b></td><td>'.$Comments.'</td></tr>';
$body.='<tr><td><b>How did you hear about us?:</b></td><td>'.$How_did_you_hear_about_us.'</td></tr>';

$body.='<tr><td><b>Applicant:</b></td><td>'.$Applicant_agree.'</td></tr>';
$body.='<tr><td><b>Co-Applicant:</b></td><td>'.$Co_Applicant_agree.'</td></tr>';


$mail_explodes = explode(";", $mailto);
$to = $mail_explodes[0];
$from = 'Everyloan.com';
$fromemail = 'application@everyloan.com';
$subject = "Online Application request from Everyloan Financial Services";
$message =$mailbody."<p>Please see the attachment.</p>";


// a random hash will be necessary to send mixed content
$separator = md5(time());


// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
$a='<html><body><table border="1" width="650" align="center">
<tr><td align="center" colspan="2"><strong>Online Application</strong></td></tr>'.$body.'</table></body></html>';


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
  echo '<div style="color:#FFFFFF; background:#3579A2; border:2px solid #BAD8E9; width:100%; margin-top:20px; margin-bottom:20px; text-align:center; font-weight:bold; font-style:italic; font-size:16px; padding-top:40px; padding-bottom:40px;">Your Online Application Request Sent Successfully.</div>
<div style="width:100%; text-align:center; color:#000000; border:1px solid #81C4DA; padding-top:10px; padding-bottom:10px;">If Your Browser Does Not Redirect Automatically After 15sec,Then<a href="'.$path.'?mail=success" style="color:#C53323; font-weight:bold;"> Click Here </a><span><img src="http://bm.crowdgrip.com/mlc/loading.gif" align="center" /></span></div>';
 // header('location:'.$path.'&mail=success');
 ?>
 <script type="text/JavaScript">
<!--
setTimeout("location.href ='<?php echo $path.'&mail=success' ?>';",10000);
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