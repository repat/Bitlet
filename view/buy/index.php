<!DOCTYPE html>
<?

$path = $_SERVER['DOCUMENT_ROOT'];

include "$path/view/nav.php";
include "$path/php/model.php";

$db = Connect();

$fid = $_GET['f'];
$furl = $_GET['n'];

// if neither GET variables exists, kill yourself
if(!($fid || $furl)) {
	die();
} else if($furl) {
	$fid = GetFidFromUrl($furl);
}

$finfo = GetFileInfo($fid);
$name = basename($finfo['name']);
$price = $finfo['price'];
$downloads = $finfo['downloads'];
$uid = $finfo['uid'];

$uinfo = GetUserInfo($uid);
$user = $uinfo['email'];

Disconnect($db);

?>

<html>
<? include "$path/view/header.php"; ?>

<body>
<br>

<div class="container"><div class="row">

	<div class="span7"><div class="well paymentwell">
		<h1>Pay With Credit Card</h1>
		<h3>Price: $ <? echo $price; ?></br></h3>
		<br>

		<form action="" method="POST" id="payment-form">
			<div class="row"><div class="span5">
				<label id="cardnuml">Card Number</label>
				<input type="text" size="20" autocomplete="off" class="span3 card-number" placeholder=""/>
				<input type="text" size="4" autocomplete="off" class="span1 card-cvc" placeholder="CVC"/>
			</div></div>

			<div class="row"><div class="span5">
				<label id="cardexl">Expiration Date (MM/YYYY)</label>
				<input type="text" size="2" class="span1 card-expiry-month" placeholder="MM"/>
				<span id="exs"> / </span>
				<input type="text" size="4" class="span2 card-expiry-year" placeholder="YYYY"/>
			</div></div>

			<div class="row"><div class="span5">
				<button type="submit" class="submit-button btn btn-success">Submit Payment</button>
			</div></div>
		</form>
		<p class="payment-errors"></p>

		<!-- Hidden input to POST id on submission -->
		<div class="post-pay" style="display:none">
			<p>Download should start automatically, Or:</p>
			<hr>
		</div>
		<form action="download.php" method="POST" id="go-download">
			<input type="text" id="dfid" name="fid" value="<? echo $fid ?>" style="display:none">
			<button type="submit" id="ddl" class="btn btn-large" name="download" style="display:none">Manual Download</button>
		</form>
	</div></div>

	<div class="span5"><div class="well paymentwell">
		<h2>What you're getting:</h2>
		<br>

		<img src="/img/mainpage-icons/file.png"/>
		<hr/>
		<p class="">
			<b>Sold By:</b> <? echo $user; ?></br>
			<b>Name:</b> <? echo $name; ?></br>
			<b>Downloads:</b> <? echo $downloads; ?></br>
		</p>
	</div></div>
</div></div>

</body>

<? include "$path/view/footer.php"; ?>

</html>

