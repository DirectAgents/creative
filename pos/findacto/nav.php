
<?php if(isset($_SESSION['participantSession'])){?>


<?php 

$stmt = mysqli_query($connecDB, "SELECT * FROM profile WHERE id='".$_SESSION['participantSession']."'");
$rownav = mysqli_fetch_array($stmt);


$_SESSION['profileimage'] = $rownav['ProfileImage'];
$_SESSION['google_picture_link'] = $rownav['google_picture_link'];


?>


<nav id="navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="<?php echo BASE_PATH; ?>" class="svg"><object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="navbar-logo"></object>  </a><h2 class="logo-title">Collapsed</h2>
                <button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-header">
                <div class="nav-search-container">
                   
                     <input type="text" class="algolia-autocomplete light" id="search-input" placeholder="Search by Programming Skills or Name" />

                </div>
            </div>

            <div class="navbar-offcanvas navbar-offcanvas-right navbar-menubuilder" id="js-bootstrap-offcanvas">

               
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="faq" class="navbar-text">FAQ</a></li>
                    <li><a href="about" class="navbar-text">About</a></li>
                    <li><a href="contact" class="navbar-text">How it works</a></li>
                    <li>
                        <div class="btn-group">
                              <button type="button" class="dropdown-toggle center-block text-center elipsis-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-option-horizontal"> </i></button>
                              <ul class="dropdown-menu dropdown-menu-nav dropdown-mobile">
                                <li><a href="faq">FAQ</a></li>
                                <li><a href="contact">Contact</a></li>
                              </ul>
                        </div>
                    </li>
                    
                     <li>
                         <p class="navbar-profile-name bold"><?php echo $rownav['Firstname'];?></p>
                         <div class="btn-group" id="navbar-avatar">
                              <button type="button" class="navbar-profile-avatar dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


<?php if($rownav['google_picture_link'] != ''){ ?>
        <li><img src="<?php echo $_SESSION['google_picture_link']; ?>" class="navbar-profile-icon"/></li>
<?php } ?>

<?php if(isset($_SESSION['fb_access_token_participant'])){ ?>
        <li><img src="https://graph.facebook.com/<?php echo $_SESSION['facebook_photo']; ?>/picture" class="navbar-profile-icon"/></li>
<?php } ?>
       
<?php if(!isset($_SESSION['access_token']) && (!isset($_SESSION['fb_access_token_participant']))){ ?>

      
<?php if($rownav['profile_image'] != ''){  ?>
        <li><img src="<?php echo BASE_PATH; ?>/images/profile/participant/<?php echo $rownav['profile_image'];?>" class="navbar-profile-icon"/></li>
<?php }else{ ?>
        <li><img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" class="navbar-profile-icon"/></li>
<?php } ?>

<?php } ?>



                                
                              </button>
                              <ul class="dropdown-menu dropdown-menu-nav dropdown-mobile">
                                <li><a href="/dashboard">Dashboard</a></li>
                                <li><a href="<?php echo BASE_PATH; ?>/profile/<?php echo $_SESSION['participantSession']; ?>">Profile</a></li>
                                <li>
                                    <a href="<?php echo BASE_PATH; ?>/logout.php?t=<?php echo $_SESSION['participantSession'];?>">
                                       
                                      
                                          
                                          <button style="border:0px; background:0px; padding:0px;" type="submit">Sign Out</button>
                                       
                                    </a>
                                </li>
                              </ul>
                         </div>
                         <p class="navbar-profile-name hidden2 bold">Alper</p>
                     </li>
                    
                </ul>
            </div>
        </div>
    </nav>


<?php }else{ ?>



 <nav id="navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="<?php echo BASE_PATH; ?>" class="svg"><object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="navbar-logo"></object>  </a><h2 class="logo-title">Collapsed</h2>
                <button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-header">
                <div class="nav-search-container">
	
	  
  
       <input type="text" class="algolia-autocomplete light" id="search-input" placeholder="Search by Programming Skills or Name" />
   

                </div>
            </div>


            <div class="navbar-offcanvas navbar-offcanvas-right navbar-menubuilder" id="js-bootstrap-offcanvas">

                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="faq" class="navbar-text">FAQ</a></li>
                    <li><a href="about" class="navbar-text">About</a></li>
                    <li><a href="contact" class="navbar-text">Contact</a></li>
                   
                    
                        <li><a><button class="button-filled"  data-toggle="modal" data-target="#signin">Sign In</button></a></li>


                    
                </ul>
            </div>
        </div>
    </nav>


 <?php } ?>   