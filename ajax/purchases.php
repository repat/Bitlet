<?

$fids = GetPurchases($UID);

$ret = '';	// return variable, start with empty string
foreach($fids as $f) {
	$finfo = GetFileInfo($f);
	$thumb = $finfo['thumb_url'] === '' ? '' : $finfo['thumb_url'];

	// build product row with file and add to return array
	$ret .= BuildPurchaseRow($f, $finfo['name'], $finfo['file_name'], $thumb);
}

// return via AJAX
echo $ret;

?>
