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

<div id="main-shebang">
		<div id="topDiv">
			<div class="overviewData">
				<div class="theData">
					<p id="overviewNum">18</p>
					<p id="overviewDescr">Credits</p>
				</div>
				<div class="theData">
					<p id="overviewNum">18</p>
					<p id="overviewDescr">Sales</p>
				</div>
				<div class="theData">
					<p id="overviewNum">18</p>
					<p id="overviewDescr">Purchases</p>
				</div>
				<div class="theData">
					<p id="overviewNum">18</p>
					<p id="overviewDescr">Products</p>
				</div>
			</div>
		</div>
	
		<? require_once 'left.php'?>
		<? require_once 'middle.php'?>
		<? require_once 'right.php'?>
</div>
	
