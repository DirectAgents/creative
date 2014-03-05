<?php
require(MORTGAGEAPPS_FDIR . 'html2pdf/html2fpdf.php');

$path = $_SERVER['HTTP_REFERER'];
if(!$mailto || $mailto=="") $mailto = get_mortgage_app_default_mailto("commercial-loan");

$type_of_loan=$_POST['menu-1'];
$requested_fixed_rate_term=$_POST['menu-2'];
$Requested_Amortization=$_POST['menu-3'];
$When_do_you_need_the_loan=$_POST['menu-4'];
$desired_loan_amount=$_POST['text-1'];
$What_type_of_property=$_POST['menu-5'];
$Address=$_POST['text-2'];
$city_loan=$_POST['text-3'];
$state_loan=$_POST['menu-6'];
$Zip_loan=$_POST['text-4'];


$first_name=$_POST['text-5'];
$last_name=$_POST['text-6'];
$Street_Address=$_POST['text-7'];
$City_personal=$_POST['text-8'];
$zip_personal=$_POST['text-9'];
$email=$_POST['email-158'];
$state_personal=$_POST['menu-7'];
$Day_Phone=$_POST['text-10'];
$Evening_Phone=$_POST['text-11'];


$Full_Name_of_Business=$_POST['text-12'];
$Telephone=$_POST['text-13'];
$Fax=$_POST['text-14'];
$Street_Address_business=$_POST['text-15'];
$City_business=$_POST['text-16'];
$Zip_business=$_POST['text-17'];
$Year_Established=$_POST['text-18'];
$Number_of_Employees=$_POST['text-19'];
$state_business=$_POST['menu-8'];
$Kind_of_Business =$_POST['menu-9'];


$Owner1=$_POST['text-37'];
$Title1=$_POST['text-38'];
$Shares_Owned1=$_POST['text-39'];
$Partnership1=$_POST['text-40'];
$Owner2=$_POST['text-41'];
$Title2=$_POST['text-42'];
$Shares_Owned2=$_POST['text-43'];
$Partnership2=$_POST['text-44'];
$Owner3=$_POST['text-45'];
$Title3=$_POST['text-46'];
$Shares_Owned3=$_POST['text-47'];
$Partnership3=$_POST['text-48'];


$trade_Name1=$_POST['text-20'];
$trade_Address1=$_POST['text-21'];
$trade_City1=$_POST['text-22'];
$trade_Zip1=$_POST['text-23'];
$trade_Telephone1=$_POST['text-24'];
$trade_State1=$_POST['menu-10'];

$trade_Name2=$_POST['text-25'];
$trade_Address2=$_POST['text-26'];
$trade_City2=$_POST['text-27'];
$trade_Zip2=$_POST['text-28'];
$trade_Telephone2=$_POST['text-29'];
$trade_State2 =$_POST['menu-11'];

$trade_Name3=$_POST['text-30'];
$trade_Address3=$_POST['text-31'];
$trade_City3=$_POST['text-32'];
$trade_Zip3=$_POST['text-33'];
$trade_Telephone3=$_POST['text-34'];
$trade_State3=$_POST['menu-12'];


$Please_describe_the_purpose_of_your_loan=$_POST['textarea-168'];
$How_did_you_hear_about_us=$_POST['text-36'];


global $wpdb;
$dbdata = array();
$dbdata["app_type"] = $_POST['menu-1'];
$dbdata["app_fixed_term_rate"] = $_POST['menu-2'];
$dbdata["app_amortization"] = $_POST['menu-3'];
$dbdata["app_when"] = $_POST['menu-4'];
$dbdata["app_loanamount"] = $_POST['text-1'];
$dbdata["app_propertytype"] = $_POST['menu-5'];
$dbdata["app_property_address"] = $_POST['text-2'];
$dbdata["app_property_city"] = $_POST['text-3'];
$dbdata["app_property_state"] = $_POST['menu-6'];
$dbdata["app_property_zipcode"] = $_POST['text-4'];
$dbdata["app_fname"] = $_POST['text-5'];
$dbdata["app_lname"] = $_POST['text-6'];
$dbdata["app_address"] = $_POST['text-7'];
$dbdata["app_city"] = $_POST['text-8'];
$dbdata["app_zipcode"] = $_POST['text-9'];
$dbdata["app_email"] = $_POST['email-158'];
$dbdata["app_state"] = $_POST['menu-7'];
$dbdata["app_dayphone"] = $_POST['text-10'];
$dbdata["app_eveningphone"] = $_POST['text-11'];
$dbdata["app_business_name"] = $_POST['text-12'];
$dbdata["app_business_phone"] = $_POST['text-13'];
$dbdata["app_business_fax"] = $_POST['text-14'];
$dbdata["app_business_address"] = $_POST['text-15'];
$dbdata["app_business_city"] = $_POST['text-16'];
$dbdata["app_business_zipcode"] = $_POST['text-17'];
$dbdata["app_business_established"] = $_POST['text-18'];
$dbdata["app_business_employees"] = $_POST['text-19'];
$dbdata["app_business_state"] = $_POST['menu-8'];
$dbdata["app_business_type"] = $_POST['menu-9'];
$dbdata["app_business_owner1_name"] = $_POST['text-37'];
$dbdata["app_business_owner1_title"] = $_POST['text-38'];
$dbdata["app_business_owner1_shares"] = $_POST['text-39'];
$dbdata["app_business_owner1_partnership"] = $_POST['text-40'];
$dbdata["app_business_owner2_name"] = $_POST['text-41'];
$dbdata["app_business_owner2_title"] = $_POST['text-42'];
$dbdata["app_business_owner2_shares"] = $_POST['text-43'];
$dbdata["app_business_owner2_partnership"] = $_POST['text-44'];
$dbdata["app_business_owner3_name"] = $_POST['text-45'];
$dbdata["app_business_owner3_title"] = $_POST['text-46'];
$dbdata["app_business_owner3_shares"] = $_POST['text-47'];
$dbdata["app_business_owner3_partnership"] = $_POST['text-48'];
$dbdata["app_tradereference1_name"] = $_POST['text-20'];
$dbdata["app_tradereference1_address"] = $_POST['text-21'];
$dbdata["app_tradereference1_city"] = $_POST['text-22'];
$dbdata["app_tradereference1_zipcode"] = $_POST['text-23'];
$dbdata["app_tradereference1_phone"] = $_POST['text-24'];
$dbdata["app_tradereference1_state"] = $_POST['menu-10'];
$dbdata["app_tradereference2_name"] = $_POST['text-25'];
$dbdata["app_tradereference2_address"] = $_POST['text-26'];
$dbdata["app_tradereference2_city"] = $_POST['text-27'];
$dbdata["app_tradereference2_zipcode"] = $_POST['text-28'];
$dbdata["app_tradereference2_phone"] = $_POST['text-29'];
$dbdata["app_tradereference2_state"] = $_POST['menu-11'];
$dbdata["app_tradereference3_name"] = $_POST['text-30'];
$dbdata["app_tradereference3_address"] = $_POST['text-31'];
$dbdata["app_tradereference3_city"] = $_POST['text-32'];
$dbdata["app_tradereference3_zipcode"] = $_POST['text-33'];
$dbdata["app_tradereference3_phone"] = $_POST['text-34'];
$dbdata["app_tradereference3_state"] = $_POST['menu-12'];
$dbdata["app_loan_purpose"] = $_POST['textarea-168'];
$dbdata["app_heardfrom"] = $_POST['text-36'];
$dbdata["app_added"] = date("Y-m-d H:i:s");
addToDatabase($wpdb->mortgageapp_commercialloan_tbl, $dbdata);


// email stuff (change data below)

$pdf=new HTML2FPDF();
$pdf->AddPage();
$mailbody='<table width="400" border="0" cellpadding="7" cellspacing="0"><tr><td colspan="2" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Loan/Property Information</b></td></tr>';
$mailbody.='<tr><td><b>Type of Loan:</b></td><td>'.$type_of_loan.'</td></tr>';
$mailbody.='<tr><td><b>Requested Fixed Rate Term:</b></td><td>'.$requested_fixed_rate_term.'</td></tr>';
$mailbody.='<tr><td><b>Requested Amortization:</b></td><td>'.$Requested_Amortization.'</td></tr>';
$mailbody.='<tr><td><b>When do you need the loan?:</b></td><td>'.$When_do_you_need_the_loan.'</td></tr>';
$mailbody.='<tr><td><b>Desired Loan Amount:($)</b></td><td>'.$desired_loan_amount.'</td></tr>';
$mailbody.='<tr><td><b>What type of property?:</b></td><td>'.$What_type_of_property.'</td></tr>';
$mailbody.='<tr><td><b>Address:</b></td><td>'.$Address.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$city_loan.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$state_loan.'</td></tr>';
$mailbody.='<tr><td><b>Zip:</b></td><td>'.$Zip_loan.'</td></tr>';
$mailbody.='<tr><td style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;" colspan="2"><b>Contact Information</b></td></tr>';
$mailbody.='<tr><td><b>First Name:</b></td><td>'.$first_name.'</td></tr>';
$mailbody.='<tr><td><b>Last Name:</b></td><td>'.$last_name.'</td></tr>';
$mailbody.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$City_personal.'</td></tr>';
$mailbody.='<tr><td><b>Zip:</b></td><td>'.$zip_personal.'</td></tr>';
$mailbody.='<tr><td><b>Email Address:</b></td><td>'.$email.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$state_personal.'</td></tr>';
$mailbody.='<tr><td><b>Day Phone:</b></td><td>'.$Day_Phone.'</td></tr>';
$mailbody.='<tr><td><b>Evening Phone:</b></td><td>'.$Evening_Phone.'</td></tr>';
$mailbody.='<tr><td style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;" colspan="2"><b>Business Information</b></td></tr>';
$mailbody.='<tr><td><b>Full Name of Business:</b></td><td>'.$Full_Name_of_Business.'</td></tr>';
$mailbody.='<tr><td><b>Telephone:</b></td><td>'.$Telephone.'</td></tr>';
$mailbody.='<tr><td><b>Fax:</b></td><td>'.$Fax.'</td></tr>';
$mailbody.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address_business.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$City_business.'</td></tr>';
$mailbody.='<tr><td><b>Zip:</b></td><td>'.$Zip_business.'</td></tr>';
$mailbody.='<tr><td><b>Year Established:</b></td><td>'.$Year_Established.'</td></tr>';
$mailbody.='<tr><td><b>Number of Employees:</b></td><td>'.$Number_of_Employees.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$state_business.'</td></tr>';
$mailbody.='<tr><td><b>Kind of Business:</b></td><td>'.$Kind_of_Business.'</td></tr>';
$mailbody.='<tr><td style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;" colspan="2"><b>Owners</b></td></tr>';
$mailbody.='<tr><td><b>Owner/Partner/Corp:</b></td><td>'.$Owner1.'</td></tr>';
$mailbody.='<tr><td><b>Title :</b></td><td>'.$Title1.'</td></tr>';
$mailbody.='<tr><td><b>% of Shares Owned:</b></td><td>'.$Shares_Owned1.'</td></tr>';
$mailbody.='<tr><td><b>% of Partnership:</b></td><td>'.$Partnership1.'</td></tr>';
$mailbody.='<tr><td><b>Owner/Partner/Corp:</b></td><td>'.$Owner2.'</td></tr>';
$mailbody.='<tr><td><b>Title :</b></td><td>'.$Title2.'</td></tr>';
$mailbody.='<tr><td><b>% of Shares Owned:</b></td><td>'.$Shares_Owned2.'</td></tr>';
$mailbody.='<tr><td><b>% of Partnership:</b></td><td>'.$Partnership2.'</td></tr>';
$mailbody.='<tr><td><b>Owner/Partner/Corp:</b></td><td>'.$Owner3.'</td></tr>';
$mailbody.='<tr><td><b>Title :</b></td><td>'.$Title3.'</td></tr>';
$mailbody.='<tr><td><b>% of Shares Owned:</b></td><td>'.$Shares_Owned3.'</td></tr>';
$mailbody.='<tr><td><b>% of Partnership:</b></td><td>'.$Partnership3.'</td></tr>';
$mailbody.='<tr><td colspan="2" style="background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;"><b>Trade/Credit References</b></td></tr>';
$mailbody.='<tr><td><b>Name:</b></td><td>'.$trade_Name1.'</td></tr>';
$mailbody.='<tr><td><b>Address:</b></td><td>'.$trade_Address1.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$trade_City1.'</td></tr>';
$mailbody.='<tr><td><b>Zip:</b></td><td>'.$trade_Zip1.'</td></tr>';
$mailbody.='<tr><td><b>Telephone:</b></td><td>'.$trade_Telephone1.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$trade_State1.'</td></tr>';
$mailbody.='<tr><td><b>Name:</b></td><td>'.$trade_Name2.'</td></tr>';
$mailbody.='<tr><td><b>Address:</b></td><td>'.$trade_Address2.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$trade_City2.'</td></tr>';
$mailbody.='<tr><td><b>Zip:</b></td><td>'.$trade_Zip2.'</td></tr>';
$mailbody.='<tr><td><b>Telephone:</b></td><td>'.$trade_Telephone2.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$trade_State2.'</td></tr>';
$mailbody.='<tr><td><b>Name:</b></td><td>'.$trade_Name3.'</td></tr>';
$mailbody.='<tr><td><b>Address:</b></td><td>'.$trade_Address3.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$trade_City3.'</td></tr>';
$mailbody.='<tr><td><b>Zip:</b></td><td>'.$trade_Zip3.'</td></tr>';
$mailbody.='<tr><td><b>Telephone:</b></td><td>'.$trade_Telephone3.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$trade_State3.'</td></tr>';
$mailbody.='<tr><td colspan="2">&nbsp;</td></tr>';
$mailbody.='<tr><td><b>Please describe the purpose of your loan:</b></td><td>'.$Please_describe_the_purpose_of_your_loan.'</td></tr>';
$mailbody.='<tr><td><b>How did you hear about us?:</b></td><td>'.$How_did_you_hear_about_us.'</td></tr></table>';



$body='<tr><td align="center" colspan="2"><b>Loan/Property Information</b></td></tr>';
$body.='<tr><td><b>Type of Loan:</b></td><td>'.$type_of_loan.'</td></tr>';
$body.='<tr><td><b>Requested Fixed Rate Term:</b></td><td>'.$requested_fixed_rate_term.'</td></tr>';
$body.='<tr><td><b>Requested Amortization:</b></td><td>'.$Requested_Amortization.'</td></tr>';
$body.='<tr><td><b>When do you need the loan?:</b></td><td>'.$When_do_you_need_the_loan.'</td></tr>';
$body.='<tr><td><b>Desired Loan Amount:($)</b></td><td>'.$desired_loan_amount.'</td></tr>';
$body.='<tr><td><b>What type of property?:</b></td><td>'.$What_type_of_property.'</td></tr>';
$body.='<tr><td><b>Address:</b></td><td>'.$Address.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$city_loan.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$state_loan.'</td></tr>';
$body.='<tr><td><b>Zip:</b></td><td>'.$Zip_loan.'</td></tr>';
$body.='<tr><td align="center" colspan="2"><b>Contact Information</b></td></tr>';
$body.='<tr><td><b>First Name:</b></td><td>'.$first_name.'</td></tr>';
$body.='<tr><td><b>Last Name:</b></td><td>'.$last_name.'</td></tr>';
$body.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$City_personal.'</td></tr>';
$body.='<tr><td><b>Zip:</b></td><td>'.$zip_personal.'</td></tr>';
$body.='<tr><td><b>Email Address:</b></td><td>'.$email.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$state_personal.'</td></tr>';
$body.='<tr><td><b>Day Phone:</b></td><td>'.$Day_Phone.'</td></tr>';
$body.='<tr><td><b>Evening Phone:</b></td><td>'.$Evening_Phone.'</td></tr>';
$body.='<tr><td align="center" colspan="2"><b>Business Information</b></td></tr>';
$body.='<tr><td><b>Full Name of Business:</b></td><td>'.$Full_Name_of_Business.'</td></tr>';
$body.='<tr><td><b>Telephone:</b></td><td>'.$Telephone.'</td></tr>';
$body.='<tr><td><b>Fax:</b></td><td>'.$Fax.'</td></tr>';
$body.='<tr><td><b>Street Address:</b></td><td>'.$Street_Address_business.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$City_business.'</td></tr>';
$body.='<tr><td><b>Zip:</b></td><td>'.$Zip_business.'</td></tr>';
$body.='<tr><td><b>Year Established:</b></td><td>'.$Year_Established.'</td></tr>';
$body.='<tr><td><b>Number of Employees:</b></td><td>'.$Number_of_Employees.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$state_business.'</td></tr>';
$body.='<tr><td><b>Kind of Business:</b></td><td>'.$Kind_of_Business.'</td></tr>';
$body.='<tr><td align="center" colspan="2"><b>Owners</b></td></tr>';
$body.='<tr><td><b>Owner/Partner/Corp:</b></td><td>'.$Owner1.'</td></tr>';
$body.='<tr><td><b>Title :</b></td><td>'.$Title1.'</td></tr>';
$body.='<tr><td><b>% of Shares Owned:</b></td><td>'.$Shares_Owned1.'</td></tr>';
$body.='<tr><td><b>% of Partnership:</b></td><td>'.$Partnership1.'</td></tr>';
$body.='<tr><td><b>Owner/Partner/Corp:</b></td><td>'.$Owner2.'</td></tr>';
$body.='<tr><td><b>Title :</b></td><td>'.$Title2.'</td></tr>';
$body.='<tr><td><b>% of Shares Owned:</b></td><td>'.$Shares_Owned2.'</td></tr>';
$body.='<tr><td><b>% of Partnership:</b></td><td>'.$Partnership2.'</td></tr>';
$body.='<tr><td><b>Owner/Partner/Corp:</b></td><td>'.$Owner3.'</td></tr>';
$body.='<tr><td><b>Title :</b></td><td>'.$Title3.'</td></tr>';
$body.='<tr><td><b>% of Shares Owned:</b></td><td>'.$Shares_Owned3.'</td></tr>';
$body.='<tr><td><b>% of Partnership:</b></td><td>'.$Partnership3.'</td></tr>';
$body.='<tr><td align="center" colspan="2"><b>Trade/Credit References</b></td></tr>';
$body.='<tr><td><b>Name:</b></td><td>'.$trade_Name1.'</td></tr>';
$body.='<tr><td><b>Address:</b></td><td>'.$trade_Address1.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$trade_City1.'</td></tr>';
$body.='<tr><td><b>Zip:</b></td><td>'.$trade_Zip1.'</td></tr>';
$body.='<tr><td><b>Telephone:</b></td><td>'.$trade_Telephone1.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$trade_State1.'</td></tr>';
$body.='<tr><td><b>Name:</b></td><td>'.$trade_Name2.'</td></tr>';
$body.='<tr><td><b>Address:</b></td><td>'.$trade_Address2.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$trade_City2.'</td></tr>';
$body.='<tr><td><b>Zip:</b></td><td>'.$trade_Zip2.'</td></tr>';
$body.='<tr><td><b>Telephone:</b></td><td>'.$trade_Telephone2.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$trade_State2.'</td></tr>';
$body.='<tr><td><b>Name:</b></td><td>'.$trade_Name3.'</td></tr>';
$body.='<tr><td><b>Address:</b></td><td>'.$trade_Address3.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$trade_City3.'</td></tr>';
$body.='<tr><td><b>Zip:</b></td><td>'.$trade_Zip3.'</td></tr>';
$body.='<tr><td><b>Telephone:</b></td><td>'.$trade_Telephone3.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$trade_State3.'</td></tr>';
$body.='<tr><td colspan="2">&nbsp;</td></tr>';
$body.='<tr><td><b>Please describe the purpose of your loan:</b></td><td>'.$Please_describe_the_purpose_of_your_loan.'</td></tr>';
$body.='<tr><td><b>How did you hear about us?:</b></td><td>'.$How_did_you_hear_about_us.'</td></tr>';







$mail_explodes = explode(";", $mailto);
$to = $mail_explodes[0];
$from = 'Everyloan.com';
$fromemail = 'application@everyloan.com';
$subject = "Commercial Loan Application request from Everyloan Financial Services";
$message =$mailbody."<p>Please see the attachment.</p>";


// a random hash will be necessary to send mixed content
$separator = md5(time());


// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
$a='<html><body><table border="1" width="650" align="center">
<tr><td align="center" colspan="2"><strong>Commercial Loan Application</strong></td></tr>'.$body.'</table></body></html>';


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

if(mail($to, $subject, "", $headers)) {
echo '<div style="color:#FFFFFF; background:#3579A2; border:2px solid #BAD8E9; width:100%; margin-top:20px; margin-bottom:20px; text-align:center; font-weight:bold; font-style:italic; font-size:16px; padding-top:40px; padding-bottom:40px;">Your Commercial Loan Application Has Been Mailed Successfully</div>
<div style="width:100%; text-align:center; color:#000000; border:1px solid #81C4DA; padding-top:10px; padding-bottom:10px;">If Your Browser Does Not Redirect Automatically After 15sec,Then<a href="'.$path.'?mail=success" style="color:#C53323; font-weight:bold;"> Click Here </a><span><img src="http://bm.crowdgrip.com/mlc/loading.gif" align="center" /></span></div>';
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
 echo '<div style="color:#FFFFFF; background:#3579A2; border:2px solid #BAD8E9; width:100%; margin-top:20px; margin-bottom:20px; text-align:center; font-weight:bold; font-style:italic; font-size:16px; padding-top:40px; padding-bottom:40px;">Your Commercial Loan Application Mail Sent Failed.</div>
<div style="width:100%; text-align:center; color:#000000; border:1px solid #81C4DA; padding-top:10px; padding-bottom:10px;">If Your Browser Does Not Redirect Automatically After 15sec,Then<a href="'.$path.'?mail=success" style="color:#C53323; font-weight:bold;"> Click Here </a><span><img src="http://bm.crowdgrip.com/mlc/loading.gif" align="center" /></span></div>';
 ?>
 <script type="text/JavaScript">
<!--
setTimeout("location.href ='<?php echo $path.'?mail=failed' ?>';",10000);
-->
</script>
<?php
}
?>