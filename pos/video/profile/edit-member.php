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
       
            <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['entrepreneurSession']; ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $_POST['id']; ?>">
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


                                       <div class="form-group">
                                                <div class="col-md-3">   
                                             <a href="javascript:void(0)">
                                                <?php if($row['ProfileImage'] != '') { ?>
                                            <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/<?php echo $row['ProfileImage'];?>" class="thumb-lg img-circle" alt="img">  
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)"><img src="https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img">
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


<script>

$(document).ready(function() {

//$("#preview").hide();

var url_link = 'http://localhost/creative/pos/video/startup/';


////////////////Skills//////////////////////

$("#add-skills-team-member").click(function (e) {
    //alert("adsf");
       e.preventDefault();
     if($("#fm_skills").val()==='')
      {
        //alert("Please enter a job position!");
        return false;
      }
      var myData = 'skills='+ $("#fm_skills").val()+'&skills_level='+ $("#fm_skills_level").val()+'&userid='+ $("#userid").val(); 
      //alert(myData);
      jQuery.ajax({
      type: "POST", 
      url: url_link+"skills-team-member.php", 
      dataType:"text", 
      data:myData,
      success:function(response){
        $("#responds").append(response);
        $("#fm_skills").val('');
        //$('#interestimportant').prop('checked', true); // checks it
       
      },
      error:function (xhr, ajaxOptions, thrownError){
        alert(thrownError);
      }
      });
  });



$("body").on("click", "#responds .del_button_teammmember_skills", function(e) {
    //alert("ads");
     e.preventDefault();
     var clickedID = this.id.split('-'); 
     //var DbNumberID =   $('input[name="interestselection[]"]:checked').map(function () {return this.value;}).get().join(",");
     var DbNumberID = clickedID[1]; 
     var myData = 'recordToDelete='+ DbNumberID +'&projectid='+ $("#projectid").val(); 
     
     //alert(DbNumberID);


      jQuery.ajax({
      type: "POST", 
      url: url_link+"skills.php", 
      dataType:"text", 
      data:myData, 
      success:function(response){
        $("#responds").append(response);
        $('#skillselectionteammember_'+DbNumberID).prop('checked', false); // Unchecks it
        
        $('#item_'+DbNumberID).fadeOut("slow");

        
        //alert(response);
      
      },
      error:function (xhr, ajaxOptions, thrownError){
        
        alert(thrownError);
      }
      });
  });



 $(function() {
    $( "#fm_skills" ).autocomplete({
      source: url_link+'search-skills.php'
    });
  });



});

  </script>

    <?php } ?>