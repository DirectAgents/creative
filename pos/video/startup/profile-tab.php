<?php

 session_start();
 include_once("../config.php"); 

 $sql = "SELECT * FROM startups WHERE userID ='".$_SESSION['entrepreneurSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row = mysqli_fetch_array($result);

?>
    <div class="row">
        <div class="col-md-3 col-xs-6 b-r"> <strong>Company</strong>
            <br>
            <p class="text-muted">
                <?php echo $row['Name']; ?>
            </p>
        </div>
        <div class="col-md-3 col-xs-6 b-r"> <strong>Location</strong>
            <br>
            <p class="text-muted">
                <?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row['City']))))
.', '.$row['State']; ?>
            </p>
        </div>
        <div class="col-md-3 col-xs-6"> <strong>Industry</strong>
            <br>
            <p class="text-muted">
                <?php echo $row['Industry']; ?>
            </p>
        </div>
    </div>
    <hr>
    <?php if($row['About'] != '') { ?>
    <p class="m-t-30">
        <?php echo $row['About']; ?>
    </p>
    <hr>
    <?php } ?>
    
    <iframe width="100%" height="500" src="https://www.youtube.com/embed/sK7riqg2mr4" frameborder="0" allowfullscreen=""></iframe>