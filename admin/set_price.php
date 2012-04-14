<?
$path = $_SERVER['DOCUMENT_ROOT'];

include "$path/php/model.php";

$fid = $_POST['fid'];
$price = $_POST['price'];
$db = Connect();

SetPrice($fid, $price);

Disconnect($db);

// go back to orginal file
header('Location: file.php?f='.$fid) ;
?>

