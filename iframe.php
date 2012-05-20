<?
	include_once 'lib/dir.php';
	include_once 'lib/user.php';
	include_once 'lib/login.php';
	include_once 'lib/file.php';

	session_start();
	$db = Connect();

	$url = explode('/', $_SERVER['REQUEST_URI']);
	$args = $_GET['args'];
	error_log('iframe url: '.$url[2]);
	error_log('iframe args: '.$args);

	switch($url[2]) {
		case 'file':
			$dir = 'view/file';
			break;
		case 'login':
			$dir = 'view/login';
			break;
		default:
			$dir = 'view/ierror';
			break;
	}

	echo '<!DOCTYPE html>';
	require_once('view/templates/header.php');
	IncludeCSSFiles($dir); 
	require_once($dir.'/index.php');
	IncludeJSFiles('view/templates'); 
	IncludeJSFiles($dir); 

	// disconnect from database after all is done
	Disconnect($db);
?>
