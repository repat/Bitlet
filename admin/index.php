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

<div class="container">
	<h2>Admin Panel </h2>
	<div class="row">
	<h3 style="float:left;">Credits: 
<?
$uid = $_GET['u'];
$db = Connect();

$credits = GetCredits($uid);
echo $credits;
?>
</h3>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Downloads</th>
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
		</tbody>
		</table>
		</div>
	</div>
</body>
<? include "$path/view/footer.php"; ?>
</html>

