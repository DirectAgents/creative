<?php


 $sql = "SELECT * FROM tbl_users WHERE username ='".$_GET['username']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_entrepreneur = mysqli_fetch_array($result);


 $sql_startup = "SELECT * FROM startups WHERE userID ='".$row_entrepreneur ['userID']."'";  
 $result = mysqli_query($connecDB, $sql_startup);  
 $row_startup = mysqli_fetch_array($result);


$words = explode(" ", $row_entrepreneur['Fullname']);
$thefirstname = $words[0];



?>

<?php include '../header.php'; ?>

<!-- ============================================================== -->
<!-- Topbar header -->
<!-- ============================================================== -->
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
                                            <a href="javascript:void(0)">
                                    
<?php if($row_entrepreneur['ProfileImage'] == 'Google'){ ?>
         <img src="<?php echo $row_entrepreneur['google_picture_link']; ?>" class="thumb-lg img-circle" alt="img">
<?php } ?>

<?php if($row_entrepreneur['ProfileImage'] == 'Facebook'){ ?>
<img src="https://graph.facebook.com/<?php echo $row_entrepreneur['facebook_id']; ?>/picture?type=large" class="thumb-lg img-circle" alt="img">
<?php } ?>

<?php if($row_entrepreneur['ProfileImage'] == 'Linkedin'){ ?>
        <img src="<?php echo $row_entrepreneur['linkedin_picture_link']; ?>" class="thumb-lg img-circle" alt="img">
       
<?php } ?>

</a>


                                            <div id="fullname">
                                                <h4 class="text-white"><?php echo $row_entrepreneur['Fullname'];?></h4>
                                            </div>
                                            <div id="position">
                                                <?php if($row_entrepreneur['Position'] != ''){ ?>
                                                <h5 class="text-white">
                                                    <?php 
                                                //echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row['City'])))).', '.$row['State'];
                                                echo $row_entrepreneur['Position'];
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
                             
                             <?php if(isset($_SESSION['entrepreneurSession'])) { ?>    
                               <?php if($_SESSION['entrepreneurSession'] != $row_entrepreneur['userID']) { ?>    

<?php if($row_entrepreneur['ProfileImage'] == 'Google'){  $profileimage = $row_entrepreneur['google_picture_link']; } ?>
<?php if($row_entrepreneur['ProfileImage'] == 'Facebook'){  $profileimage = "https://graph.facebook.com/".$row_entrepreneur['facebook_id']."/picture?type=large"; } ?>
<?php if($row_entrepreneur['ProfileImage'] == 'Linkedin'){  $profileimage = $row_entrepreneur['linkedin_picture_link'];  } ?>

                                 <p>&nbsp;</p>

        <?php 

    if($row_entrepreneur['Type'] == 'Entrepreneur'){$type = 'entrepreneur';}
    if($row_entrepreneur['Type'] == 'Investor'){$type = 'investor';}

    $sql_connect = mysqli_query($connecDB,"SELECT * FROM tbl_connections_".$type." WHERE requester_id ='".$row_entrepreneur ['userID']."' AND requester_id = '".$_SESSION['entrepreneurSession']."'");
                ?>                 
                                 
                
    <div class="col-md-12 col-sm-12 text-center sa-connect-btn" <?php if(mysqli_num_rows($sql_connect)<=0) { ?> style="display:block" 
        <?php }else{ ?> style="display:none" <?php } ?> >
                                   <a href="javascript: void(0);" id="sa-connect" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" data-requested-id="<?php echo $row_entrepreneur ['userID']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-danger waves-effect waves-light">Connect +</a>
                                 </div> 
               
    <div class="col-md-12 col-sm-12 text-center sa-connect-sent" <?php if(mysqli_num_rows($sql_connect)>0) { ?> style="display:block" <?php }else{ ?> style="display:none" <?php } ?>>
                                    <a href="javascript: void(0);" id="sa-connect-cancel" class="btn btn-outline btn-default waves-effect waves-light"><span class="btn-label"><i class="fa fa-close"></i></span>Cancel Request</a>
                                  </div>
                
                               <?php } ?>  

                            <?php }else{ ?>   
                            
                              
                                    <p>&nbsp;</p>
                                 <div class="col-md-12 col-sm-12 text-center">
                                    <a href="javascript: void(0);" id="sa-basic" class="btn btn-danger hidden-xs hidden-sm waves-effect waves-light">Connect +</a>
                                 </div> 
                               
                            <?php } ?>    

                                </div>
                            </div>
                        </div>
                            <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                <ul class="nav nav-tabs tabs customtab">
                                   
                                    <?php //if(!isset($_SESSION['entrepreneurSession'])){ ?>
                                   
                                    <?php //if($row_entrepreneur['About'] != ''){ ?>
                                    <li class="tab active">
                                        <a href="#background" id="background-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">About <?php echo $thefirstname; ?></span> </a>
                                    </li>
                                    <?php //} ?>
                                   
                                    
                                   <?php //} ?>
                                    
                                </ul>


                                <div class="tab-content">

            <!-- ============================================================== -->
            <!-- Company Tab Starts -->
            <!-- ============================================================== -->
                    <div class="tab-pane" id="company">
                            
                     <form class="form-horizontal form-material" id="save-company">


                         <div id="upload-logo">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_company">Upload Startup Logo</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview_company"></ul>
                                                            <div id="url_preview_company"><input type="checkbox" style="display:none" name="company_logo[]" value="<?php echo $row_startup['Logo']; ?>" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                </div>
                                            </div>
                                </div>
                            
                       
                             <div id="thecompany"></div>

                           
                            
                    
                               
                            
                              <div id="upload-screenshot">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_screenshot">Upload Screenshot</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview_screenshot"></ul>
                                                            <div id="url_preview_screenshot"><input type="checkbox" style="display:none" name="video_screenshot[]" value="<?php echo $row_startup['Screenshot']; ?>" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                            <p>Note.: The screenshot of the video clip has to have a minimum dimension of 340px in width.</p> 
                                                </div>

                                            </div>

                                </div>


                           


                        <div id="save-cancel">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-company" tabindex="11" style="margin-right:10px;">Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-company" tabindex="12">Cancel</button>
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
                        <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $row_entrepreneur['userID']) { ?>
                        <div id="add-a-team-member">
                             <div class="col-sm-12" style="padding-left:15px">
                                         <div class="row"> 
                                             <ul class="side-icon-text pull-left">
                                                    <li><a href="#" class="add-team-member"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add a Team Member</span></a></li>
                                             </ul>
                                        </div>
                            </div> 
                             <p>&nbsp;</p>  
                         </div>  
                        <?php } ?>  
                
                        <div id="existing-team-members"></div>
                                  
                                    
                                <div id="upload-headshot">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_team">Upload Headshot</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview_team"></ul>
                                                            <div id="url_preview_team"><input type="checkbox" style="display:none" name="team_member_headshot[]" value="" checked/></div>
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
            <!-- Background Tab Starts -->
            <!-- ============================================================== -->
                                       <div class="tab-pane active" id="background">

                                       <input type="hidden" name="userid" value="<?php echo $row_entrepreneur['userID']; ?>">

                                            <div id="background-tab-content"></div>     
                                        
                                        </div>
            <!-- ============================================================== -->
            <!-- Background Tab Ends -->
            <!-- ============================================================== -->
            

            <!-- ============================================================== -->
            <!-- Connections Tab Starts -->
            <!-- ============================================================== -->

                                        <div class="table-responsive manage-table tab-pane" id="connections">
                                            <div id="connections-tab-content"></div>     
                                        </div>

                                  
            <!-- ============================================================== -->
            <!-- Connections Tab Ends -->
            <!-- ============================================================== -->
                                   
                                    
            <!-- ============================================================== -->
            <!-- Bookmarks Tab Starts -->
            <!-- ============================================================== -->


                                    <div class="table-responsive manage-table tab-pane" id="bookmarks">
                                         <div id="bookmark-tab-content"></div>     
                                    </div>
                           
            <!-- ============================================================== -->
            <!-- Bookmarks Tab Ends -->
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

<div class="modal fade text-center" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="container center-block">
                <div class="signup-container center-block">
                    <button type="button" data-dismiss="modal" class='exit-button'><img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/exit-icon.png" class="exit-icon center-block"></button>
                    <div class="signup-card center-block">
                        <img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="center-block signup-card-image">
                        <!--<h2 class="signup-card-title bold text-center">Sign in as a Startup!</h2>-->
                        <p class="signup-description text-center"><span class="bold">Collapsed</span> is a community that aims to provide value by providing insights on failed startups.</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="login-buttons">
                                    <a href="<?php echo htmlspecialchars($loginUrl); ?>">
                                        <div class="fb-connect connect-background" data-track="home:facebook-connect">
                                            <span class="fa fa-facebook"></span>
                                            <span class="connect-text">Connect with Facebook</span>
                                        </div>  
                                    </a>
                                </div>
                             </div>   
                                <div class="col-md-12">
                                    <div class="login-buttons">
                                    <a href="<?php echo $authUrl; ?>">
                                       <div class="google-connect connect-background" id="google-connect-button" data-track="home:google-connect">
                         <span class="fa fa-google-plus"></span>
                         <a href="<?php echo $authUrl; ?>">
                         <span class="google-connect-text connect-text">Connect with Google</span>
                         </a>
                    </div>
                                    </a>
                                </div>
                            </div>

                              <div class="col-md-12">
                                    <div class="login-buttons">
                                    <a href="<?php echo $authUrl; ?>">
                                      <div class="li-connect connect-background" data-track="home:facebook-connect">
                         <span class="fa fa-linkedin"></span>
                         <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=78x2ye1ktvzj7d&redirect_uri=<?php echo BASE_PATH; ?>/linkedin/&state=987654321&scope=r_basicprofile,r_emailaddress">
                         <span class="connect-text">Connect with Linkedin</span>
                         </a>
                         
                    </div>
                                    </a>
                                </div>
                            </div>


                            </div> 
                        </div>
                        <p class="signup-light text-center">We won't ever post anything on Facebook without your permission.</p>
                    </div>
                </div>
            </div>
        </div>



            
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <?php include '../footer.php'; ?>
    </body>

    </html>