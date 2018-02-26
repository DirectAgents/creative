<?php

session_start();
require_once 'class.entrepreneur.php';
require_once 'class.investor.php';
require_once 'base_path.php';
include_once("config.php"); 

?>

<?php include 'header.php'; ?>

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
        

        <?php include 'left-sidebar.php'; ?>

        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
               
              
                       
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
      
     
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                        <div class="white-box">
                            <div class="product-img">
                                <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_340/v1/{{{_highlightResult.screenshot.value}}}"/>

                                <div class="pro-img-overlay">
   
 
                                     <iframe id="iframe02" src="p.php?id={{{_highlightResult.startupID.value}}}"></iframe>


                                </div>
                            </div>

                            <div class="product-text">
                                <span class="pro-price"><img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/{{{_highlightResult.logo.value}}}" class="thumb-md img-circle"/></span>
                                <h3 class="box-title m-b-0"><a href="<?php echo BASE_PATH; ?>/startup/profile/{{objectID}}">{{{_highlightResult.name.value}}}</a></h3>
                                <small class="text-muted db">
                                <br>
                                <span class="m-r-10"><i class="icon-calender"></i> {{{_highlightResult.date.value}}}</span> 
                                <span class="m-r-10"><i class="fa fa-heart-o"></i> <div id="likes">{{{_highlightResult.likes.value}}}</div></span>  
                                    <i class="fa fa-industry"></i> {{{_highlightResult.industry.value}}}</small>
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

              


 <div class="modal fade text-center" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="container center-block">
                <div class="signup-container center-block">
                    <button type="button" data-dismiss="modal" class='exit-button'><img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/exit-icon.png" class="exit-icon center-block"></button>
                    <div class="signup-card center-block">
                        <img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="center-block signup-card-image">
                        <!--<h2 class="signup-card-title bold text-center">Sign in as a Startup!</h2>-->
                        <p class="signup-description text-center"><span class="bold">Collapsed</span> is a community that aims to provide value by providing insights on failed startups.</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="login-buttons">
                                    <a href="<?php echo htmlspecialchars($loginUrl); ?>">
                                        <div class="fb-connect connect-background" data-track="home:facebook-connect">
                                            <span class="fa fa-facebook"></span>
                                            <span class="connect-text">Connect with Facebook</span>
                                        </div>  
                                    </a>
                                </div>
                             </div>   
                                <div class="col-md-12">
                                    <div class="login-buttons">
                                    <a href="<?php echo $authUrl; ?>">
                                       <div class="google-connect connect-background" id="google-connect-button" data-track="home:google-connect">
                         <span class="fa fa-google-plus"></span>
                         <span class="google-connect-text connect-text">Connect with Google</span>
                    </div>
                                    </a>
                                </div>
                            </div>

                              <div class="col-md-12">
                                    <div class="login-buttons">
                            <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=78x2ye1ktvzj7d&redirect_uri=<?php echo BASE_PATH; ?>/linkedin/&state=987654321&scope=r_basicprofile,r_emailaddress">
                                      <div class="li-connect connect-background" data-track="home:facebook-connect">
                         <span class="fa fa-linkedin"></span>
                        
                         <span class="connect-text">Connect with Linkedin</span>
                         
                        </div>
                    
                    </a>
                                   
                                </div>
                            </div>


                            </div> 
                        </div>
                        <p class="signup-light text-center">We won't ever post anything on Facebook without your permission.</p>
                    </div>
                </div>
            </div>
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
