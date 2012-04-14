<?
$path = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html>
<? include "$path/view/header.php"; ?>

<body>

<?
include "$path/view/nav.php";
include "$path/view/hero.php";
include "$path/view/marketing.php";
?>

</body>

<? include "$path/view/footer.php"; ?>

<!-- for loading screen -->
<div id="loading-bg">
</div>

<div id="loading">
	<span id="loading-text">Working...</span>
	<div id="loading-bar">
		<img src="img/main-loader.gif"/>
	</div>
</div>

</html>
