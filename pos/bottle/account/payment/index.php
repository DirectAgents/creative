<?php
session_start();
require_once '../../base_path.php';


require_once '../../class.customer.php';
require_once '../../class.admin.php';
require_once '../../config.php';
require_once '../../config.inc.php';


/*
$restaurant_home = new CUSTOMER();

if($restaurant_home->is_logged_in())
{
  $restaurant_home->logout();
}
*/



$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../../login');
}



if(isset($_GET['h'])){

$sqlwepay=mysqli_query($connecDB,"SELECT * FROM wepay WHERE homelessID = '".$_GET['h']."' AND TaskID = '".$_GET['d']."'");

if(mysqli_num_rows($sqlwepay)>0)
{

   header("Location:../payment/"); 
}

}




$get_total_rows = 0;
$results = $mysqli->query("SELECT COUNT(*) FROM tbl_startup_project");
if($results){
$get_total_rows = $results->fetch_row(); 
}


//break total records into pages
$total_pages = ceil($get_total_rows[0]/$item_per_page); 




$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



if(isset($_GET['verified']) == '1'){



require '../../wepay.php';


    // application settings
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
      try {
    $response = $wepay->request('account', array(

  


    'account_id' =>    $row['account_id']

    
    


) );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}


if (isset($error)){
echo htmlspecialchars($error);
echo". Please refresh page and try again.";
exit();
    }else{
    // display the response
    //print_r($response);
    $bankaccount = $response->balances[0]->withdrawal_bank_name;



  $update_sql = mysqli_query($connecDB,"UPDATE tbl_customer SET 
  account_verified='1',
  bank_account = '".$bankaccount."'

  WHERE userID='".$_SESSION['customerSession']."'");




    //header("Location:".$response -> uri."");
        //'address' => ['address1' => '100 Main Street','city'=>'New York','region'=>"CA",'country'=> "US",'postal_code'=> "94025"]*/

    //echo $response -> balances -> reserved_amount;



 }

}

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




<script src="https://static.wepay.com/min/js/wepay.v2.js" type="text/javascript"></script>


        
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