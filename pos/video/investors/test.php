<?php

$string = 'Board Games (30%),Creative Writing (10%),Cats (40%)';


$values = explode(',', $string);
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



echo '

<h5>'.$skill.' <span class="pull-right">'.$arr[0].'%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$arr[0].'" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">'.$arr[0].'% Complete</span> </div>
                                    </div>

';


}


?>