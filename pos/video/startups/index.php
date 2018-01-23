<?php

 session_start();
 require_once '../base_path.php';
 include '../config.php';
 require_once('../algoliasearch-client-php-master/algoliasearch.php');

 $client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");

 $index = $client->initIndex('developers');

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
    
    <link href="<?php echo BASE_PATH; ?>/css/materialdesignicons.min.css"  rel="stylesheet">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">


      <!-- Popup CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/magnific-popup.css" rel="stylesheet">
    
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.html">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="<?php echo BASE_PATH; ?>/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="<?php echo BASE_PATH; ?>/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
                    <!--<li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-gmail"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="user-img"> <img src="images/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="images/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="images/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="images/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                       
                    </li>-->
                    <!-- /.dropdown-messages -->
                 
                    <!-- .Megamenu -->
                    <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Top 5 Startups</span> <i class="icon-options-vertical"></i></a>
                        <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Technology</li>
                                    <li><a href="form-basic.html">1</a></li>
                                    <li><a href="form-layout.html">2</a></li>
                                    <li><a href="form-advanced.html">3</a></li>
                                    <li><a href="form-material-elements.html">4</a></li>
                                    <li><a href="form-float-input.html">5</a></li>
                                
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Mobile</li>
                                    <li><a href="form-basic.html">1</a></li>
                                    <li><a href="form-layout.html">2</a></li>
                                    <li><a href="form-advanced.html">3</a></li>
                                    <li><a href="form-material-elements.html">4</a></li>
                                    <li><a href="form-float-input.html">5</a></li>
                                
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                   <li class="dropdown-header">Finance</li>
                                    <li><a href="form-basic.html">1</a></li>
                                    <li><a href="form-layout.html">2</a></li>
                                    <li><a href="form-advanced.html">3</a></li>
                                    <li><a href="form-material-elements.html">4</a></li>
                                    <li><a href="form-float-input.html">5</a></li>
                                 
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                   <li class="dropdown-header">Ecommerce</li>
                                    <li><a href="form-basic.html">1</a></li>
                                    <li><a href="form-layout.html">2</a></li>
                                    <li><a href="form-advanced.html">3</a></li>
                                    <li><a href="form-material-elements.html">4</a></li>
                                    <li><a href="form-float-input.html">5</a></li>
                                 
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- /.Megamenu -->
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?php echo BASE_PATH; ?>/images/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Steave</b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="<?php echo BASE_PATH; ?>/images/varun.jpg" alt="user" /></div>
                                    <div class="u-text">
                                        <h4>Steave Jobs</h4>
                                        <p class="text-muted">varun@gmail.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        

        <?php include '../left-sidebar.php'; ?>

        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
               
              
                       
                <!-- ============================================================== -->
                <!-- Main Screen Start -->
                <!-- ============================================================== -->
                <p>&nbsp;</p>


                <div class="row">

                    <?php 
                    
                    $sql = mysqli_query($connecDB,"SELECT * FROM startups ORDER BY id DESC");                    
                    while($row = mysqli_fetch_array($sql)){

                    ?>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="product-img">
                                <img src="https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/images/chair.jpg">
                                <div class="pro-img-overlay">

                                    <a href="www.youtube.com/watch?v=sK7riqg2mr4" class="popup-youtube bg-info"><i class="ti-eye"></i></a> 
                                    <a href="javascript:void(0)" class="bg-danger"><i class="ti-bookmark"></i></a>
                                    <a href="javascript:void(0)" class="bg-danger"><i class="ti-heart"></i></a>
                                </div>
                            </div>
                            <div class="product-text">
                                <span class="pro-price bg-danger">$15</span>
                                <h3 class="box-title m-b-0"><?php echo $row['Name'];?></h3>
                                <small class="text-muted db">
                                <br>
                                <span class="m-r-10"><i class="icon-calender"></i> May 16</span> 
                                <span class="m-r-10"><i class="fa fa-heart-o"></i> 38</a></span>  
                                    <i class="fa fa-industry"></i> <?php echo $row['Industry'];?></small>
                            </div>
                        </div>
                    </div>
                  
                   <?php } ?>
                   
                </div>

                <!--
                <div class="row">

                    <div class="main-screen">
                    
                    <?php 
                    
                    $sql = mysqli_query($connecDB,"SELECT * FROM startups ORDER BY id DESC");                    
                    while($row = mysqli_fetch_array($sql)){

                    ?>
                    <div class="col-md-4 col-lg-4 col-xs-12 col-sm-6"> 
                        <div class="white-box">
                            <a class="popup-youtube" href="www.youtube.com/watch?v=sK7riqg2mr4">
                            <img class="img-responsive" alt="user" src="<?php echo BASE_PATH; ?>/images/img1.jpg"></a><br>
                            <div class="text-muted">
                                <span class="m-r-10"><i class="icon-calender"></i> May 16</span> 
                            <span class="m-r-10"><i class="fa fa-heart-o"></i> 38</a></span>  
                            <i class="fa fa-heart-o"></i> <?php echo $row['Industry'];?></div>
                            <h3 class="m-t-20 m-b-20"><?php echo $row['Name'];?></h3>
                            
                            <a href="<?php echo BASE_PATH; ?>/startups/profile/<?php echo $row['userID']; ?>/" class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Visit Profile</a>

                        </div>
                    </div>

                    <?php } ?>

                    </div>
                    
                </div>-->

                 <!-- ============================================================== -->
                <!-- Main Screen End -->
                <!-- ============================================================== -->


             
               
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
    <script src="<?php echo BASE_PATH; ?>/js/jquery.min.js"></script>
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


     <!-- Magnific popup JavaScript -->
    <script src="https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>


    <!--Style Switcher -->
    <script src="<?php echo BASE_PATH; ?>/js/jQuery.style.switcher.js"></script>

    <script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
    <script src="app.js"></script>

</body>

</html>
