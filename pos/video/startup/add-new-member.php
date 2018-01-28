<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){




 ?>

                                        
                                         <div id="team-tab-data">
                                            <form class="form-horizontal form-material" id="save-team-member">

                                                <input type="hidden" name="userid" id="userid" value="<?php echo $_POST['userid']; ?>">

                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_fullname" name="fm_fullname" placeholder="Johnathan Doe" class="form-control form-control-line"> </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Position</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_position" name="fm_position" placeholder="eg. CEO"  class="form-control form-control-line">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Skills Set</label>
                                                <div class="col-md-4">
                                                    <input type="text" id="fm_skills" name="fm_skills" placeholder="Enter Skill" class="form-control form-control-line">
                                                </div>
                                              
                                                <div class="col-md-8">
                                                    <button class="btn btn-add" id="add-skills-team-member"><span class="glyphicon glyphicon-plus"></span> Add</button>
                                                </div>
                                                <div class="col-md-12" style="padding:15px 0 0 0;">
                                                    <div id="responds">
                                                        
                                                    </div>
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
                                                <div class="col-sm-12">
                                                    <button class="fcbtn btn btn-info btn-outline btn-1d save-team-member">Save</button>
                                            <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-team-member">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                             

                                           

                                        </div>     

    <script src="<?php echo BASE_PATH; ?>/js/profile-entrepreneur.js"></script>
                                                              

  
 <?php } ?>                                  