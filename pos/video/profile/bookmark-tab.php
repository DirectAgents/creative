<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET || $_SESSION['entrepreneurSession'] == $_GET['userid']){ 

?>

 <table class="table" cellspacing="14">
    <?php 
                    
    $sql_bookmarks = mysqli_query($connecDB,"SELECT * FROM tbl_bookmarks WHERE requester_id = '".$_SESSION['entrepreneurSession']."' ORDER BY id DESC");                    
                                        
                if( ! mysqli_num_rows($sql_bookmarks) ) {
                echo "<div class='no-connections text-center'>No Bookmarks!</div>"; 
                }else{


    ?>
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
                <a href="<?php echo BASE_PATH; ?>/startup/profile/<?php echo $row_startup['userID']; ?>">
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
    <?php } ?>