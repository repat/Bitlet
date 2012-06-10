<?

// grab the fid from javascript
$fid = $_POST['fid'];
$selected = $_POST['selected'];
$finfo = GetFileInfo($fid);

// display name, file name, size (bytes), price, image, description, catagory, sharelink, param
$ret = BuildProductDetails(strtolower($selected), $finfo['param']);

// return AJAX
echo $ret;

?>
