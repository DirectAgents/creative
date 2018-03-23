<?php

session_start();
require_once 'class.entrepreneur.php';
require_once 'class.investor.php';
require_once 'base_path.php';
include_once("config.php"); 

$cloudinary_section = 'investors';

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
      
     
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                        <div class="white-box-index">
                            <div class="product-img">
                                <a href="<?php echo BASE_PATH; ?>/profile/{{url}}"><img src="{{{_highlightResult.profileimage.value}}}"/></a>

                                
                            </div>

                            <div class="product-text">
                                <!--<span class="pro-price"><img src="https://graph.facebook.com/{{{_highlightResult.profileimage.value}}}/picture" class="thumb-md img-circle"/></span>-->
                                <h3 class="box-title m-b-0"><a href="<?php echo BASE_PATH; ?>/profile/{{url}}">{{{_highlightResult.fullname.value}}}</a></h3>
                                <small class="text-muted db">
                                <br>
                                <span class="m-r-10"><i class="icon-calender"></i> {{{_highlightResult.date.value}}}</span> 
                                <span class="m-r-10"><i class="fa fa-heart-o"></i> <div class="likes"><div id="likes{{objectID}}">{{{_highlightResult.likes.value}}}</div></div></span>  
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
