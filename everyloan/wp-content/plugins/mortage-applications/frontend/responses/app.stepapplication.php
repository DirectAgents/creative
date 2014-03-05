<?php
require(MORTGAGEAPPS_FDIR . 'html2pdf/html2fpdf.php');

$path = $_SERVER['HTTP_REFERER'];
if(!$mailto || $mailto=="") $mailto = get_mortgage_app_default_mailto("step-application");

/*start 5 step application step 1 form content*/
$Borrower=$_POST['cf_field_3'];
$Co_Borrower=$_POST['cf_field_3003'];
$What_Kind_of_Loan_Are_You_Looking_For=$_POST['cf_field_5'];
$Loan_Purposes=$_POST['cf_field_6'];
$Residence_Type=$_POST['cf_field_7'];
$Property_Type=$_POST['cf_field_8'];
$Payment_Term=$_POST['cf_field_9'];
$Number_of_Units=$_POST['cf_field_10'];
$Est_Loan_Amt=$_POST['cf_field_11'];
$Amortization_Type=$_POST['cf_field_12'];
$Interest_Rate=$_POST['cf_field_13'];
$Sales_Price=$_POST['cf_field_14'];
$Property_Address=$_POST['cf_field_15'];
$City=$_POST['cf_field_16'];
$zip_code=$_POST['cf_field_17'];
$State=$_POST['cf_field_18'];


$First_Name=$_POST['cf_field_21'];
$Last_Name=$_POST['cf_field_22'];
$Street_Address=$_POST['cf_field_23'];
$City1=$_POST['cf_field_24'];
$zip_code1=$_POST['cf_field_25'];
$State1=$_POST['cf_field_26'];
$Work_phone1=$_POST['cf_field_27'];
$Home_phone1=$_POST['cf_field_28'];
$Email1=$_POST['cf_field_29'];
$Social_Sec_No1=$_POST['cf_field_30'];
$Own_Rent1=$_POST['cf_field_31'];
$Years_at_present_address1=$_POST['cf_field_32'];
$Birth_Date1=$_POST['cf_field_33'];
$Years_of_Schooling1=$_POST['cf_field_34'];
$Dependents_no1=$_POST['cf_field_35'];
$Mail_Street_Address1=$_POST['cf_field_36'];
$Mail_City1=$_POST['cf_field_37'];
$State_mail=$_POST['cf_field_38'];
$Mail_Zip_code=$_POST['cf_field_39'];


$First_Name_co=$_POST['cf_field_42'];
$Last_Name_co=$_POST['cf_field_43'];
$Street_Address_co=$_POST['cf_field_44'];
$City_co=$_POST['cf_field_45'];
$zip_code_co=$_POST['cf_field_46'];
$State_co=$_POST['cf_field_47'];
$Work_phone_co=$_POST['cf_field_48'];
$Home_phone_co=$_POST['cf_field_49'];
$Email_co=$_POST['cf_field_50'];
$Social_Sec_No_co=$_POST['cf_field_51'];
$Own_Rent_co=$_POST['cf_field_52'];
$Years_at_present_address_co=$_POST['cf_field_53'];
$Birth_Date_co=$_POST['cf_field_54'];
$Years_of_Schooling_co=$_POST['cf_field_55'];
$Dependents_no_co=$_POST['cf_field_56'];

$I_agree=$_POST['cf_field_58'];
$I_agree_co=$_POST['cf_field_59'];
/*end step 1 part*/

/*step application form 2*/

$Employer_Name_cf2=$_POST['cf2_field_2'];
$Position_cf2=$_POST['cf2_field_3'];
$Street_Address_cf2=$_POST['cf2_field_4'];
$employed_cf2=$_POST['cf2_field_5'];
$Years_Employed_cf2=$_POST['cf2_field_6'];
$City_cf2=$_POST['cf2_field_7'];
$State_cf2=$_POST['cf2_field_8'];
$zip_code_cf2=$_POST['cf2_field_9'];
$Years_in_same_field_cf2=$_POST['cf2_field_10'];
$Monthly_Income_Amount_cf2=$_POST['cf2_field_11'];
$Other_Income_Source_cf2=$_POST['cf2_field_13'];
$Monthly_Amt_Other_Income_cf2=$_POST['cf2_field_14'];

/*end step application form 2*/

/*step 3 form*/
$Jointly=$_POST['cf3_field_3'];
$Cash_Dep_cf3=$_POST['cf3_field_6'];
$Amount_cf3=$_POST['cf3_field_7'];

$Financial_Institution_cf3_1=$_POST['cf3_field_8'];
$Acct_Number_cf3_1=$_POST['cf3_field_9'];
$Account_Type_cf3_1=$_POST['cf3_field_10'];
$Amount_cf3_1=$_POST['cf3_field_11'];

$Financial_Institution_cf3_2=$_POST['cf3_field_12'];
$Acct_Number_cf3_2=$_POST['cf3_field_13'];
$Account_Type_cf3_2=$_POST['cf3_field_14'];
$Amount_cf3_2=$_POST['cf3_field_15'];

$Financial_Institution_cf3_3=$_POST['cf3_field_16'];
$Acct_Number_cf3_3=$_POST['cf3_field_17'];
$Account_Type_cf3_3=$_POST['cf3_field_18'];
$Amount_cf3_3=$_POST['cf3_field_19'];



$Retirement_Account_cf3_4=$_POST['cf3_field_20'];
$Acct_Number_cf3_4=$_POST['cf3_field_21'];
$Amount_cf3_4=$_POST['cf3_field_22'];

$Life_Insurance_cf3_5=$_POST['cf3_field_23'];
$Amount_cf3_5=$_POST['cf3_field_24'];

$Real_Estate_Owned_cf3_6=$_POST['cf3_field_25'];
$Amount_cf3_6=$_POST['cf3_field_26'];

$Net_worth_of_Business_cf3_7=$_POST['cf3_field_27'];
$Amount_cf3_7=$_POST['cf3_field_28'];



$Year_cf3_8=$_POST['cf3_field_30'];
$Make_cf3_8=$_POST['cf3_field_31'];
$Cur_Value_cf3_8=$_POST['cf3_field_32'];

$Year_cf3_9=$_POST['cf3_field_33'];
$Make_cf3_9=$_POST['cf3_field_34'];
$Cur_Value_cf3_9=$_POST['cf3_field_35'];

$Year_cf3_10=$_POST['cf3_field_36'];
$Make_cf3_10=$_POST['cf3_field_37'];
$Cur_Value_cf3_10=$_POST['cf3_field_38'];


$Description_cf3_11=$_POST['cf3_field_40'];
$Amount_cf3_11=$_POST['cf3_field_41'];

$Description_cf3_12=$_POST['cf3_field_42'];
$Amount_cf3_12=$_POST['cf3_field_43'];

$Description_cf3_13=$_POST['cf3_field_44'];
$Amount_cf3_13=$_POST['cf3_field_45'];

$Description_cf3_14=$_POST['cf3_field_46'];
$Amount_cf3_14=$_POST['cf3_field_47'];

/*end step 3 form*/

/*step 4 form*/
$Rent_Monthly_Payment_cf4=$_POST['cf4_field_4'];
$Mortgage_Monthly_Payment_cf4_1=$_POST['cf4_field_5'];
$Mortgage_Monthly_Payment_cf4_2=$_POST['cf4_field_6'];
$Home_Owners_Ins_Mon_Pmt_cf4=$_POST['cf4_field_7'];
$Real_Estate_Taxes_Mon_Pmt_cf4=$_POST['cf4_field_8'];
$Mortgage_Ins_Mon_Pmt_cf4=$_POST['cf4_field_9'];
$Home_Owners_Assoc_Mon_Dues_cf4=$_POST['cf4_field_10'];
$Mtg_Balance_cf4_1=$_POST['cf4_field_11'];
$Mtg_Balance_cf4_2=$_POST['cf4_field_12'];



$Type_of_Liability1_cf4=$_POST['cf4_field_14'];
$Company_Name1_cf4=$_POST['cf4_field_15'];
$Account_Number_liability1_cf4=$_POST['cf4_field_16'];
$Cur_Bal_liability1_cf4=$_POST['cf4_field_17'];
$Monthly_Pmt_liability1_cf4=$_POST['cf4_field_18'];

$Type_of_Liability2_cf4=$_POST['cf4_field_19'];
$Company_Name2_cf4=$_POST['cf4_field_20'];
$Account_Number_liability2_cf4=$_POST['cf4_field_21'];
$Cur_Bal_liability2_cf4=$_POST['cf4_field_22'];
$Monthly_Pmt_liability2_cf4=$_POST['cf4_field_23'];


$Type_of_Liability3_cf4=$_POST['cf4_field_24'];
$Company_Name3_cf4=$_POST['cf4_field_25'];
$Account_Number_liability3_cf4=$_POST['cf4_field_26'];
$Cur_Bal_liability3_cf4=$_POST['cf4_field_27'];
$Monthly_Pmt_liability3_cf4=$_POST['cf4_field_28'];


$Type_of_Liability4_cf4=$_POST['cf4_field_29'];
$Company_Name4_cf4=$_POST['cf4_field_30'];
$Account_Number_liability4_cf4=$_POST['cf4_field_31'];
$Cur_Bal_liability4_cf4=$_POST['cf4_field_32'];
$Monthly_Pmt_liability4_cf4=$_POST['cf4_field_33'];

$Type_of_Liability5_cf4=$_POST['cf4_field_34'];
$Company_Name5_cf4=$_POST['cf4_field_35'];
$Account_Number_liability5_cf4=$_POST['cf4_field_36'];
$Cur_Bal_liability5_cf4=$_POST['cf4_field_37'];
$Monthly_Pmt_liability5_cf4=$_POST['cf4_field_38'];


$Type_of_Liability6_cf4=$_POST['cf4_field_39'];
$Company_Name6_cf4=$_POST['cf4_field_40'];
$Account_Number_liability6_cf4=$_POST['cf4_field_41'];
$Cur_Bal_liability6_cf4=$_POST['cf4_field_42'];
$Monthly_Pmt_liability6_cf4=$_POST['cf4_field_43'];

$Property_Address_cf4_1=$_POST['cf4_field_45'];
$Property_City_cf4_1=$_POST['cf4_field_46'];
$State_cf4_1=$_POST['cf4_field_47'];
$zip_code_cf4_1=$_POST['cf4_field_48'];
$Property_Status_cf4_1=$_POST['cf4_field_49'];
$Property_Type_cf4_1=$_POST['cf4_field_50'];
$Curr_Market_Value_cf4_1=$_POST['cf4_field_51'];
$Amt_of_Mtgs_Liens_cf4_1=$_POST['cf4_field_52'];
$Gross_Rental_Income_cf4_1=$_POST['cf4_field_53'];
$Mortgage_Payments_cf4_1=$_POST['cf4_field_54'];
$Ins_Maintenance_cf4_1=$_POST['cf4_field_55'];
$Net_Rental_Income_cf4_1=$_POST['cf4_field_56'];


$Property_Address_cf4_2=$_POST['cf4_field_57'];
$Property_City_cf4_2=$_POST['cf4_field_58'];
$State_cf4_2=$_POST['cf4_field_59'];
$zip_code_cf4_2=$_POST['cf4_field_60'];
$Property_Status_cf4_2=$_POST['cf4_field_61'];
$Property_Type_cf4_2=$_POST['cf4_field_62'];
$Curr_Market_Value_cf4_2=$_POST['cf4_field_63'];
$Amt_of_Mtgs_Liens_cf4_2=$_POST['cf4_field_64'];
$Gross_Rental_Income_cf4_2=$_POST['cf4_field_65'];
$Mortgage_Payments_cf4_2=$_POST['cf4_field_66'];
$Ins_Maintenance_cf4_2=$_POST['cf4_field_67'];
$Net_Rental_Income_cf4_2=$_POST['cf4_field_68'];

$Property_Address_cf4_3=$_POST['cf4_field_69'];
$Property_City_cf4_3=$_POST['cf4_field_70'];
$State_cf4_3=$_POST['cf4_field_71'];
$zip_code_cf4_3=$_POST['cf4_field_72'];
$Property_Status_cf4_3=$_POST['cf4_field_73'];
$Property_Type_cf4_3=$_POST['cf4_field_74'];
$Curr_Market_Value_cf4_3=$_POST['cf4_field_75'];
$Amt_of_Mtgs_Liens_cf4_3=$_POST['cf4_field_76'];
$Gross_Rental_Income_cf4_3=$_POST['cf4_field_77'];
$Mortgage_Payments_cf4_3=$_POST['cf4_field_78'];
$Ins_Maintenance_cf4_3=$_POST['cf4_field_79'];
$Net_Rental_Income_cf4_3=$_POST['cf4_field_80'];

$Alternate_First_Name_cf4_1=$_POST['cf4_field_82'];
$Alt_Middle_Name_cf4_1=$_POST['cf4_field_83'];
$Alt_Last_Name_cf4_1=$_POST['cf4_field_84'];
$Creditor_Name_cf4_1=$_POST['cf4_field_85'];
$Acct_Number_cf4_1=$_POST['cf4_field_86'];

$Alternate_First_Name_cf4_2=$_POST['cf4_field_87'];
$Alt_Middle_Name_cf4_2=$_POST['cf4_field_88'];
$Alt_Last_Name_cf4_2=$_POST['cf4_field_89'];
$Creditor_Name_cf4_2=$_POST['cf4_field_90'];
$Acct_Number_cf4_2=$_POST['cf4_field_91'];

$Alternate_First_Name_cf4_3=$_POST['cf4_field_92'];
$Alt_Middle_Name_cf4_3=$_POST['cf4_field_93'];
$Alt_Last_Name_cf4_3=$_POST['cf4_field_94'];
$Creditor_Name_cf4_3=$_POST['cf4_field_95'];
$Acct_Number_cf4_3=$_POST['cf4_field_96'];
/*end step 4 form*/
/*form 5 step application*/
$Are_there_any_outstanding_judgments_against_you_cf5_3=$_POST['cf5_field_4'];
$Have_you_been_declared_bankrupt_within_the_past_7_years_cf5_3=$_POST['cf5_field_5'];
$Are_you_a_party_to_a_lawsuit_cf5_3=$_POST['cf5_field_6'];
$Have_you_directly_cf5_3=$_POST['cf5_field_7'];
$Are_you_presently_cf5_3=$_POST['cf5_field_8'];
$Are_you_obligated_cf5_3=$_POST['cf5_field_9'];
$Is_any_part_cf5_3=$_POST['cf5_field_10'];
$Are_you_a_co_maker_cf5_3=$_POST['cf5_field_11'];
$Are_you_a_U_S_citizen_cf5_3=$_POST['cf5_field_12'];
$Are_you_a_permanent_cf5_3=$_POST['cf5_field_13'];
$Do_you_intend_cf5_3=$_POST['cf5_field_14'];
$Have_you_had_cf5_3=$_POST['cf5_field_15'];

$What_type_of_property_cf5_1=$_POST['cf5_field_17'];
$How_did_you_hold_cf5_1=$_POST['cf5_field_18'];
$If_you_answered_cf5_1=$_POST['cf5_field_21'];
$Ethnicity_cf5_1=$_POST['cf5_field_27'];
$Race_cf5_1=$_POST['cf5_field_28'];

$Gender_cf5_2=$_POST['cf5_field_29'];
$Marital_Status_cf5_2=$_POST['cf5_field_30'];
$How_did_you_hear_about_us_cf5_2=$_POST['cf5_field_34'];

/*end form 5 step applicaton*/

global $wpdb;
$dbdata = array();
$dbdata["app_borrower"] = $_POST['cf_field_3'];
$dbdata["app_co_borrower"] = $_POST['cf_field_3003'];
$dbdata["app_type"] = $_POST['cf_field_5'];
$dbdata["app_purpose"] = $_POST['cf_field_6'];
$dbdata["app_residencetype"] = $_POST['cf_field_7'];
$dbdata["app_propertytype"] = $_POST['cf_field_8'];
$dbdata["app_term"] = $_POST['cf_field_9'];
$dbdata["app_units"] = $_POST['cf_field_10'];
$dbdata["app_amount"] = $_POST['cf_field_11'];
$dbdata["app_amorttype"] = $_POST['cf_field_12'];
$dbdata["app_interest"] = $_POST['cf_field_13'];
$dbdata["app_sales"] = $_POST['cf_field_14'];
$dbdata["app_property_address"] = $_POST['cf_field_15'];
$dbdata["app_property_city"] = $_POST['cf_field_16'];
$dbdata["app_property_state"] = $_POST['cf_field_17'];
$dbdata["app_property_zipcode"] = $_POST['cf_field_18'];
$dbdata["app_fname"] = $_POST['cf_field_21'];
$dbdata["app_lname"] = $_POST['cf_field_22'];
$dbdata["app_address"] = $_POST['cf_field_23'];
$dbdata["app_city"] = $_POST['cf_field_24'];
$dbdata["app_state"] = $_POST['cf_field_26'];
$dbdata["app_zipcode"] = $_POST['cf_field_25'];
$dbdata["app_phone"] = $_POST['cf_field_27'];
$dbdata["app_phone2"] = $_POST['cf_field_28'];
$dbdata["app_email"] = $_POST['cf_field_29'];
$dbdata["app_ssn"] = $_POST['cf_field_30'];
$dbdata["app_own"] = $_POST['cf_field_31'];
$dbdata["app_years"] = $_POST['cf_field_32'];
$dbdata["app_dob"] = $_POST['cf_field_33'];
$dbdata["app_years2"] = $_POST['cf_field_34'];
$dbdata["app_dependentsno"] = $_POST['cf_field_35'];
$dbdata["app_mail_address"] = $_POST['cf_field_36'];
$dbdata["app_mail_city"] = $_POST['cf_field_37'];
$dbdata["app_mail_state"] = $_POST['cf_field_38'];
$dbdata["app_mail_zipcode"] = $_POST['cf_field_39'];
$dbdata["app_co_fname"] = $_POST['cf_field_42'];
$dbdata["app_co_lname"] = $_POST['cf_field_43'];
$dbdata["app_co_address"] = $_POST['cf_field_44'];
$dbdata["app_co_city"] = $_POST['cf_field_45'];
$dbdata["app_co_state"] = $_POST['cf_field_47'];
$dbdata["app_co_zipcode"] = $_POST['cf_field_46'];
$dbdata["app_co_phone"] = $_POST['cf_field_48'];
$dbdata["app_co_phone2"] = $_POST['cf_field_49'];
$dbdata["app_co_email"] = $_POST['cf_field_50'];
$dbdata["app_co_ssn"] = $_POST['cf_field_51'];
$dbdata["app_co_own"] = $_POST['cf_field_52'];
$dbdata["app_co_years"] = $_POST['cf_field_53'];
$dbdata["app_co_dob"] = $_POST['cf_field_54'];
$dbdata["app_co_years2"] = $_POST['cf_field_55'];
$dbdata["app_co_dependentsno"] = $_POST['cf_field_56'];
$dbdata["app_agree"] = $_POST['cf_field_58'];
$dbdata["app_co_agree"] = $_POST['cf_field_59'];
$dbdata["app_employer_name"] = $_POST['cf2_field_2'];
$dbdata["app_employer_position"] = $_POST['cf2_field_3'];
$dbdata["app_employer_address"] = $_POST['cf2_field_4'];
$dbdata["app_employer_employed"] = $_POST['cf2_field_5'];
$dbdata["app_employer_years"] = $_POST['cf2_field_6'];
$dbdata["app_employer_city"] = $_POST['cf2_field_7'];
$dbdata["app_employer_state"] = $_POST['cf2_field_8'];
$dbdata["app_employer_zipcode"] = $_POST['cf2_field_9'];
$dbdata["app_employer_years2"] = $_POST['cf2_field_10'];
$dbdata["app_employer_income"] = $_POST['cf2_field_11'];
$dbdata["app_employer_income2_source"] = $_POST['cf2_field_13'];
$dbdata["app_employer_income2"] = $_POST['cf2_field_14'];
$dbdata["app_jointly"] = $_POST['cf3_field_3'];
$dbdata["app_assets_cashdept"] = $_POST['cf3_field_6'];
$dbdata["app_assets_cashdept_amount"] = $_POST['cf3_field_7'];
$dbdata["app_assets_financial1_name"] = $_POST['cf3_field_8'];
$dbdata["app_assets_financial1_acnum"] = $_POST['cf3_field_9'];
$dbdata["app_assets_financial1_actype"] = $_POST['cf3_field_10'];
$dbdata["app_assets_financial1_amount"] = $_POST['cf3_field_11'];
$dbdata["app_assets_financial2_name"] = $_POST['cf3_field_12'];
$dbdata["app_assets_financial2_acnum"] = $_POST['cf3_field_13'];
$dbdata["app_assets_financial2_actype"] = $_POST['cf3_field_14'];
$dbdata["app_assets_financial2_amount"] = $_POST['cf3_field_15'];
$dbdata["app_assets_financial3_name"] = $_POST['cf3_field_16'];
$dbdata["app_assets_financial3_acnum"] = $_POST['cf3_field_17'];
$dbdata["app_assets_financial3_actype"] = $_POST['cf3_field_18'];
$dbdata["app_assets_financial3_amount"] = $_POST['cf3_field_19'];
$dbdata["app_assets_retirement_name"] = $_POST['cf3_field_20'];
$dbdata["app_assets_retirement_acnum"] = $_POST['cf3_field_21'];
$dbdata["app_assets_retirement_amount"] = $_POST['cf3_field_22'];
$dbdata["app_assets_insurance_name"] = $_POST['cf3_field_23'];
$dbdata["app_assets_insurance_amount"] = $_POST['cf3_field_24'];
$dbdata["app_assets_estate_name"] = $_POST['cf3_field_25'];
$dbdata["app_assets_estate_amount"] = $_POST['cf3_field_26'];
$dbdata["app_assets_business_name"] = $_POST['cf3_field_27'];
$dbdata["app_assets_business_amount"] = $_POST['cf3_field_28'];
$dbdata["app_automobile1_year"] = $_POST['cf3_field_30'];
$dbdata["app_automobile1_make"] = $_POST['cf3_field_31'];
$dbdata["app_automobile1_amount"] = $_POST['cf3_field_32'];
$dbdata["app_automobile2_year"] = $_POST['cf3_field_33'];
$dbdata["app_automobile2_make"] = $_POST['cf3_field_34'];
$dbdata["app_automobile2_amount"] = $_POST['cf3_field_35'];
$dbdata["app_automobile3_year"] = $_POST['cf3_field_36'];
$dbdata["app_automobile3_make"] = $_POST['cf3_field_37'];
$dbdata["app_automobile3_amount"] = $_POST['cf3_field_38'];
$dbdata["app_assets21_name"] = $_POST['cf3_field_40'];
$dbdata["app_assets21_amount"] = $_POST['cf3_field_41'];
$dbdata["app_assets22_name"] = $_POST['cf3_field_42'];
$dbdata["app_assets22_amount"] = $_POST['cf3_field_43'];
$dbdata["app_assets23_name"] = $_POST['cf3_field_44'];
$dbdata["app_assets23_amount"] = $_POST['cf3_field_45'];
$dbdata["app_assets24_name"] = $_POST['cf3_field_46'];
$dbdata["app_assets24_amount"] = $_POST['cf3_field_47'];
$dbdata["app_liabilities_rent"] = $_POST['cf4_field_4'];
$dbdata["app_liabilities_mortgage1"] = $_POST['cf4_field_5'];
$dbdata["app_liabilities_mortgage2"] = $_POST['cf4_field_6'];
$dbdata["app_liabilities_homeowners"] = $_POST['cf4_field_7'];
$dbdata["app_liabilities_realstate"] = $_POST['cf4_field_8'];
$dbdata["app_liabilities_mortgageins"] = $_POST['cf4_field_9'];
$dbdata["app_liabilities_homeownersdues"] = $_POST['cf4_field_10'];
$dbdata["app_liabilities_mortgage_bal"] = $_POST['cf4_field_11'];
$dbdata["app_liabilities_mortgage_bal2"] = $_POST['cf4_field_12'];
$dbdata["app_liability1_type"] = $_POST['cf4_field_14'];
$dbdata["app_liability1_company"] = $_POST['cf4_field_15'];
$dbdata["app_liability1_acnum"] = $_POST['cf4_field_16'];
$dbdata["app_liability1_balance"] = $_POST['cf4_field_17'];
$dbdata["app_liability1_payment"] = $_POST['cf4_field_18'];
$dbdata["app_liability2_type"] = $_POST['cf4_field_19'];
$dbdata["app_liability2_company"] = $_POST['cf4_field_20'];
$dbdata["app_liability2_acnum"] = $_POST['cf4_field_21'];
$dbdata["app_liability2_balance"] = $_POST['cf4_field_22'];
$dbdata["app_liability2_payment"] = $_POST['cf4_field_23'];
$dbdata["app_liability3_type"] = $_POST['cf4_field_24'];
$dbdata["app_liability3_company"] = $_POST['cf4_field_25'];
$dbdata["app_liability3_acnum"] = $_POST['cf4_field_26'];
$dbdata["app_liability3_balance"] = $_POST['cf4_field_27'];
$dbdata["app_liability3_payment"] = $_POST['cf4_field_28'];
$dbdata["app_liability4_type"] = $_POST['cf4_field_29'];
$dbdata["app_liability4_company"] = $_POST['cf4_field_30'];
$dbdata["app_liability4_acnum"] = $_POST['cf4_field_31'];
$dbdata["app_liability4_balance"] = $_POST['cf4_field_32'];
$dbdata["app_liability4_payment"] = $_POST['cf4_field_33'];
$dbdata["app_liability5_type"] = $_POST['cf4_field_34'];
$dbdata["app_liability5_company"] = $_POST['cf4_field_35'];
$dbdata["app_liability5_acnum"] = $_POST['cf4_field_36'];
$dbdata["app_liability5_balance"] = $_POST['cf4_field_37'];
$dbdata["app_liability5_payment"] = $_POST['cf4_field_38'];
$dbdata["app_liability6_type"] = $_POST['cf4_field_39'];
$dbdata["app_liability6_company"] = $_POST['cf4_field_40'];
$dbdata["app_liability6_acnum"] = $_POST['cf4_field_41'];
$dbdata["app_liability6_balance"] = $_POST['cf4_field_42'];
$dbdata["app_liability6_payment"] = $_POST['cf4_field_43'];
$dbdata["app_realestate1_address"] = $_POST['cf4_field_45'];
$dbdata["app_realestate1_city"] = $_POST['cf4_field_46'];
$dbdata["app_realestate1_state"] = $_POST['cf4_field_47'];
$dbdata["app_realestate1_zipcode"] = $_POST['cf4_field_48'];
$dbdata["app_realestate1_status"] = $_POST['cf4_field_49'];
$dbdata["app_realestate1_type"] = $_POST['cf4_field_50'];
$dbdata["app_realestate1_value"] = $_POST['cf4_field_51'];
$dbdata["app_realestate1_mortgage"] = $_POST['cf4_field_52'];
$dbdata["app_realestate1_rental"] = $_POST['cf4_field_53'];
$dbdata["app_realestate1_payment"] = $_POST['cf4_field_54'];
$dbdata["app_realestate1_misc"] = $_POST['cf4_field_55'];
$dbdata["app_realestate1_netrental"] = $_POST['cf4_field_56'];
$dbdata["app_realestate2_address"] = $_POST['cf4_field_57'];
$dbdata["app_realestate2_city"] = $_POST['cf4_field_58'];
$dbdata["app_realestate2_state"] = $_POST['cf4_field_59'];
$dbdata["app_realestate2_zipcode"] = $_POST['cf4_field_60'];
$dbdata["app_realestate2_status"] = $_POST['cf4_field_61'];
$dbdata["app_realestate2_type"] = $_POST['cf4_field_62'];
$dbdata["app_realestate2_value"] = $_POST['cf4_field_63'];
$dbdata["app_realestate2_mortgage"] = $_POST['cf4_field_64'];
$dbdata["app_realestate2_rental"] = $_POST['cf4_field_65'];
$dbdata["app_realestate2_payment"] = $_POST['cf4_field_66'];
$dbdata["app_realestate2_misc"] = $_POST['cf4_field_67'];
$dbdata["app_realestate2_netrental"] = $_POST['cf4_field_68'];
$dbdata["app_realestate3_address"] = $_POST['cf4_field_69'];
$dbdata["app_realestate3_city"] = $_POST['cf4_field_70'];
$dbdata["app_realestate3_state"] = $_POST['cf4_field_71'];
$dbdata["app_realestate3_zipcode"] = $_POST['cf4_field_72'];
$dbdata["app_realestate3_status"] = $_POST['cf4_field_73'];
$dbdata["app_realestate3_type"] = $_POST['cf4_field_74'];
$dbdata["app_realestate3_value"] = $_POST['cf4_field_75'];
$dbdata["app_realestate3_mortgage"] = $_POST['cf4_field_76'];
$dbdata["app_realestate3_rental"] = $_POST['cf4_field_77'];
$dbdata["app_realestate3_payment"] = $_POST['cf4_field_78'];
$dbdata["app_realestate3_misc"] = $_POST['cf4_field_79'];
$dbdata["app_realestate3_netrental"] = $_POST['cf4_field_80'];
$dbdata["app_alternate1_fname"] = $_POST['cf4_field_82'];
$dbdata["app_alternate1_mname"] = $_POST['cf4_field_83'];
$dbdata["app_alternate1_lname"] = $_POST['cf4_field_84'];
$dbdata["app_alternate1_creditor"] = $_POST['cf4_field_85'];
$dbdata["app_alternate1_acnum"] = $_POST['cf4_field_86'];
$dbdata["app_alternate2_fname"] = $_POST['cf4_field_87'];
$dbdata["app_alternate2_mname"] = $_POST['cf4_field_88'];
$dbdata["app_alternate2_lname"] = $_POST['cf4_field_89'];
$dbdata["app_alternate2_creditor"] = $_POST['cf4_field_90'];
$dbdata["app_alternate2_acnum"] = $_POST['cf4_field_91'];
$dbdata["app_alternate3_fname"] = $_POST['cf4_field_92'];
$dbdata["app_alternate3_mname"] = $_POST['cf4_field_93'];
$dbdata["app_alternate3_lname"] = $_POST['cf4_field_94'];
$dbdata["app_alternate3_creditor"] = $_POST['cf4_field_95'];
$dbdata["app_alternate3_acnum"] = $_POST['cf4_field_96'];
$dbdata["app_outstanding_judgements"] = $_POST['cf5_field_4'];
$dbdata["app_declared_backrupt"] = $_POST['cf5_field_5'];
$dbdata["app_lawsuit"] = $_POST['cf5_field_6'];
$dbdata["app_foreclosure"] = $_POST['cf5_field_7'];
$dbdata["app_federal_debt"] = $_POST['cf5_field_8'];
$dbdata["app_obligated"] = $_POST['cf5_field_9'];
$dbdata["app_payment_borrowed"] = $_POST['cf5_field_10'];
$dbdata["app_endorser"] = $_POST['cf5_field_11'];
$dbdata["app_uscitizen"] = $_POST['cf5_field_12'];
$dbdata["app_permanent_resident"] = $_POST['cf5_field_13'];
$dbdata["app_occupy_property"] = $_POST['cf5_field_14'];
$dbdata["app_ownersip_interest"] = $_POST['cf5_field_15'];
$dbdata["app_owned_propertytype"] = $_POST['cf5_field_16'];
$dbdata["app_holded_hometitle"] = $_POST['cf5_field_17'];
$dbdata["app_explain"] = $_POST['cf5_field_18'];
$dbdata["app_furnish"] = $_POST['cf5_field_21'];
$dbdata["app_ethnicity"] = $_POST['cf5_field_27'];
$dbdata["app_race"] = $_POST['cf5_field_28'];
$dbdata["app_gender"] = $_POST['cf5_field_29'];
$dbdata["app_marital"] = $_POST['cf5_field_30'];
$dbdata["app_heardfrom"] = $_POST['cf5_field_34'];
$dbdata["app_added"] = date("Y-m-d H:i:s");
addToDatabase($wpdb->mortgageapp_step_tbl, $dbdata);


// email stuff (change data below)

$pdf=new HTML2FPDF();
$pdf->AddPage();
$mailbody='<table width="400" border="0" cellpadding="7" cellspacing="0"><tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>5 Step Application (Step 1 of 5)</b></td></tr>';

/*step form 1*/
$mailbody.='<tr><td><b>Borrower:</b></td><td>'.$Borrower.'</td></tr>';
$mailbody.='<tr><td><b>Co-Borrower:</b></td><td>'.$Co_Borrower.'</td></tr>';
$mailbody.='<tr><td><b>What Kind of Loan Are You Looking For? :</b></td><td>'.$What_Kind_of_Loan_Are_You_Looking_For.'</td></tr>';
$mailbody.='<tr><td><b>Loan Purposes:</b></td><td>'.$Loan_Purposes.'</td></tr>';
$mailbody.='<tr><td><b>Residence Type:</b></td><td>'.$Residence_Type.'</td></tr>';
$mailbody.='<tr><td><b>Property Type:</b></td><td>'.$Property_Type.'</td></tr>';
$mailbody.='<tr><td><b>Payment Term:</b></td><td>'.$Payment_Term.'</td></tr>';
$mailbody.='<tr><td><b>Number Of Units:</b></td><td>'.$Number_of_Units.'</td></tr>';
$mailbody.='<tr><td><b>Est. Loan Amt ($):</b></td><td>'.$Est_Loan_Amt.'</td></tr>';
$mailbody.='<tr><td><b>Amortization Type:</b></td><td>'.$Amortization_Type.'</td></tr>';
$mailbody.='<tr><td><b>Interest Rate (%):</b></td><td>'.$Interest_Rate.'</td></tr>';
$mailbody.='<tr><td><b>Sales Price:</b></td><td>'.$Sales_Price.'</td></tr>';
$mailbody.='<tr><td><b>Property Address:</b></td><td>'.$Property_Address.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$City.'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$zip_code.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please Tell Us About Yourself</b></td></tr>';

$mailbody.='<tr><td><b>First Name:</b></td><td>'.$First_Name.'</td></tr>';
$mailbody.='<tr><td><b>Last Name:</b></td><td>'.$Last_Name.'</td></tr>';
$mailbody.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$City1.'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$zip_code1.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State1.'</td></tr>';
$mailbody.='<tr><td><b>Work phone:</b></td><td>'.$Work_phone1.'</td></tr>';
$mailbody.='<tr><td><b>Home phone:</b></td><td>'.$Home_phone1.'</td></tr>';
$mailbody.='<tr><td><b>Email:</b></td><td>'.$Email1.'</td></tr>';
$mailbody.='<tr><td><b>Social Sec. No.:</b></td><td>'.$Social_Sec_No1.'</td></tr>';
$mailbody.='<tr><td><b>(Own/Rent):</b></td><td>'.$Own_Rent1.'</td></tr>';
$mailbody.='<tr><td><b>Years at present address:</b></td><td>'.$Years_at_present_address1.'</td></tr>';
$mailbody.='<tr><td><b>Birth Date:</b></td><td>'.$Birth_Date1.'</td></tr>';
$mailbody.='<tr><td><b>Years of Schooling:</b></td><td>'.$Years_of_Schooling1.'</td></tr>';
$mailbody.='<tr><td><b>Dependents no:</b></td><td>'.$Dependents_no1.'</td></tr>';
$mailbody.='<tr><td><b>Mail Street Address:</b></td><td>'.$Mail_Street_Address1.'</td></tr>';
$mailbody.='<tr><td><b>Mail City:</b></td><td>'.$Mail_City1.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State_mail.'</td></tr>';
$mailbody.='<tr><td><b>Mail Zip code:</b></td><td>'.$Mail_Zip_code.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Co-Applicant Information - Complete this section only if you are applying jointly.</b></td></tr>';

$mailbody.='<tr><td><b>First Name:</b></td><td>'.$First_Name_co.'</td></tr>';
$mailbody.='<tr><td><b>Last Name:</b></td><td>'.$Last_Name_co.'</td></tr>';
$mailbody.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address_co.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$City_co.'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$zip_code_co.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State_co.'</td></tr>';
$mailbody.='<tr><td><b>Work phone:</b></td><td>'.$Work_phone_co.'</td></tr>';
$mailbody.='<tr><td><b>Home phone:</b></td><td>'.$Home_phone_co.'</td></tr>';
$mailbody.='<tr><td><b>Email:</b></td><td>'.$Email_co.'</td></tr>';
$mailbody.='<tr><td><b>Social Sec. No.:</b></td><td>'.$Social_Sec_No_co.'</td></tr>';
$mailbody.='<tr><td><b>(Own/Rent):</b></td><td>'.$Own_Rent_co.'</td></tr>';
$mailbody.='<tr><td><b>Years at present address:</b></td><td>'.$Years_at_present_address_co.'</td></tr>';
$mailbody.='<tr><td><b>Birth Date:</b></td><td>'.$Birth_Date_co.'</td></tr>';
$mailbody.='<tr><td><b>Years of Schooling:</b></td><td>'.$Years_of_Schooling_co.'</td></tr>';
$mailbody.='<tr><td><b>Dependents no:</b></td><td>'.$Dependents_no_co.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Applicant</b></td></tr>';

$mailbody.='<tr><td><b>I agree:</b></td><td>'.$I_agree.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Applicant</b></td></tr>';

$mailbody.='<tr><td><b>I agree:</b></td><td>'.$I_agree_co.'</td></tr>';

/*end step 1 form*/
/*step 2 form*/
$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>5 Step Application (Step 2 of 5)</b></td></tr>';

$mailbody.='<tr><td><b>Employer Name:</b></td><td>'.$Employer_Name_cf2.'</td></tr>';
$mailbody.='<tr><td><b>Position:</b></td><td>'.$Position_cf2.'</td></tr>';
$mailbody.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address_cf2.'</td></tr>';
$mailbody.='<tr><td><b>employed:</b></td><td>'.$employed_cf2.'</td></tr>';
$mailbody.='<tr><td><b>Years Employed:</b></td><td>'.$Years_Employed_cf2.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$City_cf2.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State_cf2.'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$zip_code_cf2.'</td></tr>';
$mailbody.='<tr><td><b>Years in same field:</b></td><td>'.$Years_in_same_field_cf2.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Income Amount * (before taxes): $</b></td><td>'.$Monthly_Income_Amount_cf2.'</td></tr>';
$mailbody.='<tr><td><b>Other Income Source :</b></td><td>'.$Other_Income_Source_cf2.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Amt Other Income: $</b></td><td>'.$Monthly_Amt_Other_Income_cf2.'</td></tr>';

/*end step 2 form*/

/*start 3 step form*/

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>5 Step Application (Step 3 of 5)</b></td></tr>';

$mailbody.='<tr><td><b>Jointly/Not Jointly:</b></td><td>'.$Jointly.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please Describe Your Assets </b></td></tr>';

$mailbody.='<tr><td><b>1. Cash Dep. Toward Purchase Held by:</b></td><td>'.$Cash_Dep_cf3.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3.'</td></tr>';

$mailbody.='<tr><td><b>2. Financial Institution:</b></td><td>'.$Financial_Institution_cf3_1.'</td></tr>';
$mailbody.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf3_1.'</td></tr>';
$mailbody.='<tr><td><b>Account Type:</b></td><td>'.$Account_Type_cf3_1.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_1.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>3. Financial Institution:</b></td><td>'.$Financial_Institution_cf3_2.'</td></tr>';
$mailbody.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf3_2.'</td></tr>';
$mailbody.='<tr><td><b>Account Type:</b></td><td>'.$Account_Type_cf3_2.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_2.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>4. Financial Institution:</b></td><td>'.$Financial_Institution_cf3_3.'</td></tr>';
$mailbody.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf3_3.'</td></tr>';
$mailbody.='<tr><td><b>Account Type:</b></td><td>'.$Account_Type_cf3_3.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_3.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>5. Retirement Account:</b></td><td>'.$Retirement_Account_cf3_4.'</td></tr>';
$mailbody.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf3_4.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_4.'</td></tr>';

$mailbody.='<tr><td><b>6.Life Insurance:</b></td><td>'.$Life_Insurance_cf3_5.'</td></tr>';
$mailbody.='<tr><td><b>Amount:$</b></td><td>'.$Amount_cf3_5.'</td></tr>';

$mailbody.='<tr><td><b>7. Real Estate Owned (market value):</b></td><td>'.$Real_Estate_Owned_cf3_6.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_6.'</td></tr>';

$mailbody.='<tr><td><b>8. Net worth of Business(es) Owned</b></td><td>'.$Net_worth_of_Business_cf3_7.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_7.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Automobiles Owned</b></td></tr>';

$mailbody.='<tr><td><b>1. Year:</b></td><td>'.$Year_cf3_8.'</td></tr>';
$mailbody.='<tr><td><b>Make:</b></td><td>'.$Make_cf3_8.'</td></tr>';
$mailbody.='<tr><td><b>Cur. Value: $</b></td><td>'.$Cur_Value_cf3_8.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>2. Year:</b></td><td>'.$Year_cf3_9.'</td></tr>';
$mailbody.='<tr><td><b>Make:</b></td><td>'.$Make_cf3_9.'</td></tr>';
$mailbody.='<tr><td><b>Cur. Value: $</b></td><td>'.$Cur_Value_cf3_9.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>3. Year:</b></td><td>'.$Year_cf3_10.'</td></tr>';
$mailbody.='<tr><td><b>Make:</b></td><td>'.$Make_cf3_10.'</td></tr>';
$mailbody.='<tr><td><b>Cur. Value: $</b></td><td>'.$Cur_Value_cf3_10.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Other Assets: (please describe below)</b></td></tr>';

$mailbody.='<tr><td><b>1. Description:</b></td><td>'.$Description_cf3_11.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_11.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>2. Description:</b></td><td>'.$Description_cf3_12.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_12.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>3. Description:</b></td><td>'.$Description_cf3_13.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_13.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>4. Description:</b></td><td>'.$Description_cf3_14.'</td></tr>';
$mailbody.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_14.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

/*end 3 step form*/

/*start step form 4*/

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>5 Step Application(Step 4 of 5)</b></td></tr>';

$mailbody.='<tr><td><b>1. Rent Monthly Payment $:</b></td><td>'.$Rent_Monthly_Payment_cf4.'</td></tr>';
$mailbody.='<tr><td><b>2. 1st Mortgage Monthly Payment $:</b></td><td>'.$Mortgage_Monthly_Payment_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>3. 2nd Mortgage Monthly Payment $</b></td><td>'.$Mortgage_Monthly_Payment_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>4. Home Owners Ins. Mon. Pmt. $:</b></td><td>'.$Home_Owners_Ins_Mon_Pmt_cf4.'</td></tr>';
$mailbody.='<tr><td><b>5. Real Estate Taxes Mon. Pmt. $ :</b></td><td>'.$Real_Estate_Taxes_Mon_Pmt_cf4.'</td></tr>';
$mailbody.='<tr><td><b>6. Mortgage Ins. Mon. Pmt. $:</b></td><td>'.$Mortgage_Ins_Mon_Pmt_cf4.'</td></tr>';
$mailbody.='<tr><td><b>7. Home Owners Assoc. Mon. Dues $:</b></td><td>'.$Home_Owners_Assoc_Mon_Dues_cf4.'</td></tr>';
$mailbody.='<tr><td><b>1st Mtg Balance $ :</b></td><td>'.$Mtg_Balance_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>2nd Mtg Balance $:</b></td><td>'.$Mtg_Balance_cf4_2.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Types of liabilities</b></td></tr>';

$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability1_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name1_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability1_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability1_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability1_cf4.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability2_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name2_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability2_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability2_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability2_cf4.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability3_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name3_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability3_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability3_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability3_cf4.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability4_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name4_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability4_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability4_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability4_cf4.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability5_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name5_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability5_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability5_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability5_cf4.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';


$mailbody.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability6_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name6_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability6_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability6_cf4.'</td></tr>';
$mailbody.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability6_cf4.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please describe real estate owned</b></td></tr>';


$mailbody.='<tr><td><b>Property Address:</b></td><td>'.$Property_Address_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Property City:</b></td><td>'.$Property_City_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$zip_code_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Property Status:</b></td><td>'.$Property_Status_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Property Type:</b></td><td>'.$Property_Type_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Curr. Market Value $:</b></td><td>'.$Curr_Market_Value_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Amt of Mtgs & Liens $:</b></td><td>'.$Amt_of_Mtgs_Liens_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Gross Rental Income $ :</b></td><td>'.$Gross_Rental_Income_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Mortgage Payments $:</b></td><td>'.$Mortgage_Payments_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Ins. Maintenance, Taxes, Misc $:</b></td><td>'.$Ins_Maintenance_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Net Rental Income $:</b></td><td>'.$Net_Rental_Income_cf4_1.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>Property Address:</b></td><td>'.$Property_Address_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Property City:</b></td><td>'.$Property_City_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$zip_code_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Property Status:</b></td><td>'.$Property_Status_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Property Type:</b></td><td>'.$Property_Type_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Curr. Market Value $:</b></td><td>'.$Curr_Market_Value_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Amt of Mtgs & Liens $:</b></td><td>'.$Amt_of_Mtgs_Liens_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Gross Rental Income $ :</b></td><td>'.$Gross_Rental_Income_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Mortgage Payments $:</b></td><td>'.$Mortgage_Payments_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Ins. Maintenance, Taxes, Misc $:</b></td><td>'.$Ins_Maintenance_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Net Rental Income $:</b></td><td>'.$Net_Rental_Income_cf4_2.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>Property Address:</b></td><td>'.$Property_Address_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Property City:</b></td><td>'.$Property_City_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>zip code:</b></td><td>'.$zip_code_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Property Status:</b></td><td>'.$Property_Status_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Property Type:</b></td><td>'.$Property_Type_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Curr. Market Value $:</b></td><td>'.$Curr_Market_Value_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Amt of Mtgs & Liens $:</b></td><td>'.$Amt_of_Mtgs_Liens_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Gross Rental Income $ :</b></td><td>'.$Gross_Rental_Income_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Mortgage Payments $:</b></td><td>'.$Mortgage_Payments_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Ins. Maintenance, Taxes, Misc $:</b></td><td>'.$Ins_Maintenance_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Net Rental Income $:</b></td><td>'.$Net_Rental_Income_cf4_3.'</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>List any additional names under which credit has previously been received and indicate appropriate creditor name(s) and account number(s).</b></td></tr>';



$mailbody.='<tr><td><b>1. Alternate First Name</b></td><td>'.$Alternate_First_Name_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Alt. Middle Name:</b></td><td>'.$Alt_Middle_Name_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Alt. Last Name:</b></td><td>'.$Alt_Last_Name_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Creditor Name:</b></td><td>'.$Creditor_Name_cf4_1.'</td></tr>';
$mailbody.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf4_1.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>1. Alternate First Name</b></td><td>'.$Alternate_First_Name_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Alt. Middle Name:</b></td><td>'.$Alt_Middle_Name_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Alt. Last Name:</b></td><td>'.$Alt_Last_Name_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Creditor Name:</b></td><td>'.$Creditor_Name_cf4_2.'</td></tr>';
$mailbody.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf4_2.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>1. Alternate First Name</b></td><td>'.$Alternate_First_Name_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Alt. Middle Name:</b></td><td>'.$Alt_Middle_Name_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Alt. Last Name:</b></td><td>'.$Alt_Last_Name_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Creditor Name:</b></td><td>'.$Creditor_Name_cf4_3.'</td></tr>';
$mailbody.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf4_3.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

/*end step form 4*/

/*start form 5*/
$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>5 Step Application (Step 5 of 5)</b></td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Applicant</b></td></tr>';

$mailbody.='<tr><td><b>1. Are there any outstanding judgments against you?:</b></td><td>'.$Are_there_any_outstanding_judgments_against_you_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>2. Have you been declared bankrupt within the past 7 years?:</b></td><td>'.$Have_you_been_declared_bankrupt_within_the_past_7_years_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>3. Are you a party to a lawsuit?:</b></td><td>'.$Are_you_a_party_to_a_lawsuit_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>4.Have you directly or indirectly been obligated on any loan which resulted in foreclosure, transfer of title in lieu of foreclosure, or judgment? (This would include such loans as home mortgage loans, SBA loans, home improvement loans, educational loans, manufactured (mobile) home loans, any mortgage, financial obligation, bond, or loan guarantee. If \"Yes,\" provide details, including date, name and address of Lender, FHA or VA case number,if any, and reasons for the action.):</b></td><td>'.$Have_you_directly_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>Are you presently delinquent or in default on any Federal debt or any other loan, mortgage, financial obligation, bond, or loan guarantee? If \"Yes,\" give details as described in the preceding question.:</b></td><td>'.$Are_you_presently_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>6.Are you obligated to pay alimony, child support, or separate maintenance?:</b></td><td>'.$Are_you_obligated_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>7.Is any part of the down payment borrowed?:</b></td><td>'.$Is_any_part_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>8. Are you a co-maker or endorser on a note?:</b></td><td>'.$Are_you_a_co_maker_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>9. Are you a U. S. citizen?:</b></td><td>'.$Are_you_a_U_S_citizen_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>10. Are you a permanent resident alien?:</b></td><td>'.$Are_you_a_permanent_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>11.Do you intend to occupy the property as your primary residence? If \"Yes,\" complete question 13 below.:</b></td><td>'.$Do_you_intend_cf5_3.'</td></tr>';
$mailbody.='<tr><td><b>12.Have you had an ownership interest in a property in the last three years?:</b></td><td>'.$Have_you_had_cf5_3.'</td></tr>';

$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';

$mailbody.='<tr><td><b>(a) What type of property did you own?:</b></td><td>'.$What_type_of_property_cf5_1.'</td></tr>';
$mailbody.='<tr><td><b>(b) How did you hold title to the home?:</b></td><td>'.$How_did_you_hold_cf5_1.'</td></tr>';


$mailbody.='<tr><td><b>If you answered \"Yes\" to questions 2, 3, 5, or 6 please explain below:</b></td><td>'.$If_you_answered_cf5_1.'</td></tr>';

$mailbody.='<tr><td><b>Ethnicity:</b></td><td>'.$Ethnicity_cf5_1.'</td></tr>';
$mailbody.='<tr><td><b>Race:</b></td><td>'.$Race_cf5_1.'</td></tr>';
$mailbody.='<tr><td><b>Gender:</b></td><td>'.$Gender_cf5_2.'</td></tr>';
$mailbody.='<tr><td><b>Marital Status:</b></td><td>'.$Marital_Status_cf5_2.'</td></tr>';
$mailbody.='<tr><td><b>How did you hear about us?:</b></td><td>'.$How_did_you_hear_about_us_cf5_2.'</td></tr></table>';


/*end form 5*/





$body='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>5 Step Application (Step 1 of 5)</b></td></tr>';

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



/*step form 1*/
$body.='<tr><td><b>Borrower:</b></td><td>'.$Borrower.'</td></tr>';
$body.='<tr><td><b>Co-Borrower:</b></td><td>'.$Co_Borrower.'</td></tr>';
$body.='<tr><td><b>What Kind of Loan Are You Looking For? :</b></td><td>'.$What_Kind_of_Loan_Are_You_Looking_For.'</td></tr>';
$body.='<tr><td><b>Loan Purposes:</b></td><td>'.$Loan_Purposes.'</td></tr>';
$body.='<tr><td><b>Residence Type:</b></td><td>'.$Residence_Type.'</td></tr>';
$body.='<tr><td><b>Property Type:</b></td><td>'.$Property_Type.'</td></tr>';
$body.='<tr><td><b>Payment Term:</b></td><td>'.$Payment_Term.'</td></tr>';
$body.='<tr><td><b>Number Of Units:</b></td><td>'.$Number_of_Units.'</td></tr>';
$body.='<tr><td><b>Est. Loan Amt ($):</b></td><td>'.$Est_Loan_Amt.'</td></tr>';
$body.='<tr><td><b>Amortization Type:</b></td><td>'.$Amortization_Type.'</td></tr>';
$body.='<tr><td><b>Interest Rate (%):</b></td><td>'.$Interest_Rate.'</td></tr>';
$body.='<tr><td><b>Sales Price:</b></td><td>'.$Sales_Price.'</td></tr>';
$body.='<tr><td><b>Property Address:</b></td><td>'.$Property_Address.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$City.'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$zip_code.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please Tell Us About Yourself</b></td></tr>';

$body.='<tr><td><b>First Name:</b></td><td>'.$First_Name.'</td></tr>';
$body.='<tr><td><b>Last Name:</b></td><td>'.$Last_Name.'</td></tr>';
$body.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$City1.'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$zip_code1.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State1.'</td></tr>';
$body.='<tr><td><b>Work phone:</b></td><td>'.$Work_phone1.'</td></tr>';
$body.='<tr><td><b>Home phone:</b></td><td>'.$Home_phone1.'</td></tr>';
$body.='<tr><td><b>Email:</b></td><td>'.$Email1.'</td></tr>';
$body.='<tr><td><b>Social Sec. No.:</b></td><td>'.$Social_Sec_No1.'</td></tr>';
$body.='<tr><td><b>(Own/Rent):</b></td><td>'.$Own_Rent1.'</td></tr>';
$body.='<tr><td><b>Years at present address:</b></td><td>'.$Years_at_present_address1.'</td></tr>';
$body.='<tr><td><b>Birth Date:</b></td><td>'.$Birth_Date1.'</td></tr>';
$body.='<tr><td><b>Years of Schooling:</b></td><td>'.$Years_of_Schooling1.'</td></tr>';
$body.='<tr><td><b>Dependents no:</b></td><td>'.$Dependents_no1.'</td></tr>';
$body.='<tr><td><b>Mail Street Address:</b></td><td>'.$Mail_Street_Address1.'</td></tr>';
$body.='<tr><td><b>Mail City:</b></td><td>'.$Mail_City1.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State_mail.'</td></tr>';
$body.='<tr><td><b>Mail Zip code:</b></td><td>'.$Mail_Zip_code.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Co-Applicant Information - Complete this section only if you are applying jointly.</b></td></tr>';

$body.='<tr><td><b>First Name:</b></td><td>'.$First_Name_co.'</td></tr>';
$body.='<tr><td><b>Last Name:</b></td><td>'.$Last_Name_co.'</td></tr>';
$body.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address_co.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$City_co.'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$zip_code_co.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State_co.'</td></tr>';
$body.='<tr><td><b>Work phone:</b></td><td>'.$Work_phone_co.'</td></tr>';
$body.='<tr><td><b>Home phone:</b></td><td>'.$Home_phone_co.'</td></tr>';
$body.='<tr><td><b>Email:</b></td><td>'.$Email_co.'</td></tr>';
$body.='<tr><td><b>Social Sec. No.:</b></td><td>'.$Social_Sec_No_co.'</td></tr>';
$body.='<tr><td><b>(Own/Rent):</b></td><td>'.$Own_Rent_co.'</td></tr>';
$body.='<tr><td><b>Years at present address:</b></td><td>'.$Years_at_present_address_co.'</td></tr>';
$body.='<tr><td><b>Birth Date:</b></td><td>'.$Birth_Date_co.'</td></tr>';
$body.='<tr><td><b>Years of Schooling:</b></td><td>'.$Years_of_Schooling_co.'</td></tr>';
$body.='<tr><td><b>Dependents no:</b></td><td>'.$Dependents_no_co.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Applicant</b></td></tr>';

$body.='<tr><td><b>I agree:</b></td><td>'.$I_agree.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Applicant</b></td></tr>';

$body.='<tr><td><b>I agree:</b></td><td>'.$I_agree_co.'</td></tr>';

/*end step 1 form*/
/*step 2 form*/
$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>5 Step Application (Step 2 of 5)</b></td></tr>';

$body.='<tr><td><b>Employer Name:</b></td><td>'.$Employer_Name_cf2.'</td></tr>';
$body.='<tr><td><b>Position:</b></td><td>'.$Position_cf2.'</td></tr>';
$body.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address_cf2.'</td></tr>';
$body.='<tr><td><b>employed:</b></td><td>'.$employed_cf2.'</td></tr>';
$body.='<tr><td><b>Years Employed:</b></td><td>'.$Years_Employed_cf2.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$City_cf2.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State_cf2.'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$zip_code_cf2.'</td></tr>';
$body.='<tr><td><b>Years in same field:</b></td><td>'.$Years_in_same_field_cf2.'</td></tr>';
$body.='<tr><td><b>Monthly Income Amount * (before taxes): $</b></td><td>'.$Monthly_Income_Amount_cf2.'</td></tr>';
$body.='<tr><td><b>Other Income Source :</b></td><td>'.$Other_Income_Source_cf2.'</td></tr>';
$body.='<tr><td><b>Monthly Amt Other Income: $</b></td><td>'.$Monthly_Amt_Other_Income_cf2.'</td></tr>';

/*end step 2 form*/

/*start 3 step form*/

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>5 Step Application (Step 3 of 5)</b></td></tr>';

$body.='<tr><td><b>Jointly/Not Jointly:</b></td><td>'.$Jointly.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please Describe Your Assets </b></td></tr>';

$body.='<tr><td><b>1. Cash Dep. Toward Purchase Held by:</b></td><td>'.$Cash_Dep_cf3.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3.'</td></tr>';

$body.='<tr><td><b>2. Financial Institution:</b></td><td>'.$Financial_Institution_cf3_1.'</td></tr>';
$body.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf3_1.'</td></tr>';
$body.='<tr><td><b>Account Type:</b></td><td>'.$Account_Type_cf3_1.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_1.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>3. Financial Institution:</b></td><td>'.$Financial_Institution_cf3_2.'</td></tr>';
$body.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf3_2.'</td></tr>';
$body.='<tr><td><b>Account Type:</b></td><td>'.$Account_Type_cf3_2.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_2.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>4. Financial Institution:</b></td><td>'.$Financial_Institution_cf3_3.'</td></tr>';
$body.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf3_3.'</td></tr>';
$body.='<tr><td><b>Account Type:</b></td><td>'.$Account_Type_cf3_3.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_3.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>5. Retirement Account:</b></td><td>'.$Retirement_Account_cf3_4.'</td></tr>';
$body.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf3_4.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_4.'</td></tr>';

$body.='<tr><td><b>6.Life Insurance:</b></td><td>'.$Life_Insurance_cf3_5.'</td></tr>';
$body.='<tr><td><b>Amount:$</b></td><td>'.$Amount_cf3_5.'</td></tr>';

$body.='<tr><td><b>7. Real Estate Owned (market value):</b></td><td>'.$Real_Estate_Owned_cf3_6.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_6.'</td></tr>';

$body.='<tr><td><b>8. Net worth of Business(es) Owned</b></td><td>'.$Net_worth_of_Business_cf3_7.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_7.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Automobiles Owned</b></td></tr>';

$body.='<tr><td><b>1. Year:</b></td><td>'.$Year_cf3_8.'</td></tr>';
$body.='<tr><td><b>Make:</b></td><td>'.$Make_cf3_8.'</td></tr>';
$body.='<tr><td><b>Cur. Value: $</b></td><td>'.$Cur_Value_cf3_8.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>2. Year:</b></td><td>'.$Year_cf3_9.'</td></tr>';
$body.='<tr><td><b>Make:</b></td><td>'.$Make_cf3_9.'</td></tr>';
$body.='<tr><td><b>Cur. Value: $</b></td><td>'.$Cur_Value_cf3_9.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>3. Year:</b></td><td>'.$Year_cf3_10.'</td></tr>';
$body.='<tr><td><b>Make:</b></td><td>'.$Make_cf3_10.'</td></tr>';
$body.='<tr><td><b>Cur. Value: $</b></td><td>'.$Cur_Value_cf3_10.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Other Assets: (please describe below)</b></td></tr>';

$body.='<tr><td><b>1. Description:</b></td><td>'.$Description_cf3_11.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_11.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>2. Description:</b></td><td>'.$Description_cf3_12.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_12.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>3. Description:</b></td><td>'.$Description_cf3_13.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_13.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>4. Description:</b></td><td>'.$Description_cf3_14.'</td></tr>';
$body.='<tr><td><b>Amount: $</b></td><td>'.$Amount_cf3_14.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

/*end 3 step form*/

/*start step form 4*/

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>5 Step Application(Step 4 of 5)</b></td></tr>';

$body.='<tr><td><b>1. Rent Monthly Payment $:</b></td><td>'.$Rent_Monthly_Payment_cf4.'</td></tr>';
$body.='<tr><td><b>2. 1st Mortgage Monthly Payment $:</b></td><td>'.$Mortgage_Monthly_Payment_cf4_1.'</td></tr>';
$body.='<tr><td><b>3. 2nd Mortgage Monthly Payment $</b></td><td>'.$Mortgage_Monthly_Payment_cf4_2.'</td></tr>';
$body.='<tr><td><b>4. Home Owners Ins. Mon. Pmt. $:</b></td><td>'.$Home_Owners_Ins_Mon_Pmt_cf4.'</td></tr>';
$body.='<tr><td><b>5. Real Estate Taxes Mon. Pmt. $ :</b></td><td>'.$Real_Estate_Taxes_Mon_Pmt_cf4.'</td></tr>';
$body.='<tr><td><b>6. Mortgage Ins. Mon. Pmt. $:</b></td><td>'.$Mortgage_Ins_Mon_Pmt_cf4.'</td></tr>';
$body.='<tr><td><b>7. Home Owners Assoc. Mon. Dues $:</b></td><td>'.$Home_Owners_Assoc_Mon_Dues_cf4.'</td></tr>';
$body.='<tr><td><b>1st Mtg Balance $ :</b></td><td>'.$Mtg_Balance_cf4_1.'</td></tr>';
$body.='<tr><td><b>2nd Mtg Balance $:</b></td><td>'.$Mtg_Balance_cf4_2.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Types of liabilities</b></td></tr>';

$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability1_cf4.'</td></tr>';
$body.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name1_cf4.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability1_cf4.'</td></tr>';
$body.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability1_cf4.'</td></tr>';
$body.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability1_cf4.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability2_cf4.'</td></tr>';
$body.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name2_cf4.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability2_cf4.'</td></tr>';
$body.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability2_cf4.'</td></tr>';
$body.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability2_cf4.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability3_cf4.'</td></tr>';
$body.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name3_cf4.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability3_cf4.'</td></tr>';
$body.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability3_cf4.'</td></tr>';
$body.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability3_cf4.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability4_cf4.'</td></tr>';
$body.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name4_cf4.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability4_cf4.'</td></tr>';
$body.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability4_cf4.'</td></tr>';
$body.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability4_cf4.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability5_cf4.'</td></tr>';
$body.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name5_cf4.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability5_cf4.'</td></tr>';
$body.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability5_cf4.'</td></tr>';
$body.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability5_cf4.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';


$body.='<tr><td><b>Type of Liability:</b></td><td>'.$Type_of_Liability6_cf4.'</td></tr>';
$body.='<tr><td><b>Company Name:</b></td><td>'.$Company_Name6_cf4.'</td></tr>';
$body.='<tr><td><b>Account Number:</b></td><td>'.$Account_Number_liability6_cf4.'</td></tr>';
$body.='<tr><td><b>Current Bal.:</b></td><td>'.$Cur_Bal_liability6_cf4.'</td></tr>';
$body.='<tr><td><b>Monthly Payment:</b></td><td>'.$Monthly_Pmt_liability6_cf4.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Please describe real estate owned</b></td></tr>';


$body.='<tr><td><b>Property Address:</b></td><td>'.$Property_Address_cf4_1.'</td></tr>';
$body.='<tr><td><b>Property City:</b></td><td>'.$Property_City_cf4_1.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State_cf4_1.'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$zip_code_cf4_1.'</td></tr>';
$body.='<tr><td><b>Property Status:</b></td><td>'.$Property_Status_cf4_1.'</td></tr>';
$body.='<tr><td><b>Property Type:</b></td><td>'.$Property_Type_cf4_1.'</td></tr>';
$body.='<tr><td><b>Curr. Market Value $:</b></td><td>'.$Curr_Market_Value_cf4_1.'</td></tr>';
$body.='<tr><td><b>Amt of Mtgs & Liens $:</b></td><td>'.$Amt_of_Mtgs_Liens_cf4_1.'</td></tr>';
$body.='<tr><td><b>Gross Rental Income $ :</b></td><td>'.$Gross_Rental_Income_cf4_1.'</td></tr>';
$body.='<tr><td><b>Mortgage Payments $:</b></td><td>'.$Mortgage_Payments_cf4_1.'</td></tr>';
$body.='<tr><td><b>Ins. Maintenance, Taxes, Misc $:</b></td><td>'.$Ins_Maintenance_cf4_1.'</td></tr>';
$body.='<tr><td><b>Net Rental Income $:</b></td><td>'.$Net_Rental_Income_cf4_1.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>Property Address:</b></td><td>'.$Property_Address_cf4_2.'</td></tr>';
$body.='<tr><td><b>Property City:</b></td><td>'.$Property_City_cf4_2.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State_cf4_2.'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$zip_code_cf4_2.'</td></tr>';
$body.='<tr><td><b>Property Status:</b></td><td>'.$Property_Status_cf4_2.'</td></tr>';
$body.='<tr><td><b>Property Type:</b></td><td>'.$Property_Type_cf4_2.'</td></tr>';
$body.='<tr><td><b>Curr. Market Value $:</b></td><td>'.$Curr_Market_Value_cf4_2.'</td></tr>';
$body.='<tr><td><b>Amt of Mtgs & Liens $:</b></td><td>'.$Amt_of_Mtgs_Liens_cf4_2.'</td></tr>';
$body.='<tr><td><b>Gross Rental Income $ :</b></td><td>'.$Gross_Rental_Income_cf4_2.'</td></tr>';
$body.='<tr><td><b>Mortgage Payments $:</b></td><td>'.$Mortgage_Payments_cf4_2.'</td></tr>';
$body.='<tr><td><b>Ins. Maintenance, Taxes, Misc $:</b></td><td>'.$Ins_Maintenance_cf4_2.'</td></tr>';
$body.='<tr><td><b>Net Rental Income $:</b></td><td>'.$Net_Rental_Income_cf4_2.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>Property Address:</b></td><td>'.$Property_Address_cf4_3.'</td></tr>';
$body.='<tr><td><b>Property City:</b></td><td>'.$Property_City_cf4_3.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State_cf4_3.'</td></tr>';
$body.='<tr><td><b>zip code:</b></td><td>'.$zip_code_cf4_3.'</td></tr>';
$body.='<tr><td><b>Property Status:</b></td><td>'.$Property_Status_cf4_3.'</td></tr>';
$body.='<tr><td><b>Property Type:</b></td><td>'.$Property_Type_cf4_3.'</td></tr>';
$body.='<tr><td><b>Curr. Market Value $:</b></td><td>'.$Curr_Market_Value_cf4_3.'</td></tr>';
$body.='<tr><td><b>Amt of Mtgs & Liens $:</b></td><td>'.$Amt_of_Mtgs_Liens_cf4_3.'</td></tr>';
$body.='<tr><td><b>Gross Rental Income $ :</b></td><td>'.$Gross_Rental_Income_cf4_3.'</td></tr>';
$body.='<tr><td><b>Mortgage Payments $:</b></td><td>'.$Mortgage_Payments_cf4_3.'</td></tr>';
$body.='<tr><td><b>Ins. Maintenance, Taxes, Misc $:</b></td><td>'.$Ins_Maintenance_cf4_3.'</td></tr>';
$body.='<tr><td><b>Net Rental Income $:</b></td><td>'.$Net_Rental_Income_cf4_3.'</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>List any additional names under which credit has previously been received and indicate appropriate creditor name(s) and account number(s).</b></td></tr>';



$body.='<tr><td><b>1. Alternate First Name</b></td><td>'.$Alternate_First_Name_cf4_1.'</td></tr>';
$body.='<tr><td><b>Alt. Middle Name:</b></td><td>'.$Alt_Middle_Name_cf4_1.'</td></tr>';
$body.='<tr><td><b>Alt. Last Name:</b></td><td>'.$Alt_Last_Name_cf4_1.'</td></tr>';
$body.='<tr><td><b>Creditor Name:</b></td><td>'.$Creditor_Name_cf4_1.'</td></tr>';
$body.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf4_1.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>1. Alternate First Name</b></td><td>'.$Alternate_First_Name_cf4_2.'</td></tr>';
$body.='<tr><td><b>Alt. Middle Name:</b></td><td>'.$Alt_Middle_Name_cf4_2.'</td></tr>';
$body.='<tr><td><b>Alt. Last Name:</b></td><td>'.$Alt_Last_Name_cf4_2.'</td></tr>';
$body.='<tr><td><b>Creditor Name:</b></td><td>'.$Creditor_Name_cf4_2.'</td></tr>';
$body.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf4_2.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>1. Alternate First Name</b></td><td>'.$Alternate_First_Name_cf4_3.'</td></tr>';
$body.='<tr><td><b>Alt. Middle Name:</b></td><td>'.$Alt_Middle_Name_cf4_3.'</td></tr>';
$body.='<tr><td><b>Alt. Last Name:</b></td><td>'.$Alt_Last_Name_cf4_3.'</td></tr>';
$body.='<tr><td><b>Creditor Name:</b></td><td>'.$Creditor_Name_cf4_3.'</td></tr>';
$body.='<tr><td><b>Acct. Number:</b></td><td>'.$Acct_Number_cf4_3.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

/*end step form 4*/

/*start form 5*/
$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>5 Step Application (Step 5 of 5)</b></td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td colspan="2" align="center" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Applicant</b></td></tr>';

$body.='<tr><td><b>1. Are there any outstanding judgments against you?:</b></td><td>'.$Are_there_any_outstanding_judgments_against_you_cf5_3.'</td></tr>';
$body.='<tr><td><b>2. Have you been declared bankrupt within the past 7 years?:</b></td><td>'.$Have_you_been_declared_bankrupt_within_the_past_7_years_cf5_3.'</td></tr>';
$body.='<tr><td><b>3. Are you a party to a lawsuit?:</b></td><td>'.$Are_you_a_party_to_a_lawsuit_cf5_3.'</td></tr>';
$body.='<tr><td><b>4.Have you directly or indirectly been obligated on any loan which resulted in foreclosure, transfer of title in lieu of foreclosure, or judgment? (This would include such loans as home mortgage loans, SBA loans, home improvement loans, educational loans, manufactured (mobile) home loans, any mortgage, financial obligation, bond, or loan guarantee. If \"Yes,\" provide details, including date, name and address of Lender, FHA or VA case number,if any, and reasons for the action.):</b></td><td>'.$Have_you_directly_cf5_3.'</td></tr>';
$body.='<tr><td><b>Are you presently delinquent or in default on any Federal debt or any other loan, mortgage, financial obligation, bond, or loan guarantee? If \"Yes,\" give details as described in the preceding question.:</b></td><td>'.$Are_you_presently_cf5_3.'</td></tr>';
$body.='<tr><td><b>6.Are you obligated to pay alimony, child support, or separate maintenance?:</b></td><td>'.$Are_you_obligated_cf5_3.'</td></tr>';
$body.='<tr><td><b>7.Is any part of the down payment borrowed?:</b></td><td>'.$Is_any_part_cf5_3.'</td></tr>';
$body.='<tr><td><b>8. Are you a co-maker or endorser on a note?:</b></td><td>'.$Are_you_a_co_maker_cf5_3.'</td></tr>';
$body.='<tr><td><b>9. Are you a U. S. citizen?:</b></td><td>'.$Are_you_a_U_S_citizen_cf5_3.'</td></tr>';
$body.='<tr><td><b>10. Are you a permanent resident alien?:</b></td><td>'.$Are_you_a_permanent_cf5_3.'</td></tr>';
$body.='<tr><td><b>11.Do you intend to occupy the property as your primary residence? If \"Yes,\" complete question 13 below.:</b></td><td>'.$Do_you_intend_cf5_3.'</td></tr>';
$body.='<tr><td><b>12.Have you had an ownership interest in a property in the last three years?:</b></td><td>'.$Have_you_had_cf5_3.'</td></tr>';

$body.='<tr><td colspan="2">&nbsp;</td></tr>';

$body.='<tr><td><b>(a) What type of property did you own?:</b></td><td>'.$What_type_of_property_cf5_1.'</td></tr>';
$body.='<tr><td><b>(b) How did you hold title to the home?:</b></td><td>'.$How_did_you_hold_cf5_1.'</td></tr>';


$body.='<tr><td><b>If you answered \"Yes\" to questions 2, 3, 5, or 6 please explain below:</b></td><td>'.$If_you_answered_cf5_1.'</td></tr>';

$body.='<tr><td><b>Ethnicity:</b></td><td>'.$Ethnicity_cf5_1.'</td></tr>';
$body.='<tr><td><b>Race:</b></td><td>'.$Race_cf5_1.'</td></tr>';
$body.='<tr><td><b>Gender:</b></td><td>'.$Gender_cf5_2.'</td></tr>';
$body.='<tr><td><b>Marital Status:</b></td><td>'.$Marital_Status_cf5_2.'</td></tr>';
$body.='<tr><td><b>How did you hear about us?:</b></td><td>'.$How_did_you_hear_about_us_cf5_2.'</td></tr>';


/*end form 5*/



$mail_explodes = explode(";", $mailto);
$to = $mail_explodes[0];
$from = 'Everyloan.com';
$fromemail = 'application@everyloan.com';
$subject = "% Step application request from Everyloan Financial Services";
$message =$mailbody."<p>Please see the attachment.</p>";


// a random hash will be necessary to send mixed content
$separator = md5(time());


// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
$a='<html><body><table border="1" width="650" align="center">
<tr><td align="center" colspan="2"><strong>% Step Application</strong></td></tr>'.$body.'</table></body></html>';


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
 echo '<div style="color:#FFFFFF; background:#3579A2; border:2px solid #BAD8E9; width:100%; margin-top:20px; margin-bottom:20px; text-align:center; font-weight:bold; font-style:italic; font-size:16px; padding-top:40px; padding-bottom:40px;">Your 5 Step Application Request Sent Successfully</div>
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
