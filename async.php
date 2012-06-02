<?
	function ViewAjax($url, $args)
	{
		if(file_exists('ajax/'.$url.'.php')) {
			require('ajax/'.$url.'.php');
		} else {
			error_log('ajax link does not exist!');
		}
	}
?>
