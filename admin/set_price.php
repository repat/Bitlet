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

$fid = $_POST['fid'];
$price = $_POST['price'];
$db = Connect();

SetPrice($fid, $price);

Disconnect($db);

?>

</body>

<? include "$path/view/footer.php"; ?>
</html>

