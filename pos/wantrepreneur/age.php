<?php

	$month = '1';
	$day = '2';
	$year = '1979';

    $dob= $year.'-'.$month.'-'.$day;
    $diff = (date('Y') - date('Y',strtotime($dob)));
    echo $diff;


$monthNum  = 01;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); // March

echo $monthName;

?>