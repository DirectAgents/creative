<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET){


$sql = "SELECT * FROM startups WHERE userID ='".$_GET['userid']."'";  
$result = mysqli_query($connecDB, $sql);  
$row = mysqli_fetch_array($result);


 ?>



                <?php if(isset($_SESSION['entrepreneurSession']) && $row['id'] != '') { ?>
                        <div id="edit-a-company">
                             <div class="col-sm-12" style="padding-left:15px">
                                         <div class="row"> 
                                            <button class="btn btn-default btn-outline edit-company pull-left" data-id="<?php echo $row['id']; ?>" style="margin-right:10px;"><i class="ti-pencil"><label class="edit-team-member">Edit</i></button>
                                            <button class="btn btn-default btn-outline delete-company pull-left" data-id="<?php echo $row['id']; ?>"><i class="ti-trash"><label class="edit-team-member">Delete</i></button>
                                        </div>
                            </div> 
                             <p>&nbsp;</p>  
                         </div>  

                <?php } ?>
                
                <?php if(isset($_SESSION['entrepreneurSession']) && $row['id'] == '') { ?>

                        <div id="add-a-company">
                             <div class="col-sm-12" style="padding-left:15px">
                                         <div class="row"> 
                                            <button class="btn btn-default btn-outline add-company pull-left">Add a Company</button>
                                        </div>
                            </div> 
                             <p>&nbsp;</p>  
                         </div>  

                <?php } ?>
            


                        <div id="company-tab-data">
                            
                             <?php if($row['userID'] == $_GET['userid']) { ?>

                    
                                          <div class="row">
                                             <div class="col-md-2 col-xs-6"> 
                                                    <br>
                                                    <p class="text-muted">
                                                        <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/<?php echo $row['Logo'];?>" class="thumb-lg img-circle" alt="img">  
                                                    </p>
                                                </div>
                                               <div class="col-md-10 col-xs-6"> 
                                                    <br>
                                                    <p class="text-muted">
                                                        <h3><strong><?php echo $row['Name']; ?></strong></h3>
                                                    </p>
                                                </div>  
                                          </div>
                                          <p>&nbsp;</p>
                                            <div class="row">
                                                <div class="col-md-2 col-xs-6 b-r"> <strong>Location</strong>
                                                    <br>
                                                    <p class="text-muted">
                            <?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row['City']))))
.', '.$row['State']; ?>
                                                    </p>
                                                </div>
                                                 <div class="col-md-2 col-xs-6"> <strong>Industry</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        <?php echo $row['Industry']; ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 ">
                                                    <p class="text-muted">
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
                                            <div id="angellist">
                                                <a href="<?php echo $row['AngelList'];?>"><img src="<?php echo BASE_PATH; ?>/images/angel-list-icon.jpg"/></a>
                                            </div>
                                        </p>
                                    </div>
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
                                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/sK7riqg2mr4" frameborder="0" allowfullscreen=""></iframe>
                                        
<?php } ?>  

</div>



<script>

$(document).ready(function() {


var url_link = 'http://localhost/creative/pos/video/startup/';



$(".add-company").click(function (e) {
  //alert("11111");
    e.preventDefault();

    var userid = $('input[name=userid]').val();
    //alert(userid);
    $.ajax({
            url: url_link+"add-company.php", 
            method: "POST",
            data: {userid: userid},
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#thecompany").html(response);

                $("#upload-logo").show();
                $("#save-cancel").show();
                $("#add-a-company").hide();
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
            url: url_link+"edit-company.php", 
            method: "POST",
            data: {id: data_id},
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#thecompany").html(response);

                $("#add-a-company").hide();
                $("#edit-a-company").hide();
                $("#upload-logo").show();
                $("#save-cancel").show();
                $("#preview").hide();
                

            }
        });


});




$('.delete-company').click(function(e) {
        e.preventDefault();

        var data_id = $(".delete-company").attr("data-id");
        //var userid = $("input[name=userid]").val();
        //alert(data_id);


        ConfirmDialog('Are you sure');

        function ConfirmDialog(message) {
            $('<div></div>').appendTo('body')
                .html('<div><h6>' + message + '?</h6></div>')
                .dialog({
                    modal: true,
                    zIndex: 10000,
                    autoOpen: true,
                    width: 'auto',
                    resizable: false,
                    buttons: {
                        Yes: function() {
                            // $(obj).removeAttr('onclick');                                
                            // $(obj).parents('.Parent').remove();

                            //$('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');

                            $(this).dialog("close");

                            $.ajax({
                                url: url_link+"delete-company.php",
                                method: "POST",
                                data: {id: data_id},
                                dataType: "html",
                                success: function(response) {
                                    //alert(data);
                                    $('#deleted').fadeIn("fast");
                                    $('#deleted').delay(2000).fadeOut("slow");

                                }
                            });

                            e.preventDefault();
                        },
                        No: function() {

                            //$('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');

                            $(this).dialog("close");
                        }
                    },
                    close: function(event, ui) {
                        $(this).remove();
                    }
                });
        };


    });


});

</script>
                                  

 <?php } ?>                                  