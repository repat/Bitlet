
<?

include 'lib/db.php';

$db = Connect();

// we can get either the fid or the furl
$fid = $_GET['f'];
$furl = $_GET['n'];

// if neither GET variables exists, kill yourself
if(!($fid || $furl)) {
	die();
} else if($furl) {
	$fid = GetFidFromUrl($furl);
}

$finfo = GetFileInfo($fid);
$uid = $finfo['uid'];
$price = $finfo['price'];

$dl = "http://bitlet.co/l/$fid";
$admin = "http://bitlet.co/user/$uid";

Disconnect($db);

?>

<body>
<div class="container">
<div class="row mid">
<h1>Current Price: $ <? echo $price ?></h1>
<form class="form-inline" id="price" action="set_price.php" method="post" enctype="multipart/form-data">
	<div class="input-prepend">
		<span class="add-on" id="icona">$</span>
		<input type="text" name="fid" value="<? echo $fid ?>" style="display:none">
		<input class="input-medium" id="price" type="text" name="price" placeholder="Price" onkeypress="return event.keyCode!=13">
	</div>
	<button type="submit" class="btn btn-primary">Set Price</button>
</form>

<h3>Share This Link:</h3>
<p><a href="<? echo $dl ?>"><? echo $dl ?></a></p>

<h3>Your Admin Link:</h3>
<p><a href="<? echo $admin ?>"><? echo $admin ?></a></p>

</div>
</div>
</body>

