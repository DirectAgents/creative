<?php
require(MORTGAGEAPPS_FDIR . 'html2pdf/html2fpdf.php');

$path = $_SERVER['HTTP_REFERER'];
if(!$mailto || $mailto=="") $mailto = get_mortgage_app_default_mailto("quick-application");

$type_of_loan=$_POST['menu-52'];
$length_of_loan=$_POST['menu-53'];
$how_soon_loan_need=$_POST['menu-54'];
$type_of_poperty=$_POST['menu-55'];
$poperty_state=$_POST['menu-56'];
$desired_loan_amt=$_POST['text-197'];
$estimated_value_poperty=$_POST['text-198'];
$rate_your_credit=$_POST['menu-57'];

$Amount_Owed_on_Mortgage=$_POST['text-199'];
$Current_Interest_Rate=$_POST['text-200'];
$Is_this_a_fixed_or_variable_rate_loan=$_POST['menu-58'];
$How_long_have_you_had_this_loan=$_POST['text-201'];
$What_is_your_current_monthly_payment=$_POST['text-2011'];
$Have_you_been_late_on_your_mortgage_or_rent=$_POST['menu-59'];

$First_Name=$_POST['text-202'];
$Middle_Name=$_POST['text-203'];
$Last_Name=$_POST['text-204'];
$Email_Address=$_POST['your-email'];
$Street_Address=$_POST['text-205'];
$City=$_POST['text-206'];
$State=$_POST['menu-60'];
$Zip=$_POST['text-207'];
$Day_Phone=$_POST['text-208'];
$Evening_Phone=$_POST['text-209'];


$What_is_your_Gross=$_POST['text-210'];
$How_long_have_you_been=$_POST['menu-61'];

$Co_Applicant_Name=$_POST['text-211'];
$Co_Applicant_Gross_Monthly_Income=$_POST['text-212'];
$Which_would_you_prefer=$_POST['menu-62'];
$Comments=$_POST['textarea-589'];
$How_did_you_hear_about_us=$_POST['text-213'];


global $wpdb;
$dbdata = array();
$dbdata["app_type"] = $_POST['menu-52'];
$dbdata["app_length"] = $_POST['menu-53'];
$dbdata["app_when"] = $_POST['menu-54'];
$dbdata["app_propertytype"] = $_POST['menu-55'];
$dbdata["app_propertystate"] = $_POST['menu-56'];
$dbdata["app_loanamount"] = $_POST['text-197'];
$dbdata["app_propertyvalue"] = $_POST['text-198'];
$dbdata["app_creditrate"] = $_POST['menu-57'];
$dbdata["app_mortgage_amount"] = $_POST['text-199'];
$dbdata["app_mortgage_interest"] = $_POST['text-200'];
$dbdata["app_mortgage_type"] = $_POST['menu-58'];
$dbdata["app_mortgage_duration"] = $_POST['text-201'];
$dbdata["app_mortgage_mpayment"] = $_POST['text-2011'];
$dbdata["app_mortgage_howlate"] = $_POST['menu-59'];
$dbdata["app_fname"] = $_POST['text-202'];
$dbdata["app_mname"] = $_POST['text-203'];
$dbdata["app_lname"] = $_POST['text-204'];
$dbdata["app_address"] = $_POST['text-205'];
$dbdata["app_state"] = $_POST['menu-60'];
$dbdata["app_city"] = $_POST['text-206'];
$dbdata["app_zipcode"] = $_POST['text-207'];
$dbdata["app_email"] = $_POST['your-email'];
$dbdata["app_dayphone"] = $_POST['text-208'];
$dbdata["app_eveningphone"] = $_POST['text-209'];
$dbdata["app_employment_grossincome"] = $_POST['text-210'];
$dbdata["app_employment_howlong"] = $_POST['menu-61'];
$dbdata["app_co_name"] = $_POST['text-211'];
$dbdata["app_co_grossincome"] = $_POST['text-212'];
$dbdata["app_prefered"] = $_POST['menu-62'];
$dbdata["app_comments"] = $_POST['textarea-589'];
$dbdata["app_heardfrom"] = $_POST['text-213'];
$dbdata["app_added"] = date("Y-m-d H:i:s");
addToDatabase($wpdb->mortgageapp_quickonline_tbl, $dbdata);


// email stuff (change data below)

$pdf=new HTML2FPDF();
$pdf->AddPage();
$mailbody='<table width="400" border="0" cellpadding="7" cellspacing="0"><tr><td colspan="2"><b>What Kind of Loan Is Applicant Looking For?</b></td></tr>';

$mailbody.='<tr><td><b>Type of Loan:</b></td><td>'.$type_of_loan.'</td></tr>';
$mailbody.='<tr><td><b>Length of loan desired?:</b></td><td>'.$length_of_loan.'</td></tr>';
$mailbody.='<tr><td><b>How soon do you need the loan?:*</b></td><td>'.$how_soon_loan_need.'</td></tr>';
$mailbody.='<tr><td><b>Type of Property:*</b></td><td>'.$type_of_poperty.'</td></tr>';
$mailbody.='<tr><td><b>State where the property is located:*</b></td><td>'.$poperty_state.'</td></tr>';
$mailbody.='<tr><td><b>Desired Loan Amount:($)*</b></td><td>'.$desired_loan_amt.'</td></tr>';
$mailbody.='<tr><td><b>Estimated Value of the Property:($)*</b></td><td>'.$estimated_value_poperty.'</td></tr>';
$mailbody.='<tr><td><b>Rate your Credit: *</b></td><td>'.$rate_your_credit.'</td></tr>';

$mailbody.='<tr><td colspan="2"><b>Current Loan Information</b></td></tr>';

$mailbody.='<tr><td><b>Amount Owed on Mortgage: ($)</b></td><td>'.$Amount_Owed_on_Mortgage.'</td></tr>';
$mailbody.='<tr><td><b>Current Interest Rate (%):</b></td><td>'.$Current_Interest_Rate.'</td></tr>';
$mailbody.='<tr><td><b>Is this a fixed or variable rate loan?</b></td><td>'.$Is_this_a_fixed_or_variable_rate_loan.'</td></tr>';
$mailbody.='<tr><td><b>How long have you had this loan?</b></td><td>'.$How_long_have_you_had_this_loan.'</td></tr>';
$mailbody.='<tr><td><b>What is your current monthly payment? ($)</b></td><td>'.$What_is_your_current_monthly_payment.'</td></tr>';
$mailbody.='<tr><td><b>Have you been late on your mortgage or rent? *</b></td><td>'.$Have_you_been_late_on_your_mortgage_or_rent.'</td></tr>';

$mailbody.='<tr><td colspan="2"><b>About Applicant</b></td></tr>';

$mailbody.='<tr><td><b>First Name:*</b></td><td>'.$First_Name.'</td></tr>';
$mailbody.='<tr><td><b>Middle Name:</b></td><td>'.$Middle_Name.'</td></tr>';
$mailbody.='<tr><td><b>Last Name:*</b></td><td>'.$Last_Name.'</td></tr>';
$mailbody.='<tr><td><b>Email Address:*</b></td><td>'.$Email_Address.'</td></tr>';
$mailbody.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$City.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State.'</td></tr>';
$mailbody.='<tr><td><b>Zip:</b></td><td>'.$Zip.'</td></tr>';
$mailbody.='<tr><td><b>Day Phone:*</b></td><td>'.$Day_Phone.'</td></tr>';
$mailbody.='<tr><td><b>Evening Phone:</b></td><td>'.$Evening_Phone.'</td></tr>';

$mailbody.='<tr><td colspan="2"><b>Employment Information</b></td></tr>';

$mailbody.='<tr><td><b>What is your Gross (Before Taxes) Monthly Income? ($)*</b></td><td>'.$What_is_your_Gross.'</td></tr>';
$mailbody.='<tr><td><b>How long have you been at your current job?*</b></td><td>'.$How_long_have_you_been.'</td></tr>';

$mailbody.='<tr><td colspan="2"><b>Miscellaneous Information</b></td></tr>';

$mailbody.='<tr><td><b>Co-Applicant Name:</b></td><td>'.$Co_Applicant_Name.'</td></tr>';
$mailbody.='<tr><td><b>Co-Applicant Gross(Before Taxes) Monthly Income:($)</b></td><td>'.$Co_Applicant_Gross_Monthly_Income.'</td></tr>';
$mailbody.='<tr><td><b>Which would you prefer:</b></td><td>'.$Which_would_you_prefer.'</td></tr>';
$mailbody.='<tr><td><b>Comments:</b></td><td>'.$Comments.'</td></tr>';
$mailbody.='<tr><td><b>How did you hear about us?</b></td><td>'.$How_did_you_hear_about_us.'</td></tr></table>';




$body.='<tr><td colspan="2"><b>What Kind of Loan Is Applicant Looking For?</b></td></tr>';

$body='<tr><td><b>Type of Loan:</b></td><td>'.$type_of_loan.'</td></tr>';
$body.='<tr><td><b>Length of loan desired?:</b></td><td>'.$length_of_loan.'</td></tr>';
$body.='<tr><td><b>How soon do you need the loan?:*</b></td><td>'.$how_soon_loan_need.'</td></tr>';
$body.='<tr><td><b>Type of Property:*</b></td><td>'.$type_of_poperty.'</td></tr>';
$body.='<tr><td><b>State where the property is located:*</b></td><td>'.$poperty_state.'</td></tr>';
$body.='<tr><td><b>Desired Loan Amount:($)*</b></td><td>'.$desired_loan_amt.'</td></tr>';
$body.='<tr><td><b>Estimated Value of the Property:($)*</b></td><td>'.$estimated_value_poperty.'</td></tr>';
$body.='<tr><td><b>Rate your Credit: *</b></td><td>'.$rate_your_credit.'</td></tr>';

$body.='<tr><td colspan="2"><b>Current Loan Information</b></td></tr>';

$body.='<tr><td><b>Amount Owed on Mortgage: ($)</b></td><td>'.$Amount_Owed_on_Mortgage.'</td></tr>';
$body.='<tr><td><b>Current Interest Rate (%):</b></td><td>'.$Current_Interest_Rate.'</td></tr>';
$body.='<tr><td><b>Is this a fixed or variable rate loan?</b></td><td>'.$Is_this_a_fixed_or_variable_rate_loan.'</td></tr>';
$body.='<tr><td><b>How long have you had this loan?</b></td><td>'.$How_long_have_you_had_this_loan.'</td></tr>';
$body.='<tr><td><b>What is your current monthly payment? ($)</b></td><td>'.$What_is_your_current_monthly_payment.'</td></tr>';
$body.='<tr><td><b>Have you been late on your mortgage or rent? *</b></td><td>'.$Have_you_been_late_on_your_mortgage_or_rent.'</td></tr>';

$body.='<tr><td colspan="2"><b>About Applicant</b></td></tr>';

$body.='<tr><td><b>First Name:*</b></td><td>'.$First_Name.'</td></tr>';
$body.='<tr><td><b>Middle Name:</b></td><td>'.$Middle_Name.'</td></tr>';
$body.='<tr><td><b>Last Name:*</b></td><td>'.$Last_Name.'</td></tr>';
$body.='<tr><td><b>Email Address:*</b></td><td>'.$Email_Address.'</td></tr>';
$body.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$City.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State.'</td></tr>';
$body.='<tr><td><b>Zip:</b></td><td>'.$Zip.'</td></tr>';
$body.='<tr><td><b>Day Phone:*</b></td><td>'.$Day_Phone.'</td></tr>';
$body.='<tr><td><b>Evening Phone:</b></td><td>'.$Evening_Phone.'</td></tr>';

$body.='<tr><td colspan="2"><b>Employment Information</b></td></tr>';

$body.='<tr><td><b>What is your Gross (Before Taxes) Monthly Income? ($)*</b></td><td>'.$What_is_your_Gross.'</td></tr>';
$body.='<tr><td><b>How long have you been at your current job?*</b></td><td>'.$How_long_have_you_been.'</td></tr>';

$body.='<tr><td colspan="2"><b>Miscellaneous Information</b></td></tr>';

$body.='<tr><td><b>Co-Applicant Name:</b></td><td>'.$Co_Applicant_Name.'</td></tr>';
$body.='<tr><td><b>Co-Applicant Gross(Before Taxes) Monthly Income:($)</b></td><td>'.$Co_Applicant_Gross_Monthly_Income.'</td></tr>';
$body.='<tr><td><b>Which would you prefer:</b></td><td>'.$Which_would_you_prefer.'</td></tr>';
$body.='<tr><td><b>Comments:</b></td><td>'.$Comments.'</td></tr>';
$body.='<tr><td><b>How did you hear about us?</b></td><td>'.$How_did_you_hear_about_us.'</td></tr>';




$mail_explodes = explode(";", $mailto);
$to = $mail_explodes[0];
$from = 'Everyloan.com';
$fromemail = 'application@everyloan.com';
$subject = "Quick Online Application request from Everyloan Financial Services";
$message =$mailbody."<p>Please see the attachment.</p>";


// a random hash will be necessary to send mixed content
$separator = md5(time());


// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
$a='<html><body><table border="1" width="650" align="center">
<tr><td align="center" colspan="2"><strong>Quick Online Application</strong></td></tr>'.$body.'</table></body></html>';


$pdf->WriteHTML($a);
$filename = "quickonlineapplication.pdf";
$pdfdoc=$pdf->Output("quickonlineapplication.pdf","S");
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
 echo '<div style="color:#FFFFFF; background:#3579A2; border:2px solid #BAD8E9; width:100%; margin-top:20px; margin-bottom:20px; text-align:center; font-weight:bold; font-style:italic; font-size:16px; padding-top:40px; padding-bottom:40px;">Your Quick Online Application Request Sent Successfully.</div>
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