<?
$path = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<? include "$path/view/header.php"; ?>

<body>
<? include "$path/view/nav.php"; ?>

<?
$file = $_GET['f'];
echo $file
?>
</body>

<? include "$path/view/footer.php"; ?>
</html>

