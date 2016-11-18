<?php
require_once '../../../config.php';
session_start();
$session_id='1'; //$session id


$profileimage = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$rowimage = mysqli_fetch_array($profileimage);

?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>

  <title><?php echo $row['userEmail']; ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="<?php echo BASE_PATH; ?>/css/font-awesome.css" rel="stylesheet" media="screen">




<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css"> 


<script type="text/javascript">
    $(document).ready(function() {
    $('#myModal').modal('show');
});
</script>



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript" >
 $(document).ready(function() { 

      $('#photoimg').live('change', function()      { 
        $(".btn-save-photo").prop("disabled",false);
                 $("#preview").html('');
          $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
      $("#imageform").ajaxForm({
            target: '#preview'
    }).submit();
      });

$(".btn-save-photo").click(function() { 
//alert("aads");
    $("#preview").html('');
          $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
      $("#imageform").ajaxForm({
            url: 'ajaximage.php',
            target: '#preview'
    }).submit();
    location.reload();
 }); 


        //}); 
$.noConflict(); 
 });  
</script>



</head>
    
    <body>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Image</h4>
      </div>
      <div class="modal-body">
        <p>
          
          

<div id='preview'>
    <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row2['userID']; ?>","param2":"<?php $_GET['id']; ?>"}'>
          <img src="../../../images/profile/<?PHP echo $rowimage['profile_image']; ?>" class="preview">
        </a>
</div>

<form id="imageform" method="post" enctype="multipart/form-data" action='preview.php'>
<div class="choose-a-file">
<input type="file" name="photoimg" id="photoimg" />
</div>
</form>


<div id="result-map"></div>





        </p>
      </div>
      <div class="modal-footer">
        <div class="photo-buttons">
        <button type="button" class="btn btn-cancel-photo" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-save-photo" disabled>Save</button>
       </div>
      </div>
    </div>

  </div>
</div>




      <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>



  </body>

</html>

