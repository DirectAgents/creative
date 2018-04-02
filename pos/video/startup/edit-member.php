<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){


$sql = "SELECT * FROM tbl_team WHERE id ='".$_POST['id']."'";  
$result = mysqli_query($connecDB, $sql);  
$row = mysqli_fetch_array($result);


$skills = explode(', ', $row['Skills']);


 ?>





    <div id="team-tab-data">
       
            <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['entrepreneurSession']; ?>">
            <input type="hidden" name="id-team-member" id="id-team-member" value="<?php echo $_POST['id']; ?>">
            <div class="form-group">
                <label class="col-md-12">Full Name</label>
                <div class="col-md-12">
                    <input type="text" id="fm_fullname" name="fm_fullname" placeholder="Jon Snow" value="<?php echo $row['Fullname']; ?>" class="form-control form-control-line"> </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Title</label>
                <div class="col-md-12">
                  

                    <select id="fm_title" name="fm_title" tabindex="2" class="form-control form-control-line">
 <option value="">--Select Title--</option>
<option value="Associate/Staff" <?php if($row['Title'] == 'Associate/Staff'){echo "selected";}?>>Associate/Staff</option>
<option value="Manager/Supervisor" <?php if($row['Title'] == 'Manager/Supervisor'){echo "selected";}?>>Manager/Supervisor</option>
<option value="VP/SVP/Dept Head" <?php if($row['Title'] == 'VP/SVP/Dept Head'){echo "selected";}?>>VP/SVP/Dept Head</option>
<option value="C-Level Executive (CEO, CFO, etc.)" <?php if($row['Title'] == 'C-Level Executive (CEO, CFO, etc.)'){echo "selected";}?>>C-Level Executive (CEO, CFO, etc.)</option>
<option value="Founder/Owner/Principal" <?php if($row['Title'] == 'Founder/Owner/Principal'){echo "selected";}?>>Founder/Owner/Principal</option>
<option value="Other" <?php if($row['Title'] == 'Other'){echo "selected";}?>>Other</option>
</select>


                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Skills</label>
                <div class="col-md-12" style="padding-left:0px;">
                   
<div class="col-md-9" style="padding-bottom:20px;">
  <select data-placeholder="Select skills..." id="fm_skills" name="fm_skills" class="form-control form-control-line chosen-select" multiple>

<?php 

$sql_skills = mysqli_query($connecDB,"SELECT * FROM skills ORDER BY id ASC");  
while($row_skills = mysqli_fetch_array($sql_skills)){

?>
                <option value="<?php echo $row_skills['skill'];?>" <?php if (in_array($row_skills['skill'],$skills)){ echo "selected"; } ?>>
                    <?php echo $row_skills['skill'];?></option>
              
       
<?php } ?>


 </select>

                </div>
              
              
            </div>

        </div>    

                                    <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                        <input type="text" id="fm_facebook_link" name="fm_facebook_link" value="<?php echo $row['Facebook'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                        <input type="text" id="fm_twitter_link" name="fm_twitter_link" value="<?php echo $row['Twitter'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Linkedin</label>
                                                        <input type="text" id="fm_linkedin_link" name="fm_linkedin_link" value="<?php echo $row['Linkedin'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                            </div>


                                       <div class="form-group">
                                                <div class="col-md-3">   
                                             <a href="javascript:void(0)">
                                                <?php if($row['ProfileImage'] != '') { ?>
                                            <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_88,w_88/v1/<?php echo $row['ProfileImage'];?>" class="thumb-lg img-circle" alt="img">  
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)"><img src="<?php echo BASE_PATH."/images/no-profile-picture.jpg";?>" class="thumb-lg img-circle" alt="img">
                                            <?php } ?>
                                            </a>
                                                </div>
                                       </div>           

            <!--<div class="form-group">
                <label class="col-md-12">About the member</label>
                <div class="col-md-12">
                    <textarea id="fm_about" name="fm_about" rows="5" class="form-control form-control-line"></textarea>
                </div>
            </div>-->

          
        
    </div>


<!--Multiple Selection-->
    <script src="<?php echo BASE_PATH; ?>/js/chosen.jquery.js" type="text/javascript"></script>
    <script src="<?php echo BASE_PATH; ?>/js/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo BASE_PATH; ?>/js/init.js" type="text/javascript" charset="utf-8"></script>

    <?php } ?>