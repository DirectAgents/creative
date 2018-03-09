<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 



 $sql = "SELECT * FROM startups WHERE Url ='".$_GET['name']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_the_startup = mysqli_fetch_array($result);



 
 if($row_the_startup['Name'] == ''){
  header("Location: ".BASE_PATH."/404/");
  exit();
 }



 $sql = "SELECT * FROM tbl_users WHERE userID ='".$row_the_startup['userID']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_entrepreneur = mysqli_fetch_array($result);

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
                            <h4 class="page-title"><?php echo $row_the_startup['Name'];?></h4> </div>

                       
                    </div>
                    <!-- /.row -->
                    <!-- .row -->
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="white-box">
                                <div class="user-bg">
                                    <div class="overlay-box">
                                        <div class="user-content">
                                            <div id="company-logo-public">

                                            <?php if($row_the_startup['Logo'] != '') { ?>
                                          <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/<?php echo $row_the_startup['Logo'];?>" class="thumb-lg img-circle" alt="img">  
                                            <?php }?>
                                           

                                              </div>

                                             <?php if(isset($_SESSION['entrepreneurSession']) && $row_the_startup['userID'] == $_SESSION['entrepreneurSession']) { ?>

                                             <a href="#" id="upload_widget_multiple_logo" class="upload_widget_multiple_logo_link">

                                            <?php if($row_the_startup['Logo'] != '') { ?>
                                             <ul id="preview_logo">
                                          <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/<?php echo $row_the_startup['Logo'];?>" class="thumb-lg img-circle" alt="img">  
                                             </ul>
                                               <div id="url_preview_logo"><input type="checkbox" style="display:none" value="<?php echo $row_the_startup['Logo'];?>" name="company_logo[]"  checked/></div>
                                            <?php }else{ ?>
                                            <ul id="preview_logo">
                                            <img src="https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img">
                                             </ul>
                                               <div id="url_preview_logo"><input type="checkbox" style="display:none" name="company_logo[]"  checked/></div>
                                            <?php } ?>

                                              </a>


                                             <?php } ?>

                                            <div id="fullname">
                                                <h4 class="text-white"><?php echo $row_the_startup['Name'];?></h4>
                                            </div>

                                            <div id="position">
                                                <?php if($row_the_startup['ZipCode'] != ''){ ?>
                                                <h5 class="text-white">
                                                    <?php 
                                                echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row_the_startup['City'])))).', '.$row_the_startup['State'];
                                                ?></h5>
                                                <?php } ?>
                                            </div>

                                             <div id="position">
                                                <?php if($row_the_startup['Industry'] != ''){ ?>
                                                <h5 class="text-white">
                                                    <?php 
                                                echo $row_the_startup['Industry'];
                                                ?></h5>
                                                <?php } ?>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            
                            <div id="startups-socials">    
                                <div class="user-btm-box">
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-purple">
                                            <div id="facebook">
                                                <a href="<?php echo $row_the_startup['Facebook'];?>"><i class="ti-facebook"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-blue">
                                            <div id="twitter">
                                                <a href="<?php echo $row_the_startup['Twitter'];?>"><i class="ti-twitter"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-danger">
                                            <div id="linkedin">
                                                <a href="<?php echo $row_the_startup['AngelList'];?>"><i class="ti-linkedin"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                  </div>
                                </div>

          
               <?php if(isset($_SESSION['entrepreneurSession']) && $row_the_startup['userID'] == $_SESSION['entrepreneurSession']) { ?>

               <div id="click-image-to-upload-logo">  
                           <div class="user-btm-box">
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <p>
                                           <br>Click image to upload Logo
                                        </p>
                                    </div>
                             </div>
                 </div>            

               <?php } ?>              

                                




                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                <ul class="nav nav-tabs tabs customtab">
                                    <li class="tab active">
                                        <a href="#company" id="company-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Startup</span> </a>
                                    </li>
                                    <?php //if(!isset($_SESSION['entrepreneurSession'])){ ?>
                                    <li class="tab">
                                        <a href="#team" id="team-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">111Meet the Team</span> </a>
                                    </li>
                                   <?php //} ?>
                                    <?php if(isset($_SESSION['usernameSession']) && $_SESSION['usernameSession'] == $_GET['username']) { ?>
                                    <li class="tab">
                                        <a href="#connections" id="connections-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Connections</span> </a>
                                    </li>
                                    <!--
                                    <li class="tab">
                                        <a href="#messages" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Messages</span> </a>
                                    </li>
                                        -->

                                    <li class="tab">
                                        <a href="#bookmarks" id="bookmark-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Bookmarks</span> </a>
                                    </li>

                                    <li class="tab">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                                    </li>
                                    <?php } ?>
                                </ul>


                                <div class="tab-content">

            <!-- ============================================================== -->
            <!-- Startup Tab Starts -->
            <!-- ============================================================== -->
                    <div class="tab-pane active" id="company">
                            
                     <form class="form-horizontal form-material" id="save-company">


                        
                        <input type="hidden" name="userid" value="<?php echo $row_entrepreneur['userID'];?>"/>     
                       
                             <div id="thecompany-startup"></div>

                           
                            
                    
                               
                            
                              <div id="upload-screenshot">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_screenshot">Upload Screenshot</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview_screenshot"></ul>
                                                            <div id="url_preview_screenshot"><input type="checkbox" style="display:none" name="video_screenshot[]" value="<?php echo $row_the_startup['Screenshot']; ?>" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                            <p>Note.: The screenshot of the video clip has to have a minimum dimension of 340px in width.</p> 
                                                </div>

                                            </div>

                                </div>


                           


                        <div id="save-cancel">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-company" tabindex="11" style="margin-right:10px;">1111Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-company" tabindex="12">Cancel</button>
                                    </div>
                                </div>
                         </div>       



                             </form>   

                                          
                                    </div>
            <!-- ============================================================== -->
            <!-- Startup Tab Ends -->
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