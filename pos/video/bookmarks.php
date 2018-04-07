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


$cloudinary_section = 'startups';

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
            

        <?php 
        if($row_entrepreneur['Type'] == 'StartupE'){ include 'left-sidebar-startup.php';} 
        if($row_entrepreneur['Type'] == 'Investor'){ include 'left-sidebar-investor.php';}
        ?>
        

            <!-- ============================================================== -->
            <!-- Page Content -->
            <!-- ============================================================== -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Bookmarks</h4> </div>

                       
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
                                                <?php if($row_entrepreneur['Title'] != ''){ ?>
                                                <h5 class="text-white">
                                                    <?php 
                                                //echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row['City'])))).', '.$row['State'];
                                                echo $row_entrepreneur['Title'];
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

        <?php 

    if($row_entrepreneur['Type'] == 'Entrepreneur'){$type = 'entrepreneur';}
    if($row_entrepreneur['Type'] == 'Investor'){$type = 'investor';}

    $sql_connect = mysqli_query($connecDB,"SELECT * FROM tbl_connections_".$type." WHERE requester_id ='".$row_entrepreneur ['userID']."' AND requester_id = '".$_SESSION['entrepreneurSession']."'");
                ?>                 
                                 
                
    <div class="col-md-12 col-sm-12 text-center sa-connect-btn" <?php if ($sql_connect->num_rows == 0){ ?> style="display:block" 
        <?php }else{ ?> style="display:none" <?php } ?> >
                                   <a href="javascript: void(0);" id="sa-connect" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" data-requested-id="<?php echo $row_entrepreneur ['userID']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-danger waves-effect waves-light">Connect +</a>
                                 </div> 
               
    <div class="col-md-12 col-sm-12 text-center sa-connect-sent" <?php if ($sql_connect->num_rows == 1){ ?> style="display:block" <?php }else{ ?> style="display:none" <?php } ?>>
                                    <a href="javascript: void(0);" id="sa-connect-cancel" class="btn btn-outline btn-default waves-effect waves-light"><span class="btn-label"><i class="fa fa-close"></i></span>Cancel Request</a>
                                  </div>
                
                              
                            <?php }//else{ ?>   
                            
                              
                                   <!--
                                    <p>&nbsp;</p>
                                 <div class="col-md-12 col-sm-12 text-center">
                                    <a href="javascript: void(0);" id="sa-basic" class="btn btn-danger hidden-xs hidden-sm waves-effect waves-light">Connect +</a>
                                 </div> -->
                               
                            <?php //} ?>    

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                


                                <div class="tab-content">

            


            <!-- ============================================================== -->
            <!-- Bookmarks Tab Starts -->
            <!-- ============================================================== -->



 

<div class="col-md-6 col-sm-6" style="padding-left:0px;">   
     <h3>Bookmarks</h3>
 </div>  

<div class="col-md-6 col-sm-6">
 <div class="col-md-6 col-sm-6" style="float:right; margin-bottom:20px;">

        <select id="bookmarks-list-select" name="bookmarks-list-select" class="form-control form-control-line">
            <option value="<?php echo BASE_PATH; ?>/bookmarks/">Startups</option>
            <option value="<?php echo BASE_PATH; ?>/bookmarks/entrepreneurs/">Entrepreneurs</option>
        </select>

    </div>  

</div>


<?php 
                    
    $sql_bookmarks = mysqli_query($connecDB,"SELECT * FROM tbl_bookmarks WHERE requester_id = '".$_SESSION['entrepreneurSession']."' AND Type = 'Startup' ORDER BY id DESC");                    
                                        
                if( ! mysqli_num_rows($sql_bookmarks) ) {
                echo '<div class="col-md-12 col-sm-12">';
                echo "<div class='no-connections text-center'>You haven't bookmarked any Startups yet!</div>"; 
                echo '</div>';
                }else{


    ?>


<div id="bookmarks-list-content">
    

<table id="demo-foo-addrow" class="table m-t-30 table-hover bookmarks-list" data-page-size="10">


        <thead>
            <tr>
                
                <th width="30%">NAME</th>
                <th width="15%">TYPE</th>
                <th>LOCATION</th>
                <th>INDUSTRY</th>
                <td class="text-center">MANAGE</td>
            </tr>
        </thead>
   
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
            
            <td>
                <a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row_startup['Name']; ?>">
                
                <?php if($row_startup['Logo'] != '' && $row_startup['Logo'] != 'on' ) { ?>
                    <img src="https://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_88,w_88/v1/<?php echo $row_startup['Logo']; ?>" class="img-circle" width="30">
                <?php }else{ ?> 
                <img src="https://res.cloudinary.com/dgml9ji66/image/upload/v1522625555/rocket_mee1lx.jpg" class="img-circle" width="30">
                <?php } ?>


                </a>
                     <a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row_startup['Name']; ?>">
                    <?php echo $row_startup['Name']; ?>
                </a>    
            </td>


            <td>
                <span class="label label-inverse"><?php echo $row_bookmarks['Type']; ?></span>
                    
                 
            </td>
            
            <td>
                <?php  echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row_startup['City'])))).', '.$row_startup['State'];
                 ?>
            </td>
            <td>
                <?php echo $row_startup['Industry']; ?>
            </td>
            <td class="text-center">
                <button type="button" id="bookmark-delete-<?php echo $row_bookmarks['requested_id']; ?>" data-requested-id="<?php echo $row_bookmarks['requested_id']; ?>" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-trash"></i></button>
            </td>
        </tr>
       
        <?php } ?>
       
        </tr>
    </tbody>
   </table> 



</div>

                                          

<?php } ?>


                                      

                                  
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