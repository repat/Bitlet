<?
$path = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<? include "$path/view/header.php"; ?>

<body style="paddint-top: 40px">
<? include "$path/view/nav.php"; ?>

<form class="form" id="upload" action=<?echo "$path/upload.php"?> method="post" enctype="multipart/form-data">
	<input type="file" name="file" id="file"
		onchange="load(''); fade('loading'); browse.submit()"/>
</form>

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
