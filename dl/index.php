<?
$path = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
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

