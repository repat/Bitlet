<?
	function ViewIframe($url, $args)
	{
		switch($url)
		{
		case 'file':
			$dir = 'view/file';
			break;
		default:
			$dir = 'view/ierror';
			break;
		}

		echo '<!DOCTYPE html>';
		require_once('view/templates/header.php');
		IncludeCSSFiles('view/templates'); 
		IncludeCSSFiles($dir); 
		require_once($dir.'/index.php');
		IncludeJSFiles('view/templates'); 
		IncludeJSFiles($dir); 
	}
?>
