<?

require_once 'phmagick/phmagick.php';

const THUMB_END = 't.png';
const THUMB_SMALL_END = 's.png';

// generate the required thumbnails for images
// returns: array of path of thumbnail image
function GenerateImageThumbnail($imgpath)
{
	// import base path
	global $BASE;

	$magic = new phmagick($BASE.'/'.$imgpath, $BASE.'/'.$imgpath.THUMB_END);
	$magic->resizeExactly(250, 250);

	// set new destination for smaller thumb
	$magic->setDestination($BASE.'/'.$imgpath.THUMB_SMALL_END);
	$magic->resizeExactly(60, 60);

	// generate the thumbnails 
	$path = 'data/'.end(explode('/', dirname($imgpath), 2));

	// store in local storage
	$cmd = "mkdir -p $path";
	`$cmd`;
	error_log('cmd: '.$cmd);
	
	$cmd = 'mv '.$imgpath.THUMB_END.' '.$path;
	`$cmd`;
	error_log('cmd: '.$cmd);

	$cmd = 'mv '.$imgpath.THUMB_SMALL_END.' '.$path;
	`$cmd`;
	error_log('cmd: '.$cmd);

	return $path.'/'.basename($imgpath);
}

?>
