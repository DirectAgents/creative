<?php
if($_POST)
{
	
		$output = json_encode(array('type'=>'message', 'text' => 'Hi Thank you for your email'));
		die($output);

	}
	
?>