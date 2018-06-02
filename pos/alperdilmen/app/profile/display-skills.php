<?php

include_once("../config.php"); 

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$_GET['userid']."'");
$row = mysqli_fetch_array($sql);

                                        $ctop = $row['Skills']; 
                                        $ctop = explode(',',$ctop); 

                                        if($row['Skills'] != '' && $row['Skills'] != 'NULL' ){

                                        foreach($ctop as $skill)   { 
                                                       
                                        ?>
        <div class="skillsdiv_teammember">
            <?php echo $skill; ?>
        </div>
        <?php } } ?>