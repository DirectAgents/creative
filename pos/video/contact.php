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
                            <h3 class="box-title m-b-0">Get in touch with us<br><br></h3>
                            
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="POST" id="contact-us">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="fm_name" name="fm_name" placeholder="Enter Name"> </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="fm_email" name="fm_email" placeholder="Enter email"> </div>
                                      
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" rows="7" id="fm_message" name="fm_message" placeholder="Enter message"></textarea>
                                            </div>
                                       
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                    </form>
                                     <p>&nbsp;</p>
                                    <div id="success-contact"></div>
                                </div>
                            </div>
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
