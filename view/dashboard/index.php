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

<div id="topContainer">
	<div id="topShebang" class="bitletRoundedCorners bitletDropShadow">
		<div class="overviewData bitletInnerShadow bitletRoundedCorners">
			<div class="theData">
				<p id="overviewNum">18</p>
				<p id="overviewDescr">Shares</p>
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

	<div id="creditsShebang" class="bitletRoundedCorners bitletDropShadow">
		<div class="creditsDiv bitletInnerShadow">
			<p id="overviewNum">3000</p>
			<p id="overviewDescr">Dollars</p>
		</div>
		<button class="cashOut">
			<!--<img src="/img/claim.png"/>-->
			<p>Claim</p>
		</button>
	</div>
</div>

<div id="mainShebang" class="bitletRoundedCorners bitletDropShadow">
		<div id="topDiv">
		</div>
	
		<? require_once 'left.php'?>
		<? require_once 'middle.php'?>
		<? require_once 'right.php'?>
</div>
	
