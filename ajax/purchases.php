<?

$fids = GetPurchases($UID);

$ret = '';	// return variable, start with empty string
foreach($fids as $f) {
	$finfo = GetFileInfo($f);

	// build product row with file and add to return array
	$ret .= BuildPurchaseRow($f, $finfo['name'], $finfo['file_name'], $finfo['thumb_url']);
}

// return via AJAX
echo $ret;

?>
