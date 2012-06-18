<?

include_once 'globals.php';

function ViewAjax($url, $args)
{
	// we define a macro for shortness sake
	$UID = $_SESSION['uid'];

	error_log('ajaxing to '.$url);
	if(file_exists('ajax/'.$url.'.php')) {
		require('ajax/'.$url.'.php');
	} else {
		error_log('ajax link does not exist!');
	}
}

?>
