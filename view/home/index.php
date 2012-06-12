<div id="bitletHero">
	<div id="heroContainer">
		<div id="homeFeaturedLeft">
			<img id="heroImg" src="/img/drawings/hero.png">
		</div><? // end of home-feature-left ?>

		<div id="homeFeaturedRight">
			<div class="content">
				<h1>Earn Money for Creating Content</h1>
				<h2>Bitlet allows anyone to make money. Just enter your email and select your masterpiece to get started!</h2>
				<form  style="text-align:center;" class="form-inline" target="upload_iframe" id="homeUpload" 
					action="/ajax/upload" method="post" enctype="multipart/form-data">
					<div class="input-prepend">
						<span class="add-on" id="emaila"><i id="email-icon" class="icon-envelope icon-white"></i></span>
						<? if($UID >= 0) { // if logged in ?>
							<input class="input-medium inputHeightLarge" id="email" type="text" name="email" value="<? echo GetUserEmail($UID); ?>" readonly="true" onkeypress="return event.keyCode!=13">
						<? } else { ?>
							<input class="input-medium inputHeightLarge" id="email" type="text" name="email" placeholder="Email" onkeypress="return event.keyCode!=13">
						<? } ?>
					</div><? // end of input-prepend ?>

					<button type="button" class="upload-button btn btn-large btn-primary" 
						onclick="$('.file-button').click();">
						Select File
					</button>
					<input type="file" name="file" id="button" class="file-button" style="display:hidden">
				</form>	
				<div id="emailSuggestionWrap">
					<? if($UID < 0) { // only show email suggestions when not logged in ?><div id="emailSuggestion"></div><? } ?>
				</div>
			</div><? // content ?>
			<div id="topTriangle" class="triangle"></div> 
			<div id="bottomTriangle" class="triangle"></div> 
		</div><? // end of home-feature-right ?>
	</div><? // end of contianer ?>
</div><? // end of bitlet-hero ?>

<? // MARKETING STUFF GOES HERE ?>
<div id="marketingBg" class="container well bitletDropShadow" >
	<h1>Why you'll love using Bitlet</h1>
	<img id="bitletCloudHome" src="/img/drawings/bitcloud.png">
	<hr>
	<div class="row">
		<div class="span4">
			<div class="thumbnail"><img src="/img/drawings/chart.png" alt="the chart is going up!"></div>
		</div>
		<div class="span8">
			<h2>Earn money for what you do best</h2>
			<p>You shouldn't have to worry about business or marketing when working on your next masterpiece, and with Bitlet, you don't have to.</p>
			<p>Upload your digital work, and we'll give you a link to share so you can start selling right away. Additionally, we'll use our own sales army to help you get exposure and earn a profit. And by the way, submitting content is free, we only make money when you do.</p>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="span8">
			<h2>Your personal sales force</h2>
			<p>Our network of professional marketers takes care of the selling for you, so you can focus on what you do best - making awesome products.</p>
			<p>The moment a product is uploaded to Bitlet, it is accessible by professional marketers with influence over millions of potiential customers. You just sit back and relax, we'll take care of the rest.</p>
		</div>
		<div class="span4">
			<div class="thumbnail"><img src="/img/drawings/army.png" alt="your personal sales army"></div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="span4">
			<div class="thumbnail"><img src="/img/drawings/backend.png" alt="backend to handle all your needs"></div>
		</div>
		<div class="span8">
			<h2>Tools to help you succeed</h2>
			<p>Do you think in moving averages? You've come to the right place. Bitlet includes a comprehensive analytics suite to help you keep track of your products, check out your sales numbers, and, of course, cash out on your earnings.</p>
			<p>If you're an affiliate marketer, you're in luck! Head over to the <a href="http://affiliates.bitlet.co">Affiliate Portal</a> and check out our awesome web suite built just for you.</p>
		</div>
	</div>
</div>

<? // Hidden Upload iFrame for Async Uploading ?>
<iframe name="upload_iframe" id="homeUploadIframe">
</iframe>
