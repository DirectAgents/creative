<?php


require( "../../../../phpmailer/class.phpmailer.php" );


$mail = new PHPMailer();  
 
//$mail->IsSMTP();  // telling the class to use SMTP
$mail->IsHTML(true);
//$mail->Mailer = "smtp";
//$mail->Host = "ssl://smtp.gmail.com";
//$mail->Port = 465;




$mail->SMTPSecure = 'tls'; 
$mail->Host = 'tls://smtp.gmail.com';
$mail->Port = 587; //You have to define the Port
$mail->SMTPDebug  = 3;





//$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "ald183s@gmail.com"; // SMTP username
$mail->Password = "designtastic183"; // SMTP password
 
$mail->From     = "ald183s@gmail.com";
$mail->AddAddress('ald183s@gmail.com');  
 
$mail->Subject  = "How was the meeting?";
$mail->Body     = 





'


adfasdf


';









$mail->WordWrap = 250;  
 
if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent.';
}

?>


