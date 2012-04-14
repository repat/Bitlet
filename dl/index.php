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

<form action="" method="POST" id="payment-form">
	<div class="form-row">
		<label>Card Number</label>
		<input type="text" size="20" autocomplete="off" class="card-number"/>
	</div>

	<div class="form-row">
		<label>CVC</label>
		<input type="text" size="4" autocomplete="off" class="card-cvc"/>
	</div>

	<div class="form-row">
		<label>Expiration (MM/YYYY)</label>
		<input type="text" size="2" class="card-expiry-month"/>
		<span> / </span>
		<input type="text" size="4" class="card-expiry-year"/>
	</div>

	<button type="submit" class="submit-button">Submit Payment</button>
</form>

<form action="download.php" method="POST" id="go-download">
	<input type="text" name="fid" value="<? echo $file ?>" style="display:none">
	<button type="submit" name="download" style="display:none"></button>
</form>

</body>

<? include "$path/view/footer.php"; ?>
</html>

