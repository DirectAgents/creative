<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET || $_SESSION['entrepreneurSession'] == $_GET['userid']){ 

?>




<!---Connections Request-->


<table class="table" cellspacing="14">
        <?php 
                    
                                        $sql_connections = mysqli_query($connecDB,"SELECT * FROM tbl_connections WHERE requested_id = '".$_SESSION['entrepreneurSession']."' AND status != 'denied' || requester_id = '".$_SESSION['entrepreneurSession']."' AND status != 'denied' ORDER BY id DESC");                    
                                        
                                        if( ! mysqli_num_rows($sql_connections) ) {
                                            echo "<div class='no-connections text-center'>No Connections!</div>"; 
                                        }else{


                                  ?>
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

            echo $row_connections[ 'requester_id'];

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

var url_link = 'http://localhost/creative/pos/video/startup/';    

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
            alert(requester_id);

                        $.ajax({
                                url: url_link+"connect-accept.php",
                                method: "GET",
                                data: {requested_id: requested_id, requester_id: requester_id},
                                dataType: "html",
                                success: function(response) {
                                    //alert(data);
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
         alert(requested_id);

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
        alert(requested_id);

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
                    <img src="<?php echo $profileimage; ?>" class="img-circle" width="30">
                </td>
                <td>
                    <?php echo $row_entrepreneur['Fullname']; ?>
                </td>
                <td><span class="label label-warning label-rouded"><?php echo $row_connections['type']; ?></span></td>
                <td>
                    <?php echo $row_entrepreneur['Email']; ?>
                </td>
                <td>
                    <?php echo $row_entrepreneur['Phone']; ?>
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
                       <button type="button" id="sa-connect-deny" data-requester-id="<?php echo $row_connections['requester_id']; ?>" data-requested-id="<?php echo $row_connections['requested_id']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-info btn-outline btn-circle btn-sm m-r-5"><i class="ti-trash"></i></button>
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





    <?php } ?>