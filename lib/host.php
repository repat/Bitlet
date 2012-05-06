<?php

$whitelist = array('localhost', '127.0.0.1');
if(!in_array($_SERVER['HTTP_HOST'], $whitelist)){
	$localhost = false;
	error_log('remote server host');
} else {
	$localhost = true;
	error_log('localhost');
}

?>
