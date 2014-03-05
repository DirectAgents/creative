<?php
require(MORTGAGEAPPS_FDIR . 'html2pdf/html2fpdf.php');

$path = $_SERVER['HTTP_REFERER'];
if(!$mailto || $mailto=="") $mailto = get_mortgage_app_default_mailto("loan-modification");

$fname=$_POST['text-850'];
$lname=$_POST['text-329'];
$phone=$_POST['text-174'];
$Second_Phone=$_POST['text-727'];
$Email=$_POST['email-985'];
$Address=$_POST['text-170'];
$City=$_POST['text-446'];
$State=$_POST['menu-614'];

$Zip=$_POST['text-226'];
$Employment=$_POST['menu-299'];
$Mortgage_Lender=$_POST['text-242'];
$Mortgage_History=$_POST['menu-290'];
$Hardship=$_POST['menu-904'];
$Comments=$_POST['textarea-625'];
$How_did_you_hear_about_us=$_POST['text-63'];


global $wpdb;
$dbdata = array();
$dbdata["app_fname"] = $_POST['text-850'];
$dbdata["app_lname"] = $_POST['text-329'];
$dbdata["app_phone"] = $_POST['text-174'];
$dbdata["app_phone2"] = $_POST['text-727'];
$dbdata["app_email"] = $_POST['email-985'];
$dbdata["app_address"] = $_POST['text-170'];
$dbdata["app_city"] = $_POST['text-446'];
$dbdata["app_state"] = $_POST['menu-614'];
$dbdata["app_zipcode"] = $_POST['text-226'];
$dbdata["app_employment"] = $_POST['menu-299'];
$dbdata["app_lender"] = $_POST['text-242'];
$dbdata["app_history"] = $_POST['menu-290'];
$dbdata["app_hardship"] = $_POST['menu-904'];
$dbdata["app_comments"] = $_POST['textarea-625'];
$dbdata["app_heardfrom"] = $_POST['text-63'];
$dbdata["app_added"] = date("Y-m-d H:i:s");
addToDatabase($wpdb->mortgageapp_loanmodification_tbl, $dbdata);


// email stuff (change data below)

$pdf=new HTML2FPDF();
$pdf->AddPage();
$mailbody='<table width="400" border="0" cellpadding="7" cellspacing="0"><tr><td colspan="2" style=\"background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;\" colspan=\"2\"><b>About Applicant</b></td></tr>';

$mailbody.='<tr><td><b>First Name:</b></td><td>'.$fname.'</td></tr>';
$mailbody.='<tr><td><b>Last Name:</b></td><td>'.$lname.'</td></tr>';
$mailbody.='<tr><td><b>Phone:</b></td><td>'.$phone.'</td></tr>';
$mailbody.='<tr><td><b>Second Phone:</b></td><td>'.$Second_Phone.'</td></tr>';
$mailbody.='<tr><td><b>Email:</b></td><td>'.$Email.'</td></tr>';
$mailbody.='<tr><td><b>Address:</b></td><td>'.$Address.'</td></tr>';
$mailbody.='<tr><td><b>City:</b></td><td>'.$City.'</td></tr>';
$mailbody.='<tr><td><b>State:</b></td><td>'.$State.'</td></tr>';
$mailbody.='<tr><td><b>Zip:</b></td><td>'.$Zip.'</td></tr>';
$mailbody.='<tr><td><b>Employment:</b></td><td>'.$Employment.'</td></tr>';
$mailbody.='<tr><td><b>Mortgage Lender:</b></td><td>'.$Mortgage_Lender.'</td></tr>';
$mailbody.='<tr><td><b>Mortgage History:</b></td><td>'.$Mortgage_History.'</td></tr>';
$mailbody.='<tr><td><b>Hardship:</b></td><td>'.$Hardship.'</td></tr>';
$mailbody.='<tr><td><b>Comments:</b></td><td>'.$Comments.'</td></tr>';
$mailbody.='<tr><td><b>How did you hear about us? :</b></td><td>'.$How_did_you_hear_about_us.'</td></tr></table>';




$body='<tr><td colspan="2" style=\"background-color:#4A7AB3;color:#ffffff; font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;\" colspan=\"2\"><b>About Applicant</b></td></tr>';

$body.='<tr><td><b>First Name:</b></td><td>'.$fname.'</td></tr>';
$body.='<tr><td><b>Last Name:</b></td><td>'.$lname.'</td></tr>';
$body.='<tr><td><b>Phone:</b></td><td>'.$phone.'</td></tr>';
$body.='<tr><td><b>Second Phone:</b></td><td>'.$Second_Phone.'</td></tr>';
$body.='<tr><td><b>Email:</b></td><td>'.$Email.'</td></tr>';
$body.='<tr><td><b>Address:</b></td><td>'.$Address.'</td></tr>';
$body.='<tr><td><b>City:</b></td><td>'.$City.'</td></tr>';
$body.='<tr><td><b>State:</b></td><td>'.$State.'</td></tr>';
$body.='<tr><td><b>Zip:</b></td><td>'.$Zip.'</td></tr>';
$body.='<tr><td><b>Employment:</b></td><td>'.$Employment.'</td></tr>';
$body.='<tr><td><b>Mortgage Lender:</b></td><td>'.$Mortgage_Lender.'</td></tr>';
$body.='<tr><td><b>Mortgage History:</b></td><td>'.$Mortgage_History.'</td></tr>';
$body.='<tr><td><b>Hardship:</b></td><td>'.$Hardship.'</td></tr>';
$body.='<tr><td><b>Comments:</b></td><td>'.$Comments.'</td></tr>';
$body.='<tr><td><b>How did you hear about us? :</b></td><td>'.$How_did_you_hear_about_us.'</td></tr>';




$mail_explodes = explode(";", $mailto);
$to = $mail_explodes[0];
$from = 'Everyloan.com';
$fromemail = 'application@everyloan.com';
$subject = "Loan Modification request from Everyloan Financial Services";
$message =$mailbody."<p>Please see the attachment.</p>";


// a random hash will be necessary to send mixed content
$separator = md5(time());


// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
$a='<html><body><table border="1" width="650" align="center">
<tr><td align="center" colspan="2"><strong>Loan Modification Application</strong></td></tr>'.$body.'</table></body></html>';


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

echo '<div style="color:#FFFFFF; background:#3579A2; border:2px solid #BAD8E9; width:100%; margin-top:20px; margin-bottom:20px; text-align:center; font-weight:bold; font-style:italic; font-size:16px; padding-top:40px; padding-bottom:40px;">Your Loan Modification Request Has Been Mailed Successfully.</div>
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