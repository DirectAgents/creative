<?php

session_start();
include ('../../config.php');
require( "../../phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['startupSession'];


if($_POST)
{



// Delete data in mysql from row that has this id 
$sql=mysqli_query($connecDB,"DELETE FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_POST['projectid']."'");

$sql=mysqli_query($connecDB,"DELETE FROM tbl_startup_screeningquestion WHERE userID='".$_SESSION['startupSession']."' AND ProjectID = '".$_POST['projectid']."'");

$sql=mysqli_query($connecDB,"DELETE FROM tbl_nda_draft WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_POST['projectid']."'");

$sql=mysqli_query($connecDB,"DELETE FROM tbl_nda_pending WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_POST['projectid']."'");

$sql=mysqli_query($connecDB,"DELETE FROM tbl_nda_signed WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_POST['projectid']."'");





$results = mysqli_query($connecDB,"SELECT * FROM tbl_meeting_upcoming WHERE ProjectID = '".$_POST['projectid']."'");


while($row = mysqli_fetch_array($results))
{ 



$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');
$the_time = date('h:i:s A');

$insert_sql = mysqli_query($connecDB,"INSERT INTO  tbl_meeting_archived(userID, startupID, ProjectID, Viewed_by_Startup, Viewed_by_Participant, Date_of_Meeting, Final_Time, Location, Status, Date_Posted, Time_Posted) VALUES('".$row['userID']."','".$_SESSION['startupSession']."',
  '".$row['ProjectID']."', 'No', 'No', '".$row['Date_of_Meeting']."', '".$row['Final_Time']."','".$row['Location']."','Canceled_by_Startup','".$the_date."','".$the_time."')");

	
	   
	
    //header("Location: index.php?s=success"); 


$sql_participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$row['userID']."'");
$row2 = mysqli_fetch_array($sql_participant);



// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Meeting Canceled", "support@valifyit.com");
$subject = "Meeting Canceled";
$to = new SendGrid\Email($row2['FirstName'], $row2['userEmail']);
$content = new SendGrid\Content("text/html", '

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
                        <a href="http://www.valifyit.com/" target="_blank">
                            <img alt="Logo" src="http://www.valifyit.com/images/logo-1.jpg" width="60" height="60" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
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
                                                <td valign="top" style="padding: 40px 0 0 0;" class="mobile-hide"><a href="http://litmus.com" target="_blank"><img src="http://www.valifyit.com/images/calendar.png" alt="alt text here" width="105" height="105" border="0" style="display: block; font-family: Arial; color: #666666; font-size: 14px; width: 105px; height: 105px;"></a></td>
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
                         245 5th Ave Suite 201, New York, NY 10001
                        <br>
                        <a href="http://valifyit.com/terms/" target="_blank" style="color: #666666; text-decoration: none;">Terms of Service</a> | <a href="http://valifyit.com/privacy/" target="_blank" style="color: #666666; text-decoration: none;">Privacy</a>  | <a href="http://valifyit.com/faq/" target="_blank" style="color: #666666; text-decoration: none;">FAQ</a>
                        
                        
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




   ');
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$apiKey = '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';
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
//echo $response->statusCode();
//echo $response->headers();
//echo $response->body();



$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_upcoming WHERE ProjectID = '".$_POST['projectid']."' AND userID = '".$row2['userID']."'");


}

 $output = json_encode(array('type'=>'message', 'text' => $_POST['projectid']));
		die($output);



}	
	
	
	

?>