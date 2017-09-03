<?php
/*
 * Site : http:www.smarttutorials.net
 * Author :muni
 * 
 */
 
define('BASE_PATH','http://localhost/creative/pos/survey/snippets/image-upload/');
define('DB_HOST', 'localhost');
define('DB_NAME','bottle');
define('DB_USER','root');
define('DB_PASSWORD','123');

$con=mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>