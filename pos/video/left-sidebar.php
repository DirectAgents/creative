<!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav slimscrollsidebar">
                    <div class="sidebar-head">
                        <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu"></span></h3>
                    </div>
                    <ul class="nav" id="side-menu">
                        

<?php if(isset($_SESSION['entrepreneurSession'])) { ?>

<?php 

$stmt = mysqli_query($connecDB, "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'");
$row = mysqli_fetch_array($stmt);

?>

                        <li class="user-pro">
                            <a href="#" class="waves-effect">
                                

<?php if($row['ProfileImage'] == 'Google'){ ?>
         <img src="<?php echo $row['google_picture_link']; ?>" alt="user-img" class="img-circle"> 
<?php } ?>

<?php if($row['ProfileImage'] == 'Facebook'){ ?>
          <img src="https://graph.facebook.com/<?php echo $row['facebook_id']; ?>/picture" alt="user-img" class="img-circle">
<?php } ?>

<?php if($row['ProfileImage'] == 'Linkedin'){ ?>
          <img src="<?php echo $row['linkedin_picture_link']; ?>" alt="user-img" class="img-circle">
<?php } ?>

                                



                                <span class="hide-menu"> <?php echo $rownav['Fullname']; ?><span class="fa arrow"></span></span>
                        </a>
                            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profile</span></a></li>
                                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> <span class="hide-menu">My Balance</span></a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> <span class="hide-menu">Inbox</span></a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
                                <li><a href="<?php echo BASE_PATH; ?>/logout.php?t=<?php echo $_SESSION['entrepreneurSession'];?>"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
                            </ul>
                        </li>

 <?php } ?>                       
                        <li><a href="<?php echo BASE_PATH; ?>" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">Startups<span class="fa arrow"></span></span></a>
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
                         <li><a href="<?php echo BASE_PATH; ?>/startups/" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">For Startups<span class="fa arrow"></span></span></a>
                            <li><a href="<?php echo BASE_PATH; ?>/investors/" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">For Investors<span class="fa arrow"></span></span></a>
                        <li class="devider"></li>
                        <li><a href="<?php echo BASE_PATH; ?>/logout.php?t=<?php echo $_SESSION['entrepreneurSession'];?>" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Left Sidebar -->
            <!-- ============================================================== -->