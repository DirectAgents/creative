<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


 if($_GET){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$_GET['userid']."'");
$row = mysqli_fetch_array($sql);


$words = explode(" ", $row['Fullname']);
$firstname = $words[0];

 ?>


<?php if ($row['Skills'] != ''){ ?>

<div style="float:left; width:100%;  padding:0 0 10px 0">

<strong><?php echo $firstname; ?>'s Skills</strong>

</div>      
 
<div class="skills-background">                                
                                    

                                        <?php 
                                        $ctop = $row['Skills']; 
                                        $ctop = explode(',',$ctop); 

                                        if($row['Skills'] != '' && $row['Skills'] != 'NULL' ){

                                        foreach($ctop as $skill)   { 
                                                       
                                        ?>
                                        <div class="skillsdiv_teammember"><?php echo $skill; ?></div>

                                        <?php } } ?>

                                       
                                        
                          
</div> 

<?php } ?>    

<?php if($row['Resume'] != ''){ ?>

<strong>About <?php echo $firstname; ?></strong>

<p><?php echo $row['About']; ?></p>
<p>&nbsp;</p>

<?php } ?>   

  
<?php if($row['Resume'] != ''){ ?>
 
<a href="http://res.cloudinary.com/dgml9ji66/image/upload/v1519605264/<?php echo $row['Resume']; ?>.pdf" target="_blank">
View Resume
</a>


 <?php } ?>    

<?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $row['userID']) { ?>
<a href="<?php echo BASE_PATH; ?>/settings/">Edit your Account</a>
<?php } ?>


 <?php if($row['About'] == '' && $row['Skills'] == '' && $row['Resume'] == '' && $_SESSION['entrepreneurSession'] != $row['userID']) {echo "Profile is empty";}   ?>                                     
                                           


  <?php } ?>