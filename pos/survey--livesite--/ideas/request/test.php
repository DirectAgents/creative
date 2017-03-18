<?php


require 'PHPMailerAutoload.php';


//Create a new PHPMailer instance
$mail = new PHPMailer();

// Set PHPMailer to use the sendmail transport
$mail->isSendmail();

//Set who the message is to be sent from
$mail->setFrom('info@example.com', 'Circl');

//Set an alternative reply-to address
$mail->addReplyTo('info@example.com', 'Circl');

//Set who the message is to be sent to
$mail->addAddress('ald183s@gmail.com');

//Set the subject line
$mail->Subject = 'Meeting Reminder';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.php'), dirname(__FILE__));


$mail->Body     = 'hello

';




//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';






//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');



 //send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}


?>