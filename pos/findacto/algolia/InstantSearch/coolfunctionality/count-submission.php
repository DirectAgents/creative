  <?php


session_start();
require 'config.php';


$query = "SELECT COUNT(*) FROM submission WHERE id = '29' GROUP BY id";
$result = mysqli_query($connecDB,$query);
$rows = mysqli_fetch_row($result);
echo $rows[0];



?>