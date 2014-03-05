<?php
$conn = mysql_connect("74.3.216.19", "offsource", "0fF$0uRc3") or die(mysql_error());
$db = mysql_select_db("TermLifeQuoteToday") or die(mysql_error());

//$conn = mysql_connect("localhost", "root", "") or die(mysql_error());
//$db = mysql_select_db("clinchr") or die(mysql_error());

// Path for site Clinchr
define('SITEURL', 'http://termlifequotetoday.com');



$insert_sql = "INSERT INTO everyloan (Firstname) values ('yo')";
				
$rs=mysql_query($insert_sql);	

//echo "aha";


?>