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





         <script type="text/javascript">

    //<![CDATA[
       $( document ).ready(function() {
          var cloud_name = 'dgml9ji66';
var preset_name = 'scnk5xom';
if (cloud_name != '' && preset_name != '') $('#message').remove();


$('#upload_widget_multiple_edit').click(function() {
  //alert("edit");
  cloudinary.openUploadWidget({ upload_preset: preset_name, sources: [ 'local', 'url', 'image_search'], multiple : false  }, 
    function(error, result) {
      console.log(error, result);
      ids_and_ratios = {};
      $.each(result, function(i, v){
        $('#preview_edit').append('<li><img src=\"' + $.cloudinary.url(v["public_id"], {format: 'jpg', resource_type: v["resource_type"]  ,transformation: [{width: 200, crop: "fill"}]}) + '\" />')
        $('#testing_edit').append(v["public_id"])
        $('#url_preview_edit').append('<input type="checkbox" name="screenshots[]" value="'+v["public_id"]+'" checked/>')
      });
    });
});

        });
    //]]>

</script>




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
            <p><textarea placeholder="Describe here what your responsibilites were and what the application does" name="work-description" name="work-description-edit" data-rule-required="false"><?php echo $row_work['description']; ?></textarea></p>
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>


<?php

$sql=mysqli_query($connecDB,"SELECT * FROM work WHERE id='".$_POST['id']."' ORDER BY id DESC ");
$row_work = mysqli_fetch_array($sql); 

if ($row_work['screenshots'] != ''){

?>



<div id="the-screenshots">

<div class="col-md-4" style="padding-left:0px;">
<div class="panel panel-default">
      
      <div class="panel-heading">Screenshot</div>
      <div class="panel-body">
            
            <fieldset class="col-md-6" style="padding-left:0px;">     
           
              
 <?php 


$ctop = $row_work['screenshots']; 
$ctop = explode(',',$ctop);


echo '<ul class="screenshots">';
foreach($ctop as $screenshot)  
{ 

$random = rand(10000, 1000000);  

if(in_array($screenshot,$ctop)){ ?>

  <li id="<?php echo $random; ?>">
  <center>
  <div class="wrappertest">
  <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_200/v1/<?php echo $screenshot; ?>"/>

<span data-button='{"id": "<?php echo $row_work['id']; ?>","screenshot": "<?php echo $screenshot; ?>", "random": "<?php echo $random; ?>"}' class="delete-screenshot"></span>
</div>


</center>
  </li>

<?php }

}
echo "</ul>";




?>               


           
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>
</div>
</div>

<?php }else{ ?>


<div class="col-md-12" style="padding-left:0px;">
<div class="panel panel-default">
      
      <div class="panel-heading">Screenshot</div>
      <div class="panel-body">
            
            <fieldset class="col-md-12">     
            <p>
  <br>  



<a href="#work" class="cloudinary-button" id="upload_widget_multiple_edit">Upload Screenshot</a>



<br><br>
<ul id="preview_edit"></ul>
<div id="url_preview_edit"></div>

<div id="testing_edit"></div>

<p>
  


</p>


            </p>
            </fieldset>     
        
        <div class="clearfix"></div>
            </div>
                
</div>
</div>


<?php } ?>



