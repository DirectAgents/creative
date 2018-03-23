<?php  

session_start();
include '../config.php';
require_once '../base_path.php'; 


if(isset($_GET['id'])){

$sql = mysqli_query($connecDB,"SELECT * FROM startups WHERE userID = '".$_GET['id']."'");
$row = mysqli_fetch_array($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>


     <!-- Bootstrap Core CSS -->
        <link href="<?php echo BASE_PATH; ?>/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/bootstrap/bootstrap.css" rel="stylesheet">
    
        <!--alerts CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/sweetalert.css" rel="stylesheet" type="text/css">
     


 <!-- Custom CSS -->
<link href="<?php echo BASE_PATH; ?>/css/iframe-button.css" rel="stylesheet">


    <!-- Add jQuery library -->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>



<script type="text/javascript">
        $(document).ready(function() {
         

            $('.fancybox').fancybox();

           
            $('.fancybox-media_button').click(function(e){
                e.preventDefault();
             $('.fancybox-media')
                .attr('rel', 'media-gallery')
                parent.$.fancybox({
                    href: this.href,
                    openEffect : 'none',
                    closeEffect : 'none',
                    prevEffect : 'none',
                    nextEffect : 'none',
                    type: 'iframe',

                    arrows : false,
                    helpers : {
                        media : {},
                        //buttons : {}
                    }
                });
              }); // click  


        });
    </script>




</head>
<body>


   
       
   

 <div class="product-img">
 <div class="pro-img-overlay">
   <a href="<?php echo $row['Video']; ?>" class="fancybox-media_button bg-info"><i class="ti-eye"></i></a>  

<?php if(isset($_SESSION['entrepreneurSession']) && $_GET['id'] != $_SESSION['entrepreneurSession'] ) { ?> 
 <a href="#" class="bg-danger bookmark" data-requested-id="<?php echo $_GET['id']; ?>" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>"><i class="ti-bookmark"></i></a>

 <a href="#" class="bg-danger like" data-industry="<?php echo $row['Industry']; ?>" data-requested-id="<?php echo $_GET['id']; ?>" data-requester-id="<?php echo $_SESSION['entrepreneurSession']; ?>"><i class="ti-heart"></i></a>




 <?php } ?>



 </div>
 </div>





      
                   

                               
                           
</body> 

        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->

       
        <!-- Sweet-Alert  -->
        <script src="<?php echo BASE_PATH; ?>/js/sweetalert.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/jquery.sweet-alert.custom.js"></script>
       
        <script src="<?php echo BASE_PATH; ?>/js/profile-entrepreneur.js"></script>
      


</html> 

<?php } ?>
