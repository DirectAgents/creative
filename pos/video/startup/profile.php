<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 

 $sql = "SELECT * FROM tbl_entrepreneur WHERE userID ='".$_GET['id']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row = mysqli_fetch_array($result);




 $sql = "SELECT * FROM startups WHERE userID ='".$_GET['id']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_startup = mysqli_fetch_array($result);

/*

$investor_home = new INVESTOR();

if($investor_home->is_logged_in())
{
  $investor_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect(''.BASE_PATH.'');
}

*/


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
        <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
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
        <!-- animation CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/animate.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/style.css" rel="stylesheet">
        <!-- color CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/blue-dark.css" id="theme" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
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
            $('#upload_widget_multiple').click(function() {
                //alert("add");
                cloudinary.openUploadWidget({ upload_preset: preset_name, sources: ['local', 'url', 'image_search'], multiple: false },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $("#preview").show();
                            $('#preview').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 200, crop: "fill" }] }) + '\" />')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview').html('<input type="checkbox" style="display:none" name="team_member_headshot[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

            $('#upload_widget_multiple_company').click(function() {
                //alert("add");
                cloudinary.openUploadWidget({ upload_preset: preset_name, sources: ['local', 'url', 'image_search'], multiple: false },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $("#preview").show();
                            $('#preview').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 200, crop: "fill" }] }) + '\" />')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview').html('<input type="checkbox" style="display:none" name="company_logo[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

        });
        //]]>
        </script>




    </head>

    <body class="fix-header">
        <!-- ============================================================== -->
        <!-- Preloader -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Wrapper -->
        <!-- ============================================================== -->
        <div id="wrapper">
          

        <?php include '../nav.php'; ?>

            <!-- End Top Navigation -->
            

        <?php include '../left-sidebar.php'; ?>
        

            <!-- ============================================================== -->
            <!-- Page Content -->
            <!-- ============================================================== -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Profile page</h4> </div>

                       
                    </div>
                    <!-- /.row -->
                    <!-- .row -->
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="white-box">
                                <div class="user-bg">
                                    <div class="overlay-box">
                                        <div class="user-content">
                                            <a href="javascript:void(0)"><img src="https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img"></a>
                                            <div id="fullname">
                                                <h4 class="text-white"><?php echo $row['Fullname'];?></h4>
                                            </div>
                                            <div id="position">
                                                <?php if($row['Position'] != ''){ ?>
                                                <h5 class="text-white"><?php 
                                                //echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row['City'])))).', '.$row['State'];
                                                echo $row['Position'];
                                                ?></h5>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-btm-box">
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-purple">
                                            <div id="facebook">
                                                <a href="<?php echo $row['Facebook'];?>"><i class="ti-facebook"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-blue">
                                            <div id="twitter">
                                                <a href="<?php echo $row['Twitter'];?>"><i class="ti-twitter"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-danger">
                                            <div id="linkedin">
                                                <a href="<?php echo $row['Linkedin'];?>"><i class="ti-linkedin"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <p>&nbsp;</p>
                                 <div class="col-md-12 col-sm-12 text-center">
                                    <a href="javascript: void(0);" target="_blank" class="btn btn-danger hidden-xs hidden-sm waves-effect waves-light">Connect +</a>
                                 </div>   

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                <ul class="nav nav-tabs tabs customtab">
                                    <li class="tab active">
                                        <a href="#company" id="company-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Company</span> </a>
                                    </li>
                                    <?php //if(!isset($_SESSION['entrepreneurSession'])){ ?>
                                    <li class="tab">
                                        <a href="#team" id="team-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Meet the Team</span> </a>
                                    </li>
                                   <?php //} ?>
                                    <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $_GET['id']) { ?>
                                    <li class="tab">
                                        <a href="#connections" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Connections</span> </a>
                                    </li>
                                    <!--
                                    <li class="tab">
                                        <a href="#messages" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Messages</span> </a>
                                    </li>
                                        -->

                                    <li class="tab">
                                        <a href="#video" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Video</span> </a>
                                    </li>

                                    <li class="tab">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                                    </li>
                                    <?php } ?>
                                </ul>


                                <div class="tab-content">

            <!-- ============================================================== -->
            <!-- Company Tab Starts -->
            <!-- ============================================================== -->
                    <div class="tab-pane active" id="company">
                            
                     <form class="form-horizontal form-material" id="save-company">
                            
                       

                       
                        
                      
                        
                         
                      
                        
                              
                                
                             <div id="thecompany"></div>
                    
                               
                                        

                                


                            <div id="upload-logo">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_company">Upload Logo</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview"></ul>
                                                            <div id="url_preview"><input type="checkbox" style="display:none" name="company_logo[]" value="<?php echo $row_startup['Logo']; ?>" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                </div>
                                            </div>
                                </div>


                        <div id="save-cancel">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-company" style="margin-right:10px;">Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-company">Cancel</button>
                                    </div>
                                </div>
                         </div>       



                             </form>   

                                          
                                    </div>
            <!-- ============================================================== -->
            <!-- Company Tab Ends -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Meet the Team Tab Starts -->
            <!-- ============================================================== -->
             <div class="tab-pane" id="team">

                <form class="form-horizontal form-material" id="save-team-member">
                        <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $_GET['id']) { ?>
                        <div id="add-a-team-member">
                             <div class="col-sm-12" style="padding-left:15px">
                                         <div class="row"> 
                                            <button class="btn btn-default btn-outline add-team-member pull-left">Add a Team Member</button>
                                        </div>
                            </div> 
                             <p>&nbsp;</p>  
                         </div>  
                        <?php } ?>  
                
                        <div id="existing-team-members">
                                  
                                    

                        <div class="row">              

                                        <?php
                                $sql = mysqli_query($connecDB,"SELECT * FROM tbl_team WHERE userID = '".$_GET['id']."' ORDER BY id DESC");
                                while($row_team = mysqli_fetch_array($sql)){  
                                        ?>
                                        
                    <div id="team-tab-data">
                                
                        <div class="col-md-6 col-xs-12">
                            <div class="user-btm-box-team">
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-purple">
                                            <div id="facebook">
                                                <a href="<?php echo $row_team['Facebook'];?>"><i class="ti-facebook"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-blue">
                                            <div id="twitter">
                                                <a href="<?php echo $row_team['Twitter'];?>"><i class="ti-twitter"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-danger">
                                            <div id="linkedin">
                                                <a href="<?php echo $row_team['Linkedin'];?>"><i class="ti-linkedin"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            <div class="white-box border">
                                <div class="user-bg">
                                    <div class="overlay-box-grey">
                                        <div class="user-content">
                                            <a href="javascript:void(0)">
                                            <?php if($row_team['ProfileImage'] != '') { ?>
                                            <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/<?php echo $row_team['ProfileImage'];?>" class="thumb-lg img-circle" alt="img">  
                                            <?php }else{ ?>
                                           <img src="https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img">
                                            <?php } ?>
                                              
                                            </a>
                                            <div id="fullname">
                                                <h4 class="text-black"><?php echo $row_team['Fullname']; ?></h4>
                                            </div>
                                            <div id="city-state">
                                                <?php if($row['City'] != ''){ ?>
                                                <h5 class="text-black"><?php echo $row_team['Position']; ?></h5>
                                                <?php } ?>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                 <div class="user-btm-box">
                                    
                                    

                                        <?php 
                                        $ctop = $row_team['Skills']; 
                                        $ctop = explode(',',$ctop); 

                                        if($row_team['Skills'] != '' && $row_team['Skills'] != 'NULL' ){

                                        foreach($ctop as $skill)   { 
                                                       
                                        ?>
                                        <div class="skillsdiv_teammember"><?php echo $skill; ?></div>

                                        <?php } } ?>

                                        
                                        
                                </div>
                                
                                <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $_GET['id']) { ?>

                                <hr>
                                           
                                            <div class="pull-right" style="padding-right:15px;">
                                            <a href="#" id="edit-member-<?php echo $row_team['id']; ?>" data-id="<?php echo $row_team['id']; ?>"><i class="ti-pencil"><label class="edit-team-member">Edit</i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="#" id="delete-member-<?php echo $row_team['id']; ?>" data-id="<?php echo $row_team['id']; ?>"><i class="ti-trash"><label class="delete-team-member">Delete</label> </i></a>
                                            </div>
                                            <br>
                                <?php } ?>
                                            
                            </div>
                          
                                           

<script>
 

 $("#edit-member-"+<?php echo $row_team['id']; ?>).click(function (e) {
    e.preventDefault();

    var url_link = 'http://localhost/creative/pos/video/startup/';

    var data_id = $("#edit-member-"+<?php echo $row_team['id']; ?>).attr("data-id");
    //alert(data_id);

    //alert(userid);
    $.ajax({
            url: url_link+"edit-member.php", 
            method: "POST",
            data: {id: data_id},
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#existing-team-members").html(response);

                $("#upload-headshot").show();
                $("#save-cancel").show();
                $("#preview").hide();
                

            }
        });


});


//////Delete Team Member/////////

    $('#delete-member-'+<?php echo $row_team['id']; ?>).click(function(e) {
        e.preventDefault();
        
        var url_link = 'http://localhost/creative/pos/video/startup/';

        var data_id = $("#edit-member-"+<?php echo $row_team['id']; ?>).attr("data-id");
        //var userid = $("input[name=userid]").val();
        //alert(data.id);


        ConfirmDialog('Are you sure');

        function ConfirmDialog(message) {
            $('<div></div>').appendTo('body')
                .html('<div><h6>' + message + '?</h6></div>')
                .dialog({
                    modal: true,
                    zIndex: 10000,
                    autoOpen: true,
                    width: 'auto',
                    resizable: false,
                    buttons: {
                        Yes: function() {
                            // $(obj).removeAttr('onclick');                                
                            // $(obj).parents('.Parent').remove();

                            //$('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');

                            $(this).dialog("close");

                            $.ajax({
                                url: url_link+"delete-team-member.php",
                                method: "POST",
                                data: {id: data_id},
                                dataType: "html",
                                success: function(response) {
                                    //alert(data);
                                    $('#deleted').fadeIn("fast");
                                    $('#deleted').delay(2000).fadeOut("slow");

                                }
                            });

                            e.preventDefault();
                        },
                        No: function() {

                            //$('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');

                            $(this).dialog("close");
                        }
                    },
                    close: function(event, ui) {
                        $(this).remove();
                    }
                });
        };


    });






</script>   


                                        </div>


                                          
                                          
                                           
                                        </div>

                                        <?php } ?>
                                        </div>  
                                    </div>


                                <div id="upload-headshot">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple">Upload Headshot</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview"></ul>
                                                            <div id="url_preview"><input type="checkbox" style="display:none" name="team_member_headshot[]" value="<?php echo $row_team['ProfileImage']; ?>" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                </div>
                                            </div>

                       
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-team-member" style="margin-right:10px;">Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-team-member">Cancel</button>
                                    </div>
                                </div>
                        

                                </div>

                           

                             </form>   


                            
                            </div>
            <!-- ============================================================== -->
            <!-- Meet the Team Tab Ends -->
            <!-- ============================================================== -->
            

            <!-- ============================================================== -->
            <!-- Connections Tab Starts -->
            <!-- ============================================================== -->

                                    <div class="tab-pane" id="connections">
                                        <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny footable-loaded footable tablet breakpoint">
                                            <thead>
                                                <tr>
                                                    <th data-toggle="true" class="footable-sortable footable-visible footable-first-column"> Investor <span class="footable-sort-indicator"></span></th>
                                                    <th data-hide="phone" class="footable-sortable footable-visible footable-last-column"> Link <span class="footable-sort-indicator"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                    
                                        //$sql = mysqli_query($connecDB,"SELECT * FROM tbl_connections_startup WHERE startupID = '".$."' ORDER BY id DESC");                    
                                        //while($row = mysqli_fetch_array($sql)){
                                        ?>
                                                <tr class="footable-even" style="display: table-row;">
                                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Isidra</td>
                                                    <td class="footable-visible footable-last-column"><span class="label label-table label-success">Profile</span></td>
                                                </tr>
                                                <?php //} ?>
                                            </tbody>
                                        </table>
                                    </div>
            <!-- ============================================================== -->
            <!-- Connections Tab Ends -->
            <!-- ============================================================== -->
                                   
                                    
            <!-- ============================================================== -->
            <!-- Videos Tab Starts -->
            <!-- ============================================================== -->
                                    <div class="tab-pane" id="video">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_fullname" name="fm_fullname" value="<?php echo $row['Fullname'];?>" placeholder="Johnathan Doe" class="form-control form-control-line"> </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success btn-update-profile">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

            <!-- ============================================================== -->
            <!-- Videos Tab Ends -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Settings Tab Starts -->
            <!-- ============================================================== -->
                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal form-material" id="update-profile">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_fullname" name="fm_fullname" value="<?php echo $row['Fullname'];?>" placeholder="Johnathan Doe" class="form-control form-control-line"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Position</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_position" name="fm_position" placeholder="eg. CEO" value="<?php echo $row['Position'];?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" id="fm_email" name="fm_email" value="<?php echo $row['Email'];?>" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_phone" name="fm_phone" placeholder="Phone Number" value="<?php echo $row['Phone'];?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Location</label>
                                                <div class="col-md-12">
                                                    <div class="zip">
                                                        <input type="text" maxlength="5" placeholder="Type your zip code" class="form-control form-control-line zip-textinput">
                                                        <input type="text" id="fm_location" name="fm_location" maxlength="5" placeholder="123 456 7890" class="form-control form-control-line city-state-textinput">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Skills Set</label>
                                                <div class="col-md-4">
                                                    <input type="text" id="fm_skills" name="fm_skills" placeholder="Enter Skill" class="form-control form-control-line">
                                                </div>
                                               
                                                <div class="col-md-8">
                                                    <button class="btn btn-add" id="add-skills"><span class="glyphicon glyphicon-plus"></span> Add</button>
                                                </div>
                                                <div class="col-md-12" style="padding:15px 0 0 0;">
                                                    <div id="responds">
                                                        <?php
                                                        //include db configuration file

                                                        echo '<input type="hidden" name="userid" id="userid" value="'.$_GET['id'].'">';


                                                        //MySQL query
                                                        $Result = mysqli_query($connecDB,"SELECT * FROM tbl_entrepreneur WHERE userID ='".$_GET['id']."' ");


                                                        //get all records from add_delete_record table
                                                        $row2 = mysqli_fetch_array($Result);




                                                        $ctop = $row2['Skills']; 
                                                        $ctop = explode(',',$ctop); 



                                                        if($row2['Skills'] != '' && $row2['Skills'] != 'NULL' ){



                                                        foreach($ctop as $skill)  
                                                        { 
                                                            //Uncomment the last commented line if single quotes are showing up  
                                                            //otherwise delete these 3 commented lines 


                                                        //get skill string
                                                        $ret = explode('(', $skill);
                                                        $skill_string =  $ret[0];
                                                            

                                                        //MySQL query
                                                        $sqlskill = mysqli_query($connecDB,"SELECT * FROM skills WHERE skill = '".$skill_string."' ");
                                                        $row3 = mysqli_fetch_array($sqlskill);


                                                        echo '<div id="item_'.$row3['id'].'">';
                                                        echo '<div class="skillsdiv">';
                                                        if(in_array($skill,$ctop)){
                                                        echo '<input id="skillselection_'.$row3['id'].'" name="skillselection[]" type="checkbox"  value="'.$skill.'" style="display:none" checked/>';
                                                        }
                                                        echo '<div class="del_wrapper">';
                                                        echo '<div class="the-skill">';
                                                        echo $skill;
                                                        echo '</div>';
                                                        echo '<a href="#" class="del_button" id="del-'.$row3['id'].'">';
                                                        echo '<img src="'.BASE_PATH.'/images/icon_del.gif" border="0" class="icon_del" />';
                                                        echo '</a></div>';
                                                        //echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                        } 



                                                        }





                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                        <input type="text" id="fm_facebook" name="fm_facebook" value="<?php echo $row['Facebook'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                        <input type="text" id="fm_twitter" name="fm_twitter" value="<?php echo $row['Twitter'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Linkedin</label>
                                                        <input type="text" id="fm_linkedin" name="fm_linkedin" value="<?php echo $row['Linkedin'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="form-group">
                                                <label class="col-md-12">About Me</label>
                                                <div class="col-md-12">
                                                    <textarea id="fm_about" name="fm_about" rows="5" class="form-control form-control-line">
                                                        <?php echo $row['About'] ;?>
                                                    </textarea>
                                                </div>
                                            </div>-->
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success btn-update-profile">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
            <!-- ============================================================== -->
            <!-- Settings Tab Ends -->
            <!-- ============================================================== -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                     <div id="saved">Saved Successfully</div>
                     <div id="deleted">Deleted Successfully</div>
                  
                </div>
                <!-- /.container-fluid -->
                <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/bootstrap.min.js"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/sidebar-nav.min.js"></script>
        <!--slimscroll JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/jquery.slimscroll.js"></script>
        <!--Wave Effects -->
        <script src="<?php echo BASE_PATH; ?>/js/waves.js"></script>
        <!--Counter js -->
        <script src="<?php echo BASE_PATH; ?>/js/jquery.waypoints.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/jquery.counterup.min.js"></script>
        <!--Morris JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/raphael-min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/morris.js"></script>
        <!-- chartist chart -->
        <script src="<?php echo BASE_PATH; ?>/js/chartist.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/chartist-plugin-tooltip.min.js"></script>
        <!-- Calendar JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/moment.js"></script>
        <script src='<?php echo BASE_PATH; ?>/js/fullcalendar.min.js'></script>
        <script src="<?php echo BASE_PATH; ?>/js/cal-init.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/custom.min.js"></script>
        <!-- Custom tab JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/cbpFWTabs.js"></script>
        <script type="text/javascript">
        (function() {
            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });
        })();
        </script>
        <script src="<?php echo BASE_PATH; ?>/js/jquery.toast.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/profile-entrepreneur.js"></script>
        <!--Style Switcher -->
        <script src="<?php echo BASE_PATH; ?>/js/jQuery.style.switcher.js"></script>
    </body>

    </html>