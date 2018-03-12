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
                            <h4 class="page-title">Connections</h4> </div>

                       
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
                                


                                <div class="tab-content">

            
     

            <!-- ============================================================== -->
            <!-- Connections Tab Starts -->
            <!-- ============================================================== -->

<div id="connections-tab-content">
                                      
                                          

                                          <table class="table" cellspacing="14">
        <?php 


        if($row_entrepreneur['Type'] == 'Startup'){$type = 'startup';}
        if($row_entrepreneur['Type'] == 'Investor'){$type = 'investor';}
                    
                                        $sql_connections = mysqli_query($connecDB,"SELECT * FROM tbl_connections_".$type." WHERE requester_id = '".$_SESSION['entrepreneurSession']."' AND status != 'denied' OR requested_id = '".$_SESSION['entrepreneurSession']."' AND status != 'denied' ORDER BY id DESC");                    
                                        
                                        if( ! mysqli_num_rows($sql_connections) ) {
                                            echo "<div class='no-connections text-center'>No Connections!</div>"; 
                                        }else{


                                  ?>

          <h3>Connections</h3>
          <p>&nbsp;</p> 
                                               
        <div class="connections-header">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>NAME</th>
                    <th>TYPE</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>STATUS</th>
                    <th>MANAGE</th>
                </tr>
            </thead>
        </div>
        <tbody>
            <?php   

                                      while($row_connections = mysqli_fetch_array($sql_connections)){

                                        ?>

            <?php        

            //echo $row_connections[ 'requester_id'];

            if($row_connections[ 'requester_id'] == $_SESSION['entrepreneurSession'] && $row_connections[ 'status']=='pending' ||
            $row_connections[ 'requester_id'] == $_SESSION['entrepreneurSession'] && $row_connections[ 'status']=='accepted' ) {

                                         $sql_entrepreneur = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$row_connections['requested_id']."'");
                                         $row_entrepreneur= mysqli_fetch_array($sql_entrepreneur);
             }     
             

             if($row_connections[ 'requested_id'] == $_SESSION['entrepreneurSession'] && $row_connections[ 'status']=='pending' ||
             $row_connections[ 'requested_id'] == $_SESSION['entrepreneurSession'] && $row_connections[ 'status']=='accepted' ) {

                                         $sql_entrepreneur = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$row_connections['requester_id']."'");
                                         $row_entrepreneur= mysqli_fetch_array($sql_entrepreneur);
             }                            


                                        ?>



<script>

$(document).ready(function() {

var url_link = 'http://localhost/creative/pos/video/profile/';    

$('#sa-connect-accept-'+<?php echo $row_connections['requester_id']; ?>).click(function(){
        //alert("asfdasdf");
        //var data_thumb = $("#sa-connect").attr("data-thumb");
        //alert(data_thumb);

        swal({   
            title: "Accept!",   
            text: "Accept Connection Request!",   
            //type: "warning",
            //imageUrl: data_thumb,   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, accept!",   
            closeOnConfirm: false 
        }, function(){   


           var requested_id = $("#sa-connect-accept-"+<?php echo $row_connections['requester_id']; ?>).attr("data-requested-id");
           var requester_id = $("#sa-connect-accept-"+<?php echo $row_connections['requester_id']; ?>).attr("data-requester-id");
           //alert(requester_id);

                        $.ajax({
                                url: url_link+"connect-accept.php",
                                method: "GET",
                                data: {requested_id: requested_id, requester_id: requester_id},
                                dataType: "html",
                                success: function(response) {
                                    //alert(response);
                                    //$('#deleted').fadeIn("fast");
                                    //$('#deleted').delay(2000).fadeOut("slow");
                                //$("#existing-team-members").load(url_link+"existing-team-members.php?userid="+userid); 
                                //$("#add-a-team-member").show();
                                //$('.sa-connect-pending').hide();
                                //$('.sa-connect-accepted').show();

                                $("#connections-tab-content").load(url_link+"connections-tab.php?userid="+requester_id);

                                if (response != 'no good') {
                                swal("Success!", "You are now connected.", "success");  
                                 }

                                }
                            });
                      
             
        });
    });




$('#sa-connect-cancel-'+<?php echo $row_connections['requested_id']; ?>).click(function(){
        
        //var data_thumb = $("#sa-connect").attr("data-thumb");
        //alert(data_thumb);

         var requested_id = $("#sa-connect-cancel-"+<?php echo $row_connections['requested_id']; ?>).attr("data-requested-id");
         var requester_id = $("#sa-connect-cancel-"+<?php echo $row_connections['requested_id']; ?>).attr("data-requester-id");
         //alert(requested_id);

        swal({   
            title: "Cancel!",   
            text: "Cancel Connect Request!",   
            //type: "warning",
            //imageUrl: data_thumb,   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, cancel!",   
            closeOnConfirm: false 
        }, function(){   

           

          

                        $.ajax({
                                url: url_link+"connect-cancel.php",
                                method: "GET",
                                data: {requested_id: requested_id, requester_id: requester_id},
                                dataType: "html",
                                success: function(response) {
                               

                                $("#connections-tab-content").load(url_link+"connections-tab.php?userid="+requester_id);

                                if (response != 'no good') {
                                swal("Success!", "You canceled your request.", "success");  
                                 }


                                }
                            });
                      
             
        });
    });




$('#sa-connect-deny-'+<?php echo $row_connections['requester_id']; ?>).click(function(){
        
        //var data_thumb = $("#sa-connect").attr("data-thumb");
        //alert(data_thumb);

        var requested_id = $("#sa-connect-deny-"+<?php echo $row_connections['requester_id']; ?>).attr("data-requested-id");
        var requester_id = $("#sa-connect-deny-"+<?php echo $row_connections['requester_id']; ?>).attr("data-requester-id");
        //alert(requested_id);

        swal({   
            title: "Deny!",   
            text: "Deny Connection Request!",   
            //type: "warning",
            //imageUrl: data_thumb,   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, deny!",   
            closeOnConfirm: false 
        }, function(){   

          
            //alert(requested_id);

                        $.ajax({
                                url: url_link+"connect-deny.php",
                                method: "GET",
                                data: {requested_id: requested_id, requester_id: requester_id},
                                dataType: "html",
                                success: function(response) {
                                   
                                $("#connections-tab-content").load(url_link+"connections-tab.php?userid="+requester_id);

                                if (response != 'no good') {
                                swal("Success!", "You have denied the request.", "success"); 
                                 }

                               
                                }
                            });
                      
             
        });
    });



$('#sa-connect-delete-'+<?php echo $row_connections['requester_id']; ?>).click(function(){
        
        //var data_thumb = $("#sa-connect").attr("data-thumb");
        //alert(data_thumb);

        var requested_id = $("#sa-connect-deny-"+<?php echo $row_connections['requester_id']; ?>).attr("data-requested-id");
        var requester_id = $("#sa-connect-deny-"+<?php echo $row_connections['requester_id']; ?>).attr("data-requester-id");
        //alert(requested_id);

        swal({   
            title: "Delete Connection!",   
            text: "Are you sure?",   
            //type: "warning",
            //imageUrl: data_thumb,   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete!",   
            closeOnConfirm: false 
        }, function(){   

          
            //alert(requested_id);

                        $.ajax({
                                url: url_link+"connect-delete.php",
                                method: "GET",
                                data: {requested_id: requested_id, requester_id: requester_id},
                                dataType: "html",
                                success: function(response) {
                                   
                                $("#connections-tab-content").load(url_link+"connections-tab.php?userid="+requester_id);

                                if (response != 'no good') {
                                swal("Success!", "You have deleted the connection.", "success"); 
                                 }

                               
                                }
                            });
                      
             
        });
    });







});

</script>


<?php //echo $row_connections['requested_id']; ?>
<?php //echo $row_connections['requester_id']; ?>


            <?php if($row_entrepreneur['ProfileImage'] == 'Google'){  $profileimage = $row_entrepreneur['google_picture_link']; } ?>
            <?php if($row_entrepreneur['ProfileImage'] == 'Facebook'){ $profileimage = "https://graph.facebook.com/".$row_entrepreneur['facebook_id']."/picture"; } ?>
            <?php if($row_entrepreneur['ProfileImage'] == 'Linkedin'){  $profileimage = $row_entrepreneur['linkedin_picture_link'];  } ?>
            <tr class="advance-table-row connections-tab-inside">
                <td width="10"></td>
                <td>
                    <a href="<?php echo BASE_PATH; ?>/profile/<?php echo $row_entrepreneur['username'];?>"><img src="<?php echo $profileimage; ?>" class="img-circle" width="30"></a>
                </td>
                <td>
                    <a href="<?php echo BASE_PATH; ?>/profile/<?php echo $row_entrepreneur['username'];?>"><?php echo $row_entrepreneur['Fullname']; ?></a>
                </td>
                <td><span class="label label-warning label-rouded"><?php echo $row_entrepreneur['Type']; ?></span></td>
                <td>
                    <?php echo $row_entrepreneur['Email']; ?>
                </td>
                <td>
                    <?php if($row_entrepreneur['Phone'] != ''){ echo $row_entrepreneur['Phone']; }else{echo "-";} ?>
                </td>
                 <td>
                    <?php if($row_connections['status'] == 'pending') { ?>
                    <span class="label label-megna label-rouded">Pending</span>
                    <?php } ?>
                    <?php if($row_connections['status'] == 'accepted') { ?>
                    <span class="label label-success label-rouded">Connected</span>
                    <?php } ?>
                    
                </td>
                <td style="text-align: center">
                   
                    <div class="sa-connect-pending" <?php if($row_connections[ 'requested_id'] == $_SESSION['entrepreneurSession'] && $row_connections[ 'status']=='pending' ) { ?> style="display:block"
                        <?php }else{ ?> style="display:none"
                        <?php } ?>>
                        <button type="button" id="sa-connect-deny-<?php echo $row_connections['requester_id']; ?>" data-requester-id="<?php echo $row_connections['requester_id']; ?>" data-requested-id="<?php echo $row_connections['requested_id']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-close"></i></button>
                        <button type="button" id="sa-connect-accept-<?php echo $row_connections['requester_id']; ?>" data-requester-id="<?php echo $row_connections['requester_id']; ?>" data-requested-id="<?php echo $row_connections['requested_id']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-check"></i></button>
                    </div>


                   
                    
                    <div class="sa-connect-pending" <?php if($row_connections[ 'requester_id'] == $_SESSION['entrepreneurSession'] && $row_connections[ 'status']=='pending' ) { ?> style="display:block"
                        <?php }else{ ?> style="display:none"
                        <?php } ?>>
                        <button type="button" id="sa-connect-cancel-<?php echo $row_connections['requested_id']; ?>" data-requester-id="<?php echo $row_connections['requester_id']; ?>" data-requested-id="<?php echo $row_connections['requested_id']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-close"></i></button>
                       
                    </div>
                    
                    <div class="sa-connect-accepted"  <?php if($row_connections[ 'requested_id'] == $_SESSION['entrepreneurSession'] && $row_connections[ 'status']=='accepted' || $row_connections[ 'requester_id'] == $_SESSION['entrepreneurSession'] && $row_connections[ 'status']=='accepted' ) { ?> style="display:block"
                        <?php }else{ ?> style="display:none"
                        <?php } ?>>
                        <!--<button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>-->
                       <button type="button" id="sa-connect-delete-<?php echo $row_connections['requester_id']; ?>" data-requester-id="<?php echo $row_connections['requester_id']; ?>" data-requested-id="<?php echo $row_connections['requested_id']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-trash"></i></button>
                    </div>
                    
                    <div class="sa-connect-denied" <?php if($row_connections[ 'status']=='denied' ) { ?> style="display:block"
                        <?php }else{ ?> style="display:none"
                        <?php } ?>>
                        <button type="button" id="sa-connect-deny" data-requester-id="<?php echo $row_connections['requester_id']; ?>" data-requested-id="<?php echo $row_connections['requested_id']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-trash"></i></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="8" class="sm-pd"></td>
            </tr>
            <?php } ?>
            <?php } ?>
            </tr>
        </tbody>
    </table>



</div>
                                      

                                  
            <!-- ============================================================== -->
            <!-- Connections Tab Ends -->
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