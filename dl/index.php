<?
$path = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html>
<? include "$path/view/header.php"; ?>

<body>

<? 
include "$path/view/nav.php";
include "$path/php/model.php";

$file = $_GET['f'];
?>

<br>
<div class="container">
	<div class="row"><div class="offset3">
		<label>Mail Link To:</label>
		<input type="text" size="20" autocomplete="off" class="span4 card-email" placeholder="Email"/>
	</div></div>

	</br>

	<form action="" method="POST" id="payment-form">
		<div class="row"><div class="offset3">
			<label>Card Number</label>
			<input type="text" size="20" autocomplete="off" class="span3 card-number" placeholder=""/>
			<input type="text" size="4" autocomplete="off" class="span1 card-cvc" placeholder="CVC"/>
		</div></div>

		<div class="row"><div class="offset3">
			<label>Expiration Date (MM/YYYY)</label>
			<input type="text" size="2" class="span1 card-expiry-month" placeholder="MM"/>
			<span> / </span>
			<input type="text" size="4" class="span2 card-expiry-year" placeholder="YYYY"/>
		</div></div>

		<div class="row"><div class="offset3">
			<button type="submit" class="submit-button btn btn btn-primary">Submit Payment</button>
		</div></div>
	</form>
</div>

<!-- Hidden input to POST id on submission -->
<form action="go.php" method="POST" id="go-download">
	<input type="text" name="fid" value="<? echo $file ?>" style="display:none">
	<button type="submit" name="download" style="display:none"></button>
</form>

</body>

<? include "$path/view/footer.php"; ?>
</html>

