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

<div class="container mid">
	<a class="btn btn-large btn-primary" href="download.php?n=<? echo $name;?>"><i class="icon-download icon-white"></i> Download <? echo basename($name); ?></a>
</div>

</body>

<? include "$path/view/footer.php"; ?>
</html>

