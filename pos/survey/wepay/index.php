<?php
require './_shared.php';


session_start();
require_once '../class.participant.php';
include_once("../config.php");


$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../participant/login.php');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




//header("Location: http://localhost/survey/wepay/oauth2/token/?client_id=131244&redirect_uri=http://localhost/survey/wepay/oauth2/token/&client_secret=5a612c797c&code=".$_GET['code']."");

?>

<h1>WePay Demo App</h1>
<?php if (empty($_SESSION['wepay_access_token'])): ?>

<a href="login.php">Log in with WePay</a>

<?php else: ?>

<a href="user.php">User info</a>
<br />
<a href="openaccount.php">Open new account</a>
<br />
<a href="accountlist.php">Account list</a>
<br />
<a href="logout.php">Log out</a>

<?php endif; ?>
