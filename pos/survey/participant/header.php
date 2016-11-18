
 <title>Circl</title>

         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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



<link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/shared-site2.css" />





 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="<?php echo BASE_PATH; ?>/assets/shared-site-89f30425b2032a2d15284a5f316ffc3c.js"></script>

  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--JAVASCRIPT-->




 <!-- jQuery Popup Overlay -->
<script src="<?php echo BASE_PATH; ?>/participant/project/js/jquery.popupoverlay.js"></script>


    <link rel="stylesheet" type="text/css" href="/css/result-light.css">



<script type="text/javascript" src="<?php echo BASE_PATH; ?>/participant/js/rating.js"></script>
<script language="javascript" type="text/javascript">
$(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: 'processRating',
        imageDirectory: '../../../images/',
        inputAttr: 'postID'
    });
});

function processRating(val, attrVal){
    $.ajax({
        type: 'POST',
        url: '../../../participant/rating.php',
        data: 'postID='+attrVal+'&ratingPoints='+val,
        dataType: 'json',
        success : function(data) {
            if (data.status == 'ok') {
                //alert('You have rated '+val+'');
                alert('Thank you for rating!');
                $('#avgrat').text(data.average_rating);
                $('#totalrat').text(data.rating_number);
            }else{
                alert('Some problem occured, please try again.');
            }
        }
    });
}
</script>



