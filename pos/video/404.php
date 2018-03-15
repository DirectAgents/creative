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

            <!-- End Top Navigation -->
            

        <?php include 'left-sidebar.php'; ?>
        

            <!-- ============================================================== -->
            <!-- Page Content -->
            <!-- ============================================================== -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Page not found</h4> </div>

                       
                    </div>
                    <!-- /.row -->
                    <!-- .row -->
<div class="row" style="text-align: center;">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div>
                <p>&nbsp;</p>
                <div class="error-actions">
                    <a href="<?php echo BASE_PATH; ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Take Me Home </a>&nbsp;&nbsp;&nbsp;<a href="mailto:contact@test.com" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                </div>
            </div>
        </div>
    </div>
                    <!-- /.row -->

                  
                  
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