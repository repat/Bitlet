<?

if($UID >= 0) {
	// get user info
	$user = GetUserInfo($UID);

	// get file info
	// TODO: We may want to think about AJAXing this
	
} else {
	// test user
	$user['name'] = 'Test Subject 42';
}

?>

<div id="mainShebang" class="bitletRoundedCorners bitletDropShadow">
		<div id="topDiv">
			<div class="creditsDiv bitletInnerShadow">
				<span id="dollar">$</span>	
				<span id="overviewNum"><? printf('%.2f', $user['credits']); ?></span>
			</div>
			<a href="/claim" class="cashOut">
				<!--<img src="/img/claim.png"/>-->
				<p>Claim</p>
			</a>
		</div>
	
		<? require_once 'left.php'; ?>
		
		<!-- center -->
		<div class= "centerDiv">
			<ul class="dashTable"></ul>
		</div>

		<!-- right side -->
		<div class="rightSideContainer">
			<div class="rightSideFrame sticky-div"><div class="rightSideMenu">
				<div id="rightContent"></div>
			</div></div>
		</div>
</div>

<form target="upload_iframe" class="uploadIframe" id="homeUpload" 
	action="/ajax/upload" method="post" enctype="multipart/form-data">
	<? // Hidden file upload button ?>
	<input type="file" name="file" id="button" class="file-button" style="display:hidden">
</form>

<? // Hidden Upload iFrame for Async Uploading ?>
<iframe name="upload_iframe" id="homeUploadIframe">
</iframe>

