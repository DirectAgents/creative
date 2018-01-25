<?php

 session_start();
 require_once '../base_path.php';
 include '../config.php';
 require_once('../algoliasearch-client-php-master/algoliasearch.php');

 $client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");

 $index = $client->initIndex('startups');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo BASE_PATH; ?>/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_PATH; ?>/bootstrap/bootstrap.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/chartist.min.css" rel="stylesheet">
    <link href="<?php echo BASE_PATH; ?>/css/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/fullcalendar.css" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/blue-dark.css" id="theme" rel="stylesheet">
    
    <link href="<?php echo BASE_PATH; ?>/css/materialdesignicons.min.css"  rel="stylesheet">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">


      <!-- Popup CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/magnific-popup.css" rel="stylesheet">
    


    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

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
        

        <?php include '../nav.php'; ?>
        

        <?php include '../left-sidebar.php'; ?>

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



<script type="text/html" id="hit-template">

  <div class="hit">
   
    <div class="hit-content">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="product-img">
                                <img src="{{{_highlightResult.profileimage.value}}}"/>
                                <div class="pro-img-overlay">

                                    <a href="#img1" class="popup-youtube bg-info"><i class="ti-eye"></i></a> 
                                    <a href="javascript:void(0)" class="bg-danger"><i class="ti-bookmark"></i></a>
                                    <a href="javascript:void(0)" class="bg-danger"><i class="ti-heart"></i></a>
                                </div>
                            </div>
                            <div class="product-text">
                                <span class="pro-price bg-danger">$15</span>
                                <h3 class="box-title m-b-0"><a href="profile/{{profileid}}">{{{_highlightResult.name.value}}}</a></h3>
                                <small class="text-muted db">
                                <br>
                                <span class="m-r-10"><i class="icon-calender"></i> May 16</span> 
                                <span class="m-r-10"><i class="fa fa-heart-o"></i> 38</a></span>  
                                    <i class="fa fa-industry"></i> {{{_highlightResult.industry.value}}}</small>
                            </div>
                        </div>
                    </div>



<!-- lightbox container hidden with CSS -->
<a href="#_" class="lightbox" id="img1">
<div id="videoModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="false" style="display: block;">
  <div class="modal-header">
    <button type="button" class="close full-height" data-dismiss="modal" aria-hidden="true">X</button>
    <h3>Donna Galletta- Showreel</h3>
  </div>
  <div class="modal-body"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/sK7riqg2mr4" frameborder="0" allowfullscreen=""></iframe></div>
  <div class="modal-footer"></div>
</div>
</a>



   </div> 
</div>  



    </div>
  </div>
 
</script>


</main>


   



                    <?php 
                    
                   // $sql = mysqli_query($connecDB,"SELECT * FROM startups ORDER BY id DESC");                    
                   // while($row = mysqli_fetch_array($sql)){

                    ?>

                    <!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="product-img">
                                <img src="{{{_highlightResult.profileimage.value}}}"/>
                                <div class="pro-img-overlay">

                                    <a href="www.youtube.com/watch?v=sK7riqg2mr4" class="popup-youtube bg-info"><i class="ti-eye"></i></a> 
                                    <a href="javascript:void(0)" class="bg-danger"><i class="ti-bookmark"></i></a>
                                    <a href="javascript:void(0)" class="bg-danger"><i class="ti-heart"></i></a>
                                </div>
                            </div>
                            <div class="product-text">
                                <span class="pro-price bg-danger">$15</span>
                                <h3 class="box-title m-b-0">{{{_highlightResult.name.value}}}</h3>
                                <small class="text-muted db">
                                <br>
                                <span class="m-r-10"><i class="icon-calender"></i> May 16</span> 
                                <span class="m-r-10"><i class="fa fa-heart-o"></i> 38</a></span>  
                                    <i class="fa fa-industry"></i> <?php echo $row['Industry'];?></small>
                            </div>
                        </div>
                    </div>
                  
                   <?php //} ?>
                   
                </div>-->

                
                <!--<div class="row">

                    <div class="main-screen">
                    
                    <?php 
                    
                    $sql = mysqli_query($connecDB,"SELECT * FROM startups ORDER BY id DESC");                    
                    while($row = mysqli_fetch_array($sql)){

                    ?>
                    <div class="col-md-4 col-lg-4 col-xs-12 col-sm-6"> 
                        <div class="white-box">
                            <a class="popup-youtube" href="www.youtube.com/watch?v=sK7riqg2mr4">
                            <img class="img-responsive" alt="user" src="<?php echo BASE_PATH; ?>/images/img1.jpg"></a><br>
                            <div class="text-muted">
                                <span class="m-r-10"><i class="icon-calender"></i> May 16</span> 
                            <span class="m-r-10"><i class="fa fa-heart-o"></i> 38</a></span>  
                            <i class="fa fa-heart-o"></i> <?php echo $row['Industry'];?></div>
                            <h3 class="m-t-20 m-b-20"><?php echo $row['Name'];?></h3>
                            
                            <a href="<?php echo BASE_PATH; ?>/startups/profile/<?php echo $row['userID']; ?>/" class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Visit Profile</a>

                        </div>
                    </div>

                    <?php } ?>

                    </div>
                    
                </div>-->

                 <!-- ============================================================== -->
                <!-- Main Screen End -->
                <!-- ============================================================== -->


             
               
            </div>

             <div id="pagination"></div>     
             
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo BASE_PATH; ?>/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo BASE_PATH; ?>/js/waves.js"></script>
    <!--Counter js -->
    <script src="<?php echo BASE_PATH; ?>/js/jquery.waypoints.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/raphael-min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/morris.js"></script>
    <!-- chartist chart -->
    <script src="<?php echo BASE_PATH; ?>/js/chartist.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/chartist-plugin-tooltip.min.js"></script>
    <!-- Calendar JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/moment.js"></script>
    <script src='<?php echo BASE_PATH; ?>/js/fullcalendar.min.js'></script>
    <script src="<?php echo BASE_PATH; ?>/js/cal-init.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/custom.min.js"></script>
    <!-- Custom tab JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/cbpFWTabs.js"></script>
    <script type="text/javascript">
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();
    </script>
    <script src="<?php echo BASE_PATH; ?>/js/jquery.toast.js"></script>


     <!-- Magnific popup JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/jquery.magnific-popup-init.js"></script>


    <!--Style Switcher -->
    <script src="<?php echo BASE_PATH; ?>/js/jQuery.style.switcher.js"></script>
    


    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/app.js"></script>

</body>

</html>
