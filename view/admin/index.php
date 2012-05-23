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

?>

<div class="main-shebang">
		<div class="topDiv">
			<h1> Welcome, <? echo $user['name']; ?>!</h1>    
			<form class="form-search">
				<input type="text" class="input-medium search-query" placeholder="Search">
			</form>
		</div>
		<div class="leftSideDiv">
			<div class="sideData" id="number0fSales">18</div>
			<div class="sideDataText" id="salesText">Total Sales</div>
				<div class="sideData" id="dollars">500</div>
			<div class="sideDataText" id="dollarsText">Total Dollars</div>
		</div>
		<div class= "sidebar-div">
		</div>
		<div id="shadow"></div>
		<div class="rightSideDiv">
				<button class="btn" id="edit">Edit </button> 
		</div>
		
		</div>
	</div>
</div>
	
