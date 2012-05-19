<?
	include_once 'lib/dir.php';
	include_once 'lib/user.php';
	include_once 'lib/login.php';

	session_start();
	$url = explode('/', $_SERVER['REQUEST_URI']);
	error_log('ajax url: '.$url[2]);

	switch($url[2]) {
		case 'upload':
			require('ajax/upload.php');
			break;
		case 'setprice':
			require('ajax/setprice.php');
			break;
		case 'login':
			require('ajax/login.php');
			break;
		default:
			require('ajax/error.php');
			break;
	}

?>
