<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


 $sql = "SELECT * FROM tbl_users WHERE userID ='".$_SESSION['entrepreneurSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_entrepreneur = mysqli_fetch_array($result);


 $sql = "SELECT * FROM startups WHERE userID ='".$_SESSION['entrepreneurSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_startup = mysqli_fetch_array($result);
 
if ($result->num_rows == 1 && $row_entrepreneur['Type'] == 'Startup' ){
  header("Location: ".BASE_PATH."");
  exit();
}  
 



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
                                <div class="user-2-bg">
                                    <div class="overlay-box">
                                        <div class="user-content">
                                            <a href="#" id="upload_widget_multiple_logo">

                                            <ul id="preview_logo">
                                            <img src="https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img">
                                            </ul>
                                                            <div id="url_preview_logo"><input type="checkbox" style="display:none" name="company_logo[]"  checked/></div>
                                           

                                              </a>

                                         
                                        </div>
                                    </div>
                                </div>
                                <div class="user-btm-box">
                                   
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <p>
                                           <br>Click image to upload Logo
                                        </p>
                                    </div>
                             

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                <ul class="nav nav-tabs tabs customtab">
                                    <li class="tab active">
                                        <a href="#company" id="company-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Startup</span> </a>
                                    </li>
                                    <li class="tab">
                                        <a href="#team" id="team-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Team</span> </a>
                                    </li>
                                   
                                </ul>


                                <div class="tab-content">

            <!-- ============================================================== -->
            <!-- Startup Tab Starts -->
            <!-- ============================================================== -->
                    <div class="tab-pane active" id="company">
                            
                     <form class="form-horizontal form-material" id="save-company">



                             <div id="profile-tab-data">

                                        
                                          <input type="hidden" name="id" id="id" value="">
                                          <input type="hidden" name="userid" id="userid" value="<?php echo $row_entrepreneur['userID']; ?>">

                                            <div class="form-group">
                                                <label class="col-md-12">Startup Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_name" name="fm_name" tabindex="1" class="form-control form-control-line"> </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Your Role</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_position" name="fm_position" tabindex="2" placeholder="e.g CEO" class="form-control form-control-line"> </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Industry</label>
                                                <div class="col-md-12">
                                                    <select id="fm_industry" name="fm_industry" tabindex="3" class="form-control form-control-line">
                                                        <option value="Technology">Technology</option>
                                                        <option value="Mobile">Mobile</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Finance">B2B Services</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Location</label>
                                                <div class="col-md-12">
                                                    <div class="zip">
                                                        <input type="text"  id="fm_zip" name="fm_zip" maxlength="5" tabindex="4" placeholder="Type your zip code" class="form-control form-control-line zip-textinput-company">
                                                        <input type="text" tabindex="3" id="fm_location" name="fm_location" maxlength="5" placeholder="Type your zip code" class="form-control form-control-line city-state-textinput-company">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Describe your startup in one sentence</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_description" tabindex="5" name="fm_description" placeholder="e.g The best restaurants in Europe delivered to your door" class="form-control form-control-line"> 
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Describe your startup's product</label>
                                                <div class="col-md-12">
                                                    <textarea id="fm_about" name="fm_about" tabindex="6" rows="5" class="form-control form-control-line"></textarea>
                                                    
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                        <input type="text" id="fm_facebook" tabindex="7" name="fm_facebook" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                        <input type="text" tabindex="8" id="fm_twitter" name="fm_twitter"  class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">AngelList</label>
                                                        <input type="text" tabindex="9" id="fm_angellist" name="fm_angellist" class="form-control form-control-line"> </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-12">Video</label>
                                                <div class="col-md-12">
                                                   <input type="text" tabindex="10" id="fm_video" name="fm_video" placeholder="e.g ( https://www.youtube.com/embed/Hf_Y6KrFW )" class="form-control form-control-line">
                                                    
                                                </div>
                                            </div>
                                             


                                        </div>     



                            
                              <div id="upload-screenshot-create">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#/" class="cloudinary-button" id="upload_widget_multiple_screenshot">Upload Screenshot</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview_screenshot"></ul>
                                                            <div id="url_preview_screenshot"><input type="checkbox" style="display:none" name="video_screenshot[]" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                            <p>Note.: The screenshot of the video clip has to have a minimum dimension of 340px in width.</p> 
                                                </div>

                                            </div>

                                </div>


                           


                        <div id="save-cancel-create">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-company" tabindex="11" style="margin-right:10px;">Save</button>
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

                    <input type="hidden" name="userid" id="userid" value="<?php echo $row_entrepreneur['userID']; ?>">
                       
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