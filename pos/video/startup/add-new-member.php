<?php

 session_start();
 require_once '../class.startup.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


$sql = "SELECT * FROM tbl_startup WHERE userID ='".$_POST['userid']."'";  
$result = mysqli_query($connecDB, $sql);  
$row = mysqli_fetch_array($result);

 ?>



                                        
                                         <div id="team-tab-data">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6 b-r"> <strong>1111Full Name</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        <?php echo $row['Fullname']; ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-3 col-xs-6"> <strong>Position</strong>
                                                    <br>
                                                    <p class="text-muted">
                                    <?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row['City']))))
.', '.$row['State']; ?>
                                                    </p>
                                                </div>

                                                <div class="col-md-3 col-xs-6"> 
                                                    <br>
                                                    <p class="text-muted">
                                   image
                                                    </p>
                                                </div>

                                                
                                            </div>
                                            <hr>
                                            <strong>Skills</strong>
                                            <?php if($row_startup['About'] != '') { ?>
                                            <p class="m-t-30">
                                                <?php echo $row_startup['About']; ?>
                                            </p>
                                            <?php } ?>
                                           <hr>
                                             

                                            <button class="fcbtn btn btn-info btn-outline btn-1d save-team-member">Save</button>
                                            <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-team-member">Cancel</button>

                                        </div>                               

                                   