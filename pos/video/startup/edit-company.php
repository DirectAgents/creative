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
                                                    <input type="text" id="fm_name" name="fm_name" value="<?php echo $row['Name']; ?>" class="form-control form-control-line"> </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Your Role</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_position" name="fm_position" value="<?php echo $row['Position']; ?>" placeholder="e.g CEO" class="form-control form-control-line"> </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Industry</label>
                                                <div class="col-md-12">
                                                    <select id="fm_industry" name="fm_industry" class="form-control form-control-line">
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
                                                        <input type="text" maxlength="5" value="<?php echo $row['City']; ?>, <?php echo $row['State']; ?>" placeholder="Type your zip code" class="form-control form-control-line zip-textinput">
                                                        <input type="text" id="fm_location" name="fm_location" maxlength="5" value="<?php echo $row['City']; ?>, <?php echo $row['State']; ?>"class="form-control form-control-line city-state-textinput">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Describe your startup in one sentence</label>
                                                <div class="col-md-12">
                               <input type="text" id="fm_description" tabindex="5" name="fm_description" value="<?php echo $row['Description']; ?>" placeholder="e.g The best restaurants in Europe delivered to your door" class="form-control form-control-line"> 
                                                    
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-12">Describe your startup's product</label>
                                                <div class="col-md-12">
                                                    <textarea id="fm_about" name="fm_about" tabindex="6" rows="5" class="form-control form-control-line"><?php echo $row['About']; ?></textarea>
                                                    
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                        <input type="text" id="fm_facebook" name="fm_facebook" value="<?php echo $row['Facebook']; ?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                        <input type="text" id="fm_twitter" name="fm_twitter" value="<?php echo $row['Twitter']; ?>"  class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">AngelList</label>
                                                        <input type="text" id="fm_angellist" name="fm_angellist" value="<?php echo $row['AngelList']; ?>" class="form-control form-control-line"> </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-12">Video</label>
                                                <div class="col-md-12">
                                                   <input type="text" id="fm_video" name="fm_video" placeholder="e.g ( https://www.youtube.com/embed/Hf_Y6KrFW )" value="<?php echo $row['Video']; ?>" class="form-control form-control-line">
                                                    
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


var url_link = 'http://localhost/creative/pos/video/startup/';

        $.ajax({
                url: url_link+"select.php",
                method: "POST",
                data: { column_name: 'Zip' },
                dataType: "html",
                success: function(response) {
                   var zip = $(response).filter('#zip').html(); 
                    
                if (zip != ''){  
                   $(".zip-textinput").hide();
                   $(".city-state-textinput").show();
                   $(".city-state-textinput").val(zip);

                  }else{

                   $(".zip-textinput").show();
                   //$(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
                   $(".city-state-textinput").hide();
                   
                }
               
               }
                
            });

$('.zip-textinput').keyup(function(){
    var zip_input = $(this).val();
    if(zip_input.length == 5){
        //alert("asdf");

     $.ajax({
                url: url_link+"edit.php",
                method: "POST",
                data: { content: zip_input, column_name: 'Zip' },
                dataType: "html",
                success: function(response) {
                   var zip = $(response).filter('#zip').html(); 
                   //alert(zip);
                   $(".zip-textinput").show();
                   $(".city-state-textinput").val(zip);
                   
                }
                
            });


    };
});




$('.zip-textinput').focus(function(){
//alert("hallo");
    $(".city-state-textinput").hide();
    $(".zip-textinput").show();
    $(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
    
   
});


$('.city-state-textinput').focus(function(){
//alert("hallo");
    $(".city-state-textinput").hide();
    $(".zip-textinput").show();
    $(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
    
   
});





$('.zip-textinput').blur(function(){
//alert("asdf");

var zip_input = $(this).val();

$.ajax({
                url: url_link+"edit.php",
                method: "POST",
                data: { content: zip_input, column_name: 'Zip_Company' },
                dataType: "html",
                success: function(response) {
                   
                   var zip = $(response).filter('#zip').html(); 
        
                   if (zip != ''){  
                   $(".zip-textinput").hide();
                   $(".city-state-textinput").show();
                   $(".city-state-textinput").val();

                  }else{

                   $(".zip-textinput").show();
                   $(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
                   $(".city-state-textinput").hide();
                   
                  }
                   
                }
                
            });

   
});


});


</script>  





 <?php } ?>                                  