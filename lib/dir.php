<?

	// open directory in input and return all files that matches regex
	function GetDirMatch($dir, $match) 
	{
		$ret = array();
		if ($handle = opendir($dir)) {
			while (false !== ($entry = readdir($handle))) {
				// add entry to array if matches regex
				if(preg_match($match, $entry)) {
					$ret[] = $entry;
				}
			}

			closedir($handle);
		}
		return sort($ret);
	}

	// echo out all js files
	function IncludeJSFiles($dir)
	{
		$files = GetDirMatch($dir, '/.*\.js/');
		foreach($files as $f) {
			echo '<script type="text/javascript" src="/'.$dir.'/'.$f.'"></script>';
		}
	}	

	// echo out all css files
	function IncludeCSSFiles($dir)
	{
		$files = GetDirMatch($dir, '/.*\.css/');
		foreach($files as $f) {
			echo '<link href="/'.$dir.'/'.$f.'" rel="stylesheet" type="text/css">';
		}
	}	
?>
