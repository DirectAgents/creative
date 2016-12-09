<?php

if(empty($_SESSION['participantSession']) && empty($_SESSION['startupSession'])){



?>


 <h1><a href="index.php" title="Stripe"></a></h1>


<nav>
      <ul class="pages">
        <li class="home"><a href="../index.php">Home</a></li>
        <li class="features"><a href="about.php">About</a></li>
        <li class="pricing"><a href="pricing.html">Pricing</a></li>
        <li class="gallery"><a href="../gallery.html">Gallery</a></li>
        <li class="more">
            <span>How it works</span>
            <ul>
              <li><a href='../checkout.html'>Overview</a></li>
              <li><a href='../subscriptions.html'>Subscriptions</a></li>
              <li><a href='../relay.html'>Relay</a></li>
              <li><a href='../connect.html'>Connect</a></li>
              <li><a href='../bitcoin.html'>Bitcoin</a></li>
              <li><a href='../atlas.html'>Atlas<strong class="new-badge">New</strong></a></li>

              <li class='separator'><a href="../blog.html">Blog</a></li>
              <li><a href="../about.html">About</a></li>
              <li><a href="../jobs.html">Jobs</a></li>
            </ul>
        </li>
      </ul>
      <ul class="external-logged-out">
      
        <li><a href="https://support.stripe.com">Become a Participant</a></li>

        <li class="button">
          <a data-adroll-segment='submit_two' href="<?php echo BASE_PATH; ?>/participant/login.php">Login</a>
        </li>
      </ul>
    </nav>


<? } ?>











<?php

if(!empty($_SESSION['participantSession'])){



$stmt = mysqli_query($connecDB, "SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$rownav = mysqli_fetch_array($stmt);


$_SESSION['profileimage'] = $rownav['profile_image'];
$_SESSION['google_picture_link'] = $rownav['google_picture_link'];

?>

 <h1><a href="index.php" title="Stripe"></a></h1>


<nav>
      <ul class="pages">
        <li class="home"><a href="../index.php">Home</a></li>
        <li class="features"><a href="features.html">About</a></li>
        <li class="pricing"><a href="pricing.html">Pricing</a></li>
        <li class="gallery"><a href="../gallery.html">Gallery</a></li>
       
      </ul>
      <ul class="external-logged-in">

        <li class="create-new-project"><a href="<?php echo BASE_PATH; ?>/participant/idea/browse/">BROWSE IDEAS</a></li>


<?php if(isset($_SESSION['access_token'])){ ?>
        <li><img src="<?php echo $_SESSION['google_picture_link']; ?>" class="nav-profile-photo"/></li>
<?php } ?>

<?php if(isset($_SESSION['facebook_photo'])){ ?>
        <li><img src="https://graph.facebook.com/<?php echo $_SESSION['facebook_photo']; ?>/picture" class="nav-profile-photo"/></li>
<?php } ?>
       
<?php if(!isset($_SESSION['access_token']) && (!isset($_SESSION['facebook_photo']))){ ?>

      
<?php if($_SESSION['profileimage'] != ''){ ?>
        <li><img src="<?php echo BASE_PATH; ?>/images/profile/<?php echo $_SESSION['profileimage'];?>" class="nav-profile-photo"/></li>
<?php }else{ ?>
        <li><img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" class="nav-profile-photo"/></li>
<?php } ?>

      
<?php } ?>



        <li class="more">
            <span>My account</span>
            <ul>
              <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/profile/participant/?id=<?php echo $_SESSION['participantSession'];?>">Profile</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/participant/account/settings/">Settings</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/participant/payment/">Payment</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/participant/meetings/">My Meetings</a></li>
              <li class='separator'></li>
              <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/logout.php"><i class="fa fa-power-off fa-lg"></i> Logout</a></li>

            
            </ul>
        </li>
      </ul>
</nav>


<? } ?>










<?php

if(!empty($_SESSION['startupSession'])){



$stmt = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID='".$_SESSION['startupSession']."'");
$rownav = mysqli_fetch_array($stmt);


$_SESSION['profileimage'] = $rownav['profile_image'];
$_SESSION['google_picture_link'] = $rownav['google_picture_link'];


?>

 <h1><a href="index.php" title="Stripe"></a></h1>

<nav>
      <ul class="pages">
        <li class="home"><a href="../index.php">Home</a></li>
        <li class="features"><a href="features.html">About</a></li>
        <li class="pricing"><a href="pricing.html">Pricing</a></li>
        <li class="gallery"><a href="../gallery.html">Gallery</a></li>
       
      </ul>
      <ul class="external-logged-in">
      
         <li class="create-new-project"><a href="<?php echo BASE_PATH; ?>/startup/idea/create/step1.php?id=<?php echo rand(100, 100000);?>">LIST YOUR IDEA</a></li>

        <li class="my-projects"><a href="<?php echo BASE_PATH; ?>/startup">My Ideas</a></li>

       


<?php if(isset($_SESSION['access_token'])){ ?>
        <li><img src="<?php echo $_SESSION['google_picture_link']; ?>" class="nav-profile-photo"/></li>
<?php } ?>

<?php if(isset($_SESSION['facebook_photo'])){ ?>
        <li><img src="https://graph.facebook.com/<?php echo $_SESSION['facebook_photo']; ?>/picture" class="nav-profile-photo"/></li>
<?php } ?>
       
<?php if(!isset($_SESSION['access_token']) && (!isset($_SESSION['facebook_photo']))){ ?>

<?php if($_SESSION['profileimage'] != ''){ ?>
        <li><img src="<?php echo BASE_PATH; ?>/images/profile/<?php echo $_SESSION['profileimage'];?>" class="nav-profile-photo"/></li>
<?php }else{ ?>
        <li><img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" class="nav-profile-photo"/></li>
<?php } ?>

<?php } ?>


      

        <li class="more">
            <span>My account</span>
            <ul>
              <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/profile/startup/?id=<?php echo $_SESSION['startupSession'];?>">Profile</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/startup/account/settings/">Settings</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/startup/payment/">Payment</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/startup/meetings/">My Meetings</a></li>
              <li class='separator'></li>
              <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/logout.php"><i class="fa fa-power-off fa-lg"></i> Logout</a></li>

            
            </ul>
        </li>
      </ul>
</nav>


<? } ?>

