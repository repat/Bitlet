<?
$path = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<? include "$path/view/header.php"; ?>

<body>

<form class="form" id="upload" action=<?echo "$path/upload.php"?> method="post">
	<input id="email_bar" type="text" size="62" maxlength="200" name="email_url">
</form>

</body>

<? include "$path/view/footer.php"; ?>

</html>
