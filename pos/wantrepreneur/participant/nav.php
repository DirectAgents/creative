<?php

if($_SESSION['participantSession'] != ''){



$stmt = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$row = mysql_fetch_array($stmt);


$_SESSION['profileimage'] = $row['profile_image'];

}

?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="#">
        <img alt="Brand" src="...">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo BASE_PATH; ?>/participant">Become a Participant</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo BASE_PATH; ?>/images/profile/<?php echo $_SESSION['profileimage']; ?>" class="img-circle-profile-nav"> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/participant/account/profile/">Account</a></li>
            <li> <a tabindex="-1" href="<?php echo BASE_PATH; ?>/participant/account/settings/">Settings</a></li>
            <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/participant/account/settings/"><i class="icon-off"></i> Logout</a></li>
            <li role="separator" class="divider"></li>
            <li><a tabindex="-1" href="<?php echo BASE_PATH; ?>/logout.php"><i class="fa fa-power-off fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
