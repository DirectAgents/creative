
        
        
       <?php if(isset($_SESSION['entrepreneurSession'])) {?>


       <?php 

$stmt = mysqli_query($connecDB, "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'");
$rownav = mysqli_fetch_array($stmt);

$sql_startup = "SELECT * FROM startups WHERE userID ='".$rownav['userID']."'";  
$result = mysqli_query($connecDB, $sql_startup);  
$row_startup = mysqli_fetch_array($result);

$words = explode(" ", $rownav['Fullname']);

$firstname = $words[0];


$_SESSION['google_picture_link'] = $rownav['google_picture_link'];

       ?>

        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <?php //echo $_SESSION['entrepreneurSession']; echo $_SESSION['usernameSession']; ?>
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?php echo BASE_PATH; ?>">
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
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-check-circle"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have 4 new notifications</div>
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
                       
                    </li>
                    <!-- /.dropdown-messages -->



<?php

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
//echo $row[$keys[0]]; // 20

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Likes = '".$row[$keys[0]]."'");
$row2 = mysqli_fetch_array($sql);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."'");
//$row = mysqli_fetch_array($sql);

$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }

arsort($row);
$keys = array_keys($row);


if(isset($row[$keys[0]])){
$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[0]]."'");
$row3 = mysqli_fetch_array($sql3);
$sql4 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row3['requested_id']."'");
$row4 = mysqli_fetch_array($sql4);
}

if(isset($row[$keys[1]])){
$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[1]]."'");
$row5 = mysqli_fetch_array($sql5);
$sql6 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row5['requested_id']."'");
$row6 = mysqli_fetch_array($sql6);
}

if(isset($row[$keys[2]])){
$sql7 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[2]]."'");
$row7 = mysqli_fetch_array($sql7);
$sql8 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row8 = mysqli_fetch_array($sql8);
}

if(isset($row[$keys[3]])){
$sql9 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[3]]."'");
$row9 = mysqli_fetch_array($sql9);
$sql10 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row10 = mysqli_fetch_array($sql10);
}

if(isset($row[$keys[4]])){
$sql11 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[4]]."'");
$row11 = mysqli_fetch_array($sql11);
$sql12 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row13 = mysqli_fetch_array($sql13);
}

//echo $row4['Name'];



?>

                 
                    <!-- .Megamenu -->
                    <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Popular Startups</span> <i class="icon-options-vertical"></i></a>
                        <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header"><?php echo $row2['Industry']; ?></li>
                                    <li><a href="form-basic.html"><?php if(isset($row[$keys[0]])){ echo $row4['Name'];} ?></a></li>
                                    <li><a href="form-layout.html"><?php if(isset($row[$keys[1]])){ echo $row6['Name'];} ?></a></li>
                                    <li><a href="form-advanced.html"><?php if(isset($row[$keys[2]])){ echo $row8['Name'];} ?></a></li>
                                    <li><a href="form-material-elements.html"><?php if(isset($row[$keys[3]])){ echo $row10['Name'];} ?></a></li>
                                    <li><a href="form-float-input.html"><?php if(isset($row[$keys[4]])){ echo $row12['Name'];} ?></a></li>
                                
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
                          
                        <input type="text" class="algolia-autocomplete light form-control" id="search-input" placeholder="Search by Startup Name or Industry" /><div class="algolia"><img src="<?php echo BASE_PATH; ?>/images/algolia.png"/><i class="fa fa-search"></i></div>
                         </form>

                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 

                           


<?php if($rownav['ProfileImage'] == 'Google'){ ?>
         <img src="<?php echo $rownav['google_picture_link']; ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $firstname; ?></b><span class="caret"></span> 
<?php } ?>

<?php if($rownav['ProfileImage'] == 'Facebook'){ ?>
         <img src="https://graph.facebook.com/<?php echo $rownav['facebook_id']; ?>/picture" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $firstname; ?></b><span class="caret"></span> 
<?php } ?>

<?php if($rownav['ProfileImage'] == 'Linkedin'){ ?>
         <img src="<?php echo $rownav['linkedin_picture_link']; ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $firstname; ?></b><span class="caret"></span> 
<?php } ?>


                        </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="<?php echo BASE_PATH; ?>/profile/<?php echo $rownav['username']; ?>"><i class="ti-user"></i> My Profile</a></li>
                            <?php if($row_startup['Name'] != ''){ ?>
                             <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row_startup['Name']; ?>"><i class="ti-user"></i> My Startup</a></li>
                            <?php } ?>
                            <li><a href="<?php echo BASE_PATH; ?>/connections/"><i class="ti-email"></i> Connections</a></li>
                            <li><a href="<?php echo BASE_PATH; ?>/bookmarks/"><i class="ti-email"></i> Bookmarks</a></li>
                            <li role="separator" class="divider"></li>
                             <?php if($row_startup['Name'] == ''){ ?>
                             <li><a href="<?php echo BASE_PATH; ?>/startup/create"><i class="ti-user"></i> Add a Startup</a></li>
                            <?php } ?>
                             <li role="separator" class="divider"></li>
                            <li><a href="<?php echo BASE_PATH; ?>/settings/"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo BASE_PATH; ?>/logout.php?t=<?php echo $_SESSION['entrepreneurSession'];?>"><i class="fa fa-power-off"></i> Logout</a></li>

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

        <?php }else{ ?>

        
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
                          

                        <input type="text" class="algolia-autocomplete light form-control" id="search-input" placeholder="Search by Startup Name or Industry" /><div class="algolia"><img src="<?php echo BASE_PATH; ?>/images/algolia.png"/><i class="fa fa-search"></i></div>
                         </form>

                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="modal" data-target="#signin" href="#"> <b class="hidden-xs">Login</b></a>
                        
                    </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <b class="hidden-xs">Signup</b></a>
                        
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->



        <?php } ?>