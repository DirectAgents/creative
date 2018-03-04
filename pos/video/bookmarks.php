<?php 

session_start();
require_once 'class.entrepreneur.php';
require_once 'class.investor.php';
require_once 'base_path.php';
include_once("config.php"); 

if(!isset($_SESSION['entrepreneurSession']))
{
header("Location:".BASE_PATH."");
exit();
}

?>

<?php

 $sql = "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_entrepreneur = mysqli_fetch_array($result);

?>


<?php include 'header.php'; ?>

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
          

        <?php include 'nav.php'; ?>

            <!-- End Top Navigation -->
            

        <?php include 'left-sidebar.php'; ?>
        

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
                                


                                <div class="tab-content">

            


            <!-- ============================================================== -->
            <!-- Bookmarks Tab Starts -->
            <!-- ============================================================== -->

                                       
 

 <table class="table" cellspacing="14">
    <?php 
                    
    $sql_bookmarks = mysqli_query($connecDB,"SELECT * FROM tbl_bookmarks WHERE requester_id = '".$_SESSION['entrepreneurSession']."' ORDER BY id DESC");                    
                                        
                if( ! mysqli_num_rows($sql_bookmarks) ) {
                echo "<div class='no-connections text-center'>No Bookmarks!</div>"; 
                }else{


    ?>

     <h3>Bookmarks</h3>
     <p>&nbsp;</p> 
    
    <div class="connections-header">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>STARTUP</th>
                <th>LOCATION</th>
                <th>INDUSTRY</th>
                <th>MANAGE</th>
            </tr>
        </thead>
    </div>
    <tbody>
        <?php   

                                      while($row_bookmarks = mysqli_fetch_array($sql_bookmarks)){

                                        ?>
        <script>
        $(document).ready(function() {

            $('#bookmark-delete-' + <?php echo $row_bookmarks['requested_id']; ?>).click(function() {

                //var data_thumb = $("#sa-connect").attr("data-thumb");
                //alert(data_thumb);

                swal({
                    title: "Delete!",
                    text: "Delete bookmark?",
                    //type: "warning",
                    //imageUrl: data_thumb,   
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete!",
                    closeOnConfirm: false
                }, function() {

                    var url_link = 'http://localhost/creative/pos/video/startup/';

                    var requested_id = $("#bookmark-delete-" + <?php echo $row_bookmarks['requested_id']; ?>).attr("data-requested-id");
                    var requester_id = $("#bookmark-delete-" + <?php echo $row_bookmarks['requested_id']; ?>).attr("data-requester-id");
                    //alert(requested_id);

                    $.ajax({
                        url: url_link + "bookmark-delete.php",
                        method: "GET",
                        data: { requested_id: requested_id, requester_id: requester_id },
                        dataType: "html",
                        success: function(response) {

                            if (response != 'no good') {
                                parent.swal("Success!", "You have deleted the bookmark.", "success");
                                //$('#bookmark-tab-content').html(response);
                                $("#bookmark-tab-content").load(url_link+"bookmark-tab.php?userid="+requester_id);
                            }
                            if (response == 'no good') {
                                parent.swal("Something went wrong!");
                            }

                        }
                    });


                });
            });

        });
        </script>
        <?php 

                                         $sql_startup = mysqli_query($connecDB,"SELECT * FROM startups WHERE userID ='".$row_bookmarks['requested_id']."'");
                                         $row_startup= mysqli_fetch_array($sql_startup);


                                        ?>
        <tr class="advance-table-row connections-tab-inside">
            <td width="10"></td>
            <td>
                <a href="<?php echo BASE_PATH; ?>/startup/profile/<?php echo $row_startup['userID']; ?>">
                                                        <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/<?php echo $row_startup['Logo']; ?>" class="img-circle" width="30"></a>
            </td>
            <td>
                <a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row_startup['Name']; ?>">
                    <?php echo $row_startup['Name']; ?>
                </a>
            </td>
            <td>
                <?php echo $row_startup['City'].', '.$row_startup['State'] ?>
            </td>
            <td>
                <?php echo $row_startup['Industry']; ?>
            </td>
            <td>
                <button type="button" id="bookmark-delete-<?php echo $row_bookmarks['requested_id']; ?>" data-requested-id="<?php echo $row_bookmarks['requested_id']; ?>" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-trash"></i></button>
            </td>
        </tr>
        <tr>
            <td colspan="7" class="sm-pd"></td>
        </tr>
        <?php } ?>
        <?php } ?>
        </tr>
    </tbody>
   </table>  
                 

                                          




                                      

                                  
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
     
     <?php include 'footer.php'; ?>

    </body>

    </html>