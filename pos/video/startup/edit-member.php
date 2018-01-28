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


 ?>
    <div id="team-tab-data">
        <form class="form-horizontal form-material" id="save-team-member">
            <input type="text" name="userid" id="userid" value="<?php echo $_SESSION['entrepreneurSession']; ?>">
            <input type="text" name="id" id="id" value="<?php echo $_POST['id']; ?>">
            <div class="form-group">
                <label class="col-md-12">Full Name</label>
                <div class="col-md-12">
                    <input type="text" id="fm_fullname" name="fm_fullname" placeholder="Jon Snow" value="<?php echo $row['Fullname']; ?>" class="form-control form-control-line"> </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Position</label>
                <div class="col-md-12">
                    <input type="text" id="fm_position" name="fm_position" placeholder="eg. CEO" value="<?php echo $row['Position']; ?>" class="form-control form-control-line">
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
                        <?php
                                                        //include db configuration file



                                                        //MySQL query
                                                        $Result = mysqli_query($connecDB,"SELECT * FROM tbl_team WHERE id ='".$_POST['id']."' ");


                                                        //get all records from add_delete_record table
                                                        $row2 = mysqli_fetch_array($Result);




                                                        $ctop = $row2['Skills']; 
                                                        $ctop = explode(',',$ctop); 



                                                        if($row2['Skills'] != '' && $row2['Skills'] != 'NULL' ){



                                                        foreach($ctop as $skill)  
                                                        { 
                                                            //Uncomment the last commented line if single quotes are showing up  
                                                            //otherwise delete these 3 commented lines 


                                                        //get skill string
                                                        $ret = explode('(', $skill);
                                                        $skill_string =  $ret[0];
                                                            

                                                        //MySQL query
                                                        $sqlskill = mysqli_query($connecDB,"SELECT * FROM skills WHERE skill = '".$skill_string."' ");
                                                        $row3 = mysqli_fetch_array($sqlskill);


                                                        echo '<div id="item_'.$row3['id'].'">';
                                                        echo '<div class="skillsdiv">';
                                                        if(in_array($skill,$ctop)){
                                                        echo '<input id="skillselectionteammember_'.$row3['id'].'" name="skillselectionteammember[]" type="checkbox"  value="'.$skill.'" style="display:none" checked/>';
                                                        }
                                                        echo '<div class="del_wrapper">';
                                                        echo '<div class="the-skill">';
                                                        echo $skill;
                                                        echo '</div>';
                                                        echo '<a href="#" class="del_button_teammmember_skills" id="del-'.$row3['id'].'">';
                                                        echo '<img src="'.BASE_PATH.'/images/icon_del.gif" border="0" class="icon_del" />';
                                                        echo '</a></div>';
                                                        //echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                        } 



                                                        }

                                                        ?>
                    </div>
                </div>
            </div>

                                    <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                        <input type="text" id="fm_facebook" name="fm_facebook" value="<?php echo $row['Facebook'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                        <input type="text" id="fm_twitter" name="fm_twitter" value="<?php echo $row['Twitter'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Linkedin</label>
                                                        <input type="text" id="fm_linkedin" name="fm_linkedin" value="<?php echo $row['Linkedin'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                            </div>

            <!--<div class="form-group">
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