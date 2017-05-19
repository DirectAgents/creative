<?php

if(!empty($_SESSION['participantSession'])){



$stmt = mysqli_query($connecDB, "SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$rownav = mysqli_fetch_array($stmt);


$_SESSION['profileimage'] = $rownav['profile_image'];
$_SESSION['google_picture_link'] = $rownav['google_picture_link'];

?>

 <h1><a href="<?php echo BASE_PATH; ?>" title="Valify"></a></h1>


<nav>
      <!--<ul class="pages">
        <li class="home"><a href="../index.php">Home</a></li>
        <li class="features"><a href="features.html">About</a></li>
        <li class="pricing"><a href="pricing.html">Pricing</a></li>
        <li class="gallery"><a href="../gallery.html">Gallery</a></li>
       
      </ul>-->
      <ul class="external-logged-in">

        <li class="create-new-project"><a href="<?php echo BASE_PATH; ?>/participant/idea/browse/">BROWSE IDEAS</a></li>

<a href="<?php echo BASE_PATH; ?>/profile/participant/?id=<?php echo $_SESSION['participantSession'];?>">
<?php if($rownav['google_picture_link'] != ''){ ?>
        <li><img src="<?php echo $_SESSION['google_picture_link']; ?>" class="nav-profile-photo"/></li>
<?php } ?>

<?php if($rownav['facebook_id'] != '0'){  ?>
        <li><img src="https://graph.facebook.com/<?php echo $_SESSION['facebook_photo']; ?>/picture" class="nav-profile-photo"/></li>
<?php } ?>
       
<?php if($rownav['google_picture_link'] == '' && $rownav['facebook_id'] == '0'){ ?>

      
<?php if($rownav['profile_image'] != ''){  ?>
        <li><img src="<?php echo BASE_PATH; ?>/images/profile/participant/<?php echo $rownav['profile_image'];?>" class="nav-profile-photo"/></li>
<?php }else{ ?>
        <li><img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" class="nav-profile-photo"/></li>
<?php } ?>

  </a>
<?php } ?>



        <li class="more">
            <span>My account</span>
            <ul>
              <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/profile/participant/?id=<?php echo $_SESSION['participantSession'];?>">Profile</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/participant/account/settings/">Settings</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/participant/payment/">Payment</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/participant/meetings/">My Meetings</a></li>
              <li class='separator'></li>
              <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/logout.php?t=<?php echo $rownav['login_session'];?>"><i class="fa fa-power-off fa-lg"></i> Logout</a></li>

            
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

 <h1><a href="<?php echo BASE_PATH; ?>" title="Valify"></a></h1>

<nav>
      <!--<ul class="pages">
        <li class="home"><a href="../index.php">Home</a></li>
        <li class="features"><a href="features.html">About</a></li>
        <li class="pricing"><a href="pricing.html">Pricing</a></li>
        <li class="gallery"><a href="../gallery.html">Gallery</a></li>
       
      </ul>-->
      <ul class="external-logged-in">
      
         <li class="create-new-project"><a href="<?php echo BASE_PATH; ?>/startup/idea/create/step1.php?id=<?php echo rand(100, 100000);?>">List Your Idea</a></li>

        <li class="my-projects"><a href="<?php echo BASE_PATH; ?>/startup">My Ideas</a></li>

       
<a href="<?php echo BASE_PATH; ?>/profile/startup/?id=<?php echo $_SESSION['startupSession'];?>">

<?php if(isset($_SESSION['access_token'])){ ?>
        <li><img src="<?php echo $_SESSION['google_picture_link']; ?>" class="nav-profile-photo"/></li>
<?php } ?>

<?php if(isset($_SESSION['facebook_photo'])){ ?>
        <li><img src="https://graph.facebook.com/<?php echo $_SESSION['facebook_photo']; ?>/picture" class="nav-profile-photo"/></li>
<?php } ?>
       
<?php if(!isset($_SESSION['access_token']) && (!isset($_SESSION['facebook_photo']))){ ?>

<?php if($_SESSION['profileimage'] != ''){ ?>
        <li><img src="<?php echo BASE_PATH; ?>/images/profile/startup/<?php echo $_SESSION['profileimage'];?>" class="nav-profile-photo"/></li>
<?php }else{ ?>
        <li><img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" class="nav-profile-photo"/></li>
<?php } ?>

</a>

<?php } ?>


      

        <li class="more">
            <span>My account</span>
            <ul>
              <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/profile/startup/?id=<?php echo $_SESSION['startupSession'];?>">Profile</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/startup/account/settings/">Settings</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/startup/payment/">Payment</a></li>
              <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/startup/meetings/">My Meetings</a></li>
              <li class='separator'></li>
              <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/logout.php?t=<?php echo $rownav['login_session'];?>"><i class="fa fa-power-off fa-lg"></i> Logout</a></li>

            
            </ul>
        </li>
      </ul>
</nav>


<? } ?>

