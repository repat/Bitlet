<?

// import global var
global $BUY_LINK_PREAMBLE;

// grab the fid from javascript
$fid = $_POST['fid'];
$finfo = GetFileInfo($fid);

$thumb = $finfo['thumb_url'] === '' ? '' : $finfo['thumb_url'].THUMB_END;

// display name, file name, size (bytes), price, image, description, catagory, sharelink, param
$ret = BuildProductColumn($fid, $finfo['name'], $finfo['file_name'], $finfo['size'], $finfo['price'], 
	$thumb, $finfo['description'], $finfo['type'], $BUY_LINK_PREAMBLE.GetLinkFromFid($fid));

// return AJAX
echo $ret;

?>
