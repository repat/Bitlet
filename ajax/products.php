<?

$fids = GetFids($UID);

$ret = '';	// return variable, start with empty string
foreach($fids as $f) {
	$finfo = GetFileInfo($f);
	$thumb = $finfo['thumb_url'].THUMB_SMALL_END;
	error_log($thumb);

	// build product row with file and add to return array
	$ret .= BuildProductRow($f, $finfo['name'], $finfo['file_name'], $finfo['earned'], $finfo['views'],
							$finfo['downloads'], $thumb);
}

// return via AJAX
// duplicate x4 for now, TODO: fix
echo $ret.$ret.$ret.$ret;

?>
