<?php


 $sql = "SELECT * FROM tbl_users WHERE username ='".$_GET['username']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_entrepreneur = mysqli_fetch_array($result);

 if($row_entrepreneur['username'] == ''){
  header("Location: ".BASE_PATH."/404/");
  exit();
 }


 $sql_startup = "SELECT * FROM startups WHERE userID ='".$row_entrepreneur ['userID']."'";  
 $result = mysqli_query($connecDB, $sql_startup);  
 $row_startup = mysqli_fetch_array($result);

 $sql_company = "SELECT * FROM investor_company WHERE userID ='".$row_entrepreneur ['userID']."'";  
 $result = mysqli_query($connecDB, $sql_company);  
 $row_company = mysqli_fetch_array($result);


$words = explode(" ", $row_entrepreneur['Fullname']);
$thefirstname = $words[0];


$cloudinary_section = 'startups';

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
            

        <?php 
        if($row_entrepreneur['Type'] == 'StartupE'){ include '../left-sidebar-startup.php';} 
        if($row_entrepreneur['Type'] == 'Investor'){ include '../left-sidebar-investor.php';}
        ?>
        

            <!-- ============================================================== -->
            <!-- Page Content -->
            <!-- ============================================================== -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Profile page</h4> 
                        </div>
                        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                       <?php if($row_entrepreneur['Type'] == 'StartupE' && $row_startup['Name'] == ''){ ?>
                        <a href="<?php echo BASE_PATH; ?>/startup/create" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Add a Startup</a>
                        <?php } ?>
                       
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
                                            <div id="thezipcode">
                                                <?php if($row_entrepreneur['ZipCode'] != ''){ ?>
                                                <h5 class="text-white">
                                                    <?php 
                                                echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row_entrepreneur['City'])))).', '.$row_entrepreneur['State'];
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
                             
                             <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] != $row_entrepreneur['userID']) { ?>

<?php if($row_entrepreneur['ProfileImage'] == 'Google'){  $profileimage = $row_entrepreneur['google_picture_link']; } ?>
<?php if($row_entrepreneur['ProfileImage'] == 'Facebook'){  $profileimage = "https://graph.facebook.com/".$row_entrepreneur['facebook_id']."/picture?type=large"; } ?>
<?php if($row_entrepreneur['ProfileImage'] == 'Linkedin'){  $profileimage = $row_entrepreneur['linkedin_picture_link'];  } ?>

                                 <p>&nbsp;</p>


<!--Connect-->

        <?php 

    if($row_entrepreneur['Type'] == 'StartupE'){$type = 'startup';}
    if($row_entrepreneur['Type'] == 'Investor'){$type = 'investor';}

    $sql_connect = mysqli_query($connecDB,"SELECT * FROM tbl_connections_".$type." WHERE requested_id ='".$row_entrepreneur ['userID']."' AND requester_id = '".$_SESSION['entrepreneurSession']."'");
                ?>                 
                                 
                
    <div class="col-md-<?php if($row_entrepreneur['Type'] != 'Startup'){echo '12';}else{echo '6';} ?> col-sm-<?php if($row_entrepreneur['Type'] != 'Startup'){echo '12';}else{echo '6';} ?> text-center sa-connect-btn" <?php if ($sql_connect->num_rows == 0){ ?> style="display:block; padding-left: 0px; margin-bottom:10px;" 
        <?php }else{ ?> style="display:none" <?php } ?> >
                                   <a href="javascript: void(0);" id="sa-connect-profile" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" data-requested-id="<?php echo $row_entrepreneur ['userID']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-success waves-effect waves-light" style="font-size:13px"><span class="btn-label"><i class="fa fa-plus"></i></span>Connect</a>
                                 </div> 
               
    <div class="col-md-<?php if($row_entrepreneur['Type'] != 'Startup'){echo '12';}else{echo '6';} ?> col-sm-<?php if($row_entrepreneur['Type'] != 'Startup'){echo '12';}else{echo '6';} ?> text-center sa-connect-sent" <?php if ($sql_connect->num_rows == 1){ ?> style="display:block; margin-bottom:10px; padding-left: 0px" <?php }else{ ?> style="display:none" <?php } ?>>
                                    <a href="javascript: void(0);" id="sa-connect-profile-cancel" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" data-name="<?php echo $row_entrepreneur ['Fullname']; ?>" data-requested-id="<?php echo $row_entrepreneur ['userID']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-outline btn-default waves-effect waves-light" style="font-size:13px"><span class="btn-label"><i class="fa fa-close"></i></span>Cancel Request</a>
                                  </div>
                


<!--Bookmark-->


 <?php 

   //Bookmark Investor

    $sql_bookmark = mysqli_query($connecDB,"SELECT * FROM tbl_bookmarks WHERE requested_id ='".$row_entrepreneur ['userID']."' AND requester_id = '".$_SESSION['entrepreneurSession']."' AND Type = 'Investor'");
                ?>                 
                                 
                
  <div class="col-md-<?php if($row_entrepreneur['Type'] == 'Investor'){echo '12';}else{echo '6';} ?> col-sm-<?php if($row_entrepreneur['Type'] == 'Investor'){echo '12';}else{echo '6';} ?> text-center sa-bookmark-investor" <?php if ($sql_bookmark->num_rows == 0 && $row_entrepreneur['Type'] == 'Investor'){ ?> style="display:block; padding-left: 0px; margin-bottom:10px;" 
        <?php }else{ ?> style="display:none" <?php } ?> >
                                   <a href="#/" id="sa-connect-profile" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" data-requested-id="<?php echo $row_entrepreneur ['userID']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-danger waves-effect waves-light bookmark-investor" style="font-size:13px"><span class="btn-label"><i class="fa fa-plus"></i></span>Bookmark</a>
                                 </div> 
               
 
<div class="col-md-<?php if($row_entrepreneur['Type'] == 'Investor'){echo '12';}else{echo '6';} ?> col-sm-<?php if($row_entrepreneur['Type'] == 'Investor'){echo '12';}else{echo '6';} ?> text-center sa-bookmarked-investor" <?php if ($sql_bookmark->num_rows == 1 && $row_entrepreneur['Type'] == 'Investor'){ ?> style="display:block; padding-left: 0px; margin-bottom:10px;" 
        <?php }else{ ?> style="display:none" <?php } ?> >

                                    <a href="javascript: void(0);" id="sa-connect-profile-cancel" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" data-name="<?php echo $row_entrepreneur ['Fullname']; ?>" data-requested-id="<?php echo $row_entrepreneur ['userID']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-outline btn-default waves-effect waves-light" style="font-size:13px"><span class="btn-label"><i class="fa fa-check"></i></span>Bookmarked</a>
                                  </div>
                
                            


 <?php 

   //Bookmark Startup Employee

    $sql_bookmark = mysqli_query($connecDB,"SELECT * FROM tbl_bookmarks WHERE requested_id ='".$row_entrepreneur ['userID']."' AND requester_id = '".$_SESSION['entrepreneurSession']."' AND Type = 'StartupE'");
                ?>                 
                


 <div class="col-md-<?php if($row_entrepreneur['Type'] == 'StartupE'){echo '12';}else{echo '6';} ?> col-sm-<?php if($row_entrepreneur['Type'] == 'StartupE'){echo '12';}else{echo '6';} ?> text-center sa-bookmark-startupe" <?php if ($sql_bookmark->num_rows == 0 && $row_entrepreneur['Type'] == 'StartupE'){ ?> style="display:block; padding-left: 0px; margin-bottom:10px;" 
        <?php }else{ ?> style="display:none" <?php } ?> >

                                   <a href="#/" id="sa-connect-profile" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" data-requested-id="<?php echo $row_entrepreneur ['userID']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-danger waves-effect waves-light bookmark-startupe" style="font-size:13px"><span class="btn-label"><i class="fa fa-plus"></i></span>Bookmark</a>
                                 </div> 
               
 <div class="col-md-<?php if($row_entrepreneur['Type'] == 'StartupE'){echo '12';}else{echo '6';} ?> col-sm-<?php if($row_entrepreneur['Type'] == 'StartupE'){echo '12';}else{echo '6';} ?> text-center sa-bookmarked-startupe" <?php if ($sql_bookmark->num_rows == 1 && $row_entrepreneur['Type'] == 'StartupE'){ ?> style="display:block; padding-left: 0px; margin-bottom:10px;" 
        <?php }else{ ?> style="display:none" <?php } ?> >

                                    <a href="javascript: void(0);" id="sa-connect-profile-cancel" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" data-name="<?php echo $row_entrepreneur ['Fullname']; ?>" data-requested-id="<?php echo $row_entrepreneur ['userID']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-outline btn-default waves-effect waves-light" style="font-size:13px"><span class="btn-label"><i class="fa fa-check"></i></span>Bookmarked</a>
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

                                      <?php if($row_entrepreneur['Type'] == 'Investor'){ ?>
                                    <li class="tab">
                                        <a href="#company-investor" id="company-investor-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fas far fa-building font-awesome-icon"></i></span> <span class="hidden-xs">Company </span> </a>


                                    </li>
                                    
                                    <?php } ?>
                                   
                                    
                                   <?php //} ?>
                                    
                                </ul>


                                <div class="tab-content">


            <!-- ============================================================== -->
            <!-- Company Investor Tab Starts -->
            <!-- ============================================================== -->
                    <div class="tab-pane" id="company-investor">
                            
                     <form class="form-horizontal form-material" id="save-company">

                        <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $row_entrepreneur['userID']) { ?>

                         <div id="upload-logo">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_logo">Upload Company Logo</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview_logo"></ul>
                                                            <div id="url_preview_logo"><input type="checkbox" style="display:none" name="company_logo[]" value="<?php echo $row_company['Logo']; ?>" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                </div>
                                            </div>
                                </div>
                            <?php } ?>

                       
                             <div id="thecompany-investor"></div>

                           

                             </form>   

                                          
                                    </div>
            <!-- ============================================================== -->
            <!-- Company Investor Tab Ends -->
            <!-- ============================================================== -->



            <!-- ============================================================== -->
            <!-- Company Startup Tab Starts -->
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
                            

                       
                             <div id="thecompany-startup"></div>

                           
                            
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
            <!-- Company Startup Tab Ends -->
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
            

          
                                   
        


            
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                     <div id="saved">Saved Successfully</div>
                     <div id="deleted">Deleted Successfully</div>
                  
                </div>
                <!-- /.container-fluid -->





            
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