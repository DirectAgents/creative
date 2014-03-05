<?php

global $wpdb;

//  upgrade function changed in WordPress 2.3
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

//  Charset
$charset_collate = '';

//  Table Names
$mortgageapp_commerialloan_tbl = $wpdb->prefix . 'mortgageapp_commercialloan';
$mortgageapp_loanmodification_tbl = $wpdb->prefix . 'mortgageapp_loanmodification';
$mortgageapp_loanstatus_tbl = $wpdb->prefix . 'mortgageapp_loanstatus';
$mortgageapp_online_tbl = $wpdb->prefix . 'mortgageapp_online';
$mortgageapp_quickonline_tbl = $wpdb->prefix . 'mortgageapp_quickonline';
$mortgageapp_reverse_tbl = $wpdb->prefix . 'mortgageapp_reverse';
$mortgageapp_step_tbl = $wpdb->prefix . 'mortgageapp_step';

//  Add Table Instances to $wpdb
$wpdb->mortgageapp_commercialloan_tbl = $mortgageapp_commerialloan_tbl;
$wpdb->mortgageapp_loanmodification_tbl = $mortgageapp_loanmodification_tbl;
$wpdb->mortgageapp_loanstatus_tbl = $mortgageapp_loanstatus_tbl;
$wpdb->mortgageapp_online_tbl = $mortgageapp_online_tbl;
$wpdb->mortgageapp_quickonline_tbl = $mortgageapp_quickonline_tbl;
$wpdb->mortgageapp_reverse_tbl = $mortgageapp_reverse_tbl;
$wpdb->mortgageapp_step_tbl = $mortgageapp_step_tbl;

//  Create Commercial Loan Table Query String
$create_commercialloan_table = "
    CREATE TABLE `{$wpdb->mortgageapp_commercialloan_tbl}` (
        `app_id` int not null auto_increment primary key,
        `app_type` varchar(200) not null default '',
        `app_fixed_term_rate` varchar(200) not null default '',
        `app_amortization` varchar(200) not null default '',
        `app_when` varchar(200) not null default '',
        `app_loanamount` varchar(200) not null default '',
        `app_propertytype` varchar(200) not null default '',
        `app_property_address` varchar(200) not null default '',
        `app_property_city` varchar(200) not null default '',
        `app_property_state` varchar(200) not null default '',
        `app_property_zipcode` varchar(200) not null default '',
        `app_fname` varchar(200) not null default '',
        `app_lname` varchar(200) not null default '',
        `app_address` varchar(200) not null default '',
        `app_state` varchar(200) not null default '',
        `app_city` varchar(200) not null default '',
        `app_zipcode` varchar(200) not null default '',
        `app_email` varchar(200) not null default '',
        `app_dayphone` varchar(200) not null default '',
        `app_eveningphone` varchar(200) not null default '',
        `app_business_name` varchar(200) not null default '',
        `app_business_phone` varchar(200) not null default '',
        `app_business_fax` varchar(200) not null default '',
        `app_business_address` varchar(200) not null default '',
        `app_business_city` varchar(200) not null default '',
        `app_business_zipcode` varchar(200) not null default '',
        `app_business_established` varchar(200) not null default '',
        `app_business_employees` varchar(200) not null default '',
        `app_business_state` varchar(200) not null default '',
        `app_business_type` varchar(200) not null default '',
        `app_business_owner1_name` varchar(200) not null default '',
        `app_business_owner1_title` varchar(200) not null default '',
        `app_business_owner1_shares` varchar(200) not null default '',
        `app_business_owner1_partnership` varchar(200) not null default '',
        `app_business_owner2_name` varchar(200) not null default '',
        `app_business_owner2_title` varchar(200) not null default '',
        `app_business_owner2_shares` varchar(200) not null default '',
        `app_business_owner2_partnership` varchar(200) not null default '',
        `app_business_owner3_name` varchar(200) not null default '',
        `app_business_owner3_title` varchar(200) not null default '',
        `app_business_owner3_shares` varchar(200) not null default '',
        `app_business_owner3_partnership` varchar(200) not null default '',
        `app_tradereference1_name` varchar(200) not null default '',
        `app_tradereference1_address` varchar(200) not null default '',
        `app_tradereference1_city` varchar(200) not null default '',
        `app_tradereference1_zipcode` varchar(200) not null default '',
        `app_tradereference1_phone` varchar(200) not null default '',
        `app_tradereference1_state` varchar(200) not null default '',
        `app_tradereference2_name` varchar(200) not null default '',
        `app_tradereference2_address` varchar(200) not null default '',
        `app_tradereference2_city` varchar(200) not null default '',
        `app_tradereference2_zipcode` varchar(200) not null default '',
        `app_tradereference2_phone` varchar(200) not null default '',
        `app_tradereference2_state` varchar(200) not null default '',
        `app_tradereference3_name` varchar(200) not null default '',
        `app_tradereference3_address` varchar(200) not null default '',
        `app_tradereference3_city` varchar(200) not null default '',
        `app_tradereference3_zipcode` varchar(200) not null default '',
        `app_tradereference3_phone` varchar(200) not null default '',
        `app_tradereference3_state` varchar(200) not null default '',
        `app_loan_purpose` text not null default '',
        `app_heardfrom` text not null default '',
        `app_added` datetime
    ) {$charset_collate};
";

//  Create Loan Modification Table Query String
$create_loanmodification_table = "
    CREATE TABLE `{$wpdb->mortgageapp_loanmodification_tbl}` (
        `app_id` int not null auto_increment primary key,
        `app_fname` varchar(200) not null default '',
        `app_lname` varchar(200) not null default '',
        `app_phone` varchar(200) not null default '',
        `app_phone2` varchar(200) not null default '',
        `app_email` varchar(200) not null default '',
        `app_address` varchar(200) not null default '',
        `app_city` varchar(200) not null default '',
        `app_state` varchar(200) not null default '',
        `app_zipcode` varchar(200) not null default '',
        `app_employment` varchar(200) not null default '',
        `app_lender` varchar(200) not null default '',
        `app_history` varchar(200) not null default '',
        `app_hardship` varchar(200) not null default '',
        `app_comments` text not null default '',
        `app_heardfrom` varchar(200) not null default '',
        `app_added` datetime
    ) {$charset_collate};
";

//  Create Loan Status Table Query String
$create_loanstatus_table = "
    CREATE TABLE `{$wpdb->mortgageapp_loanstatus_tbl}` (
        `app_id` int not null auto_increment primary key,
        `app_fname` varchar(200) not null default '',
        `app_lname` varchar(200) not null default '',
        `app_email` varchar(200) not null default '',
        `app_question` varchar(200) not null default '',
        `app_phone` varchar(200) not null default '',
        `app_comments` text not null default '',
        `app_added` datetime
    ) {$charset_collate};
";

//  Create Online Table Query String
$create_online_table = "
    CREATE TABLE `{$wpdb->mortgageapp_online_tbl}` (
        `app_id` int not null auto_increment primary key,
        `app_borrower` varchar(200) not null default '',
        `app_coborrower` varchar(200) not null default '',
        `app_type` varchar(200) not null default '',
        `app_purpose` varchar(200) not null default '',
        `app_residence` varchar(200) not null default '',
        `app_propertytype` varchar(200) not null default '',
        `app_units` varchar(200) not null default '',
        `app_duration` varchar(200) not null default '',
        `app_price` varchar(200) not null default '',
        `app_loanamount` varchar(200) not null default '',
        `app_fname` varchar(200) not null default '',
        `app_lname` varchar(200) not null default '',
        `app_phone` varchar(200) not null default '',
        `app_phone2` varchar(200) not null default '',
        `app_ssn` varchar(200) not null default '',
        `app_dependents` varchar(200) not null default '',
        `app_dob` varchar(200) not null default '',
        `app_dependentages` varchar(200) not null default '',
        `app_schooling` varchar(200) not null default '',
        `app_email` varchar(200) not null default '',
        `app_co_fname` varchar(200) not null default '',
        `app_co_lname` varchar(200) not null default '',
        `app_co_phone` varchar(200) not null default '',
        `app_co_phone2` varchar(200) not null default '',
        `app_co_ssn` varchar(200) not null default '',
        `app_co_dependents` varchar(200) not null default '',
        `app_co_dob` varchar(200) not null default '',
        `app_co_dependentages` varchar(200) not null default '',
        `app_co_schooling` varchar(200) not null default '',
        `app_co_email` varchar(200) not null default '',
        `app_co_address` varchar(200) not null default '',
        `app_co_city` varchar(200) not null default '',
        `app_co_state` varchar(200) not null default '',
        `app_co_zipcode` varchar(200) not null default '',
        `app_co_time` varchar(200) not null default '',
        `app_employment_name` varchar(200) not null default '',
        `app_employment_position` varchar(200) not null default '',
        `app_employment_years` varchar(200) not null default '',
        `app_employment_years2` varchar(200) not null default '',
        `app_employment_income` varchar(200) not null default '',
        `app_employment_co_name` varchar(200) not null default '',
        `app_employment_co_position` varchar(200) not null default '',
        `app_employment_co_years` varchar(200) not null default '',
        `app_employment_co_years2` varchar(200) not null default '',
        `app_employment_co_income` varchar(200) not null default '',
        `app_employment_income2` varchar(200) not null default '',
        `app_employment_co_income2` varchar(200) not null default '',
        `app_assets_actype` varchar(200) not null default '',
        `app_assets_amount` varchar(200) not null default '',
        `app_assets_finst1_name` varchar(200) not null default '',
        `app_assets_finst1_amount` varchar(200) not null default '',
        `app_assets_finst1_acnum` varchar(200) not null default '',
        `app_assets_finst2_name` varchar(200) not null default '',
        `app_assets_finst2_amount` varchar(200) not null default '',
        `app_assets_finst2_acnum` varchar(200) not null default '',
        `app_assets_stock1_name` varchar(200) not null default '',
        `app_assets_stock1_amount` varchar(200) not null default '',
        `app_assets_stock2_name` varchar(200) not null default '',
        `app_assets_stock2_amount` varchar(200) not null default '',
        `app_assets_stock3_name` varchar(200) not null default '',
        `app_assets_stock3_amount` varchar(200) not null default '',
        `app_assets_life_insurance` varchar(200) not null default '',
        `app_assets_face_amount` varchar(200) not null default '',
        `app_assets_automob1_type` varchar(200) not null default '',
        `app_assets_automob1_value` varchar(200) not null default '',
        `app_assets_automob2_type` varchar(200) not null default '',
        `app_assets_automob2_value` varchar(200) not null default '',
        `app_assets_automob3_type` varchar(200) not null default '',
        `app_assets_automob3_value` varchar(200) not null default '',
        `app_assets21_name` varchar(200) not null default '',
        `app_assets21_amount` varchar(200) not null default '',
        `app_assets22_name` varchar(200) not null default '',
        `app_assets22_amount` varchar(200) not null default '',
        `app_assets23_name` varchar(200) not null default '',
        `app_assets23_amount` varchar(200) not null default '',
        `app_expenses_mortgage` varchar(200) not null default '',
        `app_expenses_mortgage2` varchar(200) not null default '',
        `app_expenses_taxes` varchar(200) not null default '',
        `app_expenses_insurance` varchar(200) not null default '',
        `app_expenses_insurance2` varchar(200) not null default '',
        `app_expenses_rent` varchar(200) not null default '',
        `app_expenses_approx_mortgage` varchar(200) not null default '',
        `app_expenses_approx_mortgage2` varchar(200) not null default '',
        `app_expenses_max_credits` varchar(200) not null default '',
        `app_expenses_home_value` varchar(200) not null default '',
        `app_expenses_home_istobe` varchar(200) not null default '',
        `app_debts1_type` varchar(200) not null default '',
        `app_debts1_acnum` varchar(200) not null default '',
        `app_debts1_balance` varchar(200) not null default '',
        `app_debts1_payment` varchar(200) not null default '',
        `app_debts2_type` varchar(200) not null default '',
        `app_debts2_acnum` varchar(200) not null default '',
        `app_debts2_balance` varchar(200) not null default '',
        `app_debts2_payment` varchar(200) not null default '',
        `app_debts3_type` varchar(200) not null default '',
        `app_debts3_acnum` varchar(200) not null default '',
        `app_debts3_balance` varchar(200) not null default '',
        `app_debts3_payment` varchar(200) not null default '',
        `app_debts4_type` varchar(200) not null default '',
        `app_debts4_acnum` varchar(200) not null default '',
        `app_debts4_balance` varchar(200) not null default '',
        `app_debts4_payment` varchar(200) not null default '',
        `app_debts5_type` varchar(200) not null default '',
        `app_debts5_acnum` varchar(200) not null default '',
        `app_debts5_balance` varchar(200) not null default '',
        `app_debts5_payment` varchar(200) not null default '',
        `app_furnish` varchar(200) not null default '',
        `app_ethnicity` varchar(200) not null default '',
        `app_race` varchar(200) not null default '',
        `app_gender` varchar(200) not null default '',
        `app_marital` varchar(200) not null default '',
        `app_projected_closing` varchar(200) not null default '',
        `app_projected_around` varchar(200) not null default '',
        `app_projected_contact` varchar(200) not null default '',
        `app_comments` text not null default '',
        `app_heardfrom` varchar(200) not null default '',
        `app_agree` varchar(200) not null default '',
        `app_co_agree` varchar(200) not null default '',
        `app_added` datetime
    ) {$charset_collate};
";

//  Create Quick Online Table Query String
$create_quickonline_table = "
    CREATE TABLE `{$wpdb->mortgageapp_quickonline_tbl}` (
        `app_id` int not null auto_increment primary key,
        `app_type` varchar(200) not null default '',
        `app_length` varchar(200) not null default '',
        `app_when` varchar(200) not null default '',
        `app_propertytype` varchar(200) not null default '',
        `app_propertystate` varchar(200) not null default '',
        `app_loanamount` varchar(200) not null default '',
        `app_propertyvalue` varchar(200) not null default '',
        `app_creditrate` varchar(200) not null default '',
        `app_mortgage_amount` varchar(200) not null default '',
        `app_mortgage_interest` varchar(200) not null default '',
        `app_mortgage_type` varchar(200) not null default '',
        `app_mortgage_duration` varchar(200) not null default '',
        `app_mortgage_mpayment` varchar(200) not null default '',
        `app_mortgage_howlate` varchar(200) not null default '',
        `app_fname` varchar(200) not null default '',
        `app_mname` varchar(200) not null default '',
        `app_lname` varchar(200) not null default '',
        `app_address` varchar(200) not null default '',
        `app_state` varchar(200) not null default '',
        `app_city` varchar(200) not null default '',
        `app_zipcode` varchar(200) not null default '',
        `app_email` varchar(200) not null default '',
        `app_dayphone` varchar(200) not null default '',
        `app_eveningphone` varchar(200) not null default '',
        `app_employment_grossincome` varchar(200) not null default '',
        `app_employment_howlong` varchar(200) not null default '',
        `app_co_name` varchar(200) not null default '',
        `app_co_grossincome` varchar(200) not null default '',
        `app_prefered` varchar(200) not null default '',
        `app_comments` text not null default '',
        `app_heardfrom` varchar(200) not null default '',
        `app_added` datetime
    ) {$charset_collate};
";

//  Create Reverse Table Query String
$create_reverse_table = "
    CREATE TABLE `{$wpdb->mortgageapp_reverse_tbl}` (
        `app_id` int not null auto_increment primary key,
        `app_fname` varchar(200) not null default '',
        `app_lname` varchar(200) not null default '',
        `app_ssn` varchar(200) not null default '',
        `app_dob` varchar(200) not null default '',
        `app_marital` varchar(200) not null default '',
        `app_years` varchar(200) not null default '',
        `app_email` varchar(200) not null default '',
        `app_income` varchar(200) not null default '',
        `app_assets` varchar(200) not null default '',
        `app_assets2` varchar(200) not null default '',
        `app_alternate_contact` text not null default '',
        `app_address` varchar(200) not null default '',
        `app_city` varchar(200) not null default '',
        `app_state` varchar(200) not null default '',
        `app_zipcode` varchar(200) not null default '',
        `app_phone` varchar(200) not null default '',
        `app_co_fname` varchar(200) not null default '',
        `app_co_lname` varchar(200) not null default '',
        `app_co_ssn` varchar(200) not null default '',
        `app_co_dob` varchar(200) not null default '',
        `app_co_marital` varchar(200) not null default '',
        `app_co_years` varchar(200) not null default '',
        `app_co_email` varchar(200) not null default '',
        `app_co_income` varchar(200) not null default '',
        `app_co_assets` varchar(200) not null default '',
        `app_co_assets2` varchar(200) not null default '',
        `app_co_alternate_contact` text not null default '',
        `app_co_address` varchar(200) not null default '',
        `app_co_city` varchar(200) not null default '',
        `app_co_state` varchar(200) not null default '',
        `app_co_zipcode` varchar(200) not null default '',
        `app_co_phone` varchar(200) not null default '',
        `app_appliedfor` varchar(200) not null default '',
        `app_special` varchar(200) not null default '',
        `app_amorttype` varchar(200) not null default '',
        `app_payplan` varchar(200) not null default '',
        `app_caseno` varchar(200) not null default '',
        `app_armtype` varchar(200) not null default '',
        `app_property_address` varchar(200) not null default '',
        `app_property_state` varchar(200) not null default '',
        `app_property_city` varchar(200) not null default '',
        `app_property_zipcode` varchar(200) not null default '',
        `app_property_legaldesc` text not null default '',
        `app_property_title` text not null default '',
        `app_property_units` varchar(200) not null default '',
        `app_property_appraised` varchar(200) not null default '',
        `app_property_year` varchar(200) not null default '',
        `app_property_type` varchar(200) not null default '',
        `app_property_title2` varchar(200) not null default '',
        `app_property_trust` varchar(200) not null default '',
        `app_leins1_name` varchar(200) not null default '',
        `app_leins1_state` varchar(200) not null default '',
        `app_leins1_address` varchar(200) not null default '',
        `app_leins1_balance` varchar(200) not null default '',
        `app_leins1_acnum` varchar(200) not null default '',
        `app_leins1_city` varchar(200) not null default '',
        `app_leins1_zipcode` varchar(200) not null default '',
        `app_leins2_name` varchar(200) not null default '',
        `app_leins2_state` varchar(200) not null default '',
        `app_leins2_address` varchar(200) not null default '',
        `app_leins2_balance` varchar(200) not null default '',
        `app_leins2_acnum` varchar(200) not null default '',
        `app_leins2_city` varchar(200) not null default '',
        `app_leins2_zipcode` varchar(200) not null default '',
        `app_leins3_name` varchar(200) not null default '',
        `app_leins3_state` varchar(200) not null default '',
        `app_leins3_address` varchar(200) not null default '',
        `app_leins3_balance` varchar(200) not null default '',
        `app_leins3_acnum` varchar(200) not null default '',
        `app_leins3_city` varchar(200) not null default '',
        `app_leins3_zipcode` varchar(200) not null default '',
        `app_nonestate_amount` varchar(200) not null default '',
        `app_declarations` varchar(200) not null default '',
        `app_co_declarations` varchar(200) not null default '',
        `app_backruptcy` varchar(200) not null default '',
        `app_co_backruptcy` varchar(200) not null default '',
        `app_lawsuit` varchar(200) not null default '',
        `app_co_lawsuit` varchar(200) not null default '',
        `app_debt` varchar(200) not null default '',
        `app_co_debt` varchar(200) not null default '',
        `app_residence` varchar(200) not null default '',
        `app_co_residence` varchar(200) not null default '',
        `app_endorser` varchar(200) not null default '',
        `app_co_endorser` varchar(200) not null default '',
        `app_citizen` varchar(200) not null default '',
        `app_co_citizen` varchar(200) not null default '',
        `app_alien` varchar(200) not null default '',
        `app_co_alien` varchar(200) not null default '',
        `app_heardfrom` varchar(200) not null default '',
        `app_furnish` varchar(200) not null default '',
        `app_ethnicity` varchar(200) not null default '',
        `app_race` varchar(200) not null default '',
        `app_gender` varchar(200) not null default '',
        `app_co_furnish` varchar(200) not null default '',
        `app_co_ethnicity` varchar(200) not null default '',
        `app_co_race` varchar(200) not null default '',
        `app_co_gender` varchar(200) not null default '',
        `app_agree` varchar(200) not null default '',
        `app_added` datetime
    ) {$charset_collate};
";

//  Create Step Table Query String
$create_step_table = "
    CREATE TABLE `{$wpdb->mortgageapp_step_tbl}` (
        `app_id` int not null auto_increment primary key,
        `app_borrower` varchar(200) not null default '',
        `app_co_borrower` varchar(200) not null default '',
        `app_type` varchar(200) not null default '',
        `app_purpose` varchar(200) not null default '',
        `app_residencetype` varchar(200) not null default '',
        `app_propertytype` varchar(200) not null default '',
        `app_term` varchar(200) not null default '',
        `app_units` varchar(200) not null default '',
        `app_amount` varchar(200) not null default '',
        `app_amorttype` varchar(200) not null default '',
        `app_interest` varchar(200) not null default '',
        `app_sales` varchar(200) not null default '',
        `app_property_address` varchar(200) not null default '',
        `app_property_city` varchar(200) not null default '',
        `app_property_state` varchar(200) not null default '',
        `app_property_zipcode` varchar(200) not null default '',
        `app_fname` varchar(200) not null default '',
        `app_lname` varchar(200) not null default '',
        `app_address` varchar(200) not null default '',
        `app_city` varchar(200) not null default '',
        `app_state` varchar(200) not null default '',
        `app_zipcode` varchar(200) not null default '',
        `app_phone` varchar(200) not null default '',
        `app_phone2` varchar(200) not null default '',
        `app_email` varchar(200) not null default '',
        `app_ssn` varchar(200) not null default '',
        `app_own` varchar(200) not null default '',
        `app_years` varchar(200) not null default '',
        `app_dob` varchar(200) not null default '',
        `app_years2` varchar(200) not null default '',
        `app_dependentsno` varchar(200) not null default '',
        `app_mail_address` varchar(200) not null default '',
        `app_mail_city` varchar(200) not null default '',
        `app_mail_state` varchar(200) not null default '',
        `app_mail_zipcode` varchar(200) not null default '',
        `app_co_fname` varchar(200) not null default '',
        `app_co_lname` varchar(200) not null default '',
        `app_co_address` varchar(200) not null default '',
        `app_co_city` varchar(200) not null default '',
        `app_co_state` varchar(200) not null default '',
        `app_co_zipcode` varchar(200) not null default '',
        `app_co_phone` varchar(200) not null default '',
        `app_co_phone2` varchar(200) not null default '',
        `app_co_email` varchar(200) not null default '',
        `app_co_ssn` varchar(200) not null default '',
        `app_co_own` varchar(200) not null default '',
        `app_co_years` varchar(200) not null default '',
        `app_co_dob` varchar(200) not null default '',
        `app_co_years2` varchar(200) not null default '',
        `app_co_dependentsno` varchar(200) not null default '',
        `app_agree` varchar(200) not null default '',
        `app_co_agree` varchar(200) not null default '',
        `app_employer_name` varchar(200) not null default '',
        `app_employer_position` varchar(200) not null default '',
        `app_employer_address` varchar(200) not null default '',
        `app_employer_employed` varchar(200) not null default '',
        `app_employer_years` varchar(200) not null default '',
        `app_employer_city` varchar(200) not null default '',
        `app_employer_state` varchar(200) not null default '',
        `app_employer_zipcode` varchar(200) not null default '',
        `app_employer_years2` varchar(200) not null default '',
        `app_employer_income` varchar(200) not null default '',
        `app_employer_income2_source` varchar(200) not null default '',
        `app_employer_income2` varchar(200) not null default '',
        `app_jointly` varchar(200) not null default '',
        `app_assets_cashdept` varchar(200) not null default '',
        `app_assets_cashdept_amount` varchar(200) not null default '',
        `app_assets_financial1_name` varchar(200) not null default '',
        `app_assets_financial1_acnum` varchar(200) not null default '',
        `app_assets_financial1_actype` varchar(200) not null default '',
        `app_assets_financial1_amount` varchar(200) not null default '',
        `app_assets_financial2_name` varchar(200) not null default '',
        `app_assets_financial2_acnum` varchar(200) not null default '',
        `app_assets_financial2_actype` varchar(200) not null default '',
        `app_assets_financial2_amount` varchar(200) not null default '',
        `app_assets_financial3_name` varchar(200) not null default '',
        `app_assets_financial3_acnum` varchar(200) not null default '',
        `app_assets_financial3_actype` varchar(200) not null default '',
        `app_assets_financial3_amount` varchar(200) not null default '',
        `app_assets_retirement_name` varchar(200) not null default '',
        `app_assets_retirement_acnum` varchar(200) not null default '',
        `app_assets_retirement_amount` varchar(200) not null default '',
        `app_assets_insurance_name` varchar(200) not null default '',
        `app_assets_insurance_amount` varchar(200) not null default '',
        `app_assets_estate_name` varchar(200) not null default '',
        `app_assets_estate_amount` varchar(200) not null default '',
        `app_assets_business_name` varchar(200) not null default '',
        `app_assets_business_amount` varchar(200) not null default '',
        `app_automobile1_year` varchar(200) not null default '',
        `app_automobile1_make` varchar(200) not null default '',
        `app_automobile1_amount` varchar(200) not null default '',
        `app_automobile2_year` varchar(200) not null default '',
        `app_automobile2_make` varchar(200) not null default '',
        `app_automobile2_amount` varchar(200) not null default '',
        `app_automobile3_year` varchar(200) not null default '',
        `app_automobile3_make` varchar(200) not null default '',
        `app_automobile3_amount` varchar(200) not null default '',
        `app_assets21_name` varchar(200) not null default '',
        `app_assets21_amount` varchar(200) not null default '',
        `app_assets22_name` varchar(200) not null default '',
        `app_assets22_amount` varchar(200) not null default '',
        `app_assets23_name` varchar(200) not null default '',
        `app_assets23_amount` varchar(200) not null default '',
        `app_assets24_name` varchar(200) not null default '',
        `app_assets24_amount` varchar(200) not null default '',
        `app_liabilities_rent` varchar(200) not null default '',
        `app_liabilities_mortgage1` varchar(200) not null default '',
        `app_liabilities_mortgage2` varchar(200) not null default '',
        `app_liabilities_homeowners` varchar(200) not null default '',
        `app_liabilities_realstate` varchar(200) not null default '',
        `app_liabilities_mortgageins` varchar(200) not null default '',
        `app_liabilities_homeownersdues` varchar(200) not null default '',
        `app_liabilities_mortgage_bal` varchar(200) not null default '',
        `app_liabilities_mortgage_bal2` varchar(200) not null default '',
        `app_liability1_type` varchar(200) not null default '',
        `app_liability1_company` varchar(200) not null default '',
        `app_liability1_acnum` varchar(200) not null default '',
        `app_liability1_balance` varchar(200) not null default '',
        `app_liability1_payment` varchar(200) not null default '',
        `app_liability2_type` varchar(200) not null default '',
        `app_liability2_company` varchar(200) not null default '',
        `app_liability2_acnum` varchar(200) not null default '',
        `app_liability2_balance` varchar(200) not null default '',
        `app_liability2_payment` varchar(200) not null default '',
        `app_liability3_type` varchar(200) not null default '',
        `app_liability3_company` varchar(200) not null default '',
        `app_liability3_acnum` varchar(200) not null default '',
        `app_liability3_balance` varchar(200) not null default '',
        `app_liability3_payment` varchar(200) not null default '',
        `app_liability4_type` varchar(200) not null default '',
        `app_liability4_company` varchar(200) not null default '',
        `app_liability4_acnum` varchar(200) not null default '',
        `app_liability4_balance` varchar(200) not null default '',
        `app_liability4_payment` varchar(200) not null default '',
        `app_liability5_type` varchar(200) not null default '',
        `app_liability5_company` varchar(200) not null default '',
        `app_liability5_acnum` varchar(200) not null default '',
        `app_liability5_balance` varchar(200) not null default '',
        `app_liability5_payment` varchar(200) not null default '',
        `app_liability6_type` varchar(200) not null default '',
        `app_liability6_company` varchar(200) not null default '',
        `app_liability6_acnum` varchar(200) not null default '',
        `app_liability6_balance` varchar(200) not null default '',
        `app_liability6_payment` varchar(200) not null default '',
        `app_realestate1_address` varchar(200) not null default '',
        `app_realestate1_city` varchar(200) not null default '',
        `app_realestate1_state` varchar(200) not null default '',
        `app_realestate1_zipcode` varchar(200) not null default '',
        `app_realestate1_status` varchar(200) not null default '',
        `app_realestate1_type` varchar(200) not null default '',
        `app_realestate1_value` varchar(200) not null default '',
        `app_realestate1_mortgage` varchar(200) not null default '',
        `app_realestate1_rental` varchar(200) not null default '',
        `app_realestate1_payment` varchar(200) not null default '',
        `app_realestate1_misc` varchar(200) not null default '',
        `app_realestate1_netrental` varchar(200) not null default '',
        `app_realestate2_address` varchar(200) not null default '',
        `app_realestate2_city` varchar(200) not null default '',
        `app_realestate2_state` varchar(200) not null default '',
        `app_realestate2_zipcode` varchar(200) not null default '',
        `app_realestate2_status` varchar(200) not null default '',
        `app_realestate2_type` varchar(200) not null default '',
        `app_realestate2_value` varchar(200) not null default '',
        `app_realestate2_mortgage` varchar(200) not null default '',
        `app_realestate2_rental` varchar(200) not null default '',
        `app_realestate2_payment` varchar(200) not null default '',
        `app_realestate2_misc` varchar(200) not null default '',
        `app_realestate2_netrental` varchar(200) not null default '',
        `app_realestate3_address` varchar(200) not null default '',
        `app_realestate3_city` varchar(200) not null default '',
        `app_realestate3_state` varchar(200) not null default '',
        `app_realestate3_zipcode` varchar(200) not null default '',
        `app_realestate3_status` varchar(200) not null default '',
        `app_realestate3_type` varchar(200) not null default '',
        `app_realestate3_value` varchar(200) not null default '',
        `app_realestate3_mortgage` varchar(200) not null default '',
        `app_realestate3_rental` varchar(200) not null default '',
        `app_realestate3_payment` varchar(200) not null default '',
        `app_realestate3_misc` varchar(200) not null default '',
        `app_realestate3_netrental` varchar(200) not null default '',
        `app_alternate1_fname` varchar(200) not null default '',
        `app_alternate1_mname` varchar(200) not null default '',
        `app_alternate1_lname` varchar(200) not null default '',
        `app_alternate1_creditor` varchar(200) not null default '',
        `app_alternate1_acnum` varchar(200) not null default '',
        `app_alternate2_fname` varchar(200) not null default '',
        `app_alternate2_mname` varchar(200) not null default '',
        `app_alternate2_lname` varchar(200) not null default '',
        `app_alternate2_creditor` varchar(200) not null default '',
        `app_alternate2_acnum` varchar(200) not null default '',
        `app_alternate3_fname` varchar(200) not null default '',
        `app_alternate3_mname` varchar(200) not null default '',
        `app_alternate3_lname` varchar(200) not null default '',
        `app_alternate3_creditor` varchar(200) not null default '',
        `app_alternate3_acnum` varchar(200) not null default '',
        `app_outstanding_judgements` varchar(200) not null default '',
        `app_declared_backrupt` varchar(200) not null default '',
        `app_lawsuit` varchar(200) not null default '',
        `app_foreclosure` varchar(200) not null default '',
        `app_federal_debt` varchar(200) not null default '',
        `app_obligated` varchar(200) not null default '',
        `app_payment_borrowed` varchar(200) not null default '',
        `app_endorser` varchar(200) not null default '',
        `app_uscitizen` varchar(200) not null default '',
        `app_permanent_resident` varchar(200) not null default '',
        `app_occupy_property` varchar(200) not null default '',
        `app_ownersip_interest` varchar(200) not null default '',
        `app_owned_propertytype` varchar(200) not null default '',
        `app_holded_hometitle` varchar(200) not null default '',
        `app_explain` text not null default '',
        `app_furnish` varchar(200) not null default '',
        `app_ethnicity` varchar(200) not null default '',
        `app_race` varchar(200) not null default '',
        `app_gender` varchar(200) not null default '',
        `app_marital` varchar(200) not null default '',
        `app_heardfrom` varchar(200) not null default '',
        `app_added` datetime
    ) {$charset_collate};
";

//  Run Table Create Queries
if(!$wpdb->get_var("SHOW TABLES LIKE '{$wpdb->mortgageapp_commercialloan_tbl}'")) {
    dbDelta($create_commercialloan_table);
}
if(!$wpdb->get_var("SHOW TABLES LIKE '{$wpdb->mortgageapp_loanmodification_tbl}'")) {
    dbDelta($create_loanmodification_table);
}
if(!$wpdb->get_var("SHOW TABLES LIKE '{$wpdb->mortgageapp_loanstatus_tbl}'")) {
    dbDelta($create_loanstatus_table);
}
if(!$wpdb->get_var("SHOW TABLES LIKE '{$wpdb->mortgageapp_online_tbl}'")) {
    dbDelta($create_online_table);
}
if(!$wpdb->get_var("SHOW TABLES LIKE '{$wpdb->mortgageapp_quickonline_tbl}'")) {
    dbDelta($create_quickonline_table);
}
if(!$wpdb->get_var("SHOW TABLES LIKE '{$wpdb->mortgageapp_reverse_tbl}'")) {
    dbDelta($create_reverse_table);
}
if(!$wpdb->get_var("SHOW TABLES LIKE '{$wpdb->mortgageapp_step_tbl}'")) {
    dbDelta($create_step_table);
}

if(!function_exists("addToDatabase")) {
    function addToDatabase($table, $data=array(), $where='') {
        global $wpdb;
        $action = "insert";
        if($where!='')  $action = "update";

        $query = "{$action} ";
        if($action=="insert")   $query .= "into ";
        $query .= $table . " ";
        if($action=="update")   $query .= "set ";
        if($action=="insert") {
            $keys = array_keys($data);
            $query .= "(`" . implode('`, `', $keys) . "`) ";
        }
        if($action=="update") {
            $values = "";
            foreach($data as $key=>$value) {
                $values .= "`{$key}`='{$value}', ";
            }
            $query .= trim($values, ", ") . " ";
        }
        if($action=="insert") {
            $query .= "values ";
            $values = array_values($data);
            $query .= "('" . implode('\', \'', $values) . "')";
        }
        if($action=="update")   $query .= $where;

        if(sizeof($data)>0) {
            $wpdb->query($query);
            return true;
        }
        return false;
    }
}

?>