<?
	function ViewAjax($url, $args)
	{
		if(file_exists('ajax/'.$url.'.php')) {
			require('ajax/'.$url.'.php');
		}
	}
?>
