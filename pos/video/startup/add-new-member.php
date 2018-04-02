<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){


$skills = explode(', ', '');

 ?>




      
                                         <div id="team-tab-data">

                                                <input type="hidden" name="userid" id="userid" value="<?php echo $_POST['userid']; ?>">

                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_fullname" name="fm_fullname" tabindex="1" placeholder="Johnathan Doe" class="form-control form-control-line"> </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Title</label>
                                                <div class="col-md-12">
<select id="fm_title" name="fm_title" tabindex="2" class="form-control form-control-line">
 <option value="">--Select Title--</option>
<option value="Associate/Staff">Associate/Staff</option>
<option value="Manager/Supervisor">Manager/Supervisor</option>
<option value="VP/SVP/Dept Head">VP/SVP/Dept Head</option>
<option value="C-Level Executive (CEO, CFO, etc.)">C-Level Executive (CEO, CFO, etc.)</option>
<option value="Founder/Owner/Principal">Founder/Owner/Principal</option>
<option value="Other">Other</option>
</select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Skills</label>
                                               
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
                                           <!--
                                            <div class="form-group">
                                                <label class="col-md-12">About the member</label>
                                                <div class="col-md-12">
                                                    <textarea id="fm_about" name="fm_about" rows="5" class="form-control form-control-line"></textarea>
                                                    
                                                </div>
                                            </div>-->

                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                        <input type="text" id="fm_facebook_link" name="fm_facebook_link" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                        <input type="text" id="fm_twitter_link" name="fm_twitter_link" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Linkedin</label>
                                                        <input type="text" id="fm_linkedin_link" name="fm_linkedin_link" class="form-control form-control-line"> </div>
                                                </div>
                                            </div>
                                             


                                          
                                             

                                           

                                        </div>     

                                                              


<!--Multiple Selection-->
    <script src="<?php echo BASE_PATH; ?>/js/chosen.jquery.js" type="text/javascript"></script>
    <script src="<?php echo BASE_PATH; ?>/js/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo BASE_PATH; ?>/js/init.js" type="text/javascript" charset="utf-8"></script>

 <?php } ?>                                  