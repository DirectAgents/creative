<?php

session_start();
require_once 'class.entrepreneur.php';
require_once 'class.investor.php';
require_once 'base_path.php';
include_once("config.php"); 

$cloudinary_section = 'investors';

$left_sidebar_industry = 'investors';

$type_nav = 'Investor';

?>

<?php include 'header.php'; ?>


<?php

if(isset($_SESSION['entrepreneurSession'])) {

$sql = "SELECT * FROM tbl_users WHERE userID ='".$_SESSION['entrepreneurSession']."'";  
$result = mysqli_query($connecDB, $sql);  
$row = mysqli_fetch_array($result);




if($row['Type'] == 'Investor'){



$sql_industry = mysqli_query($connecDB,"SELECT * FROM investor_company WHERE userID='".$_SESSION['entrepreneurSession']."'");
$row_industry = mysqli_fetch_array($sql_industry);

date_default_timezone_set('America/New_York');
$date = date("Y-m-d");
$time = date('h:i:s A');  

$date_algolia = date('F j',strtotime($date));  // January 30, 2015, for example.


//Upload to algolia
$response = array();

//Google
if (isset($_SESSION['access_token'])){
$response[] = array(
  'objectID'=> $row['userID'],
  'investorID'=> $row['userID'],
  'url'=> seoUrl($fullname), 
  'fullname'=> $fullname,
  'profileimage'=> $user->picture,
  'location'=> $row['City'].', '.$row['State'],
  'industry'=> explode(',', $row_industry['Industry']),
  'likes'=> '0',
  'date'=> $date_algolia
   );
}

//Facebook
if(isset($_SESSION['fb_access_token_entrepreneur'])){

  $response[] = array(
  'objectID'=> $row['userID'],
  'investorID'=> $row['userID'],
  'url'=> seoUrl($fullname), 
  'fullname'=> $fullname,
  'profileimage'=> 'https://graph.facebook.com/'.$row['facebook_id'].'/picture?type=large',
  'location'=> $row['City'].', '.$row['State'],
  'industry'=> explode(',', $row_industry['Industry']),
  'likes'=> '0',
  'date'=> $date_algolia
   );

}  







$fp = fopen('choose/investors.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

//echo var_dump($response);


$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('investors');

$records = json_decode(file_get_contents('choose/investors.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}


}

}

?>

<!-- ============================================================== -->
<!-- Topbar header -->
<!-- ============================================================== -->

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        

        <?php include 'nav.php'; ?>
        

        <?php include 'left-sidebar-investor.php'; ?>

        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
               
              <?php //echo $_SESSION['entrepreneurSession']; ?>
                       
                <!-- ============================================================== -->
                <!-- Main Screen Start -->
                <!-- ============================================================== -->
                <p>&nbsp;</p>



                <div class="row">





            <main>


<div id="hits"></div>


<script type="text/html" id="hit-template" data-jsassets="<?php echo BASE_PATH; ?>/js/profile-entrepreneur.js, http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js ,<?php echo BASE_PATH; ?>/js/sweetalert.min.js, <?php echo BASE_PATH; ?>/js/sweetalert.min.js">


  <div class="hit">
   
    <div class="hit-content">
      
      <div id="profile-img">
                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">

                        <div class="white-box-index">
                            <div class="profile-img">
                                <a href="<?php echo BASE_PATH; ?>/profile/{{url}}"><img src="{{{_highlightResult.profileimage.value}}}"/></a>

                                
                            </div>

                            <div class="product-text">
                                <!--<span class="pro-price"><img src="https://graph.facebook.com/{{{_highlightResult.profileimage.value}}}/picture" class="thumb-md img-circle"/></span>-->
                                <h3 class="box-title m-b-0"><a href="<?php echo BASE_PATH; ?>/profile/{{url}}">{{{_highlightResult.fullname.value}}}</a></h3>
                                <small class="text-muted db">
                                <br>
                                
                                <span class="m-r-10"><i class="icon-location-pin"></i> {{{_highlightResult.location.value}}}</span> 
                               
                                <!--<span class="m-r-10"><i class="icon-tag"></i></span>-->
                                
                                    </small>
                            </div>
                        </div>
                    </div>



        </div>
   </div> 
</div>  



    </div>
  </div>




</script>





</main>


                   
                </div>

                
                 <!-- ============================================================== -->
                <!-- Main Screen End -->
                <!-- ============================================================== -->
               
                <div id="pagination"></div>

             
            </div>

              

            <!-- /.container-fluid -->
            
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->


<?php include 'footer.php'; ?>


  

</body>

</html>
