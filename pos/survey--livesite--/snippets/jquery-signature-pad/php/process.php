<?php //echo $_POST['signature']; 



$data = $_POST['signature'];

$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));

file_put_contents(rand(5, 10000000).'.png', $data);



?>


