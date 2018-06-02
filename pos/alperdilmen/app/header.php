<?php

 require_once('algoliasearch-client-php-master/algoliasearch.php');





?> 
 


   <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
        <title>XYZ</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo BASE_PATH; ?>/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/bootstrap/bootstrap.css" rel="stylesheet">
        <!-- Menu CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/sidebar-nav.min.css" rel="stylesheet">
        <!-- toast CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/jquery.toast.css" rel="stylesheet">
        <!-- morris CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/morris.css" rel="stylesheet">
        <!-- chartist CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/chartist.min.css" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/css/chartist-plugin-tooltip.css" rel="stylesheet">
        <!-- Calendar CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/fullcalendar.css" rel="stylesheet" />
        <!--alerts CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/sweetalert.css" rel="stylesheet" type="text/css">
        <!-- Footable CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/footable.core.css" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/css/bootstrap-select.min.css" rel="stylesheet" />
        <!-- animation CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/animate.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/style.css" rel="stylesheet">
        <!-- color CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/blue-dark.css" id="theme" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/css/materialdesignicons.min.css" rel="stylesheet">
        <!-- Fontawesome -->
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Multiple Selection -->
        <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/chosen.css">
        

        <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>






    <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">


      <!-- Popup CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/magnific-popup.css" rel="stylesheet">



<!-- Add jQuery library -->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>





    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
        <!--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.min.js"></script>-->
        <script type="text/javascript" src="https://res.cloudinary.com/demo/raw/upload/v1425809551/jquery.cloudinary_t0p9km.js"></script>
        <script type="text/javascript" src="https://widget.cloudinary.com/global/all.js"></script>

         <script type="text/javascript">
        //<![CDATA[
        $(window).load(function() {
            var cloud_name = 'dgml9ji66';
            var preset_name = 'scnk5xom';
            if (cloud_name != '' && preset_name != '') $('#message').remove();


            $.cloudinary.config({ cloud_name: cloud_name });
            cloudinary.setCloudName(cloud_name);
            $('#upload_widget_multiple_team').click(function() {
                //alert("add");
                cloudinary.openUploadWidget({ upload_preset: preset_name, sources: ['local', 'url', 'image_search'], multiple: false },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $("#preview_team").show();
                            $('#preview_team').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 88, height: 88, crop: "fill" }] }) + '\" />')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview_team').html('<input type="checkbox" style="display:none" name="team_member_headshot[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

            $('#upload_widget_multiple_logo').click(function() {
                //alert("add");
                cloudinary.openUploadWidget({ upload_preset: preset_name, sources: ['local', 'url', 'image_search'], multiple: false },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $("#preview_logo").show();
                            $("#preview_edit_logo").hide();
                            $('#preview_logo').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 88, height: 88, crop: "fill" }] }) + '\" class="thumb-lg img-circle" />')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview_logo').html('<input type="checkbox" style="display:none" name="company_logo[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

            $('#upload_widget_multiple_screenshot').click(function() {
                //alert("add");
                //added max_files: '1' but not tested yet 
                cloudinary.openUploadWidget({ upload_preset: preset_name, sources: ['local', 'url', 'image_search'], multiple: false, max_files: '1' },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $("#preview_screenshot").show();
                            $("#preview_edit_screenshot").hide();
                            $('#preview_screenshot').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 200, crop: "fill" }] }) + '\"/>')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview_screenshot').html('<input type="checkbox" style="display:none" name="video_screenshot[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

            $('#upload_widget_multiple_resume').click(function() {
                //alert("add");
                cloudinary.openUploadWidget({ upload_preset: 'bzg3asb5', sources: ['local', 'url', 'image_search'], multiple: false, client_allowed_formats : ['pdf'] },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $( ".save-resume" ).removeClass( "hidden" );
                            $( ".cancel-resume" ).removeClass( "hidden" ); 
                            $(".save-resume").show();
                            $("#preview_resume").show();
                            $("#preview_edit_resume").hide();
                            $('#preview_resume').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 200, crop: "fill" }] }) + '\"/>')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview_resume').html('<input type="checkbox" style="display:none" name="resume[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

        });
        //]]>
        </script>



    </head>