<?php

session_start();
require_once 'class.entrepreneur.php';
require_once 'class.investor.php';
require_once 'base_path.php';
include_once("config.php"); 

$cloudinary_section = 'startups';

$left_sidebar_industry = 'startups';

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
        

        <?php include 'left-sidebar-startup.php'; ?>

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




<div class="white-box">
                            <h3 class="box-title">About</h3> 

<p>Our mission is to help Startups to get the attention from Investor when they are looking for funding. This is our goal.</p>


<br><br><h3 class="box-title">What is Fundry?</h3>

<p>testing</p>

                        </div>





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
