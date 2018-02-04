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


 ?>



<?php if($_GET['userid'] != isset($_SESSION['entrepreneurSession']) && $row['userID'] != $_GET['userid']) { ?>

No Team Members added so far!

 <?php } ?>


                           

                        <div class="row">              

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
                                            <a href="javascript:void(0)"><img src="https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img">
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
                                            <a href="#" id="sa-warning-<?php echo $row_team['id']; ?>" data-id="<?php echo $row_team['id']; ?>" data-userid="<?php echo $_GET['userid']; ?>" data-thumb="<?php if($row_team['ProfileImage'] != '') { echo "http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/".$row_team['ProfileImage'];}else{ echo "https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/images/users/genu.jpg";}?>"><i class="ti-trash"><label class="delete-team-member">Delete</label> </i></a>

                                        

                                            </div>
                                            <br>
                             <?php } ?>                
                                            
                            </div>
                          
                                           

<script>
 

 $("#edit-member-"+<?php echo $row_team['id']; ?>).click(function (e) {
    e.preventDefault();

    var url_link = 'http://localhost/creative/pos/video/startup/';

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
                $("#preview_company").hide();
                $("#preview_team").hide();
                $("#add-a-team-member").hide();

                //alert(skills_count);  

            }
        });


});




//////Delete Team Member/////////

    $('#sa-warning-'+<?php echo $row_team['id']; ?>).click(function(){
        
        var data_thumb = $("#sa-warning-"+<?php echo $row_team['id']; ?>).attr("data-thumb");
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

           var url_link = 'http://localhost/creative/pos/video/startup/';

           var data_id = $("#sa-warning-"+<?php echo $row_team['id']; ?>).attr("data-id");
           var userid = $("#sa-warning-"+<?php echo $row_team['id']; ?>).attr("data-userid");
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





</script>  


                                        </div>


                                          
                                          
                                           
                                        </div>

                                        <?php } ?>
                                        </div>  

                                  

<!-- Sweet-Alert  -->
<script src="<?php echo BASE_PATH; ?>/js/sweetalert.min.js"></script>
<!--<script src="<?php echo BASE_PATH; ?>/js/jquery.sweet-alert.custom.js"></script>-->

 <?php } ?>                                  