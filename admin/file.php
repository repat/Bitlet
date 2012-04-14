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

$fid = $_GET['f'];
$dl = "http://bitlet.simply.io/dl?f=$fid";

?>
<div class="container">
<div class="row mid">
<h1>Set the Price!</h1>
<form class="form-inline" id="price" action="set_price.php" method="post" enctype="multipart/form-data">
	<div class="input-prepend">
		<span class="add-on" id="icona">$</span>
		<input type="text" name="fid" value="<? echo $fid ?>" style="display:none">
		<input class="input-medium" id="price" type="text" name="price" placeholder="Price" onkeypress="return event.keyCode!=13">
	</div>
	<button type="submit" class="btn btn-success">Set Price</button>
</form>

<h3>Your Download link:</h3>
<p><a href="<? echo $dl ?>"><? echo $dl ?></a></p>

</div>
</div>
</body>

<? include "$path/view/footer.php"; ?>
</html>

