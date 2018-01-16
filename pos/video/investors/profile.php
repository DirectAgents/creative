<?php

 session_start();
 include_once("../config.php"); 

 $sql = "SELECT * FROM profile WHERE id='15'";  
 $result = mysqli_query($connecDB, $sql);  
 $row = mysqli_fetch_array($result);

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
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="css/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="css/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="css/chartist.min.css" rel="stylesheet">
    <link href="css/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="css/fullcalendar.css" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/blue-dark.css" id="theme" rel="stylesheet">
    
    <link href="css/materialdesignicons.min.css"  rel="stylesheet">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">
    

    

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
                        <!--This is dark logo icon--><img src="images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="images/admin-text-dark.png" alt="home" class="light-logo" />
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
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="images/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Steave</b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="images/varun.jpg" alt="user" /></div>
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
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu"></span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="images/varun.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"> Steve Gection<span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profile</span></a></li>
                            <li><a href="javascript:void(0)"><i class="ti-wallet"></i> <span class="hide-menu">My Balance</span></a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> <span class="hide-menu">Inbox</span></a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
                        </ul>
                    </li>
                   
                 
                   
                    <li><a href="inbox.html" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">Startups<span class="fa arrow"></span></span></a>
                       
                    </li>
                    
                    <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Industry<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="javascript:void(0)"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Technology</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Mobile</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Finance</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Ecommerce</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">B2B Services</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Consumer Products</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Consulting</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Big Data</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Education</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Travel</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Entertainment</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Fashion</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Healthcare</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Real Estate</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Food and Beverages</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Art and Design</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Health, Fitness and Wellness</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Human Resources</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Other</span></a> </li>
                            
                           
                            
                            <!--<li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Third Level </span><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li> <a href="javascript:void(0)"><i class=" fa-fw">T</i><span class="hide-menu">Third Level Item</span></a> </li>
                                    <li> <a href="javascript:void(0)"><i class=" fa-fw">M</i><span class="hide-menu">Third Level Item</span></a> </li>
                                    <li> <a href="javascript:void(0)"><i class=" fa-fw">R</i><span class="hide-menu">Third Level Item</span></a> </li>
                                    <li> <a href="javascript:void(0)"><i class=" fa-fw">G</i><span class="hide-menu">Third Level Item</span></a> </li>
                                </ul>
                            </li>-->
                            
                        </ul>
                    </li>
                    
                    <li class="devider"></li>
                  
                   
                   
                   <li><a href="login.html" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            

<div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <a href="javascript: void(0);" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
                       
                    </div>
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
                                        <h4 class="text-white">Jon Snow</h4>
                                        <h5 class="text-white">info@myadmin.com</h5> </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                     </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                   <p class="text-danger"><img src="../images/angel-list-icon.jpg"/></p>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <ul class="nav nav-tabs tabs customtab">
                               
                                <li class="tab active">
                                    <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                                </li>
                                <li class="tab">
                                    <a href="#new" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Connections</span> </a>
                                </li>
                                <li class="tab">
                                    <a href="#messages" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Messages</span> </a>
                                </li>
                                <li class="tab">
                                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                
                                <div class="tab-pane" id="profile">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                            <br>
                                            <p class="text-muted">Jon Snow</p>
                                        </div>
                                        
                                        
                                        <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                            <br>
                                            <p class="text-muted">London</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                    
                                    <h4 class="font-bold m-t-30">Skill Set</h4>
                                    <hr>
                                    <h5>Wordpress <span class="pull-right">80%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5>HTML 5 <span class="pull-right">90%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5>jQuery <span class="pull-right">50%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5>Photoshop <span class="pull-right">70%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="new">
                                    <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny footable-loaded footable tablet breakpoint">
                                        <thead>
                                            <tr>
                                                <th data-toggle="true" class="footable-sortable footable-visible footable-first-column"> Startup <span class="footable-sort-indicator"></span></th>
                                                <th class="footable-sortable footable-visible"> Contact Partner <span class="footable-sort-indicator"></span></th>
                                                <th data-hide="phone" class="footable-sortable footable-visible footable-last-column"> Link <span class="footable-sort-indicator"></span></th>
                                                <th data-hide="all" class="footable-sortable" style="display: none;"> DOB <span class="footable-sort-indicator"></span></th>
                                                <th data-hide="all" class="footable-sortable" style="display: none;"> Status <span class="footable-sort-indicator"></span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="footable-even" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Isidra</td>
                                                <td class="footable-visible">Boudreaux</td>
                                                <td class="footable-visible footable-last-column">Traffic Court Referee</td>
                                                <td style="display: none;">22 Jun 1972</td>
                                                <td style="display: none;"><span class="label label-table label-success">Active</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Shona</td>
                                                <td class="footable-visible">Woldt</td>
                                                <td class="footable-visible footable-last-column">Airline Transport Pilot</td>
                                                <td style="display: none;">3 Oct 1981</td>
                                                <td style="display: none;"><span class="label label-table label-inverse">Disabled</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Granville</td>
                                                <td class="footable-visible">Leonardo</td>
                                                <td class="footable-visible footable-last-column">Business Services Sales Representative</td>
                                                <td style="display: none;">19 Apr 1969</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Easer</td>
                                                <td class="footable-visible">Dragoo</td>
                                                <td class="footable-visible footable-last-column">Drywall Stripper</td>
                                                <td style="display: none;">13 Dec 1977</td>
                                                <td style="display: none;"><span class="label label-table label-success">Active</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Maple</td>
                                                <td class="footable-visible">Halladay</td>
                                                <td class="footable-visible footable-last-column">Aviation Tactical Readiness Officer</td>
                                                <td style="display: none;">30 Dec 1991</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Maxine</td>
                                                <td class="footable-visible"><a href="#">Woldt</a></td>
                                                <td class="footable-visible footable-last-column"><a href="#">Business Services Sales Representative</a></td>
                                                <td style="display: none;">17 Oct 1987</td>
                                                <td style="display: none;"><span class="label label-table label-inverse">Disabled</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Lorraine</td>
                                                <td class="footable-visible">Mcgaughy</td>
                                                <td class="footable-visible footable-last-column">Hemodialysis Technician</td>
                                                <td style="display: none;">11 Nov 1983</td>
                                                <td style="display: none;"><span class="label label-table label-inverse">Disabled</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Lizzee</td>
                                                <td class="footable-visible"><a href="#">Goodlow</a></td>
                                                <td class="footable-visible footable-last-column">Technical Services Librarian</td>
                                                <td style="display: none;">1 Nov 1961</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Judi</td>
                                                <td class="footable-visible">Badgett</td>
                                                <td class="footable-visible footable-last-column">Electrical Lineworker</td>
                                                <td style="display: none;">23 Jun 1981</td>
                                                <td style="display: none;"><span class="label label-table label-success">Active</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Lauri</td>
                                                <td class="footable-visible">Hyland</td>
                                                <td class="footable-visible footable-last-column">Blackjack Supervisor</td>
                                                <td style="display: none;">15 Nov 1985</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Isidra</td>
                                                <td class="footable-visible">Boudreaux</td>
                                                <td class="footable-visible footable-last-column">Traffic Court Referee</td>
                                                <td style="display: none;">22 Jun 1972</td>
                                                <td style="display: none;"><span class="label label-table label-success">Active</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Shona</td>
                                                <td class="footable-visible">Woldt</td>
                                                <td class="footable-visible footable-last-column">Airline Transport Pilot</td>
                                                <td style="display: none;">3 Oct 1981</td>
                                                <td style="display: none;"><span class="label label-table label-inverse">Disabled</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Granville</td>
                                                <td class="footable-visible">Leonardo</td>
                                                <td class="footable-visible footable-last-column">Business Services Sales Representative</td>
                                                <td style="display: none;">19 Apr 1969</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Easer</td>
                                                <td class="footable-visible">Dragoo</td>
                                                <td class="footable-visible footable-last-column">Drywall Stripper</td>
                                                <td style="display: none;">13 Dec 1977</td>
                                                <td style="display: none;"><span class="label label-table label-success">Active</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Maple</td>
                                                <td class="footable-visible">Halladay</td>
                                                <td class="footable-visible footable-last-column">Aviation Tactical Readiness Officer</td>
                                                <td style="display: none;">30 Dec 1991</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Maxine</td>
                                                <td class="footable-visible"><a href="#">Woldt</a></td>
                                                <td class="footable-visible footable-last-column"><a href="#">Business Services Sales Representative</a></td>
                                                <td style="display: none;">17 Oct 1987</td>
                                                <td style="display: none;"><span class="label label-table label-inverse">Disabled</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Lorraine</td>
                                                <td class="footable-visible">Mcgaughy</td>
                                                <td class="footable-visible footable-last-column">Hemodialysis Technician</td>
                                                <td style="display: none;">11 Nov 1983</td>
                                                <td style="display: none;"><span class="label label-table label-inverse">Disabled</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Lizzee</td>
                                                <td class="footable-visible"><a href="#">Goodlow</a></td>
                                                <td class="footable-visible footable-last-column">Technical Services Librarian</td>
                                                <td style="display: none;">1 Nov 1961</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Judi</td>
                                                <td class="footable-visible">Badgett</td>
                                                <td class="footable-visible footable-last-column">Electrical Lineworker</td>
                                                <td style="display: none;">23 Jun 1981</td>
                                                <td style="display: none;"><span class="label label-table label-success">Active</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Lauri</td>
                                                <td class="footable-visible">Hyland</td>
                                                <td class="footable-visible footable-last-column">Blackjack Supervisor</td>
                                                <td style="display: none;">15 Nov 1985</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Isidra</td>
                                                <td class="footable-visible">Boudreaux</td>
                                                <td class="footable-visible footable-last-column">Traffic Court Referee</td>
                                                <td style="display: none;">22 Jun 1972</td>
                                                <td style="display: none;"><span class="label label-table label-success">Active</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Shona</td>
                                                <td class="footable-visible">Woldt</td>
                                                <td class="footable-visible footable-last-column">Airline Transport Pilot</td>
                                                <td style="display: none;">3 Oct 1981</td>
                                                <td style="display: none;"><span class="label label-table label-inverse">Disabled</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Granville</td>
                                                <td class="footable-visible">Leonardo</td>
                                                <td class="footable-visible footable-last-column">Business Services Sales Representative</td>
                                                <td style="display: none;">19 Apr 1969</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Easer</td>
                                                <td class="footable-visible">Dragoo</td>
                                                <td class="footable-visible footable-last-column">Drywall Stripper</td>
                                                <td style="display: none;">13 Dec 1977</td>
                                                <td style="display: none;"><span class="label label-table label-success">Active</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Maple</td>
                                                <td class="footable-visible">Halladay</td>
                                                <td class="footable-visible footable-last-column">Aviation Tactical Readiness Officer</td>
                                                <td style="display: none;">30 Dec 1991</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Maxine</td>
                                                <td class="footable-visible"><a href="#">Woldt</a></td>
                                                <td class="footable-visible footable-last-column"><a href="#">Business Services Sales Representative</a></td>
                                                <td style="display: none;">17 Oct 1987</td>
                                                <td style="display: none;"><span class="label label-table label-inverse">Disabled</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Lorraine</td>
                                                <td class="footable-visible">Mcgaughy</td>
                                                <td class="footable-visible footable-last-column">Hemodialysis Technician</td>
                                                <td style="display: none;">11 Nov 1983</td>
                                                <td style="display: none;"><span class="label label-table label-inverse">Disabled</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Lizzee</td>
                                                <td class="footable-visible"><a href="#">Goodlow</a></td>
                                                <td class="footable-visible footable-last-column">Technical Services Librarian</td>
                                                <td style="display: none;">1 Nov 1961</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                            <tr class="footable-even" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Judi</td>
                                                <td class="footable-visible">Badgett</td>
                                                <td class="footable-visible footable-last-column">Electrical Lineworker</td>
                                                <td style="display: none;">23 Jun 1981</td>
                                                <td style="display: none;"><span class="label label-table label-success">Active</span></td>
                                            </tr>
                                            <tr class="footable-odd" style="display: none;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Lauri</td>
                                                <td class="footable-visible">Hyland</td>
                                                <td class="footable-visible footable-last-column">Blackjack Supervisor</td>
                                                <td style="display: none;">15 Nov 1985</td>
                                                <td style="display: none;"><span class="label label-table label-danger">Suspended</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="messages">
                                    <div class="steamline">
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../plugins/images/users/genu.jpg" alt="user" class="img-circle"> </div>
                                            <div class="sl-right">
                                                <div class="m-l-40"> <a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <div class="m-t-20 row">
                                                        <div class="col-md-2 col-xs-12"><img src="../plugins/images/img1.jpg" alt="user" class="img-responsive"></div>
                                                        <div class="col-md-9 col-xs-12">
                                                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa</p> <a href="#" class="btn btn-success"> Design weblayout</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> </div>
                                            <div class="sl-right">
                                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <p>assign a new task <a href="#"> Design weblayout</a></p>
                                                    <div class="m-t-20 row"><img src="../plugins/images/img1.jpg" alt="user" class="col-md-3 col-xs-12"> <img src="../plugins/images/img2.jpg" alt="user" class="col-md-3 col-xs-12"> <img src="../plugins/images/img3.jpg" alt="user" class="col-md-3 col-xs-12"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../plugins/images/users/ritesh.jpg" alt="user" class="img-circle"> </div>
                                            <div class="sl-right">
                                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../plugins/images/users/govinda.jpg" alt="user" class="img-circle"> </div>
                                            <div class="sl-right">
                                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <p>assign a new task <a href="#"> Design weblayout</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal form-material">
                                        <div class="form-group">
                                            <label class="col-md-12">Full Name</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                                <input type="password" value="password" class="form-control form-control-line"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Phone No</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="123 456 7890" class="form-control form-control-line"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Location</label>
                                            <div class="col-md-12">

                                                <div class="zip">
                                                
                                                <input type="text" maxlength="5" placeholder="Type your zip code" class="form-control form-control-line zip-textinput"> 

                                                 <input type="text" maxlength="5" placeholder="123 456 7890" class="form-control form-control-line city-state-textinput"> 


                                               
                                                </div>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Skills Set</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="123 456 7890" class="form-control form-control-line"> </div>
                                        </div>
                                        
                                        

                                        
                                            <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="form-group" style="padding-left:15px;">
                                                <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                <input type="text" placeholder="123 456 7890" class="form-control form-control-line"> </div>
                                             </div>   

                                                 <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                     <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                <input type="text" placeholder="123 456 7890" class="form-control form-control-line"> </div></div>

                                                 <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                     <label class="col-md-3" style="padding-left:0px;">AngelList</label>
                                                <input type="text" placeholder="123 456 7890" class="form-control form-control-line"> </div></div>

                                        </div>
                                       
                                       
                                        <div class="form-group">
                                            <label class="col-md-12">About Me</label>
                                            <div class="col-md-12">
                                                <textarea rows="5" class="form-control form-control-line"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="slimscrollright" style="overflow: hidden; width: auto; height: 100%;">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li><b>With Dark sidebar</b></li>
                                <br>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme working">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>
                            </ul>
                            <ul class="m-t-20 all-demos">
                                <li><b>Choose other demos</b></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div><div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
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
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="js/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="js/jquery.waypoints.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.js"></script>
    <!-- chartist chart -->
    <script src="js/chartist.min.js"></script>
    <script src="js/chartist-plugin-tooltip.min.js"></script>
    <!-- Calendar JavaScript -->
    <script src="js/moment.js"></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src="js/cal-init.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- Custom tab JavaScript -->
    <script src="js/cbpFWTabs.js"></script>
    <script type="text/javascript">
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();
    </script>
    <script src="js/jquery.toast.js"></script>

    <script src="js/profile.js"></script>
    <!--Style Switcher -->
    <script src="js/jQuery.style.switcher.js"></script>
</body>

</html>
