<?php

session_start();
include("../../config.php"); //include config file





if($_POST){


$sql4 = mysqli_query($connecDB,"SELECT * FROM tbl_participant  WHERE userID = '".$_SESSION['participantSession']."' ");
$row4 = mysqli_fetch_array($sql4);







$sql = mysqli_query($connecDB, "SELECT * FROM tbl_meeting_request WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_POST['projectid']."'");

if(mysqli_num_rows($sql)<1)
{

$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');
$the_time = date('h:i:s A');


$date_option_one = new DateTime($_POST['date_option_one']);
$date_option_two = new DateTime($_POST['date_option_two']);
$date_option_three = new DateTime($_POST['date_option_three']);

if(!empty($_POST['date_option_one'])){
$date_option_one =  $date_option_one->format('Y-m-d');
}else{
$date_option_one = '0000-00-00';    
}

if(!empty($_POST['date_option_two'])){
$date_option_two =  $date_option_two->format('Y-m-d');
}else{
$date_option_two = '0000-00-00';    
}


if(!empty($_POST['date_option_three'])){
$date_option_three =  $date_option_three->format('Y-m-d');
}else{
$date_option_three = '0000-00-00';    
}



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_meeting_request(userID, startupID, ProjectID, Meeting_Status, Date_Option_One,Date_Option_Two,Date_Option_Three, Time_Option_One,Time_Option_Two,Time_Option_Three, Location, Accepted_to_Participate, Status, Requested_By, Date_Posted, Time_Posted) 
VALUES('".$_SESSION['participantSession']."', '".$_POST['startupid']."','".$_POST['projectid']."', 'Meeting Request' , '".$date_option_one."','".$date_option_two."','".$date_option_three."', '".$_POST['time_suggested_one']."','".$_POST['time_suggested_two']."','".$_POST['time_suggested_three']."', '".$_POST['location']."' , 'Pending', 'Waiting for Startup to Accept or Decline', 'Participant' , '".$the_date."','".$the_time."')");


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_participant_potentialanswer(userID, ProjectID, PotentialAnswerGiven) 
VALUES('".$_SESSION['participantSession']."', '".$_POST['projectid']."','".$_POST['potentialanswergiven']."')");




//Check if NDA is required

$sqlproject = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$_POST['projectid']."' ");
$rowproject = mysqli_fetch_array($sqlproject);

if($rowproject['NDA'] == 'Yes')
{

$sqlnda = mysqli_query($connecDB,"SELECT * FROM tbl_nda_draft  WHERE ProjectID = '".$_POST['projectid']."'");
$rownda = mysqli_fetch_array($sqlnda);

 $sql=mysqli_query($connecDB,"INSERT INTO tbl_nda_pending (`status`, `userID`,`startupID`, `ProjectID`, `startup_name` , `nda_purpose`,`startup_signature` ,`startup_sig_name`, `startup_sig_title`, `startup_sig_company`, `startup_sig_date` ) VALUES ('pending', '".$_SESSION['participantSession']."' ,'".$rownda['startupID']."', '".$_POST['projectid']."','".$rownda['startup_name']."', '".$rownda['nda_purpose']."','".$rownda['startup_signature']."','".$rownda['startup_sig_name']."', '".$rownda['startup_sig_title']."', '".$rownda['startup_sig_company']."', '".$rownda['startup_sig_date']."')");

}


$sql_participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."'");
$row2 = mysqli_fetch_array($sql_participant);


$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID='".$_POST['startupid']."'");
$row5 = mysqli_fetch_array($sql5);



// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email($row2['FirstName'], $row2['userEmail']);
$subject = "Meeting Request";
$to = new SendGrid\Email($row5['FirstName'], $row5['userEmail']);
$content = new SendGrid\Content("text/html", '




<body style="margin: 0 !important; padding: 0 !important;">



<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#fdfdfd" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="left" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:50px; max-width: 600px;" class="wrapper">
                <tr>
                    <td align="left" valign="top" style="padding:20px;" class="logo">
                        <a href="http://litmus.com" target="_blank">
                            <img alt="Logo" src="http://labfy.com/circl/images/email/email-logo-large.jpg" width="132" height="48" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
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
        <td bgcolor="#fdfdfd" align="center" style="padding: 10px 15px 30px 15px;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background:#fff; padding:20px; border:1px solid #f0f0f0; max-width: 600px;" class="responsive-table">
                <!-- TITLE -->
                <tr>
                    <td align="center" style="padding: 0 0 10px 0; font-size: 25px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding" colspan="2">Meeting Request</td>
                </tr>
                <tr>
                  <td align="center" height="100%" valign="top" width="100%" colspan="2">
                        <!--[if (gte mso 9)|(IE)]>
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                        <tr>
                        <td align="center" valign="top" width="600">
                        <![endif]-->
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600;">
                            <tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="left" valign="top" width="115">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:115px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="115">
                                            <tr>
                                                <td valign="top" style="padding: 40px 0 0 0;" class="mobile-hide"><a href="http://litmus.com" target="_blank"><img src="http://www.labfy.com/circl/images/email/person.jpg" alt="who" width="80" height="74" border="0" style="display: block; font-family: Arial; color: #666666; font-size: 14px; width: 80px; height: 74px;"></a></td>
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
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">'.$row5['FirstName'].'</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 25px; font-size: 18px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding">'.$row5['Phone'].'</td>
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




                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600;">
                            <tbody><tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="left" valign="top" width="115">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:115px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="115">
                                            <tbody><tr>
                                                <td valign="top" style="padding: 40px 0 0 0;" class="mobile-hide"><a href="http://litmus.com" target="_blank"><img src="http://www.labfy.com/circl/images/email/calendar.jpg" alt="when" width="80" height="74" border="0" style="display: block; font-family: Arial; color: #666666; font-size: 14px; width: 80px; height:74px;"></a></td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    <td align="left" valign="top" width="385">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:385px; vertical-align:top; width:100%;">

                                         <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody><tr>

                                                <td style="padding: 40px 0 0 0;" class="no-padding">
                                                    <!-- ARTICLE -->
                                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">Meeting Date Options</td>
                                                        </tr>

                                                         <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">&nbsp;</td>
                                                        </tr>

                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">'.date('F j, Y',strtotime($date_option_one)).' @ '.$_POST['time_suggested_one'].'</td>

                                                        </tr>
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">'.date('F j, Y',strtotime($date_option_two)).' @ '.$_POST['time_suggested_two'].'</td>
                                                        </tr>

                                                         <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">'.date('F j, Y',strtotime($date_option_three)).' @ '.$_POST['time_suggested_three'].'</td>
                                                        </tr>
                                                      

                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </tbody></table>
                        
                        
                        
                        
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600;">
                            <tbody><tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="left" valign="top" width="115">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:115px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="115">
                                            <tbody><tr>
                                                <td valign="top" style="padding: 40px 0 0 0;" class="mobile-hide"><a href="http://litmus.com" target="_blank"><img src="http://www.labfy.com/circl/images/email/location.jpg" alt="where" width="80" height="74" border="0" style="display: block; font-family: Arial; color: #666666; font-size: 14px; width: 80px; height:74px;"></a></td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    <td align="left" valign="top" width="385">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:385px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody><tr>

                                                <td style="padding: 40px 0 0 0;" class="no-padding">
                                                    <!-- ARTICLE -->
                                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">'.$_POST['location'].'</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 25px; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding">
                                                             &nbsp;</td>
                                                        </tr>

                                                         <tr>
                                                             <td align="left" style="padding: 10px 0 15px 25px; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding">
                                                             &nbsp;</td>
                                                        </tr>
                                                      

                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                
                               <tr>
                               
                    <td align="center" style="padding: 20px; background:#4c71dc; font-size: 25px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #ffffff;" class="padding" colspan="2"><a href="http://localhost/creative/pos/survey/startup/meetings/" style="font-weight: normal; color: #ffffff;">Accept To Meet</a></td>
                </tr>

                        </tbody></table>


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
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->

          


               <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 600px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        <img alt="Logo" src="http://labfy.com/circl/images/email/email-logo-small.jpg" width="110" height="34" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                           </td>
                     </tr>

                   
            </table>



            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 600px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        1234 Main Street, Anywhere, MA 01234, USA
                           </td>
                     </tr>

                      <tr>
                      <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">   
                        <a href="http://litmus.com" target="_blank" style="color: #666666; text-decoration: none;">Blog</a> | <a href="http://litmus.com" target="_blank" style="color: #666666; text-decoration: none;">Blog2</a> </td>
                       
                        
 
                   
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










$output = json_encode(array('type'=>'message', 'text' => '<div class="success2">Request sent!</div>'));
die($output);












 

}else{

$output = json_encode(array('type'=>'message', 'text' => '<div class="errorXYZ">Request already sent!</div>'));
die($output);

}




}

	




	
?>