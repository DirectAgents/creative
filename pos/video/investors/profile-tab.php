<?php

 session_start();
 include_once("../config.php"); 

 $sql = "SELECT * FROM profile WHERE id='15'";  
 $result = mysqli_query($connecDB, $sql);  
 $row = mysqli_fetch_array($result);

?>





  <div class="row">
        <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
           <br>
              <p class="text-muted">Jon Snow</p>
                                        </div>               
                   <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                      <br>
                    <p class="text-muted">London</p>
                            </div>
 </div>
                    <hr>

                    <?php if($row['About'] != '') { ?>
                    <p class="m-t-30"><?php echo $row['About']; ?></p>
                    <?php } ?>

                    <h4 class="font-bold m-t-30">Skill Set</h4>
                    <hr>


<?php




$values = explode(',',  $row['Skills']);
foreach ($values as $value)
{

//get skill string
$ret = explode('(', $value);
$skill =  $ret[0];

//get value between parantheses;
preg_match('#\((.*?)\)#', $value, $match);
$percentage = $match[1];

//get rid off percentage sign
$arr = explode("%", $percentage, 2);


switch ($arr[0]){
    case '10':
    $bar = 'progress-bar-danger';
    break;
    case '20':
    $bar = 'progress-bar-primary';
    break;
    case '30':
    $bar = 'progress-bar-custom';
    break;
    case '30':
    $bar = 'progress-bar-success';
    break;

    default:
    $bar = 'progress-bar-success';

}



echo '

<h5>'.$skill.' <span class="pull-right">'.$arr[0].'%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar '.$bar.'" role="progressbar" aria-valuenow="'.$arr[0].'" aria-valuemin="0" aria-valuemax="100" style="width:'.$arr[0].'%;"> <span class="sr-only">'.$arr[0].'% Complete</span> </div>
                                    </div>

';


}




?>