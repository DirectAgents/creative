<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 



if(!isset($_SESSION['entrepreneurSession'])){
 
header('Location: '.BASE_PATH.'');
//echo "yo";
exit();

}

if(isset($_SESSION['entrepreneurSession'])){

$sql = mysqli_query($connecDB, "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'");
$row = mysqli_fetch_array($sql); 

if(!empty($row['Type'])){
  header('Location: '.BASE_PATH.'');
  exit();
}


if(empty($row['Type'])){

 

?>




<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>2 Col Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE_PATH; ?>/css/2-col-portfolio.css" rel="stylesheet">

  </head>

  <body>

    

    <!-- Page Content -->
    <div class="container">




      <!-- Page Heading -->
      <h1 class="my-4">Choose Who You Are
      </h1>

      <div class="row">
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="<?php echo BASE_PATH; ?>/choose/c.php?type=Startup"><img class="card-img-top" src="https://res.cloudinary.com/dgml9ji66/image/upload/v1522705318/people-coffee-tea-meeting_knvzzg.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="<?php echo BASE_PATH; ?>/choose/c.php?type=Startup">I'm a Startup</a>
              </h4>
              <p class="card-text">I have a startup or small business.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="<?php echo BASE_PATH; ?>/choose/c.php?type=Investor"><img class="card-img-top" src="https://res.cloudinary.com/dgml9ji66/image/upload/v1522705840/pexels-photo-302842_rquks4.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="<?php echo BASE_PATH; ?>/choose/c.php?type=Investor">I'm an Accredited Investor</a>
              </h4>
              <p class="card-text">I invest in startup or small businesses.</p>
            </div>
          </div>
        </div>
       
       
       
       
      </div>
      <!-- /.row -->

    

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>



  </body>

</html>


<?php } } ?>



