<!DOCTYPE html>
<?
	include_once 'lib/dir.php';

	$url = explode('/', $_SERVER['REQUEST_URI']);
	$args = $_GET['args'];
	error_log('iframe url: '.$url[2]);
	error_log('iframe args: '.$args);

	switch($url[2]) {
		case 'file':
			$dir = 'view/file';
			break;
		default:
			$dir = 'view/ierror';
			break;
	}

	require_once('view/templates/header.php');
	IncludeCSSFiles($dir); 
	require_once($dir.'/index.php');
	IncludeJSFiles('view/templates'); 

?>
