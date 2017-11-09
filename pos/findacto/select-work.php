<?php  
 session_start();
 include_once("config.php");
 require_once 'base_path.php'; 

 $id = '1';  



$sql = mysqli_query($connecDB,"SELECT * FROM profile WHERE id ='".$_POST['userid']."' ");
$row = mysqli_fetch_array($sql);

?>

<script  src="<?php echo BASE_PATH; ?>/js/profile.js"></script>

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