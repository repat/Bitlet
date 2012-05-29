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
				<div id="credits">18</div>
				<div id="totalCredits">Total Credits</div>

				<div class="sideData" id="sales">50</div>
				<div class="sideDataText" id="totalSales">Total Sales</div>
				<div class="sideData" id="bought">12</div>
				<div class="sideDataText" id="totalBought">Purchased</div>
				<div class="sideData" id="selling">9</div>
				<div class="sideDataText" id="totalSelling">Products</div>
			</div>
		</div>
	
		<? require_once 'left.php'?>
		<? require_once 'middle.php'?>
		<? require_once 'right.php'?>

</div>
	
