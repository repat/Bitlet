<?
	function ViewAjax($url, $args)
	{
		// we define a macro for shortness sake
		$UID = $_SESSION['uid'];

		if(file_exists('ajax/'.$url.'.php')) {
			require('ajax/'.$url.'.php');
		} else {
			error_log('ajax link does not exist!');
		}
	}
?>
