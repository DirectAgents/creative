<?php  
 session_start();
 include_once("config.php");
 require_once 'base_path.php'; 

 $id = '1';  



$sql = mysqli_query($connecDB,"SELECT * FROM profile WHERE id ='1' ");
$row = mysqli_fetch_array($sql);

?>





<?php 


$sql=mysqli_query($connecDB,"SELECT * FROM work WHERE id='".$_POST['id']."' ORDER BY id DESC ");
$row_work = mysqli_fetch_array($sql); 


	?>  




<script  src="<?php echo BASE_PATH; ?>/js/profile.js"></script>



<input type="hidden" name="id" id="id" value="<?php echo $row_work['id']; ?> ">

<div class="panel panel-default">
      
      <div class="panel-heading">Name</div>
      <div class="panel-body">
            
            <fieldset class="col-md-12">     
            <p><input type="text" name="work-name-edit" id="work-name-edit" data-rule-required="true" data-msg-required="Please enter a name." 
            value="<?php echo $row_work['name']; ?>"/></p>
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>



<div class="panel panel-default">
      
      <div class="panel-heading">Link</div>
      <div class="panel-body">
            
            <fieldset class="col-md-12">     
            <p><input type="text" name="work-link-edit" id="work-link-edit" data-rule-required="true" data-msg-required="Please enter a link."
            value="<?php echo $row_work['link']; ?>"/></p>
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>


<div class="panel panel-default">
      
      <div class="panel-heading">Describe your work</div>
      <div class="panel-body">
            
            <fieldset class="col-md-12">     
            <p><textarea placeholder="asdf" name="work-description-edit" data-rule-required="false"><?php echo $row_work['description']; ?></textarea></p>
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>


<?php

$sql=mysqli_query($connecDB,"SELECT * FROM work WHERE id='".$_POST['id']."' ORDER BY id DESC ");
$row_work = mysqli_fetch_array($sql); 

if ($row_work['screenshots'] != ''){

?>

<div class="panel panel-default">
      
      <div class="panel-heading">Screenshots</div>
      <div class="panel-body">
            
            <fieldset class="col-md-12">     
           
              
 <?php 


$ctop = $row_work['screenshots']; 
$ctop = explode(',',$ctop);


echo '<ul class="screenshots">';
foreach($ctop as $screenshot)  
{ 

$random = rand(10000, 1000000);  

if(in_array($screenshot,$ctop)){ ?>

  <li class='col-md-4' id="<?php echo $random; ?>">
  <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_200/v1/<?php echo $screenshot; ?>"/>
  <a href="#work" data-button='{"screenshot": "<?php echo $screenshot; ?>", "random": "<?php echo $random; ?>"}' class="delete-screenshot">delete</a>
  </li>

<?php }

}
echo "</ul>";




?>               


           
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>

<?php } ?>




