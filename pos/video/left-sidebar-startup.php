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
                            <a href="#/" class="waves-effect">
                                

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
                                <li><a href="<?php echo BASE_PATH; ?>/profile/<?php echo $rownav['username']; ?>"><i class="fas fa-user" style="margin-left:-1px"></i>&nbsp;&nbsp; <span class="hide-menu">My Profile</span></a></li>
                                <?php if($row_startup['Name'] != ''){ ?>
                                <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row_startup['Name']; ?>"><i class="ti-crown" style="margin-left:-3px"></i> <span class="hide-menu">My Startup</span></a></li>
                                <?php } ?>
                                <li><a href="<?php echo BASE_PATH; ?>/connections/"><i class="fas fa-users" style="margin-left:-3px"></i>&nbsp;&nbsp;<span class="hide-menu">Connections</span></a></li>
                                <li><a href="<?php echo BASE_PATH; ?>/bookmarks/">&nbsp;<i class="fas fa-bookmark" style="margin-left:-4px"></i> <span class="hide-menu">&nbsp;&nbsp;Bookmarks</span></a></li>

                                <?php if($row_startup['Name'] == '' && $rownav['Type'] == 'StartupE'){ ?>
                                <li><a href="<?php echo BASE_PATH; ?>/startup/create"><i class="fas fa-rocket" style="margin-left:-2px"></i><span class="hide-menu">&nbsp;&nbsp;Add a Startup</span></a></li>
                                <?php } ?>
                                <li><a href="<?php echo BASE_PATH; ?>/settings/"><i class="fas fa-cog" style="margin-left:-2px"></i><span class="hide-menu">&nbsp;&nbsp;Account Setting</span></a></li>
                                <li><a href="<?php echo BASE_PATH; ?>/logout/"><i class="fa fa-power-off" style="margin-left:-1px"></i> <span class="hide-menu">&nbsp;&nbsp;Logout</span></a></li>
                            </ul>
                        </li>

 <?php } ?>                       
                        <li><a href="<?php echo BASE_PATH; ?>/startups" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">Startups</span></a>
                        </li>
                        <li><a href="<?php echo BASE_PATH; ?>/investors" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">Investors</span></a>
                        </li>

                        <?php if(isset($left_sidebar_industry)){ ?>

                        <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Industry<span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Technology"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Technology</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Artificial Intelligence">&nbsp;<i class="fas fa-code-branch"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Artificial Intelligence</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Augmented-Reality"><i class="fas fa-eye"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Augmented Reality</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Mobile"><i class="fas fa-mobile-alt font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Mobile</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Finance"><i class="fas fa-dollar-sign font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Finance</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Ecommerce"><i class="fas far fa-shopping-bag font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Ecommerce</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=B2B Services"><i class="fas far fa-building font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;B2B Services</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Consumer Products"><i class="fas fa-users font-awesome-icon"></i><span class="hide-menu">&nbsp;Consumer Products</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Consulting"><i class="fas fa-comment font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;Consulting</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Big Data"><i class="fas fa-database font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Big Data</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Education"><i class="fas fa-graduation-cap font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;Education</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Travel"><i class="fas fa-plane font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;Travel</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Entertainment"><i class="fas fa-microphone font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Entertainment</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Fashion"><i class="fab fa-black-tie font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Fashion</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Healthcare"><i class="fas fa-heartbeat font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Healthcare</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Real Estate"><i class="fas fa-home font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Real Estate</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Food and Beverages"><i class="fas fa-utensils font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Food and Beverages</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Art and Design"><i class="fas fa-paint-brush font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Art and Design</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Health & Wellness"><i class="fab fa-gratipay font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Health and Wellness</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Human Resources">&nbsp;<i class="fas fa-male font-awesome-icon"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Human Resources</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/startups/?q=Other"><i data-icon="7" style="margin-left:2px;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Other</span></a> </li>
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
                        <?php } ?>
                         <!--<li><a href="<?php echo BASE_PATH; ?>/for/startups/" class="waves-effect"><i class="mdi mdi-rocket fa-fw"></i> <span class="hide-menu">For Startups</span></a>
                            <li><a href="<?php echo BASE_PATH; ?>/for/investors/" class="waves-effect"><i class="mdi mdi-emoticon-cool fa-fw"></i> <span class="hide-menu">For Investors</span></a>-->
                        <!--<li class="devider"></li>
                        <li><a href="<?php echo BASE_PATH; ?>/logout.php?t=<?php echo $_SESSION['entrepreneurSession'];?>" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>-->
                    </ul>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Left Sidebar -->
            <!-- ============================================================== -->