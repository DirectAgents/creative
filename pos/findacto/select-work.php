<?php  
 session_start();
 include_once("config.php");
 require_once 'base_path.php'; 



$sql = mysqli_query($connecDB,"SELECT * FROM profile WHERE id ='".$_SESSION['participantSession']."' ");
$row = mysqli_fetch_array($sql);

?>

<!--<script  src="<?php echo BASE_PATH; ?>/js/profile.js"></script>-->



<script>

$(document).ready(function() {

//////Delete Work/////////

    $('.btn-delete-work').click(function(e) {
        

        var data = $.parseJSON($(this).attr('data-button'));
        //var userid = $("input[name=userid]").val();
        //alert(data.id);


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
                                url: "../delete-work.php",
                                method: "POST",
                                data: {id: data.id, random: data.random },
                                dataType: "text",
                                success: function(response) {
                                    //alert(data);
                                    $('#deleted').fadeIn("fast");
                                    $('#deleted').delay(2000).fadeOut("slow");

                                    var random = $(response).filter('#random').text();
                                    $("#" + random).delay(1000).fadeOut("slow");

                                    var work_count = $(response).filter('#thecount').text();
                                    $('#work-count').html(work_count);


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



$('.btn-edit-work').click(function() {

        $('.list-work-box').hide();

        $('.btn-add-work').hide();
        $('.btn-list-work').fadeIn("fast");
        $('.edit-work-box').fadeIn("fast");

        var data = $.parseJSON($(this).attr('data-button'));
        //alert(data.id);

        $.ajax({
            url: "../select-work-edit.php",
            method: "POST",
            data: { id: data.id },
            dataType: "text",
            cache: false,
            success: function(response) {

                $('.edit-work-box-inner').html(response);
                $('.upload-screenshot').css("display", "none");


            }
        });


    });






 });

</script>

<?php 


$sql=mysqli_query($connecDB,"SELECT * FROM work ORDER BY id DESC ");

  
 while($row_work = mysqli_fetch_array($sql))
{ 

$random = rand(10000, 1000000);  

if($row_work['screenshots'] != ''){
$screenshot = explode(",", $row_work['screenshots'], 2);
$screenshot = $screenshot[0];
}else{
  $screenshot = "https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Basketball.jpeg/220px-Basketball.jpeg";
}

	?>


<div class="col-md-4" style="padding-left:0px" id="<?php echo $random; ?>">
<table class="table work-table">
    <tbody>
      <tr><td><center><img src="<?php 
      if($row_work['screenshots'] != ''){ 
        echo 'http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/'.$screenshot;
        }else{
          echo $screenshot;} ?>"/></center></td></tr>
      <tr><td class="work-name"><?php echo $row_work['name']; ?></td></tr>
      <tr><td class="work-name">By: <?php echo $row['Firstname']; ?></td></tr>
      <tr><td class="work-btns">
      <button type="button" data-button='{"id": "<?php echo $row_work['id']; ?>"}' class="btn btn-edit-work" id="edit-work"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
       <button type="button" data-button='{"id": "<?php echo $row_work['id']; ?>", "random": "<?php echo $random; ?>"}' class="btn btn-delete-work" id="edit-delete"><span class="glyphicon glyphicon-trash"></span> Delete</button>
      </td>
     </tr>
    </tbody>
  </table>
</div>

<?php } ?> 