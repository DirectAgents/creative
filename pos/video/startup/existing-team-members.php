<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET){


$sql = "SELECT * FROM tbl_team WHERE userID ='".$_GET['userid']."'";  
$result = mysqli_query($connecDB, $sql);  
$row = mysqli_fetch_array($result);

$sql_user = "SELECT * FROM tbl_users WHERE userID ='".$_GET['userid']."'";  
$result_user = mysqli_query($connecDB, $sql_user);  
$row_user = mysqli_fetch_array($result_user);

$sql_startup = "SELECT * FROM startups WHERE userID ='".$_GET['userid']."'";  
$result_startup = mysqli_query($connecDB, $sql_startup);  
$row_startup = mysqli_fetch_array($result_startup);


$words = explode(" ", $row_user['Fullname']);
$thefirstname = $words[0];

 ?>




<?php if($row_startup['userID'] == '' && $row['userID'] == '' && $_GET['userid'] != $_SESSION['entrepreneurSession'] ) { ?>

No Team Members added so far!

 <?php } ?>


                           

                        <div class="row">     

<?php if($row_startup['userID'] != '') { ?>

        <div id="team-tab-data">
                    
                    <div class="col-md-6 col-xs-12">
                            <div class="user-btm-box-team">
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-purple">
                                            <div id="facebook">
                                                <a href="<?php echo $row_user['Facebook'];?>"><i class="ti-facebook"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-blue">
                                            <div id="twitter">
                                                <a href="<?php echo $row_user['Twitter'];?>"><i class="ti-twitter"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-danger">
                                            <div id="linkedin">
                                                <a href="<?php echo $row_user['Linkedin'];?>"><i class="ti-linkedin"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            <div class="white-box border">
                                <div class="user-bg">
                                    <div class="overlay-box-grey">
                                        <div class="user-content">
                                            <a href="<?php echo BASE_PATH; ?>/profile/<?php echo $row_user['username']; ?>">
<?php if($row_user['ProfileImage'] == 'Google'){ ?>
         <img src="<?php echo $row_user['google_picture_link']; ?>" class="thumb-lg img-circle" alt="img">
<?php } ?>

<?php if($row_user['ProfileImage'] == 'Facebook'){ ?>
<img src="https://graph.facebook.com/<?php echo $row_user['facebook_id']; ?>/picture?type=large" class="thumb-lg img-circle" alt="img">
<?php } ?>

<?php if($row_user['ProfileImage'] == 'Linkedin'){ ?>
        <img src="<?php echo $row_user['linkedin_picture_link']; ?>" class="thumb-lg img-circle" alt="img">
       
<?php } ?>
                                            </a>
                                            <div id="fullname">
                                                <a href="<?php echo BASE_PATH; ?>/profile/<?php echo $row_user['username']; ?>"><h4 class="text-black"><?php echo $row_user['Fullname']; ?></h4></a>
                                            </div>
                                            <div id="city-state">
                                                
                                                <h5 class="text-black"><?php echo $row_user['Position']; ?></h5>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            <?php if ($row_user['Skills'] != ''){ ?>

                                <div class="user-btm-box">
                                    

                                        <?php 
                                        $ctop = $row_user['Skills']; 
                                        $ctop = explode(',',$ctop); 

                                        if($row_user['Skills'] != '' && $row_user['Skills'] != 'NULL' ){

                                        foreach($ctop as $skill)   { 
                                                       
                                        ?>
                                        <div class="skillsdiv_teammember"><?php echo $skill; ?></div>

                                        <?php } } ?>

                                       
                                        
                                </div>

                            <?php } ?>    

                            
                                            
                            </div>



                             <?php if(isset($_SESSION['entrepreneurSession'])) { ?>    
                               <?php if($_GET['userid'] != $_SESSION['entrepreneurSession']) { ?>   


<?php if($row_user['ProfileImage'] == 'Google'){  $profileimage = $row_user['google_picture_link']; } ?>
<?php if($row_user['ProfileImage'] == 'Facebook'){  $profileimage = "https://graph.facebook.com/".$row_user['facebook_id']."/picture?type=large"; } ?>
<?php if($row_user['ProfileImage'] == 'Linkedin'){  $profileimage = $row_user['linkedin_picture_link'];  } ?>


                             <?php 
    $sql_connect = mysqli_query($connecDB,"SELECT * FROM tbl_connections_entrepreneur WHERE requested_id ='".$row_user['userID']."' AND requester_id = '".$_SESSION['entrepreneurSession']."'");
                ?>                 
                                 
                
    <div class="col-md-12 col-sm-12 text-center sa-connect-btn" <?php if(mysqli_num_rows($sql_connect)<=0) { ?> style="display:block" 
        <?php }else{ ?> style="display:none" <?php } ?> >
                                   <a href="javascript: void(0);" id="sa-connect" data-name="<?php echo $thefirstname; ?>" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" data-requested-id="<?php echo $row_user['userID']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-danger waves-effect waves-light">Connect +</a>
                                 </div> 
               
    <div class="col-md-12 col-sm-12 text-center sa-connect-sent" <?php if(mysqli_num_rows($sql_connect)>0) { ?> style="display:block" <?php }else{ ?> style="display:none" <?php } ?>>
                                    <a href="javascript: void(0);" id="sa-connect-cancel" data-name="<?php echo $thefirstname; ?>" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>" data-requested-id="<?php echo $row_user['userID']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-outline btn-default waves-effect waves-light"><span class="btn-label"><i class="fa fa-close"></i></span>Cancel Request</a>
                                  </div>
                
                               <?php } ?>  

                            <?php }else{ ?>   
                            
                              
                                   
                                 <div class="col-md-12 col-sm-12 text-center">
                                    <a href="javascript: void(0);" id="connect-member" class="btn btn-danger hidden-xs hidden-sm waves-effect waves-light">Connect +</a>
                                 </div> 
                               
                            <?php } ?>    


                        </div>    


<?php } ?>





                                        <?php
                                $sql = mysqli_query($connecDB,"SELECT * FROM tbl_team WHERE userID = '".$_GET['userid']."' ORDER BY id DESC");
                                while($row_team = mysqli_fetch_array($sql)){  
                                        ?>
                                        
                <div id="team-tab-data">
                                            

               
                        <div class="col-md-6 col-xs-12">
                            <div class="user-btm-box-team">
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-purple">
                                            <div id="facebook">
                                                <a href="<?php echo $row_team['Facebook'];?>"><i class="ti-facebook"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-blue">
                                            <div id="twitter">
                                                <a href="<?php echo $row_team['Twitter'];?>"><i class="ti-twitter"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-danger">
                                            <div id="linkedin">
                                                <a href="<?php echo $row_team['Linkedin'];?>"><i class="ti-linkedin"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            <div class="white-box border">
                                <div class="user-bg">
                                    <div class="overlay-box-grey">
                                        <div class="user-content">
                                            <a href="javascript:void(0)">
                                                <?php if($row_team['ProfileImage'] != '') { ?>
                                            <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/<?php echo $row_team['ProfileImage'];?>" class="thumb-lg img-circle" alt="img">  
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)"><img src="<?php echo BASE_PATH; ?>/images/no-profile-picture.jpg" class="thumb-lg img-circle" alt="img">
                                            <?php } ?>
                                            </a>
                                            <div id="fullname">
                                                <h4 class="text-black"><?php echo $row_team['Fullname']; ?></h4>
                                            </div>
                                            <div id="city-state">
                                                
                                                <h5 class="text-black"><?php echo $row_team['Position']; ?></h5>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            <?php if ($row_team['Skills'] != ''){ ?>

                                <div class="user-btm-box">
                                    

                                        <?php 
                                        $ctop = $row_team['Skills']; 
                                        $ctop = explode(',',$ctop); 

                                        if($row_team['Skills'] != '' && $row_team['Skills'] != 'NULL' ){

                                        foreach($ctop as $skill)   { 
                                                       
                                        ?>
                                        <div class="skillsdiv_teammember"><?php echo $skill; ?></div>

                                        <?php } } ?>

                                       
                                        
                                </div>

                            <?php } ?>    

                            <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $_GET['userid']) { ?>
                                
                                <hr>
                                           
                                            <div class="pull-right" style="padding-right:15px;">
                                            <a href="#" id="edit-member-<?php echo $row_team['id']; ?>" data-id="<?php echo $row_team['id']; ?>"><i class="ti-pencil"><label class="edit-team-member">Edit</i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="#" id="sa-delete-<?php echo $row_team['id']; ?>" data-id="<?php echo $row_team['id']; ?>" data-userid="<?php echo $_GET['userid']; ?>" data-thumb="<?php if($row_team['ProfileImage'] != '') { echo "http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/".$row_team['ProfileImage'];}else{ echo BASE_PATH."/images/no-profile-picture.jpg";}?>"><i class="ti-trash"><label class="delete-team-member">Delete</label> </i></a>

                                        

                                            </div>
                                            <br>
                             <?php } ?>                
                                            
                            </div>
                          
                                           

<script>
 
 $(document).ready(function() {

 var url_link = 'http://localhost/creative/pos/video/startup/';

 $("#edit-member-"+<?php echo $row_team['id']; ?>).click(function (e) {
    e.preventDefault();


    var data_id = $("#edit-member-"+<?php echo $row_team['id']; ?>).attr("data-id");
    //alert(data_id);

    //alert(userid);
    $.ajax({
            url: url_link+"edit-member.php", 
            method: "POST",
            data: {id: data_id},
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#existing-team-members").html(response);

                $("#upload-headshot").show();
                $("#save-cancel").show();
                $("#preview_team").hide();
                $("#add-a-team-member").hide();
                

                //alert(skills_count);  

            }
        });


});




//////Delete Team Member/////////

    $('#sa-delete-'+<?php echo $row_team['id']; ?>).click(function(){
        
        var data_thumb = $("#sa-delete-"+<?php echo $row_team['id']; ?>).attr("data-thumb");
        //alert(data_thumb);

        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this team member!",   
            //type: "warning",
            imageUrl: data_thumb,   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
        }, function(){   

           

           var data_id = $("#sa-delete-"+<?php echo $row_team['id']; ?>).attr("data-id");
           var userid = $("#sa-delete-"+<?php echo $row_team['id']; ?>).attr("data-userid");
            //alert(data_id);

                        $.ajax({
                                url: url_link+"delete-team-member.php",
                                method: "POST",
                                data: {id: data_id},
                                dataType: "html",
                                success: function(response) {
                                    //alert(data);
                                    //$('#deleted').fadeIn("fast");
                                    //$('#deleted').delay(2000).fadeOut("slow");
                                $("#existing-team-members").load(url_link+"existing-team-members.php?userid="+userid); 
                                $("#add-a-team-member").show();
                                swal("Deleted!", "Your Team Member has been deleted.", "success");  

                                }
                            });
                      
             
        });
    });




});

</script>  


                                        </div>


                                          
                                          
                                           
                                        </div>

                                        <?php } ?>
                                        </div>  

                                  


<script>


var url_link = 'http://localhost/creative/pos/video/startup/';

////////Connect//////////

$('#sa-connect').click(function(){
        //alert("111asdfasfd");
        
        var data_thumb = $("#sa-connect").attr("data-thumb");
        //alert(data_thumb);
        var data_name = $("#sa-connect").attr("data-name");

        swal({   
            title: "Connect!",   
            text: "Send a request to connect with "+data_name+" !",   
            //type: "warning",
            imageUrl: data_thumb,   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, connect!",   
            closeOnConfirm: false 
        }, function(){   


           var requested_id = $("#sa-connect").attr("data-requested-id");
           var requester_id = $("#sa-connect").attr("data-requester-id");
           //alert(requester_id);

                        $.ajax({
                                url: url_link+"connect-request.php",
                                method: "POST",
                                data: {requested_id: requested_id, requester_id: requester_id},
                                dataType: "html",
                                success: function(response) {
                                    //alert(data);
                                    //$('#deleted').fadeIn("fast");
                                    //$('#deleted').delay(2000).fadeOut("slow");
                                //$("#existing-team-members").load(url_link+"existing-team-members.php?userid="+userid); 
                                //$("#add-a-team-member").show();
                                $('.sa-connect-btn').hide();
                                $('.sa-connect-sent').show();
                                swal("Success!", "Your request has been sent.", "success");  

                                }
                            });
                      
             
        });
    });



$('#sa-connect-cancel').click(function(){
        
        var data_thumb = $("#sa-connect-cancel").attr("data-thumb");
        //alert(data_thumb);
        var data_name = $("#sa-connect").attr("data-name");

        swal({   
            title: "Connect!",   
            text: "Cancel request to connect with "+data_name+" !",  
            //type: "warning",
            imageUrl: data_thumb,   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, cancel!",   
            closeOnConfirm: false 
        }, function(){   


           var requested_id = $("#sa-connect-cancel").attr("data-requested-id");
           var requester_id = $("#sa-connect-cancel").attr("data-requester-id");
           //alert(requested_id);

                        $.ajax({
                                url: url_link+"connect-cancel.php",
                                method: "POST",
                                data: {requested_id: requested_id, requester_id: requester_id},
                                dataType: "html",
                                success: function(response) {
                                    //alert(data);
                                    //$('#deleted').fadeIn("fast");
                                    //$('#deleted').delay(2000).fadeOut("slow");
                                //$("#existing-team-members").load(url_link+"existing-team-members.php?userid="+userid); 
                                //$("#add-a-team-member").show();
                                $('.sa-connect-btn').show();
                                $('.sa-connect-sent').hide();
                                swal("Success!", "Your request to connect has been canceled.", "success");  

                                }
                            });
                      
             
        });
    });


$('#connect-member').click(function(){
        swal("Login to connect!");
    });


</script>    


<!-- Sweet-Alert  -->
<script src="<?php echo BASE_PATH; ?>/js/sweetalert.min.js"></script>
<!--<script src="<?php echo BASE_PATH; ?>/js/profile-entrepreneur.js"></script>-->
<!--<script src="<?php echo BASE_PATH; ?>/js/jquery.sweet-alert.custom.js"></script>-->

 <?php } ?>                                  