<?php

//session_start();
require_once(__DIR__."../../../config.php");
require_once(__DIR__."../../../base_path.php");



if($_GET['projectid'] != ''){

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_feedbacks  WHERE ProjectID = '".$_GET['projectid']."' AND userID = '".$_GET['userid']."'");
$row = mysqli_fetch_array($sql);	

if(mysqli_num_rows($sql)== 1) {


if($row['videoID_Answer1_Question1'] == '') {

?>

<a data-toggle="modal" data-id="PossibleAnswer1_Question1" title="Record Feedback" class="slide-video-feedback_open" href="#">Record Feedback</a>


<?php }else{ ?>


<a data-toggle="modal" data-id="PossibleAnswer1_Question1_Recorded" data-video="<?php echo $row['videoID_Answer1_Question1']; ?>"  title="View Recording" class="slide-video-feedback-recorded_open" href="#">View Recording</a>



<?php } ?>


<?php } ?>


<?php } ?>

