<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET){


$sql = mysqli_query($connecDB,"SELECT * FROM startups WHERE userID ='".$_GET['userid']."'");
$row = mysqli_fetch_array($sql);

//echo $_GET['userid'];
//echo $row['id'];
 ?>


  <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>



<script type="text/javascript">
        $(document).ready(function() {
         

            $('.fancybox').fancybox();

           
            $('.fancybox-media_button').click(function(e){
                e.preventDefault();
             $('.fancybox-media')
                .attr('rel', 'media-gallery')
                parent.$.fancybox({
                    href: this.href,
                    openEffect : 'none',
                    closeEffect : 'none',
                    prevEffect : 'none',
                    nextEffect : 'none',
                    

                    arrows : false,
                    helpers : {
                        media : {},
                        //buttons : {}
                    }
                });
              }); // click  


        });
    </script>
   







                <?php if(isset($_SESSION['entrepreneurSession']) && $_GET['userid'] == $_SESSION['entrepreneurSession'] && $row['userID'] != '') { ?>
                        <div id="edit-a-company">
                             <div class="col-sm-12" style="padding-left:15px">
                                         <div class="row"> 
                                           
                                                <ul class="side-icon-text pull-left">
                                                    <li><a href="#/" class="edit-company" data-id="<?php echo $row['id']; ?>"><span class="circle circle-sm bg-success di"><i class="ti-pencil-alt"></i></span><span>Edit</span></a></li>
                                                    <li><a href="#/" id="delete-company" data-userid="<?php echo $_GET['userid']; ?>" data-id="<?php echo $row['id']; ?>"><span class="circle circle-sm bg-danger di"><i class="ti-trash"></i></span><span>Delete</span></a></li>
                                                </ul>


                                        </div>
                            </div> 
                             <p>&nbsp;</p>  
                         </div>  

                <?php } ?>
                


                <?php if(isset($_SESSION['entrepreneurSession']) && $_GET['userid'] == $_SESSION['entrepreneurSession'] && $row['userID'] == '') { ?>

                        <div id="add-a-company">
                             <div class="col-sm-12" style="padding-left:15px">
                                         <div class="row"> 
                                             <ul class="side-icon-text pull-left">
                                                    <li><a href="#" class="add-company"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add a Startup</span></a></li>
                                             </ul>
                                        </div>
                            </div> 
                             <p>&nbsp;</p>  
                         </div>  

                <?php } ?>


                <?php if($row['userID'] == '') { ?>

                    No Startup added so far!

                <?php } ?>
            


                        <div id="company-tab-data">
                            
                             <?php if($row['userID'] == $_GET['userid']) { ?>

                    
                                          <div class="row">
                                            
                                               <div class="col-md-12 col-xs-6"> 
                                                    <br>
                                                    <p class="text-muted">
                                                        <h4><strong><?php echo $row['Description']; ?></strong></h4>
                                                    </p>
                                                </div>  
                                          </div>
                                          
                                            <?php if($row['About'] != '') { ?>
                                            <hr>
                                            <strong>About</strong>
                                            <p class="m-t-30">
                                                <?php echo $row['About']; ?>
                                            </p>
                                            <?php } ?>
                                            <hr>
                                            <a href="<?php echo $row['Video'];?>" class="fancybox-media_button bg-info">
                                            <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/<?php echo $row['Screenshot']; ?>">
                                            </a>


                                          
                                        
<?php } ?>  

</div>



<script>

$(document).ready(function() {


var url_link_startup = 'http://localhost/creative/pos/video/startup/';



$(".add-company").click(function (e) {
  //alert("11111");
    e.preventDefault();

    var userid = $('input[name=userid]').val();
    //alert(userid);
    $.ajax({
            url: url_link_startup+"add-company.php", 
            method: "POST",
            data: {userid: userid},
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#thecompany").html(response);

                $("#upload-logo").show();
                $("#upload-screenshot").show();
                $("#save-cancel").show();
                $("#add-a-company").hide();
                $("#preview_company").hide();
                $("#preview_screenshot").hide();
                $('#url_preview_company').html('<input type="checkbox" style="display:none" name="team_member_headshot[]" value="" checked/>');
                //alert(skills_count);  

            }
        });

});





$(".edit-company").click(function (e) {
  //alert("asdf");
    e.preventDefault();


    var data_id = $(".edit-company").attr("data-id");
    //alert(data_id);

    //alert(userid);
    $.ajax({
            url: url_link_startup+"edit-company.php", 
            method: "POST",
            data: {id: data_id},
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#thecompany-startup").html(response);

                
                $("#profile-startup-tab-data").show();
                $("#add-a-company").hide();
                $("#edit-a-company").hide();
                $("#upload-logo").show();
                $("#upload-screenshot").show();
                $("#save-cancel").show();
                $("#preview_company").hide();
                $("#preview_screenshot").hide();

                
                $("#startups-socials").hide();
                $("#click-image-to-upload-logo").show();
                $("#company-logo-public").hide();
                $("#upload_widget_multiple_logo").show();
                

                

            }
        });


});



//Warning Message
    $('#delete-company').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this startup data! \n All your team members will also be deleted.",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
        }, function(){   


            var data_id = $("#delete-company").attr("data-id");
            var userid = $("#delete-company").attr("data-userid");
            //alert(data_id);

                        $.ajax({
                                url: url_link_startup+"delete-company.php",
                                method: "POST",
                                data: {id: data_id},
                                dataType: "html",
                                success: function(response) {
                                    //alert(data);
                                    //$('#deleted').fadeIn("fast");
                                    //$('#deleted').delay(2000).fadeOut("slow");
                                window.location.href = url_link_startup+'create';
                                //$("#thecompany-startup").load(url_link+"company.php?userid="+userid); 
                                //swal("Deleted!", "Your Company has been deleted.", "success");  

                                }
                            });
                      
             
        });
    });




});

</script>
                                  

<!-- Sweet-Alert  -->
<script src="<?php echo BASE_PATH; ?>/js/sweetalert.min.js"></script>


 <?php } ?>                                  