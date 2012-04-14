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

$db = Connect();
$name = GetFileFromId($file);

Disconnect($db);

?>
</body>

<? include "$path/view/footer.php"; ?>
</html>

