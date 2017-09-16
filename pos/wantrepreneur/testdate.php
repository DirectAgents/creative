<?php




$date2 = date('Y-m-d');


 

$date = new DateTime($date2);
$match_date = new DateTime('2017-03-28');
$interval = $match_date->diff($date);

if($interval->days == 2) {
    
        //2 days before
        echo "asdf";
    

  
}





?>