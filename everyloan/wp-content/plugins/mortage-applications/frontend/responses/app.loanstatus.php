<?php
require(MORTGAGEAPPS_FDIR . 'html2pdf/html2fpdf.php');

$path = $_SERVER['HTTP_REFERER'];
if(!$mailto || $mailto=="") $mailto = get_mortgage_app_default_mailto("loan-status");

$fname=$_POST['name'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$know=$_POST['know'];
$comments=$_POST['comments'];


global $wpdb;
$dbdata = array();
$dbdata["app_fname"] = $_POST['name'];
$dbdata["app_lname"] = $_POST['lastname'];
$dbdata["app_email"] = $_POST['email'];
$dbdata["app_phone"] = $_POST['cnumber'];
$dbdata["app_question"] = $_POST['know'];
$dbdata["app_comments"] = $_POST['comments'];
$dbdata["app_added"] = date("Y-m-d H:i:s");
addToDatabase($wpdb->mortgageapp_loanstatus_tbl, $dbdata);


// email stuff (change data below)

$pdf=new HTML2FPDF();
$pdf->AddPage();
$mailbody='<table width="400" border="0" cellpadding="7" cellspacing="0"><tr><td><b>First Name:</b></td><td>'.$fname.'</td></tr>';
$mailbody.='<tr><td><b>Last Name:</b></td><td>'.$lastname.'</td></tr>';
$mailbody.='<tr><td><b>Email Address:</b></td><td>'.$email.'</td></tr>';
$mailbody.='<tr><td><b>Applicant Wants To Know About:</b></td><td>'.$know.'</td></tr>';
$mailbody.='<tr><td><b>Comments:</b></td><td>'.$comments.'</td></tr></table>';

$body='<tr><td><b>First Name:</b></td><td>'.$fname.'</td></tr>';
$body.='<tr><td><b>Last Name:</b></td><td>'.$lastname.'</td></tr>';
$body.='<tr><td><b>Email Address:</b></td><td>'.$email.'</td></tr>';
$body.='<tr><td><b>Applicant Wants To Know About:</b></td><td>'.$know.'</td></tr>';
$body.='<tr><td><b>Comments:</b></td><td>'.$comments.'</td></tr>';
$mail_explodes = explode(";", $mailto);
$to = $mail_explodes[0];
$from = 'Everyloan.com';
$fromemail = 'application@everyloan.com';
$subject = "Loan status request from Everyloan Financial Services";
$message =$mailbody."<p>Please see the attachment.</p>";


// a random hash will be necessary to send mixed content
$separator = md5(time());


// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
$a='<html><body><table border="1" width="650" align="center">
<tr><td align="center" colspan="2"><strong>Loan Status Request</strong></td></tr>'.$body.'</table></body></html>';


$pdf->WriteHTML($a);
$filename = "loanstatus.pdf";
$pdfdoc=$pdf->Output("contactform.pdf","S");
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
 echo '<div style="color:#FFFFFF; background:#3579A2; border:2px solid #BAD8E9; width:100%; margin-top:20px; margin-bottom:20px; text-align:center; font-weight:bold; font-style:italic; font-size:16px; padding-top:40px; padding-bottom:40px;">Your Loan Staus Application Request Mailed Successfully</div>
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
  echo '<div style="color:#FFFFFF; background:#3579A2; border:2px solid #BAD8E9; width:100%; margin-top:20px; margin-bottom:20px; text-align:center; font-weight:bold; font-style:italic; font-size:16px; padding-top:40px; padding-bottom:40px;">Mail Sent Failed</div>
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