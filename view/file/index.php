<?

// we can get either the fid or the furl
$fid = $args;

$finfo = GetFileInfo($fid);
$uid = $finfo['uid'];
$price = $finfo['price'];

$dl = "http://bitlet.co/l/$fid";
$admin = "http://bitlet.co/user/$uid";

?>

<body>
	<h1>Current Price: $<span id="price"><? echo $price ?><span></h1>
	<form class="form-inline" id="price-form" action="/ajax/setprice" method="post" enctype="multipart/form-data">
		<div class="input-prepend">
			<span class="add-on" id="icona">$</span>
			<input type="text" name="fid" value="<? echo $fid ?>" style="display:none">
			<input class="input-medium" type="text" name="price" placeholder="Price">
		</div>
		<button type="submit" class="btn btn-primary">Set Price</button>
	</form>

	<h3>Share This Link:</h3>
	<p><a href="<? echo $dl ?>"><? echo $dl ?></a></p>

	<h3>Your Admin Link:</h3>
	<p><a href="<? echo $admin ?>"><? echo $admin ?></a></p>
</body>

