<?
	include_once 'lib/db.php';
	include_once 'lib/dir.php';
	include_once 'lib/user.php';
	include_once 'lib/login.php';
	include_once 'lib/file.php';
	include_once 'lib/aws.php';

	session_start();
	$db = Connect();

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
		case 'logout':
			require('ajax/logout.php');
			break;
		default:
			require('ajax/error.php');
			break;
	}

	// disconnect from database after all is done
	Disconnect($db);
?>
