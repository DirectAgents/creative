<?php  
 include_once("config.php"); 

 $id = '1';  



$sql = mysqli_query($connecDB,"SELECT * FROM profile WHERE id ='".$_POST['userid']."' ");
$row = mysqli_fetch_array($sql);


$sql=mysqli_query($connecDB,"SELECT * FROM work ORDER BY id DESC ");

  
 while($row_work = mysqli_fetch_array($sql))
{ 

if($row_work['screenshots'] != ''){
$screenshot = explode(",", $row_work['screenshots'], 2);
$screenshot = $screenshot[0];
}else{
  $screenshot = "https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Basketball.jpeg/220px-Basketball.jpeg";
}

	?>


<div class="col-md-4" style="padding-left:0px">
<table class="table work-table">
    <tbody>
      <tr><td><img src="<?php 
      if($row_work['screenshots'] != ''){ 
        echo 'http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_260/v1/'.$screenshot;
        }else{
          echo $screenshot;} ?>"/></td></tr>
      <tr><td class="work-name"><?php echo $row_work['name']; ?></td></tr>
      <tr><td class="work-name">By: <?php echo $row['Firstname']; ?></td></tr>
    </tbody>
  </table>
</div>

<?php } ?> 