<?
$path = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<? include "$path/php/header.php"; ?>

<body>
<? include "$path/php/nav.php"; ?>

<?
$file = $_GET['f'];
echo $file
?>
</body>

<? include "$path/php/footer.php"; ?>
</html>

