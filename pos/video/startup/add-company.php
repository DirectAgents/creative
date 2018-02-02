<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){




 ?>
                          
      
                                  <div id="profile-tab-data">

                                        
                                          <input type="hidden" name="id" id="id" value="">
                                          <input type="hidden" name="userid" id="userid" value="<?php echo $_POST['userid']; ?>">

                                            <div class="form-group">
                                                <label class="col-md-12">Company Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_name" name="fm_name" class="form-control form-control-line"> </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Industry</label>
                                                <div class="col-md-12">
                                                    <select id="fm_industry" name="fm_industry" class="form-control form-control-line">
                                                        <option value="Technology">Technology</option>
                                                        <option value="Mobile">Mobile</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Location</label>
                                                <div class="col-md-12">
                                                    <div class="zip">
                                                        <input type="text" maxlength="5" placeholder="Type your zip code" class="form-control form-control-line zip-textinput">
                                                        <input type="text" id="fm_location" name="fm_location" maxlength="5" placeholder="Type your zip code" class="form-control form-control-line city-state-textinput">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">About the company</label>
                                                <div class="col-md-12">
                                                    <textarea id="fm_about" name="fm_about" rows="5" class="form-control form-control-line"></textarea>
                                                    
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                        <input type="text" id="fm_facebook" name="fm_facebook" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                        <input type="text" id="fm_twitter" name="fm_twitter"  class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">AngelList</label>
                                                        <input type="text" id="fm_angellist" name="fm_angellist" class="form-control form-control-line"> </div>
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
                data: { column_name: 'Zip_Company' },
                dataType: "html",
                success: function(response) {
                   var zip = $(response).filter('#zip').html(); 
                    
                if (zip != ''){  
                   $(".zip-textinput").hide();
                   $(".city-state-textinput").show();
                   $(".city-state-textinput").val(zip);

                  }else{

                   $(".zip-textinput").show();
                   $(".zip-textinput").attr("placeholder", "Type your zip code").val("").focus();
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
                data: { content: zip_input, column_name: 'Zip_Company' },
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




$('.city-state-textinput').focus(function(){

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
                   $(".city-state-textinput").val(zip);

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