<?php
session_start();


require_once '../../base_path.php';

require_once '../../class.participant.php';
require_once '../../class.startup.php';
include_once("../../config.php");
include("../../config.inc.php");



$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  //echo "adsfasdf";
  //echo $_SESSION['participantSession'];
  $participant_home->redirect('../login/');
}


//echo $_SESSION['participantSession'];


$get_total_rows = 0;
$results = $mysqli->query("SELECT COUNT(*) FROM tbl_startup_project");
if($results){
$get_total_rows = $results->fetch_row(); 
}


//break total records into pages
$total_pages = ceil($get_total_rows[0]/$item_per_page); 




$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../header.php"); ?>


       



<!--Browse Participants-->

<script type="text/javascript">
$(document).ready(function() {



  var track_click = 0; //track user click on "load more" button, righ now it is 0 click
  
  var total_pages = <?php echo $total_pages; ?>;
  $('#results').load("fetch_pages.php", {'page':track_click}, function(data) {track_click++;}); //initial data to load



  $(".load_more").click(function (e) { //user clicks on button

    $(this).hide(); //hide load more button on click
    $('.animation_image').show(); //show loading image

    if(track_click <= total_pages) //make sure user clicks are still less than total pages
    {
      //post page number and load returned data into result element
      $.post('load_more_accepted.php',{'page': track_click}, function(data) {
      
        $(".load_more").show(); //bring back load more button
        
        $("#results").append(data); //append data received from server

        

        //scroll page to button element
        $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
        
        //hide loading image

        $('.animation_image').hide(); //hide loading image once data is received
  
        track_click++; //user click increment on load button
      
      }).fail(function(xhr, ajaxOptions, thrownError) { 
        alert(thrownError); //alert any HTTP error
        $(".load_more").show(); //bring back load more button
        $('.animation_image').hide(); //hide loading image once data is received
      });
      
      
      if(track_click >= total_pages-1)
      {

        //reached end of the page yet? disable load button
        $(".load_more").attr("disabled", "disabled");
      }
     }
      
    });



$(".load_more_pending").click(function (e) { //user clicks on button

    $(this).hide(); //hide load more button on click
    $('.animation_image').show(); //show loading image

    if(track_click <= total_pages) //make sure user clicks are still less than total pages
    {
      //post page number and load returned data into result element
      $.post('load_more_pending.php',{'page': track_click}, function(data) {
      
        $(".load_more").show(); //bring back load more button
        
        $("#results").append(data); //append data received from server

        

        //scroll page to button element
        $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
        
        //hide loading image

        $('.animation_image').hide(); //hide loading image once data is received
  
        track_click++; //user click increment on load button
      
      }).fail(function(xhr, ajaxOptions, thrownError) { 
        alert(thrownError); //alert any HTTP error
        $(".load_more").show(); //bring back load more button
        $('.animation_image').hide(); //hide loading image once data is received
      });
      
      
      if(track_click >= total_pages-1)
      {

        //reached end of the page yet? disable load button
        $(".load_more").attr("disabled", "disabled");
      }
     }
      
    });



});
</script>






        
    </head>
    
    <body>

<!--TopNav-->
         <header id="main-header" class='transparent'>
  <div class="inner-col">
   


<?php include("../../nav.php"); ?>

   
  </div>
</header>


<!--TopNav-->



 <div class="clearer"></div>


<!-- Main -->

   <div class="container">


<div class="row-fluid">
  <div class="span12">


 
      
      <div id="dashboardSurveyTargetingContainerLogic">





  
<div id="results"></div>



<!--
<div align="center">
<button class="load_more" id="load_more_button">load More</button>
<button class="load_more_pending" id="load_more_button">load More </button>
<div class="animation_image" style="display:none;"><img src="ajax-loader.gif"> Loading...</div>
</div>-->








<div class="clearer"></div>

       
        





     

          
      </div>

    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  

       </div>




<!-- Modal HTML -->
    <div id="more-info-needed" class="modal fade">
    
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                    <h4 class="modal-title">Please enter the following</h4>
                </div>
                <div class="modal-body">
                 
      <div class="form">

                 <form class="form-signin" method="post">


 
   <div class="name-field col-md-12">
      <div class="form-group">
      <div class="label-birthday">Zip</div>
    <input type="text"  placeholder="Your Zip code *" pattern="[0-9]{5}" maxlength="5"  name="txtzip" id="txtzip" class="txtzip" oninvalid="this.setCustomValidity('Enter a valid Zip Code')" oninput="setCustomValidity('')" required/>
    </div>
  </div>

  <div class="name-field birthday col-md-4">
      <div class="form-group">
      <div class="label-birthday">Birthday</div>
   
<select name="txtmonth" class="txtmonth" oninvalid="this.setCustomValidity('Select a month')" oninput="setCustomValidity('')" required>
  <option value=""> - Month - </option>
  <option value="1">January</option>
  <option value="2">Febuary</option>
  <option value="3">March</option>
  <option value="4">April</option>
  <option value="5">May</option>
  <option value="6">June</option>
  <option value="7">July</option>
  <option value="8">August</option>
  <option value="9">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>

    </div>
  </div>


   <div class="name-field birthday col-md-3">
      <div class="form-group">
  <div class="label-birthday-day">&nbsp;</div>
<select name="txtday" class="txtday" oninvalid="this.setCustomValidity('Select a day')" oninput="setCustomValidity('')" required>
  <option value=""> - Day - </option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
</select>

    </div>
  </div>



    <div class="name-field birthday col-md-1">
      <div class="form-group">
   <div class="label-birthday-year">&nbsp;</div>
<select name="txtyear" class="txtyear" oninvalid="this.setCustomValidity('Select a year')" oninput="setCustomValidity('')" required>
  <option value=""> - Year - </option>
  <option value="2002">2002</option>
  <option value="2001">2001</option>
  <option value="2000">2000</option>
  <option value="1999">1999</option>
  <option value="1998">1998</option>
  <option value="1997">1997</option>
  <option value="1996">1996</option>
  <option value="1995">1995</option>
  <option value="1994">1994</option>
  <option value="1993">1993</option>
  <option value="1992">1992</option>
  <option value="1991">1991</option>
  <option value="1990">1990</option>
  <option value="1989">1989</option>
  <option value="1988">1988</option>
  <option value="1987">1987</option>
  <option value="1986">1986</option>
  <option value="1985">1985</option>
  <option value="1984">1984</option>
  <option value="1983">1983</option>
  <option value="1982">1982</option>
  <option value="1981">1981</option>
  <option value="1980">1980</option>
  <option value="1979">1979</option>
  <option value="1978">1978</option>
  <option value="1977">1977</option>
  <option value="1976">1976</option>
  <option value="1975">1975</option>
  <option value="1974">1974</option>
  <option value="1973">1973</option>
  <option value="1972">1972</option>
  <option value="1971">1971</option>
  <option value="1970">1970</option>
  <option value="1969">1969</option>
  <option value="1968">1968</option>
  <option value="1967">1967</option>
  <option value="1966">1966</option>
  <option value="1965">1965</option>
  <option value="1964">1964</option>
  <option value="1963">1963</option>
  <option value="1962">1962</option>
  <option value="1961">1961</option>
  <option value="1960">1960</option>
  <option value="1959">1959</option>
  <option value="1958">1958</option>
  <option value="1957">1957</option>
  <option value="1956">1956</option>
  <option value="1955">1955</option>
  <option value="1954">1954</option>
  <option value="1953">1953</option>
  <option value="1952">1952</option>
  <option value="1951">1951</option>
  <option value="1950">1950</option>
  <option value="1949">1949</option>
  <option value="1948">1948</option>
  <option value="1947">1947</option>
</select>

    </div>
  </div>
    
   
    


  </form>
</div>

                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    <button type="button" class="btn btn-blue-color submit">Submit</button>
                </div>
            </div>
        </div>
    </div>







<?php if(isset($_SESSION['fb_access_token_participant']) && $row['Zip'] == '' || isset($_SESSION['access_token']) && $row['Zip'] == ''){ ?>

<script>
$(document).ready(function () {

$('#more-info-needed').modal({
      backdrop: 'static'
    });





$(".submit").click(function() {  
//alert("aads"); 

 //get input field values

        var proceed = true;

        
        var zip = $('input[name=txtzip]').val();
        var month = $("select[name='txtmonth']").val();
        var day = $("select[name='txtday']").val();
        var year = $("select[name='txtyear']").val();

        var zip_reg = /^\d{5}(?:[-\s]\d{4})?$/;

        if(!zip.match(zip_reg)) {

                $(".txtzip").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        }else{
                $(".txtzip").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };  


        if(!month) {

                $(".txtmonth").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        }else{
                $(".txtmonth").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };

        if(!day) {

                $(".txtday").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        }else{
                $(".txtday").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };

        if(!year) {

                $(".txtyear").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        }else{
                $(".txtyear").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };

       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        

        
      
      
         

        //everything looks good! proceed...
        if(proceed) 
        {
            $(".result-delete").show();
            $("#result-delete").hide().slideDown();
            $(".cancel-delete").hide();
            $(".close-delete").show();

          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'zip':zip,'month':month,'day':day,'year':year};
            
            //Ajax post data to server
            $.post('submitzipdob.php', post_data, function(response){  
            


                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            //alert(text);
                
            //output = '<div class="success">'+response.text+'</div>';
            window.location.href = "index.php";
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
       
        
            }, 'json');
      
        }


 

});


});

</script>

<? } ?>






  <?php include("../../footer.php"); ?>
  </div>

    </div>

    <div class="clearer"></div>

 

  </div>

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>