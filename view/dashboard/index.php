<?

$uid = $_SESSION['uid'];
if($uid >= 0) {
	// get user info
	$user = GetUserInfo($uid);

	// get file info
	// TODO: We may want to think about AJAXing this
	
} else {
	// test user
	$user['name'] = 'Test Subject 42';
}

$category = 'video';

?>

<div class="main-shebang">

		<div class="topDiv">
			<div id="overviewData">
				<table>
					<tr id="numbers">
						<td>18</td>
						<td>50</td>
						<td>50</td>
						<td>50</td>
					</tr>
					<tr id="description">
						<td>Total Credits</td>
						<td>Total Sales</td>
						<td>Purchases</td>
						<td>Products</td>
					</tr>
				</table>
			</div>
		</div>
	
		<? require_once 'left.php'?>
		<? require_once 'middle.php'?>
		<? require_once 'right.php'?>

</div>
	
