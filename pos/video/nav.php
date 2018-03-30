
        
        
       <?php if(isset($_SESSION['entrepreneurSession'])) {?>


       <?php 

$stmt = mysqli_query($connecDB, "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'");
$rownav = mysqli_fetch_array($stmt);



        
   


 if($rownav['Type'] == ''){

      header('Location: '.BASE_PATH.'/choose/');
      exit();
}

$sql_startup = "SELECT * FROM startups WHERE userID ='".$rownav['userID']."'";  
$result = mysqli_query($connecDB, $sql_startup);  
$row_startup = mysqli_fetch_array($result);

$words = explode(" ", $rownav['Fullname']);

$firstname = $words[0];


////////////////Notifications for Connect Requests///////////////////////////

if($rownav['Type'] == 'Startup'){$table = 'tbl_connections_startup';}
if($rownav['Type'] == 'Investor'){$table = 'tbl_connections_investor';}

$result_count = mysqli_query($connecDB,"SELECT requested_id, requester_id, Date, Time, COUNT(DISTINCT requested_id) AS count FROM ".$table." WHERE requested_id = '".$rownav['userID']."' GROUP BY requested_id");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];


$stmt_user = mysqli_query($connecDB, "SELECT * FROM tbl_users WHERE userID='".$row_count['requester_id']."'");
$row_connect = mysqli_fetch_array($stmt_user);



$_SESSION['google_picture_link'] = $rownav['google_picture_link'];

       ?>

        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <?php //echo $_SESSION['entrepreneurSession']; echo $_SESSION['usernameSession']; ?>
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?php echo BASE_PATH; ?>">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="<?php echo BASE_PATH; ?>/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="<?php echo BASE_PATH; ?>/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
                
<?php if ($count > 0) { ?>

                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-check-circle"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>





                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have <?php echo $count; ?> new request</div>
                            </li>
                            <li>
                                <div class="message-center">


<?php 

$sql = mysqli_query($connecDB,"SELECT * FROM ".$table." WHERE requested_id = '".$rownav['userID']."' ORDER BY id DESC");
while($row_connect_request = mysqli_fetch_array($sql)){  

?>


                                    <a href="<?php echo BASE_PATH; ?>/connections/">
                                        <div class="user-img"> 
                                            

<?php if($rownav['ProfileImage'] == 'Google'){ ?>
         <img src="<?php echo $row_connect['google_picture_link']; ?>" alt="user" class="img-circle">
<?php } ?>

<?php if($rownav['ProfileImage'] == 'Facebook'){ ?>
         <img src="https://graph.facebook.com/<?php echo $row_connect['facebook_id']; ?>/picture" alt="user" class="img-circle">
<?php } ?>

<?php if($rownav['ProfileImage'] == 'Linkedin'){ ?>
         <img src="<?php echo $row_connect['linkedin_picture_link']; ?>" alt="user" class="img-circle">
<?php } ?>


                                            <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5><?php echo $row_connect['Fullname']; ?></h5> <span class="mail-desc">Wants to connect with you!</span> 
                                            <span class="time-request-sent"><?php echo date('F j',strtotime($row_connect_request['Date'])); ?>, <?php echo $row_connect_request['Time']; ?></span> </div>
                                    </a>


  <?php } ?>                                  
                                   
                                  
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="<?php echo BASE_PATH; ?>/connections/"> <strong>See all connections</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                     
                       
                    </li>
                    <!-- /.dropdown-messages -->
           <?php } ?>            


<?php 

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
if($row[$keys[0]] > 0){ // 20


?>


                    <!-- .Megamenu -->
                    <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Popular Startups</span> <i class="icon-options-vertical"></i></a>
                        <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                           

<?php

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
//echo $row[$keys[0]]; // 20


///////////// 1# Highest liked Industry/////////////////


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Likes = '".$row[$keys[0]]."'");
$row2 = mysqli_fetch_array($sql);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."'");
//$row = mysqli_fetch_array($sql);

$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }

arsort($row);
$keys = array_keys($row);



if(array_key_exists(0, $row) == 1){
$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[0]]."'");
$row3 = mysqli_fetch_array($sql3);
$sql4 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row3['requested_id']."'");
$row4 = mysqli_fetch_array($sql4);
}

if(array_key_exists(1, $row) == 1){
$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[1]]."'");
$row5 = mysqli_fetch_array($sql5);
$sql6 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row5['requested_id']."'");
$row6 = mysqli_fetch_array($sql6);
}

if(array_key_exists(2, $row) == 1){
$sql7 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[2]]."'");
$row7 = mysqli_fetch_array($sql7);
$sql8 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row8 = mysqli_fetch_array($sql8);
}

if(array_key_exists(3, $row) == 1){
$sql9 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[3]]."'");
$row9 = mysqli_fetch_array($sql9);
$sql10 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row10 = mysqli_fetch_array($sql10);
}

if(array_key_exists(4, $row) == 1){
$sql11 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[4]]."'");
$row11 = mysqli_fetch_array($sql11);
$sql12 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row13 = mysqli_fetch_array($sql13);
}


?>

                           <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header"><?php echo $row2['Industry']; ?></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(0, $row) == 1){ echo $row4['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row6['Name'];?>"><?php if(array_key_exists(1, $row) == 1){ echo $row6['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row8['Name'];?>"><?php if(array_key_exists(2, $row) == 1){ echo $row8['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php  echo $row10['Name'];?>"><?php if(array_key_exists(3, $row) == 1){ echo $row10['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(4, $row) == 1){ echo $row12['Name'];} ?></a></li>
                                </ul>
                            </li>




<?php

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
//echo $row[$keys[0]]; // 20


if($row[$keys[1]] > 0 && $row[$keys[1]] < $row[$keys[0]] || $row[$keys[1]] == $row[$keys[0]] && $row[$keys[1]] > 0 ){ // 20

///////////// 2# Highest liked Industry/////////////////


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Likes = '".$row[$keys[1]]."' AND Industry != '".$row2['Industry']."'");
$row2 = mysqli_fetch_array($sql);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."'");
//$row = mysqli_fetch_array($sql);

$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }

arsort($row);
$keys = array_keys($row);




if(array_key_exists(0, $row) == 1){
$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[0]]."'");
$row3 = mysqli_fetch_array($sql3);
$sql4 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row3['requested_id']."'");
$row4 = mysqli_fetch_array($sql4);
}

if(array_key_exists(1, $row) == 1){
$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[1]]."'");
$row5 = mysqli_fetch_array($sql5);
$sql6 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row5['requested_id']."'");
$row6 = mysqli_fetch_array($sql6);
}

if(array_key_exists(2, $row) == 1){
$sql7 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[2]]."'");
$row7 = mysqli_fetch_array($sql7);
$sql8 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row8 = mysqli_fetch_array($sql8);
}

if(array_key_exists(3, $row) == 1){
$sql9 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[3]]."'");
$row9 = mysqli_fetch_array($sql9);
$sql10 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row10 = mysqli_fetch_array($sql10);
}

if(array_key_exists(4, $row) == 1){
$sql11 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[4]]."'");
$row11 = mysqli_fetch_array($sql11);
$sql12 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row13 = mysqli_fetch_array($sql13);
}


?>




                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header"><?php echo $row2['Industry']; ?></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(0, $row) == 1){ echo $row4['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row6['Name'];?>"><?php if(array_key_exists(1, $row) == 1){ echo $row6['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row8['Name'];?>"><?php if(array_key_exists(2, $row) == 1){ echo $row8['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php  echo $row10['Name'];?>"><?php if(array_key_exists(3, $row) == 1){ echo $row10['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(4, $row) == 1){ echo $row12['Name'];} ?></a></li>
                                </ul>
                            </li>


<?php } ?>

<?php

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
//echo $row[$keys[0]]; // 20


if($row[$keys[2]] > 0 && $row[$keys[2]] < $row[$keys[1]] || $row[$keys[2]] == $row[$keys[1]] && $row[$keys[2]] > 0 ){ // 20


///////////// 3# Highest liked Industry/////////////////


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Likes = '".$row[$keys[2]]."' AND Industry != '".$row2['Industry']."'");
$row2 = mysqli_fetch_array($sql);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."'");
//$row = mysqli_fetch_array($sql);

$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }

arsort($row);
$keys = array_keys($row);



if(array_key_exists(0, $row) == 1){
$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[0]]."'");
$row3 = mysqli_fetch_array($sql3);
$sql4 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row3['requested_id']."'");
$row4 = mysqli_fetch_array($sql4);
}

if(array_key_exists(1, $row) == 1){
$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[1]]."'");
$row5 = mysqli_fetch_array($sql5);
$sql6 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row5['requested_id']."'");
$row6 = mysqli_fetch_array($sql6);
}

if(array_key_exists(2, $row) == 1){
$sql7 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[2]]."'");
$row7 = mysqli_fetch_array($sql7);
$sql8 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row8 = mysqli_fetch_array($sql8);
}

if(array_key_exists(3, $row) == 1){
$sql9 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[3]]."'");
$row9 = mysqli_fetch_array($sql9);
$sql10 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row10 = mysqli_fetch_array($sql10);
}

if(array_key_exists(4, $row) == 1){
$sql11 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[4]]."'");
$row11 = mysqli_fetch_array($sql11);
$sql12 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row13 = mysqli_fetch_array($sql13);
}


?>



                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header"><?php echo $row2['Industry']; ?></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(0, $row) == 1){ echo $row4['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row6['Name'];?>"><?php if(array_key_exists(1, $row) == 1){ echo $row6['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row8['Name'];?>"><?php if(array_key_exists(2, $row) == 1){ echo $row8['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php  echo $row10['Name'];?>"><?php if(array_key_exists(3, $row) == 1){ echo $row10['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(4, $row) == 1){ echo $row12['Name'];} ?></a></li>
                                </ul>
                            </li>

<?php } ?>

<?php

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
//echo $row[$keys[0]]; // 20


if($row[$keys[3]] > 0 && $row[$keys[3]] < $row[$keys[2]] || $row[$keys[3]] == $row[$keys[2]] && $row[$keys[3]] > 0){ // 20

///////////// 4# Highest liked Industry/////////////////


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Likes = '".$row[$keys[3]]."' AND Industry != '".$row2['Industry']."'");
$row2 = mysqli_fetch_array($sql);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."'");
//$row = mysqli_fetch_array($sql);

$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }

arsort($row);
$keys = array_keys($row);



if(array_key_exists(0, $row) == 1){
$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[0]]."'");
$row3 = mysqli_fetch_array($sql3);
$sql4 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row3['requested_id']."'");
$row4 = mysqli_fetch_array($sql4);
}

if(array_key_exists(1, $row) == 1){
$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[1]]."'");
$row5 = mysqli_fetch_array($sql5);
$sql6 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row5['requested_id']."'");
$row6 = mysqli_fetch_array($sql6);
}

if(array_key_exists(2, $row) == 1){
$sql7 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[2]]."'");
$row7 = mysqli_fetch_array($sql7);
$sql8 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row8 = mysqli_fetch_array($sql8);
}

if(array_key_exists(3, $row) == 1){
$sql9 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[3]]."'");
$row9 = mysqli_fetch_array($sql9);
$sql10 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row10 = mysqli_fetch_array($sql10);
}

if(array_key_exists(4, $row) == 1){
$sql11 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[4]]."'");
$row11 = mysqli_fetch_array($sql11);
$sql12 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row13 = mysqli_fetch_array($sql13);
}


?>





                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header"><?php echo $row2['Industry']; ?></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(0, $row) == 1){ echo $row4['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row6['Name'];?>"><?php if(array_key_exists(1, $row) == 1){ echo $row6['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row8['Name'];?>"><?php if(array_key_exists(2, $row) == 1){ echo $row8['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php  echo $row10['Name'];?>"><?php if(array_key_exists(3, $row) == 1){ echo $row10['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(4, $row) == 1){ echo $row12['Name'];} ?></a></li>
                                </ul>
                            </li>

<?php } ?>

                        </ul>
                    </li>
                    <!-- /.Megamenu -->

                    <?php } ?>
                </ul>



                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form method="POST" action="<?php echo BASE_PATH; ?>/?q=" id="search-input-form" role="search" class="app-search hidden-sm hidden-xs m-r-10">
                        
                        <?php if(!isset($type_nav)){ ?>
                        <input type="text" class="algolia-autocomplete light form-control" name="search-input" id="search-input" placeholder="Search by Startup Name or Industry" /><div class="algolia"><img src="<?php echo BASE_PATH; ?>/images/algolia.png"/><i class="fa fa-search"></i></div>
                        <?php }else{ ?>
                         <input type="text" class="algolia-autocomplete light form-control" name="search-input" id="search-input" placeholder="Search by Investor Name or Industry" /><div class="algolia"><img src="<?php echo BASE_PATH; ?>/images/algolia.png"/><i class="fa fa-search"></i></div>
                        <?php } ?>

                         </form>

                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 

                           


<?php if($rownav['ProfileImage'] == 'Google'){ ?>
         <img src="<?php echo $rownav['google_picture_link']; ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $firstname; ?></b><span class="caret"></span> 
<?php } ?>

<?php if($rownav['ProfileImage'] == 'Facebook'){ ?>
         <img src="https://graph.facebook.com/<?php echo $rownav['facebook_id']; ?>/picture" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $firstname; ?></b><span class="caret"></span> 
<?php } ?>

<?php if($rownav['ProfileImage'] == 'Linkedin'){ ?>
         <img src="<?php echo $rownav['linkedin_picture_link']; ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $firstname; ?></b><span class="caret"></span> 
<?php } ?>


                        </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="<?php echo BASE_PATH; ?>/profile/<?php echo $rownav['username']; ?>"><i class="fas fa-user"></i>&nbsp;&nbsp;My Profile</a></li>
                            <?php if($row_startup['Name'] != ''){ ?>
                             <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row_startup['Url']; ?>"><i class="fas fa-building"></i>&nbsp;&nbsp;My Startup</a></li>
                            <?php } ?>
                            <li><a href="<?php echo BASE_PATH; ?>/connections/"><i class="fas fa-users"></i> Connections</a></li>
                            <li><a href="<?php echo BASE_PATH; ?>/bookmarks/">&nbsp;<i class="fas fa-bookmark"></i>&nbsp;&nbsp;Bookmarks</a></li>
                             <?php if($row_startup['Name'] == '' && $rownav['Type'] == 'Startup'){ ?>
                             <li role="separator" class="divider"></li>
                             <li><a href="<?php echo BASE_PATH; ?>/startup/create"><i class="fas fa-rocket"></i>&nbsp;&nbsp;Add a Startup</a></li>
                            <?php } ?>
                             <li role="separator" class="divider"></li>
                            <li><a href="<?php echo BASE_PATH; ?>/settings/"><i class="fas fa-cog"></i>&nbsp;&nbsp;Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo BASE_PATH; ?>/logout/"><i class="fa fa-power-off"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>

                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->

        
        <?php }else{ ?>

        
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?php echo BASE_PATH; ?>">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="<?php echo BASE_PATH; ?>/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="<?php echo BASE_PATH; ?>/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
                    
                   
                 
                <?php 

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
if($row[$keys[0]] > 0){ // 20


?>


                    <!-- .Megamenu -->
                    <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Popular Startups</span> <i class="icon-options-vertical"></i></a>
                        <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                           

<?php

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
//echo $row[$keys[0]]; // 20


///////////// 1# Highest liked Industry/////////////////


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Likes = '".$row[$keys[0]]."'");
$row2 = mysqli_fetch_array($sql);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."'");
//$row = mysqli_fetch_array($sql);

$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }

arsort($row);
$keys = array_keys($row);



if(array_key_exists(0, $row) == 1){
$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[0]]."'");
$row3 = mysqli_fetch_array($sql3);
$sql4 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row3['requested_id']."'");
$row4 = mysqli_fetch_array($sql4);
}

if(array_key_exists(1, $row) == 1){
$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[1]]."'");
$row5 = mysqli_fetch_array($sql5);
$sql6 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row5['requested_id']."'");
$row6 = mysqli_fetch_array($sql6);
}

if(array_key_exists(2, $row) == 1){
$sql7 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[2]]."'");
$row7 = mysqli_fetch_array($sql7);
$sql8 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row8 = mysqli_fetch_array($sql8);
}

if(array_key_exists(3, $row) == 1){
$sql9 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[3]]."'");
$row9 = mysqli_fetch_array($sql9);
$sql10 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row10 = mysqli_fetch_array($sql10);
}

if(array_key_exists(4, $row) == 1){
$sql11 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[4]]."'");
$row11 = mysqli_fetch_array($sql11);
$sql12 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row13 = mysqli_fetch_array($sql13);
}


?>

                           <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header"><?php echo $row2['Industry']; ?></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(0, $row) == 1){ echo $row4['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row6['Name'];?>"><?php if(array_key_exists(1, $row) == 1){ echo $row6['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row8['Name'];?>"><?php if(array_key_exists(2, $row) == 1){ echo $row8['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php  echo $row10['Name'];?>"><?php if(array_key_exists(3, $row) == 1){ echo $row10['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(4, $row) == 1){ echo $row12['Name'];} ?></a></li>
                                </ul>
                            </li>




<?php

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
//echo $row[$keys[0]]; // 20


if($row[$keys[1]] > 0 && $row[$keys[1]] < $row[$keys[0]] ){ // 20

///////////// 2# Highest liked Industry/////////////////


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Likes = '".$row[$keys[1]]."'");
$row2 = mysqli_fetch_array($sql);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."'");
//$row = mysqli_fetch_array($sql);

$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }

arsort($row);
$keys = array_keys($row);




if(array_key_exists(0, $row) == 1){
$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[0]]."'");
$row3 = mysqli_fetch_array($sql3);
$sql4 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row3['requested_id']."'");
$row4 = mysqli_fetch_array($sql4);
}

if(array_key_exists(1, $row) == 1){
$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[1]]."'");
$row5 = mysqli_fetch_array($sql5);
$sql6 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row5['requested_id']."'");
$row6 = mysqli_fetch_array($sql6);
}

if(array_key_exists(2, $row) == 1){
$sql7 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[2]]."'");
$row7 = mysqli_fetch_array($sql7);
$sql8 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row8 = mysqli_fetch_array($sql8);
}

if(array_key_exists(3, $row) == 1){
$sql9 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[3]]."'");
$row9 = mysqli_fetch_array($sql9);
$sql10 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row10 = mysqli_fetch_array($sql10);
}

if(array_key_exists(4, $row) == 1){
$sql11 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[4]]."'");
$row11 = mysqli_fetch_array($sql11);
$sql12 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row13 = mysqli_fetch_array($sql13);
}


?>




                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header"><?php echo $row2['Industry']; ?></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(0, $row) == 1){ echo $row4['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row6['Name'];?>"><?php if(array_key_exists(1, $row) == 1){ echo $row6['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row8['Name'];?>"><?php if(array_key_exists(2, $row) == 1){ echo $row8['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php  echo $row10['Name'];?>"><?php if(array_key_exists(3, $row) == 1){ echo $row10['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(4, $row) == 1){ echo $row12['Name'];} ?></a></li>
                                </ul>
                            </li>


<?php } ?>

<?php

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
//echo $row[$keys[0]]; // 20


if($row[$keys[2]] > 0 && $row[$keys[2]] < $row[$keys[1]] ){ // 20


///////////// 3# Highest liked Industry/////////////////


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Likes = '".$row[$keys[2]]."'");
$row2 = mysqli_fetch_array($sql);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."'");
//$row = mysqli_fetch_array($sql);

$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }

arsort($row);
$keys = array_keys($row);



if(array_key_exists(0, $row) == 1){
$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[0]]."'");
$row3 = mysqli_fetch_array($sql3);
$sql4 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row3['requested_id']."'");
$row4 = mysqli_fetch_array($sql4);
}

if(array_key_exists(1, $row) == 1){
$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[1]]."'");
$row5 = mysqli_fetch_array($sql5);
$sql6 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row5['requested_id']."'");
$row6 = mysqli_fetch_array($sql6);
}

if(array_key_exists(2, $row) == 1){
$sql7 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[2]]."'");
$row7 = mysqli_fetch_array($sql7);
$sql8 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row8 = mysqli_fetch_array($sql8);
}

if(array_key_exists(3, $row) == 1){
$sql9 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[3]]."'");
$row9 = mysqli_fetch_array($sql9);
$sql10 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row10 = mysqli_fetch_array($sql10);
}

if(array_key_exists(4, $row) == 1){
$sql11 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[4]]."'");
$row11 = mysqli_fetch_array($sql11);
$sql12 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row13 = mysqli_fetch_array($sql13);
}


?>



                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header"><?php echo $row2['Industry']; ?></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(0, $row) == 1){ echo $row4['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row6['Name'];?>"><?php if(array_key_exists(1, $row) == 1){ echo $row6['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row8['Name'];?>"><?php if(array_key_exists(2, $row) == 1){ echo $row8['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php  echo $row10['Name'];?>"><?php if(array_key_exists(3, $row) == 1){ echo $row10['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(4, $row) == 1){ echo $row12['Name'];} ?></a></li>
                                </ul>
                            </li>

<?php } ?>

<?php

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups");
//$row = mysqli_fetch_array($sql);



$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }
//print_r($row);
//echo max($row);

arsort($row);
$keys = array_keys($row);

//echo $keys[1]; // chocolate
//echo $row[$keys[0]]; // 20


if($row[$keys[3]] > 0 && $row[$keys[3]] < $row[$keys[2]] ){ // 20

///////////// 4# Highest liked Industry/////////////////


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Likes = '".$row[$keys[3]]."'");
$row2 = mysqli_fetch_array($sql);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."'");
//$row = mysqli_fetch_array($sql);

$row = array();
while($data = mysqli_fetch_assoc($sql)){
        $row[] = $data['Likes'];

    }

arsort($row);
$keys = array_keys($row);



if(array_key_exists(0, $row) == 1){
$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[0]]."'");
$row3 = mysqli_fetch_array($sql3);
$sql4 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row3['requested_id']."'");
$row4 = mysqli_fetch_array($sql4);
}

if(array_key_exists(1, $row) == 1){
$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[1]]."'");
$row5 = mysqli_fetch_array($sql5);
$sql6 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row5['requested_id']."'");
$row6 = mysqli_fetch_array($sql6);
}

if(array_key_exists(2, $row) == 1){
$sql7 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[2]]."'");
$row7 = mysqli_fetch_array($sql7);
$sql8 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row8 = mysqli_fetch_array($sql8);
}

if(array_key_exists(3, $row) == 1){
$sql9 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[3]]."'");
$row9 = mysqli_fetch_array($sql9);
$sql10 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row10 = mysqli_fetch_array($sql10);
}

if(array_key_exists(4, $row) == 1){
$sql11 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row2['Industry']."' AND Likes = '".$row[$keys[4]]."'");
$row11 = mysqli_fetch_array($sql11);
$sql12 = mysqli_query($connecDB,"SELECT * FROM startups WHERE startupID = '".$row7['requested_id']."'");
$row13 = mysqli_fetch_array($sql13);
}


?>





                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header"><?php echo $row2['Industry']; ?></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(0, $row) == 1){ echo $row4['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row6['Name'];?>"><?php if(array_key_exists(1, $row) == 1){ echo $row6['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row8['Name'];?>"><?php if(array_key_exists(2, $row) == 1){ echo $row8['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php  echo $row10['Name'];?>"><?php if(array_key_exists(3, $row) == 1){ echo $row10['Name'];} ?></a></li>
                                    <li><a href="<?php echo BASE_PATH; ?>/startup/<?php echo $row4['Name'];?>"><?php if(array_key_exists(4, $row) == 1){ echo $row12['Name'];} ?></a></li>
                                </ul>
                            </li>

<?php } ?>

                        </ul>
                    </li>
                    <!-- /.Megamenu -->

                    <?php } ?>





                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                          

                        <input type="text" class="algolia-autocomplete light form-control" id="search-input" placeholder="Search by Startup Name or Industry" /><div class="algolia"><img src="<?php echo BASE_PATH; ?>/images/algolia.png"/><i class="fa fa-search"></i></div>
                         </form>

                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="modal" data-target="#signin" href="#"> <b class="hidden-xs">Login</b></a>
                        
                    </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="modal" data-target="#signin" href="#"> <b class="hidden-xs">Signup</b></a>
                        
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->



        <?php } ?>