<?php
session_start();
include("../../config.php"); //include config file

$sql="SELECT * FROM tbl_researcher_project WHERE researcherID = '".$_SESSION['researcherSession']."' AND ProjectID = '".$_GET['projectid']."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);


$sql2="SELECT * FROM tbl_participant WHERE userID = '".$_GET['participantid']."' ";
$result2=mysql_query($sql2);
$row2=mysql_fetch_array($result2);


$sqlproject="SELECT * FROM tbl_project_request WHERE ProjectID = '".$_GET['projectid']."' AND researcherID = '".$_SESSION['researcherSession']."' AND userID = '".$_GET['participantid']."' ";
$resultproject=mysql_query($sqlproject);
$rowproject=mysql_fetch_array($resultproject);

?>


<!DOCTYPE html>
<html class="no-js">
    
    <head>

      


<script type="text/javascript">
    $(document).ready(function() {
    $('#myModal').modal('show');
});
</script>



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript" >



 $(document).ready(function() { 

     

$(".btn-send-payment").click(function() { 

        


var projectid       = $('input[name=projectid]').val();
var participantid       = $('input[name=participantid]').val();
var researcherid       = $('input[name=researcherid]').val();



$.ajax({
    url: 'send-payment/index.php?projectid='+projectid+'&participantid='+participantid+'&researcherid='+researcherid,
    cache: false,
    success: function(response) {
        var title = $(response).filter('#payment-complete-title');
        var receipt = $(response).filter('#receipt');
       
        //alert(result); // returns [object Object]
         $("#payment-info").hide();
         $(".photo-buttons").hide();
         $("#payment-complete-title").hide().html(title).slideDown();
         $("#receipt").hide().html(receipt).slideDown();
            
    }
});

    });
  
    $.noConflict();   
 });  


 
</script>





</head>
    
    <body>


<!-- Modal -->
<form>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       <br><div id='payment-complete-title'></div>
      </div>
      <div class="modal-body">
       
          

  <input type="hidden" name="projectid" id="projectid" value="<?php echo $_GET['projectid']; ?>"/>
  <input type="hidden" name="participantid" id="participantid" value="<?php echo $_GET['participantid']; ?>"/>
  <input type="hidden" name="researcherid" id="researcherid" value="<?php echo $_GET['researcherid']; ?>"/>


<?php if($rowproject['Payment'] == 'Paid'){ ?>

<div class="col-lg-12">
<h2>Ups. Looks like you already paid.</h2>
</div>

<?php }else{ ?>

<?php


$fee = (1 + $row['Pay']) * 2.9 / 100 + 0.30;

$payamount = $row['Pay'] + 1 + $fee;


$arr = explode('.', $payamount);
$payamount1  = $arr[0];
$payamount2  = $arr[1];

$payamount3 = substr($payamount2, 0, 2);


$payamount_final = $payamount1.'.'.$payamount3;




?>


<div class="col-lg-12">
<div id="payment-info">

<h2>You are about to pay $<?php echo $row['Pay']; ?> to <?php echo $row2['FirstName']; ?></h2> 

Note.: You will get charged $<?php echo $payamount_final; ?> (this includes the fees)

</div>
</div>        

<div id='receipt'></div>

<?php } ?>



      </div>

      <div class="modal-footer">
        <div class="col-lg-12">
      <?php if($rowproject['Payment'] != 'Paid'){ ?>
        <div class="photo-buttons">
        <button type="button" class="btn btn-cancel-photo" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-send-payment">Pay</button>
       </div>
       <?php } ?>
      </div>
    </div>
    </div>
  </div>
</div>

</form>


      <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>



  </body>

</html>

