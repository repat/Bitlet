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
			<img class="profilePic" src="/img/arianna.png"/>
			<h1> Welcome, <? echo $user['name']; ?>!</h1> 
			<h2>Modify your account</h2>
			<form class="form-search">
				<input type="text" class="input-medium search-query" placeholder="Search">
			</form>
		</div>
	
		<? require_once 'left.php'?>
		<? require_once 'middle.php'?>
		<? require_once 'right.php'?>

</div>
	
