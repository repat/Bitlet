<?

include_once 'page.php';
include_once 'async.php';

// set base global var
$BASE = dirname(__FILE__);

// include lib files
foreach (glob("lib/*.php") as $filename) {
	include_once $filename;
}

session_start();

if(!isset($_SESSION['uid'])) {
	error_log('new user, default session uid');
	// start with a uid of -1 when not logged in 
	$_SESSION['uid'] = -1;	
}

$db = Connect();

$url = explode('/', $_SERVER['REQUEST_URI']);
$args = array_slice($url, 1);
error_log('url: '.$url[1]);

// see if request is for iframe, ajax, or just normal page
switch($url[1])
{
case 'ajax':
	ViewAjax($url[2], $args);
	break;
case 'buy':
	ViewBuy($url[2], $args);
	break;
default:
	ViewPage($url[1], $args);
	break;
}

// disconnect from database after all is done
Disconnect($db);

?>
