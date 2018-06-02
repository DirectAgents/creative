<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){

	

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$_POST['requester_id']."'");
if(mysqli_num_rows($sql) > 0 ) {
$row= mysqli_fetch_array($sql);



$sql_requested = "SELECT * FROM tbl_users WHERE userID ='".$_POST['requested_id']."'";  
$result = mysqli_query($connecDB, $sql_requested);  
$row_requested = mysqli_fetch_array($result);


//if($row_entrepreneur['Type'] == 'StartupE'){ $type = 'StartupE';} 
//if($row_entrepreneur['Type'] == 'Investor'){ $type = 'Investor';}   


date_default_timezone_set('America/New_York');
$date = date("Y-m-d");
$time = date('h:i:s A');  


if($row['Type'] == 'StartupE'){



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_startup(my_id, requester_id, requested_id, Type, Time, Date) 
	VALUES('".$_POST['requester_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."', '".$row_requested['Type']."' , '".$time."', '".$date."')");

$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_investor(my_id, requester_id, requested_id, Type, Time, Date) 
	VALUES('".$_POST['requester_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."', '".$row['Type']."' , '".$time."', '".$date."')");

}


if($row['Type'] == 'Investor'){

//echo $row['Type'];


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_startup(my_id, requester_id, requested_id, Type, Time, Date) 
	VALUES('".$_POST['requester_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."', '".$row['Type']."' , '".$time."', '".$date."')");

$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_investor(my_id, requester_id, requested_id, Type, Time, Date) 
	VALUES('".$_POST['requester_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."', '".$row_requested['Type']."' , '".$time."', '".$date."')");

}













if($row['ProfileImage'] == 'Google'){ 
    $image =  '<img src="'.$row['google_picture_link'].'" style="border-radius:50%; height:120px; width:120px">';
} 

if($row['ProfileImage'] == 'Facebook'){

$image = '<img src="https://graph.facebook.com/'.$row['facebook_id'].'/picture?type=large" style="border-radius:50%; height:120px; width:120px">';
}

if($row['ProfileImage'] == 'Linkedin'){
   $image =  '<img src="'.$row['linkedin_picture_link'].'" style="border-radius:50%; height:120px; width:120px" >';
} 



// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email($row['Fullname']. " wants to connect with you", "support@valifyit.com");
$subject = $row['Fullname']. " wants to connect with you";
$to = new SendGrid\Email('', $row_requested['Email']);
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
                            <img alt="Logo" src="http://valifyit.com/images/email/email-logo-large.jpg" width="132" height="48" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
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
                                    <div style="display:inline-block; margin: 0 -2px; max-width:600px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                 <td align="center" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                              
                                              <a href="'.BASE_PATH.'/profile/'.$row['username'].'">
                                    
								'.$image.'

</a>
                                              
                                              
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="center" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                '.$row['Fullname'].'
                                                </td>
                                            </tr>

                                               <tr>
                                                 <td align="center" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                '.str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row['City'])))).', '.$row['State'].'
                                                </td>
                                            </tr>


                                            <tr>
                                                 <td align="center" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                               &nbsp;
                                                </td>
                                            </tr>


                                              <tr>
                                                 <td align="center" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">

                                              <a href="'.BASE_PATH.'/connections/" style="text-decoration:none; color:#fff; background:#ff7676; padding:10px; border: 1px solid #ff7676; border-radius: 3px;">Connect +</a>

                                                </td>
                                            </tr>

                                             
                                            
                                             
                                        </table>
                                    </div>
                                   
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
                        <img alt="Logo" src="http://valifyit.com/images/email/email-logo-small.jpg" width="110" height="34" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                           </td>
                     </tr>

                   
            </table>



            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 600px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        245 5th Ave Suite 201, New York, NY 10001
                           </td>
                     </tr>

                      <tr>
                      <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">   
                        <a href="http://valifyit.com/terms/" target="_blank" style="color: #666666; text-decoration: none;">Terms of Service</a> | <a href="http://valifyit.com/privacy/" target="_blank" style="color: #666666; text-decoration: none;">Privacy</a>  | <a href="http://valifyit.com/faq/" target="_blank" style="color: #666666; text-decoration: none;">FAQ</a></td>
                       
                        
 
                   
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


            


}

}

?>