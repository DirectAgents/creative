<?php


session_start();
require_once '../../../base_path.php';

include("../../../config.php"); //include config file
include("../../..//config.inc.php");
require_once '../../../class.startup.php';
require_once '../../../class.participant.php';




date_default_timezone_set('America/New_York');


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../login');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$wepay = mysql_query("SELECT * FROM wepay WHERE id = '".$_GET['id']."'");
$rowwepay = mysql_fetch_array($wepay);


/*
$stmtparticipant="SELECT * FROM tbl_participant WHERE userID='".$_GET['participantid']."' ";
$resultparticipant=mysql_query($stmtparticipant);
$rowparticipant=mysql_fetch_array($resultparticipant);
*/



$update_sql = "UPDATE wepay SET 
  refundrequest='yes',
  refundreason= '".$_GET['refundreason']."'

  WHERE id='".$_GET['id']."'";


  mysql_query($update_sql);






?>




<div class="success2">Refund Request Sent!</div>

