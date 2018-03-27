<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET){


$sql = mysqli_query($connecDB,"SELECT * FROM investor_company WHERE userID ='".$_GET['userid']."'");
$row = mysqli_fetch_array($sql);

//echo $_GET['userid'];
//echo $row['id'];
 ?>





                




                
            


                        <div id="company-tab-data">

     <!--User Logged in Starts-->                                           
    <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $_GET['userid']) { ?>

                   <form class="form-horizontal form-material" id="update-profile">

                     <input type="hidden" name="userid" id="userid" value="<?php echo $_GET['userid']; ?>"/>
                                           
                                            <div class="form-group">
                                              
                                                <div class="col-md-6">
                                                      <label class="col-md-6" style="padding-left:0px;">Company</label>
                                                    <input type="text" id="fm_company" name="fm_company" value="<?php echo $row['Name']; ?>" placeholder="Company" class="form-control form-control-line">
                                                </div>
                                                 <div class="col-md-6">
                                                    <label class="col-md-12" style="padding-left:0px;">Country</label>
                                                    
<select id="fm_country" name="fm_country" class="form-control form-control-line">
<option value="">--Country--</option>
<option value="USA" <?php if($row['Country'] == 'USA'){ echo "selected"; }?>>United States</option>
<option value="CAN" <?php if($row['Country'] == 'CAN'){ echo "selected"; }?>>Canada</option>
<option value="ABW" <?php if($row['Country'] == 'ABW'){ echo "selected"; }?>>Aruba</option>
<option value="AFG" <?php if($row['Country'] == 'AFG'){ echo "selected"; }?>>Afghanistan</option>
<option value="AIA" <?php if($row['Country'] == 'AIA'){ echo "selected"; }?>>Anguilla</option>
<option value="ALB" <?php if($row['Country'] == 'ALB'){ echo "selected"; }?>>Albania</option>
<option value="AND" <?php if($row['Country'] == 'AND'){ echo "selected"; }?>>Andorra</option>
<option value="ARE" <?php if($row['Country'] == 'ARE'){ echo "selected"; }?>>United Arab Emirates</option>
<option value="ARG" <?php if($row['Country'] == 'ARG'){ echo "selected"; }?>>Argentina</option>
<option value="ARM" <?php if($row['Country'] == 'ARM'){ echo "selected"; }?>>Armenia</option>
<option value="ATG" <?php if($row['Country'] == 'ATG'){ echo "selected"; }?>>Antigua and Barbuda</option>
<option value="AUS" <?php if($row['Country'] == 'AUS'){ echo "selected"; }?>>Australia</option>
<option value="AUT" <?php if($row['Country'] == 'AUT'){ echo "selected"; }?>>Austria</option>
<option value="AZE" <?php if($row['Country'] == 'AZE'){ echo "selected"; }?>>Azerbaijan</option>
<option value="AZR" <?php if($row['Country'] == 'AZR'){ echo "selected"; }?>>Azores</option>
<option value="BEL" <?php if($row['Country'] == 'BEL'){ echo "selected"; }?>>Belgium</option>
<option value="BGD" <?php if($row['Country'] == 'BGD'){ echo "selected"; }?>>Bangladesh</option>
<option value="BGR" <?php if($row['Country'] == 'BGR'){ echo "selected"; }?>>Bulgaria</option>
<option value="BHS" <?php if($row['Country'] == 'BHS'){ echo "selected"; }?>>Bahamas</option>
<option value="BIH" <?php if($row['Country'] == 'BIH'){ echo "selected"; }?>>Bosnia and Herzegovinia</option>
<option value="BLR" <?php if($row['Country'] == 'BLR'){ echo "selected"; }?>>Belarus</option>
<option value="BLZ" <?php if($row['Country'] == 'BLZ'){ echo "selected"; }?>>Belize</option>
<option value="BMU" <?php if($row['Country'] == 'BMU'){ echo "selected"; }?>>Bermuda</option>
<option value="BOL" <?php if($row['Country'] == 'BOL'){ echo "selected"; }?>>Bolivia</option>
<option value="BRA" <?php if($row['Country'] == 'BRA'){ echo "selected"; }?>>Brazil</option>
<option value="BRB" <?php if($row['Country'] == 'BRB'){ echo "selected"; }?>>Barbados</option>
<option value="BTN" <?php if($row['Country'] == 'BTN'){ echo "selected"; }?>>Bhutan</option>
<option value="CAP" <?php if($row['Country'] == 'CAP'){ echo "selected"; }?>>Cape Colony</option>
<option value="CHE" <?php if($row['Country'] == 'CHE'){ echo "selected"; }?>>Switzerland</option>
<option value="CHI" <?php if($row['Country'] == 'CHI'){ echo "selected"; }?>>Channel Islands</option>
<option value="CHL" <?php if($row['Country'] == 'CHL'){ echo "selected"; }?>>Chile</option>
<option value="CHN" <?php if($row['Country'] == 'CHN'){ echo "selected"; }?>>China</option>
<option value="CMR" <?php if($row['Country'] == 'CMR'){ echo "selected"; }?>>Cameroon</option>
<option value="COL" <?php if($row['Country'] == 'COL'){ echo "selected"; }?>>Colombia</option>
<option value="CPV" <?php if($row['Country'] == 'CPV'){ echo "selected"; }?>>Cape Verde</option>
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
                                                
                                              
                                                 <div class="col-md-6">
                                                    <label class="col-md-6" style="padding-left:0px;">Title</label>
 <select id="fm_title" name="fm_title" class="form-control form-control-line">
 <option value="">--Select Title--</option>
<option value="Associate/Staff">Associate/Staff</option>
<option value="Manager/Supervisor">Manager/Supervisor</option>
<option value="VP/SVP/Dept Head">VP/SVP/Dept Head</option>
<option value="C-Level Executive (CEO, CFO, etc.)">C-Level Executive (CEO, CFO, etc.)</option>
<option value="Founder/Owner/Principal">Founder/Owner/Principal</option>
<option value="Other">Other</option>
</select>

                                                </div>


                                                 <div class="col-md-6">
                                                    <label class="col-md-6" style="padding-left:0px;">City</label>
  <input type="text" id="fm_city" name="fm_city" value="<?php echo $row['City'];?>" class="form-control form-control-line"> </div>
                                                </div>

                                            </div>  
                                            
                                         <div class="form-group">   


  <div class="col-md-6">
                                                    <label class="col-md-6" style="padding-left:0px;">Investor Type</label>
 <select id="fm_type" name="fm_type" class="form-control form-control-line">
 <option value="">--Select Title--</option>
<option value="Associate/Staff">Associate/Staff</option>
<option value="Manager/Supervisor">Manager/Supervisor</option>
<option value="VP/SVP/Dept Head">VP/SVP/Dept Head</option>
<option value="C-Level Executive (CEO, CFO, etc.)">C-Level Executive (CEO, CFO, etc.)</option>
<option value="Founder/Owner/Principal">Founder/Owner/Principal</option>
<option value="Other">Other</option>
</select>

                                                </div>



                                                <div class="col-md-6">
                                                     <div class="col-md-5">
                                                         <label class="col-md-3" style="padding-left:0px;">State</label>
 <select id="fm_state" name="fm_state" class="form-control form-control-line">
<option value="AL">Alabama (AL)</option>
    <option value="AK">Alaska (AK)</option>
    <option value="AZ">Arizona (AZ)</option>
    <option value="AR">Arkansas (AR)</option>
    <option value="CA">California (CA)</option>
    <option value="CO">Colorado (CO)</option>
    <option value="CT">Connecticut (CT)</option>
    <option value="DE">Delaware (DE)</option>
    <option value="DC">District Of Columbia (DC)</option>
    <option value="FL">Florida (FL)</option>
    <option value="GA">Georgia (GA)</option>
    <option value="HI">Hawaii (HI)</option>
    <option value="ID">Idaho (ID)</option>
    <option value="IL">Illinois (IL)</option>
    <option value="IN">Indiana (IN)</option>
    <option value="IA">Iowa (IA)</option>
    <option value="KS">Kansas (KS)</option>
    <option value="KY">Kentucky (KY)</option>
    <option value="LA">Louisiana (LA)</option>
    <option value="ME">Maine (ME)</option>
    <option value="MD">Maryland (MD)</option>
    <option value="MA">Massachusetts (MA)</option>
    <option value="MI">Michigan (MI)</option>
    <option value="MN">Minnesota (MN)</option>
    <option value="MS">Mississippi (MS)</option>
    <option value="MO">Missouri (MO)</option>
    <option value="MT">Montana (MT)</option>
    <option value="NE">Nebraska (NE)</option>
    <option value="NV">Nevada (NV)</option>
    <option value="NH">New Hampshire (NH)</option>
    <option value="NJ">New Jersey (NJ)</option>
    <option value="NM">New Mexico (NM)</option>
    <option value="NY">New York (NY)</option>
    <option value="NC">North Carolina (NC)</option>
    <option value="ND">North Dakota (ND)</option>
    <option value="OH">Ohio (OH)</option>
    <option value="OK">Oklahoma (OK)</option>
    <option value="OR">Oregon (OR)</option>
    <option value="PA">Pennsylvania (PA)</option>
    <option value="RI">Rhode Island (RI)</option>
    <option value="SC">South Carolina (SC)</option>
    <option value="SD">South Dakota (SD)</option>
    <option value="TN">Tennessee (TN)</option>
    <option value="TX">Texas (TX)</option>
    <option value="UT">Utah (UT)</option>
    <option value="VT">Vermont</option>
    <option value="VA">Virginia</option>
    <option value="WA">Washington</option>
    <option value="WV">West Virginia</option>
    <option value="WI">Wisconsin</option>
    <option value="WY">Wyoming</option>

</select>

                                                </div>

                                                <div class="col-md-5">
                                                    <label class="col-md-12" style="padding-left:0px;">Postal Code</label>
                                            <input type="text" id="fm_zip" name="fm_zip" value="<?php echo $row['ZipCode'];?>" class="form-control form-control-line"> 
                                                  </div>

                                                </div>

                                              </div>   


                                            </div>


 <div class="form-group">   


  <div class="col-md-6">
                                                    <label class="col-md-6" style="padding-left:0px;">Minimum Investment</label>
 <select id="fm_minimum" name="fm_minimum" class="form-control form-control-line">
<option value="1">Below $10k</option>
<option value="10000">$10k</option>
<option value="25000">$25k</option>
<option value="50000">$50k</option>
<option value="75000">$75k</option>
<option value="100000">$100k</option>
<option value="500000">$500k</option>
<option value="1000000">$1 Mil</option>
<option value="2000000">$2 Mil</option>
<option value="5000000">$5 Mil</option>
<option value="10000000">$10 Mil</option>
<option value="100000000">Above $10 Mil</option>

</select>

                                                </div>



                                                 <div class="col-md-6">
                                                    <label class="col-md-6" style="padding-left:0px;">Maximum Investment</label>
 <select id="fm_maximum" name="fm_maximum" class="form-control form-control-line">
<option value="1">Below $10k</option>
<option value="10000">$10k</option>
<option value="25000">$25k</option>
<option value="50000">$50k</option>
<option value="75000">$75k</option>
<option value="100000">$100k</option>
<option value="500000">$500k</option>
<option value="1000000">$1 Mil</option>
<option value="2000000">$2 Mil</option>
<option value="5000000">$5 Mil</option>
<option value="10000000">$10 Mil</option>
<option value="100000000">Above $10 Mil</option>
</select>

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
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-company-investor" tabindex="11" style="margin-right:10px;">Save</button>
                                       
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


var url_link_investor = 'http://localhost/creative/pos/video/investor/';




$(".save-company-investor").click(function (e) {
  e.preventDefault();
    var proceed = true;
    //alert("22222");

    var userid = $("input[name='userid']").val();
    var fm_company = $("input[name='fm_company']").val();
    var fm_country = $("select[name='fm_country']").val();
    var fm_title = $("select[name='fm_title']").val();
    var fm_type = $("select[name='fm_type']").val();
    var fm_city = $("input[name='fm_city']").val();
    var fm_zip = $("input[name='fm_zip']").val();
    var fm_state = $("select[name='fm_state']").val();
    var fm_minimum = $("select[name='fm_minimum']").val();
    var fm_maximum = $("select[name='fm_maximum']").val();
    var logo = $('input[name="company_logo[]"]:checked').map(function() { return this.value; }).get().join(",");
   
    

  /*
  if (screenshot == '' || screenshot == 'on') {
        //$("#upload-logo").css('border-bottom','1px solid red'); 
        swal({   
            title: "Please upload a screenshot of your video clip",   
            type: "warning"
        })
        proceed = false;
    }

    if (fm_video == '') {
        $('input[name=fm_video]').css('border-bottom','1px solid red'); 
        swal({   
            title: "Enter a link to your video",   
            type: "warning"
        })
        proceed = false;
    }else{
      $('input[name=fm_video]').css('border-bottom','1px solid green'); 
    }

    if (fm_description == '') {
        $('input[name=fm_description]').css('border-bottom','1px solid red'); 
        swal({   
            title: "Describe your startup in one sentence",   
            type: "warning"
        })
        proceed = false;
    }else{
      $('input[name=fm_description]').css('border-bottom','1px solid green'); 
    }


    if (fm_zip == '') {
        $('input[name=fm_zip]').css('border-bottom','1px solid red'); 
        swal({   
            title: "Enter the location of the startup",   
            type: "warning"
        })
        proceed = false;
    }else{
      $('input[name=fm_zip]').css('border-bottom','1px solid green'); 
    }


    if (fm_position == '') {
        $('input[name=fm_position]').css('border-bottom','1px solid red'); 
        swal({   
            title: "Enter your role",   
            type: "warning"
        })
        proceed = false;
    }else{
      $('input[name=fm_position]').css('border-bottom','1px solid green'); 
    }



    if (fm_name == '') {
        $('input[name=fm_name]').css('border-bottom','1px solid red'); 
        swal({   
            title: "Enter your startup name",   
            type: "warning"
        })
        proceed = false;
    }else{
      $('input[name=fm_name]').css('border-bottom','1px solid green'); 
    }

    if (logo == '' || logo == 'on') {
        //$("#upload-logo").css('border-bottom','1px solid red'); 
        swal({   
            title: "Please upload a logo",   
            type: "warning"
        })
        proceed = false;
    }
   */


    

     if(proceed) 
        {   


    $.ajax({
            url: url_link_investor+"save-company.php", 
            method: "POST",
            data: { userid: userid, company : fm_company, country : fm_country, title : fm_title, type : fm_type, city : fm_city, zip : fm_zip, state : fm_state, minimum : fm_minimum, maximum : fm_maximum, logo : logo},
            dataType: "html",
            success: function(response) {
                //alert(id);  
                
                //var url_startup_link = $(response).filter('#startup-link').html();

                //window.location.href = url_link_startup+url_startup_link;

               
                //alert(skills_count);  

            }
        });


      }
 
});




$('.cancel-company-investor').click(function() {
    //alert("asdfasf");
    $( ".show-data" ).removeClass( "hidden" );
    $( ".show-edit" ).addClass( "hidden" );
    $( ".save-company-investor" ).addClass( "hidden" );
    $( ".cancel-company-investor" ).addClass( "hidden" );
});    


















});

</script>
                                  

<!-- Sweet-Alert  -->
<script src="<?php echo BASE_PATH; ?>/js/sweetalert.min.js"></script>


 <?php } ?>                                  