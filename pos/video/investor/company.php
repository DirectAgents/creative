<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET){


$sql = mysqli_query($connecDB,"SELECT * FROM startups WHERE userID ='".$_GET['userid']."'");
$row = mysqli_fetch_array($sql);

//echo $_GET['userid'];
//echo $row['id'];
 ?>


  <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>



<script type="text/javascript">
        $(document).ready(function() {
         

            $('.fancybox').fancybox();

           
            $('.fancybox-media_button').click(function(e){
                e.preventDefault();
             $('.fancybox-media')
                .attr('rel', 'media-gallery')
                parent.$.fancybox({
                    href: this.href,
                    openEffect : 'none',
                    closeEffect : 'none',
                    prevEffect : 'none',
                    nextEffect : 'none',
                    

                    arrows : false,
                    helpers : {
                        media : {},
                        //buttons : {}
                    }
                });
              }); // click  


        });
    </script>
   







                <?php if(isset($_SESSION['entrepreneurSession']) && $_GET['userid'] == $_SESSION['entrepreneurSession'] && $row['userID'] != '') { ?>
                        <div id="edit-a-company">
                             <div class="col-sm-12" style="padding-left:15px">
                                         <div class="row"> 
                                           
                                                <ul class="side-icon-text pull-left">
                                                    <li><a href="#/" class="edit-company" data-id="<?php echo $row['id']; ?>"><span class="circle circle-sm bg-success di"><i class="ti-pencil-alt"></i></span><span>Edit</span></a></li>
                                                    <li><a href="#/" id="delete-company" data-userid="<?php echo $_GET['userid']; ?>" data-id="<?php echo $row['id']; ?>"><span class="circle circle-sm bg-danger di"><i class="ti-trash"></i></span><span>Delete</span></a></li>
                                                </ul>


                                        </div>
                            </div> 
                            <p>&nbsp;</p>
                             
                         </div>  

                <?php } ?>
                




                
            


                        <div id="company-tab-data">

     <!--User Logged in Starts-->                                           
    <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $_GET['userid']) { ?>

                   <form class="form-horizontal form-material" id="update-profile">
                                           
                                            <div class="form-group">
                                                <label class="col-md-12">Company</label>
                                                <div class="col-md-6">
                                                    <input type="tel" id="fm_phone" name="fm_phone" placeholder="Phone Number" value="<?php echo $row['Phone'];?>" class="form-control form-control-line">
                                                </div>
                                                 <div class="col-md-6">
                                                    <label class="col-md-12" style="padding-left:0px;">Country</label>
<select id="fm_country" name="fm_country" class="form-control form-control-line">
<option value="">--Country--</option>
<option value="USA">United States</option>
<option value="CAN">Canada</option>
<option value="ABW">Aruba</option>
<option value="AFG">Afghanistan</option>
<option value="AIA">Anguilla</option>
<option value="ALB">Albania</option>
<option value="AND">Andorra</option>
<option value="ARE">United Arab Emirates</option>
<option value="ARG">Argentina</option>
<option value="ARM">Armenia</option>
<option value="ATG">Antigua and Barbuda</option>
<option value="AUS">Australia</option>
<option value="AUT">Austria</option>
<option value="AZE">Azerbaijan</option>
<option value="AZR">Azores</option>
<option value="BEL">Belgium</option>
<option value="BGD">Bangladesh</option>
<option value="BGR">Bulgaria</option>
<option value="BHS">Bahamas</option>
<option value="BIH">Bosnia and Herzegovinia</option>
<option value="BLR">Belarus</option>
<option value="BLZ">Belize</option>
<option value="BMU">Bermuda</option>
<option value="BOL">Bolivia</option>
<option value="BRA">Brazil</option>
<option value="BRB">Barbados</option>
<option value="BTN">Bhutan</option>
<option value="CAP">Cape Colony</option>
<option value="CHE">Switzerland</option>
<option value="CHI">Channel Islands</option>
<option value="CHL">Chile</option>
<option value="CHN">China</option>
<option value="CMR">Cameroon</option>
<option value="COL">Colombia</option>
<option value="CPV">Cape Verde</option>
<option value="CRI">Costa Rica</option>
<option value="CSK">Czechoslovakia</option>
<option value="CUB">Cuba</option>
<option value="CYM">Cayman Islands</option>
<option value="CYP">Cyprus</option>
<option value="CZE">Czech Republic</option>
<option value="DEU">Germany</option>
<option value="DMA">Dominica</option>
<option value="DNK">Denmark</option>
<option value="DOM">Dominican Republic</option>
<option value="DZA">Algeria</option>
<option value="ECU">Ecuador</option>
<option value="EGY">Egypt</option>
<option value="ENG">England</option>
<option value="ESP">Spain</option>
<option value="EST">Estonia</option>
<option value="ETH">Ethopia</option>
<option value="FIN">Finland</option>
<option value="FJI">Fiji</option>
<option value="FLK">Falkland Islands</option>
<option value="FRA">France</option>
<option value="GIB">Gibraltar </option>
<option value="GRC">Greece</option>
<option value="GRD">Grenada</option>
<option value="GRL">Greenland</option>
<option value="GUF">French Guiana </option>
<option value="GUM">Guatemala</option>
<option value="HKG">Hong Kong</option>
<option value="HND">Honduras</option>
<option value="HOL">Holland</option>
<option value="HRV">Croatia</option>
<option value="HTI">Haiti</option>
<option value="HUN">Hungary</option>
<option value="IDN">Indonesia</option>
<option value="IND">India</option>
<option value="IRL">Ireland</option>
<option value="IRN">Iran</option>
<option value="IRQ">Iraq</option>
<option value="ISL">Iceland</option>
<option value="ISR">Israel</option>
<option value="ITA">Italy</option>
<option value="JAM">Jamaica</option>
<option value="JOR">Jordan</option>
<option value="JPN">Japan</option>
<option value="KAZ">Kazakhstan</option>
<option value="KEN">Kenya</option>
<option value="KGZ">Kyrgystan</option>
<option value="KHM">Cambodia</option>
<option value="KWT">Kuwait</option>
<option value="LAO">Laos</option>
<option value="LBN">Lebanon</option>
<option value="LIE">Liechtenstein </option>
<option value="LTU">Lithuania</option>
<option value="LUX">Luxembourg</option>
<option value="LVA">Latvia</option>
<option value="MDA">Moldava</option>
<option value="MEX">Mexico</option>
<option value="MKD">Macedonia</option>
<option value="MLI">Mali</option>
<option value="MLT">Malta</option>
<option value="MMR">Burma/Myanmar</option>
<option value="MYS">Malaysia</option>
<option value="NIC">Nicaragua</option>
<option value="NIR">Northern Ireland</option>
<option value="NLD">Netherlands</option>
<option value="NOR">Norway</option>
<option value="NPL">Nepal</option>
<option value="NZL">New Zealand</option>
<option value="PAK">Pakistan</option>
<option value="PAN">Panama</option>
<option value="PER">Peru</option>
<option value="PHL">Philippines </option>
<option value="POL">Poland</option>
<option value="PRK">South Korea</option>
<option value="PRT">Portugal</option>
<option value="PRY">Paraguay</option>
<option value="ROM">Romania</option>
<option value="RUS">Russia</option>
<option value="SAU">Saudi Arabia</option>
<option value="SCT">Scotland</option>
<option value="SER">Serbia</option>
<option value="SGP">Singapore</option>
<option value="SIC">Sicily</option>
<option value="SLV">El Salvador</option>
<option value="SVK">Slovakia</option>
<option value="SVN">Slovenia</option>
<option value="SWE">Sweden</option>
<option value="THA">Thailand</option>
<option value="TMP">East Timor</option>
<option value="TUR">Turkey</option>
<option value="TWN">Taiwan</option>
<option value="UK">United Kingdom</option>
<option value="UKR">Ukraine</option>
<option value="URY">Uruguay</option>
<option value="VEN">Venezuela</option>
<option value="WLS">Wales</option>
<option value="YUG">Yugoslavia</option>
<option value="ZAF">South Africa</option>
</select>
                                                </div>
                                            </div>
                                           

                                           <div class="form-group">
                                                <label class="col-md-12">Title</label>
                                              
                                                 <div class="col-md-6">
 <select id="fm_title" name="fm_title">
 <option value="">--Select Title--</option>
<option value="Associate/Staff">Associate/Staff</option>
<option value="Manager/Supervisor">Manager/Supervisor</option>
<option value="VP/SVP/Dept Head">VP/SVP/Dept Head</option>
<option value="C-Level Executive (CEO, CFO, etc.)">C-Level Executive (CEO, CFO, etc.)</option>
<option value="Founder/Owner/Principal">Founder/Owner/Principal</option>
<option value="Other">Other</option>
</select>
</select>
                                                </div>

                                                <div class="col-md-6">
                                                     <div class="col-md-3">
                                                         <label class="col-md-3" style="padding-left:0px;">Title</label>
 <select id="fm_title" name="fm_title">
 <option value="">--Select Title--</option>
<option value="Associate/Staff">Associate/Staff</option>
<option value="Manager/Supervisor">Manager/Supervisor</option>
<option value="VP/SVP/Dept Head">VP/SVP/Dept Head</option>
<option value="C-Level Executive (CEO, CFO, etc.)">C-Level Executive (CEO, CFO, etc.)</option>
<option value="Founder/Owner/Principal">Founder/Owner/Principal</option>
<option value="Other">Other</option>
</select>
</select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-md-3" style="padding-left:0px;">Postal Code</label>
                                            <input type="text" id="fm_facebook" name="fm_facebook" value="<?php echo $row['Facebook'];?>" class="form-control form-control-line"> </div>

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
                                            <!--
                                            <div class="form-group">
                                                <label class="col-md-12">About Me</label>
                                                <div class="col-md-12">
                                                    <textarea id="fm_about" name="fm_about" rows="5" class="form-control form-control-line">
                                                        <?php echo $row['About'] ;?>
                                                    </textarea>
                                                </div>
                                            </div>-->

                                      

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success btn-update-profile">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>


                                          
                                        
<?php } ?>  


<?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $_GET['userid']) { ?>


    No Startup added so far!

<?php } ?>


<!--Visitor Starts-->




</div>



<script>

$(document).ready(function() {


var url_link_startup = 'http://localhost/creative/pos/video/startup/';



$(".add-company").click(function (e) {
  //alert("11111");
    e.preventDefault();

    var userid = $('input[name=userid]').val();
    //alert(userid);
    $.ajax({
            url: url_link_startup+"add-company.php", 
            method: "POST",
            data: {userid: userid},
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#thecompany").html(response);

                $("#upload-logo").show();
                $("#upload-screenshot").show();
                $("#save-cancel").show();
                $("#add-a-company").hide();
                $("#preview_company").hide();
                $("#preview_screenshot").hide();
                $('#url_preview_company').html('<input type="checkbox" style="display:none" name="team_member_headshot[]" value="" checked/>');
                //alert(skills_count);  

            }
        });

});





$(".edit-company").click(function (e) {
  //alert("asdf");
    e.preventDefault();


    var data_id = $(".edit-company").attr("data-id");
    //alert(data_id);

    //alert(userid);
    $.ajax({
            url: url_link_startup+"edit-company.php", 
            method: "POST",
            data: {id: data_id},
            dataType: "html",
            success: function(response) {
                //alert(data);  
                //var skills = $(response).filter('#the-skill-set').text();
                $("#thecompany-startup").html(response);

                
                $("#profile-startup-tab-data").show();
                $("#add-a-company").hide();
                $("#edit-a-company").hide();
                $("#upload-logo").show();
                $("#upload-screenshot").show();
                $("#save-cancel").show();
                $("#preview_company").hide();
                $("#preview_screenshot").hide();

                
                $("#startups-socials").hide();
                $("#click-image-to-upload-logo").show();
                $("#company-logo-public").hide();
                $("#upload_widget_multiple_logo").show();
                

                

            }
        });


});



//Warning Message
    $('#delete-company').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this startup data! \n All your team members will also be deleted.",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
        }, function(){   


            var data_id = $("#delete-company").attr("data-id");
            var userid = $("#delete-company").attr("data-userid");
            //alert(data_id);

                        $.ajax({
                                url: url_link_startup+"delete-company.php",
                                method: "POST",
                                data: {id: data_id},
                                dataType: "html",
                                success: function(response) {
                                    //alert(data);
                                    //$('#deleted').fadeIn("fast");
                                    //$('#deleted').delay(2000).fadeOut("slow");
                                window.location.href = url_link_startup+'create';
                                //$("#thecompany-startup").load(url_link+"company.php?userid="+userid); 
                                //swal("Deleted!", "Your Company has been deleted.", "success");  

                                }
                            });
                      
             
        });
    });




});

</script>
                                  

<!-- Sweet-Alert  -->
<script src="<?php echo BASE_PATH; ?>/js/sweetalert.min.js"></script>


 <?php } ?>                                  