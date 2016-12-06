<?php

session_start();
include ('../../config.php');
require( "../../phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['startupSession'];


if($_POST)
{



date_default_timezone_set('America/New_York');


$sql_participant = mysqli_query($connecDB,"SELECT * FROM tbl_project_request WHERE ProjectID = '".$_POST['projectid']."' AND userID = '".$_POST['userid']."'");
$row = mysqli_fetch_array($sql_participant);





  $update_sql = mysqli_query($connecDB,"UPDATE tbl_project_request SET 
  Status = 'Cancelled_by_startup'

  WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."'");




	
	   
	
    //header("Location: index.php?s=success"); 


$sql_participant = "SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."'";
$result_participant=mysql_query($sql_participant);
$row2 = mysql_fetch_array($result_participant);






$mail = new PHPMailer();
$mail->Body     = '

<body style="margin: 0 !important; padding: 0 !important;">

<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#333333" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                    <td align="center" valign="top" style="padding: 15px 0;" class="logo">
                        <a href="http://litmus.com" target="_blank">
                            <img alt="Logo" src="http://www.labfy.com/survey/images/logo-1.jpg" width="60" height="60" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    
   
    <tr>
        <td bgcolor="#E6E9ED" align="center" style="padding: 70px 15px 70px 15px;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-bottom: 20px; max-width: 500px;" class="responsive-table">
                <!-- TITLE -->
                <tr>
                    <td width="200%" colspan="2" align="center" class="padding" style="padding: 0 0 10px 0; font-size: 25px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;">Meeting Cancelled</td>
                </tr>
            </table>







<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding">Sorry to inform you that the following meeting has been cancelled.</td>
                                        </tr>
                                        
                                       
                                        
                                    </tbody></table>
                                    
                                    
                                    
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:500;">
                            <tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                                    <tr>
                                    <td align="left" valign="top" width="115">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:115px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="115">
                                            <tr>
                                                <td valign="top" style="padding: 40px 0 0 0;" class="mobile-hide"><a href="http://litmus.com" target="_blank"><img src="http://www.labfy.com/survey/images/calendar.png" alt="alt text here" width="105" height="105" border="0" style="display: block; font-family: Arial; color: #666666; font-size: 14px; width: 105px; height: 105px;"></a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    <td align="left" valign="top" width="385">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:385px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>

                                                <td style="padding: 40px 0 0 0;" class="no-padding">
                                                    <!-- ARTICLE -->
                                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                       
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">When</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 25px; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding">'.$row['Day'].' @ '.$row['Time'].'</td>
                                                        </tr>

                                                         <tr>
                                                             <td align="left" style="padding: 10px 0 15px 25px; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding">'.date('F j, Y',strtotime($row['Date_of_Meeting'])).' </td>
                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </table>



            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
      </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 20px 0px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        1234 Main Street, Anywhere, MA 01234, USA
                        <br>
                        <a href="http://litmus.com" target="_blank" style="color: #666666; text-decoration: none;">Unsubscribe</a>
                        
                        
                    </td>
                </tr>
            </table>



            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
</body>
</html>

';
//$mail->IsSMTP();                                        // telling the class to use SMTP
$mail->SMTPDebug    = 0;                                // enables SMTP debug information (for testing)
//$mail->SMTPAuth     = true;                             // enable SMTP authentication
$mail->SMTPSecure   = "tls";                            // sets the prefix to the servier
$mail->Host         = "ssl://smtp.gmail.com";                 // sets GMAIL as the SMTP server
$mail->Port         = 587;                              // set the SMTP port for the GMAIL server

$mail->Username = "markcontract123@gmail.com"; // SMTP username
$mail->Password = "mark123456"; // SMTP password

$mail->From ='ald183s@gmail.com';
$mail->Subject    = "Meeting Canceled";
$mail->IsHTML(true);
$address = $row2['userEmail'];
$mail->AddAddress($address, $row2['FirstName']);

// $mail->AddAttachment("images/phpmailer.gif");        // attachment
// $mail->AddAttachment("images/phpmailer_mini.gif");   // attachment

if(!$mail->Send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
} 
else {
    //echo "Message sent!";

}








   






}	
	

	

?>