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

?>
<h2>Page Title </h2>

<div class="container">
	<div class="row">

<?
$uid = $_GET['u'];
$db = Connect();

$credits = GetCredits($uid);
echo $credits;
?>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Class</th>
			<th>Description</th>
	    </tr>
	</thead> 
	<tbody>


<? $files = GetFids($uid);

// iterate through files and display info for each file
foreach($files as $file) {
	$finfo = GetFileInfo($file);

	$name = $finfo['name'];
	$price = $finfo['price'];
	$downloads = $finfo['downloads'];
?>
	<tr>		
		<td>
		<?echo basename($name);?>
		</td>
		<td>
<?		echo $price; ?>
		</td>
		<td>
<?		echo $downloads;?>
		</td>
	</tr>
<?
}

Disconnect($db);

?>

</body>
<? include "$path/view/footer.php"; ?>
</html>

