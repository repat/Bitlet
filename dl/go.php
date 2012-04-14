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

$db = Connect();
$name = GetFileFromId($fid);
IncrementDownloads($fid);
Disconnect($db);

?>

<a href="download.php?n=<? echo $name;?>">download!</a>

</body>

<? include "$path/view/footer.php"; ?>
</html>

