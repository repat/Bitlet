<?

require_once 'phmagick/phmagick.php';

const THUMB_END = 't.png';
const THUMB_SMALL_END = 's.png';

// generate the required thumbnails for images
// returns: array of path of thumbnail image
function GenerateImageThumbnail($fid, $imgpath)
{
	// import base path
	global $BASE;
	$path = 'data/'.end(explode('/', dirname($imgpath), 2));

	$magic = new phmagick($BASE.'/'.$imgpath, $BASE.'/'.$fid.THUMB_END);
	$magic->resizeExactly(660, 348);

	// set new destination for smaller thumb
	$magic = new phmagick($BASE.'/'.$imgpath, $BASE.'/'.$fid.THUMB_SMALL_END);
	$magic->resizeExactly(60, 60);

	// store in local storage
	$cmd = 'mkdir -p "'.$path.'"';
	`$cmd`;
	error_log('cmd: '.$cmd);
	
	$cmd = 'mv "'.$fid.THUMB_END.'" '.$path;
	`$cmd`;
	error_log('cmd: '.$cmd);

	$cmd = 'mv "'.$fid.THUMB_SMALL_END.'" '.$path;
	`$cmd`;
	error_log('cmd: '.$cmd);

	return $path.'/'.basename($fid);
}

?>
