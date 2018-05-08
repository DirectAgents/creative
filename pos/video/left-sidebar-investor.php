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
                                <li><a href="<?php echo BASE_PATH; ?>/profile/<?php echo $rownav['username']; ?>"><i class="fas fa-user" style="margin-left: -1px;"></i>&nbsp;&nbsp; <span class="hide-menu">My Profile</span></a></li>
                                <li><a href="<?php echo BASE_PATH; ?>/connections/"><i class="fas fa-users" style="margin-left: -3px;"></i>&nbsp;&nbsp;<span class="hide-menu">Connections</span></a></li>
                                <li><a href="<?php echo BASE_PATH; ?>/bookmarks/"><i class="fas fa-bookmark"></i> <span class="hide-menu">&nbsp;&nbsp;Bookmarks</span></a></li>

                                <?php if($row_startup['Name'] == '' && $rownav['Type'] == 'StartupE'){ ?>
                                <li><a href="<?php echo BASE_PATH; ?>/startup/create"><i class="fas fa-rocket"></i><span class="hide-menu">&nbsp;&nbsp;Add a Startup</span></a></li>
                                <?php } ?>
                                <li><a href="<?php echo BASE_PATH; ?>/settings/"><i class="fas fa-cog" style="margin-left: -1px;"></i><span class="hide-menu">&nbsp;&nbsp;Account Setting</span></a></li>
                                <li><a href="<?php echo BASE_PATH; ?>/logout/"><i class="fa fa-power-off" style="margin-left: 0px;"></i> <span class="hide-menu">&nbsp;&nbsp;Logout</span></a></li>
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
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Accounting"><i class=" fa-fw">A</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Accounting</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Advertising"><i class=" fa-fw">A</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Advertising</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Agriculture"><i class=" fa-fw">A</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Agriculture</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Apparel"><i class=" fa-fw">A</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Apparel</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Arts"><i class=" fa-fw">A</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Arts</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Automotive"><i class=" fa-fw">A</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Automotive</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Banking"><i class=" fa-fw">B</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Banking</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Bio-Technology"><i class=" fa-fw">B</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Bio-Technology</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Construction"><i class=" fa-fw">C</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Construction</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Consulting"><i class=" fa-fw">C</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Consulting</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Design"><i class=" fa-fw">D</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Design</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Education"><i class=" fa-fw">E</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Education</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Energy"><i class=" fa-fw">E</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Energy</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Engineering"><i class=" fa-fw">E</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Engineering</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Entertainment"><i class=" fa-fw">E</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Entertainment</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Fashion"><i class=" fa-fw">F</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Fashion</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Finance"><i class=" fa-fw">F</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Finance</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Food Service/Restaurant"><i class=" fa-fw">F</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Food Service/Restaurant</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Government"><i class=" fa-fw">G</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Government</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Graphic Design"><i class=" fa-fw">G</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Graphic Design</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Hardware"><i class=" fa-fw">H</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Hardware</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Healthcare"><i class=" fa-fw">H</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Healthcare</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Hospitality"><i class=" fa-fw">H</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Hospitality</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Human Resources"><i class=" fa-fw">H</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Human Resources</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Insurance"><i class=" fa-fw">I</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Insurance</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Internet"><i class=" fa-fw">I</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Internet</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Invention"><i class=" fa-fw">I</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Invention</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Investing"><i class=" fa-fw">I</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Investing</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Legal"><i class=" fa-fw">L</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Legal</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Manufacturing"><i class=" fa-fw">M</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Manufacturing</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Marketing/PR"><i class=" fa-fw">M</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Marketing/PR</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Media"><i class=" fa-fw">M</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Media</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Nanotechnology"><i class=" fa-fw">N</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Nanotechnology</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Non Profit"><i class=" fa-fw">N</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Non Profit</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Pharmaceuticals"><i class=" fa-fw">P</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Pharmaceuticals</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Printing"><i class=" fa-fw">P</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Printing</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Real Estate"><i class=" fa-fw">R</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Real Estate</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Recreation"><i class=" fa-fw">R</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Recreation</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Retail-Clothing"><i class=" fa-fw">R</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Retail/Clothing</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Self Storage"><i class=" fa-fw">S</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Self Storage</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Software"><i class=" fa-fw">S</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Software</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Sports-Recreation"><i class=" fa-fw">S</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Sports/Recreation</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Staffing-Recruiting"><i class=" fa-fw">S</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Staffing/Recruiting</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Technology-Web"><i class=" fa-fw">T</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Technology/Web</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Telecommunications"><i class=" fa-fw">T</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Telecommunications</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Textiles"><i class=" fa-fw">T</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Textiles</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Trasnportation"><i class=" fa-fw">T</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Transportation</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Venture Capital"><i class=" fa-fw">V</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Venture Capital</span></a> </li>
                                 <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Wholesale"><i class=" fa-fw">W</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Wholesale</span></a> </li>
                                <li> <a href="<?php echo BASE_PATH; ?>/investors/?q=Other"><i class=" fa-fw">O</i><span class="hide-menu">&nbsp;&nbsp;&nbsp;Other</span></a> </li>
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
                         <li><a href="<?php echo BASE_PATH; ?>/for/startups/" class="waves-effect"><i class="mdi mdi-rocket fa-fw"></i> <span class="hide-menu">For Startups</span></a>
                            <li><a href="<?php echo BASE_PATH; ?>/for/investors/" class="waves-effect"><i class="mdi mdi-emoticon-cool fa-fw"></i> <span class="hide-menu">For Investors</span></a>
                        <!--<li class="devider"></li>
                        <li><a href="<?php echo BASE_PATH; ?>/logout.php?t=<?php echo $_SESSION['entrepreneurSession'];?>" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>-->
                    </ul>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Left Sidebar -->
            <!-- ============================================================== -->