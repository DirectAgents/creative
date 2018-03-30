<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){


$sql = "SELECT * FROM startups WHERE id ='".$_POST['id']."'";  
$result = mysqli_query($connecDB, $sql);  
$row = mysqli_fetch_array($result);



 ?>
                          

      
                                  <div id="profile-startup-tab-data">

                                        
                                          <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
                                          <input type="hidden" name="userid" id="userid" value="<?php echo $row['userID']; ?>">

                                           

                                            <div class="form-group">
                                                <label class="col-md-12">Company Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_name" name="fm_name" value="<?php echo $row['Name']; ?>" class="form-control form-control-line" tabindex="1"> </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Your Title</label>
                                                <div class="col-md-12">
                                                   
 <select id="fm_title" name="fm_title" class="form-control form-control-line">
 <option value="">--Select Title--</option>
<option value="Associate/Staff" <?php if($row['Title'] == 'Associate/Staff'){ echo "selected"; }?>>Associate/Staff</option>
<option value="Manager/Supervisor" <?php if($row['Title'] == 'Manager/Supervisor'){ echo "selected"; }?>>Manager/Supervisor</option>
<option value="VP/SVP/Dept Head" <?php if($row['Title'] == 'VP/SVP/Dept Head'){ echo "selected"; }?>>VP/SVP/Dept Head</option>
<option value="C-Level Executive (CEO, CFO, etc.)" <?php if($row['Title'] == 'C-Level Executive (CEO, CFO, etc.)'){ echo "selected"; }?>>C-Level Executive (CEO, CFO, etc.)</option>
<option value="Founder/Owner/Principal" <?php if($row['Title'] == 'Founder/Owner/Principal'){ echo "selected"; }?>>Founder/Owner/Principal</option>
<option value="Other" <?php if($row['Title'] == 'Other'){ echo "selected"; }?>>Other</option>
</select>


                                                   </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Industry</label>
                                                <div class="col-md-12">
                                                    <select id="fm_industry" name="fm_industry" class="form-control form-control-line" tabindex="3">
                                                        <option value="Technology" <?php if($row['Industry'] == 'Technology'){echo "selected";} ?>>Technology</option>
                                                        <option value="Mobile" <?php if($row['Industry'] == 'Mobile'){echo "selected";} ?>>Mobile</option>
                                                        <option value="Finance" <?php if($row['Industry'] == 'Finance'){echo "selected";} ?>>Finance</option>
                                                        <option value="Ecommerce" <?php if($row['Industry'] == 'Ecommerce'){echo "selected";} ?>>Ecommerce</option>
                                                        <option value="B2B Services" <?php if($row['Industry'] == 'B2B Services'){echo "selected";} ?>>B2B Services</option>
                                                        <option value="Consumer Products" <?php if($row['Industry'] == 'Consumer Products'){echo "selected";} ?>>Consumer Products</option>
                                                        <option value="Consulting" <?php if($row['Industry'] == 'Consulting'){echo "selected";} ?>>Consulting</option>
                                                        <option value="Big Data" <?php if($row['Industry'] == 'Big Data'){echo "selected";} ?>>Big Data</option>
                                                        <option value="Travel" <?php if($row['Industry'] == 'Travel'){echo "selected";} ?>>Travel</option>
                                                        <option value="Entertainment" <?php if($row['Industry'] == 'Entertainment'){echo "selected";} ?>>Entertainment</option>
                                                        <option value="Fashion" <?php if($row['Industry'] == 'Fashion'){echo "selected";} ?>>Fashion</option>
                                                        <option value="Healthcare" <?php if($row['Industry'] == 'Healthcare'){echo "selected";} ?>>Healthcare</option>
                                                        <option value="Real Estate" <?php if($row['Industry'] == 'Real Estate'){echo "selected";} ?>>Real Estate</option>
                                                        <option value="Food and Beverages" <?php if($row['Industry'] == 'Food and Beverages'){echo "selected";} ?>>Food and Beverages</option>
                                                        <option value="Human Resources" <?php if($row['Industry'] == 'Human Resources'){echo "selected";} ?>>Human Resources</option>
                                                        <option value="Other" <?php if($row['Industry'] == 'Other'){echo "selected";} ?>>Other</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Location</label>
                                                <div class="col-md-12">
                                                    <div class="zip">
                                                        <input type="text" maxlength="5" value="<?php echo $row['City']; ?>, <?php echo $row['State']; ?>" placeholder="Type your zip code" class="form-control form-control-line zip-textinput-company" tabindex="4">
                                                        <input type="text" id="fm_location" name="fm_location" maxlength="5" value="<?php echo $row['City']; ?>, <?php echo $row['State']; ?>" class="form-control form-control-line city-state-textinput-company" tabindex="4">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Describe your startup in one sentence</label>
                                                <div class="col-md-12">
                               <input type="text" id="fm_description" name="fm_description" value="<?php echo $row['Description']; ?>" placeholder="e.g The best restaurants in Europe delivered to your door" class="form-control form-control-line" tabindex="5"> 
                                                    
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-12">Describe your startup's product</label>
                                                <div class="col-md-12">
                                                    <textarea id="fm_about" name="fm_about" rows="5" class="form-control form-control-line" tabindex="6"><?php echo $row['About']; ?></textarea>
                                                    
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                        <input type="text" id="fm_facebook" name="fm_facebook" value="<?php echo $row['Facebook']; ?>" class="form-control form-control-line" tabindex="7"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                        <input type="text" id="fm_twitter" name="fm_twitter" value="<?php echo $row['Twitter']; ?>"  class="form-control form-control-line" tabindex="8"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">AngelList</label>
                                                        <input type="text" id="fm_angellist" name="fm_angellist" value="<?php echo $row['AngelList']; ?>" class="form-control form-control-line" tabindex="9"> </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-12">Video</label>
                                                <div class="col-md-12">
                                                   <input type="text" id="fm_video" name="fm_video" placeholder="e.g ( https://www.youtube.com/embed/Hf_Y6KrFW )" value="<?php echo $row['Video']; ?>" class="form-control form-control-line" tabindex="10">
                                                    
                                                </div>
                                            </div>

                                          <div id="preview_edit_screenshot">
                                            <div class="form-group">
                                                <div class="col-md-3">   
                                             <a href="javascript:void(0)">
                                                <?php if($row['Screenshot'] != '') { ?>
                                            <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/<?php echo $row['Screenshot'];?>" alt="img">  
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)"><img src="https://wrappixel.com/ampleadmin/ampleadmin-html/plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img">
                                            <?php } ?>
                                            </a>
                                                </div>
                                            </div>     
                                         </div>       

                                            


                                        </div>     




<script>


$(document).ready(function() {

////////////////Enter Zip Code to retrieve City and State//////////////////////


var url_link_startup = 'http://localhost/creative/pos/video/startup/';

        
        $.ajax({
                url: url_link_startup+"select.php",
                method: "POST",
                data: { column_name: 'Zip_Company' },
                dataType: "html",
                success: function(response) {
                   var zip = $(response).filter('#zip').html(); 
                    
                if (zip != ''){  
                   $(".zip-textinput-company").hide();
                   $(".city-state-textinput-company").show();
                   $(".city-state-textinput-company").val(zip);

                  }else{

                   $(".zip-textinput-company").show();
                   $(".zip-textinput-company").attr("placeholder", "Type your zip code").val("").focus();
                   $(".city-state-textinput-company").hide();
                   
                }
               
               }
                
            });

$('.zip-textinput-company').keyup(function(){
    var zip_input = $(this).val();
    if(zip_input.length == 5){
        //alert("asdf");

     $.ajax({
                url: url_link_startup+"edit.php",
                method: "POST",
                data: { content: zip_input, column_name: 'Zip_Company' },
                dataType: "html",
                success: function(response) {
                   var zip = $(response).filter('#zip').html(); 
                   //alert(zip);
                   $(".zip-textinput-company").show();
                   $(".city-state-textinput-company").val(zip);
                   
                }
                
            });


    };
});




$('.city-state-textinput-company').focus(function(){

    $(".city-state-textinput-company").hide();
    $(".zip-textinput-company").show();
    $(".zip-textinput-company").attr("placeholder", "Type your zip code").val("").focus();
    
   
});





$('.zip-textinput-company').blur(function(){
//alert("123asdf");

var zip_input = $(this).val();
//alert(zip_input);

$.ajax({
                url: url_link_startup+"edit.php",
                method: "POST",
                data: { content: zip_input, column_name: 'Zip_Company' },
                dataType: "html",
                success: function(response) {
                   
                   var zip = $(response).filter('#zip').html(); 
        
                   if (zip != ''){  
                   $(".zip-textinput-company").hide();
                   $(".city-state-textinput-company").show();
                   $(".city-state-textinput-company").val(zip);

                  }else{

                   $(".zip-textinput-company").show();
                   $(".zip-textinput-company").attr("placeholder", "Type your zip code").val("").focus();
                   $(".city-state-textinput-company").hide();
                   
                  }
                   
                }
                
            });

   
   });


});


</script>  





 <?php } ?>                                  