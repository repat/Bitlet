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
	<h1>Admin Panel</h1>
	<div class="row">
	<div class="span10 offset1">
	<h3 style="text-align:left;">Credits: $ 
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

	$name = basename($finfo['name']);
	$price = $finfo['price'];
	$downloads = $finfo['downloads'];
?>
	<tr>		
		<td>
		<?echo $name;?>
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
	</div>
</body>
<? include "$path/view/footer.php"; ?>
</html>

